import React, {useState, useEffect} from "react";
import {Row, Col, Accordion, Card, ListGroup, Button} from "react-bootstrap";
import {Grid, GridColumn as Column} from "@progress/kendo-react-grid";
import {callApi} from "../../../services/apiService";
import {ApiConstants} from "../../../config/apiConstants";
import {showNotification} from "../../../services/toasterService";
import {FaAngleDown} from "react-icons/fa";

import Spinner from "../../../components/Spinner";

const TopSuppliersWidget = (props) => {
	const [showLoader, setShowLoader] = useState(false);
	const [entriesList, setEntriesList] = useState([]);
	const [accordionList, setAccordionList] = useState([]);
	const [windowWidth, setWindowWidth] = useState(window.innerWidth);

	const getData = React.useCallback(() => {
		setShowLoader(true);
		callApi("get", ApiConstants.supplier.topsixsupplierslist, {row_count: props.row_count}, true)
			.then((response) => {
				setShowLoader(false);
				if (response && response.status_code === 200) {
					const total = response.payload.sort((a, b) => a?.total_amount - b?.total_amount).reverse();
					setEntriesList(total);
					setAccordionList(total);
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

	return (
		<React.Fragment>
			{showLoader && <Spinner />}
			{windowWidth && (
				<Row>
					<Col xl={12}>
						<Grid data={entriesList} style={{height: 270}}>
							<Column
								field="created_at"
								title="Supplier"
								cell={(props) => (
									<td>
										<div>{props.dataItem.name}</div>
									</td>
								)}
							/>
							<Column
								field="created_at"
								title="Amount"
								cell={(props) => (
									<td>
										<div>{props.dataItem.total_amount}</div>
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
									<Card key={row.supplier_id} style={{marginBottom: 4}}>
										<Accordion.Toggle as={Card.Header} style={{backgroundColor: "#7599b1", color: "#ffffff", padding: "8px 16px"}} eventKey={row.supplier_id}>
											<span style={{display: "flex", alignItems: "center"}}>{row.name}</span>
											<Button variant="outline-light" size="sm">
												<FaAngleDown />
											</Button>
										</Accordion.Toggle>
										<Accordion.Collapse eventKey={row.supplier_id}>
											<Card.Body>
												<ListGroup>
													<ListGroup.Item>
														<span style={{padding: 8}}>Name: {row.name}</span>
														<span style={{padding: 4}}>|</span>
														<span style={{padding: 8}}>Amount: {row.total_amount}</span>
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
		</React.Fragment>
	);
};

export default TopSuppliersWidget;
