import React from "react";

import pdfIcon from "../../assets/images/icons/pdf.png";
import docIcon from "../../assets/images/icons/doc.png";
import imageIcon from "../../assets/images/icons/pictures.png";
import fileIcon from "../../assets/images/icons/file.png";

const FileIcon = (props) => {
  const getExtension = (filename) => {
    let regex = /(?:\.([^.]+))?$/;
    let ext = regex.exec(filename)[1];
    return ext;
  };

  const getFileIcon = (filename) => {
    let ext = getExtension(filename);
    switch (ext) {
      case "pdf":
        return pdfIcon;
      case "doc":
      case "docx":
        return docIcon;
      case "jpg":
      case "jpeg":
      case "png":
        return imageIcon;
      default:
        return fileIcon;
    }
  };

  return (
    <React.Fragment>
      <img
        src={getFileIcon(props.source)}
        alt="Preview"
        className={props.className}
        style={props.style}
      />
    </React.Fragment>
  );
};

export default FileIcon;
