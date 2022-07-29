import React, { useState, useEffect } from "react";
import { Accordion, Card, ListGroup, Row, Col, Modal, OverlayTrigger, Popover } from "react-bootstrap";
import { Grid, GridColumn as Column } from "@progress/kendo-react-grid";
import moment from "moment";
import Select from "react-select";

import { callApi } from "../../../services/apiService";
import { ApiConstants } from "../../../config/apiConstants";
import Spinner from "../../../components/Spinner";
import Preview from "../../../components/Preview";
import { entryTypeList } from "../../../enums/entryTypeList";
import { entryTypes } from "../../../enums/entryTypes";
import { entryStatus } from "../../../enums/entryStatus";
import FileIcon from "../../../components/FileIcon";
import { showNotification } from "../../../services/toasterService";
import SalesForm from "./forms/salesForm";
import ExpenditureForm from "./forms/expenditureForm";
import PurchaseForm from "./forms/purchaseForm";

const PendingEntriesWidget = (props) => {
  const [showLoader, setShowLoader] = useState(false);
  const [entriesList, setEntriesList] = useState([]);
  const [showPreview, setshowPreview] = useState(false);
  const [selectedEntry, setselectedEntry] = useState(null);
  const [selectedEntryType, setselectedEntryType] = useState("");

  const [windowWidth, setWindowWidth] = useState(window.innerWidth > 992);

  React.useEffect(() => {
    getData();
    setWindowWidth(window.innerWidth > 992);
  }, []);

  const getData = () => {
    setShowLoader(true);
    callApi("get", ApiConstants.admin.admincheckerpendinglist, { row_count: props.row_count }, true)
      .then((response) => {
        setShowLoader(false);
        if (response && response.status_code === 200) {
          let temp = response.payload;
          setEntriesList(temp);
        } else {
          showNotification("Error", response.message, "error");
        }
      })
      .catch((error) => {
        setShowLoader(false);
        showNotification("Error", "Something went wrong", "error");
      });
  };

  const viewEntry = (entry) => {
    setselectedEntry(entry);
    if (entry?.entry_status_id === entryStatus.RECHECK) {
      setselectedEntryType(entry.entry_type);
    }
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
            <Grid data={entriesList} style={{ height: 270 }}>
              <Column field="id" title="#" width="40px" cell={(props) => <td>{props.dataIndex + 1}</td>} />
              <Column field="name" title="Client Name" width="150px" />
              <Column field="checker_name" title="Checker Name" width="150px" />
              <Column
                field="created_at"
                width="130"
                title="Entry Date"
                cell={(props) => (
                  <td>
                    <div>{moment(props.dataItem.created_at).format("DD-MMM-YYYY")}</div>
                  </td>
                )}
              />
              {/* <Column
              field="file_path"
              title="Document"
              width="95"
              cell={(props) => (
                <td>
                  <div className="text-center">
                    <FileIcon
                      className="mr-2"
                      source={props.dataItem.file_path}
                      style={{ width: 25 }}
                    />
                  </div>
                </td>
              )}
            /> */}
              <Column
                field="Actions"
                title="Actions"
                width="120"
                cell={(props) => (
                  <td>
                    <div className={`text-center ${props.dataItem.entry_status_id === entryStatus.RECHECK ? "text-warning" : props.dataItem.entry_status_id === entryStatus.REJECTED ? "text-danger" : ""}`}>
                      {props.dataItem.entry_status_id === entryStatus.RECHECK ? "Recheck" : props.dataItem.entry_status_id === entryStatus.REJECTED ? "Rejected" : ""}

                      {(props.dataItem.entry_status_id === entryStatus.RECHECK || props.dataItem.entry_status_id === entryStatus.REJECTED) && (
                        <span>
                          &nbsp;&nbsp;
                          <OverlayTrigger
                            trigger="click"
                            placement="top"
                            rootClose={true}
                            overlay={
                              <Popover id="popover-basic">
                                <Popover.Content>
                                  <div className="p-2">{props.dataItem?.comment}</div>
                                </Popover.Content>
                              </Popover>
                            }
                          >
                            <i className="feather icon-info text-primary" style={{ fontSize: 16, cursor: "pointer" }}></i>
                          </OverlayTrigger>
                        </span>
                      )}
                    </div>
                  </td>
                )}
              />
              <Column
                field="View"
                title="View"
                width="70"
                cell={(props) => (
                  <td>
                    <div className="action-panel">
                      <button type="button" className="btn-icon btn btn-outline-primary" title="View" onClick={() => viewEntry(props.dataItem)}>
                        <i className="feather icon-eye"></i>
                      </button>
                    </div>
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
            {entriesList &&
              entriesList.length > 0 &&
              entriesList.map((row) => (
                <Card key={row.id}>
                  <Accordion.Toggle style={{ backgroundColor: "#7599b1" }} as={Card.Header} eventKey={row.id}>
                    {row.name}
                  </Accordion.Toggle>
                  <Accordion.Collapse eventKey={row.id}>
                    <Card.Body>
                      <div className="action-panel" style={{ dispaly: "flex", justifyContent: "flex-end", marginBottom: 16 }}>
                        <button type="button" className="btn btn-outline-primary" title="View" onClick={() => viewEntry(row)}>
                          View <i className="feather icon-eye"></i>
                        </button>
                      </div>
                      <ListGroup>
                        <ListGroup.Item>
                          <span style={{ padding: "0 16px 0 8px" }}>Checker:</span>
                          <span> {row.checker_name}</span>
                        </ListGroup.Item>
                        <ListGroup.Item>
                          <span style={{ padding: "0 16px 0 8px" }}>Invoice Date:</span>
                          <span> {moment(row.invoice_date).format("DD-MMM-YYYY")}</span>
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
                <Preview source={selectedEntry?.file_path} containerStyles={{ backgroundColor: "#f5f5f5", padding: 10 }} zoom={true} />
              </Col>
              <Col className={selectedEntryType === entryTypes.PURCHASE ? "col-lg-8" : "col-lg-6"}>
                <Row>
                  <Col className={selectedEntryType === entryTypes.PURCHASE ? "col-lg-6" : "col-lg-12"}>
                    <div className="input-group mb-3">
                      <Select
                        className="w-100 form-control-select"
                        classNamePrefix="select"
                        options={entryTypeList}
                        placeholder="Entry type"
                        isSearchable={false}
                        isDisabled={selectedEntry?.entry_status_id === entryStatus.RECHECK}
                        value={entryTypeList.find((i) => i.value === selectedEntryType)}
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

export default PendingEntriesWidget;
