import { useFetch } from "../public/js/helpers/index.js";

export const getDepartments = async () => await useFetch({
  getJson: true,
  url: "https://api-colombia.com/api/v1/Department",
  method: "GET"
})

export const getCities = async (id) => await useFetch({
  getJson: true,
  url: `https://api-colombia.com/api/v1/Department/${id}/cities`,
  method: "GET"
})