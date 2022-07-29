import React, { useState, useEffect } from "react";
import { Row, Col } from "react-bootstrap";
import { Formik, Field, Form, ErrorMessage } from "formik";
import * as Yup from "yup";
import DatePicker from "react-datepicker";
import Select from "react-select";

import { callApi } from "../../../../services/apiService";
import { ApiConstants } from "../../../../config/apiConstants";
import { entryStatus } from "../../../../enums/entryStatus";
import { showNotification } from "../../../../services/toasterService";

const ExpenditureForm = (props) => {
  const [isSubmitted, setIsSubmitted] = useState(false);
  const [invoiceDate, setinvoiceDate] = useState(null);
  const [expenditureData, setexpenditureData] = useState(null);
  const [groupsList, setGroupsList] = useState([]);
  const [subGroupsList, setSubGroupsList] = useState([]);
  const [itemsList, setItemsList] = useState([]);

  const ExpenditureFormSchema = Yup.object().shape({
    invoice_date: Yup.mixed().required("Please select Date"),
    amount: Yup.string()
      .required("Please enter Amount")
      .matches(/^[0-9].*$/, "Please enter a valid Amount"),
    comments: Yup.string().required("Please enter Comment"),
    invoice_number: Yup.string().required("Please enter Invoice number"),
    invoice_group_id: Yup.string().required("Please enter Group"),
    invoice_sub_group_id: Yup.string().required("Please enter Sub Group"),
    invoice_item_id: Yup.string().required("Please select Item"),
  });

  useEffect(() => {
    invoiceExpGroups();
  }, []);

  useEffect(() => {
    if (groupsList.length) getData();
  }, [groupsList]);

  const getData = () => {
    props.onShowLoader(true);
    let params = { entry_id: props.entry.id };
    callApi("get", ApiConstants.expenditure.getData, params, true)
      .then((response) => {
        console.log(response.payload);
        props.onShowLoader(false);
        if (response && response.status_code === 200) {
          setexpenditureData(response.payload);
          setinvoiceDate(new Date(response.payload.invoice_date));
          let group = groupsList.find(
            (i) => i.id === response.payload.invoice_group_id
          );
          onChangeGroups(group);
          let subgroup = group.invoice_sub_groups.find(
            (i) => i.id === response.payload.invoice_sub_group_id
          );
          onChangeSubGroups(subgroup);
        } else {
          showNotification("Error", response.message, "error");
        }
      })
      .catch((error) => {
        props.onShowLoader(false);
        showNotification("Error", "Something went wrong", "error");
      });
  };

  const invoiceExpGroups = () => {
    props.onShowLoader(true);
    callApi("get", ApiConstants.lookups.invoiceexpgroups, null)
      .then((response) => {
        props.onShowLoader(false);
        if (response && response.status_code === 200) {
          let data = response.payload.map((i) => {
            return { ...i, value: i.id, label: i.name };
          });
          setGroupsList(data);
        } else {
          showNotification("Error", response.message, "error");
        }
      })
      .catch((error) => {
        props.onShowLoader(false);
        showNotification("Error", "Something went wrong", "error");
      });
  };

  const onChangeGroups = (value) => {
    let subGroups = value?.invoice_sub_groups?.map((i) => {
      return { ...i, value: i.id, label: i.name };
    });
    setSubGroupsList(subGroups);
  };

  const onChangeSubGroups = (value) => {
    let items = value?.invoice_items?.map((i) => {
      return { ...i, value: i.id, label: i.name };
    });
    setItemsList(items);
  };

  return (
    <React.Fragment>
      <div>
        <Formik
          enableReinitialize={true}
          initialValues={{
            invoice_date: expenditureData?.invoice_date
              ? new Date(expenditureData?.invoice_date)
              : "",
            amount: expenditureData?.amount ? expenditureData?.amount : "",
            vat_amount: expenditureData?.vat_amount ? expenditureData?.vat_amount : "",
            comments: expenditureData?.comments
              ? expenditureData?.comments
              : "",
            invoice_number: expenditureData?.invoice_number
              ? expenditureData?.invoice_number
              : "",
            invoice_group_id: expenditureData?.invoice_group_id
              ? expenditureData?.invoice_group_id
              : "",
            invoice_sub_group_id: expenditureData?.invoice_sub_group_id
              ? expenditureData?.invoice_sub_group_id
              : "",
            invoice_item_id: expenditureData?.invoice_item_id
              ? expenditureData?.invoice_item_id
              : "",
          }}
          validationSchema={ExpenditureFormSchema}>
          {({ errors, handleChange, values }) => (
            <Form>
              <Row>
                <Col xs={12}>
                  <div className="date-picker-container mb-3">
                    <DatePicker
                      className={`form-control ${errors.invoice_date && isSubmitted ? "is-invalid" : ""
                        }`}
                      placeholderText="Date"
                      dateFormat="dd/MM/yyyy"
                      disabled
                      selected={invoiceDate}
                      onChange={(value) => {
                        setinvoiceDate(value);
                        let event = {
                          target: {
                            name: "invoice_date",
                            value: value,
                          },
                        };
                        handleChange(event);
                      }}
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
                      className={`form-control ${errors.amount && isSubmitted ? "is-invalid" : ""
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
                      className={`form-control ${errors.vat_amount && isSubmitted ? "is-invalid" : ""
                        }`}
                      placeholder="VAT Amount"
                      name="vat_amount"
                    />
                    <ErrorMessage name="vat_amount">
                      {(msg) => <div className="invalid-feedback">{msg}</div>}
                    </ErrorMessage>
                  </div>
                </Col>

                <Col xs={12}>
                  <div className="input-group mb-3">
                    <Field
                      type="text"
                      disabled
                      className={`form-control ${errors.comments && isSubmitted ? "is-invalid" : ""
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
                      className={`form-control ${errors.invoice_number && isSubmitted ? "is-invalid" : ""
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
                    <Select
                      className={`w-100 form-control-select ${errors.invoice_group_id && isSubmitted
                        ? "is-invalid"
                        : ""
                        }`}
                      classNamePrefix="select"
                      options={groupsList}
                      placeholder="Group"
                      isDisabled
                      isSearchable={false}
                      value={groupsList.find(
                        (i) => i.value === values?.invoice_group_id
                      )}
                    />
                    <ErrorMessage name="invoice_group_id">
                      {(msg) => <div className="invalid-feedback">{msg}</div>}
                    </ErrorMessage>
                  </div>
                </Col>

                <Col xs={12}>
                  <div className="input-group mb-3">
                    <Select
                      className={`w-100 form-control-select ${errors.invoice_sub_group_id && isSubmitted
                        ? "is-invalid"
                        : ""
                        }`}
                      classNamePrefix="select"
                      options={subGroupsList}
                      placeholder="Sub Group"
                      isSearchable={false}
                      isDisabled
                      value={subGroupsList.find(
                        (i) => i.value === values?.invoice_sub_group_id
                      )}
                    />
                    <ErrorMessage name="invoice_sub_group_id">
                      {(msg) => <div className="invalid-feedback">{msg}</div>}
                    </ErrorMessage>
                  </div>
                </Col>

                <Col xs={12}>
                  <div className="input-group mb-3">
                    <Select
                      className={`w-100 form-control-select ${errors.invoice_item_id && isSubmitted
                        ? "is-invalid"
                        : ""
                        }`}
                      classNamePrefix="select"
                      options={itemsList}
                      placeholder="Items"
                      isDisabled
                      isSearchable={false}
                      value={itemsList.find(
                        (i) => i.value === values?.invoice_item_id
                      )}
                    />
                    <ErrorMessage name="invoice_item_id">
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

export default ExpenditureForm;
