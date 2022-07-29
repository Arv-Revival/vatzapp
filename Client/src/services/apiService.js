import axios from "axios";

import { CONFIG } from "../config/constant";
import { ApiConstants } from "../config/apiConstants";

export const callApi = (method, url, params, isAuth) => {
	let userObj = localStorage.getItem("user");
	let token = "";
	if (userObj) token = JSON.parse(userObj).token;

	const config = {
		headers: {},
	};

	if (isAuth) config.headers.Authorization = `Bearer ${token}`;

	let axiosConfig = {
		method,
		url: CONFIG.API_BASE_URL + url,
		headers: config.headers,
	};

	if (method.toUpperCase() === "GET") {
		axiosConfig.params = params;
	} else {
		axiosConfig.data = params;
	}

	const getRefreshToken = () => {
		return new Promise((resolve, reject) => {
			axios({ method: "get", url: CONFIG.API_BASE_URL + ApiConstants.auth.refreshtoken, headers: config.headers })
				.then((response) => {
					if (response.data) {
						resolve(response?.data?.payload);
					} else {
						reject(response);
					}
				})
				.catch((e) => {
					reject(e);
				});
		});
	};

	const retry = (newToken, resolve, reject) => {
		let userObj = JSON.parse(localStorage.getItem("user"));
		userObj.token = newToken;
		sessionStorage.setItem("user", JSON.stringify(userObj));
		localStorage.setItem("user", JSON.stringify(userObj));
		axiosConfig.headers.Authorization = `Bearer ${newToken}`;
		axios(axiosConfig)
			.then((response) => {
				resolve(response.data);
			})
			.catch((error) => {
				reject(error);
			});
	};

	return new Promise((resolve, reject) => {
		axios.interceptors.response.use(
			(response) => {
				return response;
			},
			(error) => {
				console.log(error);
				if (error.response.status === 401) {
					return { status: 401 };
				} else {
					return error;
				}
			}
		);
		// console.log(axiosConfig);
		axios(axiosConfig)
			.then((response) => {
				if (response && response.status === 401) {
					getRefreshToken()
						.then((refreshtoken) => {
							retry(refreshtoken, resolve, reject);
						})
						.catch((e) => {
							sessionStorage.clear();
							window.location.reload();
						});
				} else {
					resolve(response.data);
				}
			})
			.catch((e) => {
				console.log(e);
				reject(e);
			});
	});
};

export const callUploadApi = (params) => {
	const config = {
		headers: {},
	};

	let axiosConfig = {
		method: "post",
		url: CONFIG.API_BASE_URL + ApiConstants.file.upload,
		headers: config.headers,
	};

	axiosConfig.data = params;

	return new Promise((resolve, reject) => {
		axios(axiosConfig)
			.then((response) => {
				resolve(response.data);
			})
			.catch((e) => {
				reject(e);
			});
	});
};
