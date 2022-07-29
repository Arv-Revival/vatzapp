import React, { useState, useEffect } from "react";
import { Row, Col, Card, Dropdown, Modal } from "react-bootstrap";
import { useParams, Link } from "react-router-dom";
import { Formik, Form, ErrorMessage } from "formik";
import * as Yup from "yup";
import Select from "react-select";
import moment from "moment";
import { Switch } from "@progress/kendo-react-inputs";
import DatePicker from "react-datepicker";
import { callApi } from "../../../services/apiService";
import { showNotification } from "../../../services/toasterService";
import { CONFIG } from "../../../config/constant";
import { ApiConstants } from "../../../config/apiConstants";
import Spinner from "../../../components/Spinner";
import AddNewPlan from "./AddPlan";
import PlanHistory from "./PlanHistory";
import { vatPeriods, vatPercentages, vatMonths } from "../../../enums/vatOptions";

import avatar1 from "../../../assets/images/icons/company.png";
import axios from "axios";

const UserProfile = () => {
	const [showLoader, setShowLoader] = useState(false);
	const [isSubmitted, setIsSubmitted] = useState(false);
	const [clientInfo, setclientInfo] = useState(null);
	const [showNewPlanModal, setNewPlanModal] = useState(false);
	const [showPlanHistoryModal, setPlanHistoryModal] = useState(false);
	const [isApproved, setIsApproved] = useState(true);
	const [checkersList, setCheckersList] = useState([]);
	const [isActive, setisActive] = React.useState(false);
	const [showStatusConfirm, setStatusConfirm] = React.useState(false);
	const [showPreview, setshowPreview] = useState(false);
	const [selectedPreview, setselectedPreview] = useState(null);
	const userObj = React.useRef(JSON.parse(localStorage.getItem("user")));
	const [tradeLicenseExpiry, setTradeLicenseExpiry] = useState(null);
	const { id } = useParams();

	const UserFormSchema = Yup.object().shape({
		checker_user_id: Yup.string().required("Please select Checker"),
		vat_period: Yup.string().required("Please select VAT Period"),
		vat_percentage: Yup.string().required("Please select VAT Percentage"),
		start_month: Yup.string().required("Please select Start Month"),
		start_year: Yup.string().required("Please select Start Year"),
	});

	const vatYears = [
		{
			value: new Date().getFullYear() - 2,
			label: new Date().getFullYear() - 2,
		},
		{
			value: new Date().getFullYear() - 1,
			label: new Date().getFullYear() - 1,
		},
		{
			value: new Date().getFullYear(),
			label: new Date().getFullYear(),
		},
		{
			value: new Date().getFullYear() + 1,
			label: new Date().getFullYear() + 1,
		},
		{
			value: new Date().getFullYear() + 2,
			label: new Date().getFullYear() + 2,
		},
	];

	useEffect(() => {
		getClientData();
		getCheckers();
	}, []);

	const getCheckers = () => {
		setShowLoader(true);
		callApi("get", ApiConstants.lookups.getCheckers, {})
			.then((response) => {
				setShowLoader(false);

				if (response && response.status_code === 200) {
					setCheckersList(
						response.payload?.map((i) => {
							return { ...i, value: i.id, label: i.name };
						})
					);
				} else {
					showNotification("Error", response.message, "error");
				}
			})
			.catch((error) => {
				setShowLoader(false);
				showNotification("Error", "Something went wrong", "error");
			});
	};

	const getClientData = () => {
		setShowLoader(true);
		let params = { user_id: parseInt(id) };
		callApi("get", ApiConstants.user.getuser, params, true)
			.then((response) => {
				setShowLoader(false);
				if (response && response.status_code === 200) {
					let data = response.payload;
					console.log(`${new Date(data?.client_user?.to).getUTCDate()}-${new Date(data?.client_user?.to).getUTCMonth()}-${new Date(data?.client_user?.to).getUTCFullYear()}`);
					// console.log(new Date(data?.client_user?.to).toUTCString());
					setclientInfo({ ...data, client_user_expiry: moment(`${new Date(data?.client_user?.to).getUTCDate()}-${new Date(data?.client_user?.to).getUTCMonth() + 1}-${new Date(data?.client_user?.to).getUTCFullYear()}`).format("DD-MM-YYYY") });
					setIsApproved(data?.client_user?.verified_on);
					let isSwitchActive = data?.is_active ? true : false;
					setisActive(isSwitchActive);
				} else {
					showNotification("Error", response.message, "error");
				}
			})
			.catch((error) => {
				setShowLoader(false);
				showNotification("Error", "Something went wrong", "error");
			});
	};
	const [addTradeLicenseExpiry, setAddTradeLicenseExpiry] = useState(false);
	const [updateTradeLicenseExpiry, setUpdateTradeLicenseExpiry] = useState(false);

	const approveUser = (e) => {
		e.preventDefault();
		let params = { user_id: parseInt(id), trade_license_expiry: moment(tradeLicenseExpiry).format("YYYY-MM-DD") };
		if (userObj?.current?.token) {
			axios({ method: "POST", url: `${CONFIG.API_BASE_URL}${ApiConstants.admin.approveuser}`, data: params, headers: { Authorization: `Bearer ${userObj?.current?.token}` } })
				.then((response) => {
					console.trace(response);
					if (response && response.status === 200) {
						setIsApproved(true);
						setAddTradeLicenseExpiry(false);
						getClientData();
						showNotification("Success", response?.data?.message, "success");
					} else {
						showNotification("Error", response?.data?.message, "error");
					}
				})
				.catch((error) => {
					showNotification("Error", "Something went wrong", "error");
				});
			// .catch((error) => {
			// 	// console.log(error);
			// 	showNotification(error);
			// });
		}
	};
	const updateTradeLicenseExpiryUser = (e) => {
		e.preventDefault();
		let params = { user_id: parseInt(id), trade_license_expiry: moment(tradeLicenseExpiry).format("YYYY-MM-DD") };
		if (userObj?.current?.token) {
			axios({ method: "PUT", url: `${CONFIG.API_BASE_URL}${ApiConstants.admin.updatetradelicenseexpiry}`, data: params, headers: { Authorization: `Bearer ${userObj?.current?.token}` } })
				.then((response) => {
					console.trace(response);
					if (response && response.status === 200) {
						setIsApproved(true);
						setAddTradeLicenseExpiry(false);
						getClientData();
						showNotification("Success", response?.data?.message, "success");
					} else {
						showNotification("Error", response?.data?.message, "error");
					}
				})
				.catch((error) => {
					showNotification("Error", "Something went wrong", "error");
				});
			// .catch((error) => {
			// 	// console.log(error);
			// 	showNotification(error);
			// });
		}
	};

	const onActiveChange = (status) => {
		setShowLoader(true);
		let apiUrl = status ? ApiConstants.user.activateuser : ApiConstants.user.deactivateuser;
		callApi("post", apiUrl, { user_id: parseInt(id) }, true)
			.then((response) => {
				setShowLoader(false);
				if (response && response.status_code === 200) {
					setisActive(status);
					showNotification("Success", response.message, "success");
				} else {
					showNotification("Error", response.message, "error");
				}
			})
			.catch((error) => {
				setShowLoader(false);
				showNotification("Error", "Something went wrong", "error");
			});
	};

	const onSubmit = (values) => {
		setShowLoader(true);
		let params = {
			user_id: parseInt(id),
			checker_user_id: values.checker_user_id,
			vat_period: values.vat_period,
			vat_percentage: parseInt(values.vat_percentage),
			start_month: values.start_month,
			start_year: values.start_year,
		};
		callApi("post", ApiConstants.admin.updateclient, params, true)
			.then((response) => {
				setShowLoader(false);
				if (response && response.status_code === 201) {
					getClientData();
					showNotification("Success", response.message, "success");
				} else {
					showNotification("Error", response.message, "error");
				}
			})
			.catch((error) => {
				setShowLoader(false);
				showNotification("Error", "Something went wrong", "error");
			});
	};

	const viewEntry = (entry) => {
		setselectedPreview(entry);
		setshowPreview(true);
	};

	return (
		<React.Fragment>
			{showLoader && <Spinner />}

			<Row>
				<Col md={4} className="order-md-1">
					<Card>
						<Card.Body>
							<div className="d-flex align-middle">
								<div className="profile-avatr mr-4">{clientInfo?.profile_image ? <img src={CONFIG.API_BASE_URL + ApiConstants.file.view + "?file_name=" + clientInfo?.profile_image.file_path} alt="user" className="display_pic" /> : <img src={avatar1} alt="user" />}</div>

								<div className="d-inline-block">
									<h6>{clientInfo?.name}</h6>
									{clientInfo?.id && <p className="m-b-0">ID: VATZ{("000000" + clientInfo?.id).slice(-6)}</p>}
									{clientInfo?.client_user?.city && (
										<p className="m-b-0">
											{clientInfo?.client_user?.city}, {clientInfo?.client_user?.region?.name}
										</p>
									)}
									<span className="status active" />
								</div>
							</div>
							<Row className="profile-personal-info">
								<Col lg={12} className="mt-4 pl-4">
									<div className="text-primary">Email</div>
									<div>{clientInfo?.email}</div>
								</Col>
								<Col lg={12} className="mt-4 pl-4">
									<div className="text-primary">Whatsapp</div>
									<div>
										{clientInfo?.w_country_code} {clientInfo?.whatsapp_no}
									</div>
								</Col>
								<Col lg={12} className="mt-4 pl-4">
									<div className="text-primary">Registered Date</div>
									<div>{moment(clientInfo?.created_at).format("DD-MM-YYYY")}</div>
								</Col>
								<Col lg={12} className="mt-4 pl-4">
									<div className="text-primary">Landline Number</div>
									{clientInfo?.client_user?.landline ? (
										<div>
											{clientInfo?.client_user?.l_country_code} {clientInfo?.client_user?.landline}
										</div>
									) : (
										"-"
									)}
								</Col>
								<Col lg={12} className="mt-4 pl-4">
									<div className="text-primary">Mobile Number</div>
									{clientInfo?.client_user?.mobile ? (
										<div>
											{clientInfo?.w_country_code} {clientInfo?.client_user?.mobile}
										</div>
									) : (
										"-"
									)}
								</Col>
							</Row>
						</Card.Body>
					</Card>
					<Card className="new-cust-card">
						<Card.Header>
							<div className="d-flex justify-content-between">
								<h5 className="card-title">Payment Details</h5>
								<div>
									<Dropdown>
										<Dropdown.Toggle as={optionToggle}>
											<i className="feather icon-more-vertical"></i>
										</Dropdown.Toggle>
										<Dropdown.Menu className="py-2 payment-plan">
											<Dropdown.Item className="p-0">
												<div className="option-item" onClick={() => setNewPlanModal(true)}>
													New Payment
												</div>
											</Dropdown.Item>
											<Dropdown.Item className="p-0">
												<div className="option-item" onClick={() => setPlanHistoryModal(true)}>
													Payment History
												</div>
											</Dropdown.Item>
											{/* <Dropdown.Item className="p-0">
                        <div className="option-item">Download Invoice</div>
                      </Dropdown.Item> */}
										</Dropdown.Menu>
									</Dropdown>
								</div>
							</div>
						</Card.Header>
						<Card.Body className="p-b-0">
							<Row>
								<Col sm={6}>
									<div className="font-weight-bold mb-2">Plan</div>
									{clientInfo?.client_user?.plan_name ? <div>VATZ - {clientInfo?.client_user?.plan_name}</div> : "-"}
								</Col>
								<Col sm={6}>
									<div className="font-weight-bold mb-2">Amount</div>
									<div>
										{clientInfo?.client_user?.payment_currency} {clientInfo?.client_user?.payment_amount !== null ? clientInfo?.client_user?.payment_amount : "-"}
									</div>
								</Col>
								<Col sm={6} className="mt-4">
									<div className="font-weight-bold mb-2">Expiry Date</div>
									<div>{clientInfo?.client_user?.to ? moment(clientInfo.client_user_expiry).format("DD-MM-YYYY") : "-"}</div>
								</Col>
								<Col sm={6} className="mt-4">
									<div className="font-weight-bold mb-2">Subscription Status</div>
									<div className={clientInfo?.client_user?.to && moment(clientInfo?.client_user?.to).isAfter(moment.now()) ? "text-success" : "text-danger"}>{clientInfo?.client_user?.to && moment(clientInfo?.client_user?.to).isAfter(moment.now()) ? "Active" : "Inactive"}</div>
								</Col>
								<Col sm={6} className="mt-4">
									<div className="font-weight-bold mb-2">Last Payment Date</div>
									<div>{clientInfo?.client_user?.payment_date ? moment(clientInfo?.client_user?.payment_date).format("DD-MM-YYYY") : "-"}</div>
								</Col>
							</Row>
						</Card.Body>
					</Card>
				</Col>
				<Col md={8} className="order-md-2">
					<Card>
						<Card.Header>
							<h5 className="card-title">VAT Details</h5>
						</Card.Header>
						<Card.Body>
							<Row>
								<Col sm={12}>
									<Row>
										<Col sm={5}>
											<div>
												<div className="text-primary mb-2">VAT Period</div>
												<div className="mb-1">{clientInfo?.client_user?.vat_period}</div>
												<div>
													{clientInfo?.client_user?.from ? moment(clientInfo?.client_user?.from).format("DD-MMM") : ""}
													{clientInfo?.client_user?.from && <span> to </span>}
													{clientInfo?.client_user?.to ? moment(clientInfo?.client_user?.to).format("DD-MMM") : ""}
												</div>
											</div>
										</Col>
										<Col sm={4}>
											<div>
												<div className="text-primary mb-2">VAT Percentage </div>
												<p>{clientInfo?.client_user?.vat_percentage !== null ? clientInfo?.client_user?.vat_percentage + "%" : "-"}</p>
											</div>
										</Col>
									</Row>
									<hr />
									<Row>
										<Col sm={5}>
											<div>
												<div className="text-primary font-weight-bold mb-3">Address</div>
												<div className="mb-1">
													{clientInfo?.client_user?.building_name && <span>{clientInfo?.client_user?.building_name}, </span>}
													{clientInfo?.client_user?.palce && <span>{clientInfo?.client_user?.palce}, </span>}
													{clientInfo?.client_user?.city && <span>{clientInfo?.client_user?.city}, </span>}
													{clientInfo?.client_user?.p_o_box && <span>{clientInfo?.client_user?.p_o_box}</span>}
												</div>
												{clientInfo?.client_user?.country && (
													<div>
														{clientInfo?.client_user?.region?.name}, {clientInfo?.client_user?.country?.name}
													</div>
												)}
											</div>
										</Col>
										<Col sm={4}>
											<div>
												<div className="text-primary font-weight-bold mb-3">Contact Details</div>
												<div className="text-primary mb-2">Contact Person Name</div>
												<div>{clientInfo?.client_user?.contact_person} </div>
											</div>
										</Col>
										<Col sm={3}>
											<div>
												<div className="text-primary mb-2" style={{ marginTop: 37 }}>
													Contact Number
												</div>
												<div>
													{clientInfo?.client_user?.cp_country_code} {clientInfo?.client_user?.cp_mobile}{" "}
												</div>
											</div>
										</Col>
									</Row>
									<hr />
									<Row>
										<Col sm={4} className="mb-3">
											<div>
												<div className="text-primary font-weight-bold mb-2">Trade License Copy</div>
												<div>{clientInfo?.client_user?.trade_license_number}</div>
												{clientInfo && clientInfo?.client_user?.trade_license_image && (
													<div className="mt-2">
														<a target="_blank" rel="noreferrer" href={CONFIG.API_BASE_URL + ApiConstants.file.download + "?file_name=" + clientInfo?.client_user?.trade_license_image.file_path}>
															Download
														</a>
														<a target="_blank" rel="noreferrer" className="ml-4" role="button" onClick={() => viewEntry(CONFIG.API_BASE_URL + ApiConstants.file.download + "?file_name=" + clientInfo?.client_user?.trade_license_image.file_path)}>
															View
														</a>
													</div>
												)}
											</div>
										</Col>
										<Col sm={4} className="mb-3">
											<div>
												<div className="text-primary font-weight-bold mb-2">TRN</div>
												<div>{clientInfo?.client_user?.trn_number}</div>
												{clientInfo && clientInfo?.client_user?.tran_certificate_image && (
													<div className="mt-2">
														<a target="_blank" rel="noreferrer" href={CONFIG.API_BASE_URL + ApiConstants.file.download + "?file_name=" + clientInfo?.client_user?.tran_certificate_image.file_path}>
															Download
														</a>
														<a target="_blank" rel="noreferrer" className="ml-4" role="button" onClick={() => viewEntry(CONFIG.API_BASE_URL + ApiConstants.file.download + "?file_name=" + clientInfo?.client_user?.tran_certificate_image.file_path)}>
															View
														</a>
													</div>
												)}
											</div>
										</Col>
										<Col sm={4} className="mb-3">
											<div>
												<div className="text-primary font-weight-bold mb-2">
													<span>Expiry Date </span>
													<span>
														<button className="btn btn-primary py-0 pl-3 pr-0" size="sm" onClick={(e) => setUpdateTradeLicenseExpiry(true)}>
															<i className="feather icon-edit"></i>
														</button>
													</span>
												</div>
												<div>{clientInfo?.client_user?.trade_license_expiry}</div>
											</div>
										</Col>
									</Row>
								</Col>
							</Row>
							<hr />
							{clientInfo && (
								<Row>
									{isApproved && (
										<Col sm={12}>
											<div className="my-3 d-flex">
												<label className={`m-0 font-weight-bold  ${isActive ? "text-primary" : ""}`} style={{ width: 60 }}>
													{isActive ? "Active" : "Inactive"}
												</label>
												<Switch onChange={() => setStatusConfirm(true)} checked={isActive} onLabel={""} offLabel={""} />
											</div>
										</Col>
									)}
									<Col sm={12}>
										<Formik
											enableReinitialize={true}
											initialValues={{
												checker_user_id: clientInfo?.client_user?.checker_user_id ? clientInfo?.client_user?.checker_user_id : "",
												vat_period: clientInfo?.client_user?.vat_period ? clientInfo?.client_user?.vat_period : "",
												vat_percentage: clientInfo?.client_user?.vat_percentage ? clientInfo?.client_user?.vat_percentage?.toString() : "",
												start_month: clientInfo?.client_user?.start_month ? clientInfo?.client_user?.start_month : "",
												start_year: clientInfo?.client_user?.start_year ? clientInfo?.client_user?.start_year : "",
											}}
											validationSchema={UserFormSchema}
											onSubmit={(values) => onSubmit(values)}>
											{({ errors, handleChange, values }) => (
												<Form>
													{isApproved && (
														<Row className="mt-3">
															<Col sm={6} className="mb-3">
																<Select
																	className={`w-100 form-control-select ${errors.checker_user_id && isSubmitted ? "is-invalid" : ""}`}
																	classNamePrefix="select"
																	options={checkersList}
																	value={checkersList.find((i) => i.id === values.checker_user_id)}
																	placeholder="Assign Checker"
																	isSearchable={false}
																	onChange={(value) => {
																		let event = {
																			target: {
																				name: "checker_user_id",
																				value: value.id,
																			},
																		};
																		handleChange(event);
																	}}
																/>
																<ErrorMessage name="checker_user_id">{(msg) => <div className="invalid-feedback">{msg}</div>}</ErrorMessage>
															</Col>
															<Col sm={6} className="mb-3">
																<Select
																	className={`w-100 form-control-select ${errors.vat_period && isSubmitted ? "is-invalid" : ""}`}
																	classNamePrefix="select"
																	options={vatPeriods}
																	value={vatPeriods.find((i) => i.value === values.vat_period)}
																	placeholder="VAT Period"
																	isSearchable={false}
																	onChange={(value) => {
																		let event = {
																			target: {
																				name: "vat_period",
																				value: value.value,
																			},
																		};
																		handleChange(event);
																	}}
																/>
																<ErrorMessage name="vat_period">{(msg) => <div className="invalid-feedback">{msg}</div>}</ErrorMessage>
															</Col>
															<Col sm={6} className="mb-3">
																<Select
																	className={`w-100 form-control-select ${errors.vat_percentage && isSubmitted ? "is-invalid" : ""}`}
																	classNamePrefix="select"
																	options={vatPercentages}
																	placeholder="VAT Percentage"
																	isSearchable={false}
																	value={vatPercentages.find((i) => i.value === values.vat_percentage)}
																	onChange={(value) => {
																		let event = {
																			target: {
																				name: "vat_percentage",
																				value: value.value,
																			},
																		};
																		handleChange(event);
																	}}
																/>
																<ErrorMessage name="vat_percentage">{(msg) => <div className="invalid-feedback">{msg}</div>}</ErrorMessage>
															</Col>
															<Col sm={3} className="mb-3">
																<Select
																	className={`w-100 form-control-select ${errors.start_month && isSubmitted ? "is-invalid" : ""}`}
																	classNamePrefix="select"
																	options={vatMonths}
																	value={vatMonths.find((i) => i.value === values.start_month)}
																	placeholder="Start Month"
																	isSearchable={false}
																	onChange={(value) => {
																		let event = {
																			target: {
																				name: "start_month",
																				value: value.value,
																			},
																		};
																		handleChange(event);
																	}}
																/>
																<ErrorMessage name="start_month">{(msg) => <div className="invalid-feedback">{msg}</div>}</ErrorMessage>
															</Col>
															<Col sm={3} className="mb-3">
																<Select
																	className={`w-100 form-control-select ${errors.start_year && isSubmitted ? "is-invalid" : ""}`}
																	classNamePrefix="select"
																	options={vatYears}
																	value={vatYears.find((i) => i.value === values.start_year)}
																	placeholder="Start Year"
																	isSearchable={false}
																	onChange={(value) => {
																		let event = {
																			target: {
																				name: "start_year",
																				value: value.value,
																			},
																		};
																		handleChange(event);
																	}}
																/>
																<ErrorMessage name="start_year">{(msg) => <div className="invalid-feedback">{msg}</div>}</ErrorMessage>
															</Col>
														</Row>
													)}
													<Row>
														<Col sm={12} className="text-center mt-3">
															<Link to="../">
																<button type="button" className="btn btn-outline-primary" style={{ width: 150 }}>
																	Cancel
																</button>
															</Link>
															{isApproved && (
																<button type="submit" className="btn btn-primary" style={{ width: 150 }} onClick={() => setIsSubmitted(true)}>
																	Save
																</button>
															)}
															{!isApproved && (
																<button type="button" className="btn btn-primary" style={{ width: 150 }} onClick={(e) => setAddTradeLicenseExpiry(true)}>
																	Approve
																</button>
															)}
														</Col>
													</Row>
												</Form>
											)}
										</Formik>
									</Col>
								</Row>
							)}
						</Card.Body>
					</Card>
				</Col>
			</Row>
			<Modal size="lg" show={showNewPlanModal} backdrop="static" keyboard={true}>
				<Modal.Body className="p-0">
					<button type="button" className="btn-icon btn close-btn" onClick={() => setNewPlanModal(false)}>
						<i className="feather icon-x-circle"></i>
					</button>
					<AddNewPlan onShowLoader={setShowLoader} onSuccess={getClientData} selectedCountry={clientInfo?.client_user?.country} userId={id} toggleModal={setNewPlanModal} />
				</Modal.Body>
			</Modal>

			<Modal size="xl" show={showPlanHistoryModal} backdrop="static" keyboard={true}>
				<Modal.Body className="p-0">
					<button type="button" className="btn-icon btn close-btn" onClick={() => setPlanHistoryModal(false)}>
						<i className="feather icon-x-circle"></i>
					</button>
					<PlanHistory onShowLoader={setShowLoader} userId={id} userData={clientInfo} toggleModal={setPlanHistoryModal} />
				</Modal.Body>
			</Modal>

			<Modal size="md" show={showStatusConfirm} backdrop="static" keyboard={true}>
				<Modal.Header>
					<h5 className="card-title">Confirm Action</h5>
				</Modal.Header>
				<Modal.Body>
					<div>
						{isActive && <span>Only active users can login to application. </span>}
						<span>Are you sure that to {isActive ? "deactivate" : "activate"} this user?</span>
					</div>
				</Modal.Body>
				<Modal.Footer>
					<div>
						<button className="btn btn-outline-primary" onClick={() => setStatusConfirm(false)}>
							No
						</button>
						<button
							className="btn btn-primary"
							onClick={() => {
								setStatusConfirm(false);
								onActiveChange(!isActive);
							}}>
							Yes
						</button>
					</div>
				</Modal.Footer>
			</Modal>
			<Modal size="lg" show={addTradeLicenseExpiry} backdrop="static" keyboard={true}>
				<Modal.Body className="p-0">
					<button type="button" className="btn-icon btn close-btn" onClick={() => setAddTradeLicenseExpiry(false)}>
						<i className="feather icon-x-circle"></i>
					</button>
					<Row>
						<Col sm={12}>
							<form action="" onSubmit={approveUser}>
								<div className="text-center px-4 py-5">
									<div className="date-picker-container">
										<DatePicker className="form-control mb-2" required placeholderText="Trade License Expiry Date" dateFormat="dd/MM/yyyy" selected={tradeLicenseExpiry} onChange={setTradeLicenseExpiry} />
										<i className="feather icon-calendar"></i>
									</div>
									<button className="btn btn-primary" style={{ width: 150 }} type="submit">
										Approve
									</button>
								</div>
							</form>
						</Col>
					</Row>
				</Modal.Body>
			</Modal>
			<Modal size="lg" show={updateTradeLicenseExpiry} backdrop="static" keyboard={true}>
				<Modal.Body className="p-0">
					<button type="button" className="btn-icon btn close-btn" onClick={() => setUpdateTradeLicenseExpiry(false)}>
						<i className="feather icon-x-circle"></i>
					</button>
					<Row>
						<Col sm={12}>
							<form action="" onSubmit={approveUser}>
								<div className="text-center px-4 py-5">
									<div className="date-picker-container">
										<DatePicker className="form-control mb-2" required placeholderText="Update Trade License Expiry Date" dateFormat="dd/MM/yyyy" selected={tradeLicenseExpiry} onChange={setTradeLicenseExpiry} />
										<i className="feather icon-calendar"></i>
									</div>
									<button className="btn btn-primary" style={{ width: 150 }} type="submit">
										Update
									</button>
								</div>
							</form>
						</Col>
					</Row>
				</Modal.Body>
			</Modal>
			<Modal size="lg" show={showPreview} backdrop="static" keyboard={true}>
				<Modal.Body className="p-0">
					<button type="button" className="btn-icon btn close-btn" onClick={() => setshowPreview(false)}>
						<i className="feather icon-x-circle"></i>
					</button>
					<Row>
						<Col sm={12}>
							<div className="text-center px-4 py-5">
								<img src={selectedPreview} alt="Preview" style={{ maxWidth: "100%" }} />
							</div>
						</Col>
					</Row>
				</Modal.Body>
			</Modal>
		</React.Fragment>
	);
};

const optionToggle = React.forwardRef(({ children, onClick }, ref) => (
	<a
		href=""
		ref={ref}
		onClick={(e) => {
			e.preventDefault();
			onClick(e);
		}}>
		{children}
	</a>
));

export default UserProfile;
