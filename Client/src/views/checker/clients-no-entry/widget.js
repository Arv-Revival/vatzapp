import React, {useState} from "react";
import {Accordion, Card, ListGroup, Row, Col, Modal} from "react-bootstrap";
import {Grid, GridColumn as Column} from "@progress/kendo-react-grid";
import moment from "moment";
import Select from "react-select";

import {callApi} from "../../../services/apiService";
import {ApiConstants} from "../../../config/apiConstants";
import Spinner from "../../../components/Spinner";
import Preview from "../../../components/Preview";
import {entryTypeList} from "../../../enums/entryTypeList";
import {entryTypes} from "../../../enums/entryTypes";
import {showNotification} from "../../../services/toasterService";
import SalesForm from "./forms/salesForm";
import ExpenditureForm from "./forms/expenditureForm";
import PurchaseForm from "./forms/purchaseForm";

const NoEntriesWidget = (props) => {
	const [showLoader, setShowLoader] = useState(false);
	const [entriesList, setEntriesList] = useState([]);
	const [showPreview, setshowPreview] = useState(false);
	const [selectedEntry, setselectedEntry] = useState(null);
	const [selectedEntryType, setselectedEntryType] = useState("");

	const [windowWidth, setWindowWidth] = useState(window.innerWidth > 992);

	const getData = React.useCallback(() => {
		setShowLoader(true);
		callApi("get", ApiConstants.entry.checkernoentrylist, {}, true)
			.then((response) => {
				setShowLoader(false);
				if (response && response.status_code === 200) {
					// let temp = response.payload;
					// console.log(response.payload);
          let unique = response.payload.filter((value, index, self) => index === self.findIndex((t) => t.id == value.id && t.name == value.name));
					setEntriesList(unique);
				} else {
					showNotification("Error", response.message, "error");
				}
			})
			.catch((error) => {
				setShowLoader(false);
				showNotification("Error", "Something went wrong", "error");
			});
	}, [props.row_count]);

	React.useEffect(() => {
		getData();
		setWindowWidth(window.innerWidth > 992);
	}, [getData]);

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

	return (
		<React.Fragment>
			{showLoader && <Spinner />}
			{windowWidth && (
				<Row>
					<Col xl={12}>
						<Grid data={entriesList} style={{height: 270}}>
							<Column field="id" title="#" width="40px" cell={(props) => <td>{props.dataIndex + 1}</td>} />
							<Column field="name" title="Client Name"  />
							<Column field="region" title="Emirate"  />
							<Column field="trn_number" title="TRN Number"  />
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
										Client: {row.name}
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
													<span style={{padding: "0 16px 0 8px"}}>Invoice Date:</span>
													<span>{row.invoice_date}</span>
												</ListGroup.Item>
												<ListGroup.Item>
													<span style={{padding: "0 16px 0 8px"}}>Invoice Number:</span>
													<span>{row.invoice_number}</span>
												</ListGroup.Item>
												<ListGroup.Item>
													<span style={{padding: "0 16px 0 8px"}}>Amount:</span>
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
		</React.Fragment>
	);
};

export default NoEntriesWidget;
