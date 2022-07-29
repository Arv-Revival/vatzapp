import React, {
  useState,
  useEffect,
  useRef,
  forwardRef,
  useImperativeHandle,
} from "react";
import { Media, FormControl, Button, InputGroup } from "react-bootstrap";
import { Link } from "react-router-dom";
import PerfectScrollbar from "react-perfect-scrollbar";
import moment from "moment";

import { callApi } from "../../../../../../../services/apiService";
import { ApiConstants } from "../../../../../../../config/apiConstants";
import { showNotification } from "../../../../../../../services/toasterService";
import { CONFIG } from "../../../../../../../config/constant";
import avatar2 from "../../../../../../../assets/images/user/avatar-2.jpg";
import Messages from "./Messages";
// import chatMsg from "./chat";

const Chat = ({ user, chatOpen, listOpen, closed }) => {
  const [chatMsg, setchatMsg] = useState([]);
  const [showLoader, setshowLoader] = useState(false);
  const [showProgress, setshowProgress] = useState(false);
  const chatTextBox = useRef();
  const messagesEndRef = useRef();
  let chatClass = ["header-chat"];
  if (chatOpen && listOpen) {
    chatClass = [...chatClass, "open"];
  }

  useEffect(() => {
    if (user && user.id) {
      getMessage();
    }
  }, [user]);

  const getMessage = () => {
    setshowLoader(true);
    setshowProgress(true);
    callApi(
      "post",
      ApiConstants.message.getmessages,
      { from_user_id: user.id },
      true
    )
      .then((response) => {
        setshowLoader(false);
        setshowProgress(false);
        if (response && response.status_code === 200) {
          setchatMsg(formatList(response.payload));
        } else {
          showNotification("Error", response.message, "error");
        }
      })
      .catch((error) => {
        setshowLoader(false);
        setshowProgress(false);
        showNotification("Error", "Something went wrong", "error");
      });
  };

  const formatList = (msgs) => {
    if (!msgs.length) return [];
    let formattedMsgs = {
      friend_id: user.id,
      friend_photo: user.photo
        ? CONFIG.API_BASE_URL +
          ApiConstants.file.view +
          "?file_name=" +
          user.photo
        : avatar2,
      messages: msgs.map((msg) => {
        return {
          ...msg,
          type: msg.sender_id === user.id ? 1 : 0,
          msg: msg.message,
          time: moment(msg.created_at).format("h:mm a"),
        };
      }),
    };
    return [formattedMsgs];
  };

  const sendMessage = () => {
    setshowProgress(true);
    if (!chatTextBox.current.value) return;
    messagesEndRef.current.refreshScroll();
    let params = {
      to_user_id: user.id,
      message: chatTextBox.current.value,
    };
    callApi("post", ApiConstants.message.sendmessage, params, true)
      .then((response) => {
        setshowProgress(false);
        if (response && response.status_code === 200) {
          getMessage();
        } else {
          showNotification("Error", response.message, "error");
        }
      })
      .catch((error) => {
        setshowProgress(false);
        showNotification("Error", "Something went wrong", "error");
      });
    chatTextBox.current.value = "";
  };

  const onEnterPress = (target) => {
    if (target.charCode == 13) {
      sendMessage();
    }
  };

  let message = (
    <Media className="chat-messages text-center">
      {!showLoader && (
        <Media.Body className="chat-menu-content">
          <div className="">
            <p className="chat-cont">START CONVERSATION</p>
          </div>
        </Media.Body>
      )}
      {showLoader && (
        <Media.Body className="chat-menu-content">
          <div className="">
            <p className="chat-cont">LOADING...</p>
          </div>
        </Media.Body>
      )}
    </Media>
  );

  chatMsg.filter((chats) => {
    if (chats.friend_id === user.id) {
      message = chats.messages.map((msg, index) => {
        return (
          <Messages
            key={index}
            message={msg}
            name={user.name}
            photo={chats.friend_photo}
          />
        );
      });
    }
    return false;
  });

  return (
    <React.Fragment>
      <div className={chatClass.join(" ")}>
        <div className="h-list-header d-flex justify-content-between">
          <Link to="#" className="h-back-user-list" onClick={closed}>
            <i className="feather icon-chevron-left" />
          </Link>
          <h6>{user.name}</h6>
          <Link to="#" className="" onClick={getMessage}>
            <i className="feather icon-refresh-cw text-primary" />
          </Link>
        </div>
        <div className="h-list-body">
          <div className="main-chat-cont">
            <PerfectScrollbar>
              <div className="main-friend-chat">
                {message}
                <AlwaysScrollToBottom ref={messagesEndRef} />
              </div>
            </PerfectScrollbar>
          </div>
        </div>

        <div className="h-list-footer">
          {showProgress && (
            <div className="mb-4 progress" style={{ height: 8 }}>
              <div
                role="progressbar"
                className="progress-bar progress-bar-animated progress-bar-striped"
                style={{ width: "100%" }}></div>
            </div>
          )}

          <InputGroup>
            <FormControl
              type="text"
              name="h-chat-text"
              className="h-send-chat"
              placeholder="Type hear ... "
              ref={chatTextBox}
              autoComplete="off"
              onKeyPress={onEnterPress}
            />
            <Button
              type="button"
              className="input-group-append btn-send"
              onClick={sendMessage}>
              <i className="feather icon-message-circle" />
            </Button>
          </InputGroup>
        </div>
      </div>
    </React.Fragment>
  );
};

const AlwaysScrollToBottom = forwardRef((props, ref) => {
  const elementRef = useRef();
  useEffect(() => scrollToBottom());
  const scrollToBottom = () => {
    elementRef.current.scrollIntoView();
  };
  useImperativeHandle(ref, () => ({
    refreshScroll() {
      scrollToBottom();
    },
  }));
  return <div ref={elementRef} />;
});

export default Chat;
