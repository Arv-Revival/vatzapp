import React, { useState, useEffect } from "react";
import { Row, Col, Card, Button, Modal } from "react-bootstrap";
import moment from "moment";
import Select from "react-select";
import { PDFExport } from "@progress/kendo-react-pdf";


import { callApi } from "../../services/apiService";
import { showNotification } from "../../services/toasterService";
import { ApiConstants } from "../../config/apiConstants";
import Spinner from "../../components/Spinner";
import Report from "../../components/Report";

import pdfIcon from "../../assets/images/icons/pdf.png";
// import Preview from "../../components/Preview";

const VatReport = (props) => {
  const [showLoader, setShowLoader] = useState(false);
  const [periodsList, setperiodsList] = useState([]);
  const [filteredPeriodsList, setFilteredPeriodsList] = useState([]);
  const [selectedPeriod, setselectedPeriod] = useState(null);
  const [selectedReport, setselectedReport] = useState(null);
  const [isSearchClicked, setisSearchClicked] = useState(false);
  const [reportsData, setreportsData] = useState(null);
  const [clientsList, setclientsList] = useState([]);
  const [selectedClient, setselectedClient] = useState(null);
  const [showPreview, setshowPreview] = useState(false);

  const pdfExportComponent = React.useRef(null);

  useEffect(() => {
    getClients();
  }, []);

  useEffect(() => {
    if (selectedPeriod) onSearchFilter();
  }, [selectedPeriod]);

  const onSearchFilter = () => {
    if (selectedPeriod) {
      setisSearchClicked(true);
      let filteredList = periodsList.filter((i) => i.id === selectedPeriod.id);
      setFilteredPeriodsList(filteredList);
    }
  };

  const clearFilter = () => {
    setFilteredPeriodsList(periodsList);
    setselectedPeriod(null);
    setisSearchClicked(false);
  };

  const getClients = () => {
    setShowLoader(true);
    callApi("get", ApiConstants.checker.clientshortlistbychecker, {}, true)
      .then((response) => {
        setShowLoader(false);
        if (response && response.status_code === 200) {
          let clients = response.payload.map((i) => {
            return {
              ...i,
              value: i.id,
              label: i.name,
            };
          });
          setclientsList(clients);
        } else {
          showNotification("Error", response.message, "error");
        }
      })
      .catch((error) => {
        setShowLoader(false);
        showNotification("Error", "Something went wrong", "error");
      });
  };

  const getPeriods = (userId) => {
    setperiodsList([]);
    setFilteredPeriodsList([]);
    setShowLoader(true);
    callApi(
      "get",
      ApiConstants.vatreports.vatreportperiodsforothers,
      { user_id: userId },
      true
    )
      .then((response) => {
        setShowLoader(false);
        if (response && response.status_code === 200) {
          let periods = response.payload.map((i, index) => {
            return {
              ...i,
              id: index,
              value:
                moment(i.start_date).format("DD MMM YYYY") +
                " - " +
                moment(i.end_date).format("DD MMM YYYY"),
              label:
                moment(i.start_date).format("DD MMM YYYY") +
                " - " +
                moment(i.end_date).format("DD MMM YYYY"),
            };
          });
          setperiodsList(periods);
          setFilteredPeriodsList(periods);
        } else {
          showNotification("Error", response.message, "error");
        }
      })
      .catch((error) => {
        setShowLoader(false);
        showNotification("Error", "Something went wrong", "error");
      });
  };

  const onSelectClient = (value) => {
    setselectedClient(value);
    getPeriods(value.id);
  };

  const getReportName = (item) => {
    return (
      "VAT_" +
      item.company_name +
      "_" +
      moment(item.start_date).format("MMMYYYY")
    );
  };

  const downloadReport = (report) => {
    setShowLoader(true);
    setselectedReport(report);
    let params = {
      user_id: selectedClient.id,
      start_date: report.start_date,
      end_date: report.end_date,
    };
    callApi("post", ApiConstants.vatreports.vatreportforothers, params, true)
      .then((response) => {
        if (response && response.status_code === 200) {
          setreportsData(response.payload);
          console.log(response.payload);
          setTimeout(() => {
            if (pdfExportComponent.current) {
              pdfExportComponent.current.save();
            }
            setShowLoader(false);
          }, 500);
        } else {
          setShowLoader(false);
          showNotification("Error", response.message, "error");
        }
      })
      .catch((error) => {
        setShowLoader(false);
        showNotification("Error", "Something went wrong", "error");
      });
  };
  const closeEntryModal = () => {
		setshowPreview(false);
	};
const viewEntry = (report) => {
    setShowLoader(true);
    setselectedReport(report);
    let params = {
      user_id: selectedClient.id,
      start_date: report.start_date,
      end_date: report.end_date,
    };
    callApi("post", ApiConstants.vatreports.vatreportforothers, params, true)
    .then((response) => {
        console.log(response.payload)
        if (response && response.status_code === 200) {
          setreportsData(response.payload);
          setshowPreview(true);
          setShowLoader(false);
        } else {
          setShowLoader(false);
          showNotification("Error", response.message, "error");
        }
      })
      .catch((error) => {
        setShowLoader(false);
        showNotification("Error", "Something went wrong", "error");
      });
	};
	const onEntrySubmit = (status) => {
    let params = {...reportsData,status,name:`VAT_${reportsData.name}_${moment(reportsData.start_date).format("MMMYYYY")}`};
    callApi("post", ApiConstants.vatreports.createvatreport, params, true)
    .then((response) => {
        if (response && response.status_code === 201) {
          setshowPreview(false);
          setShowLoader(false);
        } else {
          setShowLoader(false);
          showNotification("Error", response.message, "error");
        }
      })
      .catch((error) => {
        setShowLoader(false);
        showNotification("Error", "Something went wrong", "error");
      });

		closeEntryModal();
	};
  return (
    <React.Fragment>
      {showLoader && <Spinner />}
      <Row className="vat-reports">
        <Col xl={12}>
          <Card className="rounded">
            <Card.Body className="p-4">
              <Row className="mb-3">
                <Col xs={12} md={5} xl={3}>
                  <div className="input-group mb-3">
                    <Select
                      className="w-100 form-control-select"
                      classNamePrefix="select"
                      options={clientsList}
                      value={selectedClient}
                      placeholder="Clients"
                      onChange={(value) => {
                        onSelectClient(value);
                      }}
                    />
                  </div>
                </Col>
                <Col xs={12} md={5} xl={3}>
                  <div className="input-group mb-3">
                    <Select
                      className="w-100 form-control-select"
                      classNamePrefix="select"
                      options={periodsList}
                      value={selectedPeriod}
                      placeholder="VAT Periods"
                      isSearchable={false}
                      onChange={(value) => {
                        setselectedPeriod(value);
                      }}
                    />
                  </div>
                </Col>
                <Col xs={1} md={1} xl={1} className="pl-0">
                  {isSearchClicked && (
                    <span className="clear-search" onClick={clearFilter}>
                      <i className="feather icon-x"></i>
                    </span>
                  )}
                </Col>
              </Row>
              <Row className="mt-4">
                {filteredPeriodsList.map((item, key) => (
                  <Col xs={12} lg={3} key={key}>
                    <Card className="rounded">
                      <Card.Body className="px-4 pt-4 pb-0">
                        <div className="report-tile">
                          <img src={pdfIcon} alt="PDF" width="50" />
                          <div className="report-name mt-3">
                            {getReportName(item)}
                          </div>
                        </div>
                        <div
                          className="report-download"
                          onClick={() => downloadReport(item)}>
                          <i className="feather icon-download" />
                        </div>
                      </Card.Body>
                      <div className="report-tile mb-4">
                        <Button variant="primary" className="m-0" onClick={e=>viewEntry(item)}>Request for Approval</Button>
                      </div>
                    </Card>
                  </Col>
                ))}
              </Row>
            </Card.Body>
          </Card>
        </Col>
      </Row>
      {reportsData && (
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
            fileName={getReportName(selectedReport)}
            author="VatzApp">
            <Report data={reportsData} />
          </PDFExport>
        </div>
      )}
      <Modal size="xl" show={showPreview} backdrop="static" keyboard={true}>
				<Modal.Body className="p-0">
					<button
						type="button"
						className="btn-icon btn close-btn"
						onClick={() => {
							closeEntryModal();
						}}>
						<i className="feather icon-x-circle"></i>
					</button>
					<div className="px-4 py-5">
						<Row>
               <Col className="col-12 my-2">
								<Report data={reportsData} />
							</Col>
							<Col className="col-12 my-2 d-flex justify-content-center">
                <Button variant="primary" onClick={()=>onEntrySubmit("Pending",reportsData)} >Request for Approval</Button>
							</Col> 
						</Row>
					</div>
				</Modal.Body>
			</Modal>
    </React.Fragment>
  );
};

export default VatReport;
