import React, { useState, useEffect } from "react";
import { Row, Col, Modal } from "react-bootstrap";
import { Formik, Field, Form, ErrorMessage } from "formik";
import * as Yup from "yup";
import DatePicker from "react-datepicker";
import moment from "moment";
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
  const [selectedSubgroup, setSelectedSubgroup] = useState("");
  const [selectedGroupItem, setSelectedGroupItem] = useState("");
  const [showRecheckInvoice, setshowRecheckInvoice] = useState(false);

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
    if (groupsList.length) {
      if (props.entry?.entry_status_id === entryStatus.RECHECK) {
        getData();
      }
    }
  }, [groupsList]);

  const getData = () => {
    props.onShowLoader(true);
    let params = { entry_id: props.entry.id };
    callApi("get", ApiConstants.expenditure.getData, params, true)
      .then((response) => {
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

          let groupitem = subgroup.invoice_items.find(
            (i) => i.id === response.payload.invoice_item_id
          );
          setSelectedGroupItem({
            ...groupitem,
            value: groupitem.id,
            label: groupitem.name,
          });
        } else {
          showNotification("Error", response.message, "error");
        }
      })
      .catch((error) => {
        props.onShowLoader(false);
        showNotification("Error", "Something went wrong", "error");
      });
  };

  const checkInvoiceNumberExists = (invoice_number) =>
    new Promise((resolve, reject) => {
      callApi(
        "get",
        ApiConstants.entry.checkinvoicenumberexists +
          "?invoice_number=" +
          invoice_number,
        null,
        true
      )
        .then((response) => {
          if (response && response.status_code === 200) {
            resolve(response.payload.is_invoice_number_exist);
          } else {
            props.onShowLoader(false);
            showNotification("Error", response.message, "error");
          }
        })
        .catch((error) => {
          props.onShowLoader(false);
          showNotification("Error", "Something went wrong", "error");
        });
    });

  const onSubmit = async (values) => {
    props.onShowLoader(true);
    let isInvoiceExists = false;
    isInvoiceExists = await checkInvoiceNumberExists(values.invoice_number);
    if (isInvoiceExists) {
      props.onShowLoader(false);
      setshowRecheckInvoice(true);
      setexpenditureData(values);
    } else {
      saveFormData(values);
    }
  };

  const saveFormData = (values) => {
    props.onShowLoader(true);
    let params = {
      entry_id: props.entry.id,
      invoice_date: moment(values.invoice_date).format("YYYY-MM-DD"),
      amount: parseFloat(values.amount),
      comments: values.comments,
      invoice_number: values.invoice_number,
      invoice_group_id: values.invoice_group_id,
      invoice_sub_group_id: values.invoice_sub_group_id,
      invoice_item_id: values.invoice_item_id,
    };
    callApi("post", ApiConstants.expenditure.create, params, true)
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
    setSelectedSubgroup({ ...value, value: value.id, label: value.name });
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
          validationSchema={ExpenditureFormSchema}
          onSubmit={(values) => onSubmit(values)}>
          {({ errors, handleChange, setFieldValue, values }) => (
            <Form>
              <Row>
                <Col xs={12}>
                  <div className="date-picker-container mb-3">
                    <DatePicker
                      className={`form-control ${
                        errors.invoice_date && isSubmitted ? "is-invalid" : ""
                      }`}
                      placeholderText="Date"
                      dateFormat="dd/MM/yyyy"
                      selected={invoiceDate}
                      minDate={
                        new Date(
                          props?.vatPeriod?.current_vat_period?.start_period_date?.date
                        )
                      }
                      maxDate={
                        new Date(
                          props?.vatPeriod?.current_vat_period?.end_period_date?.date
                        )
                      }
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
                    <Select
                      className={`w-100 form-control-select ${
                        errors.invoice_group_id && isSubmitted
                          ? "is-invalid"
                          : ""
                      }`}
                      classNamePrefix="select"
                      options={groupsList}
                      placeholder="Group"
                      isSearchable={false}
                      value={groupsList.find(
                        (i) => i.value === values?.invoice_group_id
                      )}
                      onChange={(value) => {
                        onChangeGroups(value);
                        let event = {
                          target: {
                            name: "invoice_group_id",
                            value: value.id,
                          },
                        };
                        handleChange(event);
                        setTimeout(() => {
                          setFieldValue("invoice_sub_group_id", "");
                          setFieldValue("invoice_item_id", "");
                        }, 100);
                        setSelectedSubgroup("");
                        setSelectedGroupItem("");
                      }}
                    />
                    <ErrorMessage name="invoice_group_id">
                      {(msg) => <div className="invalid-feedback">{msg}</div>}
                    </ErrorMessage>
                  </div>
                </Col>
                <Col xs={12}>
                  <div className="input-group mb-3">
                    <Select
                      className={`w-100 form-control-select ${
                        errors.invoice_sub_group_id && isSubmitted
                          ? "is-invalid"
                          : ""
                      }`}
                      classNamePrefix="select"
                      options={subGroupsList}
                      placeholder="Sub Group"
                      isSearchable={false}
                      value={selectedSubgroup}
                      onChange={(value) => {
                        onChangeSubGroups(value);
                        let event = {
                          target: {
                            name: "invoice_sub_group_id",
                            value: value.id,
                          },
                        };
                        handleChange(event);
                        setTimeout(() => {
                          setFieldValue("invoice_item_id", "");
                        }, 100);
                        setSelectedGroupItem("");
                      }}
                    />
                    <ErrorMessage name="invoice_sub_group_id">
                      {(msg) => <div className="invalid-feedback">{msg}</div>}
                    </ErrorMessage>
                  </div>
                </Col>
                <Col xs={12}>
                  <div className="input-group mb-3">
                    <Select
                      className={`w-100 form-control-select ${
                        errors.invoice_item_id && isSubmitted
                          ? "is-invalid"
                          : ""
                      }`}
                      classNamePrefix="select"
                      options={itemsList}
                      placeholder="Items"
                      isSearchable={false}
                      value={selectedGroupItem}
                      onChange={(value) => {
                        let event = {
                          target: {
                            name: "invoice_item_id",
                            value: value.id,
                          },
                        };
                        handleChange(event);
                        setSelectedGroupItem(value);
                      }}
                    />
                    <ErrorMessage name="invoice_item_id">
                      {(msg) => <div className="invalid-feedback">{msg}</div>}
                    </ErrorMessage>
                  </div>
                </Col>
              </Row>

              <div className="text-center">
                <button
                  type="submit"
                  style={{ width: 180, fontWeight: "bold" }}
                  className="btn btn-primary shadow-2 mt-3"
                  onClick={() => setIsSubmitted(true)}>
                  Submit
                </button>
              </div>
            </Form>
          )}
        </Formik>
      </div>
      <Modal
        size="md"
        show={showRecheckInvoice}
        backdrop="static"
        keyboard={true}
        backdropClassName="nested-modal">
        <Modal.Header>
          <h5 className="card-title">Warning!</h5>
        </Modal.Header>
        <Modal.Body>
          <div>
            The Invoice ID is already used. Do you want to proceed with this?
          </div>
        </Modal.Body>
        <Modal.Footer>
          <div>
            <button
              className="btn btn-outline-warning"
              onClick={() => setshowRecheckInvoice(false)}>
              No
            </button>
            <button
              className="btn btn-warning"
              onClick={() => {
                setshowRecheckInvoice(false);
                saveFormData(expenditureData);
              }}>
              Yes
            </button>
          </div>
        </Modal.Footer>
      </Modal>
    </React.Fragment>
  );
};

export default ExpenditureForm;
