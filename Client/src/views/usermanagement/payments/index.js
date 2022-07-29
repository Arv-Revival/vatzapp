import React, { useState, useEffect } from "react";
import { Link } from "react-router-dom";
import { Row, Col, Card, Modal, Accordion, Button, ListGroup, FormControl, InputGroup, Form } from "react-bootstrap";
import { Grid, GridColumn as Column } from "@progress/kendo-react-grid";
import { process } from "@progress/kendo-data-query";
import moment from "moment";
import DatePicker from "react-datepicker";
import { FaAngleDown } from "react-icons/fa";
import { TiTickOutline } from "react-icons/ti";

import { callApi } from "../../../services/apiService";
import { showNotification } from "../../../services/toasterService";
import { ApiConstants } from "../../../config/apiConstants";
import { clientStatus } from "../../../enums/clientStatus";
import Spinner from "../../../components/Spinner";

const Payments = (props) => {
	const [showLoader, setShowLoader] = useState(false);
	const [clientsList, setClientsList] = useState([]);
	const [startDate, setStartDate] = useState(null);
	const [endDate, setEndDate] = useState(null);
	const [clientsState, setClientsState] = useState({ skip: 0, take: 10 });
	const [clientsGridData, setclientsGridData] = useState(null);
	const [showEditModal, setshowEditModal] = useState(false);
	const [windowWidth, setWindowWidth] = useState(window.innerWidth);
	const [accordionList, setAccordionList] = useState([]);
	const [paymentURL, setPaymentURL] = useState("");
	const [clientId, setClientId] = useState("");

	React.useLayoutEffect(() => {
		setWindowWidth(window.innerWidth > 992);
	}, []);

	let userObj = localStorage.getItem("user");
	let token = "";
	if (userObj) token = JSON.parse(userObj).token;

	const config = {
		headers: {},
	};

	config.headers.Authorization = `Bearer ${token}`;

	const pagerSettings = { buttonCount: 5, info: true, type: "numeric", pageSizes: true, previousNext: true };

	useEffect(() => {
		getClients();
	}, []);

	useEffect(() => {
		setclientsGridData(process(clientsList, clientsState));
	}, [clientsList, clientsState]);

	const pageChange = (event) => {
		setClientsState({ ...clientsState, skip: event.page.skip, take: event.page.take });
	};

	const filterChange = (event) => {
		setClientsState({ ...clientsState, filter: event.filter });
	};

	const resetFilters = () => {
		setClientsState({ ...clientsState, filter: null });
		setStartDate(null);
		setEndDate(null);
	};

	const onSearchFilter = () => {
		let dateFilters = [];
		if (windowWidth) {
			if (startDate) {
				dateFilters.push({ field: "join_date", operator: "gte", value: moment(startDate).format("YYYY-MM-DD") });
			}
			if (endDate) {
				dateFilters.push({ field: "join_date", operator: "lte", value: moment(endDate).format("YYYY-MM-DD") });
			}
			let updatedState = { ...clientsState, filter: { logic: "and", filters: dateFilters } };
			setClientsState(updatedState);
		} else {
			if (startDate && !endDate) {
				setAccordionList(accordionList.filter((data) => new Date(data.join_date) >= new Date(startDate)));
			}
			if (endDate && !startDate) {
				setAccordionList(accordionList.filter((data) => new Date(data.join_date) < new Date(endDate)));
			}
			if (endDate && startDate) {
				setAccordionList(accordionList.filter((data) => new Date(data.join_date) >= new Date(startDate) && new Date(data.join_date) <= new Date(endDate)));
			}
		}
	};

	const getClients = () => {
		setShowLoader(true);
		callApi("get", ApiConstants.client.list, {})
			.then((response) => {
				setShowLoader(false);
				if (response && response.status_code === 200) {
					let data = response.payload.map((item) => ({ ...item, status: item.verified_on ? clientStatus.APPROVED : clientStatus.REGISTERED }));
					console.log(response.payload);
					setClientsList(data);
					setAccordionList(data);
				} else {
					showNotification("Error", response.message, "error");
				}
			})
			.catch((error) => {
				setShowLoader(false);
				showNotification("Error", "Something went wrong", "error");
			});
	};

	const closeModal = () => {
		setshowEditModal(false);
		setPaymentURL("");
		setClientId("");
	};

	const onEdit = (id) => {
		setClientId(id);
		setshowEditModal(true);
	};

	const paymentUrlChange = (e) => {
		e.preventDefault();
		callApi("post", ApiConstants.admin.addpaymentlink, { payment_url: paymentURL, id: clientId }, true)
			.then((response) => {
				setShowLoader(false);
				if (response && response.status_code !== 200) {
					showNotification("Error", response.message, "error");
				} else {
					getClients();
					closeModal();
					showNotification("Success", response.message, "success");
				}
			})
			.catch((error) => {
				console.log(error);
				setShowLoader(false);
				showNotification("Error", "Something went wrong", "error");
			});
		// console.log({payment_url: paymentURL, id: clientId});
	};
	const markAsPaid = (id) => {
		callApi("post", ApiConstants.admin.deletepaymentlink, { id: id }, true)
			.then((response) => {
				setShowLoader(false);
				getClients();
				if (response && response.status_code !== 200) {
					showNotification("Error", response.message, "error");
				}
			})
			.catch((error) => {
				setShowLoader(false);
				showNotification("Error", "Something went wrong", "error");
			});
	};

	return (
		<React.Fragment>
			{showLoader && <Spinner />}
			<Row>
				<Col xl={12}>
					<Card className="rounded">
						<Card.Body className="p-4">
							<Row className="mb-3">
								<Col xs={12} md={4} xl={3}>
									<div className="date-picker-container">
										<DatePicker className="form-control mb-2" placeholderText="Start Date" dateFormat="dd/MM/yyyy" selected={startDate} onSelect={() => setEndDate(null)} onChange={setStartDate} />
										<i className="feather icon-calendar"></i>
									</div>
								</Col>
								<Col xs={12} md={4} xl={3}>
									<div className="date-picker-container">
										<DatePicker className="form-control mb-2" minDate={startDate} placeholderText="End Date" dateFormat="dd/MM/yyyy" selected={endDate} onChange={setEndDate} />
										<i className="feather icon-calendar"></i>
									</div>
								</Col>
								<Col xs={12} md={1} xl={1}>
									<button type="button" onClick={onSearchFilter} className="btn-icon btn btn-primary search-button">
										<i className="feather icon-search"></i>
									</button>
								</Col>
								<Col xs={2} md={1} xl={1}>
									{(startDate || endDate) && (
										<div className="filter-close-btn" role="button" onClick={resetFilters}>
											<i className="feather icon-x"></i>
										</div>
									)}
								</Col>
							</Row>
							{windowWidth && (
								<Grid data={clientsGridData} skip={clientsState.skip} pageable={pagerSettings} pageSize={clientsState.take} onPageChange={pageChange} filterable={true} filter={clientsState.filter} onFilterChange={filterChange}>
									<Column field="id" title="#" width="60px" filterable={false} cell={(props) => <td>{props.dataIndex + 1}</td>} />
									<Column field="name" width="250" title="Company Name" />
									<Column field="trn_number" width="160" title="TRN" />
									<Column field="expiry_date" width="150" filterable={false} title="Expiry Date" cell={(props) => <td>{props.dataItem.to ? moment(props.dataItem.to).format("DD-MMM-YYYY") : ""}</td>} />
									<Column field="email" width="300" title="Email" />
									<Column field="cp_mobile" width="180" title="Contact No" cell={(props) => <td>{`${props.dataItem.cp_country_code} ${props.dataItem.cp_mobile}`}</td>} />
									<Column field="whatsapp_no" width="180" title="WhatsApp No" cell={(props) => <td>{`${props.dataItem.w_country_code} ${props.dataItem.whatsapp_no}`}</td>} />
									<Column
										field="Actions"
										filterable={false}
										width="120"
										cell={(props) => (
											<td>
												<div className="action-panel">
													<button type="button" className="btn-icon btn btn-outline-primary" title="Edit" onClick={() => onEdit(props.dataItem.id)}>
														<i className="feather icon-edit-2"></i>
													</button>
													{props?.dataItem?.payment_url && (
														<button type="button" className="btn-icon btn btn-outline-primary" title="Payment Complete" onClick={() => markAsPaid(props.dataItem.id)}>
															<TiTickOutline size="1.8em" />
														</button>
													)}
												</div>
											</td>
										)}
									/>
								</Grid>
							)}
							<div>
								{!windowWidth && (
									<>
										<InputGroup className="mb-2">
											<FormControl
												className="form-control"
												placeholder="Company"
												aria-label="Company"
												onChange={(event) => {
													setAccordionList(clientsGridData.data);
													return event.target.value ? setAccordionList(clientsGridData.data?.filter((data) => data.name?.includes(event.target.value))) : setAccordionList(clientsGridData.data);
												}}
											/>
										</InputGroup>
										<InputGroup className="mb-2">
											<FormControl
												className="form-control"
												placeholder="TRN"
												aria-label="TRN"
												onChange={(event) => {
													setAccordionList(clientsGridData.data);
													return event.target.value ? setAccordionList(clientsGridData.data?.filter((data) => data.trn_number?.includes(event.target.value))) : setAccordionList(clientsGridData.data);
												}}
											/>
										</InputGroup>
										<InputGroup className="mb-2">
											<FormControl
												className="form-control"
												placeholder="WhatsApp Number"
												aria-label="WhatsApp Number"
												onChange={(event) => {
													setAccordionList(clientsGridData.data);
													return event.target.value ? setAccordionList(clientsGridData.data?.filter((data) => data.whatsapp_no?.includes(event.target.value))) : setAccordionList(clientsGridData.data);
												}}
											/>
										</InputGroup>
										<InputGroup className="mb-2">
											<FormControl
												className="form-control"
												placeholder="Validator"
												aria-label="Validator"
												onChange={(event) => {
													setAccordionList(clientsGridData.data);
													return event.target.value ? setAccordionList(clientsGridData.data?.filter((data) => data.validator_name?.includes(event.target.value))) : setAccordionList(clientsGridData.data);
												}}
											/>
										</InputGroup>

										<Accordion defaultActiveKey="0">
											{accordionList &&
												accordionList.length > 0 &&
												accordionList.map((row) => (
													<Card key={row.id} style={{ marginBottom: 4 }}>
														<Accordion.Toggle as={Card.Header} style={{ backgroundColor: "#7599b1", color: "#ffffff", padding: "8px 16px" }} eventKey={row.id}>
															<div style={{ display: "flex", justifyContent: "space-between" }}>
																Company: {row.name}
																<Button variant="outline-light" size="sm">
																	<FaAngleDown />
																</Button>
															</div>
														</Accordion.Toggle>
														<Accordion.Collapse eventKey={row.id}>
															<Card.Body>
																<div className="action-panel" style={{ dispaly: "flex", justifyContent: "flex-end", marginBottom: 16 }}>
																	<button type="button" className="btn btn-outline-primary" title="View" onClick={() => onEdit(row.id)}>
																		<i className="feather icon-edit-2"></i>
																	</button>
																</div>
																<ListGroup>
																	<ListGroup.Item>
																		<span style={{ padding: "0 16px 0 8px" }}>TRN:</span>
																		<span> {row.trn_number}</span>
																	</ListGroup.Item>
																	<ListGroup.Item>
																		<span style={{ padding: "0 16px 0 8px" }}>Contact Person:</span>
																		<span> {row.contact_person}</span>
																	</ListGroup.Item>
																	<ListGroup.Item>
																		<span style={{ padding: "0 16px 0 8px" }}>Joining Date:</span>
																		<span> {moment(row.join_date).format("DD-MMM-YYYY")}</span>
																	</ListGroup.Item>
																	<ListGroup.Item>
																		<span style={{ padding: "0 16px 0 8px" }}>Email:</span>
																		<span> {row.email}</span>
																	</ListGroup.Item>
																	<ListGroup.Item>
																		<span style={{ padding: "0 16px 0 8px" }}>Contact Number:</span>
																		<span>{`${row.cp_country_code} ${row.cp_mobile}`}</span>
																	</ListGroup.Item>
																	<ListGroup.Item>
																		<span style={{ padding: "0 16px 0 8px" }}>WhatsApp:</span>
																		<span>{`${row.w_country_code} ${row.whatsapp_no}`}</span>
																	</ListGroup.Item>
																	<ListGroup.Item>
																		<span style={{ padding: "0 16px 0 8px" }}>Status:</span>
																		<span className={row.verified_on ? "text-success" : "text-warning"}>{row.status}</span>
																	</ListGroup.Item>
																	<ListGroup.Item>
																		<div className="action-panel">
																			<span style={{ padding: "0 16px 0 8px" }}>Actions:</span>
																			<Link className="text-primary" to={"/users/clients/profile/" + row.id}>
																				<button type="button" className="btn-icon btn btn-outline-primary" title="Edit">
																					<i className="feather icon-eye"></i>
																				</button>
																			</Link>
																			<button type="button" className="btn-icon btn btn-outline-primary" title="Edit" onClick={() => onEdit(row.id)}>
																				<i className="feather icon-edit-2"></i>
																			</button>
																		</div>
																	</ListGroup.Item>
																</ListGroup>
															</Card.Body>
														</Accordion.Collapse>
													</Card>
												))}
										</Accordion>
									</>
								)}
							</div>
						</Card.Body>
					</Card>
				</Col>
			</Row>
			<Modal size="lg" show={showEditModal} backdrop="static" keyboard={true}>
				<Modal.Body className="p-0">
					<button type="button" className="btn-icon btn close-btn" onClick={closeModal}>
						<i className="feather icon-x-circle"></i>
					</button>
					<Card>
						<Card.Body>
							<Card.Title align="center" className="mb-4">
								Payment Link
							</Card.Title>

							<form onSubmit={paymentUrlChange}>
								<Form.Control id="paymentlink" aria-describedby="paymentlink" value={paymentURL} onChange={(e) => setPaymentURL(e.target.value)} />
								<div className="d-flex justify-content-end">
									{<Button variant="primary" className="mt-4" type="submit">
										Submit
									</Button>}
								</div>
							</form>
						</Card.Body>
					</Card>
				</Modal.Body>
			</Modal>
		</React.Fragment>
	);
};

export default Payments;
