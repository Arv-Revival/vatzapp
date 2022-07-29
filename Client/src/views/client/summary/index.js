import React, { useState, useEffect } from "react";
import { Row, Col, Card, Accordion, Button, ListGroup } from "react-bootstrap";
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
import useWindowSize from "../../../hooks/useWindowSize";

const EntriesSummary = (props) => {
	const [showLoader, setShowLoader] = useState(false);
	const [entriesList, setEntriesList] = useState([]);
	const [startDate, setStartDate] = useState(null);
	const [endDate, setEndDate] = useState(null);
	const userObj = JSON.parse(localStorage.getItem("user"));
	const [gridState, setgridState] = useState({ skip: 0, take: 10 });
	const [gridData, setgridData] = useState(null);
	const [accordionList, setAccordionList] = useState([]);
	const [windowWidth, setWindowWidth] = useState(window.innerWidth);
	const [gridWidth, setgridWidth] = useState(1024);
	const windowSize = useWindowSize();

	const pagerSettings = { buttonCount: 5, info: true, type: "numeric", pageSizes: true, previousNext: true };

	useEffect(() => {
		setgridData(process(entriesList, gridState));
	}, [entriesList, gridState]);

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

	const setWidth = (minWidth) => {
		if (windowSize.width < 992) return minWidth;
		let dynamicWidth = gridWidth - 600;
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
		let updatedState = { ...gridState, filter: null };
		setgridState(updatedState);
		setStartDate(null);
		setEndDate(null);
	};

	const getData = () => {
		setShowLoader(true);
		callApi("get", ApiConstants.summary.clientdaywisesummary, {}, true)
			.then((response) => {
				setShowLoader(false);
				if (response && response.status_code === 200) {
					let data = response.payload.map((data, index) => ({ ...data, id: index + 1 }));
					setAccordionList(data);
					setEntriesList(data);
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
											minDate={new Date(userObj?.period?.start_period_date?.date)}
											maxDate={new Date(userObj?.period?.end_period_date?.date)}
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
								<Col xs={12} md={1} xl={1}>
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
								<Col md={1} xl={4} style={{ display: "flex", justifyContent: "flex-end" }}>
									<Button size="sm" onClick={getData}>
										<AiOutlineReload size={`1.8em`} />
									</Button>
								</Col>
							</Row>
							{windowWidth && (
								<Grid data={gridData} skip={gridState.skip} pageSize={gridState.take} pageable={pagerSettings} onPageChange={pageChange} filterable={true} filter={gridState.filter} onFilterChange={filterChange}>
									<Column field="id" title="#" width="60px" filterable={false} cell={(props) => <td>{props.dataIndex + 1}</td>} />
									<Column field="invoice_date" filterable={false} width={setWidth(180)} title="Invoice Date" cell={(props) => <td>{moment(props.dataItem.invoice_date).format("DD-MMM-YYYY")}</td>} />
									<Column field="sale_amount" width="180" title="Sales" />
									<Column field="purchase_amount" width="180" title="Purchase" />
									<Column field="expenditure_amount" width="180" title="Expenditure" />
								</Grid>
							)}
							<div>
								{!windowWidth && (
									<>
										<Accordion defaultActiveKey="0">
											{accordionList &&
												accordionList.length > 0 &&
												accordionList.map((row) => (
													<Card key={row.id} style={{ marginBottom: 4 }}>
														<Accordion.Toggle as={Card.Header} style={{ backgroundColor: "#7599b1", color: "#ffffff", padding: "8px 16px" }} eventKey={row.id}>
															<div style={{ display: "flex", justifyContent: "space-between" }}>
																{row.invoice_date}
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
																		<span> {moment(row.invoice_date).format("DD-MMM-YYYY")}</span>
																	</ListGroup.Item>
																	<ListGroup.Item>
																		<span style={{ padding: "0 16px 0 8px" }}>Invoice Number:</span>
																		<span> {row.invoice_number}</span>
																	</ListGroup.Item>
																	<ListGroup.Item>
																		<span style={{ padding: "0 16px 0 8px" }}>Sales:</span>
																		<span> {row.sale_amount}</span>
																	</ListGroup.Item>
																	<ListGroup.Item>
																		<span style={{ padding: "0 16px 0 8px" }}>Purchase:</span>
																		<span> {row.purchase_amount}</span>
																	</ListGroup.Item>
																	<ListGroup.Item>
																		<span style={{ padding: "0 16px 0 8px" }}>Expenditure:</span>
																		<span> {row.expenditure_amount}</span>
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
		</React.Fragment>
	);
};

export default EntriesSummary;
