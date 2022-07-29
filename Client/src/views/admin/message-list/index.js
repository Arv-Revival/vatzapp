import React, {useState, useEffect} from "react";
import {Row, Col, Card, Modal, Accordion, Button, ListGroup, InputGroup, FormControl} from "react-bootstrap";
import {Grid, GridColumn as Column} from "@progress/kendo-react-grid";
import {process} from "@progress/kendo-data-query";
import moment from "moment";
import DatePicker from "react-datepicker";
import Select from "react-select";
import {FaAngleDown} from "react-icons/fa";
import {AiOutlineReload} from "react-icons/ai";
import {callApi} from "../../../services/apiService";
import {ApiConstants} from "../../../config/apiConstants";
import {showNotification} from "../../../services/toasterService";
import Spinner from "../../../components/Spinner";
import Preview from "../../../components/Preview";
import {entryTypeList} from "../../../enums/entryTypeList";
import {entryTypes} from "../../../enums/entryTypes";
import useWindowSize from "../../../hooks/useWindowSize";

const MessageList = (props) => {
	const [showLoader, setShowLoader] = useState(false);
	const [entriesList, setEntriesList] = useState([]);
	const [startDate, setStartDate] = useState(null);
	const [endDate, setEndDate] = useState(null);
	// const [showPreview, setshowPreview] = useState(false);
	// const [selectedEntry, setselectedEntry] = useState(null);
	// const [selectedEntryType, setselectedEntryType] = useState("");
	// const [showDeleteConfirm, setDeleteConfirm] = React.useState(false);

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

	const pagerSettings = {
		buttonCount: 5,
		info: true,
		type: "numeric",
		pageSizes: true,
		previousNext: true,
	};

	useEffect(() => {
		let resizeObserver = new ResizeObserver(() => {
			handleResize();
		});
		resizeObserver.observe(document.querySelector(".k-grid"));
		getData();
	}, []);

	useEffect(() => {
		loadGridData();
	}, [entriesList, gridState]);

	const handleResize = () => {
		let gridContext = document.querySelector(".k-grid");
		if (gridContext?.offsetWidth > gridWidth) {
			setgridWidth(gridContext.offsetWidth);
		}
	};

	const loadGridData = () => {
		let updatedData = process(entriesList, gridState);
		setgridData(updatedData);
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
		console.log(updatedState);
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

	const getData = () => {
		setShowLoader(true);
		callApi("get", ApiConstants.message.getallmessages, {}, true)
			.then((response) => {
				setShowLoader(false);
				if (response && response.status_code === 200) {
					console.log(response.payload);
					setEntriesList(response.payload);
					setAccordionList(response.payload);
				} else {
					showNotification("Error", response.message, "error");
				}
			})
			.catch((error) => {
				setShowLoader(false);
				showNotification("Error", "Something went wrong", "error");
			});
	};

	// const viewEntry = (entry) => {
	// 	setselectedEntry(entry);
	// 	setselectedEntryType(entry.entry_type);
	// 	setshowPreview(true);
	// };

	// const closeEntryModal = () => {
	// 	setshowPreview(false);
	// 	setselectedEntryType("");
	// };

	// const onEntrySubmit = () => {
	// 	closeEntryModal();
	// 	getData();
	// };

	// const deleteEntry = (entry) => {
	// 	setselectedEntry(entry);
	// 	setDeleteConfirm(true);
	// };

	// const deleteData = () => {
	// 	setShowLoader(true);
	// 	callApi("post", ApiConstants.entry.validatorapprovedlist, {entry_id: selectedEntry.id}, true)
	// 		.then((response) => {
	// 			setShowLoader(false);
	// 			if (response && response.status_code === 200) {
	// 				showNotification("Success", response.message, "success");
	// 				getData();
	// 			} else {
	// 				showNotification("Error", response.message, "error");
	// 			}
	// 		})
	// 		.catch((error) => {
	// 			setShowLoader(false);
	// 			showNotification("Error", "Something went wrong", "error");
	// 		});
	// };

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
								<Col xs={10} md={2} xl={1}>
									<button type="button" className="btn-icon btn btn-primary search-button" onClick={onSearchFilter}>
										<i className="feather icon-search"></i>
									</button>
								</Col>
								{(startDate || endDate) && (
									<Col xs={2} md={1} xl={1}>
										<div className="filter-close-btn" role="button" onClick={resetFilters}>
											<i className="feather icon-x"></i>
										</div>
									</Col>
								)}
								<Col md={1} xl={4} style={{display: "flex", justifyContent: "flex-end"}}>
									<Button size="sm" onClick={getData}>
										<AiOutlineReload size={`1.8em`} />
									</Button>
								</Col>
							</Row>

							{windowWidth && (
								<Grid data={gridData} skip={gridState.skip} pageable={true} pageSize={gridState.take} onPageChange={pageChange} filterable={true} filter={gridState.filter} onFilterChange={filterChange}>
									<Column field="id" title="#" filterable={false} width="60px" cell={(props) => <td>{props.dataIndex + 1}</td>} />
									{/* <Column field="sender_name" title="Sender" width={250} /> */}
									<Column
										field="sender_name"
										title="Sender Name"
										cell={(props) => (
											<td>
												<div>{props.dataItem.sender_name}</div>
											</td>
										)}
									/>
									<Column field="message" title="Message" width={250} />
									<Column field="receiver_name" title="Receiver" width={250} />
									<Column
										field="created_at"
										filterable={false}
										title="Message Date"
										cell={(props) => (
											<td>
												<div>{moment(props.dataItem.created_at).format("DD-MMM-YYYY")}</div>
											</td>
										)}
									/>
								</Grid>
							)}

							{/* <div>
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

										<Accordion defaultActiveKey="0">
											{accordionList &&
												accordionList.length > 0 &&
												accordionList.map((row) => (
													<Card key={row.id} style={{marginBottom: 4}}>
														<Accordion.Toggle as={Card.Header} style={{backgroundColor: "#7599b1", color: "#ffffff", padding: "8px 16px"}} eventKey={row.id}>
															<div style={{display: "flex", justifyContent: "space-between"}}>
																{row.user_name}
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
																		<span style={{padding: "0 16px 0 8px"}}>Client:</span>
																		<span> {row.user_name}</span>
																	</ListGroup.Item>
																	<ListGroup.Item>
																		<span style={{padding: "0 16px 0 8px"}}>Entry Date:</span>
																		<span> {moment(row.created_at).format("DD-MMM-YYYY")}</span>
																	</ListGroup.Item>
																</ListGroup>
															</Card.Body>
														</Accordion.Collapse>
													</Card>
												))}
										</Accordion>
									</>
								)}
							</div> */}
						</Card.Body>
					</Card>
				</Col>
			</Row>
		</React.Fragment>
	);
};

export default MessageList;
