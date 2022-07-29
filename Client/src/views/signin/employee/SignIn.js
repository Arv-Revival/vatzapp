import React, { useState } from "react";
import { NavLink, Link } from "react-router-dom";
import { Formik, Field, Form, ErrorMessage } from "formik";
import * as Yup from "yup";

import { showNotification } from "../../../services/toasterService";
import { callApi } from "../../../services/apiService";
import { ApiConstants } from "../../../config/apiConstants";
import Spinner from "../../../components/Spinner";

import logo from "../../../assets/svgs/logo.svg";

const SignIn = ({ history }) => {
  const [showLoader, setShowLoader] = useState(false);
  const [isSubmitted, setIsSubmitted] = useState(false);

  const onSubmit = (values) => {
    setShowLoader(true);
    let params = {
      email: values.email,
      password: values.password,
    };
    callApi("post", ApiConstants.auth.employeelogin, params)
      .then((response) => {
        let redirectRoute = "";
        if (response && response.status_code === 200) {
          setShowLoader(false);
          let userObj = response.payload;
          sessionStorage.setItem("auth", true);
          sessionStorage.setItem("user", JSON.stringify(response.payload));
          localStorage.setItem("auth", true);
          localStorage.setItem("user", JSON.stringify(response.payload));
          switch (userObj.user_role_id) {
            case 1:
              redirectRoute = "/admin/dashboard";
              break;
            case 2:
              redirectRoute = "/admin/dashboard";
              break;
            case 3:
              redirectRoute = "/checker/dashboard";
              break;
            case 4:
              redirectRoute = "/validator/dashboard";
              break;
          }
          history.push(redirectRoute);
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

  let SignInSchema = Yup.object().shape({
    email: Yup.string()
      .required("Please enter Email ")
      .email("Please enter a valid Email"),
    password: Yup.string().required("Please enter Password"),
  });

  return (
    <React.Fragment>
      {showLoader && <Spinner />}
      <div className="auth-content">
        <div className="text-center mb-4 text-white">
          <h4 className="text-white">Employee Login</h4>
          <div className="mt-3">Sign in to your account to continue</div>
        </div>
        <div className="card rounded">
          <div className="card-body">
            <div className="mb-3 text-center">
              <Link to="/home">
                <img src={logo} alt="Logo" style={{ height: 70 }} />
              </Link>
            </div>

            <Formik
              initialValues={{
                email: "",
                password: "",
              }}
              validationSchema={SignInSchema}
              onSubmit={(values) => onSubmit(values)}>
              {({ errors }) => (
                <Form>
                  <h5 className="mb-3" style={{ color: "#096DA9" }}>
                    Sign in
                  </h5>
                  <div className="input-group mb-3">
                    <Field
                      type="text"
                      className={`form-control ${errors.email && isSubmitted ? "is-invalid" : ""
                        }`}
                      placeholder="Email"
                      name="email"
                      tabIndex={1}
                    />
                    <ErrorMessage name="email">
                      {(msg) => <div className="invalid-feedback">{msg}</div>}
                    </ErrorMessage>
                  </div>
                  <div className="input-group mb-3">
                    <Field
                      type="password"
                      className={`form-control ${errors.password && isSubmitted ? "is-invalid" : ""
                        }`}
                      placeholder="Password"
                      name="password"
                      tabIndex={1}
                    />
                    <ErrorMessage name="password">
                      {(msg) => <div className="invalid-feedback">{msg}</div>}
                    </ErrorMessage>
                  </div>
                  <p className="mb-4">
                    <NavLink
                      style={{ color: "#096DA9", fontSize: 13 }}
                      to="/forgot-password">
                      Forgot password?
                    </NavLink>
                  </p>
                  <div className="form-group">
                    <div className="checkbox d-flex p-0">
                      <input
                        type="checkbox"
                        name="checkbox-fill-1"
                        id="checkbox-fill-a1"
                      />
                      <label htmlFor="checkbox-fill-a1" className="cr">
                        Remember me next time
                      </label>
                    </div>
                  </div>
                  <div className="form-group text-center">
                    <button
                      type="submit"
                      style={{ width: 180, fontWeight: "bold" }}
                      className="btn btn-primary shadow-2 my-3"
                      onClick={() => setIsSubmitted(true)}>
                      Sign In
                    </button>
                  </div>
                </Form>
              )}
            </Formik>
          </div>
        </div>
      </div>
    </React.Fragment>
  );
};

export default SignIn;
