import React, { useState, useEffect } from "react";
import { Link } from "react-router-dom";
import { OverlayTrigger, Tooltip } from "react-bootstrap";
import { Formik, Field, Form, ErrorMessage } from "formik";
import * as Yup from "yup";
import Select from "react-select";

import { callApi, callUploadApi } from "../../services/apiService";
import { ApiConstants } from "../../config/apiConstants";
import { CONFIG } from "../../config/constant";
import { showNotification } from "../../services/toasterService";

import logo from "../../assets/svgs/logo.svg";

const FILE_SIZE = CONFIG.MAX_UPLOAD_SIZE;
const SUPPORTED_FORMATS = [
  "pdf",
  "jpg",
  "jpeg",
  "png",
  "doc",
  "docx",
  "jfif",
  "gif",
  "bmp",
];

const SignUp = ({ close, openSignin, onShowLoader }) => {
  const [isSubmitted, setIsSubmitted] = useState(false);
  const [countriesList, setCountriesList] = useState([]);
  const [emiratesList, setEmiratesList] = useState([]);
  const [selectedCountry, setSelectedCountry] = useState("");
  const [selectedEmirate, setSelectedEmirate] = useState("");

  const SignUpSchema = Yup.object().shape({
    companyName: Yup.string().required("Please enter Company Name"),
    buildingName: Yup.string().required("Please enter Building Name"),
    poBox: Yup.string(),
    place: Yup.string(),
    city: Yup.string(),
    emairate: Yup.string().required("Please select Emirate"),
    country: Yup.string().required("Please select Country"),
    whatsappno: Yup.string()
      .required("Please enter Whatsapp No")
      .matches(/^[0-9]*$/, "Please enter a valid phone number"),
    landphone: Yup.string().matches(
      /^[0-9]*$/,
      "Please enter a valid phone number"
    ),
    mobile: Yup.string().matches(
      /^[0-9]*$/,
      "Please enter a valid mobile number"
    ),
    tradeLicenseNumber: Yup.string()
      .required("Please enter Trade License Number")
      .matches(/^[ A-Za-z0-9/-]*$/, "Alphanumeric, / and - are only allowed"),
    tradeFile: Yup.mixed()
      .test("fileSize", "Exceeds maximum file size (Max 50 MB)", (value) => {
        if (value) {
          return value.size <= FILE_SIZE;
        }
        return true;
      })
      .test("fileFormat", "Unsupported Format", (value) => {
        if (value) {
          let regex = /(?:\.([^.]+))?$/;
          let ext = regex.exec(value.name)[1];
          return SUPPORTED_FORMATS.includes(ext?.toLowerCase());
        }
        return true;
      }),
    vatPeriod: Yup.string(),
    trnNumber: Yup.number()
      .typeError("TRN must be a number")
      .required("Please enter TRN Number")
      .test(
        "len",
        "15 digits required",
        (val) => val >= 0 && String(val).length === 15
      ),
    email: Yup.string()
      .required("Please enter Email")
      .email("Please enter a valid Email"),
    password: Yup.string()
      .required("Please enter Password")
      .matches(
        /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{6,})/,
        "Must Contain 6 Characters, One Uppercase, One Lowercase, One Number and One Special Case Character"
      ),
    conpassword: Yup.string()
      .required("Please confirm Password")
      .oneOf([Yup.ref("password")], "Passwords are not matching"),
    contact_person: Yup.string().required("Please enter Contact Person name"),
    cp_mobile: Yup.string()
      .required("Please enter Contact Person number")
      .matches(/^[0-9]*$/, "Please enter a valid mobile number"),
    ftaEmail: Yup.string()
      // .required("Please enter FTA Email")
      .email("Please enter a valid FTA Email"),
    ftaPassword: Yup.string(),
    trnFile: Yup.mixed()
      .test("fileSize", "Exceeds maximum file size (Max 50MB)", (value) => {
        if (value) {
          return value.size <= FILE_SIZE;
        }
        return true;
      })
      .test("fileFormat", "Unsupported Format", (value) => {
        if (value) {
          let regex = /(?:\.([^.]+))?$/;
          let ext = regex.exec(value.name)[1];
          return SUPPORTED_FORMATS.includes(ext?.toLowerCase());
        }
        return true;
      }),
  });

  useEffect(() => {
    getContries();
  }, []);

  const onSignInClick = (e) => {
    if (e) e.preventDefault();
    close();
    openSignin(e);
  };

  const getContries = () => {
    onShowLoader(true);
    callApi("get", ApiConstants.lookups.getCountry, {})
      .then((response) => {
        onShowLoader(false);
        if (response && response.status_code === 200) {
          let updatedList = response.payload?.map((i) => {
            return { ...i, value: i.id, label: i.name };
          });
          setCountriesList(updatedList);
          onSelectCountry(updatedList[0]);
        } else {
          showNotification("Error", response.message, "error");
        }
      })
      .catch((error) => {
        onShowLoader(false);
        showNotification("Error", "Something went wrong", "error");
      });
  };

  const onSelectCountry = (value) => {
    setSelectedCountry(value);
    setSelectedEmirate("");
    setEmiratesList(
      value.regions?.map((i) => {
        return { ...i, value: i.id, label: i.name };
      })
    );
  };

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

  const onSubmit = async (values) => {
    onShowLoader(true);
    let params = {
      email: values.email,
      w_country_code: selectedCountry.phone_code,
      whatsapp_no: values.whatsappno,
      name: values.companyName,
      building_name: values.buildingName,
      country_id: parseInt(values.country),
      region_id: parseInt(values.emairate),
      country_code: selectedCountry.phone_code,
      mobile: values.mobile,
      join_date: new Date(),
      salary: 0,
      p_o_box: values.poBox,
      palce: values.place,
      city: values.city,
      trade_license_number: values.tradeLicenseNumber,
      vat_period: values.vatPeriod,
      trn_number: values.trnNumber,
      trade_license_image_id: 0,
      fta_email: values.ftaEmail,
      fta_password: values.ftaPassword,
      l_country_code: selectedCountry.phone_code,
      landline: values.landphone,
      contact_person: values.contact_person,
      cp_country_code: selectedCountry.phone_code,
      cp_mobile: values.cp_mobile,
      tran_certificate_id: 0,
      password: values.password,
    };

    if (values.tradeFile) {
      await uploadFiles(values.tradeFile)
        .then((response) => {
          params.trade_license_image_id = response.payload.file_id;
        })
        .catch((error) => {});
    }

    if (values.trnFile) {
      await uploadFiles(values.trnFile)
        .then((response) => {
          params.tran_certificate_id = response.payload.file_id;
        })
        .catch((error) => {});
    }

    let promiseStack = [];

    if (values.tradeFile) {
      promiseStack.push(uploadFiles(values.tradeFile));
    } else {
      params.trade_license_image_id = 0;
    }

    if (values.trnFile) {
      promiseStack.push(uploadFiles(values.trnFile));
    } else {
      params.tran_certificate_id = 0;
    }

    if (promiseStack.length) {
      Promise.all(promiseStack)
        .then((response) => {
          onShowLoader(false);
          if (values.tradeFile) {
            params.trade_license_image_id = response[0]?.payload?.file_id
              ? response[0].payload.file_id
              : 0;
          }
          if (values.trnFile) {
            if (values.tradeFile) {
              params.tran_certificate_id = response[1]?.payload?.file_id
                ? response[1].payload.file_id
                : 0;
            } else {
              params.tran_certificate_id = response[0]?.payload?.file_id
                ? response[0].payload.file_id
                : 0;
            }
          }
          registerUser(params);
        })
        .catch((error) => {
          onShowLoader(false);
          registerUser(params);
        });
    } else {
      registerUser(params);
    }
  };

  const registerUser = (params) => {
    onShowLoader(true);
    callApi("post", ApiConstants.client.register, params)
      .then((response) => {
        if (response && response.status_code === 201) {
          showNotification("Success", response.message, "success");
          onSignInClick(null);
        } else {
          onShowLoader(false);
          showNotification("Error", response.message, "error");
        }
        onShowLoader(false);
      })
      .catch((error) => {
        onShowLoader(false);
        showNotification("Error", "Something went wrong", "error");
      });
  };

  return (
    <React.Fragment>
      <div className="auth-wrapper aut-bg-img">
        <div className="container">
          <div className="text-center mt-5">
            <h4 className="">Get started</h4>
          </div>
          <div className="card shadow-none">
            <div className="card-body py-2">
              <div className="row">
                <div className="col-12">
                  <div className="mb-1 text-center ">
                    <Link to="/home">
                      <img src={logo} alt="Logo" style={{ height: 70 }} />
                    </Link>
                  </div>
                  <h5 className="mb-4 text-left" style={{ color: "#096DA9" }}>
                    Sign up
                  </h5>
                  <Formik
                    enableReinitialize={true}
                    initialValues={{
                      companyName: "",
                      buildingName: "",
                      poBox: "",
                      place: "",
                      city: "",
                      emairate: "",
                      country: selectedCountry.value,
                      whatsappno: "",
                      landphone: "",
                      mobile: "",
                      tradeLicenseNumber: "",
                      tradeFile: undefined,
                      trnNumber: "",
                      email: "",
                      password: "",
                      conpassword: "",
                      contact_person: "",
                      cp_mobile: "",
                      ftaEmail: "",
                      ftaPassword: "",
                      trnFile: undefined,
                    }}
                    validationSchema={SignUpSchema}
                    onSubmit={(values) => onSubmit(values)}>
                    {({ errors, handleChange, setFieldValue, values }) => (
                      <Form>
                        <div className="row form-container">
                          <div className="col-12 col-lg-6">
                            <label>Company Name</label>
                            <div className="input-group mb-3">
                              <Field
                                type="text"
                                className={`form-control ${
                                  errors.companyName && isSubmitted
                                    ? "is-invalid"
                                    : ""
                                }`}
                                placeholder="Company Name"
                                name="companyName"
                              />
                              <ErrorMessage name="companyName">
                                {(msg) => (
                                  <div className="invalid-feedback">{msg}</div>
                                )}
                              </ErrorMessage>
                            </div>
                          </div>
                          <div className="col-12 col-lg-6">
                            <label>Building Name</label>
                            <div className="input-group mb-3">
                              <Field
                                type="text"
                                className={`form-control ${
                                  errors.buildingName && isSubmitted
                                    ? "is-invalid"
                                    : ""
                                }`}
                                placeholder="Building Name"
                                name="buildingName"
                              />
                              <ErrorMessage name="buildingName">
                                {(msg) => (
                                  <div className="invalid-feedback">{msg}</div>
                                )}
                              </ErrorMessage>
                            </div>
                          </div>
                          <div className="col-12 col-lg-6">
                            <label>P O Box</label>
                            <div className="input-group mb-3">
                              <Field
                                type="text"
                                className={`form-control ${
                                  errors.poBox && isSubmitted
                                    ? "is-invalid"
                                    : ""
                                }`}
                                placeholder="P O Box"
                                name="poBox"
                              />
                              <ErrorMessage name="poBox">
                                {(msg) => (
                                  <div className="invalid-feedback">{msg}</div>
                                )}
                              </ErrorMessage>
                            </div>
                          </div>
                          <div className="col-12 col-lg-6">
                            <label>Place / Street name</label>
                            <div className="input-group mb-3">
                              <Field
                                type="text"
                                className={`form-control ${
                                  errors.place && isSubmitted
                                    ? "is-invalid"
                                    : ""
                                }`}
                                placeholder="Place / Street name"
                                name="place"
                              />
                              <ErrorMessage name="place">
                                {(msg) => (
                                  <div className="invalid-feedback">{msg}</div>
                                )}
                              </ErrorMessage>
                            </div>
                          </div>
                          <div className="col-12 col-lg-6">
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
                                {(msg) => (
                                  <div className="invalid-feedback">{msg}</div>
                                )}
                              </ErrorMessage>
                            </div>
                          </div>
                          <div className="col-12 col-lg-6">
                            <label>Country</label>
                            <div className="input-group mb-3">
                              <Select
                                className={`w-100 form-control-select ${
                                  errors.country && isSubmitted
                                    ? "is-invalid"
                                    : ""
                                }`}
                                classNamePrefix="select"
                                options={countriesList}
                                placeholder="Select Country"
                                isDisabled
                                isSearchable={false}
                                value={selectedCountry}
                                onChange={(value) => {
                                  onSelectCountry(value);
                                  let event = {
                                    target: {
                                      name: "country",
                                      value: value.id,
                                    },
                                  };
                                  handleChange(event);
                                  setTimeout(() => {
                                    setFieldValue("region", "");
                                  }, 100);
                                }}
                              />
                              <ErrorMessage name="country">
                                {(msg) => (
                                  <div className="invalid-feedback">{msg}</div>
                                )}
                              </ErrorMessage>
                            </div>
                          </div>
                          <div className="col-12 col-lg-6">
                            <label>Emirate</label>
                            <div className="input-group mb-3">
                              <Select
                                className={`w-100 form-control-select ${
                                  errors.emairate && isSubmitted
                                    ? "is-invalid"
                                    : ""
                                }`}
                                classNamePrefix="select"
                                options={emiratesList}
                                placeholder="Select Emirate"
                                isSearchable
                                value={selectedEmirate}
                                onChange={(value) => {
                                  setSelectedEmirate(value);
                                  let event = {
                                    target: {
                                      name: "emairate",
                                      value: value.id,
                                    },
                                  };
                                  handleChange(event);
                                }}
                              />
                              <ErrorMessage name="emairate">
                                {(msg) => (
                                  <div className="invalid-feedback">{msg}</div>
                                )}
                              </ErrorMessage>
                            </div>
                          </div>
                          <div className="col-12 col-lg-6">
                            <label>Whatsapp No</label>
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
                                  errors.whatsappno && isSubmitted
                                    ? "is-invalid"
                                    : ""
                                }`}
                                placeholder="Whatsapp No"
                                name="whatsappno"
                              />
                              <ErrorMessage name="whatsappno">
                                {(msg) => (
                                  <div className="invalid-feedback">{msg}</div>
                                )}
                              </ErrorMessage>
                            </div>
                          </div>
                          <div className="col-12 col-lg-6">
                            <label>Land Line Number</label>
                            <div className="input-group mb-3">
                              <div className="input-group-prepend bg-light">
                                <span
                                  className={`input-group-text ${
                                    errors.landphone && isSubmitted
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
                                  errors.landphone && isSubmitted
                                    ? "is-invalid"
                                    : ""
                                }`}
                                placeholder="Land Line Number"
                                name="landphone"
                              />
                              <ErrorMessage name="landphone">
                                {(msg) => (
                                  <div className="invalid-feedback">{msg}</div>
                                )}
                              </ErrorMessage>
                            </div>
                          </div>
                          <div className="col-12 col-lg-6">
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
                                  errors.mobile && isSubmitted
                                    ? "is-invalid"
                                    : ""
                                }`}
                                placeholder="Mobile Number"
                                name="mobile"
                              />
                              <ErrorMessage name="mobile">
                                {(msg) => (
                                  <div className="invalid-feedback">{msg}</div>
                                )}
                              </ErrorMessage>
                            </div>
                          </div>

                          <div className="col-12 col-lg-6">
                            <label>Trade License Number</label>
                            <div className="input-group mb-3">
                              <Field
                                type="text"
                                className={`form-control ${
                                  errors.tradeLicenseNumber && isSubmitted
                                    ? "is-invalid"
                                    : ""
                                }`}
                                placeholder="Trade License Number"
                                name="tradeLicenseNumber"
                              />
                              <ErrorMessage name="tradeLicenseNumber">
                                {(msg) => (
                                  <div className="invalid-feedback">{msg}</div>
                                )}
                              </ErrorMessage>
                            </div>
                          </div>
                          <div className="col-12 col-lg-6">
                            <label>Upload Trade License Copy</label>
                            <div className="input-group">
                              <input
                                id="tradeFile"
                                className={`form-control ${
                                  errors.tradeFile && isSubmitted
                                    ? "is-invalid"
                                    : ""
                                }`}
                                type="file"
                                onChange={(event) => {
                                  setFieldValue(
                                    "tradeFile",
                                    event.currentTarget.files[0]
                                  );
                                }}
                              />

                              <ErrorMessage name="tradeFile">
                                {(msg) => (
                                  <div className="invalid-feedback">{msg}</div>
                                )}
                              </ErrorMessage>
                            </div>
                            <div style={{ fontSize: 10 }} className="mb-3">
                              Supported file formats JPG, JPEG, PNG, BMP, PDF,
                              DOC, DOCX
                            </div>
                          </div>
                          <div className="col-12 col-lg-6">
                            <label>
                              TRN{" "}
                              <OverlayTrigger
                                placement="top"
                                overlay={
                                  <Tooltip id={`tooltip-top`}>
                                    15 digits in length
                                  </Tooltip>
                                }>
                                <i
                                  className="fa fa-info-circle"
                                  style={{ cursor: "pointer" }}></i>
                              </OverlayTrigger>
                            </label>
                            <div className="input-group mb-3">
                              <Field
                                type="text"
                                className={`form-control ${
                                  errors.trnNumber && isSubmitted
                                    ? "is-invalid"
                                    : ""
                                }`}
                                placeholder="TRN"
                                name="trnNumber"
                              />
                              <ErrorMessage name="trnNumber">
                                {(msg) => (
                                  <div className="invalid-feedback">{msg}</div>
                                )}
                              </ErrorMessage>
                            </div>
                          </div>
                          <div className="col-12 col-lg-6">
                            <label>Email</label>
                            <div className="input-group mb-3">
                              <Field
                                type="text"
                                className={`form-control ${
                                  errors.email && isSubmitted
                                    ? "is-invalid"
                                    : ""
                                }`}
                                placeholder="Email"
                                name="email"
                              />
                              <ErrorMessage name="email">
                                {(msg) => (
                                  <div className="invalid-feedback">{msg}</div>
                                )}
                              </ErrorMessage>
                            </div>
                          </div>
                          <div className="col-12 col-lg-6">
                            <label>
                              Password{" "}
                              <OverlayTrigger
                                placement="top"
                                overlay={
                                  <Tooltip id={`tooltip-top`}>
                                    1 upper case, 1 smaller case, 1 special
                                    character and a number with minimum 6
                                    characters in length
                                  </Tooltip>
                                }>
                                <i
                                  className="fa fa-info-circle"
                                  style={{ cursor: "pointer" }}></i>
                              </OverlayTrigger>
                            </label>

                            <div className="input-group mb-4">
                              <Field
                                type="password"
                                className={`form-control ${
                                  errors.password && isSubmitted
                                    ? "is-invalid"
                                    : ""
                                }`}
                                placeholder="Password"
                                name="password"
                              />
                              <ErrorMessage name="password">
                                {(msg) => (
                                  <div className="invalid-feedback">{msg}</div>
                                )}
                              </ErrorMessage>
                            </div>
                          </div>
                          <div className="col-12 col-lg-6">
                            <label>Confirm Password</label>
                            <div className="input-group mb-4">
                              <Field
                                type="password"
                                className={`form-control ${
                                  errors.conpassword && isSubmitted
                                    ? "is-invalid"
                                    : ""
                                }`}
                                placeholder="Confirm Password"
                                name="conpassword"
                              />
                              <ErrorMessage name="conpassword">
                                {(msg) => (
                                  <div className="invalid-feedback">{msg}</div>
                                )}
                              </ErrorMessage>
                            </div>
                          </div>
                          <div className="col-12 col-lg-6">
                            <label>Contact Person</label>
                            <div className="input-group mb-3">
                              <Field
                                type="text"
                                className={`form-control ${
                                  errors.contact_person && isSubmitted
                                    ? "is-invalid"
                                    : ""
                                }`}
                                placeholder="Contact Person"
                                name="contact_person"
                              />
                              <ErrorMessage name="contact_person">
                                {(msg) => (
                                  <div className="invalid-feedback">{msg}</div>
                                )}
                              </ErrorMessage>
                            </div>
                          </div>
                          <div className="col-12 col-lg-6">
                            <label>Contact Number</label>
                            <div className="input-group mb-3">
                              <div className="input-group-prepend bg-light">
                                <span
                                  className={`input-group-text ${
                                    errors.cp_mobile && isSubmitted
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
                                  errors.cp_mobile && isSubmitted
                                    ? "is-invalid"
                                    : ""
                                }`}
                                placeholder="Contact Number"
                                name="cp_mobile"
                              />
                              <ErrorMessage name="cp_mobile">
                                {(msg) => (
                                  <div className="invalid-feedback">{msg}</div>
                                )}
                              </ErrorMessage>
                            </div>
                          </div>
                          <div className="col-12">
                            <hr />
                          </div>
                          <div className="col-12 my-2">
                            <label style={{ color: "#096DA9" }}>
                              FTA Login Details &nbsp;
                              <i className="fa fa-info-circle"></i>
                            </label>
                          </div>

                          <div className="col-12 col-lg-6">
                            <label>FTA Email</label>
                            <div className="input-group mb-3">
                              <Field
                                type="text"
                                className={`form-control ${
                                  errors.ftaEmail && isSubmitted
                                    ? "is-invalid"
                                    : ""
                                }`}
                                placeholder="FTA Email"
                                name="ftaEmail"
                              />
                              <ErrorMessage name="ftaEmail">
                                {(msg) => (
                                  <div className="invalid-feedback">{msg}</div>
                                )}
                              </ErrorMessage>
                            </div>
                          </div>
                          <div className="col-12 col-lg-6">
                            <label>FTA Password</label>
                            <div className="input-group mb-3">
                              <Field
                                type="password"
                                className={`form-control ${
                                  errors.ftaPassword && isSubmitted
                                    ? "is-invalid"
                                    : ""
                                }`}
                                placeholder="FTA Password"
                                name="ftaPassword"
                              />
                              <ErrorMessage name="ftaPassword">
                                {(msg) => (
                                  <div className="invalid-feedback">{msg}</div>
                                )}
                              </ErrorMessage>
                            </div>
                          </div>
                          <div className="col-12 col-lg-6">
                            <label>Upload TRN Certificate</label>
                            <div className="input-group">
                              <input
                                id="trnFile"
                                className={`form-control ${
                                  errors.trnFile && isSubmitted
                                    ? "is-invalid"
                                    : ""
                                }`}
                                type="file"
                                onChange={(event) => {
                                  setFieldValue(
                                    "trnFile",
                                    event.currentTarget.files[0]
                                  );
                                }}
                              />
                              <ErrorMessage name="trnFile">
                                {(msg) => (
                                  <div className="invalid-feedback">{msg}</div>
                                )}
                              </ErrorMessage>
                            </div>
                            <div style={{ fontSize: 10 }} className="mb-3">
                              Supported file formats JPG, JPEG, PNG, BMP, PDF,
                              DOC, DOCX
                            </div>
                          </div>

                          <div className="col-12 text-center">
                            <button
                              type="submit"
                              style={{ width: 180, fontWeight: "bold" }}
                              className="btn btn-primary shadow-2 my-4"
                              onClick={() => setIsSubmitted(true)}>
                              Sign Up
                            </button>
                            <p className="mb-4 text-muted">
                              Allready have an account?
                              <a
                                style={{ color: "#096DA9", fontSize: 13 }}
                                className="ml-2"
                                href="/home"
                                onClick={onSignInClick}>
                                Login
                              </a>
                            </p>
                          </div>
                        </div>
                      </Form>
                    )}
                  </Formik>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </React.Fragment>
  );
};

export default SignUp;
