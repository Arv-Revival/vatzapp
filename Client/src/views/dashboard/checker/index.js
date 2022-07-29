import React, {useState, useEffect} from "react";
import {Row, Col, Card} from "react-bootstrap";
import {Link} from "react-router-dom";

import {callApi} from "../../../services/apiService";
import {ApiConstants} from "../../../config/apiConstants";
import {showNotification} from "../../../services/toasterService";
import Spinner from "../../../components/Spinner";

import CheckedEntriesWidget from "../../checker/checked-entries/widget";
import PendingEntriesWidget from "../../checker/pending-entries/widget";
import ApprovedEntriesWidget from "../../checker/approved-entries/widget";
// import RejectedEntriesWidget from "../../checker/rejected-entries/widget";
import NoEntriesWidget from "../../checker/clients-no-entry/widget";
import BarChart from "./charts/BarChart";
import ClusteredChart from "./charts/ClusteredChart";

const Dashboard = () => {
	const [showLoader, setShowLoader] = useState(false);
	const [summary, setsummary] = useState(null);
	const [recentTiles, setrecentTiles] = useState(null);
	const [weeklyGraphData, setWeeklyGraphData] = useState(null);
	const [vatGraphData, setVatGraphData] = useState(null);

	useEffect(() => {
		getsummary();
		getRecentTiles();
		getWeeklyGraphData();
		getVatPayableGraphData();
	}, []);

	const getsummary = () => {
		setShowLoader(true);
		callApi("get", ApiConstants.checker.dashboardsummary, null, true)
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

	const getRecentTiles = () => {
		setShowLoader(true);
		callApi("get", ApiConstants.checker.dashboardrecenttile, null, true)
			.then((response) => {
				setShowLoader(false);
				if (response && response.status_code === 200) {
					setrecentTiles(response.payload);
					// console.log(response.payload);
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
		callApi("get", ApiConstants.checker.checkerlastweeksgraph, null, true)
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
		callApi("get", ApiConstants.checker.checkervatpayablegraph, null, true)
			.then((response) => {
				setShowLoader(false);
				if (response && response.status_code === 200) {
					setVatGraphData(response.payload);
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
				<Col md={6} xl={3}>
					<Link to="/checker/entries/pending-entries">
						<Card className="rounded" style={{background: "#2A6180"}}>
							<Card.Body className="p-3 text-white">
								<div className="row d-flex align-items-center">
									<div className="col-12">
										<div className="d-flex align-items-end">
											<h3 className="f-w-300 d-flex align-items-center m-b-0 text-white">{summary?.pending_entries ? summary?.pending_entries : 0}</h3>
										</div>
									</div>
								</div>
								<h6 className="mt-3 text-tile-caption">Pending Entries</h6>
								<div className="tile-icon">
									<i className="feather icon-file-text" />
								</div>
							</Card.Body>
						</Card>
					</Link>
				</Col>
				<Col md={6} xl={3}>
					<Link to="/checker/entries/checked-entries">
						<Card className="rounded" style={{background: "#43D5C0"}}>
							<Card.Body className="p-3 text-white">
								<div className="row d-flex align-items-center">
									<div className="col-12">
										<div className="d-flex align-items-end">
											<h3 className="f-w-300 d-flex align-items-center m-b-0 text-white">{summary?.checked_enteries ? summary?.checked_enteries : 0}</h3>
										</div>
									</div>
								</div>
								<h6 className="mt-3 text-tile-caption">Checked Entries</h6>
								<div className="tile-icon">
									<i className="feather icon-file-plus" />
								</div>
							</Card.Body>
						</Card>
					</Link>
				</Col>
				<Col md={6} xl={3}>
					<Link to="/checker/entries/approved-entries">
						<Card className="rounded" style={{background: "#1F6F52"}}>
							<Card.Body className="p-3 text-white">
								<div className="row d-flex align-items-center">
									<div className="col-12">
										<div className="d-flex align-items-end">
											<h3 className="f-w-300 d-flex align-items-center m-b-0 text-white">{summary?.approved_enteries ? summary?.approved_enteries : 0}</h3>
										</div>
									</div>
								</div>
								<h6 className="mt-3 text-tile-caption">Approved Entries</h6>
								<div className="tile-icon">
									<i className="feather icon-bar-chart-2" />
								</div>
							</Card.Body>
						</Card>
					</Link>
				</Col>
				<Col md={6} xl={3}>
					<Card className="rounded" style={{background: "#87BBE7"}}>
						<Card.Body className="p-3 text-white">
							<div className="row d-flex align-items-center">
								<div className="col-12">
									<div className="d-flex align-items-end">
										<h3 className="f-w-300 d-flex align-items-center m-b-0 text-white">{summary?.total_enteries ? summary?.total_enteries : 0}</h3>
									</div>
								</div>
							</div>
							<h6 className="mt-3 text-tile-caption">Total Entries</h6>
							<div className="tile-icon">
								<i className="feather icon-shopping-cart" />
							</div>
						</Card.Body>
					</Card>
				</Col>
			</Row>
			<Row>
				<Col md={12} xl={6} className="dashboard-grid">
					<Card>
						<Card.Header>
							<h5 className="text-white">Checked Entries</h5>
							<Link to="/checker/entries/checked-entries" className="view-all">
								<i className="feather icon-chevrons-right"></i>
							</Link>
						</Card.Header>
						<Card.Body className="p-2">
							<CheckedEntriesWidget row_count={5} />
							<div className="text-right mt-3">
								<Link to="/checker/entries/checked-entries">
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
							<Link to="/checker/entries/pending-entries" className="view-all">
								<i className="feather icon-chevrons-right"></i>
							</Link>
						</Card.Header>
						<Card.Body className="p-2">
							<PendingEntriesWidget row_count={5} />
							<div className="text-right mt-3">
								<Link to="/checker/entries/pending-entries">
									<button className="btn btn-primary btn-sm m-0">View More</button>
								</Link>
							</div>
						</Card.Body>
					</Card>
				</Col>
				<Col md={12} xl={6} className="dashboard-grid">
					<Card>
						<Card.Header>
							<h5 className="text-white">Clients with No Entries Entries</h5>
							<Link to="/checker/entries/no-entry-clients" className="view-all">
								<i className="feather icon-chevrons-right"></i>
							</Link>
						</Card.Header>
						<Card.Body className="p-2">
							<NoEntriesWidget row_count={5} />
							<div className="text-right mt-3">
								<Link to="/checker/entries/no-entry-clients">
									<button className="btn btn-primary btn-sm m-0">View More</button>
								</Link>
							</div>
						</Card.Body>
					</Card>
				</Col>
				<Col md={12} xl={6} className="dashboard-grid">
					<Card>
						<Card.Header>
							<h5 className="text-white">Approved Entries</h5>
							<Link to="/checker/entries/approved-entries" className="view-all">
								<i className="feather icon-chevrons-right"></i>
							</Link>
						</Card.Header>
						<Card.Body className="p-2">
							<ApprovedEntriesWidget row_count={6} />
							<div className="text-right mt-3">
								<Link to="/checker/entries/approved-entries">
									<button className="btn btn-primary btn-sm m-0">View More</button>
								</Link>
							</div>
						</Card.Body>
					</Card>
				</Col>
				{/* <Col md={12} xl={6} className="dashboard-grid">
					<Card>
						<Card.Header>
							<h5 className="text-white">Rejected Entries</h5>
							<Link to="/checker/entries/rejected-entries" className="view-all">
								<i className="feather icon-chevrons-right"></i>
							</Link>
						</Card.Header>
						<Card.Body className="p-2">
							<RejectedEntriesWidget row_count={5} />
							<div className="text-right mt-3">
								<Link to="/checker/entries/rejected-entries">
									<button className="btn btn-primary btn-sm m-0">View More</button>
								</Link>
							</div>
						</Card.Body>
					</Card>
				</Col> */}
				<Col md={12} xl={6} className="dashboard-grid">
					<Card>
						<Card.Header>
							<h5 className="text-white">Entries by Clients in last 2 weeks</h5>
						</Card.Header>
						<Card.Body className="py-3">{weeklyGraphData && <BarChart data={weeklyGraphData} />}</Card.Body>
					</Card>
				</Col>
			</Row>
			<Row>
				<Col md={12} xl={4}>
					<Card className="recent-tile">
						<Card.Body>
							<div className="recent-tile-content">
								<div className="tile-count">{recentTiles?.pending_entries ? recentTiles?.pending_entries : 0}</div>
								PENDING ENTRIES FOR MORE THAN 7 DAYS
							</div>
						</Card.Body>
					</Card>
				</Col>
				<Col md={12} xl={4}>
					<Card className="recent-tile">
						<Card.Body>
							<div className="recent-tile-content">
								<div className="tile-count">{recentTiles?.recheck_enteries ? recentTiles?.recheck_enteries : 0}</div>
								RECHECK ENTRIES FOR MORE THAN 3 DAYS
							</div>
						</Card.Body>
					</Card>
				</Col>
				<Col md={12} xl={4}>
					<Card className="recent-tile">
						<Card.Body>
							<Link style={{color:"#888888"}} to="/checker/entries/no-entry-clients">
								<div className="recent-tile-content">
									<div className="tile-count">{recentTiles?.client_with_no_entry ? recentTiles?.client_with_no_entry : 0}</div>
									CLIENT WITH NO ENTRY FOR MORE THAN 3 DAYS
								</div>
							</Link>
						</Card.Body>
					</Card>
				</Col>
			</Row>
			<Row></Row>
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
