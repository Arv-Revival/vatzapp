import React, { useState, useEffect } from "react";
import { Row, Col, Card, Dropdown, Modal } from "react-bootstrap";
import moment from "moment";

import { callApi } from "../../services/apiService";
import { showNotification } from "../../services/toasterService";
import { CONFIG } from "../../config/constant";
import { userRoles } from "../../enums/UserRoles";
import { ApiConstants } from "../../config/apiConstants";
import Spinner from "../../components/Spinner";
import PlanHistory from "./PlanHistory";
import AdminForm from "./forms/adminForm";
import CheckerForm from "./forms/checkerForm";
import ValidatorForm from "./forms/validatorForm";
import ClientForm from "./forms/clientForm";

import avatar1 from "../../assets/images/icons/company.png";

const Profile = (props) => {
	const [showLoader, setShowLoader] = useState(false);
	const [userInfo, setuserInfo] = useState(null);
	const [showPlanHistoryModal, setPlanHistoryModal] = useState(false);
	const [userData, setuserData] = useState(null);
	const [showEmployeeProfileModal, setEmployeeProfileModal] = useState(false);
	const [showPreview, setshowPreview] = useState(false);
	const [selectedPreview, setselectedPreview] = useState(null);

	useEffect(() => {
		let userObj = JSON.parse(localStorage.getItem("user"));
		setuserData(userObj);
		getProfileData();
	}, []);

	const getProfileData = () => {
		setShowLoader(true);
		callApi("get", ApiConstants.user.profile, null, true)
			.then((response) => {
				setShowLoader(false);
				if (response && response.status_code === 200) {
					let data = response.payload;
					setuserInfo(data);
				} else {
					showNotification("Error", response.message, "error");
				}
			})
			.catch((error) => {
				setShowLoader(false);
				showNotification("Error", "Something went wrong", "error");
			});
	};

	const editProfile = (event) => {
		event.preventDefault();
		setEmployeeProfileModal(true);
	};

	const onUpdateUser = () => {
		setEmployeeProfileModal(false);
		getProfileData();
	};

	const viewEntry = (entry) => {
		setselectedPreview(entry);
		setshowPreview(true);
	};

	return (
		<React.Fragment>
			{showLoader && <Spinner />}
			<Row>
				<Col sm={12} className="order-md-1">
					<Card>
						<Card.Header>
							<div className="d-flex justify-content-between w-100">
								<h5 className="text-primary">Profile</h5>
								<span>
									<button className="btn btn-primary ml-2" onClick={editProfile}>
										<i className="feather icon-edit-2" />
										Edit Profile
									</button>
								</span>
							</div>
						</Card.Header>
					</Card>
				</Col>
				<Col md={4} className="order-md-1">
					<Card>
						<Card.Body>
							<div className="d-flex align-middle">
								<div className="profile-avatr mr-4">{userInfo?.profile_image ? <img src={CONFIG.API_BASE_URL + ApiConstants.file.view + "?file_name=" + userInfo?.profile_image.file_path} alt="user" className="display_pic" /> : <img src={avatar1} alt="user" />}</div>

								<div className="d-inline-block">
									<h6>{userInfo?.name}</h6>
									{userInfo?.id && <p className="m-b-0">ID: VATZ{("000000" + userInfo?.id).slice(-6)}</p>}
									{userInfo?.client_user?.city && (
										<p className="m-b-0">
											{userInfo?.client_user?.city}, {userInfo?.client_user?.region?.name}
										</p>
									)}
									<span className="status active" />
								</div>
							</div>
							<Row className="profile-personal-info">
								<Col lg={12} className="mt-4 pl-4">
									<div className="text-primary">Email</div>
									<div>{userInfo?.email}</div>
								</Col>
								<Col lg={12} className="mt-4 pl-4">
									<div className="text-primary">Whatsapp</div>
									<div>
										{userInfo?.w_country_code} {userInfo?.whatsapp_no}
									</div>
								</Col>
								<Col lg={12} className="mt-4 pl-4">
									<div className="text-primary">Registered Date</div>
									{userInfo && <div>{moment(userInfo?.created_at).format("DD-MM-YYYY")}</div>}
								</Col>
								{userData?.user_role_id === userRoles?.Client && (
									<React.Fragment>
										<Col lg={12} className="mt-4 pl-4">
											<div className="text-primary">Landline Number</div>
											{userInfo?.client_user?.landline ? (
												<div>
													{userInfo?.client_user?.l_country_code} {userInfo?.client_user?.landline}
												</div>
											) : (
												"-"
											)}
										</Col>
										<Col lg={12} className="mt-4 pl-4">
											<div className="text-primary">Mobile Number</div>
											{userInfo?.client_user?.mobile ? (
												<div>
													{userInfo?.w_country_code} {userInfo?.client_user?.mobile}
												</div>
											) : (
												"-"
											)}
										</Col>
									</React.Fragment>
								)}
								{userData?.user_role_id === userRoles?.Checker && (
									<Col lg={12} className="mt-4 pl-4">
										<div className="text-primary">Mobile Number</div>
										{userInfo?.checker_user?.mobile ? (
											<div>
												{userInfo?.w_country_code} {userInfo?.checker_user?.mobile}
											</div>
										) : (
											"-"
										)}
									</Col>
								)}
								{userData?.user_role_id === userRoles?.Validator && (
									<Col lg={12} className="mt-4 pl-4">
										<div className="text-primary">Mobile Number</div>
										{userInfo?.validator_user?.mobile ? (
											<div>
												{userInfo?.w_country_code} {userInfo?.validator_user?.mobile}
											</div>
										) : (
											"-"
										)}
									</Col>
								)}
								{(userData?.user_role_id === userRoles?.Administrator || userData?.user_role_id === userRoles?.SuperAdmin) && (
									<Col lg={12} className="mt-4 pl-4">
										<div className="text-primary">Mobile Number</div>
										{userInfo?.admin_user?.mobile ? (
											<div>
												{userInfo?.w_country_code} {userInfo?.admin_user?.mobile}
											</div>
										) : (
											"-"
										)}
									</Col>
								)}
							</Row>
						</Card.Body>
					</Card>

					{userData?.user_role_id === userRoles?.Client && (
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
										{userInfo?.client_user?.plan_name ? <div>VATZ - {userInfo?.client_user?.plan_name}</div> : "-"}
									</Col>
									<Col sm={6}>
										<div className="font-weight-bold mb-2">Amount</div>
										<div>
											{userInfo?.client_user?.payment_currency} {userInfo?.client_user?.payment_amount !== null ? userInfo?.client_user?.payment_amount : "-"}
										</div>
									</Col>
									<Col sm={6} className="mt-4">
										<div className="font-weight-bold mb-2">Expiry Date</div>
										<div>{userInfo?.client_user?.to ? moment(new Date(userInfo?.client_user?.to)).format("DD-MM-YYYY") : "-"}</div>
									</Col>
									<Col sm={6} className="mt-4">
										<div className="font-weight-bold mb-2">Subscription Status</div>
										<div className={userInfo?.client_user?.to && moment(userInfo?.client_user?.to).isAfter(moment.now()) ? "text-success" : "text-danger"}>{userInfo?.client_user?.to && moment(userInfo?.client_user?.to).isAfter(moment.now()) ? "Active" : "Inactive"}</div>
									</Col>
									<Col sm={6} className="mt-4">
										<div className="font-weight-bold mb-2">Last Payment Date</div>
										<div>{userInfo?.client_user?.payment_date ? moment(userInfo?.client_user?.payment_date).format("DD-MM-YYYY") : "-"}</div>
									</Col>
								</Row>
							</Card.Body>
						</Card>
					)}
				</Col>
				<Col md={8} className="order-md-2">
					{userData?.user_role_id === userRoles?.Client && (
						<Card>
							<Card.Header>
								<h5 className="card-title">VAT Details</h5>
							</Card.Header>
							<Card.Body>
								<Row>
									<Col sm={12}>
										<Row>
											<Col sm={4}>
												<div>
													<div className="text-primary mb-2">VAT Period</div>
													<div className="mb-1">{userInfo?.client_user?.vat_period}</div>
													<div>
														{userInfo?.client_user?.from ? moment(userInfo?.client_user?.from).format("DD-MMM") : ""}
														{userInfo?.client_user?.from && <span> to </span>}
														{userInfo?.client_user?.to ? moment(userInfo?.client_user?.to).format("DD-MMM") : ""}
													</div>
												</div>
											</Col>
											<Col sm={4}>
												<div>
													<div className="text-primary mb-2">VAT Percentage </div>

													{userInfo?.client_user && <p>{userInfo?.client_user?.vat_percentage !== null ? userInfo?.client_user?.vat_percentage + "%" : "-"}</p>}
												</div>
											</Col>
											<Col sm={4}>
												<div>
													<div className="text-primary mb-2">Assigned Checker</div>
													<p>{userInfo?.client_user?.checker_user_id ? userInfo?.client_user?.checker?.name : "-"}</p>
												</div>
											</Col>
										</Row>
										<hr />

										<Row>
											<Col sm={4}>
												<div>
													<div className="text-primary font-weight-bold mb-2">Trade License Copy</div>
													<div>{userInfo?.client_user?.trade_license_number}</div>
													{userInfo && userInfo?.client_user?.trade_license_image && (
														<div className="mt-2 d-flex">
															<a target="_blank" className="btn text-primary" rel="noreferrer" href={CONFIG.API_BASE_URL + ApiConstants.file.download + "?file_name=" + userInfo?.client_user?.trade_license_image.file_path}>
																Download
															</a>
															<button className="btn text-primary" onClick={() => viewEntry(CONFIG.API_BASE_URL + ApiConstants.file.download + "?file_name=" + userInfo?.client_user?.trade_license_image.file_path)}>
																View
															</button>
														</div>
													)}
												</div>
											</Col>
											<Col sm={4}>
												<div>
													<div className="text-primary font-weight-bold mb-2">TRN</div>
													<div>{userInfo?.client_user?.trn_number}</div>
													{userInfo && userInfo?.client_user?.tran_certificate_image && (
														<div className="mt-2">
															<a target="_blank" rel="noreferrer" href={CONFIG.API_BASE_URL + ApiConstants.file.download + "?file_name=" + userInfo?.client_user?.tran_certificate_image.file_path}>
																Download
															</a>
															<button className="ml-4" onClick={() => viewEntry(CONFIG.API_BASE_URL + ApiConstants.file.download + "?file_name=" + userInfo?.client_user?.tran_certificate_image.file_path)}>
																View
															</button>
														</div>
													)}
												</div>
											</Col>
										</Row>
									</Col>
								</Row>
							</Card.Body>
						</Card>
					)}

					<Card>
						<Card.Header>
							<h5 className="card-title">Personal Details</h5>
						</Card.Header>
						<Card.Body>
							{userData?.user_role_id === userRoles?.Client && (
								<Row>
									<Col sm={12}>
										<Row>
											<Col sm={5}>
												<div>
													<div className="text-primary font-weight-bold mb-3">Address</div>
													<div className="mb-1">
														{userInfo?.client_user?.building_name && <span>{userInfo?.client_user?.building_name},</span>}
														{userInfo?.client_user?.palce && <span>{userInfo?.client_user?.palce}, </span>}
														{userInfo?.client_user?.city && <span>{userInfo?.client_user?.city}, </span>}
														{userInfo?.client_user?.p_o_box && <span>{userInfo?.client_user?.p_o_box}</span>}
													</div>
													{userInfo?.client_user?.country && (
														<div>
															{userInfo?.client_user.region?.name}, {userInfo?.client_user.country?.name}
														</div>
													)}
												</div>
											</Col>
											<Col sm={4}>
												<div>
													<div className="text-primary font-weight-bold mb-3">Contact Details</div>
													<div className="text-primary mb-2">Contact Person Name</div>
													<div>{userInfo?.client_user?.contact_person} </div>
												</div>
											</Col>
											<Col sm={3}>
												<div>
													<div className="text-primary mb-2" style={{ marginTop: 37 }}>
														Contact Number
													</div>
													<div>
														{userInfo?.client_user?.cp_country_code} {userInfo?.client_user?.cp_mobile}
													</div>
												</div>
											</Col>
										</Row>
									</Col>
								</Row>
							)}

							{(userData?.user_role_id === userRoles?.Administrator || userData?.user_role_id === userRoles?.SuperAdmin) && (
								<Row>
									<Col sm={12}>
										<Row>
											<Col sm={5}>
												<div>
													<div className="text-primary font-weight-bold mb-3">Address</div>
													<div className="mb-1">
														{userInfo?.admin_user?.building_name && <span>{userInfo?.admin_user?.building_name},</span>}
														{userInfo?.admin_user?.palce && <span>{userInfo?.admin_user?.palce}, </span>}
														{userInfo?.admin_user?.city && <span>{userInfo?.admin_user?.city}, </span>}
														{userInfo?.admin_user?.p_o_box && <span>{userInfo?.admin_user?.p_o_box}</span>}
													</div>
													{userInfo?.admin_user?.country && <div>{userInfo?.admin_user.country?.name}</div>}
												</div>
											</Col>
											<Col sm={4}>
												<div>
													<div className="text-primary font-weight-bold mb-3">Join Date</div>
													{userInfo?.admin_user ? <div>{moment(userInfo?.admin_user?.join_date).format("DD MMM YYYY")}</div> : "-"}
												</div>
											</Col>
											<Col sm={3}>
												<div>
													<div className="text-primary font-weight-bold mb-3">Monthly Salary</div>
													<div>
														{userInfo?.admin_user?.country.currency_code} {userInfo?.admin_user?.salary}
													</div>
												</div>
											</Col>
										</Row>
									</Col>
								</Row>
							)}

							{userData?.user_role_id === userRoles?.Checker && (
								<Row>
									<Col sm={12}>
										<Row>
											<Col sm={5}>
												<div className="mb-3">
													<div className="text-primary font-weight-bold mb-3">Address</div>
													<div className="mb-1">
														{userInfo?.checker_user?.building_name && <span>{userInfo?.checker_user?.building_name},</span>}
														{userInfo?.checker_user?.palce && <span>{userInfo?.checker_user?.palce}, </span>}
														{userInfo?.checker_user?.city && <span>{userInfo?.checker_user?.city}, </span>}
														{userInfo?.checker_user?.p_o_box && <span>{userInfo?.checker_user?.p_o_box}</span>}
													</div>
													{userInfo?.checker_user?.country && <div>{userInfo?.checker_user.country?.name}</div>}
												</div>
											</Col>
											<Col sm={4}>
												<div className="mb-3">
													<div className="text-primary font-weight-bold mb-3">Join Date</div>
													{userInfo?.checker_user ? <div>{moment(userInfo?.checker_user?.join_date).format("DD MMM YYYY")}</div> : "-"}
												</div>
											</Col>
											<Col sm={3}>
												<div className="mb-3">
													<div className="text-primary font-weight-bold mb-3">Maonthly Salary</div>
													<div>
														{userInfo?.checker_user?.country?.currency_code} {userInfo?.checker_user?.salary}
													</div>
												</div>
											</Col>
											<Col sm={5}>
												<div className="mb-3">
													<div className="text-primary font-weight-bold mb-3">Assigned Validator</div>
													{userInfo?.checker_user?.validator ? <div>{userInfo?.checker_user?.validator?.name}</div> : "-"}
												</div>
											</Col>
										</Row>
									</Col>
								</Row>
							)}

							{userData?.user_role_id === userRoles?.Validator && (
								<Row>
									<Col sm={12}>
										<Row>
											<Col sm={5}>
												<div className="mb-3">
													<div className="text-primary font-weight-bold mb-3">Address</div>
													<div className="mb-1">
														{userInfo?.validator_user?.building_name && <span>{userInfo?.validator_user?.building_name},</span>}
														{userInfo?.validator_user?.palce && <span>{userInfo?.validator_user?.palce}, </span>}
														{userInfo?.validator_user?.city && <span>{userInfo?.validator_user?.city}, </span>}
														{userInfo?.validator_user?.p_o_box && <span>{userInfo?.validator_user?.p_o_box}</span>}
													</div>
													{userInfo?.validator_user?.country && <div>{userInfo?.validator_user.country?.name}</div>}
												</div>
											</Col>
											<Col sm={4}>
												<div className="mb-3">
													<div className="text-primary font-weight-bold mb-3">Join Date</div>
													{userInfo?.validator_user ? <div>{moment(userInfo?.validator_user?.join_date).format("DD MMM YYYY")}</div> : "-"}
												</div>
											</Col>
											<Col sm={3}>
												<div className="mb-3">
													<div className="text-primary font-weight-bold mb-3">Maonthly Salary</div>
													<div>
														{userInfo?.validator_user?.country?.currency_code} {userInfo?.validator_user?.salary}
													</div>
												</div>
											</Col>
										</Row>
									</Col>
								</Row>
							)}
						</Card.Body>
					</Card>
				</Col>
			</Row>

			{/* PLAN HISTORY MODAL */}
			<Modal size="xl" show={showPlanHistoryModal} backdrop="static" keyboard={true}>
				<Modal.Body className="p-0">
					<button type="button" className="btn-icon btn close-btn" onClick={() => setPlanHistoryModal(false)}>
						<i className="feather icon-x-circle"></i>
					</button>
					<PlanHistory onShowLoader={setShowLoader} userId={userInfo?.id} userData={userInfo} toggleModal={setPlanHistoryModal} />
				</Modal.Body>
			</Modal>

			{/* EMPLOYEE PROFILE MODAL */}
			<Modal size="lg" show={showEmployeeProfileModal} backdrop="static" keyboard={true}>
				<Modal.Body className="p-0">
					<button type="button" className="btn-icon btn close-btn" onClick={() => setEmployeeProfileModal(false)}>
						<i className="feather icon-x-circle"></i>
					</button>
					{(userInfo?.primary_role === userRoles?.Administrator || userInfo?.primary_role === userRoles?.SuperAdmin) && <AdminForm onSuccess={onUpdateUser} onShowLoader={setShowLoader} userInfo={userInfo} {...props} />}
					{userInfo?.primary_role === userRoles?.Checker && <CheckerForm onSuccess={onUpdateUser} onShowLoader={setShowLoader} userInfo={userInfo} {...props} />}
					{userInfo?.primary_role === userRoles?.Validator && <ValidatorForm onSuccess={onUpdateUser} onShowLoader={setShowLoader} userInfo={userInfo} {...props} />}
					{userInfo?.primary_role === userRoles?.Client && <ClientForm onSuccess={onUpdateUser} onShowLoader={setShowLoader} userInfo={userInfo} {...props} />}
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
								<img src={selectedPreview} alt="Preview" style={{ maxWidth: 500 }} />
							</div>
						</Col>
					</Row>
				</Modal.Body>
			</Modal>
		</React.Fragment>
	);
};

const optionToggle = React.forwardRef(({ children, onClick }, ref) => (
	<button
		ref={ref}
		onClick={(e) => {
			e.preventDefault();
			onClick(e);
		}}>
		{children}
	</button>
));

export default Profile;
