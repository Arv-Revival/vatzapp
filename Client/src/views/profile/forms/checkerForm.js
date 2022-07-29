import React, { useState, useEffect } from "react";
import { Row, Col } from "react-bootstrap";
import { Formik, Field, Form, ErrorMessage } from "formik";
import * as Yup from "yup";
import Select from "react-select";

import { showNotification } from "../../../services/toasterService";
import { CONFIG } from "../../../config/constant";
import { callApi, callUploadApi } from "../../../services/apiService";
import { ApiConstants } from "../../../config/apiConstants";
import avatar1 from "../../../assets/images/icons/company.png";

const CheckerForm = (props) => {
  const [isSubmitted, setIsSubmitted] = useState(false);
  const [selectedCountry, setSelectedCountry] = useState("");
  const [countriesList, setCountriesList] = useState([]);
  const [selectedDisplayPic, setSelectedDisplayPic] = useState(null);
  const [previewImg, setPreviewImg] = useState(null);
  const [dpErrors, setDpErrors] = useState("");

  const { userInfo } = props;

  const FILE_SIZE = CONFIG.MAX_UPLOAD_SIZE;
  const SUPPORTED_FORMATS = ["jpg", "jpeg", "png"];

  const UserFormSchema = Yup.object().shape({
    name: Yup.string().required("Please enter Name"),
    email: Yup.string()
      .required("Please enter Email ")
      .email("Please enter a valid Email"),
    place: Yup.string().required("Please enter Place"),
    po_box: Yup.string().required("Please enter PO Box"),
    city: Yup.string().required("Please enter City"),
    country: Yup.string().required("Please select Country"),
    whatsappno: Yup.string()
      .required("Please enter Whatsapp No")
      .matches(/^[0-9]*$/, "Please enter a valid phone number"),
    mobile: Yup.string().matches(
      /^[0-9]*$/,
      "Please enter a valid mobile number"
    ),
  });

  useEffect(() => {
    getContries();
    onSelectCountry(userInfo?.checker_user?.country);
  }, []);

  const uploadFiles = (data) =>
    new Promise((resolve, reject) => {
      let formData = new FormData();
      formData.append("file", data);

      return callUploadApi(formData)
        .then((response) => {
          if (response.status_code === 201) resolve(response);
          else {
            reject(response);
            showNotification("Error", response.message, "error");
          }
        })
        .catch((error) => {
          reject(error);
          showNotification("Error", "File upload failed", "error");
        });
    });

  const onSubmit = (values) => {
    props.onShowLoader(true);
    let params = {
      country_code: selectedCountry.phone_code,
      mobile: values.mobile,
      p_o_box: values.po_box,
      palce: values.place,
      city: values.city,
      image_id: 0,
    };
    if (selectedDisplayPic) {
      uploadFiles(selectedDisplayPic)
        .then((response) => {
          params.image_id = response.payload.file_id;
          updateProfile(params);
        })
        .catch((error) => {
          props.onShowLoader(false);
        });
    } else {
      updateProfile(params);
    }
  };

  const updateProfile = (params) => {
    callApi("post", ApiConstants.checker.update, params, true)
      .then((response) => {
        props.onShowLoader(false);
        if (response && response.status_code === 201) {
          props.onSuccess();
          showNotification("Success", response.message, "success");
        } else {
          showNotification("Error", response.message, "error");
        }
      })
      .catch((error) => {
        props.onShowLoader(false);
        showNotification("Error", "Something went wrong", "error");
      });
  };

  const onSelectCountry = (value) => {
    setSelectedCountry(value);
  };

  const onFileChange = (event) => {
    let file = event.target.files[0];
    if (file) {
      let regex = /(?:\.([^.]+))?$/;
      let ext = regex.exec(file.name)[1];

      if (file.size >= FILE_SIZE) {
        setDpErrors("Exceeds maximum file size (Max 50MB)");
        return;
      }

      if (!SUPPORTED_FORMATS.includes(ext?.toLowerCase())) {
        setDpErrors("Unsupported Format");
        return;
      }

      let reader = new FileReader();
      reader.readAsDataURL(file);
      reader.onloadend = (e) => {
        setPreviewImg(reader.result);
        setSelectedDisplayPic(file);
      };
      setDpErrors("");
    }
  };

  const getContries = () => {
    props.onShowLoader(true);
    callApi("get", ApiConstants.lookups.getCountry, {})
      .then((response) => {
        props.onShowLoader(false);
        if (response && response.status_code === 200) {
          setCountriesList(
            response.payload?.map((i) => {
              return { ...i, value: i.id, label: i.name };
            })
          );
        } else {
          showNotification("Error", response.message, "error");
        }
      })
      .catch((error) => {
        props.onShowLoader(false);
        showNotification("Error", "Something went wrong", "error");
      });
  };

  return (
    <React.Fragment>
      <div className="card shadow-none mb-0 rounded">
        <div className="card-header">
          <h5 className="text-primary">Edit Profile</h5>
        </div>
        <div className="card-body mx-4">
          <Formik
            enableReinitialize={true}
            initialValues={{
              email: userInfo?.email ? userInfo.email : "",
              name: userInfo?.name ? userInfo.name : "",
              place: userInfo.checker_user?.palce
                ? userInfo.checker_user.palce
                : "",
              po_box: userInfo.checker_user.p_o_box
                ? userInfo.checker_user.p_o_box
                : "",
              city: userInfo.checker_user.city
                ? userInfo.checker_user.city
                : "",
              country: userInfo.checker_user.country_id
                ? userInfo.checker_user.country_id
                : "",
              mobile: userInfo.checker_user.mobile
                ? userInfo.checker_user.mobile
                : "",
              whatsappno: userInfo.whatsapp_no ? userInfo.whatsapp_no : "",
            }}
            validationSchema={UserFormSchema}
            onSubmit={(values) => onSubmit(values)}>
            {({ errors, handleChange, values }) => (
              <Form>
                <Row>
                  <Col xs={12}>
                    <div className="mb-4 d-flex justify-content-center align-items-center">
                      <div
                        className="profile-avatr"
                        style={{ width: 85, height: 85, position: "relative" }}>
                        {selectedDisplayPic ? (
                          <img
                            src={previewImg}
                            alt="user"
                            className="display_pic"
                          />
                        ) : userInfo?.profile_image ? (
                          <img
                            src={
                              CONFIG.API_BASE_URL +
                              ApiConstants.file.view +
                              "?file_name=" +
                              userInfo?.profile_image.file_path
                            }
                            alt="user"
                            className="display_pic"
                          />
                        ) : (
                          <img src={avatar1} alt="user" />
                        )}
                        <input
                          type="file"
                          id="display-pic-input"
                          accept="image/jpg, image/jpeg, image/png"
                          onChange={onFileChange}
                        />
                        <label htmlFor="display-pic-input">
                          <span className="edit-icon">
                            <i className="feather icon-camera" />
                          </span>
                        </label>
                        <div className="dp-error-container">{dpErrors}</div>
                      </div>
                      <div className="d-inline-block ml-3">
                        <h6>{userInfo?.name}</h6>
                        <p className="m-b-0">
                          ID: VATZ{("000000" + userInfo?.id).slice(-6)}
                        </p>
                      </div>
                    </div>
                  </Col>
                </Row>
                <Row>
                  <Col xs={12} xl={6}>
                    <label>Name</label>
                    <div className="input-group mb-3">
                      <Field
                        type="text"
                        className={`form-control ${
                          errors.name && isSubmitted ? "is-invalid" : ""
                        }`}
                        placeholder="Name"
                        name="name"
                        disabled
                      />
                      <ErrorMessage name="name">
                        {(msg) => <div className="invalid-feedback">{msg}</div>}
                      </ErrorMessage>
                    </div>
                  </Col>
                  <Col xs={12} xl={6}>
                    <label>Email</label>
                    <div className="input-group mb-3">
                      <Field
                        type="text"
                        className={`form-control ${
                          errors.email && isSubmitted ? "is-invalid" : ""
                        }`}
                        placeholder="Email"
                        name="email"
                        disabled
                      />
                      <ErrorMessage name="email">
                        {(msg) => <div className="invalid-feedback">{msg}</div>}
                      </ErrorMessage>
                    </div>
                  </Col>
                  <Col xs={12} xl={6}>
                    <label>Place / Street name</label>
                    <div className="input-group mb-3">
                      <Field
                        type="text"
                        className={`form-control ${
                          errors.place && isSubmitted ? "is-invalid" : ""
                        }`}
                        placeholder="Place / Street name"
                        name="place"
                      />
                      <ErrorMessage name="place">
                        {(msg) => <div className="invalid-feedback">{msg}</div>}
                      </ErrorMessage>
                    </div>
                  </Col>
                  <Col xs={12} xl={6}>
                    <label>P O Box</label>
                    <div className="input-group mb-3">
                      <Field
                        type="text"
                        className={`form-control ${
                          errors.po_box && isSubmitted ? "is-invalid" : ""
                        }`}
                        placeholder="P O Box"
                        name="po_box"
                      />
                      <ErrorMessage name="po_box">
                        {(msg) => <div className="invalid-feedback">{msg}</div>}
                      </ErrorMessage>
                    </div>
                  </Col>
                  <Col xs={12} xl={6}>
                    <label>City</label>
                    <div className="input-group mb-3">
                      <Field
                        type="text"
                        className={`form-control ${
                          errors.city && isSubmitted ? "is-invalid" : ""
                        }`}
                        placeholder="City"
                        name="city"
                      />
                      <ErrorMessage name="city">
                        {(msg) => <div className="invalid-feedback">{msg}</div>}
                      </ErrorMessage>
                    </div>
                  </Col>
                  <Col xs={12} xl={6}>
                    <label>Country</label>
                    <div className="input-group mb-3">
                      <Select
                        className={`w-100 form-control-select ${
                          errors.country && isSubmitted ? "is-invalid" : ""
                        }`}
                        classNamePrefix="select"
                        options={countriesList}
                        value={countriesList.find(
                          (i) => i.id === values.country
                        )}
                        placeholder="Select Country"
                        isSearchable={false}
                        isDisabled
                        onChange={(value) => {
                          onSelectCountry(value);
                          let event = {
                            target: {
                              name: "country",
                              value: value.id,
                            },
                          };
                          handleChange(event);
                        }}
                      />
                      <ErrorMessage name="country">
                        {(msg) => <div className="invalid-feedback">{msg}</div>}
                      </ErrorMessage>
                    </div>
                  </Col>
                  <Col xs={12} xl={6}>
                    <label>Whatsapp Number</label>

                    <div className="input-group mb-3">
                      <div className="input-group-prepend bg-light">
                        <span
                          className={`input-group-text ${
                            errors.whatsappno && isSubmitted
                              ? "border border-danger"
                              : ""
                          }`}
                          id="country-code"
                          style={{ fontSize: 14 }}>
                          {selectedCountry.phone_code}
                        </span>
                      </div>
                      <Field
                        type="text"
                        className={`form-control ${
                          errors.whatsappno && isSubmitted ? "is-invalid" : ""
                        }`}
                        placeholder="Whatsapp Number"
                        name="whatsappno"
                        disabled
                      />
                      <ErrorMessage name="whatsappno">
                        {(msg) => <div className="invalid-feedback">{msg}</div>}
                      </ErrorMessage>
                    </div>
                  </Col>
                  <Col xs={12} xl={6}>
                    <label>Mobile Number</label>
                    <div className="input-group mb-3">
                      <div className="input-group-prepend bg-light">
                        <span
                          className={`input-group-text ${
                            errors.mobile && isSubmitted
                              ? "border border-danger"
                              : ""
                          }`}
                          id="country-code"
                          style={{ fontSize: 14 }}>
                          {selectedCountry.phone_code}
                        </span>
                      </div>
                      <Field
                        type="text"
                        className={`form-control ${
                          errors.mobile && isSubmitted ? "is-invalid" : ""
                        }`}
                        placeholder="Mobile Number"
                        name="mobile"
                      />
                      <ErrorMessage name="mobile">
                        {(msg) => <div className="invalid-feedback">{msg}</div>}
                      </ErrorMessage>
                    </div>
                  </Col>
                </Row>

                <div className="mt-3 text-center">
                  <button
                    type="submit"
                    style={{ width: 180, fontWeight: "bold" }}
                    className="btn btn-primary shadow-2 mt-3"
                    onClick={() => setIsSubmitted(true)}>
                    Update
                  </button>
                </div>
              </Form>
            )}
          </Formik>
        </div>
      </div>
    </React.Fragment>
  );
};

export default CheckerForm;
