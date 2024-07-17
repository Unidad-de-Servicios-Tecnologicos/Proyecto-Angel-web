import { AdminManagementProvider } from "../../../public/js/dom-providers/index.js"

const provider = new AdminManagementProvider()

provider.init()

document.querySelector("#users").append(provider.entity)

provider.updateAllUserInformation()
