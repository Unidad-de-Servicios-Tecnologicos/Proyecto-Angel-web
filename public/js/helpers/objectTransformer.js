
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

    userOrganization = (obj) => ({
        telefono: {
            key: "Telefono del usuario",
            value: obj["telefono"]
        },
        celular: {
            key: "Celular del usuario",
            value: obj["celular"]
        },
        años_de_experiencia: {
            key: "Años de experiencia del usuario",
            value: obj["años_de_experiencia"]
        },
        nombre_de_la_or: {
            key: "Nombre de la organización",
            value: obj["nombre_de_la_or"]
        },
        sigla_de_la_or: {
            key: "Sigla de la organización",
            value: obj["sigla_de_la_or"]
        },
        cargo_en_la_or: {
            key: "Cargo en la organización",
            value: obj["cargo_en_la_or"]
        },
        naturaleza_de_la_or: {
            key: "Naturaleza de la organización",
            value: obj["naturaleza_de_la_or"]
        },
        clase_de_la_or: {
            key: "Clase de la organización",
            value: obj["clase_de_la_or"]
        },
        ciudad_de_la_or: {
            key: "Ciudad de la organización",
            value: obj["ciudad_de_la_or"]
        },
        departamento_de_la_or: {
            key: "Departamento de la organización",
            value: obj["departamento_de_la_or"]
        },
        direccion_de_la_or: {
            key: "Dirección de la organización",
            value: obj["direccion_de_la_or"]
        },
        telefono_de_la_or: {
            key: "Teléfono de la organización",
            value: obj["telefono_de_la_or"]
        },
        pagina_de_la_or: {
            key: "Página de la organización",
            value: obj["pagina_de_la_or"]
        },
    })
}