import React, {useState, useEffect} from "react";
import {Row, Col, Card} from "react-bootstrap";
import {Link} from "react-router-dom";

import {callApi} from "../../../services/apiService";
import {ApiConstants} from "../../../config/apiConstants";
import {showNotification} from "../../../services/toasterService";
import Spinner from "../../../components/Spinner";

import CheckerPendingEntriesWidget from "../../admin/checker-pending-entries/widget";
import ValidatorPendingEntriesWidget from "../../admin/validator-pending-entries/widget";
import ValidatorCheckedEntriesWidget from "../../admin/validator-checked-entries/widget";
import BarChart from "./charts/BarChart";
import ClusteredChart from "./charts/ClusteredChart";
import PortalSubscriptionExpiry from "../../admin/other-widgets/portal-subscription";
import TradeLicenseExpiry from "../../admin/other-widgets/trade-license";
import VatSubmissionDueDate from "../../admin/other-widgets/vat-submission-due-date";

const Dashboard = () => {
	const [showLoader, setShowLoader] = useState(false);
	const [summary, setsummary] = useState(null);
	const [weeklyGraphData, setWeeklyGraphData] = useState(null);
	const [vatGraphData, setVatGraphData] = useState(null);

	useEffect(() => {
		getsummary();
		getWeeklyGraphData();
		getVatPayableGraphData();
	}, []);

	const getsummary = () => {
		setShowLoader(true);
		callApi("get", ApiConstants.admin.dashboardsummary, null, true)
			.then((response) => {
				setShowLoader(false);
				if (response && response.status_code === 200) {
					setsummary(response.payload);
				} else {
					showNotification("Error", response.message, "error");
				}
			})
			.catch((error) => {
				setShowLoader(false);
				showNotification("Error", "Something went wrong", "error");
			});
	};

	const getWeeklyGraphData = () => {
		setShowLoader(true);
		callApi("get", ApiConstants.admin.adminlastweeksgraph, null, true)
			.then((response) => {
				setShowLoader(false);
				if (response && response.status_code === 200) {
					setWeeklyGraphData(response.payload);
				} else {
					showNotification("Error", response.message, "error");
				}
			})
			.catch((error) => {
				setShowLoader(false);
				showNotification("Error", "Something went wrong", "error");
			});
	};

	const getVatPayableGraphData = () => {
		setShowLoader(true);
		callApi("get", ApiConstants.admin.adminvatpayablegraph, null, true)
			.then((response) => {
				// console.trace(response);
				setShowLoader(false);
				if (response && response.status_code === 200) {
					setVatGraphData(response.payload);
				} else {
					showNotification("Error", response.message, "error");
				}
			})
			.catch((error) => {
				setShowLoader(false);
				console.trace(error);
				showNotification("Error", "Something went wrong", "error");
			});
	};

	return (
		<React.Fragment>
			{showLoader && <Spinner />}
			<Row>
				<Col md={6} xl={4}>
					<Card className="rounded" style={{background: "#2A6180"}}>
						<Card.Body className="p-3 text-white">
							<div className="row d-flex align-items-center">
								<div className="col-12">
									<div className="d-flex align-items-end">
										<h3 className="f-w-300 d-flex align-items-center m-b-0 text-white">{summary?.checker_count ? summary?.checker_count : 0}</h3>
									</div>
								</div>
							</div>
							<h6 className="mt-3 text-tile-caption">Checkers</h6>
							<div className="tile-icon">
								<i className="feather icon-file-text" />
							</div>
						</Card.Body>
					</Card>
				</Col>
				<Col md={6} xl={4}>
					<Card className="rounded" style={{background: "#43D5C0"}}>
						<Card.Body className="p-3 text-white">
							<div className="row d-flex align-items-center">
								<div className="col-12">
									<div className="d-flex align-items-end">
										<h3 className="f-w-300 d-flex align-items-center m-b-0 text-white">{summary?.validator_count ? summary?.validator_count : 0}</h3>
									</div>
								</div>
							</div>
							<h6 className="mt-3 text-tile-caption">Validators</h6>
							<div className="tile-icon">
								<i className="feather icon-file-plus" />
							</div>
						</Card.Body>
					</Card>
				</Col>
				<Col md={6} xl={4}>
					<Card className="rounded" style={{background: "#1F6F52"}}>
						<Card.Body className="p-3 text-white">
							<div className="row d-flex align-items-center">
								<div className="col-12">
									<div className="d-flex align-items-end">
										<h3 className="f-w-300 d-flex align-items-center m-b-0 text-white">{summary?.total_employees ? summary?.total_employees : 0}</h3>
									</div>
								</div>
							</div>
							<h6 className="mt-3 text-tile-caption">Total Employees</h6>
							<div className="tile-icon">
								<i className="feather icon-bar-chart-2" />
							</div>
						</Card.Body>
					</Card>
				</Col>
				<Col md={6} xl={4}>
					<Card className="rounded" style={{background: "#87BBE7"}}>
						<Card.Body className="p-3 text-white">
							<div className="row d-flex align-items-center">
								<div className="col-12">
									<div className="d-flex align-items-end">
										<h3 className="f-w-300 d-flex align-items-center m-b-0 text-white">{summary?.subscriber_count ? summary?.subscriber_count : 0}</h3>
									</div>
								</div>
							</div>
							<h6 className="mt-3 text-tile-caption">Subscribed</h6>
							<div className="tile-icon">
								<i className="feather icon-shopping-cart" />
							</div>
						</Card.Body>
					</Card>
				</Col>
				<Col md={6} xl={4}>
					<Card className="rounded" style={{background: "#4D4F63"}}>
						<Card.Body className="p-3 text-white">
							<div className="row d-flex align-items-center">
								<div className="col-12">
									<div className="d-flex align-items-end">
										<h3 className="f-w-300 d-flex align-items-center m-b-0 text-white">{summary?.unsbscriber_count ? summary?.unsbscriber_count : 0}</h3>
									</div>
								</div>
							</div>
							<h6 className="mt-3 text-tile-caption">Unsubscribed</h6>
							<div className="tile-icon">
								<i className="feather icon-file-minus" />
							</div>
						</Card.Body>
					</Card>
				</Col>
				<Col md={6} xl={4}>
					<Card className="rounded" style={{background: "#2A6180"}}>
						<Card.Body className="p-3 text-white">
							<div className="row d-flex align-items-center">
								<div className="col-12">
									<div className="d-flex align-items-end">
										<h3 className="f-w-300 d-flex align-items-center m-b-0 text-white">{summary?.total_customers ? summary?.total_customers : 0}</h3>
									</div>
								</div>
							</div>
							<h6 className="mt-3 text-tile-caption">Total Customers</h6>
							<div className="tile-icon">
								<i className="feather icon-file-text" />
							</div>
						</Card.Body>
					</Card>
				</Col>
			</Row>
			<Row>
				<Col md={12} xl={6} className="dashboard-grid">
					<Card>
						<Card.Header>
							<h5 className="text-white">Checker - Pending Entries</h5>
							<Link to="/admin/checker-entries/pending-entries" className="view-all">
								<i className="feather icon-chevrons-right"></i>
							</Link>
						</Card.Header>
						<Card.Body className="p-2">
							<CheckerPendingEntriesWidget row_count={5} />
							<div className="text-right mt-3">
								<Link to="/admin/checker-entries/pending-entries">
									<button className="btn btn-primary btn-sm m-0">View More</button>
								</Link>
							</div>
						</Card.Body>
					</Card>
				</Col>
				<Col md={12} xl={6} className="dashboard-grid">
					<Card>
						<Card.Header>
							<h5 className="text-white">Validator - Pending Entries</h5>
							<Link to="/admin/validator-entries/pending-entries" className="view-all">
								<i className="feather icon-chevrons-right"></i>
							</Link>
						</Card.Header>
						<Card.Body className="p-2">
							<ValidatorPendingEntriesWidget row_count={5} />
							<div className="text-right mt-3">
								<Link to="/admin/validator-entries/pending-entries">
									<button className="btn btn-primary btn-sm m-0">View More</button>
								</Link>
							</div>
						</Card.Body>
					</Card>
				</Col>
				<Col md={12} xl={12} className="dashboard-grid">
					<Card>
						<Card.Header>
							<h5 className="text-white">Validator - Checked Entries</h5>
							<Link to="/admin/validator-entries/checked-entries" className="view-all">
								<i className="feather icon-chevrons-right"></i>
							</Link>
						</Card.Header>
						<Card.Body className="p-2">
							<ValidatorCheckedEntriesWidget row_count={5} />
							<div className="text-right mt-3">
								<Link to="/admin/validator-entries/checked-entries">
									<button className="btn btn-primary btn-sm m-0">View More</button>
								</Link>
							</div>
						</Card.Body>
					</Card>
				</Col>

				<Col md={12} xl={6} className="dashboard-grid">
					<Card>
						<Card.Header>
							<h5 className="text-white">Portal Subscription Expiry</h5>
							{/* <Link to="/admin/validator-entries/checked-entries" className="view-all">
								<i className="feather icon-chevrons-right"></i>
							</Link> */}
						</Card.Header>
						<Card.Body className="p-2">
							<PortalSubscriptionExpiry row_count={5} />
						</Card.Body>
					</Card>
				</Col>
				<Col md={12} xl={6} className="dashboard-grid">
					<Card>
						<Card.Header>
							<h5 className="text-white">VAT Submission Due Date</h5>
							{/* <Link to="/admin/validator-entries/checked-entries" className="view-all">
								<i className="feather icon-chevrons-right"></i>
							</Link> */}
						</Card.Header>
						<Card.Body className="p-2">
							<VatSubmissionDueDate row_count={5} />
						</Card.Body>
					</Card>
				</Col>
				<Col md={12} xl={6} className="dashboard-grid">
					<Card>
						<Card.Header>
							<h5 className="text-white">Trade License Expiry</h5>
							{/* <Link to="/admin/validator-entries/checked-entries" className="view-all">
								<i className="feather icon-chevrons-right"></i>
							</Link> */}
						</Card.Header>
						<Card.Body className="p-2">
							<TradeLicenseExpiry row_count={5} />
						</Card.Body>
					</Card>
				</Col>
			</Row>
			<Row>
				<Col md={12} className="dashboard-grid">
					<Card>
						<Card.Header>
							<h5 className="text-white">Entries by Clients in last 2 weeks</h5>
						</Card.Header>
						<Card.Body className="py-3">{weeklyGraphData && <BarChart data={weeklyGraphData} />}</Card.Body>
					</Card>
				</Col>
			</Row>
			<Row>
				<Col md={12} className="dashboard-grid">
					<Card>
						<Card.Header>
							<h5 className="text-white">VAT Payable Amount</h5>
						</Card.Header>
						<Card.Body className="py-3">
							<div role="alert" className="alert alert-primary">
								Total VAT payable amount as of today by each client
							</div>
							{vatGraphData && <ClusteredChart data={vatGraphData} />}
						</Card.Body>
					</Card>
				</Col>
			</Row>
		</React.Fragment>
	);
};

export default Dashboard;
