import React, {useState, useEffect, useRef} from "react";
import {Row, Col, Modal} from "react-bootstrap";
import {Formik, Field, Form, ErrorMessage} from "formik";
import * as Yup from "yup";
import DatePicker from "react-datepicker";

import {entryStatus} from "../../../../enums/entryStatus";
import {showNotification} from "../../../../services/toasterService";
import {callApi} from "../../../../services/apiService";
import {ApiConstants} from "../../../../config/apiConstants";

const SalesForm = (props) => {
	const [isSubmitted, setIsSubmitted] = useState(false);
	const [invoiceDate, setinvoiceDate] = useState(null);
	const [salesData, setsalesData] = useState(null);
	const [showStatusConfirm, setStatusConfirm] = React.useState(false);
	const [validatorAction, setvalidatorAction] = React.useState("");
	const actionComment = useRef(null);
	const [enableRecheck, setenableRecheck] = useState(false);

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

	return (
		<React.Fragment>
			<div>
				<Formik
					enableReinitialize={true}
					initialValues={{
						invoice_date: "",
						amount: salesData?.amount ? salesData?.amount : "",
						comments: salesData?.comments ? salesData?.comments : "",
						invoice_number: salesData?.invoice_number ? salesData?.invoice_number : "",
						amount_exclude_vat: salesData?.amount_exclude_vat ? salesData?.amount_exclude_vat : "",
						vat_amount: salesData?.vat_amount ? salesData?.vat_amount : "",
					}}
					validationSchema={SalesFormSchema}>
					{({errors}) => (
						<Form>
							<Row>
								<Col xs={12}>
									<div className="date-picker-container mb-3">
										<DatePicker className={`form-control ${errors.invoice_date && isSubmitted ? "is-invalid" : ""}`} placeholderText="Date" disabled dateFormat="dd/MM/yyyy" selected={invoiceDate} />
										<i className="feather icon-calendar"></i>
										<ErrorMessage name="invoice_date">{(msg) => <div className="invalid-feedback d-block">{msg}</div>}</ErrorMessage>
									</div>
								</Col>

								<Col xs={12}>
									<div className="input-group mb-3">
										<Field type="text" disabled className={`form-control ${errors.amount && isSubmitted ? "is-invalid" : ""}`} placeholder="Amount" name="amount" />
										<ErrorMessage name="amount">{(msg) => <div className="invalid-feedback">{msg}</div>}</ErrorMessage>
									</div>
								</Col>

								<Col xs={12}>
									<div className="input-group mb-3">
										<Field type="text" disabled className={`form-control ${errors.comments && isSubmitted ? "is-invalid" : ""}`} placeholder="Comments" name="comments" />
										<ErrorMessage name="comments">{(msg) => <div className="invalid-feedback">{msg}</div>}</ErrorMessage>
									</div>
								</Col>

								<Col xs={12}>
									<div className="input-group mb-3">
										<Field type="text" disabled className={`form-control ${errors.invoice_number && isSubmitted ? "is-invalid" : ""}`} placeholder="Invoice Number" name="invoice_number" />
										<ErrorMessage name="invoice_number">{(msg) => <div className="invalid-feedback">{msg}</div>}</ErrorMessage>
									</div>
								</Col>

								<Col xs={12}>
									<div className="input-group mb-3">
										<Field type="text" className={`form-control ${errors.amount_exclude_vat && isSubmitted ? "is-invalid" : ""}`} disabled placeholder="Amount Exclude Vat" name="amount_exclude_vat" />
										<ErrorMessage name="amount_exclude_vat">{(msg) => <div className="invalid-feedback">{msg}</div>}</ErrorMessage>
									</div>
								</Col>

								<Col xs={12}>
									<div className="input-group mb-3">
										<Field type="text" className={`form-control ${errors.vat_amount && isSubmitted ? "is-invalid" : ""}`} disabled placeholder="Vat Amount" name="vat_amount" />
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
							<div className="mt-2 text-center">
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
								<button
									type="button"
									style={{width: 100, fontWeight: "bold"}}
									className="btn btn-warning shadow-2 mt-3 mr-3"
									onClick={() => {
										setStatusConfirm(true);
										setvalidatorAction(entryStatus.RECHECK);
									}}>
									Recheck
								</button>
								<button
									type="button"
									style={{width: 100, fontWeight: "bold"}}
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
			<Modal size="md" show={showStatusConfirm} backdrop="static" keyboard={true} backdropClassName="nested-modal">
				<Modal.Header>
					<h5 className="card-title">
						{validatorAction === entryStatus.APPROVED ? "Approve" : validatorAction === entryStatus.RECHECK ? "Recheck" : "Reject"} Entry
					</h5>
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
