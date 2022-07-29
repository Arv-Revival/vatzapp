import React, { useState, useEffect } from "react";
import { Row, Col, Accordion, Card, ListGroup,Button } from "react-bootstrap";
import { Grid, GridColumn as Column } from "@progress/kendo-react-grid";
import moment from "moment";
import { FaAngleDown } from "react-icons/fa";
import { callApi } from "../../../services/apiService";
import { ApiConstants } from "../../../config/apiConstants";
import { showNotification } from "../../../services/toasterService";
import Spinner from "../../../components/Spinner";

const SummaryWidget = (props) => {
  const [showLoader, setShowLoader] = useState(false);
  const [entriesList, setEntriesList] = useState([]);
  const [windowWidth, setWindowWidth] = useState(window.innerWidth);

  const getData = React.useCallback(() => {
    setShowLoader(true);
    callApi("get", ApiConstants.summary.clientdaywisesummary, { row_count: props.row_count }, true)
      .then((response) => {
        setShowLoader(false);
        if (response && response.status_code === 200) {
          setEntriesList(response.payload.map((data, index) => ({ ...data, id: index + 1 })));
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
    getData();
    setWindowWidth(window.innerWidth > 992);
  }, [getData]);

  return (
    <React.Fragment>
      {showLoader && <Spinner />}
      <Row>
        <Col xl={12}>
          {windowWidth && (
            <Grid data={entriesList} style={{ height: 270 }}>
              <Column
                field="invoice_date"
                width="100"
                title="Invoice Date"
                cell={(props) => (
                  <td>
                    <div>{moment(props.dataItem.invoice_date).format("DD-MMM-YYYY")}</div>
                  </td>
                )}
              />
              <Column field="sale_amount" title="Sales" />
              <Column field="purchase_amount" title="Purchase" />
              <Column field="expenditure_amount" title="Expense" />
            </Grid>
          )}
          <div>
            {!windowWidth && (
              <Accordion defaultActiveKey="0">
                {entriesList &&
                  entriesList.length > 0 &&
                  entriesList.map((row) => (
                    <Card key={row.id} style={{ marginBottom: 4 }}>
                      <Accordion.Toggle as={Card.Header} style={{ backgroundColor: "#7599b1" }} eventKey={row.id}>
                        <span style={{ display: "flex", alignItems: "center" }}>{row.invoice_date}</span>
                        <Button variant="outline-light" size="sm">
                          <FaAngleDown />
                        </Button>
                      </Accordion.Toggle>
                      <Accordion.Collapse eventKey={row.id}>
                        <Card.Body>
                          <ListGroup>
                            <ListGroup.Item>
                              <span style={{ padding: "0 16px 0 8px" }}>Invoice Date:</span>
                              <span>{moment(row.invoice_date).format("DD-MMM-YYYY")}</span>
                            </ListGroup.Item>
                            <ListGroup.Item>
                              <span style={{ padding: "0 16px 0 8px" }}>Sales:</span>
                              <span>{row.sale_amount}</span>
                            </ListGroup.Item>
                            <ListGroup.Item>
                              <span style={{ padding: "0 16px 0 8px" }}>Purchase:</span>
                              <span>{row.purchase_amount}</span>
                            </ListGroup.Item>
                            <ListGroup.Item>
                              <span style={{ padding: "0 16px 0 8px" }}>Expense:</span>
                              <span>{row.expenditure_amount}</span>
                            </ListGroup.Item>
                          </ListGroup>
                        </Card.Body>
                      </Accordion.Collapse>
                    </Card>
                  ))}
              </Accordion>
            )}
          </div>
        </Col>
      </Row>
    </React.Fragment>
  );
};

export default SummaryWidget;
