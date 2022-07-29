import React, { useState, useEffect } from "react";
import { Row, Col } from "react-bootstrap";
import { Formik, Field, Form, ErrorMessage } from "formik";
import * as Yup from "yup";
import Select from "react-select";

import { callApi } from "../../../services/apiService";
import { showNotification } from "../../../services/toasterService";
import { ApiConstants } from "../../../config/apiConstants";

const UserForm = (props) => {
  const [isSubmitted, setIsSubmitted] = useState(false);
  const [countriesList, setCountriesList] = useState([]);
  const [emiratesList, setEmiratesList] = useState([]);
  const [selectedCountry, setSelectedCountry] = useState("");
  const [selectedEmirate, setSelectedEmirate] = useState("");
  const [userData, setUserData] = useState(null);

  const UserFormSchema = Yup.object().shape({
    name: Yup.string().required("Please enter Name"),
    trn: Yup.string().required("Please enter TRN"),
    email: Yup.string()
      .required("Please enter Email ")
      .email("Please enter a valid Email"),
    building_name: Yup.string().required("Please enter Building Name"),
    place: Yup.string().required("Please enter Place"),
    po_box: Yup.string().required("Please enter PO Box"),
    city: Yup.string().required("Please enter City"),
    region: Yup.string().required("Please select Emirate"),
    country: Yup.string().required("Please select Country"),
    whatsappno: Yup.string()
      .required("Please enter Whatsapp No")
      .matches(/^[0-9]*$/, "Please enter a valid phone number"),
  });

  useEffect(() => {
    getContries();
  }, []);

  useEffect(() => {
    if (props.isEdit && countriesList.length) {
      getUserData(props?.dataItem?.id);
    }
  }, [countriesList]);

  const onSubmit = (values) => {
    props.onShowLoader(true);

    let params = {
      email: values.email,
      w_country_code: selectedCountry.phone_code,
      whatsapp_no: values.whatsappno,
      name: values.name,
      trn: values.trn,
      building_name: values.building_name,
      country_id: parseInt(values.country),
      region_id: parseInt(values.region),
      p_o_box: values.po_box,
      palce: values.place,
      city: values.city,
    };

    props.isEdit
      ? updateUser({ ...params, user_id: userData?.id })
      : createUser(params);
  };

  const createUser = (params) => {
    callApi("post", ApiConstants.supplier.addsupplier, params)
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
    callApi("post", ApiConstants.supplier.update, params, true)
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
    setSelectedEmirate("");
    setEmiratesList(
      value.regions?.map((i) => {
        return { ...i, value: i.id, label: i.name };
      })
    );
  };

  const getUserData = (user_id) => {
    props.onShowLoader(true);
    callApi("get", ApiConstants.supplier.getsupplier, { user_id }, true)
      .then((response) => {
        if (response && response.status_code === 200) {
          setUserData(response.payload);
          let selectedCountry = countriesList.find(
            (i) => i.id === response.payload?.supplier_user?.country_id
          );
          if (selectedCountry) {
            onSelectCountry(selectedCountry);
            let selectedRegion = selectedCountry.regions.find(
              (i) => i.id === response.payload?.supplier_user?.region_id
            );
            setSelectedEmirate({
              ...selectedRegion,
              value: selectedRegion.id,
              label: selectedRegion.name,
            });
          }
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
            {props.isEdit ? "Update" : "Add"} Supplier
          </h5>
        </div>
        <div className="card-body">
          <Formik
            enableReinitialize={true}
            initialValues={{
              name: userData?.name ? userData.name : "",
              trn: userData?.supplier_user?.trn
                ? userData?.supplier_user.trn
                : "",
              email: userData?.email ? userData.email : "",
              building_name: userData?.supplier_user?.building_name
                ? userData?.supplier_user.building_name
                : "",
              place: userData?.supplier_user?.palce
                ? userData?.supplier_user.palce
                : "",
              po_box: userData?.supplier_user?.p_o_box
                ? userData?.supplier_user.p_o_box
                : "",
              city: userData?.supplier_user?.city
                ? userData?.supplier_user.city
                : "",
              country: userData?.supplier_user?.country_id
                ? userData?.supplier_user.country_id
                : "",
              region: userData?.supplier_user?.region_id
                ? userData?.supplier_user.region_id
                : "",
              whatsappno: userData?.whatsapp_no ? userData.whatsapp_no : "",
            }}
            validationSchema={UserFormSchema}
            onSubmit={(values) => onSubmit(values)}>
            {({ errors, handleChange, setFieldValue, values }) => (
              <Form>
                <Row>
                  <Col xs={12} xl={6}>
                    <label>Supplier Name</label>
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
                    <label>TRN</label>
                    <div className="input-group mb-3">
                      <Field
                        type="text"
                        className={`form-control ${
                          errors.trn && isSubmitted ? "is-invalid" : ""
                        }`}
                        placeholder="TRN"
                        name="trn"
                      />
                      <ErrorMessage name="trn">
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
                    <label>Building Name</label>
                    <div className="input-group mb-3">
                      <Field
                        type="text"
                        className={`form-control ${
                          errors.building_name && isSubmitted
                            ? "is-invalid"
                            : ""
                        }`}
                        placeholder="Building Name"
                        name="building_name"
                      />
                      <ErrorMessage name="building_name">
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
                          setTimeout(() => {
                            setFieldValue("region", "");
                          }, 100);
                        }}
                      />
                      <ErrorMessage name="country">
                        {(msg) => <div className="invalid-feedback">{msg}</div>}
                      </ErrorMessage>
                    </div>
                  </Col>
                  <Col xs={12} xl={6}>
                    <label>Emirate</label>
                    <div className="input-group mb-3">
                      <Select
                        className={`w-100 form-control-select ${
                          errors.region && isSubmitted ? "is-invalid" : ""
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
                              name: "region",
                              value: value.id,
                            },
                          };
                          handleChange(event);
                        }}
                      />
                      <ErrorMessage name="region">
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
