import React, {useState, useEffect, useRef} from "react";
import {Row, Col, Modal} from "react-bootstrap";
import {Formik, Field, Form, ErrorMessage} from "formik";
import * as Yup from "yup";
import moment from "moment";
import DatePicker from "react-datepicker";

import {callApi} from "../../../../services/apiService";
import {ApiConstants} from "../../../../config/apiConstants";
import {entryStatus} from "../../../../enums/entryStatus";
import {showNotification} from "../../../../services/toasterService";

const SalesForm = (props) => {
	const [isSubmitted, setIsSubmitted] = useState(false);
	const [invoiceDate, setinvoiceDate] = useState(null);
	const [salesData, setsalesData] = useState(null);
	const [showRecheckInvoice, setshowRecheckInvoice] = useState(false);
	const [showStatusConfirm, setStatusConfirm] = React.useState(false);
	const [validatorAction, setvalidatorAction] = React.useState("");
	const [enableRecheck, setenableRecheck] = useState(false);
	const actionComment = useRef(null);

	const SalesFormSchema = Yup.object().shape({
		invoice_date: Yup.mixed().required("Please select Date"),
		amount: Yup.string()
			.required("Please enter Amount")
			.matches(/((\+|-)?([0-9]+)(\.[0-9]+)?)|((\+|-)?\.?[0-9]+)/, "Please enter a valid int Amount"),
		comments: Yup.string().required("Please enter Comments"),
		invoice_number: Yup.string().required("Please enter Invoice number"),
		amount_exclude_vat: Yup.string(),
		vat_amount: Yup.string(),
	});

	useEffect(() => {
		if (props.entry?.entry_status_id === entryStatus.RECHECK) {
			getData();
		}
	}, []);
	// REJECT ACTION
	const entryAction = () => {
		// props.onShowLoader(true);
		let params = {
			entry_id: props.entry.id,
			status_id: validatorAction,
			comment: actionComment.current.value,
		};
		console.log(params);
		callApi("post", ApiConstants.entry.setcheckerstatus, params, true)
			.then((response) => {
				console.log(response);
				props.onShowLoader(false);
				if (response && response.status_code === 200) {
					props.onSuccess();
					showNotification("Success", response.message, "success");
				} else {
					showNotification("Error", response.message, "error");
				}
			})
			.catch((error) => {
				console.log(error);
				props.onShowLoader(false);
				showNotification("Error", "Something went wrong", "error");
			});
	};
	// REJECT ACTION

	const getData = () => {
		props.onShowLoader(true);
		let params = {entry_id: props.entry.id};
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

	const checkInvoiceNumberExists = (invoice_number) =>
		new Promise((resolve, reject) => {
			callApi("get", ApiConstants.entry.checkinvoicenumberexists + "?invoice_number=" + invoice_number, null, true)
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
			setsalesData(values);
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
			amount_exclude_vat: parseFloat(values.amount_exclude_vat),
			vat_amount: parseFloat(values.vat_amount),
			comments: values.comments,
			invoice_number: values.invoice_number,
		};
		callApi("post", ApiConstants.sales.create, params, true)
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

	const calculateAmtExclVat = (amount) => {
		if (isNaN(amount)) return 0;
		else return ((amount * 100) / (100 + props.entry.vat_percentage)).toFixed(2);
	};

	const calculateVatAmt = (amount, amt_excl_vat) => {
		if (isNaN(amount)) return 0;
		else return (amount - amt_excl_vat).toFixed(2);
	};

	return (
		<React.Fragment>
			<div>
				<Formik
					enableReinitialize={true}
					initialValues={{
						invoice_date: salesData?.invoice_date ? new Date(salesData?.invoice_date) : "",
						amount: salesData?.amount ? salesData?.amount : "",
						comments: salesData?.comments ? salesData?.comments : "",
						invoice_number: salesData?.invoice_number ? salesData?.invoice_number : "",
						amount_exclude_vat: salesData?.amount_exclude_vat ? salesData?.amount_exclude_vat : "",
						vat_amount: salesData?.vat_amount ? salesData?.vat_amount : "",
					}}
					validationSchema={SalesFormSchema}
					onSubmit={(values) => onSubmit(values)}>
					{({errors, handleChange, setFieldValue}) => (
						<Form>
							<Row>
								<Col xs={12}>
									<div className="date-picker-container mb-3">
										<DatePicker
											className={`form-control ${errors.invoice_date && isSubmitted ? "is-invalid" : ""}`}
											placeholderText="Date"
											dateFormat="dd/MM/yyyy"
											selected={invoiceDate}
											minDate={new Date(props?.vatPeriod?.current_vat_period?.start_period_date?.date)}
											maxDate={new Date(props?.vatPeriod?.current_vat_period?.end_period_date?.date)}
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
										<ErrorMessage name="invoice_date">{(msg) => <div className="invalid-feedback d-block">{msg}</div>}</ErrorMessage>
									</div>
								</Col>
								<Col xs={12}>
									<div className="input-group mb-3">
										<Field
											type="text"
											className={`form-control ${errors.amount && isSubmitted ? "is-invalid" : ""}`}
											placeholder="Amount"
											name="amount"
											onChange={(e) => {
												let value = e.target.value;
												let amt_excl_vat = calculateAmtExclVat(value);
												let vat_amt = calculateVatAmt(value, amt_excl_vat);
												setFieldValue("amount_exclude_vat", amt_excl_vat);
												setFieldValue("vat_amount", vat_amt);
												let event = {
													target: {
														name: "amount",
														value: value,
													},
												};
												handleChange(event);
											}}
										/>
										<ErrorMessage name="amount">{(msg) => <div className="invalid-feedback">{msg}</div>}</ErrorMessage>
									</div>
								</Col>
								<Col xs={12}>
									<div className="input-group mb-3">
										<Field type="text" className={`form-control ${errors.comments && isSubmitted ? "is-invalid" : ""}`} placeholder="Comments" name="comments" />
										<ErrorMessage name="comments">{(msg) => <div className="invalid-feedback">{msg}</div>}</ErrorMessage>
									</div>
								</Col>
								<Col xs={12}>
									<div className="input-group mb-3">
										<Field type="text" className={`form-control ${errors.invoice_number && isSubmitted ? "is-invalid" : ""}`} placeholder="Invoice Number" name="invoice_number" />
										<ErrorMessage name="invoice_number">{(msg) => <div className="invalid-feedback">{msg}</div>}</ErrorMessage>
									</div>
								</Col>
								<Col xs={12}>
									<div className="input-group mb-3">
										<Field type="text" className={`form-control ${errors.amount_exclude_vat && isSubmitted ? "is-invalid" : ""}`} placeholder="Amount Exclude Vat" name="amount_exclude_vat" />
										<ErrorMessage name="amount_exclude_vat">{(msg) => <div className="invalid-feedback">{msg}</div>}</ErrorMessage>
									</div>
								</Col>
								<Col xs={12}>
									<div className="input-group mb-3">
										<Field type="text" className={`form-control ${errors.vat_amount && isSubmitted ? "is-invalid" : ""}`} placeholder="Vat Amount" name="vat_amount" />
										<ErrorMessage name="vat_amount">{(msg) => <div className="invalid-feedback">{msg}</div>}</ErrorMessage>
									</div>
								</Col>
							</Row>
							<div className="mt-4">
								<div className="checkbox d-flex p-0">
									<input type="checkbox" name="checkbox-fill-1" id="checkbox-fill-a1" onChange={() => setenableRecheck(!enableRecheck)} />
									<label htmlFor="checkbox-fill-a1" className="cr">
										Enable Reject Entry
									</label>
								</div>
							</div>
							<div className="mt-3 text-center">
								<button
									type="button"
									disabled={!enableRecheck}
									style={{width: 100, fontWeight: "bold"}}
									className="btn btn-danger shadow-2 mt-3 mr-3"
									onClick={() => {
										setStatusConfirm(true);
										setvalidatorAction(entryStatus.REJECTED);
									}}>
									Reject
								</button>
								<button type="submit" style={{width: 180, fontWeight: "bold"}} className="btn btn-primary shadow-2 mt-3" onClick={() => setIsSubmitted(true)}>
									Submit
								</button>
							</div>
						</Form>
					)}
				</Formik>
			</div>
			<Modal size="md" show={showRecheckInvoice} backdrop="static" keyboard={true} backdropClassName="nested-modal">
				<Modal.Header>
					<h5 className="card-title">Warning!</h5>
				</Modal.Header>
				<Modal.Body>
					<div>The Invoice ID is already used. Do you want to proceed with this?</div>
				</Modal.Body>
				<Modal.Footer>
					<div>
						<button className="btn btn-outline-warning" onClick={() => setshowRecheckInvoice(false)}>
							No
						</button>
						<button
							className="btn btn-warning"
							onClick={() => {
								setshowRecheckInvoice(false);
								saveFormData(salesData);
							}}>
							Yes
						</button>
					</div>
				</Modal.Footer>
			</Modal>
			<Modal size="md" show={showStatusConfirm} backdrop="static" keyboard={true} backdropClassName="nested-modal">
				<Modal.Header>
					<h5 className="card-title">{validatorAction === entryStatus.APPROVED ? "Approve" : validatorAction === entryStatus.RECHECK ? "Recheck" : "Reject"} Entry</h5>
				</Modal.Header>
				<Modal.Body>
					<div>
						<span>Are you sure you want to {validatorAction === entryStatus.APPROVED ? "Approve" : validatorAction === entryStatus.RECHECK ? "Recheck" : "Reject"} the Entry?</span>
					</div>
					<div className="mt-4">
						<textarea ref={actionComment} className="form-control" placeholder="Comment"></textarea>
					</div>
				</Modal.Body>
				<Modal.Footer>
					<div>
						<button className="btn btn-outline-primary" onClick={() => setStatusConfirm(false)}>
							Cancel
						</button>
						<button
							className={`btn ${validatorAction === entryStatus.APPROVED ? "btn-primary" : validatorAction === entryStatus.RECHECK ? "btn-warning" : "btn-danger"}`}
							onClick={() => {
								setStatusConfirm(false);
								entryAction();
							}}>
							{validatorAction === entryStatus.APPROVED ? "Approve" : validatorAction === entryStatus.RECHECK ? "Recheck" : "Reject"}
						</button>
					</div>
				</Modal.Footer>
			</Modal>
		</React.Fragment>
	);
};

export default SalesForm;
