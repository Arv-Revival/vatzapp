import React from "react";
import { Media } from "react-bootstrap";
import { Link } from "react-router-dom";

import { CONFIG } from "../../../../../../../config/constant";
import { ApiConstants } from "../../../../../../../config/apiConstants";
import avatar2 from "../../../../../../../assets/images/user/avatar-2.jpg";

const Friend = ({ data, activeId, clicked }) => {
  let photo = data.photo
    ? CONFIG.API_BASE_URL + ApiConstants.file.view + "?file_name=" + data.photo
    : avatar2;
  let timeClass = ["d-block"];
  if (data.status) {
    timeClass = [...timeClass, "text-c-green"];
  } else {
    timeClass = [...timeClass, "text-muted"];
  }

  let time = "";
  if (data.time) {
    time = <small className={timeClass.join(" ")}>{data.time}</small>;
  }

  let newFriend = "";
  if (data.new) {
    newFriend = <div className="live-status">{data.new}</div>;
  }

  return (
    <React.Fragment>
      <Media
        className={
          activeId === data.id ? "userlist-box active" : "userlist-box"
        }
        onClick={clicked}>
        <Link to="#" className="media-left">
          <img
            className="media-object img-radius"
            src={photo}
            alt={data.name}
          />
          {newFriend}
        </Link>
        <Media.Body>
          <h6 className="chat-header">
            {data.name}
            {time}
          </h6>
        </Media.Body>
      </Media>
    </React.Fragment>
  );
};

export default Friend;
