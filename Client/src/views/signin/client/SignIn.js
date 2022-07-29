import React, { useState } from "react";
import { NavLink, Link } from "react-router-dom";
import { Formik, Field, Form, ErrorMessage } from "formik";
import * as Yup from "yup";

import { callApi } from "../../../services/apiService";
import { ApiConstants } from "../../../config/apiConstants";
import Spinner from "../../../components/Spinner";
import { showNotification } from "../../../services/toasterService";

import logo from "../../../assets/svgs/logo.svg";

const SignIn = ({ history, close, openSignup }) => {
  const [showLoader, setShowLoader] = useState(false);
  const [isSubmitted, setIsSubmitted] = useState(false);

  const onSubmit = (values) => {
    setShowLoader(true);
    let params = {
      email: values.email,
      password: values.password,
    };
    callApi("post", ApiConstants.auth.login, params)
      .then((response) => {
        setShowLoader(false);
        if (response && response.status_code === 200) {
          sessionStorage.setItem("auth", true);
          sessionStorage.setItem("user", JSON.stringify(response.payload));
          localStorage.setItem("auth", true);
          localStorage.setItem("user", JSON.stringify(response.payload));
          history.push("/dashboard");
        } else if (response && response.status_code === 403) {
          resendMail(values.email);
          showNotification("Warning", response.message, "warning");
        } else {
          showNotification("Error", response.message, "error");
        }
      })
      .catch((error) => {
        setShowLoader(false);
        showNotification("Error", "Something went wrong", "error");
      });
  };

  const resendMail = (email) => {
    setShowLoader(true);
    callApi("get", ApiConstants.auth.sendemailverification, { email }, false)
      .then((response) => {
        setShowLoader(false);
        if (response && response.status_code === 200) {
          // showNotification("Success", response.message, "success");
        } else {
          showNotification("Error", response.message, "error");
        }
      })
      .catch((error) => {
        setShowLoader(false);
        showNotification("Error", "Something went wrong", "error");
      });
  };

  const onSignUpClick = (e) => {
    if (e) e.preventDefault();
    close();
    openSignup(e);
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
      <div className="auth-wrapper aut-bg-img" style={{ minHeight: "100%" }}>
        <div className="auth-content">
          <div className="text-center my-3">
            <h4 className="">Welcome back</h4>
            <div className="mt-3">Sign in to your account to continue</div>
          </div>
          <div className="card shadow-none">
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
                    <hr />
                    <p className="mb-0 text-muted">
                      Don’t have an account?
                      <a
                        style={{ color: "#096DA9", fontSize: 13 }}
                        className="ml-2"
                        href="/home"
                        onClick={onSignUpClick}>
                        Sign up
                      </a>
                    </p>
                  </Form>
                )}
              </Formik>
            </div>
          </div>
        </div>
      </div>
    </React.Fragment>
  );
};

export default SignIn;
