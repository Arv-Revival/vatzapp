import React, {useState, useEffect} from "react";
import ReactImageZoom from "react-image-zoom";

import {CONFIG} from "../../config/constant";
import {ApiConstants} from "../../config/apiConstants";
import FileIcon from "../FileIcon";

const Preview = (props) => {
	const [previewImg, setpreviewImg] = useState("");
	const [previewAvailable, setpreviewAvailable] = useState(true);

	let zoomOptions = {
		zoomWidth: 350,
		img: "",
		zoomPosition: "original",
	};

	useEffect(() => {
		getFilePath();
	}, []);

	const getFilePath = () => {
		let filePath = CONFIG.API_BASE_URL + ApiConstants.file.view + "?file_name=" + props.source;
		setpreviewAvailable(checkFileType(props.source));

		setTimeout(() => {
			setpreviewImg(filePath);
		}, 200);
	};

	const getExtension = (filename) => {
		let regex = /(?:\.([^.]+))?$/;
		let ext = regex.exec(filename)[1];
		return ext;
	};

	const checkFileType = (filename) => {
		let SUPPORTED_FORMATS = ["jpg", "jpeg", "png"];
		let ext = getExtension(filename);
		return SUPPORTED_FORMATS.includes(ext?.toLowerCase());
	};

	return (
		<React.Fragment>
			<div className="preview-container" style={props.containerStyles}>
				{previewImg && (
					<React.Fragment>
						{previewAvailable ? (
							<React.Fragment>{props.zoom ? <ReactImageZoom {...{...zoomOptions, img: previewImg}} /> : <img src={previewImg} alt="Preview" style={props.styles} />}</React.Fragment>
						) : (
							<div>
								<FileIcon source={props.source} style={{width: 150}} />
								<div className="mt-4 text-center">
									<a className="text-primary" target="_blank" rel="noreferrer" href={CONFIG.API_BASE_URL + ApiConstants.file.download + "?file_name=" + props.source}>
										<i className="feather icon-download" /> Download
									</a>
								</div>
							</div>
						)}
					</React.Fragment>
				)}
			</div>
		</React.Fragment>
	);
};

export default Preview;
