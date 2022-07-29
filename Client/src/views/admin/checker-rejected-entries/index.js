import React, {useState, useEffect} from "react";
import {Row, Col, Card, Modal, OverlayTrigger, Popover, Accordion, Button, ListGroup, InputGroup, FormControl} from "react-bootstrap";
import {Grid, GridColumn as Column} from "@progress/kendo-react-grid";
import {process} from "@progress/kendo-data-query";
import moment from "moment";
import DatePicker from "react-datepicker";
import Select from "react-select";
import {FaAngleDown} from "react-icons/fa";

import {callApi} from "../../../services/apiService";
import {ApiConstants} from "../../../config/apiConstants";
import Spinner from "../../../components/Spinner";
import Preview from "../../../components/Preview";
import {entryTypeList} from "../../../enums/entryTypeList";
import {entryTypes} from "../../../enums/entryTypes";
import {entryStatus} from "../../../enums/entryStatus";
// import FileIcon from "../../../components/FileIcon";
import {showNotification} from "../../../services/toasterService";
import SalesForm from "./forms/salesForm";
import ExpenditureForm from "./forms/expenditureForm";
import PurchaseForm from "./forms/purchaseForm";
import useWindowSize from "../../../hooks/useWindowSize";

const RejectedEntries = (props) => {
	const [showLoader, setShowLoader] = useState(false);
	const [entriesList, setEntriesList] = useState([]);
	const [startDate, setStartDate] = useState(null);
	const [endDate, setEndDate] = useState(null);
	const [showPreview, setshowPreview] = useState(false);
	const [selectedEntry, setselectedEntry] = useState(null);
	const [clientVatPeriod, setclientVatPeriod] = useState(null);
	const [selectedEntryType, setselectedEntryType] = useState("");

	const [accordionList, setAccordionList] = useState([]);
	const [windowWidth, setWindowWidth] = useState(window.innerWidth);

	React.useLayoutEffect(() => {
		setWindowWidth(window.innerWidth > 992);
	}, []);

	const [gridState, setgridState] = useState({
		skip: 0,
		take: 10,
	});
	const [gridData, setgridData] = useState(null);

	const [gridWidth, setgridWidth] = useState(1024);
	const windowSize = useWindowSize();

	const pagerSettings = {
		buttonCount: 5,
		info: true,
		type: "numeric",
		pageSizes: true,
		previousNext: true,
	};

	useEffect(() => {
		let resizeObserver = new ResizeObserver(() => {
			(async () => {
				let gridContext = document.querySelector(".k-grid");
				if (gridContext?.offsetWidth > gridWidth) {
					setgridWidth(gridContext.offsetWidth);
				}
			})();
		});
		resizeObserver.observe(document.querySelector(".k-grid"));
		getData();
	}, [gridWidth]);

	useEffect(() => {
		setgridData(process(entriesList, gridState));
	}, [entriesList, gridState]);

	const setWidth = (minWidth) => {
		if (windowSize.width < 992) return minWidth;
		let dynamicWidth = gridWidth - 750;
		let width = dynamicWidth > minWidth ? dynamicWidth : minWidth;
		return width;
	};

	const pageChange = (event) => {
		let updatedState = {
			...gridState,
			skip: event.page.skip,
			take: event.page.take,
		};
		setgridState({...updatedState});
	};

	const filterChange = (event) => {
		let updatedState = {
			...gridState,
			filter: event.filter,
		};
		
		setgridState(updatedState);
	};

	const onSearchFilter = () => {
		let dateFilters = [];
		if (startDate) {
			dateFilters.push({
				field: "created_at",
				operator: "gte",
				value: moment(startDate).format("YYYY-MM-DD"),
			});
		}

		if (endDate) {
			dateFilters.push({
				field: "created_at",
				operator: "lte",
				value: moment(endDate).format("YYYY-MM-DD"),
			});
		}

		let updatedState = {
			...gridState,
			filter: {
				logic: "and",
				filters: dateFilters,
			},
		};
		
		setgridState(updatedState);
	};

	const resetFilters = () => {
		let updatedState = {
			...gridState,
			filter: null,
		};
		setgridState(updatedState);
		setStartDate(null);
		setEndDate(null);
	};

	const getVatPeriod = (entry) => {
		setShowLoader(true);
		let params = {user_id: entry.client_user_id};
		callApi("get", ApiConstants.client.currentvatperiod, params, true)
			.then((response) => {
				setShowLoader(false);
				if (response && response.status_code === 200) {
					setclientVatPeriod(response.payload);
				} else {
					showNotification("Error", response.message, "error");
				}
			})
			.catch((error) => {
				setShowLoader(false);
				showNotification("Error", "Something went wrong", "error");
			});
	};

	const getData = () => {
		setShowLoader(true);
		callApi("get", ApiConstants.admin.admincheckerrejectedlist, {}, true)
			.then((response) => {
				setShowLoader(false);
				if (response && response.status_code === 200) {
					let temp = response.payload;
					setEntriesList(temp);
					setAccordionList(temp);
					console.log(temp);
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
		setselectedEntry(entry);
		if (entry?.entry_status_id === entryStatus.RECHECK) {
			setselectedEntryType(entry.entry_type);
		}
		getVatPeriod(entry);
		setshowPreview(true);
	};

	const closeEntryModal = () => {
		setshowPreview(false);
		setselectedEntryType("");
	};

	const onEntrySubmit = () => {
		closeEntryModal();
		getData();
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
								<Col xs={10} md={1} xl={1}>
									<button type="button" className="btn-icon btn btn-primary search-button" onClick={onSearchFilter}>
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
								<Grid data={gridData} skip={gridState.skip} pageSize={gridState.take} pageable={pagerSettings} onPageChange={pageChange} filterable={true} filter={gridState.filter} onFilterChange={filterChange}>
									<Column field="id" title="#" filterable={false} width="60px" cell={(props) => <td>{props.dataIndex + 1}</td>} />
									<Column field="name" title="Client Name" width={setWidth(200)} />
									<Column field="checker_name" title="Checker Name" />
									<Column
										field="created_at"
										width="150"
										filterable={false}
										title="Entry Date"
										cell={(props) => (
											<td>
												<div>{moment(props.dataItem.created_at).format("DD-MMM-YYYY")}</div>
											</td>
										)}
									/>
									<Column
										field="Actions"
										title="Actions"
										filterable={false}
								
										cell={(props) => (
											<td>
												<div className={`text-center ${props.dataItem.entry_status_id === entryStatus.RECHECK ? "text-warning" : props.dataItem.entry_status_id === entryStatus.REJECTED ? "text-danger" : ""}`}>
													{props.dataItem.entry_status_id === entryStatus.RECHECK ? "Recheck" : props.dataItem.entry_status_id === entryStatus.REJECTED ? "Rejected" : ""}

													{(props.dataItem.entry_status_id === entryStatus.RECHECK || props.dataItem.entry_status_id === entryStatus.REJECTED) && (
														<span>
															&nbsp;&nbsp;
															<OverlayTrigger
																trigger="click"
																placement="top"
																rootClose={true}
																overlay={
																	<Popover id="popover-basic">
																		<Popover.Content>
																			<div className="p-2">{props.dataItem?.comment}</div>
																		</Popover.Content>
																	</Popover>
																}>
																<i className="feather icon-info text-primary" style={{fontSize: 16, cursor: "pointer"}}></i>
															</OverlayTrigger>
														</span>
													)}
												</div>
											</td>
										)}
									/>
									<Column
										field="View"
										title="View"
										filterable={false}
										width="100"
										cell={(props) => (
											<td>
												<div className="action-panel">
													<button type="button" className="btn-icon btn btn-outline-primary" title="View" onClick={() => viewEntry(props.dataItem)}>
														<i className="feather icon-eye"></i>
													</button>
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
												placeholder="Client Name"
												aria-label="Client Name"
												onChange={(event) => {
													setAccordionList(entriesList);
													return event.target.value ? setAccordionList(accordionList?.filter((data) => data.name?.includes(event.target.value))) : setAccordionList(entriesList);
												}}
											/>
										</InputGroup>
										<InputGroup className="mb-2">
											<FormControl
												className="form-control"
												placeholder="Checker Name"
												aria-label="Checker Name"
												onChange={(event) => {
													setAccordionList(entriesList);
													return event.target.value ? setAccordionList(accordionList?.filter((data) => data.checker_name?.includes(event.target.value))) : setAccordionList(entriesList);
												}}
											/>
										</InputGroup>

										<Accordion defaultActiveKey="0">
											{accordionList &&
												accordionList.length > 0 &&
												accordionList.map((row) => (
													<Card key={row.id} style={{marginBottom: 4}}>
														<Accordion.Toggle as={Card.Header} style={{backgroundColor: "#7599b1", color: "#ffffff", padding: "8px 16px"}} eventKey={row.id}>
															<div style={{display: "flex", justifyContent: "space-between"}}>
																{row.name}
																<Button variant="outline-light" size="sm">
																	<FaAngleDown />
																</Button>
															</div>
														</Accordion.Toggle>
														<Accordion.Collapse eventKey={row.id}>
															<Card.Body>
																<div className="action-panel" style={{dispaly: "flex", justifyContent: "flex-end", marginBottom: 16}}>
																	<button type="button" className="btn btn-outline-primary" title="View" onClick={() => viewEntry(row)}>
																		View <i className="feather icon-eye"></i>
																	</button>
																</div>
																<ListGroup>
																	<ListGroup.Item>
																		<span style={{padding: "0 16px 0 8px"}}>Checker:</span>
																		<span> {row.checker_name}</span>
																	</ListGroup.Item>
																	<ListGroup.Item>
																		<span style={{padding: "0 16px 0 8px"}}>Entry Date:</span>
																		<span> {moment(row.invoice_date).format("DD-MMM-YYYY")}</span>
																	</ListGroup.Item>
																	<ListGroup.Item style={{display: "flex"}}>
																		<span style={{padding: "0 16px 0 8px"}}>Action:</span>
																		<div className={`text-center ${row.entry_status_id === entryStatus.RECHECK ? "text-warning" : row.entry_status_id === entryStatus.REJECTED ? "text-danger" : ""}`}>
																			{row.entry_status_id === entryStatus.RECHECK ? "Recheck" : row.entry_status_id === entryStatus.REJECTED ? "Rejected" : ""}

																			{(row.entry_status_id === entryStatus.RECHECK || row.entry_status_id === entryStatus.REJECTED) && (
																				<span>
																					&nbsp;&nbsp;
																					<OverlayTrigger
																						trigger="click"
																						placement="top"
																						rootClose={true}
																						overlay={
																							<Popover id="popover-basic">
																								<Popover.Content>
																									<div className="p-2">{props.dataItem?.comment}</div>
																								</Popover.Content>
																							</Popover>
																						}>
																						<i className="feather icon-info text-primary" style={{fontSize: 16, cursor: "pointer"}}></i>
																					</OverlayTrigger>
																				</span>
																			)}
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
			<Modal size={selectedEntryType === entryTypes.PURCHASE ? "xl" : "lg"} show={showPreview} backdrop="static" keyboard={true}>
				<Modal.Body className="p-0">
					<button type="button" className="btn-icon btn close-btn" onClick={closeEntryModal}>
						<i className="feather icon-x-circle"></i>
					</button>
					<div className="px-4 py-5">
						<Row>
							<Col className="col-12">
								<Preview source={selectedEntry?.file_path} containerStyles={{backgroundColor: "#f5f5f5", padding: 10}} zoom={true} />
							</Col>
						</Row>
					</div>
				</Modal.Body>
			</Modal>
		</React.Fragment>
	);
};

export default RejectedEntries;
