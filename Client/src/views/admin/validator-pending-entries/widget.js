import React, {useState, useEffect} from "react";
import {Accordion, Card, ListGroup, Row, Col, Modal} from "react-bootstrap";
import {Grid, GridColumn as Column} from "@progress/kendo-react-grid";
import {process} from "@progress/kendo-data-query";
import moment from "moment";
import DatePicker from "react-datepicker";
import Select from "react-select";

import {callApi} from "../../../services/apiService";
import {ApiConstants} from "../../../config/apiConstants";
import {showNotification} from "../../../services/toasterService";
import Spinner from "../../../components/Spinner";
import Preview from "../../../components/Preview";
import {entryTypeList} from "../../../enums/entryTypeList";
import {entryTypes} from "../../../enums/entryTypes";
import FileIcon from "../../../components/FileIcon";
import SalesForm from "./forms/salesForm";
import ExpenditureForm from "./forms/expenditureForm";
import PurchaseForm from "./forms/purchaseForm";

const PendingEntriesWidget = (props) => {
	const [showLoader, setShowLoader] = useState(false);
	const [entriesList, setEntriesList] = useState([]);
	// const [startDate, setStartDate] = useState(null);
	// const [endDate, setEndDate] = useState(null);
	const [showPreview, setshowPreview] = useState(false);
	const [selectedEntry, setselectedEntry] = useState(null);
	const [selectedEntryType, setselectedEntryType] = useState("");
	const [showDeleteConfirm, setDeleteConfirm] = React.useState(false);
	const [windowWidth, setWindowWidth] = useState(window.innerWidth);

	const [gridState, setgridState] = useState({
		skip: 0,
		take: 10,
	});
	const [gridData, setgridData] = useState(null);

	// const pagerSettings = {
	//   buttonCount: 5,
	//   info: true,
	//   type: "numeric",
	//   pageSizes: true,
	//   previousNext: true,
	// };

	useEffect(() => {
		getData();
	}, []);

	useEffect(() => {
		setWindowWidth(window.innerWidth > 992);
		loadGridData();
	}, [entriesList, gridState]);

	const loadGridData = () => {
		let updatedData = process(entriesList, gridState);
		setgridData(updatedData);
	};

	// const pageChange = (event) => {
	//   let updatedState = {
	//     ...gridState,
	//     skip: event.page.skip,
	//     take: event.page.take,
	//   };
	//   setgridState({ ...updatedState });
	// };

	const getData = () => {
		setShowLoader(true);
		callApi("get", ApiConstants.admin.adminvalidatorpendinglist, {row_count: props.row_count}, true)
			.then((response) => {
				setShowLoader(false);
				if (response && response.status_code === 200) {
					// console.log(response.payload);
					setEntriesList(response.payload);
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
		setselectedEntryType(entry.entry_type);
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

	const deleteEntry = (entry) => {
		setselectedEntry(entry);
		setDeleteConfirm(true);
	};

	const deleteData = () => {
		setShowLoader(true);
		callApi("post", ApiConstants.entry.validatordeleteentry, {entry_id: selectedEntry.id}, true)
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
			{windowWidth && (
				<Row>
					<Col xl={12}>
						<Grid data={gridData} style={{height: 270}}>
							<Column field="id" title="#" width="40px" cell={(props) => <td>{props.dataIndex + 1}</td>} />
							<Column field="name" title="Client Name" width="150px" />
							<Column field="validator_name" title="Validator Name" width="150px" />
							<Column field="checker_name" title="Checker Name" width="150px" />
							{/* <Column
              field="created_at"
              width="130"
              title="Date"
              cell={(props) => (
                <td>
                  <div>
                    {moment(props.dataItem.created_at).format("DD-MMM-YYYY")}
                  </div>
                </td>
              )}
            /> */}
							<Column
								field="invoice_date"
								filterable={false}
								width="130"
								title="Invoice Date"
								cell={(props) => (
									<td>
										<div>{moment(props.dataItem.invoice_date).format("DD-MMM-YYYY")}</div>
									</td>
								)}
							/>
							{/* <Column
                field="file_path"
                title="Document"
                width="95"
                cell={(props) => (
                  <td>
                    <div className="text-center">
                      <FileIcon className="mr-2" source={props.dataItem.file_path} style={{ width: 25 }} />
                    </div>
                  </td>
                )}
              /> */}
							<Column
								field="View"
								title="View"
								width="80"
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
							<Column
								field="Actions"
								title="Actions"
								filterable={false}
								width="80"
								cell={(props) => (
									<td>
										{props.dataItem.requested_for_delete > 0 && (
											<div className="action-panel">
												<button
													type="button"
													className="btn-icon btn btn-outline-danger"
													title="Delete"
													onClick={() => {
														deleteEntry(props.dataItem);
													}}>
													<i className="feather icon-trash"></i>
												</button>
											</div>
										)}
									</td>
								)}
							/>
						</Grid>
					</Col>
				</Row>
			)}

			<div>
				{!windowWidth && (
					<Accordion defaultActiveKey="0">
						{entriesList &&
							entriesList.length > 0 &&
							entriesList.map((row) => (
								<Card key={row.id}>
									<Accordion.Toggle style={{backgroundColor: "#7599b1"}} as={Card.Header} eventKey={row.id}>
										{row.name}
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
													<span style={{padding: "0 16px 0 8px"}}>Validator:</span>
													<span> {row.validator_name}</span>
												</ListGroup.Item>
												<ListGroup.Item>
													<span style={{padding: "0 16px 0 8px"}}>Checker:</span>
													<span> {row.checker_name}</span>
												</ListGroup.Item>
												<ListGroup.Item>
													<span style={{padding: "0 16px 0 8px"}}>Entry Date:</span>
													<span> {moment(row.invoice_date).format("DD-MMM-YYYY")}</span>
												</ListGroup.Item>
											</ListGroup>
										</Card.Body>
									</Accordion.Collapse>
								</Card>
							))}
					</Accordion>
				)}
			</div>

			<Modal size={selectedEntryType === entryTypes.PURCHASE ? "xl" : "lg"} show={showPreview} backdrop="static" keyboard={true}>
				<Modal.Body className="p-0">
					<button type="button" className="btn-icon btn close-btn" onClick={closeEntryModal}>
						<i className="feather icon-x-circle"></i>
					</button>
					<div className="px-4 py-5">
						<Row>
							<Col className={selectedEntryType === entryTypes.PURCHASE ? "col-lg-4" : "col-lg-6"}>
								<Preview source={selectedEntry?.file_path} containerStyles={{backgroundColor: "#f5f5f5", padding: 10}} zoom={true} />
							</Col>
							<Col className={selectedEntryType === entryTypes.PURCHASE ? "col-lg-8" : "col-lg-6"}>
								<Row>
									<Col className={selectedEntryType === entryTypes.PURCHASE ? "col-lg-6" : "col-lg-12"}>
										<div className="input-group mb-3">
											<Select
												className="w-100 form-control-select"
												classNamePrefix="select"
												isDisabled
												value={entryTypeList.find((i) => i.value === selectedEntry?.entry_type)}
												options={entryTypeList}
												placeholder="Entry type"
												isSearchable={false}
												onChange={(data) => setselectedEntryType(data.value)}
											/>
										</div>
									</Col>
								</Row>
								<Row>
									<Col lg={12}>
										<div className="input-group">
											{selectedEntryType === entryTypes.SALE && <SalesForm entry={selectedEntry} onSuccess={onEntrySubmit} onShowLoader={setShowLoader} />}
											{selectedEntryType === entryTypes.EXPENDITURE && <ExpenditureForm entry={selectedEntry} onSuccess={onEntrySubmit} onShowLoader={setShowLoader} />}
											{selectedEntryType === entryTypes.PURCHASE && <PurchaseForm entry={selectedEntry} onSuccess={onEntrySubmit} onShowLoader={setShowLoader} />}
										</div>
									</Col>
								</Row>
							</Col>
						</Row>
					</div>
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

export default PendingEntriesWidget;
