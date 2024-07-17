import { ObjectTransformer } from "../helpers/index.js"
import { tableBuilder } from "../helpers/HTML.utils.js"

export default class HTMLStructureProvider {

    #STYLES = {
        user: {
            userContainerStyles: "data-container",
            userChildStyles: {
                self: "card card-1 data-child",
                buttons: "data-child-buttons"
            }
        },
        userOrganization: {
            _label: "HTML-style-1-label",
            _value: "HTML-style-1-value",
            _field: "HTML-style-1-field",
            _container: "HTML-style-1-container"
        }
    }

    constructor() {

        this.objectTransformer = new ObjectTransformer()
    }
    userInformationHTML = ({ userName, userLastName, userEmail, id }) => {

        const { userChildStyles: { buttons, self } } = this.#STYLES.user
        return `
    
    <li class="${self}">
  
        <div>
          <h4>${userName}</h4>
          <h5>${userLastName}</h5>
          <p>${userEmail}</p>
        </div>
  
        <div class="${buttons}" data-admin-user-management-provider-id='${id}'>
          <button data-admin-user-management-provider-on-click='fullUserInformation'>Ver información completa</button>
          <button data-admin-user-management-provider-on-click='getUserSurveys'>Ver encuestas respondidas</button>
        </div>
      </li>
    `
    }

    userOrganizationHTML = ({ label, value }) => {

        const { _label, _value, _field } = this.#STYLES.userOrganization
        return `
        <div class='${_field}'>
          <div class="${_label}">${label}</div>
          <div class="${_value}">${value}</div>
        </div>
      `
    }

    userOrganizationParentHTML = ({ children }) => {

        const { _container } = this.#STYLES.userOrganization

        return `
      
        <div class='${_container}'>
          ${children}
        </div>
      `
    }

    userOrganizationValuesHTML = ({
        telefono,
        celular,
        años_de_experiencia,
        nombre_de_la_or,
        sigla_de_la_or,
        cargo_en_la_or,
        naturaleza_de_la_or,
        clase_de_la_or,
        ciudad_de_la_or,
        departamento_de_la_or,
        direccion_de_la_or,
        telefono_de_la_or,
        pagina_de_la_or,
    }) => {

        const { userOrganizationHTML } = this

        const children = userOrganizationHTML({
            label: "Telefono del usuario",
            value: telefono
        })
            +
            userOrganizationHTML({
                label: "Celular del usuario",
                value: celular
            })
            +
            userOrganizationHTML({
                label: "Años de experiencia del usuario",
                value: años_de_experiencia
            })
            +
            userOrganizationHTML({
                label: "Nombre de la organización",
                value: nombre_de_la_or
            })
            +
            userOrganizationHTML({
                label: "Sigla de la organización",
                value: sigla_de_la_or
            })
            +
            userOrganizationHTML({
                label: "Cargo en la organización",
                value: cargo_en_la_or
            })
            +
            userOrganizationHTML({
                label: "Naturaleza de la organización",
                value: naturaleza_de_la_or
            })
            +
            userOrganizationHTML({
                label: "Clase de la organización",
                value: clase_de_la_or
            })
            +
            userOrganizationHTML({
                label: "Ciudad de la organización",
                value: ciudad_de_la_or
            })
            +
            userOrganizationHTML({
                label: "Departamento de la organización",
                value: departamento_de_la_or
            })
            +
            userOrganizationHTML({
                label: "Dirección de la organización",
                value: direccion_de_la_or
            })
            +
            userOrganizationHTML({
                label: "Teléfono de la organización",
                value: telefono_de_la_or
            })
            +
            userOrganizationHTML({
                label: "Página de la organización",
                value: pagina_de_la_or
            })

        return this.userOrganizationParentHTML({
            children
        })
    }

    surveyTableHTML = (surveys) => {

        surveys = surveys.map(s => this.objectTransformer.survey(s))

        return tableBuilder(surveys, {
            transform: {
                tdValue: val => val.value,
                customHeader: Object.keys(surveys[0]).map(s => surveys[0][s].key)
            }
        })
    }
}