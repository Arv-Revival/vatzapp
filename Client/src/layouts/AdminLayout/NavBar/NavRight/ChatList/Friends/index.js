import React, {
  useState,
  useEffect,
  useRef,
  forwardRef,
  useImperativeHandle,
} from "react";
import moment from "moment";

// import friend from './friends';
import Friend from "./Friend";
import Chat from "./Chat";
import { callApi } from "../../../../../../services/apiService";
import { ApiConstants } from "../../../../../../config/apiConstants";
import { showNotification } from "../../../../../../services/toasterService";

const Friends = forwardRef(({ listOpen, searchKey }, ref) => {
  const [chatOpen, setChatOpen] = useState(listOpen);
  const [friend, setfriendList] = useState([]);
  const [friendFullList, setfriendFullList] = useState([]);
  const [user, setUser] = useState([]);

  useEffect(() => {
    getContacts();
  }, []);

  useEffect(() => {
    setChatOpen(false);
  }, [listOpen]);

  useEffect(() => {
    if (searchKey) {
      let filteredList = friendFullList.filter((i) =>
        i.name.toUpperCase().includes(searchKey.toUpperCase())
      );
      setfriendList(filteredList);
    } else {
      setfriendList(friendFullList);
    }
  }, [searchKey]);

  useImperativeHandle(ref, () => ({
    refreshList() {
      getContacts();
    },
  }));

  const getContacts = () => {
    callApi("post", ApiConstants.message.contacts, null, true)
      .then((response) => {
        if (response && response.status_code === 200) {
          let formatedList = formatList(response.payload);
          setfriendList(formatedList);
          setfriendFullList(formatedList);
        } else {
          showNotification("Error", response.message, "error");
        }
      })
      .catch((error) => {
        showNotification("Error", "Something went wrong", "error");
      });
  };

  const formatList = (users) => {
    let formattedUsers = users.map((user) => {
      return {
        ...user,
        photo: user.file_path,
        new: user.unread_msg_count,
        // time: moment().startOf("day").fromNow(),
        time: user.email,
      };
    });
    return formattedUsers;
  };

  const friendList = friend.map((f) => {
    return (
      <Friend
        key={f.id}
        data={f}
        activeId={user.id}
        clicked={() => {
          setChatOpen(true);
          setUser(f);
        }}
      />
    );
  });

  return (
    <React.Fragment>
      {friendList}
      {!friend.length && <div className="text-center">No Contacts Found</div>}
      <Chat
        user={user}
        chatOpen={chatOpen}
        listOpen={listOpen}
        closed={() => {
          setChatOpen(false);
          setUser([]);
          getContacts();
        }}
      />
    </React.Fragment>
  );
});

export default Friends;
