import React, { useState, useEffect } from "react";
import { Row, Col, Card, Accordion, ListGroup, Button } from "react-bootstrap";
import { Grid, GridColumn as Column } from "@progress/kendo-react-grid";
import { process } from "@progress/kendo-data-query";
import moment from "moment";
import DatePicker from "react-datepicker";
import { FaAngleDown } from "react-icons/fa";

import { callApi } from "../../../services/apiService";
import { showNotification } from "../../../services/toasterService";
import { ApiConstants } from "../../../config/apiConstants";
import Spinner from "../../../components/Spinner";
import useWindowSize from "../../../hooks/useWindowSize";

const SalesReport = (props) => {
	const [showLoader, setShowLoader] = useState(false);
	const [reportList, setreportList] = useState([]);
	const [startDate, setStartDate] = useState(null);
	const [endDate, setEndDate] = useState(null);
	const [gridState, setgridState] = useState({ skip: 0, take: 10 });
	const [reportGridData, setreportGridData] = useState(null);
	const userObj = JSON.parse(localStorage.getItem("user"));
	const [gridWidth, setgridWidth] = useState(1024);
	const windowSize = useWindowSize();
	const [accordionList, setAccordionList] = useState([]);
	const [windowWidth, setWindowWidth] = useState(window.innerWidth);
	const pagerSettings = { buttonCount: 5, info: true, type: "numeric", pageSizes: true, previousNext: true };

	useEffect(() => setWindowWidth(window.innerWidth > 992), []);
	const handleResize = React.useCallback(() => {
		let gridContext = document.querySelector(".k-grid");
		if (gridContext?.offsetWidth > gridWidth) {
			setgridWidth(gridContext.offsetWidth);
		}
	}, [gridWidth]);

	useEffect(() => {
		let resizeObserver = new ResizeObserver(() => {
			handleResize();
		});
		resizeObserver.observe(document.querySelector(".k-grid"));
		getReports();
	}, [handleResize]);

	useEffect(() => {
		setreportGridData(process(reportList, gridState));
	}, [reportList, gridState]);

	const setWidth = (minWidth) => {
		if (windowSize.width < 992) return minWidth;
		let dynamicWidth = gridWidth - 860;
		let width = dynamicWidth > minWidth ? dynamicWidth : minWidth;
		return width;
	};

	const pageChange = (event) => setgridState({ ...gridState, skip: event.page.skip, take: event.page.take });
	const filterChange = (event) => setgridState({ ...gridState, filter: event.filter });

	const onSearchFilter = () => {
		let dateFilters = [];
		if (startDate) {
			dateFilters.push({ field: "invoice_date", operator: "gte", value: moment(startDate).format("YYYY-MM-DD") });
		}
		if (endDate) {
			dateFilters.push({ field: "invoice_date", operator: "lte", value: moment(endDate).format("YYYY-MM-DD") });
		}
		let updatedState = { ...gridState, filter: { logic: "and", filters: dateFilters } };
		setgridState(updatedState);
	};

	const resetFilters = () => {
		setgridState({ ...gridState, filter: null });
		setStartDate(null);
		setEndDate(null);
	};

	const getReports = () => {
		setShowLoader(true);
		callApi("get", ApiConstants.sales.clientsalesreport, {}, true)
			.then((response) => {
				setShowLoader(false);
				if (response && response.status_code === 200) {
					setreportList(response.payload);
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
											placeholderText="Start Date"
											// minDate={new Date(userObj?.period?.start_period_date?.date)}
											// maxDate={new Date(userObj?.period?.end_period_date?.date)}
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
										<DatePicker
											className="form-control mb-2"
										//  minDate={startDate ? startDate : new Date(userObj?.period?.start_period_date?.date)}
										//  maxDate={new Date(userObj?.period?.end_period_date?.date)} placeholderText="End Date" dateFormat="dd/MM/yyyy" selected={endDate} onChange={setEndDate}
										/>
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
										<div className="text-muted filter-close-btn" role="button" onClick={resetFilters}>
											<i className="feather icon-x"></i>
										</div>
									)}
								</Col>
							</Row>
							{windowWidth && (
								<Grid data={reportGridData} skip={gridState.skip} pageSize={gridState.take} pageable={pagerSettings} onPageChange={pageChange} filterable={true} filter={gridState.filter} onFilterChange={filterChange}>
									<Column field="id" title="#" width="60px" filterable={false} cell={(props) => <td>{props.dataIndex + 1}</td>} />
									<Column field="invoice_date" width={setWidth(200)} title="Invoice Date" filterable={false} cell={(props) => <td>{moment(props.dataItem.invoice_date).format("DD-MMM-YYYY")}</td>} />
									<Column field="invoice_number" title="Invoice Number" width="200" />
									<Column field="amount_exclude_vat" width="200" title="Amount Excl VAT" filterable={false} />
									<Column field="vat_amount" width="200" title="VAT" filterable={false} />
									<Column field="amount" width="200" title="Total" />
								</Grid>
							)}

							<div>
								{!windowWidth && (
									<Accordion defaultActiveKey="0">
										{accordionList &&
											accordionList.length > 0 &&
											accordionList.map((row) => (
												<Card key={row.id} style={{ marginBottom: 4 }}>
													<Accordion.Toggle as={Card.Header} style={{ backgroundColor: "#7599b1" }} eventKey={row.id}>
														<div style={{ display: "flex", justifyContent: "space-between" }}>
															<span style={{ display: "flex", alignItems: "center", color: "#ffffff", fontSize: 18 }}>{row.invoice_date}</span>
															<Button variant="outline-light" size="sm">
																<FaAngleDown />
															</Button>
														</div>
													</Accordion.Toggle>
													<Accordion.Collapse eventKey={row.id}>
														<Card.Body>
															<ListGroup>
																<ListGroup.Item>
																	<span style={{ padding: "0 16px 0 8px" }}>Invoice Date:</span>
																	<span>{moment(row.invoice_date).format("DD-MMM-YYYY")}</span>
																</ListGroup.Item>
																<ListGroup.Item>
																	<span style={{ padding: "0 16px 0 8px" }}>Invoice Number:</span>
																	<span>{row.invoice_number}</span>
																</ListGroup.Item>
																<ListGroup.Item>
																	<span style={{ padding: "0 16px 0 8px" }}>Amount Excl VAT:</span>
																	<span>{row.amount_exclude_vat}</span>
																</ListGroup.Item>
																<ListGroup.Item>
																	<span style={{ padding: "0 16px 0 8px" }}>VAT:</span>
																	<span>{row.vat_amount}</span>
																</ListGroup.Item>
																<ListGroup.Item>
																	<span style={{ padding: "0 16px 0 8px" }}>Total:</span>
																	<span>{row.amount}</span>
																</ListGroup.Item>
															</ListGroup>
														</Card.Body>
													</Accordion.Collapse>
												</Card>
											))}
									</Accordion>
								)}
							</div>
						</Card.Body>
					</Card>
				</Col>
			</Row>
		</React.Fragment>
	);
};

export default SalesReport;
