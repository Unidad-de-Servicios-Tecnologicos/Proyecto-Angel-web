import { selector, useFetch } from "./public/js/helpers/index.js";
import { UseSelector } from "./public/js/helpers/selector.js";

class RightSectionBarComponentProvider {

  #id = "#dsfgvsdfgesf52g443"
  #STYLES = {
    display: "right-section-display"
  }

  constructor() {

    this.useSelector = new UseSelector({
      id: this.#id,
      dataset: "right-component-provider",
      datasetAttribute: "rightComponentProvider"
    })

    this.useSelector.onClick({
      onHide: this.hide
    })

    const { body } = this.useSelector.breakDownIntoComponents()
    console.log(this.useSelector.breakDownIntoComponents())
    this.body = body

  }

  hide = () => {

    if (!this.isActive()) return
    this.useSelector.entity.classList.remove(this.#STYLES.display)
  }

  active = () => {

    if (this.isActive()) return {
      content: this.body
    }

    this.useSelector.entity.classList.add(this.#STYLES.display)

    return {
      content: this.body
    }
  }

  isActive = () => this.useSelector.entity.classList.contains(this.#STYLES.display)

  toggle = () => {

    this.useSelector.entity.classList.toggle(this.#STYLES.display)

    return {
      content: this.body
    }
  }
}

class HTMLStructureProvider {

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
}

class AdminUserManagementProvider {

  #providerId = "#vfjnetriju8878bcvbg8536+"
  #API = {
    userInformation: "./controllers/AdminTraitsController.php?type=getUsersInformation"
  }
  #MEMO = {
    users: []
  }

  constructor() {

    this.rightSectionBarProvider = new RightSectionBarComponentProvider()
    this.HTMLComponents = new HTMLStructureProvider()
  }

  updateAllUserInformation = async () => {

    const { request, result } = await useFetch({
      url: this.#API.userInformation,
      method: "GET",
      getJson: true
    })

    if (!request.ok) return
    this.#MEMO.users = result.users

    for (const {
      nombres,
      apellidos,
      email,
      id_usuario
    } of result.users) {
      this.entity.innerHTML += this.HTMLComponents.userInformationHTML({
        userEmail: email,
        userLastName: apellidos,
        userName: nombres,
        id: id_usuario
      })
    }
  }

  init() {

    this.entity = document.createElement("ul")
    this.entity.id = this.#providerId

    this.useSelector = new UseSelector({
      target: this.entity,
      dataset: "admin-user-management-provider",
      datasetAttribute: "adminUserManagementProvider"
    })

    this.useSelector.onClick({
      fullUserInformation: ({ target }) => {
        const selectedUser = this.#MEMO.users.find(us => us.id_usuario === this.useSelector.getId(target).id)

        this.rightSectionBarProvider.active()
          .content.innerHTML = this.HTMLComponents.userOrganizationValuesHTML(selectedUser)
      },

      getUserSurveys: () => {
        //TODO
      }
    })

  }
}
const provider = new AdminUserManagementProvider()

provider.init()

document.querySelector("#main").append(provider.entity)

const { result } = await useFetch({
  url: "./controllers/AdminTraitsController.php?type=getUsersInformation",
  method: "GET",
  getJson: true
})

console.log("result: ", result)
provider.updateAllUserInformation()
