
const reducer = (type, value) => {

  let isValid = true
  let error = "";

  switch (type) {

    case "experience_years": {

      isValid = !isNaN(value) && value >= 0 && value < 80;
      error = "El valor de los años de experiencia no es válido."
      break;
    }

    case "organization_name":
    case "organization_acronym":
    case "position_in_organization":
    case "organization_nature":
    case "organization_class":
    case "organization_city":
    case "organization_department": {

      isValid = value.length >= 3;
      error = "El valor debe ser mayo a 3 caracteres."
      break;
    }

    case "organization_address":
    case "organization_website":
      {

        isValid = value.length > 8
        error = "La valor debe ser mayor a 8 caracteres"
        break;
      }

    case "organization_phone": {
      isValid = value.length > 6 && value.length < 17
      error = "El número de contacto no es válido"
      break;
    }
  }

  if (isValid) error = ""

  return {
    isValid,
    error
  }
}

export default reducer

export const validateInputs = ({ targets, currentTarget }) => {

  let isFormValid = true
  let errorMessage = ""

  const { isValid, error } = reducer(currentTarget.dataset.validate, currentTarget.value)
  currentTarget.dataset.validate = isValid
  currentTarget.dataset.valid = error

  for (const target of targets) {

    if (!target.dataset?.validate || !target.dataset?.valid) continue;
    const { isValid, error } = reducer(target.dataset.validate, target.value)

    if (!isValid) {
      isFormValid = false
      errorMessage = error;

      break;
    }
  }

  return {
    isFormValid,
    errorMessage
  }
}