import React, { useState, useEffect, useRef } from "react";
import { Row, Col, Table, Modal } from "react-bootstrap";
import { Formik, Field, Form, ErrorMessage, FieldArray } from "formik";
import * as Yup from "yup";
import DatePicker from "react-datepicker";
import moment from "moment";
import Select from "react-select";

import { callApi } from "../../../../services/apiService";
import { ApiConstants } from "../../../../config/apiConstants";
import { entryStatus } from "../../../../enums/entryStatus";
import { showNotification } from "../../../../services/toasterService";
import UserForm from "./form";

const PurchaseForm = (props) => {
	const [isSubmitted, setIsSubmitted] = useState(false);
	const [invoiceDate, setinvoiceDate] = useState(null);
	const [purchaseData, setPurchaseData] = useState(null);
	const [groupsList, setGroupsList] = useState([]);
	const [suppliersList, setSuppliersList] = useState([]);
	const [showRecheckInvoice, setshowRecheckInvoice] = useState(false);
	const [showStatusConfirm, setStatusConfirm] = React.useState(false);
	const [validatorAction, setvalidatorAction] = React.useState("");
	const [enableRecheck, setenableRecheck] = useState(false);
	const actionComment = useRef(null);

	// REJECT ACTION
	const entryAction = () => {
		// props.onShowLoader(true);
		let params = {
			entry_id: props.entry.id,
			status_id: validatorAction,
			comment: actionComment.current.value,
		};
		// console.log(params);
		callApi("post", ApiConstants.entry.setcheckerstatus, params, true)
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
	// REJECT ACTION
	const [isEdit, setIsEdit] = useState(false);
	const [selectedItem, setSelectedItem] = useState(null);
	const [showSupplierForm, setSupplierForm] = useState(false);
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
		getSuppliers();
		invoicePurchaseGroups();
	}, []);

	useEffect(() => {
		if (groupsList.length) {
			if (props.entry?.entry_status_id === entryStatus.RECHECK) {
				callApi("get", ApiConstants.purchase.getData, { entry_id: props.entry.id }, true)
					.then((response) => {
						props.onShowLoader(false);
						if (response && response.status_code === 200) {
							// console.log(response.payload);
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
			}
		}
	}, [groupsList, props]);
	const onAddUser = () => {
		// closeModal();
		// getUsers();
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

	const saveFormData = (values) => {
		// props.onShowLoader(true);

		const params = {
			entry_id: props.entry.id,
			invoice_date: moment(values.invoice_date).format("YYYY-MM-DD"),
			invoice_number: values.invoice_number,
			supplier_id: values.supplier_id,
			sub_total: values.subtotal,
			discount: values.discount ? values.discount : 0,
			vat_amount: values.vatamount,
			total_amount: values.totalamount,
			purchase_details: values.invoice_details.map((i) => ({
				invoice_group_id: i.invoice_group_id,
				invoice_sub_group_id: i.invoice_sub_group_id,
				invoice_item_id: i.invoice_item_id,
				price: i.unit_price,
				qty: i.quantity,
				amount: i.amount,
				vat_percentage: i.vat_percentage,
			})),
		};
		callApi("post", ApiConstants.purchase.create, params, true)
			.then((response) => {
				props.onShowLoader(false);
				if (response && response.status_code === 201) {
					props.onSuccess();
					showNotification("Success", response.message, "success");
				} else {
					console.log(response);
					// showNotification("Error", response.message, "error");
				}
			})
			.catch((error) => {
				props.onShowLoader(false);
				showNotification("Error", "Something went wrong", "error");
			});
	};
	const onSubmit = async (values) => {
		// console.log(values);
		props.onShowLoader(true);
		let isInvoiceExists = false;
		isInvoiceExists = await checkInvoiceNumberExists(values.invoice_number);
		if (isInvoiceExists) {
			props.onShowLoader(false);
			setshowRecheckInvoice(true);
			setPurchaseData(values);
		} else {
			saveFormData(values);
		}
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

	const calculateTotal = (values, setFieldValue, index, fieldValue, fieldType) => {
		let amount = 0;
		let vatamount = values.vatamount || 0;
		let vat_percentage = values.invoice_details[index].vat_percentage || 0;
		if (fieldType === "unit_price") {
			vatamount = values.invoice_details[index].quantity * fieldValue * (vat_percentage / 100);
			amount = values.invoice_details[index].quantity * fieldValue;
		}
		if (fieldType === "quantity") {
			vatamount = values.invoice_details[index].unit_price * fieldValue * (vat_percentage / 100);
			amount = values.invoice_details[index].unit_price * fieldValue;
		}
		if (fieldType === "vat_percentage") {
			console.log(values.invoice_details[index].unit_price, values.invoice_details[index].quantity, fieldValue)
			vatamount = values.invoice_details[index].unit_price * values.invoice_details[index].quantity * (fieldValue / 100);
			amount = values.invoice_details[index].unit_price * values.invoice_details[index].quantity;
		}
		setFieldValue(`invoice_details.${index}.amount`, amount);
		values.invoice_details[index].amount = amount;
		let subtotal = values.invoice_details.reduce((sum, item) => {
			return sum + item.amount;
		}, 0);
		setFieldValue("subtotal", subtotal);
		values.subtotal = subtotal;

		// setFieldValue(`invoice_details.${index}.vatamount`, vatamount);
		// console.log(values.invoice_details);
		values.invoice_details[index].vatamount = vatamount;
		let totalVatAmount = values.invoice_details.reduce((sum, item) => {
			if (item.vatamount) {
				return sum + item.vatamount;
			}
			return sum;
		}, 0);
		setFieldValue("vatamount", totalVatAmount);
		let discountAmt = values.discount ? values.discount : 0;
		// console.log(values.subtotal + totalVatAmount, discountAmt);
		let totalamount = values.subtotal + totalVatAmount;
		totalamount = totalamount - discountAmt;
		setFieldValue("totalamount", totalamount);
	};

	const refreshTotal = (values, setFieldValue) => {
		let subtotal = values.invoice_details.reduce((sum, item) => {
			return sum + item.quantity * item.unit_price;
		}, 0);
		values.subtotal = subtotal;

		let discountAmt = values.discount ? values.discount : 0;
		// let vatamount = ((values.subtotal - discountAmt) * props.entry.vat_percentage) / 100;

		let totalamount = values.subtotal - discountAmt;
		setTimeout(() => {
			setFieldValue("subtotal", subtotal);
			// setFieldValue("vatamount", vatamount);
			setFieldValue("totalamount", totalamount);
		}, 100);
	};

	const handleKeypress = (e) => {
		const characterCode = e.key;
		const actionKeys = ["Backspace", "Tab", "ArrowLeft", "ArrowRight", "."];
		if (actionKeys.includes(characterCode)) return;

		const characterNumber = Number(characterCode);
		// console.log({characterCode, characterNumber});
		if (characterNumber >= 0 && characterNumber <= 9) {
			if (e.currentTarget.value && e.currentTarget.value.length) {
				return;
			}
		} else {
			e.preventDefault();
		}
	};

	return (
		<React.Fragment>
			<div>
				{showSupplierForm && <UserForm onSuccess={onAddUser} getSuppliers={getSuppliers} setSupplierForm={setSupplierForm} setSelectBox={() => props.setHideSelectBox(false)} isEdit={isEdit} dataItem={selectedItem} {...props} />}
				{!showSupplierForm && (
					<Formik
						enableReinitialize={true}
						initialValues={{
							supplier_id: purchaseData?.header?.supplier_id ? purchaseData.header.supplier_id : "",
							trn: purchaseData?.header?.supplier_trn ? purchaseData.header.supplier_trn : "",
							invoice_number: purchaseData?.header?.invoice_number ? purchaseData.header.invoice_number : "",
							invoice_date: purchaseData?.header?.invoice_date ? new Date(purchaseData?.header?.invoice_date) : "",
							invoice_details: purchaseData?.details
								? purchaseData.details.map((i) => {
									return {
										invoice_group_id: i.invoice_group_id,
										invoice_sub_group_id: i.invoice_sub_group_id,
										invoice_item_id: i.invoice_item_id,
										unit_price: i.price,
										quantity: i.qty,
										vat_percentage: i.vat_percentage,
										amount: i.amount,
									};
								})
								: [
									{
										invoice_group_id: "",
										invoice_sub_group_id: "",
										invoice_item_id: "",
										unit_price: 0,
										quantity: 0,
										vat_percentage: 5,
										amount: 0,
									},
								],
							subtotal: purchaseData?.header?.sub_total ? purchaseData.header.sub_total : "",
							discount: purchaseData?.header?.discount ? purchaseData.header.discount : "0",
							vatamount: purchaseData?.header?.vat_amount ? purchaseData.header.vat_amount : "",
							totalamount: purchaseData?.header?.total_amount ? purchaseData.header.total_amount : "",
						}}
						validationSchema={PurchaseFormSchema}
						onSubmit={(values) => {
							// console.log(values);
							onSubmit(values);
						}}>
						{({ errors, handleChange, setFieldValue, values }) => (
							<Form>
								<Row>
									<Col xl={6} xs={12}>
										<div className="d-flex mb-3">
											<div className="w-100">
												<Select
													className={`form-control-select ${errors.supplier_id && isSubmitted ? "is-invalid" : ""}`}
													// classNamePrefix="select"
													options={suppliersList}
													value={suppliersList.find((i) => i.value === values?.supplier_id)}
													placeholder="Supplier"
													isSearchable={true}
													onChange={(value) => {
														let event = {
															target: {
																name: "supplier_id",
																value: value.id,
															},
														};
														handleChange(event);
														setTimeout(() => {
															setFieldValue("trn", value.trn);
														}, 100);
													}}
												/>
												<ErrorMessage name="supplier_id">{(msg) => <div className="invalid-feedback">{msg}</div>}</ErrorMessage>
											</div>
											<button
												className="btn btn-primary shadow-2 mx-3 mb-3"
												onClick={() => {
													props.setHideSelectBox(true);
													setSupplierForm(true);
												}}>
												Add
											</button>
										</div>
									</Col>
									<Col xl={6} xs={12}>
										<div className="input-group mb-3">
											<Field type="text" disabled className={`form-control ${errors.trn && isSubmitted ? "is-invalid" : ""}`} placeholder="TRN" name="trn" />
											<ErrorMessage name="trn">{(msg) => <div className="invalid-feedback">{msg}</div>}</ErrorMessage>
										</div>
									</Col>
									<Col xl={6} xs={12}>
										<div className="input-group mb-3">
											<Field type="text" className={`form-control ${errors.invoice_number && isSubmitted ? "is-invalid" : ""}`} placeholder="Invoice Number" name="invoice_number" />
											<ErrorMessage name="invoice_number">{(msg) => <div className="invalid-feedback">{msg}</div>}</ErrorMessage>
										</div>
									</Col>
									<Col xl={6} xs={12}>
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

									<Col xs={12} className="overflow-auto">
										<Table className="purchase-grid">
											<thead>
												<tr>
													<th>#</th>
													<th width="120">Group</th>
													<th width="120">Sub Group</th>
													<th width="120">Item Name</th>
													<th>Unit Price</th>
													<th>Quantity</th>
													<th>VAT{"(%)"}</th>
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
																	<th scope="row">{index + 1}</th>
																	<td>
																		<Select
																			className={`w-100 form-control-select ${errors.invoice_details && errors.invoice_details[index] && errors.invoice_details[index].invoice_group_id && isSubmitted ? "is-invalid" : ""}`}
																			classNamePrefix="select"
																			options={groupsList}
																			value={groupsList.find((i) => i.value === values?.invoice_details[index].invoice_group_id)}
																			placeholder="Select"
																			isSearchable={false}
																			onChange={(value) => {
																				let event = {
																					target: {
																						name: `invoice_details.${index}.invoice_group_id`,
																						value: value.id,
																					},
																				};
																				handleChange(event);
																				setTimeout(() => {
																					setFieldValue(`invoice_details.${index}.invoice_sub_group_id`, "");
																					setFieldValue(`invoice_details.${index}.invoice_item_id`, "");
																				}, 100);
																			}}
																		/>
																	</td>
																	<td>
																		<Select
																			className={`w-100 form-control-select ${errors.invoice_details && errors.invoice_details[index] && errors.invoice_details[index].invoice_sub_group_id && isSubmitted ? "is-invalid" : ""}`}
																			classNamePrefix="select"
																			options={getSubGroups(values.invoice_details[index].invoice_group_id)}
																			value={getSelectedSubGroup(values.invoice_details[index].invoice_group_id, values.invoice_details[index].invoice_sub_group_id)}
																			placeholder="Select"
																			isSearchable={false}
																			onChange={(value) => {
																				let event = {
																					target: {
																						name: `invoice_details.${index}.invoice_sub_group_id`,
																						value: value.id,
																					},
																				};
																				handleChange(event);
																				setTimeout(() => {
																					setFieldValue(`invoice_details.${index}.invoice_item_id`, "");
																				}, 100);
																			}}
																		/>
																	</td>
																	<td>
																		<Select
																			className={`w-100 form-control-select ${errors.invoice_details && errors.invoice_details[index] && errors.invoice_details[index].invoice_item_id && isSubmitted ? "is-invalid" : ""}`}
																			classNamePrefix="select"
																			options={getSubItems(values.invoice_details[index].invoice_group_id, values.invoice_details[index].invoice_sub_group_id)}
																			value={getSelectedSubItem(values.invoice_details[index].invoice_group_id, values.invoice_details[index].invoice_sub_group_id, values.invoice_details[index].invoice_item_id)}
																			placeholder="Select"
																			isSearchable={false}
																			onChange={(value) => {
																				let event = {
																					target: {
																						name: `invoice_details.${index}.invoice_item_id`,
																						value: value.id,
																					},
																				};
																				handleChange(event);
																			}}
																		/>
																	</td>
																	<td>
																		<Field
																			// type="number"
																			// onKeyDown={handleKeypress}
																			// min="-100000"
																			// step=".002"
																			className={`grid-input ${errors.invoice_details && errors.invoice_details[index] && errors.invoice_details[index].unit_price && isSubmitted ? "is-invalid" : ""}`}
																			name={`invoice_details.${index}.unit_price`}
																			value={values.invoice_details[index].unit_price}
																			onChange={(e) => {
																				handleChange(e);
																				setTimeout(() => {
																					calculateTotal(values, setFieldValue, index, Number(e.target.value), "unit_price");
																				}, 100);
																			}}
																		/>
																	</td>

																	<td>
																		<Field
																			type="number"
																			onKeyDown={handleKeypress}
																			className={`grid-input ${errors.invoice_details && errors.invoice_details[index] && errors.invoice_details[index].quantity && isSubmitted ? "is-invalid" : ""}`}
																			name={`invoice_details.${index}.quantity`}
																			value={values.invoice_details[index].quantity}
																			onChange={(e) => {
																				handleChange(e);
																				setTimeout(() => {
																					calculateTotal(values, setFieldValue, index, Number(e.target.value), "quantity");
																				}, 100);
																			}}
																		/>
																	</td>
																	<td>
																		<Field
																			onKeyDown={handleKeypress}
																			className={`grid-input ${errors.invoice_details && errors.invoice_details[index] && errors.invoice_details[index].vat_percentage && isSubmitted ? "is-invalid" : ""}`}
																			name={`invoice_details.${index}.vat_percentage`}
																			value={values.invoice_details[index].vat_percentage}
																			onChange={(e) => {
																				handleChange(e);
																				setTimeout(() => {
																					calculateTotal(values, setFieldValue, index, Number(e.target.value), "vat_percentage");
																				}, 100);
																			}}
																		/>
																	</td>
																	<td>
																		<Field type="text" className={`grid-input ${errors.invoice_details && errors.invoice_details[index] && errors.invoice_details[index].amount && isSubmitted ? "is-invalid" : ""}`} disabled name={`invoice_details.${index}.amount`} />
																		{values.invoice_details.length !== 1 && (
																			<span
																				className="insert-row-btn text-primary mr-2"
																				onClick={() => {
																					arrayHelpers.remove(index);
																					let updatedValues = JSON.parse(JSON.stringify(values));
																					updatedValues.invoice_details.splice(index, 1);
																					refreshTotal(updatedValues, setFieldValue);
																				}}>
																				<i className="feather icon-minus-circle" />
																			</span>
																		)}
																		{index + 1 === values.invoice_details.length && (
																			<span
																				className="insert-row-btn text-primary"
																				onClick={() => {
																					arrayHelpers.push({
																						invoice_group_id: "",
																						invoice_sub_group_id: "",
																						invoice_item_id: "",
																						unit_price: 0,
																						quantity: 0,
																						vat_percentage: 5,
																						amount: 0,
																					});
																				}}>
																				<i className="feather icon-plus-circle" />
																			</span>
																		)}
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
														<Field type="text" className="grid-input" name="subtotal" />
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
															className="grid-input"
															name="discount"
															value={values.discount}
															onChange={(e) => {
																handleChange(e);
																let discountAmt = e.target.value ? e.target.value : 0;
																// let vatamount = ((values.subtotal - discountAmt) * props.entry.vat_percentage) / 100;
																// setFieldValue("vatamount", vatamount);
																let totalamount = values.subtotal + values.vatamount - discountAmt;
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
															className="grid-input"
															name="vatamount"
															onChange={(e) => {
																handleChange(e);
																setFieldValue("vatamount", e.target.value);
																setFieldValue("totalamount", Number(values.subtotal) + Number(e.target.value));
															}}
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
														<Field type="text" className="grid-input" name="totalamount" />
													</td>
												</tr>
											</tbody>
										</Table>
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
								<div className="text-center">
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
									{props.entry?.entry_status_id === entryStatus.RECHECK ? <button style={{ width: 180, fontWeight: "bold" }} className="btn btn-primary shadow-2 mt-3" onClick={() => { setIsSubmitted(true); }}>
										Update
									</button> : <button type="submit" style={{ width: 180, fontWeight: "bold" }} className="btn btn-primary shadow-2 mt-3" onClick={() => setIsSubmitted(true)}>
										Submit
									</button>}
								</div>
							</Form>
						)}
					</Formik>
				)}
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
								saveFormData(purchaseData);
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
		</React.Fragment >
	);
};

export default PurchaseForm;
