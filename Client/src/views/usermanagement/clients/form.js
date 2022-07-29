import React, {useState, useEffect} from "react";
import {Row, Col} from "react-bootstrap";
import {Formik, Field, Form, ErrorMessage} from "formik";
import * as Yup from "yup";
import Select from "react-select";

import {showNotification} from "../../../services/toasterService";
import {CONFIG} from "../../../config/constant";
import {callApi, callUploadApi} from "../../../services/apiService";
import {ApiConstants} from "../../../config/apiConstants";
import avatar1 from "../../../assets/images/icons/company.png";

const ClientForm = (props) => {
	const [isSubmitted, setIsSubmitted] = useState(false);
	const [selectedCountry, setSelectedCountry] = useState("");
	const [countriesList, setCountriesList] = useState([]);
	const [regionList, setRegionList] = useState([]);
	const [selectedDisplayPic, setSelectedDisplayPic] = useState(null);
	const [previewImg, setPreviewImg] = useState(null);
	const [dpErrors, setDpErrors] = useState("");
	const [userInfo, setuserInfo] = useState(null);

	const FILE_SIZE = CONFIG.MAX_UPLOAD_SIZE;
	const SUPPORTED_FORMATS = ["pdf", "jpg", "jpeg", "png", "doc", "docx", "jfif", "gif"];

	const UserFormSchema = Yup.object().shape({
		name: Yup.string().required("Please enter Name"),
		email: Yup.string().required("Please enter Email ").email("Please enter a valid Email"),
		buildingName: Yup.string().required("Please enter Building Name"),
		region: Yup.string().required("Please select Region"),
		place: Yup.string().required("Please enter Place"),
		po_box: Yup.string().required("Please enter PO Box"),
		city: Yup.string().required("Please enter City"),
		country: Yup.string().required("Please select Country"),
		whatsappno: Yup.string()
			.required("Please enter Whatsapp No")
			.matches(/^[0-9]*$/, "Please enter a valid phone number"),
		landphone: Yup.string().matches(/^[0-9]*$/, "Please enter a valid phone number"),
		mobile: Yup.string().matches(/^[0-9]*$/, "Please enter a valid mobile number"),
		tradeLicenseNumber: Yup.string().required("Please enter Trade License Number"),
		tradeFile: Yup.mixed()
			.test("fileSize", "Exceeds maximum file size (Max 50MB)", (value) => {
				if (value) {
					return value.size <= FILE_SIZE;
				}
				return true;
			})
			.test("fileFormat", "Unsupported Format", (value) => {
				if (value) {
					let regex = /(?:\.([^.]+))?$/;
					let ext = regex.exec(value.name)[1];
					return SUPPORTED_FORMATS.includes(ext?.toLowerCase());
				}
				return true;
			}),
		contact_person: Yup.string().required("Please enter Contact Person name"),
		cp_mobile: Yup.string()
			.required("Please enter Contact Person number")
			.matches(/^[0-9]*$/, "Please enter a valid mobile number"),
		ftaEmail: Yup.string().email("Please enter a valid FTA Email"),
		ftaPassword: Yup.string(),
		trnNumber: Yup.string().required("Please enter TRN Number"),
		trnFile: Yup.mixed()
			.test("fileSize", "Exceeds maximum file size (Max 50MB)", (value) => {
				if (value) {
					return value.size <= FILE_SIZE;
				}
				return true;
			})
			.test("fileFormat", "Unsupported Format", (value) => {
				if (value) {
					let regex = /(?:\.([^.]+))?$/;
					let ext = regex.exec(value.name)[1];
					return SUPPORTED_FORMATS.includes(ext?.toLowerCase());
				}
				return true;
			}),
	});

	useEffect(() => {
		getContries();
	}, []);

	useEffect(() => {
		if (props.isEdit && countriesList.length) {
			getUserData(props?.dataItem?.user_id);
		}
	}, [countriesList]);

	const uploadFiles = (data) =>
		new Promise((resolve, reject) => {
			let formData = new FormData();
			formData.append("file", data);

			return callUploadApi(formData)
				.then((response) => {
					if (response.status_code === 201) resolve(response);
					else {
						reject(response);
						showNotification("Error", response.message, "error");
					}
				})
				.catch((error) => {
					reject(error);
					showNotification("Error", "File upload failed", "error");
				});
		});

	const onSubmit = async (values) => {
		props.onShowLoader(true);
		let params = {
			user_id: userInfo?.id,
			email: values.email,
			w_country_code: selectedCountry.phone_code,
			whatsapp_no: values.whatsappno,
			name: values.name,
			image_id: userInfo?.profile_image_id,
			building_name: values.buildingName,
			country_id: values.country,
			region_id: values.region,
			country_code: selectedCountry.phone_code,
			mobile: values.mobile,
			// join_date: userInfo?.created_at,
			// salary: 0,
			p_o_box: values.po_box,
			palce: values.place,
			city: values.city,
			trade_license_number: values.tradeLicenseNumber,
			trn_number: values.trnNumber,
			trade_license_image_id: userInfo?.client_user?.trade_license_image_id,
			fta_email: values.ftaEmail,
			fta_password: values.ftaPassword,
			l_country_code: selectedCountry.phone_code,
			landline: values.landphone,
			contact_person: values.contact_person,
			cp_country_code: selectedCountry.phone_code,
			cp_mobile: values.cp_mobile,
			tran_certificate_id: userInfo?.client_user?.tran_certificate_id,
		};

		if (values.tradeFile) {
			await uploadFiles(values.tradeFile)
				.then((response) => {
					params.trade_license_image_id = response.payload.file_id;
				})
				.catch((error) => {});
		}

		if (values.trnFile) {
			await uploadFiles(values.trnFile)
				.then((response) => {
					params.tran_certificate_id = response.payload.file_id;
				})
				.catch((error) => {});
		}

		if (selectedDisplayPic) {
			await uploadFiles(selectedDisplayPic)
				.then((response) => {
					params.image_id = response.payload.file_id;
				})
				.catch((error) => {});
		}

		updateProfile(params);
	};

	const updateProfile = (params) => {
		callApi("post", ApiConstants.client.updatebyadmin, params, true)
			.then((response) => {
				props.onShowLoader(false);
				if (response && response.status_code === 201) {
					props.onSuccess();
					showNotification("Success", response.message, "success");
				} else {
					showNotification("Error", response.message, "error");
				}
			})
			.catch((error) => {
				props.onShowLoader(false);
				showNotification("Error", "Something went wrong", "error");
			});
	};

	const onSelectCountry = (value) => {
		setSelectedCountry(value);
		setRegionList(
			value.regions?.map((i) => {
				return {...i, value: i.id, label: i.name};
			})
		);
	};

	const onFileChange = (event) => {
		let file = event.target.files[0];
		if (file) {
			let regex = /(?:\.([^.]+))?$/;
			let ext = regex.exec(file.name)[1];

			if (file.size >= FILE_SIZE) {
				setDpErrors("Exceeds maximum file size (Max 50MB)");
				return;
			}

			if (!SUPPORTED_FORMATS.includes(ext?.toLowerCase())) {
				setDpErrors("Unsupported Format");
				return;
			}

			let reader = new FileReader();
			reader.readAsDataURL(file);
			reader.onloadend = (e) => {
				setPreviewImg(reader.result);
				setSelectedDisplayPic(file);
			};
			setDpErrors("");
		}
	};

	const getContries = () => {
		props.onShowLoader(true);
		callApi("get", ApiConstants.lookups.getCountry, {})
			.then((response) => {
				props.onShowLoader(false);
				if (response && response.status_code === 200) {
					setCountriesList(
						response.payload?.map((i) => {
							return {...i, value: i.id, label: i.name};
						})
					);
				} else {
					showNotification("Error", response.message, "error");
				}
			})
			.catch((error) => {
				props.onShowLoader(false);
				showNotification("Error", "Something went wrong", "error");
			});
	};

	const getUserData = (user_id) => {
		props.onShowLoader(true);
		callApi("get", ApiConstants.user.getuser, {user_id}, true)
			.then((response) => {
				if (response && response.status_code === 200) {
					setuserInfo(response.payload);
					let selectedCountry = countriesList.find((i) => i.id === response.payload?.client_user?.country_id);
					if (selectedCountry) onSelectCountry(selectedCountry);
				} else {
					showNotification("Error", response.message, "error");
				}
				props.onShowLoader(false);
			})
			.catch((error) => {
				showNotification("Error", "Something went wrong", "error");
				props.onShowLoader(false);
			});
	};

	return (
		<React.Fragment>
			<div className="card shadow-none mb-0 rounded">
				<div className="card-header">
					<h5 className="text-primary">Update Client</h5>
				</div>
				<div className="card-body mx-2">
					<Formik
						enableReinitialize={true}
						initialValues={{
							email: userInfo?.email ? userInfo.email : "",
							name: userInfo?.name ? userInfo.name : "",
							buildingName: userInfo?.client_user?.building_name ? userInfo.client_user.building_name : "",
							place: userInfo?.client_user?.palce ? userInfo.client_user.palce : "",
							po_box: userInfo?.client_user.p_o_box ? userInfo.client_user.p_o_box : "",
							city: userInfo?.client_user.city ? userInfo.client_user.city : "",
							country: userInfo?.client_user.country_id ? userInfo.client_user.country_id : "",
							region: userInfo?.client_user.region_id ? userInfo.client_user.region_id : "",
							mobile: userInfo?.client_user.mobile ? userInfo.client_user.mobile : "",
							whatsappno: userInfo?.whatsapp_no ? userInfo.whatsapp_no : "",
							landphone: userInfo?.client_user.landline ? userInfo.client_user.landline : "",
							tradeLicenseNumber: userInfo?.client_user.trade_license_number ? userInfo.client_user.trade_license_number : "",
							tradeFile: undefined,
							trnNumber: userInfo?.client_user.trn_number ? userInfo.client_user.trn_number : "",
							trnFile: undefined,
							contact_person: userInfo?.client_user.contact_person ? userInfo.client_user.contact_person : "",
							cp_mobile: userInfo?.client_user.cp_mobile ? userInfo.client_user.cp_mobile : "",
							ftaEmail: userInfo?.client_user.fta_email ? userInfo.client_user.fta_email : "",
							ftaPassword: userInfo?.client_user.fta_password ? userInfo.client_user.fta_password : "",
						}}
						validationSchema={UserFormSchema}
						onSubmit={(values) => onSubmit(values)}>
						{({errors, handleChange, values, setFieldValue}) => (
							<Form autoComplete="off">
								<Row>
									<Col xs={12} xl={6}>
										<label>Company Name</label>
										<div className="input-group mb-3">
											<Field type="text" className={`form-control ${errors.name && isSubmitted ? "is-invalid" : ""}`} placeholder="Company Name" name="name" />
											<ErrorMessage name="name">{(msg) => <div className="invalid-feedback">{msg}</div>}</ErrorMessage>
										</div>
									</Col>
									<Col xs={12} xl={6}>
										<label>Email</label>
										<div className="input-group mb-3">
											<Field type="text" className={`form-control ${errors.email && isSubmitted ? "is-invalid" : ""}`} id="user-email" placeholder="Email" name="email" autoComplete="off" />
											<ErrorMessage name="email">{(msg) => <div className="invalid-feedback">{msg}</div>}</ErrorMessage>
										</div>
									</Col>
									<Col xs={12} xl={6}>
										<label>Building Name</label>
										<div className="input-group mb-3">
											<Field type="text" className={`form-control ${errors.buildingName && isSubmitted ? "is-invalid" : ""}`} placeholder="Building Name" name="buildingName" />
											<ErrorMessage name="buildingName">{(msg) => <div className="invalid-feedback">{msg}</div>}</ErrorMessage>
										</div>
									</Col>
									<Col xs={12} xl={6}>
										<label>Place / Street name</label>
										<div className="input-group mb-3">
											<Field type="text" className={`form-control ${errors.place && isSubmitted ? "is-invalid" : ""}`} placeholder="Place / Street name" name="place" />
											<ErrorMessage name="place">{(msg) => <div className="invalid-feedback">{msg}</div>}</ErrorMessage>
										</div>
									</Col>
									<Col xs={12} xl={6}>
										<label>P O Box</label>
										<div className="input-group mb-3">
											<Field type="text" className={`form-control ${errors.po_box && isSubmitted ? "is-invalid" : ""}`} placeholder="P O Box" name="po_box" />
											<ErrorMessage name="po_box">{(msg) => <div className="invalid-feedback">{msg}</div>}</ErrorMessage>
										</div>
									</Col>
									<Col xs={12} xl={6}>
										<label>City</label>
										<div className="input-group mb-3">
											<Field type="text" className={`form-control ${errors.city && isSubmitted ? "is-invalid" : ""}`} placeholder="City" name="city" />
											<ErrorMessage name="city">{(msg) => <div className="invalid-feedback">{msg}</div>}</ErrorMessage>
										</div>
									</Col>
									<Col xs={12} xl={6}>
										<label>Country</label>
										<div className="input-group mb-3">
											<Select
												className={`w-100 form-control-select ${errors.country && isSubmitted ? "is-invalid" : ""}`}
												classNamePrefix="select"
												options={countriesList}
												value={countriesList.find((i) => i.id === values.country)}
												placeholder="Select Country"
												isSearchable={false}
												isDisabled
												onChange={(value) => {
													onSelectCountry(value);
													let event = {
														target: {
															name: "country",
															value: value.id,
														},
													};
													handleChange(event);
												}}
											/>
											<ErrorMessage name="country">{(msg) => <div className="invalid-feedback">{msg}</div>}</ErrorMessage>
										</div>
									</Col>
									<Col xs={12} xl={6}>
										<label>Region</label>
										<div className="input-group mb-3">
											<Select
												className={`w-100 form-control-select ${errors.region && isSubmitted ? "is-invalid" : ""}`}
												classNamePrefix="select"
												options={regionList}
												placeholder="Select Region"
												isSearchable
												value={regionList.find((i) => i.id === values?.region)}
												onChange={(value) => {
													let event = {
														target: {
															name: "region",
															value: value.id,
														},
													};
													handleChange(event);
												}}
											/>
											<ErrorMessage name="region">{(msg) => <div className="invalid-feedback">{msg}</div>}</ErrorMessage>
										</div>
									</Col>
									<Col xs={12} xl={6}>
										<label>Whatsapp Number</label>

										<div className="input-group mb-3">
											<div className="input-group-prepend bg-light">
												<span className={`input-group-text ${errors.whatsappno && isSubmitted ? "border border-danger" : ""}`} id="country-code" style={{fontSize: 14}}>
													{selectedCountry.phone_code}
												</span>
											</div>
											<Field type="text" className={`form-control ${errors.whatsappno && isSubmitted ? "is-invalid" : ""}`} placeholder="Whatsapp Number" name="whatsappno" />
											<ErrorMessage name="whatsappno">{(msg) => <div className="invalid-feedback">{msg}</div>}</ErrorMessage>
										</div>
									</Col>
									<Col xs={12} xl={6}>
										<label>Land Line Number</label>
										<div className="input-group mb-3">
											<div className="input-group-prepend bg-light">
												<span className={`input-group-text ${errors.landphone && isSubmitted ? "border border-danger" : ""}`} id="country-code" style={{fontSize: 14}}>
													{selectedCountry.phone_code}
												</span>
											</div>
											<Field type="text" className={`form-control ${errors.landphone && isSubmitted ? "is-invalid" : ""}`} placeholder="Land Line Number" name="landphone" />
											<ErrorMessage name="landphone">{(msg) => <div className="invalid-feedback">{msg}</div>}</ErrorMessage>
										</div>
									</Col>
									<Col xs={12} xl={6}>
										<label>Mobile Number</label>
										<div className="input-group mb-3">
											<div className="input-group-prepend bg-light">
												<span className={`input-group-text ${errors.mobile && isSubmitted ? "border border-danger" : ""}`} id="country-code" style={{fontSize: 14}}>
													{selectedCountry.phone_code}
												</span>
											</div>
											<Field type="text" className={`form-control ${errors.mobile && isSubmitted ? "is-invalid" : ""}`} placeholder="Mobile Number" name="mobile" />
											<ErrorMessage name="mobile">{(msg) => <div className="invalid-feedback">{msg}</div>}</ErrorMessage>
										</div>
									</Col>
									<Col xs={12} xl={6}></Col>
									<Col xs={12} xl={6}>
										<label>Trade License Number</label>
										<div className="input-group mb-3">
											<Field type="text" className={`form-control ${errors.tradeLicenseNumber && isSubmitted ? "is-invalid" : ""}`} placeholder="Trade License Number" name="tradeLicenseNumber" />
											<ErrorMessage name="tradeLicenseNumber">{(msg) => <div className="invalid-feedback">{msg}</div>}</ErrorMessage>
										</div>
									</Col>
									<Col xs={12} xl={6}>
										<label>Upload Trade License Copy</label>
										<div className="input-group">
											<input
												id="tradeFile"
												className={`form-control ${errors.tradeFile && isSubmitted ? "is-invalid" : ""}`}
												type="file"
												onChange={(event) => {
													setFieldValue("tradeFile", event.currentTarget.files[0]);
												}}
											/>
											{userInfo && userInfo?.client_user?.trade_license_image && (
												<div className="ml-2 mt-2">
													<a target="_blank" rel="noreferrer" href={CONFIG.API_BASE_URL + ApiConstants.file.download + "?file_name=" + userInfo?.client_user?.trade_license_image.file_path}>
														Download
													</a>
												</div>
											)}
											<ErrorMessage name="tradeFile">{(msg) => <div className="invalid-feedback">{msg}</div>}</ErrorMessage>
										</div>
										<div style={{fontSize: 10}} className="mb-3">
											Supported file formats JPEG, PNG, Pdf, DOC, DOCX
										</div>
									</Col>

									<Col xs={12} xl={6}>
										<label>TRN</label>
										<div className="input-group mb-3">
											<Field type="text" className={`form-control ${errors.trnNumber && isSubmitted ? "is-invalid" : ""}`} placeholder="TRN" name="trnNumber" />
											<ErrorMessage name="trnNumber">{(msg) => <div className="invalid-feedback">{msg}</div>}</ErrorMessage>
										</div>
									</Col>
									<Col xs={12} xl={6}>
										<label>Upload TRN Certificate</label>
										<div className="input-group">
											<input
												id="trnFile"
												className={`form-control ${errors.trnFile && isSubmitted ? "is-invalid" : ""}`}
												type="file"
												onChange={(event) => {
													setFieldValue("trnFile", event.currentTarget.files[0]);
												}}
											/>
											{userInfo && userInfo?.client_user?.tran_certificate_image && (
												<div className="ml-2 mt-2">
													<a target="_blank" rel="noreferrer" href={CONFIG.API_BASE_URL + ApiConstants.file.download + "?file_name=" + userInfo?.client_user?.tran_certificate_image.file_path}>
														Download
													</a>
												</div>
											)}
											<ErrorMessage name="trnFile">{(msg) => <div className="invalid-feedback">{msg}</div>}</ErrorMessage>
										</div>
										<div style={{fontSize: 10}} className="mb-3">
											Supported file formats JPEG, PNG, Pdf, DOC, DOCX
										</div>
									</Col>
									<Col xs={12} xl={6}>
										<label>Contact Person</label>
										<div className="input-group mb-3">
											<Field type="text" className={`form-control ${errors.contact_person && isSubmitted ? "is-invalid" : ""}`} placeholder="Contact Person" name="contact_person" />
											<ErrorMessage name="contact_person">{(msg) => <div className="invalid-feedback">{msg}</div>}</ErrorMessage>
										</div>
									</Col>
									<Col xs={12} xl={6}>
										<label>Contact Number</label>
										<div className="input-group mb-3">
											<div className="input-group-prepend bg-light">
												<span className={`input-group-text ${errors.cp_mobile && isSubmitted ? "border border-danger" : ""}`} id="country-code" style={{fontSize: 14}}>
													{selectedCountry.phone_code}
												</span>
											</div>
											<Field type="text" className={`form-control ${errors.cp_mobile && isSubmitted ? "is-invalid" : ""}`} placeholder="Contact Number" name="cp_mobile" />
											<ErrorMessage name="cp_mobile">{(msg) => <div className="invalid-feedback">{msg}</div>}</ErrorMessage>
										</div>
									</Col>
									<Col xs={12}>
										<hr />
										<label style={{color: "#096DA9"}} className="mb-3">
											FTA Login Details &nbsp;
											<i className="fa fa-info-circle"></i>
										</label>
									</Col>
									<Col xs={12} xl={6}>
										<label>FTA Email</label>
										<div className="input-group mb-3">
											<Field type="text" className={`form-control ${errors.ftaEmail && isSubmitted ? "is-invalid" : ""}`} placeholder="FTA Email" name="ftaEmail" />
											<ErrorMessage name="ftaEmail">{(msg) => <div className="invalid-feedback">{msg}</div>}</ErrorMessage>
										</div>
									</Col>
									<Col xs={12} xl={6}>
										<label>FTA Password</label>
										<div className="input-group mb-3">
											<Field type="password" className={`form-control ${errors.ftaPassword && isSubmitted ? "is-invalid" : ""}`} placeholder="FTA Password" name="ftaPassword" />
											<ErrorMessage name="ftaPassword">{(msg) => <div className="invalid-feedback">{msg}</div>}</ErrorMessage>
										</div>
									</Col>
								</Row>

								<div className="mt-3 text-center">
									<button type="submit" style={{width: 150, fontWeight: "bold"}} className="btn btn-primary shadow-2 mt-3" onClick={() => setIsSubmitted(true)}>
										Update
									</button>
								</div>
							</Form>
						)}
					</Formik>
				</div>
			</div>
		</React.Fragment>
	);
};

export default ClientForm;
