import { useFetch } from "../helpers/index.js"
import { UseSelector } from "../helpers/selector.js"
import HTMLStructureProvider from "./HTMLStructureProvider.js"
import RightSectionBarComponentProvider from "./RightSectionBarProvider.js"

export default class AdminManagementProvider {

  #providerId = "#vfjnetriju8878bcvbg8536+"
  #API = {
    userInformation: "../../../controllers/AdminTraitsController.php?type=getUsersInformation"
  }
  #MEMO = {
    users: []
  }

  constructor() {

    this.rightSectionBarProvider = new RightSectionBarComponentProvider({
      handleBodyMove: {
        bodyId: "#users",
        move: true,
        initialWidthInPercentage: "100%"
      }
    })
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
    this.entity.className = "data-container"

    this.useSelector = new UseSelector({
      target: this.entity,
      dataset: "admin-user-management-provider",
      datasetAttribute: "adminUserManagementProvider"
    })

    this.useSelector.onClick({
      fullUserInformation: ({ target }) => {
        const selectedUser = this.#MEMO.users.find(us => us.id_usuario === this.useSelector.getId(target).id)

        this.rightSectionBarProvider
          .active()
          .content.innerHTML = this.HTMLComponents.userOrganizationValuesHTML(selectedUser)
      },

      getUserSurveys: ({ target }) => {
        const { id } = this.useSelector.getId(target)
        location.href = `../surveys/index.php?userId=${id}`
      }
    })

  }
}