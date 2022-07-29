import React, { useState, useEffect } from "react";
import { Row, Col } from "react-bootstrap";
import { Formik, Field, Form, ErrorMessage } from "formik";
import * as Yup from "yup";
import DatePicker from "react-datepicker";
import moment from "moment";
import Select from "react-select";

import { showNotification } from "../../../services/toasterService";
import { callApi } from "../../../services/apiService";
import { ApiConstants } from "../../../config/apiConstants";

const UserForm = (props) => {
  const [isSubmitted, setIsSubmitted] = useState(false);
  const [countriesList, setCountriesList] = useState([]);
  const [selectedCountry, setSelectedCountry] = useState("");
  const [join_date, setJoinDate] = useState(null);
  const [userData, setUserData] = useState(null);

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
    join_date: Yup.mixed().required("Please select Join Date"),
    salary: Yup.string()
      .required("Please enter Monthly Salary")
      .matches(/^[0-9]*$/, "Please enter a valid Salary"),
  });

  useEffect(() => {
    getContries();
    if (props.isEdit) {
      getUserData(props?.dataItem?.id);
    }
  }, []);

  const onSubmit = (values) => {
    props.onShowLoader(true);

    let params = {
      email: values.email,
      w_country_code: selectedCountry.phone_code,
      whatsapp_no: values.whatsappno,
      name: values.name,
      country_id: parseInt(values.country),
      country_code: selectedCountry.phone_code,
      mobile: values.mobile,
      join_date: moment(values.join_date).format("YYYY-MM-DD"),
      salary: values.salary,
      p_o_box: values.po_box,
      palce: values.place,
      city: values.city,
    };

    props.isEdit
      ? updateUser({ ...params, user_id: userData?.id })
      : createUser(params);
  };

  const createUser = (params) => {
    callApi("post", ApiConstants.admin.register, params, true)
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

  const updateUser = (params) => {
    callApi("post", ApiConstants.admin.updatebyadmin, params, true)
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

  const onSelectCountry = (value) => {
    setSelectedCountry(value);
  };

  const getUserData = (user_id) => {
    props.onShowLoader(true);
    callApi("get", ApiConstants.user.getuser, { user_id }, true)
      .then((response) => {
        if (response && response.status_code === 200) {
          setUserData(response.payload);
          onSelectCountry(response.payload?.admin_user?.country);
          if (response.payload?.admin_user?.join_date)
            setJoinDate(new Date(response.payload?.admin_user?.join_date));
        } else {
          showNotification("Error", response.message, "error");
        }
        props.onShowLoader(false);
      })
      .catch((error) => {
        showNotification("Error", "Something went wrong", "error");
        props.onShowLoader(false);
      });
  };

  return (
    <React.Fragment>
      <div className="card shadow-none mb-0 rounded">
        <div className="card-header">
          <h5 className="text-primary">
            {props.isEdit ? "Update" : "Add"} Admin User
          </h5>
        </div>
        <div className="card-body">
          <Formik
            enableReinitialize={true}
            initialValues={{
              name: userData?.name ? userData.name : "",
              email: userData?.email ? userData.email : "",
              place: userData?.admin_user?.palce
                ? userData?.admin_user.palce
                : "",
              po_box: userData?.admin_user?.p_o_box
                ? userData?.admin_user.p_o_box
                : "",
              city: userData?.admin_user?.city ? userData?.admin_user.city : "",
              country: userData?.admin_user?.country_id
                ? userData?.admin_user.country_id
                : "",
              whatsappno: userData?.whatsapp_no ? userData.whatsapp_no : "",
              mobile: userData?.admin_user?.mobile
                ? userData?.admin_user.mobile
                : "",
              join_date: userData?.admin_user?.join_date
                ? new Date(userData?.admin_user.join_date)
                : "",
              salary: userData?.admin_user?.salary
                ? userData?.admin_user.salary
                : "",
            }}
            validationSchema={UserFormSchema}
            onSubmit={(values) => onSubmit(values)}>
            {({ errors, handleChange, values }) => (
              <Form>
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
                        value={countriesList.find(
                          (i) => i.id === values.country
                        )}
                        options={countriesList}
                        placeholder="Select Country"
                        isSearchable={false}
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
                          errors.whatsappno && isSubmitted ? "is-invalid" : ""
                        }`}
                        placeholder="Whatsapp No"
                        name="whatsappno"
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
                  <Col xs={12} xl={6}>
                    <label>Joining Date</label>
                    <div className="date-picker-container mb-3">
                      <DatePicker
                        className={`form-control ${
                          errors.join_date && isSubmitted ? "is-invalid" : ""
                        }`}
                        placeholderText="Joining Date"
                        dateFormat="dd/MM/yyyy"
                        selected={join_date}
                        onChange={(value) => {
                          setJoinDate(value);
                          let event = {
                            target: {
                              name: "join_date",
                              value: value,
                            },
                          };
                          handleChange(event);
                        }}
                      />
                      <i className="feather icon-calendar"></i>
                      <ErrorMessage name="join_date">
                        {(msg) => (
                          <div className="invalid-feedback d-block">{msg}</div>
                        )}
                      </ErrorMessage>
                    </div>
                  </Col>
                  <Col xs={12} xl={6}>
                    <label>Monthly Salary</label>
                    <div className="input-group mb-3">
                      <div className="input-group-prepend bg-light">
                        <span
                          className={`input-group-text ${
                            errors.salary && isSubmitted
                              ? "border border-danger"
                              : ""
                          }`}
                          id="country-code"
                          style={{ fontSize: 14 }}>
                          {selectedCountry.currency_code}
                        </span>
                      </div>
                      <Field
                        type="text"
                        className={`form-control ${
                          errors.salary && isSubmitted ? "is-invalid" : ""
                        }`}
                        placeholder="Monthly Salary"
                        name="salary"
                      />
                      <ErrorMessage name="salary">
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
                    {props.isEdit ? "Update" : "Create Account"}
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

export default UserForm;
