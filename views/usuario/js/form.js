import { selector, useFetch } from "../../../public/js/helpers/index.js"
import { validateInputs } from "../../../public/js/helpers/reducer.js";

const selectorForm = selector("#mainForm")
selectorForm.children = selectorForm.entity.querySelectorAll("input");

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

  console.log("inFetch: ", result)

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

  console.log("Write")
  console.log(selectorForm)
  const { target } = event

  const { errorMessage, isFormValid } = validateInputs({
    currentTarget: target,
    targets: selectorForm.children,
  })

  selectorForm.submit.disabled = !isFormValid

  if (!isFormValid) {
    selectorForm.submit.innerHTML = `<p>Error: ${errorMessage}</p>`
    return
  }

  selectorForm.submit.innerHTML = ""
}