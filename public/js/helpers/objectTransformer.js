
export default class ObjectTransformer {

    survey = (obj) => {
        return {
            "id_encuesta": {
                key: "id",
                value: obj["id_encuesta"]
            },
            "id_usuario": {
                key: "id de usuario",
                value: obj["id_usuario"]
            },
            "titulo": {
                key: "Titulo de la encuesta",
                value: obj["titulo"]
            },
            "descripcion": {
                key: "Descripción de la encuesta",
                value: obj["descripcion"]
            },
            "estado": {
                key: "Estado de la encuesta",
                value: obj["estado"]
            },
            "fecha_inicio": {
                key: "Fecha de inicio",
                value: obj["fecha_inicio"]
            },
            "fecha_final": {
                key: "Fecha fin",
                value: obj["fecha_final"]
            },
        }

    }

    surveyQuestions = (obj) => {

        return {

            id_pregunta: {
                key: "ID de la pregunta",
                value: obj["id_pregunta"]
            },

            id_encuesta: {
                key: "ID de la encuesta",
                value: obj["id_encuesta"]
            },
            titulo: {
                key: "Titulo de la encuesta",
                value: obj["titulo"]
            },
            id_tipo_pregunta: {
                key: "ID tipo de pregunta",
                value: obj["id_tipo_pregunta"]
            },
            nombre: {
                key: "Nombre de la pregunta",
                value: obj["nombre"]
            },
            descripcion: {
                key: "Descripcion de la pregunta",
                value: obj["descripcion"]
            },
        }
    }

    questionOption = (obj) => ({

        id_pregunta: {
            key: "ID de la pregunta",
            value: obj["id_pregunta"]
        },

        valor: {
            key: "Valor de la opción",
            value: obj["valor"]
        }
    })
}