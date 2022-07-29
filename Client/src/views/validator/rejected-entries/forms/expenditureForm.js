import React, { useState, useEffect, useRef } from "react";
import { Row, Col, Modal } from "react-bootstrap";
import { Formik, Field, Form, ErrorMessage } from "formik";
import * as Yup from "yup";
import DatePicker from "react-datepicker";
import Select from "react-select";

import { entryStatus } from "../../../../enums/entryStatus";
import { showNotification } from "../../../../services/toasterService";
import { callApi } from "../../../../services/apiService";
import { ApiConstants } from "../../../../config/apiConstants";

const ExpenditureForm = (props) => {
  const [isSubmitted, setIsSubmitted] = useState(false);
  const [invoiceDate, setinvoiceDate] = useState(null);
  const [expenditureData, setexpenditureData] = useState(null);
  const [showStatusConfirm, setStatusConfirm] = React.useState(false);
  const [validatorAction, setvalidatorAction] = React.useState("");
  const actionComment = useRef(null);
  const [enableRecheck, setenableRecheck] = useState(false);
  const [groupsList, setGroupsList] = useState([]);
  const [subGroupsList, setSubGroupsList] = useState([]);
  const [itemsList, setItemsList] = useState([]);

  const ExpenditureFormSchema = Yup.object().shape({
    invoice_date: Yup.mixed().required("Please select Date"),
    amount: Yup.string()
      .required("Please enter Amount")
      .matches(/^[0-9]*$/, "Please enter a valid Amount"),
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

  const entryAction = () => {
    props.onShowLoader(true);
    let params = {
      entry_id: props.entry.id,
      status_id: validatorAction,
      comment: actionComment.current.value,
    };

    callApi("post", ApiConstants.entry.setvalidatorstatus, params, true)
      .then((response) => {
        props.onShowLoader(false);
        if (response && response.status_code === 200) {
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
  };

  return (
    <React.Fragment>
      <div>
        <Formik
          enableReinitialize={true}
          initialValues={{
            invoice_date: "",
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
          validationSchema={ExpenditureFormSchema}>
          {({ errors, values }) => (
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
                    <Select
                      className={`w-100 form-control-select ${
                        errors.invoice_group_id && isSubmitted
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
                      className={`w-100 form-control-select ${
                        errors.invoice_sub_group_id && isSubmitted
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
                      className={`w-100 form-control-select ${
                        errors.invoice_item_id && isSubmitted
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
              <div className="mt-4">
                <div className="checkbox d-flex p-0">
                  <input
                    type="checkbox"
                    name="checkbox-fill-1"
                    id="checkbox-fill-a1"
                    onChange={() => setenableRecheck(!enableRecheck)}
                  />
                  <label htmlFor="checkbox-fill-a1" className="cr">
                    Enable Reject Entry
                  </label>
                </div>
              </div>
              <div className="mt-2 text-center">
                <button
                  type="button"
                  disabled={!enableRecheck}
                  style={{ width: 100, fontWeight: "bold" }}
                  className="btn btn-danger shadow-2 mt-3 mr-3"
                  onClick={() => {
                    setStatusConfirm(true);
                    setvalidatorAction(entryStatus.REJECTED);
                  }}>
                  Reject
                </button>
                <button
                  type="button"
                  style={{ width: 100, fontWeight: "bold" }}
                  className="btn btn-warning shadow-2 mt-3 mr-3"
                  onClick={() => {
                    setStatusConfirm(true);
                    setvalidatorAction(entryStatus.RECHECK);
                  }}>
                  Recheck
                </button>
                <button
                  type="button"
                  style={{ width: 100, fontWeight: "bold" }}
                  className="btn btn-primary shadow-2 mt-3"
                  onClick={() => {
                    setStatusConfirm(true);
                    setvalidatorAction(entryStatus.APPROVED);
                  }}>
                  Approve
                </button>
              </div>
            </Form>
          )}
        </Formik>
      </div>
      <Modal
        size="md"
        show={showStatusConfirm}
        backdrop="static"
        keyboard={true}
        backdropClassName="nested-modal">
        <Modal.Header>
          <h5 className="card-title">
            {validatorAction === entryStatus.APPROVED
              ? "Approve"
              : validatorAction === entryStatus.RECHECK
              ? "Recheck"
              : "Reject"}{" "}
            Entry
          </h5>
        </Modal.Header>
        <Modal.Body>
          <div>
            <span>
              Are you sure that to{" "}
              {validatorAction === entryStatus.APPROVED
                ? "Approve"
                : validatorAction === entryStatus.RECHECK
                ? "Recheck"
                : "Reject"}
              ?
            </span>
          </div>
          <div className="mt-4">
            <textarea
              ref={actionComment}
              className="form-control"
              placeholder="Comment"></textarea>
          </div>
        </Modal.Body>
        <Modal.Footer>
          <div>
            <button
              className="btn btn-outline-primary"
              onClick={() => setStatusConfirm(false)}>
              Cancel
            </button>
            <button
              className={`btn ${
                validatorAction === entryStatus.APPROVED
                  ? "btn-primary"
                  : validatorAction === entryStatus.RECHECK
                  ? "btn-warning"
                  : "btn-danger"
              }`}
              onClick={() => {
                setStatusConfirm(false);
                entryAction();
              }}>
              {validatorAction === entryStatus.APPROVED
                ? "Approve"
                : validatorAction === entryStatus.RECHECK
                ? "Recheck"
                : "Reject"}
            </button>
          </div>
        </Modal.Footer>
      </Modal>
    </React.Fragment>
  );
};

export default ExpenditureForm;
