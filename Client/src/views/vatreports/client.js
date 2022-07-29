import React, {useState, useEffect} from "react";
import {Row, Col, Card} from "react-bootstrap";
import moment from "moment";
import Select from "react-select";
import {PDFExport} from "@progress/kendo-react-pdf";

import {callApi} from "../../services/apiService";
import {showNotification} from "../../services/toasterService";
import {ApiConstants} from "../../config/apiConstants";
import Spinner from "../../components/Spinner";
import Report from "../../components/Report";

import pdfIcon from "../../assets/images/icons/pdf.png";

const VatReport = (props) => {
	const [showLoader, setShowLoader] = useState(false);
	const [periodsList, setperiodsList] = useState([]);
	const [filteredPeriodsList, setFilteredPeriodsList] = useState([]);
	const [selectedPeriod, setselectedPeriod] = useState(null);
	const [selectedReport, setselectedReport] = useState(null);
	const [isSearchClicked, setisSearchClicked] = useState(false);
	const [reportsData, setreportsData] = useState(null);
	const [clientId,setClientId] = useState("")
	const pdfExportComponent = React.useRef(null);

	useEffect(() => {
		// getPeriods();
		callApi("get", ApiConstants.client.getclient, {}, true)
			.then((response) => {
				if (response && response.status_code === 200) {
					console.log(response.payload);
					response.payload.id && setClientId(response.payload.id);
					response.payload.id && getPeriods(response.payload.id);
				} else {
					showNotification("Error", response.message, "error");
				}
			})
			.catch((error) => {
				setShowLoader(false);
				showNotification("Error", "Something went wrong", "error");
			});
	}, []);

	const onSearchFilter = () => {
		if (selectedPeriod) {
			setisSearchClicked(true);
			let filteredList = periodsList.filter((i) => i.id === selectedPeriod.id);
			setFilteredPeriodsList(filteredList);
		}
	};

	const clearFilter = () => {
		setFilteredPeriodsList(periodsList);
		setselectedPeriod(null);
		setisSearchClicked(false);
	};

	const getPeriods = (client_id) => {
		setShowLoader(true);
		callApi("post", ApiConstants.vatreports.vatreportperiodsforclient, {client_id: client_id}, true)
			.then((response) => {
				setShowLoader(false);
				if (response && response.status_code === 200) {
					let periods = response.payload.map((i, index) => {
						return {
							...i,
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

	// const getReportName = (item) => {
	// 	return "VAT_" + item.company_name + "_" + moment(item.start_date).format("MMMYYYY");
	// };

	const downloadReport = (report) => {
		setShowLoader(true);
		setselectedReport(report);
		let params = {
			start_date: report.start_date,
			end_date: report.end_date,
		};
		callApi("post", ApiConstants.vatreports.vatreportforclient, params, true)
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

	return (
		<React.Fragment>
			{showLoader && <Spinner />}
			<Row className="vat-reports">
				<Col xl={12}>
					<Card className="rounded">
						<Card.Body className="p-4">
							<Row className="mb-3">
								<Col xs={10} xl={3}>
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

								<Col xs={1} xl={1}>
									<button type="button" className="btn-icon btn btn-primary search-button" onClick={onSearchFilter}>
										<i className="feather icon-search"></i>
									</button>
								</Col>
								<Col xs={1} xl={1}>
									{isSearchClicked && (
										<span className="clear-search" onClick={clearFilter}>
											<i className="feather icon-x"></i>
										</span>
									)}
								</Col>
							</Row>
							<Row className="mt-4">
								{filteredPeriodsList.map((item, key) => (
									<Col xs={12} lg={3} key={key}>
										<Card className="rounded">
											<Card.Body className="p-4">
												<div className="report-tile">
													<img src={pdfIcon} alt="PDF" width="50" />
													<div className="report-name mt-3">{item.name}</div>
												</div>
												<div className="report-download" onClick={() => downloadReport(item)}>
													<i className="feather icon-download" />
												</div>
											</Card.Body>
										</Card>
									</Col>
								))}
							</Row>
						</Card.Body>
					</Card>
				</Col>
			</Row>
			{reportsData && (
				<div
					style={{
						position: "absolute",
						left: "-10000px",
						top: 0,
					}}>
					<PDFExport ref={pdfExportComponent} paperSize="A4" margin={30} fileName={selectedReport.name} author="VatzApp">
						<Report data={reportsData} />
					</PDFExport>
				</div>
			)}
		</React.Fragment>
	);
};

export default VatReport;
