import React, { useState, useEffect } from "react";
import { Row, Col, Card, Button, Modal } from "react-bootstrap";
import moment from "moment";
import Select from "react-select";
import { PDFExport } from "@progress/kendo-react-pdf";

import { callApi } from "../../services/apiService";
import { showNotification } from "../../services/toasterService";
import { ApiConstants } from "../../config/apiConstants";
import Spinner from "../../components/Spinner";
import Report from "../../components/Report";

import pdfIcon from "../../assets/images/icons/pdf.png";
import { GiConfirmed } from "react-icons/gi";

const VatReport = (props) => {
	const [showLoader, setShowLoader] = useState(false);
	const [periodsList, setperiodsList] = useState([]);
	const [filteredPeriodsList, setFilteredPeriodsList] = useState([]);
	const [selectedPeriod, setselectedPeriod] = useState(null);
	const [selectedReport, setselectedReport] = useState(null);
	const [isSearchClicked, setisSearchClicked] = useState(false);
	const [reportsData, setreportsData] = useState(null);
	const [clientsList, setclientsList] = useState([]);
	const [selectedClient, setselectedClient] = useState(null);
	const [showPreview, setshowPreview] = useState(false);

	const pdfExportComponent = React.useRef(null);

	useEffect(() => {
		getClients();
	}, []);

	useEffect(() => {
		if (selectedPeriod) onSearchFilter();
	}, [selectedPeriod]);

	const onSearchFilter = () => {
		if (selectedPeriod) {
			setisSearchClicked(true);
			let filteredList = periodsList.filter((i) => i.id === selectedPeriod.id);
			setFilteredPeriodsList(filteredList);
		}
	};
	const closeEntryModal = () => {
		setshowPreview(false);
	};
	const clearFilter = () => {
		setFilteredPeriodsList(periodsList);
		setselectedPeriod(null);
		setisSearchClicked(false);
	};

	const getClients = () => {
		setShowLoader(true);
		callApi("get", ApiConstants.admin.clientshortlistbyadmin, {}, true)
			.then((response) => {
				setShowLoader(false);
				console.log(response.payload);
				if (response && response.status_code === 200) {
					let clients = response.payload.map((i) => {
						return {
							...i,
							value: i.id,
							label: i.name,
						};
					});
					setclientsList(clients);
					callApi("post", ApiConstants.vatreports.vatreportforvalidator, { client_list: clients.map(data => data.id) }, true)
						.then((response) => {
							setShowLoader(false);
							if (response && response.status_code === 200) {
								let periods = response.payload.map((i, index) => {
									return {
										...i,
										doc_id: i.id,
										id: index,
										value: moment(i.start_date).format("DD MMM YYYY") + " - " + moment(i.end_date).format("DD MMM YYYY"),
										label: moment(i.start_date).format("DD MMM YYYY") + " - " + moment(i.end_date).format("DD MMM YYYY"),
									};
								});
								setperiodsList(periods);
								setFilteredPeriodsList(periods);
							} else {
								showNotification("Error", response.message, "error");
							}
						})
						.catch((error) => {
							setShowLoader(false);
							showNotification("Error", "Something went wrong", "error");
						});
				} else {
					showNotification("Error", response.message, "error");
				}
			})
			.catch((error) => {
				setShowLoader(false);
				showNotification("Error", "Something went wrong", "error");
			});
	};

	const getPeriods = (userId) => {
		setperiodsList([]);
		setFilteredPeriodsList([]);
		setShowLoader(true);
		console.log(userId);
		callApi("post", ApiConstants.vatreports.vatreportforvalidator, { user_id: userId }, true)
			.then((response) => {
				setShowLoader(false);
				if (response && response.status_code === 200) {
					let periods = response.payload.map((i, index) => {
						return {
							...i,
							doc_id: i.id,
							id: index,
							value: moment(i.start_date).format("DD MMM YYYY") + " - " + moment(i.end_date).format("DD MMM YYYY"),
							label: moment(i.start_date).format("DD MMM YYYY") + " - " + moment(i.end_date).format("DD MMM YYYY"),
						};
					});
					setperiodsList(periods);
					setFilteredPeriodsList(periods);
				} else {
					showNotification("Error", response.message, "error");
				}
			})
			.catch((error) => {
				setShowLoader(false);
				showNotification("Error", "Something went wrong", "error");
			});
	};

	const onSelectClient = (value) => {
		if (value) {
			setselectedClient(value);
			getPeriods(value.client_id);
		}
	};

	// const getReportName = (item) => {
	// 	return "VAT_" + item.company_name + "_" + moment(item.start_date).format("MMMYYYY");
	// };

	const downloadReport = (report) => {
		setShowLoader(true);
		setselectedReport(report);
		let params = {
			user_id: selectedClient.id,
			start_date: report.start_date,
			end_date: report.end_date,
		};
		callApi("post", ApiConstants.vatreports.vatreportforothers, params, true)
			.then((response) => {
				if (response && response.status_code === 200) {
					setreportsData(response.payload);
					setTimeout(() => {
						if (pdfExportComponent.current) {
							pdfExportComponent.current.save();
						}
						setShowLoader(false);
					}, 500);
				} else {
					setShowLoader(false);
					showNotification("Error", response.message, "error");
				}
			})
			.catch((error) => {
				setShowLoader(false);
				showNotification("Error", "Something went wrong", "error");
			});
	};
	const viewEntry = (report) => {
		setShowLoader(true);
		setselectedReport(report);
		let params = {
			id: report.doc_id,
		};
		console.log(report);
		callApi("post", ApiConstants.vatreports.vatreportforvalidatorbyid, params, true)
			.then((response) => {
				console.log(response.payload);
				if (response && response.status_code === 200) {
					setreportsData(response.payload);
					setshowPreview(true);
					setShowLoader(false);
				} else {
					setShowLoader(false);
					showNotification("Error", response.message, "error");
				}
			})
			.catch((error) => {
				setShowLoader(false);
				showNotification("Error", "Something went wrong", "error");
			});
	};
	const onEntrySubmit = (status) => {
		let params = { id: reportsData.id, status };
		callApi("post", ApiConstants.vatreports.updatevatreport, params, true)
			.then((response) => {
				console.log(response);
				if (response && response.status_code === 201) {
					setshowPreview(true);
					setShowLoader(false);
					closeEntryModal();
					onSelectClient(selectedClient);
				} else {
					setShowLoader(false);
					showNotification("Error", response.message, "error");
				}
			})
			.catch((error) => {
				setShowLoader(false);
				showNotification("Error", "Something went wrong", "error");
			});

		closeEntryModal();
	};
	return (
		<React.Fragment>
			{showLoader && <Spinner />}
			<Row className="vat-reports">
				<Col xl={12}>
					<Card className="rounded">
						<Card.Body className="p-4">
							{/* <Row className="mb-3">
								<Col xs={12} xl={3}>
									<div className="input-group mb-3">
										<Select
											className="w-100 form-control-select"
											classNamePrefix="select"
											options={clientsList}
											value={selectedClient}
											placeholder="Clients"
											onChange={(value) => {
												onSelectClient(value);
											}}
										/>
									</div>
								</Col>
								<Col xs={12} xl={3}>
									<div className="input-group mb-3">
										<Select
											className="w-100 form-control-select"
											classNamePrefix="select"
											options={periodsList}
											value={selectedPeriod}
											placeholder="VAT Periods"
											isSearchable={false}
											onChange={(value) => {
												setselectedPeriod(value);
											}}
										/>
									</div>
								</Col>

								<Col xs={1} xl={1} className="pl-0">
									{isSearchClicked && (
										<span className="clear-search" onClick={clearFilter}>
											<i className="feather icon-x"></i>
										</span>
									)}
								</Col>
							</Row> */}
							<Row className="mt-4">
								{filteredPeriodsList.map((item, key) => (
									<Col xs={12} key={key} className="my-2">
										<Row>
											<Col xs={6}>
												<div className="report-name">{item.company_name}</div>
											</Col>
											<Col xs={2}>
												<div className="report-download" onClick={() => downloadReport(item)}>
													<i className="feather icon-download" />
												</div>
											</Col>
											<Col xs={4}>

												{/* <div className="report-download" onClick={(e) => viewEntry(item)}>
												</div> */}
												<Button variant="primary" className="m-0 p-xs-1 p-2" onClick={(e) => viewEntry(item)}>
													<GiConfirmed /> Approve
												</Button>
											</Col>
										</Row>
									</Col>
								))}
							</Row>
						</Card.Body>
					</Card>
				</Col>
			</Row>
			<Modal size="xl" show={showPreview} backdrop="static" keyboard={true}>
				<Modal.Body className="p-0">
					<button
						type="button"
						className="btn-icon btn close-btn"
						onClick={() => {
							closeEntryModal();
						}}>
						<i className="feather icon-x-circle"></i>
					</button>
					<div className="px-4 py-5">
						<Row>
							<Col className="col-12 my-2">
								<Report data={reportsData} />
							</Col>
							<Col className="col-12 my-2 d-flex justify-content-center">
								<Button variant="primary" onClick={() => onEntrySubmit("Approved", reportsData)}>
									Approve
								</Button>
								<Button variant="danger" onClick={() => onEntrySubmit("Rejected", reportsData)}>
									Reject
								</Button>
							</Col>
						</Row>
					</div>
				</Modal.Body>
			</Modal>
			{reportsData && (
				<div
					style={{
						position: "absolute",
						left: "-10000px",
						top: 0,
					}}>
					<PDFExport ref={pdfExportComponent} paperSize="A4" margin={30} fileName={selectedReport.company_name} author="VatzApp">
						<Report data={reportsData} />
					</PDFExport>
				</div>
			)}
		</React.Fragment>
	);
};

export default VatReport;
