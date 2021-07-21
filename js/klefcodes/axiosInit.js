// create a new axios instance
const instance = axios.create({
	baseURL: "http://cas-server.test"
});
// before a request is made start the nprogress
instance.interceptors.request.use(config => {
	config.headers = {
		"x-api-key": localStorage.getItem("token") || localStorage.getItem("adminToken"),
	};
	return config;
});

// before a response is returned stop nprogress
instance.interceptors.response.use(
	response => {
		return response;
	},
	error => {
		const {
			response: { status }
		} = error;
		// if (status == 401) {
		// 	store.dispatch("auth/logout");
		// }
		return Promise.reject(error);
	}
);