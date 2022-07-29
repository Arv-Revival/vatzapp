import React from "react";
import { Redirect } from "react-router-dom";

const AuthGuard = ({ children, permissions }) => {
  const isLoggedIn = () => {
    let isAuth = JSON.parse(localStorage.getItem("auth"));
    let isLoggedin = isAuth ? true : false;
    return isLoggedin;
  };

  if (!isLoggedIn()) {
    return <Redirect to="/home" />;
  }
  let userData = JSON.parse(localStorage.getItem("user"));
  if (permissions && permissions.length) {
    if (permissions.includes(userData.user_role_id))
      return <React.Fragment>{children}</React.Fragment>;
    else return <Redirect to="/access-denied" />;
  } else {
    return <React.Fragment>{children}</React.Fragment>;
  }
};

export default AuthGuard;
