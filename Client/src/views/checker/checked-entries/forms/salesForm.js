import React, { useState, useEffect } from "react";
import { Row, Col } from "react-bootstrap";
import { Formik, Field, Form, ErrorMessage } from "formik";
import * as Yup from "yup";
import DatePicker from "react-datepicker";

import { callApi } from "../../../../services/apiService";
import { ApiConstants } from "../../../../config/apiConstants";
import { showNotification } from "../../../../services/toasterService";

const SalesForm = (props) => {
  const [isSubmitted, setIsSubmitted] = useState(false);
  const [invoiceDate, setinvoiceDate] = useState(null);
  const [salesData, setsalesData] = useState(null);

  const SalesFormSchema = Yup.object().shape({
    invoice_date: Yup.mixed().required("Please select Date"),
    amount: Yup.string()
      .required("Please enter Amount")
      .matches(/^[0-9]*$/, "Please enter a valid Amount"),
    comments: Yup.string().required("Please enter Comment"),
    invoice_number: Yup.string().required("Please enter Invoice number"),
    amount_exclude_vat: Yup.string(),
    vat_amount: Yup.string(),
  });

  useEffect(() => {
    getData();
  }, []);

  const getData = () => {
    props.onShowLoader(true);
    let params = { entry_id: props.entry.id };
    callApi("get", ApiConstants.sales.getData, params, true)
      .then((response) => {
        props.onShowLoader(false);
        if (response && response.status_code === 200) {
          setsalesData(response.payload);
          setinvoiceDate(new Date(response.payload.invoice_date));
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
      <div>
        <Formik
          enableReinitialize={true}
          initialValues={{
            invoice_date: "",
            amount: salesData?.amount ? salesData?.amount : "",
            comments: salesData?.comments ? salesData?.comments : "",
            invoice_number: salesData?.invoice_number
              ? salesData?.invoice_number
              : "",
            amount_exclude_vat: salesData?.amount_exclude_vat
              ? salesData?.amount_exclude_vat
              : "",
            vat_amount: salesData?.vat_amount ? salesData?.vat_amount : "",
          }}
          validationSchema={SalesFormSchema}>
          {({ errors }) => (
            <Form>
              <Row>
                <Col xs={12}>
                  <div className="date-picker-container mb-3">
                    <DatePicker
                      className={`form-control ${
                        errors.invoice_date && isSubmitted ? "is-invalid" : ""
                      }`}
                      placeholderText="Date"
                      disabled
                      dateFormat="dd/MM/yyyy"
                      selected={invoiceDate}
                    />
                    <i className="feather icon-calendar"></i>
                    <ErrorMessage name="invoice_date">
                      {(msg) => (
                        <div className="invalid-feedback d-block">{msg}</div>
                      )}
                    </ErrorMessage>
                  </div>
                </Col>

                <Col xs={12}>
                  <div className="input-group mb-3">
                    <Field
                      type="text"
                      disabled
                      className={`form-control ${
                        errors.amount && isSubmitted ? "is-invalid" : ""
                      }`}
                      placeholder="Amount"
                      name="amount"
                    />
                    <ErrorMessage name="amount">
                      {(msg) => <div className="invalid-feedback">{msg}</div>}
                    </ErrorMessage>
                  </div>
                </Col>

                <Col xs={12}>
                  <div className="input-group mb-3">
                    <Field
                      type="text"
                      disabled
                      className={`form-control ${
                        errors.comments && isSubmitted ? "is-invalid" : ""
                      }`}
                      placeholder="Comments"
                      name="comments"
                    />
                    <ErrorMessage name="comments">
                      {(msg) => <div className="invalid-feedback">{msg}</div>}
                    </ErrorMessage>
                  </div>
                </Col>

                <Col xs={12}>
                  <div className="input-group mb-3">
                    <Field
                      type="text"
                      disabled
                      className={`form-control ${
                        errors.invoice_number && isSubmitted ? "is-invalid" : ""
                      }`}
                      placeholder="Invoice Number"
                      name="invoice_number"
                    />
                    <ErrorMessage name="invoice_number">
                      {(msg) => <div className="invalid-feedback">{msg}</div>}
                    </ErrorMessage>
                  </div>
                </Col>

                <Col xs={12}>
                  <div className="input-group mb-3">
                    <Field
                      type="text"
                      className={`form-control ${
                        errors.amount_exclude_vat && isSubmitted
                          ? "is-invalid"
                          : ""
                      }`}
                      disabled
                      placeholder="Amount Exclude Vat"
                      name="amount_exclude_vat"
                    />
                    <ErrorMessage name="amount_exclude_vat">
                      {(msg) => <div className="invalid-feedback">{msg}</div>}
                    </ErrorMessage>
                  </div>
                </Col>

                <Col xs={12}>
                  <div className="input-group mb-3">
                    <Field
                      type="text"
                      className={`form-control ${
                        errors.vat_amount && isSubmitted ? "is-invalid" : ""
                      }`}
                      disabled
                      placeholder="Vat Amount"
                      name="vat_amount"
                    />
                    <ErrorMessage name="vat_amount">
                      {(msg) => <div className="invalid-feedback">{msg}</div>}
                    </ErrorMessage>
                  </div>
                </Col>
              </Row>
            </Form>
          )}
        </Formik>
      </div>
    </React.Fragment>
  );
};

export default SalesForm;
