import React, { useContext, useEffect, useState } from "react";
import { Link } from "react-router-dom";

import { ConfigContext } from "../../../../contexts/ConfigContext";
import * as actionType from "../../../../store/actions";

import logo from "../../../../assets/images/logo-title.png";
import vatzlogo from "../../../../assets/images/vatzapp-logo.png";
import { userRoles } from "../../../../enums/UserRoles";

const NavLogo = () => {
  const configContext = useContext(ConfigContext);
  const { collapseMenu } = configContext.state;
  const { dispatch } = configContext;
  const [userRole, setuserRole] = useState(0);

  useEffect(() => {
    let userObj = JSON.parse(localStorage.getItem("user"));
    setuserRole(userObj.user_role_id);
  }, []);

  let toggleClass = ["mobile-menu"];
  if (collapseMenu) {
    toggleClass = [...toggleClass, "on"];
  }

  const getDefaultRoute = () => {
    let route = "";
    switch (userRole) {
      case userRoles.Client:
        route = "/dashboard";
        break;
      case userRoles.Checker:
        route = "checker/dashboard";
        break;
      case userRoles.Validator:
        route = "validator/dashboard";
        break;
      case userRoles.Administrator:
        route = "admin/dashboard";
        break;
      case userRoles.SuperAdmin:
        route = "admin/dashboard";
        break;
    }
    return route;
  };

  return (
    <React.Fragment>
      <div className="navbar-brand header-logo">
        <Link to={getDefaultRoute()} className="b-brand">
          <div
            className="b-bg"
            style={{
              background: `url(${vatzlogo})`,
              backgroundSize: "cover",
              backgroundRepeat: "no-repeat",
            }}></div>
          <span className="b-title">
            <img src={logo} alt="Logo" style={{ height: 22, marginTop: 14 }} />
          </span>
        </Link>
        <Link
          to="#"
          className={toggleClass.join(" ")}
          id="mobile-collapse"
          onClick={() => dispatch({ type: actionType.COLLAPSE_MENU })}>
          <span />
        </Link>
      </div>
    </React.Fragment>
  );
};

export default NavLogo;
