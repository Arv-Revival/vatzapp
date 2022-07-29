import React, { useState, useEffect, useRef } from "react";
import { Row, Col, Table, Modal } from "react-bootstrap";
import { Formik, Field, Form, ErrorMessage, FieldArray } from "formik";
import * as Yup from "yup";
import DatePicker from "react-datepicker";
import Select from "react-select";

import { callApi } from "../../../../services/apiService";
import { ApiConstants } from "../../../../config/apiConstants";
import { entryStatus } from "../../../../enums/entryStatus";
import { showNotification } from "../../../../services/toasterService";

const PurchaseForm = (props) => {
  const [isSubmitted, setIsSubmitted] = useState(false);
  const [invoiceDate, setinvoiceDate] = useState(null);
  const [purchaseData, setPurchaseData] = useState(null);
  const [groupsList, setGroupsList] = useState([]);
  const [suppliersList, setSuppliersList] = useState([]);
  const [enableRecheck, setenableRecheck] = useState(false);
  const [showStatusConfirm, setStatusConfirm] = React.useState(false);
  const [validatorAction, setvalidatorAction] = React.useState("");
  const actionComment = useRef(null);

  const PurchaseFormSchema = Yup.object().shape({
    supplier_id: Yup.mixed().required("Please select Supplier"),
    trn: Yup.string(),
    invoice_number: Yup.string().required("Please enter Invoice number"),
    invoice_date: Yup.mixed().required("Please select Date"),
    invoice_details: Yup.array().of(
      Yup.object().shape({
        invoice_group_id: Yup.string().required("Please select Group"),
        invoice_sub_group_id: Yup.string().required("Please select Sub Group"),
        invoice_item_id: Yup.string().required("Please select Item"),
        unit_price: Yup.string().required("Please enter Unit Price"),
        quantity: Yup.string().required("Please enter Quantity"),
        amount: Yup.string().required("Please enter Amount"),
      })
    ),
    subtotal: Yup.string(),
    discount: Yup.string(),
    vatamount: Yup.string(),
    totalamount: Yup.string(),
  });

  useEffect(() => {
    invoicePurchaseGroups();
    getSuppliers();
  }, []);

  useEffect(() => {
    if (groupsList.length) {
      getData();
    }
  }, [groupsList]);

  const getData = () => {
    props.onShowLoader(true);
    let params = { entry_id: props.entry.id };
    callApi("get", ApiConstants.purchase.getData, params, true)
      .then((response) => {
        props.onShowLoader(false);
        if (response && response.status_code === 200) {
          setPurchaseData(response.payload);
          setinvoiceDate(new Date(response.payload?.header?.invoice_date));
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

  const invoicePurchaseGroups = () => {
    props.onShowLoader(true);
    callApi("get", ApiConstants.lookups.invoicepurchasegroups, null, true)
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

  const getSuppliers = () => {
    props.onShowLoader(true);
    callApi("get", ApiConstants.lookups.getSuppliers, null)
      .then((response) => {
        props.onShowLoader(false);
        if (response && response.status_code === 200) {
          let suppliers = response.payload.map((i) => {
            return { ...i, value: i.id, label: i.name };
          });
          setSuppliersList(suppliers);
        } else {
          showNotification("Error", response.message, "error");
        }
      })
      .catch((error) => {
        props.onShowLoader(false);
        showNotification("Error", "Something went wrong", "error");
      });
  };

  const getSubGroups = (groupId) => {
    let selectedGroup = groupsList.find((i) => i.id === groupId);
    let subGroups = selectedGroup
      ? selectedGroup.invoice_sub_groups.map((i) => {
          return { ...i, value: i.id, label: i.name };
        })
      : [];
    return subGroups;
  };

  const getSelectedSubGroup = (groupId, selectedId) => {
    let selectedGroup = groupsList.find((i) => i.id === groupId);
    let subGroups = selectedGroup
      ? selectedGroup.invoice_sub_groups.map((i) => {
          return { ...i, value: i.id, label: i.name };
        })
      : [];

    let selectedSubGroup = null;
    if (subGroups && selectedId) {
      selectedSubGroup = subGroups.find((i) => i.id === selectedId);
    }
    return selectedSubGroup;
  };

  const getSubItems = (groupId, subgroupId) => {
    let selectedGroup = groupsList.find((i) => i.id === groupId);
    let subGroups = selectedGroup ? selectedGroup.invoice_sub_groups : [];
    let selectedSubGroup = subGroups.find((i) => i.id === subgroupId);
    let subItems = selectedSubGroup
      ? selectedSubGroup.invoice_items.map((i) => {
          return { ...i, value: i.id, label: i.name };
        })
      : [];
    return subItems;
  };

  const getSelectedSubItem = (groupId, subgroupId, selectedId) => {
    let selectedGroup = groupsList.find((i) => i.id === groupId);
    let subGroups = selectedGroup ? selectedGroup.invoice_sub_groups : [];
    let selectedSubGroup = subGroups.find((i) => i.id === subgroupId);
    let subItems = selectedSubGroup
      ? selectedSubGroup.invoice_items.map((i) => {
          return { ...i, value: i.id, label: i.name };
        })
      : [];

    let selectedSubItem = null;
    if (subItems && selectedId) {
      selectedSubItem = subItems.find((i) => i.id === selectedId);
    }
    return selectedSubItem;
  };

  const calculateTotal = (
    values,
    setFieldValue,
    index,
    fieldValue,
    fieldType
  ) => {
    let amount = 0;
    if (fieldType === "unit_price")
      amount = values.invoice_details[index].quantity * fieldValue;
    if (fieldType === "quantity")
      amount = values.invoice_details[index].unit_price * fieldValue;

    setFieldValue(`invoice_details.${index}.amount`, amount);
    values.invoice_details[index].amount = amount;

    let subtotal = values.invoice_details.reduce((sum, item) => {
      return sum + item.amount;
    }, 0);
    setFieldValue("subtotal", subtotal);
    values.subtotal = subtotal;

    let discountAmt = values.discount ? values.discount : 0;
    let vatamount =
      ((values.subtotal - discountAmt) * props.entry.vat_percentage) / 100;
    setFieldValue("vatamount", vatamount);

    let totalamount = values.subtotal - discountAmt + vatamount;
    setFieldValue("totalamount", totalamount);
  };

  return (
    <React.Fragment>
      <div>
        <Formik
          enableReinitialize={true}
          initialValues={{
            supplier_id: purchaseData?.header?.supplier_id
              ? purchaseData.header.supplier_id
              : "",
            trn: purchaseData?.header?.supplier_trn
              ? purchaseData.header.supplier_trn
              : "",
            invoice_number: purchaseData?.header?.invoice_number
              ? purchaseData.header.invoice_number
              : "",
            invoice_date: "",
            invoice_details: purchaseData?.details
              ? purchaseData.details.map((i) => {
                  return {
                    invoice_group_id: i.invoice_group_id,
                    invoice_sub_group_id: i.invoice_sub_group_id,
                    invoice_item_id: i.invoice_item_id,
                    unit_price: i.price,
                    quantity: i.qty,
                    amount: i.amount,
                  };
                })
              : [],
            subtotal: purchaseData?.header?.sub_total
              ? purchaseData.header.sub_total
              : "",
            discount: purchaseData?.header?.discount
              ? purchaseData.header.discount
              : "0",
            vatamount: purchaseData?.header?.vat_amount
              ? purchaseData.header.vat_amount
              : "",
            totalamount: purchaseData?.header?.total_amount
              ? purchaseData.header.total_amount
              : "",
          }}
          validationSchema={PurchaseFormSchema}>
          {({ errors, handleChange, setFieldValue, values }) => (
            <Form>
              <Row>
                <Col lg={6} xs={12}>
                  <div className="input-group mb-3">
                    <Select
                      className={`w-100 form-control-select ${
                        errors.supplier_id && isSubmitted ? "is-invalid" : ""
                      }`}
                      classNamePrefix="select"
                      options={suppliersList}
                      placeholder="Supplier"
                      isSearchable={false}
                      isDisabled
                      value={suppliersList.find(
                        (i) => i.value === values?.supplier_id
                      )}
                    />
                    <ErrorMessage name="supplier_id">
                      {(msg) => <div className="invalid-feedback">{msg}</div>}
                    </ErrorMessage>
                  </div>
                </Col>
                <Col lg={6} xs={12}>
                  <div className="input-group mb-3">
                    <Field
                      type="text"
                      disabled
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
                <Col lg={6} xs={12}>
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
                <Col lg={6} xs={12}>
                  <div className="date-picker-container mb-3">
                    <DatePicker
                      className={`form-control ${
                        errors.invoice_date && isSubmitted ? "is-invalid" : ""
                      }`}
                      placeholderText="Date"
                      disabled
                      dateFormat="dd/MM/yyyy"
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

                <Col lg={12} className="overflow-auto">
                  <Table className="purchase-grid">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th width="120">Group</th>
                        <th width="120">Sub Group</th>
                        <th width="120">Item Name</th>
                        <th>Unit Price</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                      </tr>
                    </thead>
                    <tbody>
                      <FieldArray
                        name="invoice_details"
                        render={(arrayHelpers) => (
                          <React.Fragment>
                            {values.invoice_details.map((item, index) => (
                              <tr key={index}>
                                <td scope="row">{index + 1}</td>
                                <td>
                                  <Select
                                    className="w-100 form-control-select"
                                    classNamePrefix="select"
                                    options={groupsList}
                                    value={groupsList.find(
                                      (i) =>
                                        i.value ===
                                        values?.invoice_details[index]
                                          .invoice_group_id
                                    )}
                                    placeholder="Select"
                                    isSearchable={false}
                                    isDisabled
                                  />
                                </td>
                                <td>
                                  <Select
                                    className="w-100 form-control-select"
                                    classNamePrefix="select"
                                    options={getSubGroups(
                                      values.invoice_details[index]
                                        .invoice_group_id
                                    )}
                                    value={getSelectedSubGroup(
                                      values.invoice_details[index]
                                        .invoice_group_id,
                                      values.invoice_details[index]
                                        .invoice_sub_group_id
                                    )}
                                    placeholder="Select"
                                    isSearchable={false}
                                    isDisabled
                                  />
                                </td>
                                <td>
                                  <Select
                                    className="w-100 form-control-select"
                                    classNamePrefix="select"
                                    options={getSubItems(
                                      values.invoice_details[index]
                                        .invoice_group_id,
                                      values.invoice_details[index]
                                        .invoice_sub_group_id
                                    )}
                                    value={getSelectedSubItem(
                                      values.invoice_details[index]
                                        .invoice_group_id,
                                      values.invoice_details[index]
                                        .invoice_sub_group_id,
                                      values.invoice_details[index]
                                        .invoice_item_id
                                    )}
                                    placeholder="Select"
                                    isSearchable={false}
                                    isDisabled
                                  />
                                </td>
                                <td>
                                  <Field
                                    type="text"
                                    className="grid-input"
                                    name={`invoice_details.${index}.unit_price`}
                                    value={
                                      values.invoice_details[index].unit_price
                                    }
                                    disabled
                                  />
                                </td>
                                <td>
                                  <Field
                                    type="text"
                                    className="grid-input"
                                    name={`invoice_details.${index}.quantity`}
                                    value={
                                      values.invoice_details[index].quantity
                                    }
                                    disabled
                                  />
                                </td>
                                <td>
                                  <Field
                                    type="text"
                                    className="grid-input"
                                    disabled
                                    name={`invoice_details.${index}.amount`}
                                  />
                                </td>
                              </tr>
                            ))}
                          </React.Fragment>
                        )}
                      />
                      <tr>
                        <td colSpan="6">
                          <div className="text-right">
                            <label className="mr-3">Sub Total</label>
                          </div>
                        </td>
                        <td>
                          <Field
                            type="text"
                            className="grid-input"
                            name="subtotal"
                            disabled
                          />
                        </td>
                      </tr>
                      <tr>
                        <td colSpan="6">
                          <div className="text-right">
                            <label className="mr-3">Discount Rounded</label>
                          </div>
                        </td>
                        <td>
                          <Field
                            type="text"
                            className="grid-input"
                            name="discount"
                            disabled
                            value={values.discount}
                            onChange={(e) => {
                              handleChange(e);
                              let discountAmt = e.target.value
                                ? e.target.value
                                : 0;
                              let vatamount =
                                ((values.subtotal - discountAmt) *
                                  props.entry.vat_percentage) /
                                100;
                              setFieldValue("vatamount", vatamount);

                              let totalamount =
                                values.subtotal - discountAmt + vatamount;
                              setFieldValue("totalamount", totalamount);
                            }}
                          />
                        </td>
                      </tr>
                      <tr>
                        <td colSpan="6">
                          <div className="text-right">
                            <label className="mr-3">VAT Amount</label>
                          </div>
                        </td>
                        <td>
                          <Field
                            type="text"
                            disabled
                            className="grid-input"
                            name="vatamount"
                          />
                        </td>
                      </tr>
                      <tr>
                        <td colSpan="6">
                          <div className="text-right">
                            <label className="mr-3">Total</label>
                          </div>
                        </td>
                        <td>
                          <Field
                            type="text"
                            disabled
                            className="grid-input"
                            name="totalamount"
                          />
                        </td>
                      </tr>
                    </tbody>
                  </Table>
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

export default PurchaseForm;
