import axios from "axios";

const axiosApiIntances = axios.create({
  baseURL: "http://localhost:8000/",
});

export default axiosApiIntances;
