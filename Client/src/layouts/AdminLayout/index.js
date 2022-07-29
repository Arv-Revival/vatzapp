import React, { useContext, useEffect, useRef } from "react";

import Navigation from "./Navigation";
import NavBar from "./NavBar";
import Breadcrumb from "./Breadcrumb";

import useWindowSize from "../../hooks/useWindowSize";
import useOutsideClick from "../../hooks/useOutsideClick";
import { ConfigContext } from "../../contexts/ConfigContext";
import * as actionType from "../../store/actions";
import BottomNav from "./BottomNav";
const AdminLayout = ({ children }) => {
  const windowSize = useWindowSize();
  const ref = useRef();
  const user_role_id = useRef();
  const configContext = useContext(ConfigContext);

  const { collapseMenu, layout, subLayout, headerFixedLayout } = configContext.state;
  const { dispatch } = configContext;

  useOutsideClick(ref, () => {
    if (collapseMenu) {
      dispatch({ type: actionType.COLLAPSE_MENU });
    }
  });

  useEffect(() => {
    let data = JSON.parse(sessionStorage.user);
    user_role_id.current = data?.user_role_id;

    if (windowSize.width > 992 && windowSize.width <= 1024 && layout !== "horizontal") {
      dispatch({ type: actionType.COLLAPSE_MENU });
    }

    if (layout === "horizontal" && windowSize.width < 992) {
      dispatch({ type: actionType.CHANGE_LAYOUT, layout: "vertical" });
    }
  }, [dispatch, layout, windowSize]);

  const mobileOutClickHandler = () => {
    if (windowSize.width < 992 && collapseMenu) {
      dispatch({ type: actionType.COLLAPSE_MENU });
    }
  };

  let mainClass = ["pcoded-wrapper"];
  if (layout === "horizontal" && subLayout === "horizontal-2") {
    mainClass = [...mainClass, "container"];
  }

  let common = (
    <React.Fragment>
      <Navigation />
    </React.Fragment>
  );

  let mainContainer = (
    <React.Fragment>
      <NavBar />
      <div className={`pcoded-main-container ${windowSize.width < 992 ? "mb-4" : "mb-1"}`}>
        <div className={mainClass.join(" ")}>
          <div className="pcoded-content">
            <div className="pcoded-inner-content">
              <Breadcrumb />
              {children}
            </div>
          </div>
        </div>
      </div>
    </React.Fragment>
  );

  let bottomNavContainer = (
    <React.Fragment>
      <BottomNav />
    </React.Fragment>
  );

  if (windowSize.width < 992) {
    let outSideClass = ["nav-outside"];
    if (collapseMenu) {
      outSideClass = [...outSideClass, "mob-backdrop"];
    }
    if (headerFixedLayout) {
      outSideClass = [...outSideClass, "mob-fixed"];
    }

    common = (
      <div className={outSideClass.join(" ")} ref={ref}>
        {common}
      </div>
    );

    mainContainer = (
      <div className="pcoded-outside" onClick={() => mobileOutClickHandler}>
        {mainContainer}
        {/* {bottomNavContainer} */}
        {/* {windowSize.width < 992 && <BottomNav />} */}
        {user_role_id.current === 5 && windowSize.width < 992 && bottomNavContainer}
      </div>
    );
  }

  return (
    <React.Fragment>
      {common}
      {mainContainer}
    </React.Fragment>
  );
};

export default AdminLayout;
