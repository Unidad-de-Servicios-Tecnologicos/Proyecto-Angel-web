import { spaceRegex, stringRegex } from "../utils/constants.js";

const reducer = (type, value) => {

  let isValid = true
  let error = "";
  let newValue = value;

  switch (type) {

    case "experience_years": {

      isValid = !isNaN(value) && value >= 0 && value < 80;
      error = "El valor de los años de experiencia no es válido."
      newValue = value.replace(spaceRegex, "").replace(stringRegex, "")
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
      newValue = value.replace(spaceRegex, " ")
      break;
    }

    case "organization_address":
    case "organization_website":
      {

        isValid = value.length > 8
        error = "La valor debe ser mayor a 8 caracteres"
        newValue = value.replace(spaceRegex, " ")
        break;
      }

    case "organization_phone": {
      isValid = value.length > 6 && value.length < 17
      error = "El número de contacto no es válido"
      newValue = value.replace(spaceRegex, "").replace(stringRegex, "")
      break;
    }
  }

  if (isValid) error = ""

  return {
    isValid,
    error,
    newValue
  }
}

export default reducer

export const validateInputs = ({ targets, currentTarget }) => {

  const { isValid, error, newValue } = reducer(currentTarget.dataset?.type, currentTarget?.value)
  currentTarget.dataset.validate = isValid
  currentTarget.dataset.valid = error

  let isFormValid = isValid
  let errorMessage = error

  if (isValid) {
    for (const target of targets) {

      if (!target.dataset?.type) continue;
      const { isValid, error } = reducer(target.dataset.type, target.value)

      if (!isValid) {
        isFormValid = false
        errorMessage = error;

        break;
      }
    }
  }


  return {
    isFormValid,
    errorMessage,
    newValue
  }
}

/*

QUERIES

- Get User: SELECT * FROM usuarios u LEFT JOIN organizacion o ON o.usuario_id = u.id_usuario LIMIT 1; CHECKED 
- Get Surveys by userId:
SELECT * FROM encuestas WHERE id_usuario = 2; Checked
- Get questions by survey Id, questionType

SELECT 
*
FROM preguntas p RIGHT JOIN tipo_pregunta t ON p.id_tipo_pregunta = t.id_tipo_pregunta WHERE p.id_encuesta = 2;

CHECKED
- Get Question Options

SELECT 
op.*
FROM opciones op INNER JOIN preguntas p ON p.id_pregunta = op.id_pregunta WHERE p.id_encuesta = 2 AND p.id_pregunta = 5
CHECKED
*/