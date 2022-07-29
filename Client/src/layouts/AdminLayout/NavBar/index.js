import React, {useContext} from "react";
import {Link} from "react-router-dom";
// import NavLeft from "./NavLeft";
import NavRight from "./NavRight";
import {ConfigContext} from "../../../contexts/ConfigContext";
import * as actionType from "../../../store/actions";
import logo from "../../../assets/images/logo-title.png";
import vatzlogo from "../../../assets/images/vatzapp-logo.png";

const NavBar = () => {
	const configContext = useContext(ConfigContext);
	const {collapseMenu, headerBackColor, headerFixedLayout, layout, subLayout} = configContext.state;
	const {dispatch} = configContext;

	let headerClass = ["navbar", "pcoded-header", "navbar-expand-lg", headerBackColor];
	if (headerFixedLayout && layout === "vertical") {
		headerClass = [...headerClass, "headerpos-fixed"];
	}

	let toggleClass = ["mobile-menu"];
	if (collapseMenu) {
		toggleClass = [...toggleClass, "on"];
	}

	const navToggleHandler = (event) => {
		event.stopPropagation();
		dispatch({type: actionType.COLLAPSE_MENU});
	};

	let collapseClass = ["collapse navbar-collapse"];

	let navBar = (
		<React.Fragment>
			<div className="m-header">
				<Link to="#" className={toggleClass.join(" ")} id="mobile-collapse" onClick={navToggleHandler}>
					<span />
				</Link>
				<Link to="#" className="b-brand">
					<div
						className="b-bg"
						style={{
							background: `url(${vatzlogo})`,
							backgroundSize: "cover",
							backgroundRepeat: "no-repeat",
						}}></div>
					<span className="b-title">
						<img src={logo} alt="Logo" style={{height: 22, marginTop: 14}} />
					</span>
				</Link>
			</div>
			<div className={collapseClass.join(" ")}>
				{/* <NavLeft /> */}
				<NavRight />
			</div>
		</React.Fragment>
	);

	if (layout === "horizontal" && subLayout === "horizontal-2") {
		navBar = <div className="container">{navBar}</div>;
	}

	return (
		<React.Fragment>
			<header className={headerClass.join(" ")}>{navBar}</header>
		</React.Fragment>
	);
};

export default NavBar;
