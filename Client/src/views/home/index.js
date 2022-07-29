import React, { useState, useEffect } from "react";
import { Link } from "react-router-dom";
import { Modal } from "react-bootstrap";

import logo from "../../assets/images/logo.png";
// import icon1 from "../../assets/images/icons/icon1.png";
// import icon2 from "../../assets/images/icons/icon2.png";
// import icon3 from "../../assets/images/icons/icon3.png";

import SignIn from "../signin/client/SignIn";
import SignUp from "../signup/SignUp";
import Spinner from "../../components/Spinner";

import "./assets/css/style.scss";

const Home = (props) => {
	const [showLoader, setShowLoader] = useState(false);
	const [showSignInModal, setSignInModal] = useState(false);
	const [showSignUpModal, setSignUpModal] = useState(false);
	const [isAuth, setisAuth] = useState(false);

	useEffect(() => {
		if (JSON.parse(localStorage.getItem("auth"))) {
			setisAuth(true);
		}
	}, []);

	const openSignIn = (e) => {
		if (e) e.preventDefault();
		setSignInModal(true);
	};

	const openSignUp = (e) => {
		if (e) e.preventDefault();
		setSignUpModal(true);
	};

	return (
		<React.Fragment>
			{showLoader && <Spinner />}
			<div className="wrapper">
				<div className="home-navbar">
					<nav className="navbar navbar-expand-lg navbar-light navbar-default navbar-fixed-top past-main" role="navigation">
						<div className="container">
							<Link className="navbar-brand page-scroll bg-transparent" to="/home">
								<img src={logo} alt="Logo" style={{ height: 38 }} />
							</Link>

							<div className="" id="navbarSupportedContent">
								<ul className="navbar-nav mr-auto" />
								<ul className="navbar-nav my-2 my-lg-0">
									<li className="nav-item active">
										<Link className="nav-link page-scroll" to="/home">
											Home
										</Link>
									</li>
									{!isAuth && (
										<li className="nav-item">
											<a className="nav-link page-scroll" href="/home" onClick={openSignIn}>
												Login
											</a>
										</li>
									)}
									{isAuth && (
										<li className="nav-item">
											<Link className="nav-link page-scroll" to="/dashboard">
												Dashboard
											</Link>
										</li>
									)}
								</ul>
							</div>
						</div>
					</nav>
					<div className="main" id="main">
						<div className="hero-section app-hero">
							<div className="container">
								<div className="hero-content app-hero-content text-center">
									<div className="row justify-content-md-center">
										<div className="col-md-10">
											<h1 className="wow fadeInUp" data-wow-delay="0s">
												{/* <span style={{ color: "#246da9" }}>
                          VAT<span style={{ color: "#5aaf3b" }}>Z</span>APP
                        </span> */}
												A complete online VAT solution
											</h1>
											<p className="wow fadeInUp" data-wow-delay="0.2s">
												Your VAT figures are now available on your smart phone screens.
											</p>
											<Link to="/employee/signin">
												<button className="btn btn-primary mr-3" data-wow-delay="0.2s">
													Employee Login
												</button>
											</Link>
											<button className="btn btn-secondary" onClick={openSignIn} data-wow-delay="0.2s">
												Login
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						{/* <div className="services-section text-center mt-5" id="services">
              <div className="container">
                <div className="row  justify-content-md-center">
                  <div className="col-md-12 text-center">
                    <div className="services">
                      <div className="row">
                        <div
                          className="col-sm-4 wow fadeInUp"
                          data-wow-delay="0.2s">
                          <div className="services-icon">
                            <img
                              src={icon1}
                              height="60"
                              width="60"
                              alt="Service"
                            />
                          </div>
                          <div className="services-description">
                            <h1>Checker</h1>
                            <p>
                              Sed ut perspiciatis unde omnis iste natus error
                              sit voluptatem accusantium doloremque laudantium,
                              totam rem aperiam, eaque ipsa quae ab illo
                              inventore veritatis.
                            </p>
                          </div>
                        </div>
                        <div
                          className="col-sm-4 wow fadeInUp"
                          data-wow-delay="0.3s">
                          <div className="services-icon">
                            <img
                              className="icon-2"
                              src={icon2}
                              height="60"
                              width="60"
                              alt="Service"
                            />
                          </div>
                          <div className="services-description">
                            <h1>Validator</h1>
                            <p>
                              Nemo enim ipsam voluptatem quia voluptas sit
                              aspernatur aut odit aut fugit, sed quia
                              consequuntur magni dolores eos qui ratione
                              voluptatem sequi nesciunt.
                            </p>
                          </div>
                        </div>
                        <div
                          className="col-sm-4 wow fadeInUp"
                          data-wow-delay="0.4s">
                          <div className="services-icon">
                            <img
                              className="icon-3"
                              src={icon3}
                              height="60"
                              width="60"
                              alt="Service"
                            />
                          </div>
                          <div className="services-description">
                            <h1>Administrator</h1>
                            <p>
                              Ut enim ad minima veniam, quis nostrum
                              exercitationem ullam corporis suscipit laboriosam,
                              nisi ut aliquid ex ea commodi consequatur.
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> */}
						{/* <div className="footer py-3">
              <div className="container">
                <div className="col-md-12 text-center">
                  <div className="footer-text">
                    <p className="m-0">
                      Copyright © 2021 VatzApp. All Rights Reserved.
                    </p>
                  </div>
                </div>
              </div>
            </div> */}
					</div>
				</div>
			</div>

			<Modal show={showSignInModal} backdrop="static" keyboard={true} onHide={() => setSignInModal(false)}>
				<Modal.Body className="p-0">
					<button type="button" className="btn-icon btn close-btn" onClick={() => setSignInModal(false)}>
						<i className="feather icon-x-circle"></i>
					</button>
					<SignIn close={setSignInModal} openSignup={openSignUp} {...props} />
				</Modal.Body>
			</Modal>

			<Modal size="lg" show={showSignUpModal} backdrop="static" keyboard={true} onHide={() => setSignUpModal(false)}>
				<Modal.Body className="p-0">
					<button type="button" className="btn-icon btn close-btn" onClick={() => setSignUpModal(false)}>
						<i className="feather icon-x-circle"></i>
					</button>
					<SignUp close={setSignUpModal} onShowLoader={setShowLoader} openSignin={openSignIn} {...props} />
				</Modal.Body>
			</Modal>
		</React.Fragment>
	);
};

export default Home;
