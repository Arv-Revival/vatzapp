import React, {useState, useEffect} from "react";
import {Accordion, Card, ListGroup, Row, Col, Badge} from "react-bootstrap";
import {Grid, GridColumn as Column} from "@progress/kendo-react-grid";
import moment from "moment";

import {callApi} from "../../../../services/apiService";
import {ApiConstants} from "../../../../config/apiConstants";
import Spinner from "../../../../components/Spinner";
import {showNotification} from "../../../../services/toasterService";

const PortalSubscriptionExpiry = (props) => {
	const [showLoader, setShowLoader] = useState(false);
	const [notificationList, setNotificationList] = useState([]);
	const [windowWidth, setWindowWidth] = useState(window.innerWidth > 992);

	React.useEffect(() => {
		getData();
		setWindowWidth(window.innerWidth > 992);
	}, []);

	const getData = React.useCallback(() => {
		setShowLoader(true);
		callApi("get", ApiConstants.admin.expirydatelist, {row_count: props.row_count}, true)
			.then((response) => {
				setShowLoader(false);
				if (response && response.status_code === 200) {
					let notificationData = response?.payload;
					console.log(new Date(notificationData[0].to));
					// console.log(notificationData);
					notificationData = notificationData
						.map((data) => ({
							...data,
							status: new Date(data.to).setHours(0, 0, 0, 0) < new Date().setHours(0, 0, 0, 0) ? "Expired" : "Expiring Today",
						}))
						.filter((data) => new Date(data.to).setHours(0, 0, 0, 0) < new Date().setHours(0, 0, 0, 0));
					setNotificationList(notificationData);
					// console.log(response);
				} else {
					showNotification("Error", response.message, "error");
				}
			})
			.catch((error) => {
				setShowLoader(false);
				showNotification("Error", "Something went wrong", "error");
			});
	}, []);

	return (
		<React.Fragment>
			{showLoader && <Spinner />}
			{windowWidth && (
				<Row>
					<Col xl={12}>
						<Grid data={notificationList} style={{height: 270}}>
							<Column field="id" title="#" width="40px" cell={(props) => <td>{props.dataIndex + 1}</td>} />
							<Column field="name" title="Client Name" width="150px" />
							<Column
								field="created_at"
								title="Status"
								cell={(props) => (
									<td>
										<Badge variant={props.dataItem.status === "Expired" ? "danger" : "warning"}>{props.dataItem.status}</Badge>
									</td>
								)}
							/>
							<Column
								field="to"
								title="Expiry Date"
								cell={(props) => (
									<td>
										<div>{moment(props.dataItem.to).format("DD-MMM-YYYY") === "Invalid date" ? "Unsubscribed" : moment(props.dataItem.to).format("DD-MMM-YYYY")}</div>
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
						{notificationList &&
							notificationList.length > 0 &&
							notificationList.map((row) => (
								<Card key={row.id}>
									<Accordion.Toggle style={{backgroundColor: "#7599b1"}} as={Card.Header} eventKey={row.name}>
										{row.name} <Badge variant={row.status === "Expired" ? "danger" : "warning"}>{row.status}</Badge>
									</Accordion.Toggle>
									<Accordion.Collapse eventKey={row.name}>
										<Card.Body>
											<ListGroup>
												<ListGroup.Item>
													<span style={{padding: "0 16px 0 8px"}}>Client:</span>
													<span> {row.name}</span>
												</ListGroup.Item>
												<ListGroup.Item>
													<span style={{padding: "0 16px 0 8px"}}>Expiry Date:</span>
													<span> {moment(props.dataItem.to).format("DD-MMM-YYYY") === "Invalid date" ? "Unsubscribed" : moment(props.dataItem.to).format("DD-MMM-YYYY")}</span>
												</ListGroup.Item>
											</ListGroup>
										</Card.Body>
									</Accordion.Collapse>
								</Card>
							))}
					</Accordion>
				)}
			</div>
		</React.Fragment>
	);
};

export default PortalSubscriptionExpiry;
