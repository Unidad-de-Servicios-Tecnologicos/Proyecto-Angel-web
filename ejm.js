import { HTMLStructureProvider } from "./public/js/dom-providers/index.js";
import { selector, useFetch } from "./public/js/helpers/index.js";
import { UseSelector } from "./public/js/helpers/selector.js";


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
