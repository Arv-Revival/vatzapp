import React, {useState, useEffect} from "react";
import {Link} from "react-router-dom";
import {Row, Col, Card, Modal, Accordion, Button, ListGroup, FormControl, InputGroup} from "react-bootstrap";
import {Grid, GridColumn as Column} from "@progress/kendo-react-grid";
import {process} from "@progress/kendo-data-query";
import moment from "moment";
import DatePicker from "react-datepicker";
import {FaAngleDown} from "react-icons/fa";

import {callApi} from "../../../services/apiService";
import {showNotification} from "../../../services/toasterService";
import {ApiConstants} from "../../../config/apiConstants";
import {clientStatus} from "../../../enums/clientStatus";
import Spinner from "../../../components/Spinner";
import {DropdownFilterCell} from "../../../components/CustomFilters/DropdownFilter";
import ClientForm from "./form";

const options = ["Approved", "Registered"];
const StatusFilterCell = (props) => <DropdownFilterCell {...props} data={options} defaultItem={"All"} />;

const Clients = (props) => {
	const [showLoader, setShowLoader] = useState(false);
	const [clientsList, setClientsList] = useState([]);
	const [startDate, setStartDate] = useState(null);
	const [endDate, setEndDate] = useState(null);
	const [clientsState, setClientsState] = useState({skip: 0, take: 10});
	const [clientsGridData, setclientsGridData] = useState(null);
	const [showEditModal, setshowEditModal] = useState(false);
	const [isEdit, setIsEdit] = useState(false);
	const [selectedItem, setSelectedItem] = useState(null);
	const [windowWidth, setWindowWidth] = useState(window.innerWidth);
	const [accordionList, setAccordionList] = useState([]);

	React.useLayoutEffect(() => {
		setWindowWidth(window.innerWidth > 992);
	}, []);

	const pagerSettings = {buttonCount: 5, info: true, type: "numeric", pageSizes: true, previousNext: true};

	useEffect(() => {
		getClients();
	}, []);

	useEffect(() => {
		setclientsGridData(process(clientsList, clientsState));
	}, [clientsList, clientsState]);

	const pageChange = (event) => {
		setClientsState({...clientsState, skip: event.page.skip, take: event.page.take});
	};

	const filterChange = (event) => {
		setClientsState({...clientsState, filter: event.filter});
	};

	const resetFilters = () => {
		setClientsState({...clientsState, filter: null});
		setStartDate(null);
		setEndDate(null);
	};

	const onSearchFilter = () => {
		let dateFilters = [];
		if (windowWidth) {
			if (startDate) {
				dateFilters.push({field: "join_date", operator: "gte", value: moment(startDate).format("YYYY-MM-DD")});
			}
			if (endDate) {
				dateFilters.push({field: "join_date", operator: "lte", value: moment(endDate).format("YYYY-MM-DD")});
			}
			let updatedState = {...clientsState, filter: {logic: "and", filters: dateFilters}};
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
	const formatVatPeriod = (val) => {
		let vat_label;
		switch (val) {
			case 1:
				vat_label = "Monthly";
				break;
			case 3:
				vat_label = "Quarterly";
				break;
			case 6:
				vat_label = "Half Yearly";
				break;
			case 12:
				vat_label = "Yearly";
				break;
			default:
				vat_label = "NA";
				break;
		}
		return vat_label;
	};
	const getClients = () => {
		setShowLoader(true);
		callApi("get", ApiConstants.checker.clientlist, {}, true)
			.then((response) => {
				setShowLoader(false);
				if (response && response.status_code === 200) {
					let data = response.payload.map((item) => ({...item, status: item.verified_on ? clientStatus.APPROVED : clientStatus.REGISTERED}));
					let vat_data = response.payload.map((item) => ({...item, vat_type: formatVatPeriod(item.vat_period)}));
					setClientsList(vat_data);
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
		setIsEdit(false);
		setSelectedItem(null);
	};

	const onEdit = (data) => {
		setSelectedItem(data);
		setIsEdit(true);
		setshowEditModal(true);
	};

	const onEditUser = () => {
		closeModal();
		getClients();
	};

	return (
		<React.Fragment>
			{showLoader && <Spinner />}
			<Row>
				<Col xl={12}>
					<Card className="rounded">
						<Card.Body className="p-4">
							{/* <Row className="mb-3">
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
              </Row> */}

							{windowWidth && (
								<Grid data={clientsGridData} skip={clientsState.skip} pageable={pagerSettings} pageSize={clientsState.take} onPageChange={pageChange} filterable={true} filter={clientsState.filter} onFilterChange={filterChange}>
									<Column field="id" title="#" width="60px" filterable={false} cell={(props) => <td>{props.dataIndex + 1}</td>} />
									<Column field="name" width="250" title="Company Name" />
									<Column field="trn_number" width="160" title="TRN" />
									<Column field="emirate" width="160" title="Emirates" />
									<Column field="vat_type" width="160" title="VAT Period" />
									<Column field="to" width="160" title="Next Due Date" />
									{/* <Column field="contact_person" width="200" title="Contact Person" /> */}
									{/* <Column field="join_date" width="150" filterable={false} title="Join Date" cell={(props) => <td>{moment(props.dataItem.join_date).format("DD-MMM-YYYY")}</td>} /> */}
									{/* <Column field="email" width="300" title="Email" /> */}
									{/* <Column field="cp_mobile" width="180" title="Contact No" cell={(props) => <td>{`${props.dataItem.cp_country_code} ${props.dataItem.cp_mobile}`}</td>} /> */}
									{/* <Column field="whatsapp_no" width="180" title="WhatsApp No" cell={(props) => <td>{`${props.dataItem.w_country_code} ${props.dataItem.whatsapp_no}`}</td>} /> */}
									{/* <Column
                    field="status"
                    title="Status"
                    filterCell={StatusFilterCell}
                    width="150"
                    cell={(props) => (
                      <td>
                        <div className={props.dataItem.verified_on ? "text-success" : "text-warning"}>{props.dataItem.status}</div>
                      </td>
                    )}
                  /> */}
									{/* <Column
                    field="Actions"
                    filterable={false}
                    width="120"
                    cell={(props) => (
                      <td>
                        <div className="action-panel">
                          <Link className="text-primary" to={"/checker/clients/profile/" + props.dataItem.id}>
                            <button type="button" className="btn-icon btn btn-outline-primary" title="Edit">
                              <i className="feather icon-eye"></i>
                            </button>
                          </Link>
                          <button type="button" className="btn-icon btn btn-outline-primary" title="Edit" onClick={() => onEdit(props.dataItem)}>
                            <i className="feather icon-edit-2"></i>
                          </button>
                        </div>
                      </td>
                    )}
                  /> */}
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
												placeholder="Emirate"
												aria-label="Emirate"
												onChange={(event) => {
													setAccordionList(clientsGridData.data);
													return event.target.value ? setAccordionList(clientsGridData.data?.filter((data) => data.emirate?.includes(event.target.value))) : setAccordionList(clientsGridData.data);
												}}
											/>
										</InputGroup>

										{/* <InputGroup className="mb-2">
                      <FormControl
                        className="form-control"
                        placeholder="VAT Period"
                        aria-label="VAT-Period"
                        onChange={(event) => {
                          setAccordionList(clientsGridData.data);
                          return event.target.value ? setAccordionList(clientsGridData.data?.filter((data) => data.vat_period?.includes(event.target.value))) : setAccordionList(clientsGridData.data);
                        }}
                      />
                    </InputGroup> */}
										{/* <InputGroup className="mb-2">
                      <FormControl
                        className="form-control"
                        placeholder="WhatsApp Number"
                        aria-label="WhatsApp Number"
                        onChange={(event) => {
                          setAccordionList(clientsGridData.data);
                          return event.target.value ? setAccordionList(clientsGridData.data?.filter((data) => data.whatsapp_no?.includes(event.target.value))) : setAccordionList(clientsGridData.data);
                        }}
                      />
                    </InputGroup> */}
										{/* <InputGroup className="mb-2">
                      <FormControl
                        className="form-control"
                        placeholder="Validator"
                        aria-label="Validator"
                        onChange={(event) => {
                          setAccordionList(clientsGridData.data);
                          return event.target.value ? setAccordionList(clientsGridData.data?.filter((data) => data.validator_name?.includes(event.target.value))) : setAccordionList(clientsGridData.data);
                        }}
                      />
                    </InputGroup> */}

										<Accordion defaultActiveKey="0">
											{accordionList &&
												accordionList.length > 0 &&
												accordionList.map((row) => (
													<Card key={row.id} style={{marginBottom: 4}}>
														<Accordion.Toggle as={Card.Header} style={{backgroundColor: "#7599b1", color: "#ffffff", padding: "8px 16px"}} eventKey={row.id}>
															<div style={{display: "flex", justifyContent: "space-between"}}>
																Company: {row.name}
																<Button variant="outline-light" size="sm">
																	<FaAngleDown />
																</Button>
															</div>
														</Accordion.Toggle>
														<Accordion.Collapse eventKey={row.id}>
															<Card.Body>
																<div className="action-panel" style={{dispaly: "flex", justifyContent: "flex-end", marginBottom: 16}}>
																	<button type="button" className="btn btn-outline-primary" title="View" onClick={() => onEdit(row)}>
																		<i className="feather icon-edit-2"></i>
																	</button>
																</div>
																<ListGroup>
																	<ListGroup.Item>
																		<span style={{padding: "0 16px 0 8px"}}>TRN:</span>
																		<span> {row.trn_number}</span>
																	</ListGroup.Item>

																	<ListGroup.Item>
																		<span style={{padding: "0 16px 0 8px"}}>Joining Date:</span>
																		<span> {moment(row.join_date).format("DD-MMM-YYYY")}</span>
																	</ListGroup.Item>
																	<ListGroup.Item>
																		<span style={{padding: "0 16px 0 8px"}}>Emirates:</span>
																		<span> {row.emirate}</span>
																	</ListGroup.Item>

																	<ListGroup.Item>
																		<span style={{padding: "0 16px 0 8px"}}>VAT Period:</span>
																		<span>{`${row.vat_period}`}</span>
																	</ListGroup.Item>
																	<ListGroup.Item>
																		<span style={{padding: "0 16px 0 8px"}}>Next Due Date:</span>
																		<span> {moment(row.join_date).format("DD-MMM-YYYY")}</span>
																	</ListGroup.Item>
																	{/* <ListGroup.Item>
                                    <div className="action-panel">
                                    <span style={{ padding: "0 16px 0 8px" }}>Actions:</span>
                                      <Link className="text-primary" to={"/users/clients/profile/" + row.id}>
                                        <button type="button" className="btn-icon btn btn-outline-primary" title="Edit">
                                          <i className="feather icon-eye"></i>
                                        </button>
                                      </Link>
                                      <button type="button" className="btn-icon btn btn-outline-primary" title="Edit" onClick={() => onEdit(row)}>
                                        <i className="feather icon-edit-2"></i>
                                      </button>
                                    </div>
                                  </ListGroup.Item> */}
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
					<ClientForm onSuccess={onEditUser} onShowLoader={setShowLoader} isEdit={isEdit} dataItem={selectedItem} {...props} />
				</Modal.Body>
			</Modal>
		</React.Fragment>
	);
};

export default Clients;
