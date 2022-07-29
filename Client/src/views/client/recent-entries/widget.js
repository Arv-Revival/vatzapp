import React, { useState, useEffect } from "react";
import { Row, Col, Modal, OverlayTrigger, Popover, ListGroup, Accordion, Card, Button } from "react-bootstrap";
import { Grid, GridColumn as Column } from "@progress/kendo-react-grid";
import moment from "moment";
import { FaAngleDown } from "react-icons/fa";

import { callApi } from "../../../services/apiService";
import { ApiConstants } from "../../../config/apiConstants";
import Spinner from "../../../components/Spinner";
import Preview from "../../../components/Preview";
import { showNotification } from "../../../services/toasterService";
import { entryStatus } from "../../../enums/entryStatus";

const RecentEntriesWidget = (props) => {
  const [showLoader, setShowLoader] = useState(false);
  const [entriesList, setEntriesList] = useState([]);
  const [showPreview, setshowPreview] = useState(false);
  const [selectedEntry, setselectedEntry] = useState(null);
  const [showDeleteConfirm, setDeleteConfirm] = React.useState(false);
  const [deleteComment, setdeleteComment] = useState("");
  const [windowWidth, setWindowWidth] = useState(window.innerWidth);

  const getData = React.useCallback(() => {
    setShowLoader(true);
    callApi("get", ApiConstants.entry.clientrecentlist, { row_count: props.row_count }, true)
      .then((response) => {
        setShowLoader(false);
        if (response && response.status_code === 200) {
          setEntriesList(response.payload);
          console.log(response.payload);
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

  const viewEntry = (entry) => {
    setselectedEntry(entry);
    setshowPreview(true);
  };

  const deleteEntry = (entry) => {
    setselectedEntry(entry);
    setDeleteConfirm(true);
  };

  const deleteData = () => {
    setShowLoader(true);
    callApi("post", ApiConstants.entry.clientrequestfordelete, { entry_id: selectedEntry.id, comment: deleteComment }, true)
      .then((response) => {
        setShowLoader(false);
        setdeleteComment("");
        if (response && response.status_code === 200) {
          showNotification("Success", response.message, "success");
          getData();
        } else {
          showNotification("Error", response.message, "error");
        }
      })
      .catch((error) => {
        setShowLoader(false);
        setdeleteComment("");
        showNotification("Error", "Something went wrong", "error");
      });
  };

  return (
    <React.Fragment>
      {showLoader && <Spinner />}
      {windowWidth && (
        <Row>
          <Col xl={12}>
            <Grid data={entriesList} style={{ height: 270 }}>
              <Column
                field="invoice_number"
                title="Invoice #"
                cell={(props) => (
                  <td>
                    <div>{props.dataItem.invoice_number}</div>
                    <div className="mt-1 text-muted" style={{ fontSize: 12 }}>
                      {moment(props.dataItem.invoice_date).format("DD-MMM-YYYY")}
                    </div>
                  </td>
                )}
              />
              <Column
                field="amount"
                title="Amount"
                cell={(props) => (
                  <td>
                    <div>{props.dataItem.amount}</div>
                    {(props.dataItem.entry_status_id === entryStatus.INPROGRESS || props.dataItem.entry_status_id === entryStatus.RECHECK) && (
                      <div className="text-warning text-wrap" style={{ fontSize: 12 }}>
                        In Progress
                      </div>
                    )}
                    {props.dataItem.entry_status_id === entryStatus.APPROVED && (
                      <div className="text-success text-wrap" style={{ fontSize: 12 }}>
                        Approved
                      </div>
                    )}
                  </td>
                )}
              />
              <Column
                field="Actions"
                title="Actions"
                filterable={false}
                width="120"
                cell={(props) => (
                  <td>
                    <div className="d-flex align-items-center">
                      <div className="action-panel">
                        <button type="button" className="btn-icon btn btn-outline-primary" title="View" onClick={() => viewEntry(props.dataItem)}>
                          <i className="feather icon-eye"></i>
                        </button>
                        {props.dataItem.entry_status_id !== entryStatus.APPROVED && (
                          <button
                            type="button"
                            disabled={props.dataItem.requested_for_delete}
                            className={`btn btn-icon ${props.dataItem.requested_for_delete ? "btn-outline-dark" : "btn-outline-danger"} `}
                            title={props.dataItem.requested_for_delete ? "Requested" : "Request for Delete"}
                            onClick={() => {
                              deleteEntry(props.dataItem);
                            }}
                          >
                            <i className="feather icon-trash"></i>
                          </button>
                        )}
                      </div>
                      &nbsp;
                      {props.dataItem.comment && (
                        <OverlayTrigger
                          trigger="click"
                          placement="top"
                          rootClose={true}
                          overlay={
                            <Popover>
                              <Popover.Content>
                                <div className="p-2">{props.dataItem.comment}</div>
                              </Popover.Content>
                            </Popover>
                          }
                        >
                          <i className="feather icon-info text-primary" style={{ fontSize: 16, cursor: "pointer" }}></i>
                        </OverlayTrigger>
                      )}
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
                <Card key={row.id} style={{ marginBottom: 4 }}>
                  <Accordion.Toggle as={Card.Header} style={{ backgroundColor: "#7599b1", color: "#ffffff", padding: "8px 16px" }} eventKey={row.id}>
                    <span style={{ display: "flex", alignItems: "center" }}>{row.invoice_date}</span>
                    <Button variant="outline-light" size="sm">
                      <FaAngleDown />
                    </Button>
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
                          <span style={{ padding: "0 16px 0 8px" }}>Invoice Date:</span>
                          <span> {moment(row.invoice_date).format("DD-MMM-YYYY")}</span>
                        </ListGroup.Item>
                        <ListGroup.Item>
                          <span style={{ padding: "0 16px 0 8px" }}>Invoice Number:</span>
                          <span> {row.invoice_number}</span>
                        </ListGroup.Item>
                        <ListGroup.Item>
                          <span style={{ padding: "0 16px 0 8px" }}>Amount:</span>
                          <span> {row.amount}</span>
                        </ListGroup.Item>
                        <ListGroup.Item>
                          <span style={{ padding: "0 16px 0 8px" }}>Status:</span>
                          <span>
                            {(row.entry_status_id === entryStatus.INPROGRESS || row.entry_status_id === entryStatus.RECHECK) && (
                              <div className="text-warning text-wrap" style={{ fontSize: 12 }}>
                                In Progress
                              </div>
                            )}
                            {row.entry_status_id === entryStatus.APPROVED && (
                              <div className="text-success text-wrap" style={{ fontSize: 12 }}>
                                Approved
                              </div>
                            )}
                          </span>
                        </ListGroup.Item>
                        <ListGroup.Item>
                          <span style={{ padding: "0 16px 0 8px" }}>Action:</span>
                          <span>
                            {" "}
                            <div className="d-flex align-items-center">
                              <div className="action-panel">
                                <button type="button" className="btn-icon btn btn-outline-primary" title="View" onClick={() => viewEntry(row)}>
                                  <i className="feather icon-eye"></i>
                                </button>
                                {row.entry_status_id !== entryStatus.APPROVED && (
                                  <button
                                    type="button"
                                    disabled={row.requested_for_delete}
                                    className={`btn btn-icon ${row.requested_for_delete ? "btn-outline-dark" : "btn-outline-danger"} `}
                                    title={row.requested_for_delete ? "Requested" : "Request for Delete"}
                                    onClick={() => {
                                      deleteEntry(row);
                                    }}
                                  >
                                    <i className="feather icon-trash"></i>
                                  </button>
                                )}
                              </div>
                              &nbsp;
                              {row.comment && (
                                <OverlayTrigger
                                  trigger="click"
                                  placement="top"
                                  rootClose={true}
                                  overlay={
                                    <Popover>
                                      <Popover.Content>
                                        <div className="p-2">{row.comment}</div>
                                      </Popover.Content>
                                    </Popover>
                                  }
                                >
                                  <i className="feather icon-info text-primary" style={{ fontSize: 16, cursor: "pointer" }}></i>
                                </OverlayTrigger>
                              )}
                            </div>
                          </span>
                        </ListGroup.Item>
                      </ListGroup>
                    </Card.Body>
                  </Accordion.Collapse>
                </Card>
              ))}
          </Accordion>
        )}
      </div>

      <Modal size="lg" show={showPreview} backdrop="static" keyboard={true}>
        <Modal.Body className="p-0">
          <button type="button" className="btn-icon btn close-btn" onClick={() => setshowPreview(false)}>
            <i className="feather icon-x-circle"></i>
          </button>
          <Row>
            <Col sm={12}>
              <div className="px-4 py-5">
                <Preview source={selectedEntry?.file_path} />
              </div>
            </Col>
          </Row>
        </Modal.Body>
      </Modal>
      <Modal size="md" show={showDeleteConfirm} backdrop="static" keyboard={true}>
        <Modal.Header>
          <h5 className="card-title">Confirm Delete</h5>
        </Modal.Header>
        <Modal.Body>
          <div>Are you sure that to request for deleting this entry?</div>
          <div className="mt-3">
            <label>Comment</label> <span className="text-danger">*</span>
            <textarea className="form-control" placeholder="Comment" onChange={(e) => setdeleteComment(e.target.value)}></textarea>
          </div>
        </Modal.Body>
        <Modal.Footer>
          <div>
            <button
              className="btn btn-outline-primary"
              onClick={() => {
                setDeleteConfirm(false);
                setdeleteComment("");
              }}
            >
              No
            </button>
            <button
              className="btn btn-primary"
              disabled={!deleteComment}
              onClick={() => {
                setDeleteConfirm(false);
                deleteData();
              }}
            >
              Yes
            </button>
          </div>
        </Modal.Footer>
      </Modal>
    </React.Fragment>
  );
};

export default RecentEntriesWidget;
