import React from "react";

import bg from "../../assets/images/bg-images/login-bg.png";

const BoxLayout = ({ children }) => {
  return (
    <React.Fragment>
      <div
        className="auth-wrapper aut-bg-img"
        style={{
          backgroundImage: `url(${bg})`,
          backgroundSize: "cover",
          backgroundAttachment: "fixed",
          backgroundPosition: "center",
        }}>
        {children}
      </div>
    </React.Fragment>
  );
};

export default BoxLayout;
