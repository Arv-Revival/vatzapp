import React, { useState } from "react";
import { Row, Col } from "react-bootstrap";
import { Formik, Field, Form, ErrorMessage } from "formik";
import * as Yup from "yup";
import Select from "react-select";
import DatePicker from "react-datepicker";

import { callApi } from "../../../services/apiService";
import { showNotification } from "../../../services/toasterService";
import { ApiConstants } from "../../../config/apiConstants";
import { vatPlans } from "../../../enums/vatOptions";
import { paymentTypes } from "../../../enums/paymentTypes";

const AddNewPlan = (props) => {
  const [isSubmitted, setIsSubmitted] = useState(false);
  const [toDate, setToDate] = useState("");
  const [fromDate, setFromDate] = useState("");
  const [paymentDate, setPaymentDate] = useState("");

  const PlanFormSchema = Yup.object().shape({
    vat_plan: Yup.string().required("Please select Plan"),
    plan_amount: Yup.string(),
    fromDate: Yup.mixed().required("Please select From Date"),
    toDate: Yup.mixed().required("Please select To Date"),
    payment_type: Yup.string().required("Please select Payment Type"),
    payment_date: Yup.mixed().required("Please select Payment Date"),
    payment_amount: Yup.string()
      .required("Please enter Payment Amount")
      .matches(/^[0-9]*$/, "Please enter a valid amount"),
    ref: Yup.string(),
  });

  const onSubmit = (values) => {
    props.onShowLoader(true);
    let params = {
      user_id: props.userId,
      plan_name: values.vat_plan,
      ref: values.ref,
      from: values.fromDate,
      to: values.toDate,
      payment_type: values.payment_type,
      payment_date: values.payment_date,
      payment_amount: values.payment_amount,
      payment_currency: props.selectedCountry?.currency_code,
    };
    callApi("post", ApiConstants.plans.newplan, params)
      .then((response) => {
        props.onShowLoader(false);
        if (response && response.status_code === 201) {
          showNotification("Success", response.message, "success");
          props.onSuccess();
          props.toggleModal(false);
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
          <h5 className="text-primary">Add New Payment</h5>
        </div>
        <div className="card-body">
          <Formik
            enableReinitialize={true}
            initialValues={{
              vat_plan: "",
              plan_amount: "",
              fromDate: "",
              toDate: "",
              payment_type: "",
              payment_date: "",
              payment_amount: "",
              subscription_expiry: "",
            }}
            validationSchema={PlanFormSchema}
            onSubmit={(values) => onSubmit(values)}>
            {({ errors, handleChange, setFieldValue }) => (
              <Form>
                <Row className="form-container">
                  <Col xs={12} lg={6} className="mb-2">
                    <label>Plan</label>
                    <Select
                      className={`w-100 form-control-select ${
                        errors.vat_plan && isSubmitted ? "is-invalid" : ""
                      }`}
                      classNamePrefix="select"
                      options={vatPlans}
                      placeholder="Plan"
                      isSearchable={false}
                      onChange={(value) => {
                        let event = {
                          target: {
                            name: "vat_plan",
                            value: value.value,
                          },
                        };
                        handleChange(event);
                        setTimeout(() => {
                          setFieldValue("payment_amount", value.amount);
                          setFieldValue("plan_amount", value.amount);
                        }, 100);
                      }}
                    />
                    <ErrorMessage name="vat_plan">
                      {(msg) => <div className="invalid-feedback">{msg}</div>}
                    </ErrorMessage>
                  </Col>
                  <Col xs={12} lg={6} className="mb-2">
                    <label>Plan Amount</label>
                    <div className="input-group">
                      <div className="input-group-prepend bg-light">
                        <span
                          className="input-group-text"
                          id="country-code"
                          style={{ fontSize: 14 }}>
                          {props.selectedCountry?.currency_code}
                        </span>
                      </div>
                      <Field
                        type="text"
                        className={`form-control ${
                          errors.plan_amount && isSubmitted ? "is-invalid" : ""
                        }`}
                        placeholder="Plan Amount"
                        name="plan_amount"
                        disabled
                        tabIndex={1}
                      />
                    </div>
                  </Col>
                  <Col xs={12} lg={6} className="mb-2">
                    <label>From Date</label>
                    <div className="date-picker-container">
                      <DatePicker
                        className={`form-control ${
                          errors.fromDate && isSubmitted ? "is-invalid" : ""
                        }`}
                        placeholderText="From Date"
                        dateFormat="dd/MM/yyyy"
                        selected={fromDate}
                        onChange={(value) => {
                          setFromDate(value);
                          let event = {
                            target: {
                              name: "fromDate",
                              value: value,
                            },
                          };
                          handleChange(event);
                          setToDate("");
                          setTimeout(() => {
                            setFieldValue("toDate", "");
                          }, 100);
                        }}
                      />
                      <i className="feather icon-calendar"></i>
                      <ErrorMessage name="fromDate">
                        {(msg) => (
                          <div className="invalid-feedback d-block">{msg}</div>
                        )}
                      </ErrorMessage>
                    </div>
                  </Col>
                  <Col xs={12} lg={6} className="mb-2">
                    <label>To Date</label>
                    <div className="date-picker-container">
                      <DatePicker
                        className={`form-control ${
                          errors.toDate && isSubmitted ? "is-invalid" : ""
                        }`}
                        placeholderText="To Date"
                        minDate={fromDate}
                        dateFormat="dd/MM/yyyy"
                        selected={toDate}
                        onChange={(value) => {
                          setToDate(value);
                          let event = {
                            target: {
                              name: "toDate",
                              value: value,
                            },
                          };
                          handleChange(event);
                        }}
                      />
                      <i className="feather icon-calendar"></i>
                      <ErrorMessage name="toDate">
                        {(msg) => (
                          <div className="invalid-feedback d-block">{msg}</div>
                        )}
                      </ErrorMessage>
                    </div>
                  </Col>
                  <Col xs={12} lg={6} className="mb-2">
                    <label>Payment Types</label>
                    <Select
                      className={`w-100 form-control-select ${
                        errors.payment_type && isSubmitted ? "is-invalid" : ""
                      }`}
                      classNamePrefix="select"
                      options={paymentTypes}
                      placeholder="Payment Types"
                      isSearchable={false}
                      onChange={(value) => {
                        let event = {
                          target: {
                            name: "payment_type",
                            value: value.value,
                          },
                        };
                        handleChange(event);
                        setTimeout(() => {
                          if (value.value === "Free")
                            setFieldValue("payment_amount", 0);
                        }, 100);
                      }}
                    />
                    <ErrorMessage name="payment_type">
                      {(msg) => <div className="invalid-feedback">{msg}</div>}
                    </ErrorMessage>
                  </Col>
                  <Col xs={12} lg={6} className="mb-2">
                    <label>Payment Date</label>
                    <div className="date-picker-container">
                      <DatePicker
                        className={`form-control ${
                          errors.payment_date && isSubmitted ? "is-invalid" : ""
                        }`}
                        placeholderText="Payment Date"
                        dateFormat="dd/MM/yyyy"
                        selected={paymentDate}
                        onChange={(value) => {
                          setPaymentDate(value);
                          let event = {
                            target: {
                              name: "payment_date",
                              value: value,
                            },
                          };
                          handleChange(event);
                        }}
                      />
                      <ErrorMessage name="payment_date">
                        {(msg) => (
                          <div className="invalid-feedback d-block">{msg}</div>
                        )}
                      </ErrorMessage>
                    </div>
                  </Col>
                  <Col xs={12} lg={6} className="mb-2">
                    <label>Amount</label>
                    <div className="input-group">
                      <div className="input-group-prepend bg-light">
                        <span
                          className={`input-group-text ${
                            errors.payment_amount && isSubmitted
                              ? "border border-danger"
                              : ""
                          }`}
                          id="country-code"
                          style={{ fontSize: 14 }}>
                          {props.selectedCountry?.currency_code}
                        </span>
                      </div>
                      <Field
                        type="text"
                        className={`form-control ${
                          errors.payment_amount && isSubmitted
                            ? "is-invalid"
                            : ""
                        }`}
                        placeholder="Amount"
                        name="payment_amount"
                        tabIndex={1}
                      />
                      <ErrorMessage name="payment_amount">
                        {(msg) => <div className="invalid-feedback">{msg}</div>}
                      </ErrorMessage>
                    </div>
                  </Col>
                  <Col xs={12} lg={6} className="mb-2">
                    <label>Reference</label>
                    <div className="input-group">
                      <Field
                        type="text"
                        className={`form-control ${
                          errors.ref && isSubmitted ? "is-invalid" : ""
                        }`}
                        placeholder="Reference"
                        name="ref"
                        tabIndex={1}
                      />
                      <ErrorMessage name="ref">
                        {(msg) => <div className="invalid-feedback">{msg}</div>}
                      </ErrorMessage>
                    </div>
                  </Col>

                  <Col sm={12} className="mt-4 text-center">
                    <button
                      type="button"
                      onClick={() => props.toggleModal(false)}
                      className="btn btn-outline-primary"
                      style={{ width: 150 }}>
                      Cancel
                    </button>
                    <button
                      type="submit"
                      className="btn btn-primary"
                      style={{ width: 150 }}
                      onClick={() => setIsSubmitted(true)}>
                      Save
                    </button>
                  </Col>
                </Row>
              </Form>
            )}
          </Formik>
        </div>
      </div>
    </React.Fragment>
  );
};

export default AddNewPlan;
