import React, { useState, useEffect } from "react";
import { Row, Col, Card } from "react-bootstrap";
import { Link } from "react-router-dom";

import { callApi } from "../../../services/apiService";
import { ApiConstants } from "../../../config/apiConstants";
import { showNotification } from "../../../services/toasterService";
import Spinner from "../../../components/Spinner";

import PendingEntriesWidget from "../../client/pending-entries/widget";
import RecentEntriesWidget from "../../client/recent-entries/widget";
import SummaryWidget from "../../client/summary/widget";
// import TopSuppliersWidget from "../../client/top-suppliers/widget";
import BarChart from "./charts/BarChart";

const Dashboard = () => {
	const [showLoader, setShowLoader] = useState(false);
	const [summary, setsummary] = useState(null);
	const [monthlyGraphData, setMonthlyGraphData] = useState(null);
	const [paymentUrl, setPaymentUrl] = useState();

	useEffect(() => {
		getsummary();
		getWeeklyGraphData();
	}, []);

	const getsummary = () => {
		setShowLoader(true);
		callApi("get", ApiConstants.client.dashboardsummary, null, true)
			.then((response) => {
				setShowLoader(false);
				if (response && response.status_code === 200) {
					callApi("post", ApiConstants.client.getpaymentlink, { id: response?.payload?.client_id }, true)
						.then((response) => {
							if (response && response.status_code === 200) {
								setPaymentUrl(response.payload.payment_url);
							} else {
								showNotification("Error", response.message, "error");
							}
						})
						.catch((error) => {
							setShowLoader(false);
							showNotification("Error", "Something went wrong", "error");
						});
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
		callApi("get", ApiConstants.client.clientmonthwisegraph, null, true)
			.then((response) => {
				setShowLoader(false);
				if (response && response.status_code === 200) {
					setMonthlyGraphData(response.payload);
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
				{paymentUrl && (
					<Col md={12}>
						<Card className="rounded">
							<Card.Body className="p-3 text-dark">
								Subscription Renewal:{" "}
								<a className="btn btn-primary" href={paymentUrl} target="_blank" rel="noopener noreferrer">
									Complete Payment
								</a>
							</Card.Body>
						</Card>
					</Col>
				)}
				<Col md={6} xl={3}>
					<Card className="rounded" style={{ background: "#2A6180" }}>
						<Card.Body className="p-3 text-white">
							<div className="row d-flex align-items-center">
								<div className="col-12">
									<div className="d-flex align-items-end">
										<div className="mr-2">AED</div>
										<h3 className="f-w-300 d-flex align-items-center m-b-0 text-white">{summary?.vat_payable ? summary?.vat_payable?.toFixed(2) : 0}</h3>
									</div>
								</div>
							</div>
							<h6 className="mt-3 text-tile-caption">VAT Payable as of today</h6>
							<div className="tile-icon">
								<i className="feather icon-file-text" />
							</div>
						</Card.Body>
					</Card>
				</Col>
				<Col md={6} xl={3}>
					<Card className="rounded" style={{ background: "#43D5C0" }}>
						<Card.Body className="p-3 text-white">
							<div className="row d-flex align-items-center">
								<div className="col-12">
									<div className="d-flex align-items-end">
										<h3 className="f-w-300 d-flex align-items-center m-b-0 text-white">{summary?.number_of_invoices ? summary?.number_of_invoices : 0}</h3>
									</div>
								</div>
							</div>
							<h6 className="mt-3 text-tile-caption">Number of invoices</h6>
							<div className="tile-icon">
								<i className="feather icon-file-plus" />
							</div>
						</Card.Body>
					</Card>
				</Col>
				<Col md={6} xl={3}>
					<Link to="/reports/sales">
						<Card className="rounded" style={{ background: "#1F6F52" }}>
							<Card.Body className="p-3 text-white">
								<div className="row d-flex align-items-center">
									<div className="col-12">
										<div className="d-flex align-items-end">
											<div className="mr-2">AED</div>
											<h3 className="f-w-300 d-flex align-items-center m-b-0 text-white">{summary?.total_sales ? summary?.total_sales?.toFixed(2) : 0}</h3>
										</div>
									</div>
								</div>
								<h6 className="mt-3 text-tile-caption">Total Sales</h6>
								<div className="tile-icon">
									<i className="feather icon-bar-chart-2" />
								</div>
							</Card.Body>
						</Card>
					</Link>
				</Col>
				<Col md={6} xl={3}>
					<Link to="/reports/purchase">
						<Card className="rounded" style={{ background: "#257BAE" }}>
							<Card.Body className="p-3 text-white">
								<div className="row d-flex align-items-center">
									<div className="col-12">
										<div className="d-flex align-items-end">
											<div className="mr-2">AED</div>
											<h3 className="f-w-300 d-flex align-items-center m-b-0 text-white">{summary?.total_purchase ? summary?.total_purchase?.toFixed(2) : 0}</h3>
										</div>
									</div>
								</div>
								<h6 className="mt-3 text-tile-caption">Total Purchase</h6>
								<div className="tile-icon">
									<i className="feather icon-shopping-cart" />
								</div>
							</Card.Body>
						</Card>
					</Link>
				</Col>
				<Col md={6} xl={3}>
					<Link to="/reports/expenditure">
						<Card className="rounded" style={{ background: "#4D4F63" }}>
							<Card.Body className="p-3 text-white">
								<div className="row d-flex align-items-center">
									<div className="col-12">
										<div className="d-flex align-items-end">
											<div className="mr-2">AED</div>
											<h3 className="f-w-300 d-flex align-items-center m-b-0 text-white">{summary?.total_expenditure ? summary?.total_expenditure?.toFixed(2) : 0}</h3>
										</div>
									</div>
								</div>
								<h6 className="mt-3 text-tile-caption">Total Expenditure</h6>
								<div className="tile-icon">
									<i className="feather icon-file-minus" />
								</div>
							</Card.Body>
						</Card>
					</Link>
				</Col>
			</Row>
			<Row>
				<Col md={12} xl={6} className="dashboard-grid">
					<Card>
						<Card.Header>
							<h5 className="text-white">Recent Entries</h5>
							<Link to="/entries/recent-entries" className="view-all">
								<i className="feather icon-chevrons-right"></i>
							</Link>
						</Card.Header>
						<Card.Body className="p-2">
							<RecentEntriesWidget row_count={5} />
							<div className="text-right mt-3">
								<Link to="/entries/recent-entries">
									<button className="btn btn-primary btn-sm m-0">View More</button>
								</Link>
							</div>
						</Card.Body>
					</Card>
				</Col>
				<Col md={12} xl={6} className="dashboard-grid">
					<Card>
						<Card.Header>
							<h5 className="text-white">Recent Sales, Purchase & Expenditure</h5>
							<Link to="/entries/summary" className="view-all">
								<i className="feather icon-chevrons-right"></i>
							</Link>
						</Card.Header>
						<Card.Body className="p-2">
							<SummaryWidget row_count={5} />
							<div className="text-right mt-3">
								<Link to="/entries/summary">
									<button className="btn btn-primary btn-sm m-0">View More</button>
								</Link>
							</div>
						</Card.Body>
					</Card>
				</Col>
				<Col md={12} xl={6} className="dashboard-grid">
					<Card>
						<Card.Header>
							<h5 className="text-white">Pending Entries</h5>
							<Link to="/entries/pending-entries" className="view-all">
								<i className="feather icon-chevrons-right"></i>
							</Link>
						</Card.Header>
						<Card.Body className="p-2">
							<PendingEntriesWidget row_count={5} />
							<div className="text-right mt-3">
								<Link to="/entries/pending-entries">
									<button className="btn btn-primary btn-sm m-0">View More</button>
								</Link>
							</div>
						</Card.Body>
					</Card>
				</Col>
				{/* <Col md={12} xl={6} className="dashboard-grid">
					<Card>
						<Card.Header>
							<h5 className="text-white">Top Supplier List</h5>
							<Link to="/entries/pending-entries" className="view-all">
								<i className="feather icon-chevrons-right"></i>
							</Link>
						</Card.Header>
						<Card.Body className="p-2">
							<TopSuppliersWidget row_count={6} />
						</Card.Body>
					</Card>
				</Col> */}
				<Col md={12} lg={6} className="dashboard-grid">
					<Card>
						<Card.Header>
							<h5 className="text-white">Transaction Summary</h5>
						</Card.Header>
						<Card.Body className="py-3">{monthlyGraphData && <BarChart data={monthlyGraphData} />}</Card.Body>
					</Card>
				</Col>
			</Row>
			<Link to="/upload-files" className="d-none">
				<button type="button" className="btn-icon btn-rounded btn btn-info floating-upload-btn">
					<i className="feather icon-upload-cloud"></i>
				</button>
			</Link>
		</React.Fragment>
	);
};

export default Dashboard;
