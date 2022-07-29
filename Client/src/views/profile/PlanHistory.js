import React, { useState, useEffect } from "react";
import { Row, Col, Card } from "react-bootstrap";
import { Grid, GridColumn as Column } from "@progress/kendo-react-grid";
import { process } from "@progress/kendo-data-query";
import { PDFExport } from "@progress/kendo-react-pdf";
import moment from "moment";

import { callApi } from "../../services/apiService";
import { showNotification } from "../../services/toasterService";
import { ApiConstants } from "../../config/apiConstants";
import Invoice from "../../components/Invoice";

const PlanHistory = ({ userId, onShowLoader, userData }) => {
  const [historyData, setHistoryData] = useState([]);
  const [invoiceData, setInvoiceData] = useState(null);
  const [gridState, setGridState] = useState({
    skip: 0,
    take: 5,
  });
  const [gridData, setGridData] = useState(null);

  const pdfExportComponent = React.useRef(null);

  const pagerSettings = {
    buttonCount: 5,
    info: true,
    type: "numeric",
    pageSizes: true,
    previousNext: true,
  };

  useEffect(() => {
    getPlanHistory();
  }, []);

  useEffect(() => {
    loadGridData();
  }, [historyData, gridState]);

  const loadGridData = () => {
    let updatedData = process(historyData, gridState);
    setGridData(updatedData);
  };

  const pageChange = (event) => {
    let updatedState = {
      ...gridState,
      skip: event.page.skip,
      take: event.page.take,
    };
    setGridState(updatedState);
  };

  const getPlanHistory = () => {
    onShowLoader(true);
    callApi("get", ApiConstants.plans.history, { user_id: userId })
      .then((response) => {
        onShowLoader(false);
        if (response && response.status_code === 200) {
          setHistoryData(response.payload);
        } else {
          showNotification("Error", response.message, "error");
        }
      })
      .catch((error) => {
        onShowLoader(false);
        showNotification("Error", "Something went wrong", "error");
      });
  };

  const downloadInvoice = (event, dataItem) => {
    event.preventDefault();
    onShowLoader(true);
    setInvoiceData(dataItem);
    setTimeout(() => {
      if (pdfExportComponent.current) {
        pdfExportComponent.current.save();
      }
      onShowLoader(false);
    }, 500);
  };

  return (
    <React.Fragment>
      <Row>
        <Col xl={12}>
          <Card className="rounded">
            <Card.Header>
              <h5 className="text-primary">Payment History</h5>
            </Card.Header>
            <Card.Body className="p-4">
              <Grid
                data={gridData}
                skip={gridState.skip}
                pageable={true}
                pageSize={gridState.take}
                pageable={pagerSettings}
                onPageChange={pageChange}>
                <Column
                  field="id"
                  title="#"
                  width="60px"
                  filterable={false}
                  cell={(props) => <td>{props.dataIndex + 1}</td>}
                />
                <Column
                  field="plan_name"
                  width="180"
                  title="Plan Name"
                  cell={(props) => <td>VATZ - {props.dataItem.plan_name}</td>}
                />
                <Column field="ref" width="140" title="Reference" />
                <Column
                  field="payment_date"
                  width="150"
                  title="Payment Date"
                  cell={(props) => (
                    <td>
                      <div>
                        {moment(props.dataItem.payment_date).format(
                          "DD - MMM - YYYY"
                        )}
                      </div>
                    </td>
                  )}
                />
                <Column
                  field="from"
                  width="150"
                  title="From Date"
                  cell={(props) => (
                    <td>
                      <div>
                        {moment(props.dataItem.from).format("DD - MMM - YYYY")}
                      </div>
                    </td>
                  )}
                />
                <Column
                  field="to"
                  width="150"
                  title="To Date"
                  cell={(props) => (
                    <td>
                      <div>
                        {moment(props.dataItem.to).format("DD - MMM - YYYY")}
                      </div>
                    </td>
                  )}
                />
                <Column
                  field="payment_amount"
                  width="150"
                  title="Amount"
                  cell={(props) => (
                    <td>
                      <div>
                        {props.dataItem.payment_currency}{" "}
                        {props.dataItem.payment_amount}
                      </div>
                    </td>
                  )}
                />
                <Column field="payment_type" width="140" title="Payment Type" />
                <Column
                  field="payment_date"
                  width="160"
                  title="Invoice number"
                  cell={(props) => (
                    <td>
                      <div>
                        VATZ-
                        {moment(props.dataItem.payment_date).format("YYYY-MM-")}
                        {props.dataItem.id}
                      </div>
                    </td>
                  )}
                />
                <Column
                  field="action"
                  width="120"
                  title=" "
                  cell={(props) => (
                    <td>
                      <a
                        href="#"
                        className="text-primary"
                        onClick={(e) => downloadInvoice(e, props.dataItem)}>
                        <i className="feather icon-download" /> Download
                      </a>
                    </td>
                  )}
                />
              </Grid>
            </Card.Body>
          </Card>
        </Col>
      </Row>
      {invoiceData && (
        <div
          style={{
            position: "absolute",
            left: "-10000px",
            top: 0,
          }}>
          <PDFExport
            ref={pdfExportComponent}
            paperSize="A4"
            margin={30}
            fileName={`TaxInvoice`}
            author="VatzApp">
            <Invoice data={invoiceData} userData={userData} />
          </PDFExport>
        </div>
      )}
    </React.Fragment>
  );
};

export default PlanHistory;
