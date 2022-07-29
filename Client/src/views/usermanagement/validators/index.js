import React, { useState, useEffect } from "react";
import { Row, Col, Card, Modal, Accordion, Button, ListGroup, InputGroup, FormControl } from "react-bootstrap";
import { Grid, GridColumn as Column } from "@progress/kendo-react-grid";
import { process } from "@progress/kendo-data-query";
import moment from "moment";
import { FaAngleDown } from "react-icons/fa";

import { callApi } from "../../../services/apiService";
import { showNotification } from "../../../services/toasterService";
import { ApiConstants } from "../../../config/apiConstants";
import { employeeStatus } from "../../../enums/employeeStatus";
import Spinner from "../../../components/Spinner";
import { DropdownFilterCell } from "../../../components/CustomFilters/DropdownFilter";
import UserForm from "./form";

const options = ["Active", "Inactive"];
const StatusFilterCell = (props) => <DropdownFilterCell {...props} data={options} defaultItem={"All"} />;

const ValidatorUsers = (props) => {
  const [showLoader, setShowLoader] = useState(false);
  const [usersList, setusersList] = useState([]);
  const [usersState, setusersState] = useState({ skip: 0, take: 10 });
  const [userGridData, setuserGridData] = useState(null);
  const [showAddModal, setshowAddModal] = useState(false);
  const [isEdit, setIsEdit] = useState(false);
  const [selectedItem, setSelectedItem] = useState(null);
  const [windowWidth, setWindowWidth] = useState(window.innerWidth);
  const [accordionList, setAccordionList] = useState([]);

  React.useLayoutEffect(() => {
    setWindowWidth(window.innerWidth > 992);
  }, []);

  const pagerSettings = { buttonCount: 5, info: true, type: "numeric", pageSizes: true, previousNext: true };
  useEffect(() => {
    getUsers();
  }, []);

  useEffect(() => {
    setuserGridData(process(usersList, usersState));
  }, [usersList, usersState]);

  const onAddUser = () => {
    closeModal();
    getUsers();
  };

  const pageChange = (event) => {
    setusersState({ ...usersState, skip: event.page.skip, take: event.page.take });
  };

  const filterChange = (event) => {
    setusersState({ ...usersState, filter: event.filter });
  };

  const getUsers = () => {
    setShowLoader(true);
    callApi("get", ApiConstants.validator.list, {})
      .then((response) => {
        setShowLoader(false);
        if (response && response.status_code === 200) {
          let data = response.payload.map((item) => ({ ...item, status: item.is_active ? employeeStatus.ACTIVE : employeeStatus.INACTIVE }));
          setusersList(data);
          setAccordionList(data);
        } else {
          showNotification("Error", response.message, "error");
        }
      })
      .catch((error) => {
        setShowLoader(false);
        showNotification("Error", "Something went wrong", "error");
      });
  };

  const closeModal = () => {
    setshowAddModal(false);
    setIsEdit(false);
    setSelectedItem(null);
  };

  const onEdit = (data) => {
    setSelectedItem(data);
    setIsEdit(true);
    setshowAddModal(true);
  };

  return (
    <React.Fragment>
      {showLoader && <Spinner />}
      <Row>
        <Col xl={12}>
          <Card className="rounded">
            <Card.Body className="p-4">
              <Row className="mb-3">
                <Col xl={12} className="text-right">
                  <button type="button" className="btn btn-primary mr-0" style={{ height: 35, padding: "5px 12px" }} onClick={() => setshowAddModal(true)}>
                    <i className="feather icon-plus"></i>
                    Add New User
                  </button>
                </Col>
              </Row>
              {windowWidth && (
                <Grid data={userGridData} skip={usersState.skip} pageSize={usersState.take} pageable={pagerSettings} onPageChange={pageChange} filterable={true} filter={usersState.filter} onFilterChange={filterChange}>
                  <Column field="id" title="#" width="60px" filterable={false} cell={(props) => <td>{props.dataIndex + 1}</td>} />
                  <Column field="name" width="200" title="Name" />
                  <Column field="email" width="250" title="Email" />
                  <Column field="whatsapp_no" title="Whatsapp No" width="150px" cell={(props) => <td>{props.dataItem.w_country_code + " " + props.dataItem.whatsapp_no}</td>} />
                  <Column field="checkers_count" width="160" filterable={false} title="Number of checkers" cell={(props) => <td>{props.dataItem.checkers_count ? props.dataItem.checkers_count : 0}</td>} />
                  <Column
                    field="join_date"
                    width="150"
                    filterable={false}
                    title="Joining Date"
                    cell={(props) => (
                      <td>
                        <div>{moment(props.dataItem.join_date).format("DD-MMM-YYYY")}</div>
                      </td>
                    )}
                  />
                  <Column
                    field="status"
                    title="Status"
                    width="150"
                    filterCell={StatusFilterCell}
                    cell={(props) => (
                      <td>
                        <div className={props.dataItem.is_active ? "text-success" : "text-warning"}>{props.dataItem.status}</div>
                      </td>
                    )}
                  />
                  <Column
                    field="Actions"
                    filterable={false}
                    width="120"
                    cell={(props) => (
                      <td>
                        <div className="action-panel">
                          <button type="button" className="btn-icon btn btn-outline-primary" title="Edit" onClick={() => onEdit(props.dataItem)}>
                            <i className="feather icon-edit-2"></i>
                          </button>
                        </div>
                      </td>
                    )}
                  />
                </Grid>
              )}
              <div>
                {!windowWidth && (
                  <>
                    <InputGroup className="mb-2">
                      <FormControl
                        className="form-control"
                        placeholder="Checker"
                        aria-label="Checker"
                        onChange={(event) => {
                          setAccordionList(usersList);
                          return event.target.value ? setAccordionList(accordionList?.filter((data) => data.name?.includes(event.target.value))) : setAccordionList(usersList);
                        }}
                      />
                    </InputGroup>
                    <InputGroup className="mb-2">
                      <FormControl
                        className="form-control"
                        placeholder="Email"
                        aria-label="Email"
                        onChange={(event) => {
                          setAccordionList(usersList);
                          return event.target.value ? setAccordionList(usersList?.filter((data) => data.email?.includes(event.target.value))) : setAccordionList(usersList);
                        }}
                      />
                    </InputGroup>
                    <InputGroup className="mb-2">
                      <FormControl
                        className="form-control"
                        placeholder="WhatsApp Number"
                        aria-label="WhatsApp Number"
                        onChange={(event) => {
                          setAccordionList(usersList);
                          return event.target.value ? setAccordionList(usersList?.filter((data) => data.whatsapp_no?.includes(event.target.value))) : setAccordionList(usersList);
                        }}
                      />
                    </InputGroup>
                    <InputGroup className="mb-2">
                      <FormControl
                        className="form-control"
                        placeholder="Validator"
                        aria-label="Validator"
                        onChange={(event) => {
                          setAccordionList(usersList);
                          return event.target.value ? setAccordionList(usersList?.filter((data) => data.validator_name?.includes(event.target.value))) : setAccordionList(usersList);
                        }}
                      />
                    </InputGroup>

                    <Accordion defaultActiveKey="0">
                      {accordionList &&
                        accordionList.length > 0 &&
                        accordionList.map((row) => (
                          <Card key={row.id} style={{ marginBottom: 4 }}>
                            <Accordion.Toggle as={Card.Header} style={{ backgroundColor: "#7599b1", color: "#ffffff", padding: "8px 16px" }} eventKey={row.id}>
                              <div style={{ display: "flex", justifyContent: "space-between" }}>
                                Name: {row.name}
                                <Button variant="outline-light" size="sm">
                                  <FaAngleDown />
                                </Button>
                              </div>
                            </Accordion.Toggle>
                            <Accordion.Collapse eventKey={row.id}>
                              <Card.Body>
                                <div className="action-panel" style={{ dispaly: "flex", justifyContent: "flex-end", marginBottom: 16 }}>
                                  <button type="button" className="btn btn-outline-primary" title="View" onClick={() => onEdit(row)}>
                                    <i className="feather icon-edit-2"></i>
                                  </button>
                                </div>
                                <ListGroup>
                                  <ListGroup.Item>
                                    <span style={{ padding: "0 16px 0 8px" }}>Email:</span>
                                    <span> {row.email}</span>
                                  </ListGroup.Item>
                                  <ListGroup.Item>
                                    <span style={{ padding: "0 16px 0 8px" }}>WhatsApp:</span>
                                    <span>{`${row.w_country_code} ${row.whatsapp_no}`}</span>
                                  </ListGroup.Item>
                                  <ListGroup.Item>
                                    <span style={{ padding: "0 16px 0 8px" }}>Number of Checkers:</span>
                                    <span> {row.checkers_count}</span>
                                  </ListGroup.Item>
                                  <ListGroup.Item>
                                    <span style={{ padding: "0 16px 0 8px" }}>Joining Date:</span>
                                    <span> {moment(row.join_date).format("DD-MMM-YYYY")}</span>
                                  </ListGroup.Item>
                                  <ListGroup.Item>
                                    <span style={{ padding: "0 16px 0 8px" }}>Status:</span>
                                    <span className={row.is_active ? "text-success" : "text-warning"}>{row.status}</span>
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
            </Card.Body>
          </Card>
        </Col>
      </Row>
      <Modal size="lg" show={showAddModal} backdrop="static" keyboard={true}>
        <Modal.Body className="p-0">
          <button type="button" className="btn-icon btn close-btn" onClick={closeModal}>
            <i className="feather icon-x-circle"></i>
          </button>
          <UserForm onSuccess={onAddUser} onShowLoader={setShowLoader} isEdit={isEdit} dataItem={selectedItem} {...props} />
        </Modal.Body>
      </Modal>
    </React.Fragment>
  );
};

export default ValidatorUsers;
