import { selector, useFetch } from "../../../public/js/helpers/index.js"
import { validateInputs } from "../../../public/js/helpers/reducer.js";

const selectorForm = selector("#mainForm")
selectorForm.children = selectorForm.entity.querySelectorAll("input");

console.log("Zips")
selectorForm.entity.onsubmit = async (event) => {
  event.preventDefault()
  const formData = new FormData(event.target)
  const data = Object.fromEntries(formData)

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
  console.log("New value: ", newValue)
  selectorForm.submit.disabled = !isFormValid

  if (!isFormValid) {
    selectorForm.submit.parentElement.querySelector("p").textContent = `Error: ${errorMessage}`
    return
  }

  selectorForm.submit.parentElement.querySelector("p").textContent = ""
}