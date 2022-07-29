import React from "react";

import Loader from "../../assets/svgs/loader.svg";
const Spinner = () => {
  const styles = {
    container: {
      position: "fixed",
      width: "100vw",
      height: "100vh",
      left: 0,
      top: 0,
      display: "flex",
      justifyContent: "center",
      alignItems: "center",
      zIndex: 9999,
      background: "rgba(0,0,0, 0.3)",
    },
    loaderImg: {
      width: "12%",
      minWidth: 180,
    },
  };

  return (
    <React.Fragment>
      <div style={styles.container}>
        <img src={Loader} style={styles.loaderImg} alt="Loading..." />
      </div>
    </React.Fragment>
  );
};

export default Spinner;
