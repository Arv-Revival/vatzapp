import PNotify from "pnotify/dist/es/PNotify";

export const showNotification = (title, text, type) => {
  let notice;
  let params = { title, text };
  switch (type) {
    case "success":
      notice = PNotify.success(params);
      break;
    case "error":
      notice = PNotify.error(params);
      break;
    case "info":
      notice = PNotify.info(params);
      break;
    case "warning":
      notice = PNotify.notice(params);
      break;
    default:
      notice = PNotify.notice(params);
      break;
  }

  notice.on("click", function () {
    notice.close();
  });
};
