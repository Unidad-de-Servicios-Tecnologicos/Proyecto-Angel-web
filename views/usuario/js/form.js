import { getCities, getDepartments } from "../../../data/countryInformation.js";
import { CustomSelect } from "../../../public/js/dom-components/index.js";
import { selector, useFetch } from "../../../public/js/helpers/index.js"
import { validateInputs } from "../../../public/js/helpers/reducer.js";

document.addEventListener("DOMContentLoaded", async () => {
  const selectorForm = selector("#mainForm")
  selectorForm.children = selectorForm.entity.querySelectorAll("input");

  const departments = await getDepartments()

  const departmentSelect = new CustomSelect({
    values: departments.result,
    sectionContainer: document.querySelector("#sectionContainer-department"),
    valueStructure: "name"
  })

  const citySelect = new CustomSelect({
    values: [],
    sectionContainer: document.querySelector("#sectionContainer-city"),
    valueStructure: "name"
  })

  departmentSelect.onSelectChange = async ({ id }) => {

    if (departmentSelect.hasError) return

    const { result } = await getCities(id)
    citySelect.setValues(result)
  }

  selectorForm.entity.onsubmit = async (event) => {
    event.preventDefault()
    const formData = new FormData(event.target)
    const data = Object.fromEntries(formData)

    if (departmentSelect.hasError) {
      alert("El departamento ingresado no existe")
      return
    }

    else if (citySelect.hasError) {
      alert("La ciudad ingresada no existe")
      return
    }

    const { result } = await useFetch({
      url: "../../controllers/UserOrganizationController.php?type=create",
      getJson: true,
      method: "POST",
      body: JSON.stringify(data),
      headers: {
        "Content-Type": "application/json"
      }
    })

    if (result?.props) {
      alert("Datos ingresados correctamente");

      const inputs = selectorForm.entity.querySelectorAll("input")

      Array.from(inputs).forEach(input => {

        if (!data[input.name]) return

        input.value = data[input.name];
        input.disabled = true
      })
    }
  }

  selectorForm.entity.oninput = (event) => {

    const { target } = event

    const { errorMessage, isFormValid, newValue } = validateInputs({
      currentTarget: target,
      targets: selectorForm.children,
    })

    target.value = newValue
    selectorForm.submit.disabled = !isFormValid

    if (!isFormValid) {
      selectorForm.submit.parentElement.querySelector("p").textContent = `Error: ${errorMessage}`
      return
    }

    selectorForm.submit.parentElement.querySelector("p").textContent = ""
  }

})