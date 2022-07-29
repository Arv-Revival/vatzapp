import React, { useContext, useState, useEffect } from "react";
import { useHistory } from "react-router-dom";
import { ListGroup, Dropdown, Media, OverlayTrigger, Popover, Button, Badge } from "react-bootstrap";
import { Link } from "react-router-dom";
// import PerfectScrollbar from "react-perfect-scrollbar";
import axios from "axios";
import ChatList from "./ChatList";
import moment from "moment";
import { ConfigContext } from "../../../../contexts/ConfigContext";
import { userRolesList } from "../../../../enums/UserRoles";
import { callApi } from "../../../../services/apiService";

import { showNotification } from "../../../../services/toasterService";
// import avatar1 from "../../../../assets/images/user/avatar-1.jpg";
import avatar2 from "../../../../assets/images/user/avatar-2.jpg";
// import avatar3 from "../../../../assets/images/user/avatar-3.jpg";
// import avatar4 from "../../../../assets/images/user/avatar-4.jpg";

import { CONFIG } from "../../../../config/constant";
import { ApiConstants } from "../../../../config/apiConstants";

const NavRight = () => {
	const configContext = useContext(ConfigContext);
	const { rtlLayout } = configContext.state;

	const [listOpen, setListOpen] = useState(false);
	const [userName, setuserName] = useState("");
	const [userSubscriptionExpiry, setuserSubscriptionExpiry] = useState({});
	const [userRole, setuserRole] = useState("");
	const [userImg, setuserImg] = useState("");
	const userObj = React.useRef(JSON.parse(localStorage.getItem("user")));
	let history = useHistory();

	const getData = React.useCallback(() => {
		let isApiMounted = true;
		setuserName(userObj.current?.user_name);
		setuserImg(userObj.current?.profile_image?.file_path);
		setuserRole(userRolesList.find((i) => i.id === userObj.current.user_role_id).value);

		if (userObj?.current?.token && userObj?.current?.user_role_id === 5) {
			callApi("get", ApiConstants.client.getclient, null, true)
				.then((response) => {
					if (isApiMounted && response && response.status_code === 200) {
						// console.log(new Date(new Date(response.payload?.to).getTime()).setHours(12, 50, 0, 0));
						// console.log(new Date(new Date().getTime()).setHours(12, 50, 0, 0));
						setuserSubscriptionExpiry({ status: "Subscription Expired", color: "danger" });
						if (new Date(new Date(response.payload?.to).getTime()).setHours(12, 50, 0, 0) === new Date(new Date().setHours(12, 50, 0, 0)).getTime()) {
							setuserSubscriptionExpiry({ status: "Subscription Expiring Today", color: "warning" });
						} else if (new Date(new Date(response.payload?.to).getTime()).setHours(12, 50, 0, 0) > new Date(new Date().setHours(12, 50, 0, 0)).getTime()) {
							setuserSubscriptionExpiry({
								status: `Subscription Expiring on ${moment(response.payload?.to).format("DD-MMM-YYYY")}`,
								color: "success",
							});
						}
					} else {
						showNotification("Error", response.message, "error");
					}
				})
				.catch((error) => {
					showNotification("Error", "Something went wrong", "error");
				});
		}
		return () => {
			isApiMounted = false;
		};
	}, []);

	useEffect(() => {
		getData();
	}, []);

	const logout = () => {
		sessionStorage.removeItem("auth");
		sessionStorage.removeItem("user");
	};

	const handleLogout = async () => {
		try {
			//handleClose();
			logout();
			history.push("/home");
		} catch (err) {
			console.error(err);
		}
	};
	return (
		<React.Fragment>
			<ListGroup as="ul" bsPrefix=" " className="navbar-nav ml-auto" id="navbar-right">
				{userRole === "Client" && (
					<>
						<ListGroup.Item as="li" bsPrefix=" ">
							<Badge variant={userSubscriptionExpiry.color}>{userSubscriptionExpiry.status}</Badge>
							{/* <OverlayTrigger trigger="click" placement="bottom" overlay={popover}>
								<i className="icon feather icon-bell" />
							</OverlayTrigger> */}
						</ListGroup.Item>
					</>
				)}
				<ListGroup.Item as="li" bsPrefix=" ">
					<Dropdown>
						<Dropdown.Toggle as={Link} variant="link" to="#" className="displayChatbox" onClick={() => setListOpen(true)}>
							<i className="icon feather icon-mail" />
						</Dropdown.Toggle>
					</Dropdown>
				</ListGroup.Item>
				<ListGroup.Item as="li" bsPrefix=" ">
					<Dropdown alignRight={!rtlLayout} className="drp-user">
						<Dropdown.Toggle as={Link} variant="link" to="#" id="dropdown-basic">
							<div className="pro-head header-avtr">
								<div style={{ lineHeight: "normal", marginRight: 10 }}>
									<div>{userName}</div>
									<div className="avtr-user-role">{userRole}</div>
								</div>
								<div className="profile-avatr" style={{ width: 40, height: 40 }}>
									{userImg ? <img src={CONFIG.API_BASE_URL + ApiConstants.file.view + "?file_name=" + userImg} className="display_pic" alt="User Profile" style={{ width: 40, height: 40 }} /> : <img src={avatar2} className="display_pic" alt="User Profile" />}
								</div>
							</div>
						</Dropdown.Toggle>
						<Dropdown.Menu alignRight className="profile-notification">
							<ListGroup as="ul" bsPrefix=" " variant="flush" className="pro-body">
								<ListGroup.Item as="li" bsPrefix=" ">
									<Link to="/profile" className="dropdown-item">
										<i className="feather icon-user" /> Profile
									</Link>
								</ListGroup.Item>
								<ListGroup.Item as="li" bsPrefix=" ">
									<Link to="/change-password" className="dropdown-item">
										<i className="feather icon-settings" /> Change Password
									</Link>
								</ListGroup.Item>
								<ListGroup.Item as="li" bsPrefix=" ">
									<Link to="#" className="dropdown-item" onClick={handleLogout}>
										<i className="feather icon-log-out" /> Logout
									</Link>
								</ListGroup.Item>
							</ListGroup>
						</Dropdown.Menu>
					</Dropdown>
				</ListGroup.Item>
			</ListGroup>
			<ChatList listOpen={listOpen} closed={() => setListOpen(false)} />
		</React.Fragment>
	);
};

export default NavRight;
