import React, { useState } from "react";
import { Card, Row, Col } from "react-bootstrap";
import { Formik, Field, Form, ErrorMessage } from "formik";
import * as Yup from "yup";

import Breadcrumb from "../../layouts/AdminLayout/Breadcrumb";
import { callApi } from "../../services/apiService";
import { ApiConstants } from "../../config/apiConstants";
import Spinner from "../../components/Spinner";
import { showNotification } from "../../services/toasterService";

const ChangePassword = () => {
  const [showLoader, setShowLoader] = useState(false);
  const [isSubmitted, setIsSubmitted] = useState(false);

  let formSchema = Yup.object().shape({
    old_password: Yup.string().required("Please enter current password"),
    new_password: Yup.string()
      .required("Please enter Password")
      .min(8, "Password requires min 8 charecters"),
    conpassword: Yup.string()
      .required("Please confirm Password")
      .oneOf([Yup.ref("new_password")], "Passwords are not matching"),
  });

  const onSubmit = (values) => {
    setShowLoader(true);
    let params = {
      old_password: values.old_password,
      new_password: values.new_password,
    };
    callApi("post", ApiConstants.auth.changepassword, params, true)
      .then((response) => {
        setShowLoader(false);
        if (response && response.status_code === 200) {
          showNotification("Success", response.message, "success");
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
      <Breadcrumb />
      <div className="auth-wrapper" style={{ minHeight: "80vh" }}>
        <div className="auth-content">
          <Card className="borderless">
            <Formik
              initialValues={{
                old_password: "",
                new_password: "",
                conpassword: "",
              }}
              validationSchema={formSchema}
              onSubmit={(values) => onSubmit(values)}>
              {({ errors }) => (
                <Form>
                  <Row className="align-items-center">
                    <Col>
                      <Card.Body className="card-body">
                        <div className="mb-4  text-center">
                          <i className="feather icon-lock auth-icon" />
                        </div>
                        <h3 className="mb-5 f-w-400  text-center">
                          Change Password
                        </h3>
                        <div className="input-group mb-3">
                          <Field
                            type="password"
                            className={`form-control ${
                              errors.old_password && isSubmitted
                                ? "is-invalid"
                                : ""
                            }`}
                            placeholder="Current Password"
                            name="old_password"
                            tabIndex={1}
                          />
                          <ErrorMessage name="old_password">
                            {(msg) => (
                              <div className="invalid-feedback">{msg}</div>
                            )}
                          </ErrorMessage>
                        </div>
                        <div className="input-group mb-3">
                          <Field
                            type="password"
                            className={`form-control ${
                              errors.new_password && isSubmitted
                                ? "is-invalid"
                                : ""
                            }`}
                            placeholder="New Password"
                            name="new_password"
                            tabIndex={1}
                          />
                          <ErrorMessage name="new_password">
                            {(msg) => (
                              <div className="invalid-feedback">{msg}</div>
                            )}
                          </ErrorMessage>
                        </div>
                        <div className="input-group mb-4">
                          <Field
                            type="password"
                            className={`form-control ${
                              errors.conpassword && isSubmitted
                                ? "is-invalid"
                                : ""
                            }`}
                            placeholder="Confirm Password"
                            name="conpassword"
                            tabIndex={1}
                          />
                          <ErrorMessage name="conpassword">
                            {(msg) => (
                              <div className="invalid-feedback">{msg}</div>
                            )}
                          </ErrorMessage>
                        </div>
                        <div className="text-center">
                          <button
                            className="btn btn-primary mb-3"
                            type="submit"
                            onClick={() => setIsSubmitted(true)}>
                            Change password
                          </button>
                        </div>
                      </Card.Body>
                    </Col>
                  </Row>
                </Form>
              )}
            </Formik>
          </Card>
        </div>
      </div>
    </React.Fragment>
  );
};

export default ChangePassword;
