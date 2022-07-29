import React, { useState, useEffect } from "react";
import { Row, Col, Card, Modal } from "react-bootstrap";
import { Grid, GridColumn as Column } from "@progress/kendo-react-grid";
import { process } from "@progress/kendo-data-query";

import { callApi } from "../../../services/apiService";
import { ApiConstants } from "../../../config/apiConstants";
import { showNotification } from "../../../services/toasterService";
import { employeeStatus } from "../../../enums/employeeStatus";
import Spinner from "../../../components/Spinner";
import { DropdownFilterCell } from "../../../components/CustomFilters/DropdownFilter";
import UserForm from "./form";

const options = ["Active", "Inactive"];
const StatusFilterCell = (props) => (
  <DropdownFilterCell {...props} data={options} defaultItem={"All"} />
);

const Clients = (props) => {
  const [showLoader, setShowLoader] = useState(false);
  const [usersList, setusersList] = useState([]);
  const [usersState, setusersState] = useState({
    skip: 0,
    take: 10,
  });
  const [userGridData, setuserGridData] = useState(null);
  const [showAddModal, setshowAddModal] = useState(false);
  const [isEdit, setIsEdit] = useState(false);
  const [selectedItem, setSelectedItem] = useState(null);

  const pagerSettings = {
    buttonCount: 5,
    info: true,
    type: "numeric",
    pageSizes: true,
    previousNext: true,
  };

  useEffect(() => {
    getUsers();
  }, []);

  useEffect(() => {
    loadGridData();
  }, [usersList, usersState]);

  const onAddUser = () => {
    closeModal();
    getUsers();
  };

  const loadGridData = () => {
    let updatedData = process(usersList, usersState);
    setuserGridData(updatedData);
  };

  const pageChange = (event) => {
    let updatedState = {
      ...usersState,
      skip: event.page.skip,
      take: event.page.take,
    };
    setusersState(updatedState);
  };

  const filterChange = (event) => {
    let updatedState = {
      ...usersState,
      filter: event.filter,
    };
    setusersState(updatedState);
  };

  const getUsers = () => {
    setShowLoader(true);
    callApi("get", ApiConstants.supplier.list, {})
      .then((response) => {
        setShowLoader(false);
        if (response && response.status_code === 200) {
          let data = response.payload.map((item) => ({
            ...item,
            status: item.is_active
              ? employeeStatus.ACTIVE
              : employeeStatus.INACTIVE,
          }));
          setusersList(data);
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
                  <button
                    type="button"
                    className="btn btn-primary mr-0"
                    style={{ height: 35, padding: "5px 12px" }}
                    onClick={() => setshowAddModal(true)}>
                    <i className="feather icon-plus"></i>
                    Add Supplier
                  </button>
                </Col>
              </Row>
              <Grid
                data={userGridData}
                skip={usersState.skip}
                pageable={true}
                pageSize={usersState.take}
                pageable={pagerSettings}
                onPageChange={pageChange}
                filterable={true}
                filter={usersState.filter}
                onFilterChange={filterChange}>
                <Column
                  field="id"
                  title="#"
                  width="60px"
                  filterable={false}
                  cell={(props) => <td>{props.dataIndex + 1}</td>}
                />
                <Column field="name" width="250" title="Supplier Name" />
                <Column
                  field="building_name"
                  width="200"
                  title="Building Name"
                />
                <Column field="palce" width="200" title="Place / Street Name" />
                <Column field="p_o_box" width="150" title="PO Box" />
                <Column field="city" width="200" title="City" />
                <Column field="emirate" width="200" title="Emirate" />
                <Column
                  field="whatsapp_no"
                  title="Whatsapp No"
                  width="200"
                  cell={(props) => (
                    <td>
                      {props.dataItem.w_country_code +
                        " " +
                        props.dataItem.whatsapp_no}
                    </td>
                  )}
                />
                <Column field="email" width="250" title="Email" />
                <Column field="trn" width="180" title="TRN Number" />
                <Column
                  field="status"
                  title="Status"
                  filterCell={StatusFilterCell}
                  width="150"
                  cell={(props) => (
                    <td>
                      <div
                        className={
                          props.dataItem.is_active
                            ? "text-success"
                            : "text-warning"
                        }>
                        {props.dataItem.status}
                      </div>
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
                        <button
                          type="button"
                          className="btn-icon btn btn-outline-primary"
                          title="Edit"
                          onClick={() => onEdit(props.dataItem)}>
                          <i className="feather icon-edit-2"></i>
                        </button>
                        {/* <button
                          type="button"
                          className="btn-icon btn btn-outline-danger"
                          title="Delete">
                          <i className="feather icon-trash"></i>
                        </button> */}
                      </div>
                    </td>
                  )}
                />
              </Grid>
            </Card.Body>
          </Card>
        </Col>
      </Row>
      <Modal size="lg" show={showAddModal} backdrop="static" keyboard={true}>
        <Modal.Body className="p-0">
          <button
            type="button"
            className="btn-icon btn close-btn"
            onClick={closeModal}>
            <i className="feather icon-x-circle"></i>
          </button>
          <UserForm
            onSuccess={onAddUser}
            onShowLoader={setShowLoader}
            isEdit={isEdit}
            dataItem={selectedItem}
            {...props}
          />
        </Modal.Body>
      </Modal>
    </React.Fragment>
  );
};

export default Clients;
