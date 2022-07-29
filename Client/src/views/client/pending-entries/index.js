import React, { useState, useEffect } from "react";
import { Row, Col, Card, Modal, Accordion, Button, ListGroup, InputGroup, FormControl } from "react-bootstrap";
import { Grid, GridColumn as Column } from "@progress/kendo-react-grid";
import { process } from "@progress/kendo-data-query";
import moment from "moment";
import DatePicker from "react-datepicker";
import { FaAngleDown } from "react-icons/fa";
import { AiOutlineReload } from "react-icons/ai";

import { callApi } from "../../../services/apiService";
import { ApiConstants } from "../../../config/apiConstants";
import { showNotification } from "../../../services/toasterService";
import Spinner from "../../../components/Spinner";
import Preview from "../../../components/Preview";
import FileIcon from "../../../components/FileIcon";
import useWindowSize from "../../../hooks/useWindowSize";

const PendingEntries = (props) => {
	const [showLoader, setShowLoader] = useState(false);
	const [entriesList, setEntriesList] = useState([]);
	const [startDate, setStartDate] = useState(null);
	const [endDate, setEndDate] = useState(null);
	const [showPreview, setshowPreview] = useState(false);
	const [selectedEntry, setselectedEntry] = useState(null);
	const [showDeleteConfirm, setDeleteConfirm] = useState(false);

	const [accordionList, setAccordionList] = useState([]);
	const [windowWidth, setWindowWidth] = useState(window.innerWidth);

	const userObj = JSON.parse(localStorage.getItem("user"));
	const [gridState, setgridState] = useState({ skip: 0, take: 10 });
	const [gridData, setgridData] = useState(null);
	const [gridWidth, setgridWidth] = useState(1024);
	const windowSize = useWindowSize();

	const pagerSettings = { buttonCount: 5, info: true, type: "numeric", pageSizes: true, previousNext: true };

	const handleResize = React.useCallback(() => {
		let gridContext = document.querySelector(".k-grid");
		if (gridContext?.offsetWidth > gridWidth) {
			setgridWidth(gridContext.offsetWidth);
		}
	}, [gridWidth]);
	useEffect(() => {
		setWindowWidth(window.innerWidth > 992);
		let resizeObserver = new ResizeObserver(() => {
			handleResize();
		});
		resizeObserver.observe(document.querySelector(".k-grid"));
		getData();
	}, [handleResize]);

	useEffect(() => {
		setgridData(process(entriesList, gridState));
	}, [entriesList, gridState]);

	const setWidth = (minWidth) => {
		if (windowSize.width < 992) return minWidth;
		let dynamicWidth = gridWidth - 480;
		let width = dynamicWidth > minWidth ? dynamicWidth : minWidth;
		return width;
	};

	const pageChange = (event) => setgridState({ ...gridState, skip: event.page.skip, take: event.page.take });

	const onSearchFilter = () => {
		let dateFilters = [];
		if (startDate) {
			dateFilters.push({ field: "created_at", operator: "gte", value: moment(startDate).format("YYYY-MM-DD") });
		}

		if (endDate) {
			dateFilters.push({ field: "created_at", operator: "lte", value: moment(endDate).format("YYYY-MM-DD") });
		}

		let updatedState = { ...gridState, filter: { logic: "and", filters: dateFilters } };
		setgridState(updatedState);
	};

	const resetFilters = () => {
		let updatedState = { ...gridState, filter: null };
		setgridState(updatedState);
		setStartDate(null);
		setEndDate(null);
	};

	const getData = () => {
		setShowLoader(true);
		callApi("get", ApiConstants.entry.clientpendinglist, {}, true)
			.then((response) => {
				setShowLoader(false);
				if (response && response.status_code === 200) {
					setAccordionList(response.payload);
					setEntriesList(response.payload);
					console.log(response.payload);
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
		setshowPreview(true);
	};

	const deleteEntry = (entry) => {
		setselectedEntry(entry);
		setDeleteConfirm(true);
	};

	const deleteData = () => {
		setShowLoader(true);
		callApi("post", ApiConstants.entry.clientdeleteentry, { entry_id: selectedEntry.id }, true)
			.then((response) => {
				setShowLoader(false);
				if (response && response.status_code === 200) {
					showNotification("Success", response.message, "success");
					getData();
				} else {
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
										<DatePicker
											className="form-control mb-2"
											minDate={new Date(userObj?.period?.start_period_date?.date)}
											maxDate={new Date(userObj?.period?.end_period_date?.date)}
											placeholderText="Start Date"
											dateFormat="dd/MM/yyyy"
											selected={startDate}
											onSelect={() => setEndDate(null)}
											onChange={setStartDate}
										/>
										<i className="feather icon-calendar"></i>
									</div>
								</Col>
								<Col xs={12} md={4} xl={3}>
									<div className="date-picker-container">
										<DatePicker className="form-control mb-2" minDate={startDate ? startDate : new Date(userObj?.period?.start_period_date?.date)} maxDate={new Date(userObj?.period?.end_period_date?.date)} placeholderText="End Date" dateFormat="dd/MM/yyyy" selected={endDate} onChange={setEndDate} />
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
								<Col md={1} xl={4} style={{ display: "flex", justifyContent: "flex-end" }}>
									<Button size="sm" onClick={getData}>
										<AiOutlineReload size={`1.8em`} />
									</Button>
								</Col>
							</Row>
							{windowWidth && (
								<Grid data={gridData} skip={gridState.skip} pageSize={gridState.take} pageable={pagerSettings} onPageChange={pageChange}>
									<Column field="id" title="#" width="120px" filterable={false} cell={(props) => <td>{props.dataIndex + 1}</td>} />
									<Column field="created_at" title="Entry Date" cell={(props) => <td>{moment(props.dataItem.created_at).format("DD-MMM-YYYY")}</td>} />
									{/* <Column
										field="file_path"
										title="Document"
										width={setWidth(590)}
										cell={(props) => (
											<td>
												<FileIcon className="mr-2" source={props.dataItem.file_path} style={{width: 25}} />
												{props.dataItem.file_path.split("/")[1]}
											</td>
										)}
									/> */}
									<Column
										field="View"
										title="View"
										filterable={false}
										cell={(props) => (
											<td>
												<button type="button" className="btn-icon btn btn-outline-primary" title="View" onClick={() => viewEntry(props.dataItem)}>
													<i className="feather icon-eye"></i>
												</button>
											</td>
										)}
									/>
									<Column
										field="Actions"
										title="Actions"
										filterable={false}
										cell={(props) => (
											<td>
												<button type="button" className="btn-icon btn btn-outline-danger" title="Delete" onClick={() => deleteEntry(props.dataItem)}>
													<i className="feather icon-trash"></i>
												</button>
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
												placeholder="Invoice Number"
												aria-label="Invoice Number"
												onChange={(event) => {
													setAccordionList(entriesList);
													return event.target.value ? setAccordionList(accordionList?.filter((data) => data.invoice_number?.includes(event.target.value))) : setAccordionList(entriesList);
												}}
											/>
										</InputGroup>
										<InputGroup className="mb-2">
											<FormControl
												className="form-control"
												placeholder="Amount"
												aria-label="Amount"
												onChange={(event) => {
													setAccordionList(entriesList);
													return event.target.value ? setAccordionList(accordionList?.filter((data) => data.amount?.includes(event.target.value))) : setAccordionList(entriesList);
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
																{moment(row.created_at).format("DD-MMM-YYYY")}
																<Button variant="outline-light" size="sm">
																	<FaAngleDown />
																</Button>
															</div>
														</Accordion.Toggle>
														<Accordion.Collapse eventKey={row.id}>
															<Card.Body>
																<div className="action-panel" style={{ dispaly: "flex", justifyContent: "flex-end", marginBottom: 16 }}>
																	<button type="button" className="btn btn-outline-primary" title="View" onClick={() => viewEntry(row)}>
																		View <i className="feather icon-eye"></i>
																	</button>
																	<button type="button" className="btn btn-outline-danger" title="Delete" onClick={() => deleteEntry(row)}>
																		Delete <i className="feather icon-trash"></i>
																	</button>
																</div>
																<ListGroup>
																	<ListGroup.Item>
																		<span style={{ padding: "0 16px 0 8px" }}>Entry Date:</span>
																		<span> {moment(row.created_at).format("DD-MMM-YYYY")}</span>
																	</ListGroup.Item>
																	<ListGroup.Item>
																		<span style={{ padding: "0 16px 0 8px" }}>Document:</span>
																		<div>
																			<FileIcon className="mr-2" source={row.file_path} style={{ width: 25 }} />
																			{row.file_path.split("/")[1]}
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
			<Modal size="lg" show={showPreview} backdrop="static" keyboard={true}>
				<Modal.Body className="p-0">
					<button type="button" className="btn-icon btn close-btn" onClick={() => setshowPreview(false)}>
						<i className="feather icon-x-circle"></i>
					</button>
					<Row>
						<Col sm={12}>
							<div className="px-4 py-5">
								<Preview source={selectedEntry?.file_path} />
							</div>
						</Col>
					</Row>
				</Modal.Body>
			</Modal>
			<Modal size="md" show={showDeleteConfirm} backdrop="static" keyboard={true}>
				<Modal.Header>
					<h5 className="card-title">Confirm Delete</h5>
				</Modal.Header>
				<Modal.Body>
					<div>
						<span>Are you sure that to delete this entry?</span>
					</div>
				</Modal.Body>
				<Modal.Footer>
					<div>
						<button className="btn btn-outline-primary" onClick={() => setDeleteConfirm(false)}>
							No
						</button>
						<button
							className="btn btn-primary"
							onClick={() => {
								setDeleteConfirm(false);
								deleteData();
							}}>
							Yes
						</button>
					</div>
				</Modal.Footer>
			</Modal>
		</React.Fragment>
	);
};

export default PendingEntries;
