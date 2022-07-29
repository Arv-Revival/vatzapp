import React, { useCallback, useState, useEffect } from "react";
import { Row, Col, Card } from "react-bootstrap";
import { useDropzone } from "react-dropzone";

import { callApi, callUploadApi } from "../../services/apiService";
import { showNotification } from "../../services/toasterService";
import { ApiConstants } from "../../config/apiConstants";
import { CONFIG } from "../../config/constant";
import Spinner from "../../components/Spinner";
import imageCompression from "browser-image-compression";

const FileUpload = () => {
  const [showLoader, setShowLoader] = useState(false);
  const [fileList, setfileList] = useState([]);
  const [showProgress, setshowProgress] = useState(false);
  const [uploadStarted, setuploadStarted] = useState(false);
  const [uploadCompleted, setuploadCompleted] = useState(false);
  const [progressWidth, setProgressWidth] = useState(0);
  const [checkerAssigned, setcheckerAssigned] = useState(false);
  const [successUploads, setSuccessUploads] = useState([]);
  const [failedUploads, setFailedUploads] = useState([]);
  const [rejectedUploads, setRejectedUploads] = useState([]);

  const MAX_FILE_SIZE = CONFIG.MAX_UPLOAD_SIZE;
  const SUPPORTED_FORMATS = React.useMemo(() => ["pdf", "jpg", "jpeg", "png", "doc", "docx", "jfif", "gif", "bmp"], []);

  useEffect(() => {
    let userObj = JSON.parse(localStorage.getItem("user"));
    setcheckerAssigned(userObj.is_checker_assigned);
  }, []);

  async function handleImageUpload(event) {
    const imageFile = event.target.files[0];
    console.log("originalFile instanceof Blob", imageFile instanceof Blob); // true
    console.log(`originalFile size ${imageFile.size / 1024 / 1024} MB`);

    const options = {
      maxSizeMB: 1,
      maxWidthOrHeight: 1920,
      useWebWorker: true,
    };

    try {
      const compressedFile = await imageCompression(imageFile, options);
      console.log("compressedFile instanceof Blob", compressedFile instanceof Blob);
      console.log(`compressedFile size ${compressedFile.size / 1024 / 1024} MB`);
    } catch (error) {
      console.log(error);
    }
  }
  const onUploadComplete = React.useCallback(() => {
    setuploadStarted(false);
    setshowProgress(false);

    if (!successUploads.length) return;

    setShowLoader(true);
    let params = {
      file_id_list: successUploads.map((i) => {
        return i.fileId;
      }),
    };
    callApi("post", ApiConstants.entry.create, params, true)
      .then((response) => {
        setShowLoader(false);
        if (response && response.status_code === 201) {
          setSuccessUploads([]);
          showNotification("Success", response.message, "success");
        } else {
          showNotification("Error", response.message, "error");
        }
      })
      .catch((error) => {
        setShowLoader(false);
        showNotification("Error", "Something went wrong", "error");
      });
  }, [successUploads]);

  useEffect(() => {
    let pendingList = fileList.filter((i) => i.status === 0);
    if (!uploadCompleted && uploadStarted && !pendingList.length) {
      setuploadCompleted(true);
      setTimeout(() => {
        onUploadComplete();
      }, 1000);
    }
  }, [successUploads, failedUploads, fileList, uploadCompleted, uploadStarted, onUploadComplete]);

  const checkFileType = useCallback(
    (file) => {
      let regex = /(?:\.([^.]+))?$/;
      let ext = regex.exec(file.name)[1];
      console.log(ext);
      if (ext === "jpg" || ext === "jpeg" || ext === "png") {
      }
      return SUPPORTED_FORMATS.includes(ext?.toLowerCase());
    },
    [SUPPORTED_FORMATS]
  );

  const removeFile = (file) => {
    console.log(file);
    let updatedList = rejectedUploads.filter((i) => {
      console.log(i.id, file.id, i.fileData.size, file.fileData.size);
      return i.id !== file.id || i.fileData.size !== file.fileData.size;
    });
    setRejectedUploads(updatedList);
  };

  const removeFailedFile = (file) => {
    console.log(file);
    let updatedList = fileList.filter((i) => {
      console.log(i.id, file.id, i.fileData.size, file.fileData.size);
      return i.id !== file.id || i.fileData.size !== file.fileData.size;
    });
    setfileList(updatedList);
  };

  const onDrop = useCallback(
    (acceptedFiles) => {
      let acceptedList = [],
        rejectedList = [];
      acceptedFiles.forEach((file) => {
        if (!checkFileType(file)) {
          rejectedList.push({ id: new Date().valueOf(), reason: "Unsupported file format", fileData: file });
        } else if (file.size >= MAX_FILE_SIZE) {
          rejectedList.push({ id: new Date().valueOf(), reason: "Exceeds maximum file size", fileData: file });
        } else {
          acceptedList.push({ id: new Date().valueOf(), status: 0, fileData: file });
        }
      });

      setfileList((oldList) => [...oldList, ...acceptedList]);
      setRejectedUploads((oldList) => [...oldList, ...rejectedList]);
    },
    [MAX_FILE_SIZE, checkFileType]
  );

  const { getRootProps, getInputProps, isDragActive } = useDropzone({ onDrop });

  const formatBytes = (bytes, decimals = 2) => {
    if (bytes === 0) return "0 Bytes";
    const k = 1024;
    const dm = decimals < 0 ? 0 : decimals;
    const sizes = ["Bytes", "KB", "MB", "GB", "TB", "PB", "EB", "ZB", "YB"];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + " " + sizes[i];
  };

  const uploadFiles = async (data) =>
    new Promise((resolve, reject) => {
      const options = { maxSizeMB: 1, maxWidthOrHeight: 1920, useWebWorker: true };
      // console.log("File", data.type.includes("image"));
      // console.log("File", data.type.includes("image"));
      if (data.type.includes("image")) {
        imageCompression(data, options)
          .then((result) => {
            let formData = new FormData();
            formData.append("file", result);
            return callUploadApi(formData);
          })
          .then((response) => {
            if (response.status_code === 201) {
              resolve(response);
            } else {
              reject(response);
              showNotification("Error", response.message, "error");
            }
          })
          .catch((error) => {
            console.log("File Upload Error!!!\n\n", error);
            reject(error);
            showNotification("Error", "File upload failed", "error");
          });
      } else {
        let formData = new FormData();
        formData.append("file", data);
        callUploadApi(formData)
          .then((response) => {
            if (response.status_code === 201) {
              resolve(response);
            } else {
              reject(response);
              showNotification("Error", response.message, "error");
            }
          })
          .catch((error) => {
            console.log("File Upload Error!!!\n\n", error);
            reject(error);
            showNotification("Error", "File upload failed", "error");
          });
      }
    });

  const uploadAll = () => {
    if (uploadStarted) return;

    setProgressWidth(0);
    setuploadCompleted(false);
    setuploadStarted(true);
    let pendingList = fileList.filter((i) => i.status === 0);
    let progressDiv = pendingList.length ? 100 / pendingList.length : 0;
    setshowProgress(true);

    fileList.forEach((file) => {
      if (file.status === 0) {
        uploadFiles(file.fileData)
          .then((response) => {
            file.status = 1;
            setProgressWidth((oldWidth) => oldWidth + progressDiv);
            setSuccessUploads((oldList) => [...oldList, { ...file, fileId: response?.payload?.file_id }]);
          })
          .catch((error) => {
            file.status = 2;
            setProgressWidth((oldWidth) => oldWidth + progressDiv);
            setFailedUploads((oldList) => [...oldList, file]);
          });
      }
    });
  };

  return (
    <React.Fragment>
      {showLoader && <Spinner />}
      <Row>
        <Col xl={12}>
          <Card className="rounded">
            <Card.Header>
              <h5 className="text-primary">Upload Files</h5>
            </Card.Header>
            <Card.Body className="p-4">
              {checkerAssigned ? (
                <div>
                  <div {...getRootProps()} className="drop-zone">
                    <input {...getInputProps()} />
                    {isDragActive ? (
                      <p>Drop the files here ...</p>
                    ) : (
                      <div className="text-center">
                        <i className="feather icon-upload-cloud upload-icon"></i>
                        <p className="font-weight-bold" style={{ fontSize: 15 }}>
                          Drag files here, or click to browse files
                        </p>
                      </div>
                    )}
                  </div>
                  <div className="text-right">
                    <div style={{ fontSize: 11 }} className="my-2">
                      Supported file formats JPG, JPEG, PNG, JFIF, GIF, BMP, PDF, DOC, DOCX.
                    </div>
                    <div style={{ fontSize: 11 }} className="mb-2">
                      Max upload file size 50 MB
                    </div>
                  </div>

                  <div className="upload-container pt-3">
                    {showProgress && (
                      <div className="mb-4 progress">
                        <div role="progressbar" className="progress-bar bg-success progress-bar-animated progress-bar-striped" style={{ width: progressWidth + "%" }}></div>
                      </div>
                    )}
                    {fileList.some((i) => i.status === 0) && (
                      <div className="text-center mb-3">
                        <button className="btn btn-primary upload-btn" onClick={uploadAll}>
                          {uploadStarted && <span className="spinner-border spinner-border-sm mr-1" role="status"></span>}
                          Upload Documents
                        </button>
                      </div>
                    )}
                  </div>
                  {fileList.length > 0 && (
                    <React.Fragment>
                      <div className="files-list-container">
                        {fileList.map((file, key) => {
                          return (
                            <div key={key} className="file-item p-2">
                              <div className="d-flex">
                                <div className="file-icon">
                                  <i className="feather icon-file-text" />
                                </div>
                                <div className="file-details">
                                  <div className="file-name">{file.fileData.name}</div>
                                  <div className="file-size">{formatBytes(file.fileData.size)}</div>
                                </div>
                              </div>
                              <div className={`upload-status ${file.status === 1 ? "text-success" : file.status === 2 ? "text-danger" : "text-primary"}`}>
                                <i className={`feather ${file.status === 1 ? "icon-check-circle" : file.status === 2 ? "icon-x-circle" : "icon-upload-cloud"}`} role="button" title="Remove" onClick={() => removeFailedFile(file)} />
                              </div>
                            </div>
                          );
                        })}
                      </div>
                    </React.Fragment>
                  )}
                  {rejectedUploads.length > 0 && (
                    <React.Fragment>
                      <label className="text-danger my-3">Rejected Files</label>
                      <div className="files-list-container">
                        {rejectedUploads.map((file, key) => {
                          return (
                            <div key={key} className="file-item p-2">
                              <div className="d-flex">
                                <div className="file-icon">
                                  <i className="feather icon-file-text" />
                                </div>
                                <div className="file-details">
                                  <div className="file-name">{file.fileData.name}</div>
                                  <div className="file-size">{formatBytes(file.fileData.size)}</div>
                                </div>
                              </div>
                              <div className="d-flex align-items-center">
                                <div className="mr-4 text-danger">{file.reason}</div>
                                <div className="upload-status text-danger" role="button" title="Remove" onClick={() => removeFile(file)}>
                                  <i className="feather icon-x-circle" />
                                </div>
                              </div>
                            </div>
                          );
                        })}
                      </div>
                    </React.Fragment>
                  )}
                </div>
              ) : (
                <div role="alert" className="fade alert alert-danger show">
                  No Checker assigned yet. Please contact Administrator.
                </div>
              )}
            </Card.Body>
          </Card>
        </Col>
      </Row>
    </React.Fragment>
  );
};

export default FileUpload;
