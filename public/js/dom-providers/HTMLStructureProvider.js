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
          <button data-admin-user-management-provider-on-click='fullUserInformation' class='btn btn-primary'>Ver información completa</button>
          <button data-admin-user-management-provider-on-click='getUserSurveys' data-admin-user-management-provider-id='${id}' class='btn btn-secondary'>Ver encuestas respondidas</button>
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

    userOrganizationValuesHTML = (obj) => {

        const { userOrganizationHTML } = this

        let CHILDREN = ""

        const convertedObject = this.objectTransformer.userOrganization(obj)

        for (const _key in convertedObject) {

            const { key, value } = convertedObject[_key]

            if (!value) continue;

            CHILDREN += userOrganizationHTML({
                label: key,
                value
            })
        }


        return this.userOrganizationParentHTML({
            children: CHILDREN
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