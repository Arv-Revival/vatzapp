import React, {useState} from "react";
import {NavLink, Link} from "react-router-dom";
import {Formik, Field, Form, ErrorMessage} from "formik";
import * as Yup from "yup";

import {showNotification} from "../../services/toasterService";
import {callApi} from "../../services/apiService";
import {ApiConstants} from "../../config/apiConstants";
import Spinner from "../../components/Spinner";

import logo from "../../assets/svgs/logo.svg";

const SignIn = ({history}) => {
	const [showLoader, setShowLoader] = useState(false);
	const [isSubmitted, setIsSubmitted] = useState(false);

	const onSubmit = (values) => {
		setShowLoader(true);
		callApi("get", ApiConstants.auth.forgotpassword, {email: values.email})
			.then((response) => {
				if (response && response.status_code === 200) {
					setShowLoader(false);
					showNotification("Success", response.message, "success");
					history.goBack();
				} else {
					setShowLoader(false);
					showNotification("Error", response.message, "error");
				}
			})
			.catch((error) => {
				history.goBack();
				setShowLoader(false);
				console.log(error.response);
				showNotification("Error", "Something went wrong", "error");
			});
	};
	let ForgotSchema = Yup.object().shape({
		email: Yup.string().required("Please enter Email ").email("Please enter a valid Email"),
	});

	return (
		<React.Fragment>
			{showLoader && <Spinner />}
			<div className="auth-content">
				<div className="text-center mb-4 text-white">
					<h4 className="text-white">Forgot Password?</h4>
				</div>
				<div className="card rounded">
					<div className="card-body">
						<div className="mb-3 text-center">
							<Link to="/home">
								<img src={logo} alt="Logo" style={{height: 70}} />
							</Link>
						</div>
						<Formik initialValues={{email: ""}} validationSchema={ForgotSchema} onSubmit={(values) => onSubmit(values)}>
							{({errors}) => (
								<Form>
									<label>Email</label>
									<div className="input-group mb-3">
										<Field type="text" className={`form-control ${errors.email && isSubmitted ? "is-invalid" : ""}`} placeholder="Email" name="email" tabIndex={1} />
										<ErrorMessage name="email">{(msg) => <div className="invalid-feedback">{msg}</div>}</ErrorMessage>
									</div>
									<div className="form-group text-center">
										<button type="submit" style={{width: 180, fontWeight: "bold"}} className="btn btn-primary shadow-2 my-3" onClick={() => setIsSubmitted(true)}>
											Submit
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
