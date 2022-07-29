import React, {useState, useEffect} from "react";
import {Row, Col, Modal, Accordion, Card, ListGroup, Button} from "react-bootstrap";
import {Grid, GridColumn as Column} from "@progress/kendo-react-grid";
import moment from "moment";
import {callApi} from "../../../services/apiService";
import {ApiConstants} from "../../../config/apiConstants";
import {showNotification} from "../../../services/toasterService";
import {FaAngleDown} from "react-icons/fa";

import Spinner from "../../../components/Spinner";
import Preview from "../../../components/Preview";

const PendingEntriesWidget = (props) => {
	const [showLoader, setShowLoader] = useState(false);
	const [entriesList, setEntriesList] = useState([]);
	const [showPreview, setshowPreview] = useState(false);
	const [selectedEntry, setselectedEntry] = useState(null);
	const [showDeleteConfirm, setDeleteConfirm] = React.useState(false);
	const [accordionList, setAccordionList] = useState([]);
	const [windowWidth, setWindowWidth] = useState(window.innerWidth);

	const getData = React.useCallback(() => {
		setShowLoader(true);
		callApi("get", ApiConstants.entry.clientpendinglist, {row_count: props.row_count}, true)
			.then((response) => {
				setShowLoader(false);
				if (response && response.status_code === 200) {
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
	}, [props.row_count]);

	useEffect(() => {
		setWindowWidth(window.innerWidth > 992);
		getData();
	}, [getData]);

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
		callApi("post", ApiConstants.entry.clientdeleteentry, {entry_id: selectedEntry.id}, true)
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
						<Grid data={entriesList} style={{height: 270}}>
							<Column
								field="created_at"
								
								title="Entry Date"
								cell={(props) => (
									<td>
										<div>{moment(props.dataItem.created_at).format("DD-MMM-YYYY")}</div>
									</td>
								)}
							/>
							<Column
								field="View"
								title="View"
								filterable={false}
								
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
								
								cell={(props) => (
									<td>
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
									</td>
								)}
							/>
						</Grid>
					</Col>
				</Row>
			)}
			<div>
				{!windowWidth && (
					<>
						<Accordion defaultActiveKey="0">
							{accordionList &&
								accordionList.length > 0 &&
								accordionList.map((row) => (
									<Card key={row.id} style={{marginBottom: 4}}>
										<Accordion.Toggle as={Card.Header} style={{backgroundColor: "#7599b1", color: "#ffffff", padding: "8px 16px"}} eventKey={row.id}>
											<span style={{display: "flex", alignItems: "center"}}>{row.created_at}</span>
											<Button variant="outline-light" size="sm">
												<FaAngleDown />
											</Button>
										</Accordion.Toggle>
										<Accordion.Collapse eventKey={row.id}>
											<Card.Body>
												<div className="action-panel" style={{dispaly: "flex", justifyContent: "flex-end", marginBottom: 16}}>
													<button type="button" className="btn btn-outline-danger mr-1" title="Delete" onClick={() => deleteEntry(row)}>
														Delete <i className="feather icon-trash"></i>
													</button>
													<button type="button" className="btn btn-outline-primary ml-1" title="View" onClick={() => viewEntry(row)}>
														View <i className="feather icon-eye"></i>
													</button>
												</div>
												<ListGroup>
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
			</div>

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

export default PendingEntriesWidget;
