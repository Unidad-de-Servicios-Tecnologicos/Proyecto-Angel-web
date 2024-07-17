import { UseSelector } from "../helpers/selector.js"

export default class RightSectionBarComponentProvider {

    #id = "#dsfgvsdfgesf52g443"
    // #STYLES = {
    //     display: "right-section-display"
    // }

    constructor({ voidWhenClose = false }) {

        this.dataset = "right-component-provider"
        this.voidWhenClose = voidWhenClose
        this.useSelector = new UseSelector({
            id: this.#id,
            dataset: this.dataset,
            datasetAttribute: "rightComponentProvider"
        })

        this.useSelector.onClick({
            asParent: true,
            onHide: this.hide,
            handleRightSectionProvider: () => null
        })

        const { body, bodies } = this.useSelector.breakDownIntoComponents()
        this.body = body
        this.bodies = bodies
        this.createdBodies = ["initial"]

    }

    _bodyHTML = ({ id, onClick, children }) => `
    
            <div class="right-section-body" data-right-component-provider="${id}"
                data-right-component-provider-on-click="${onClick}"
                data-right-component-provider-id-body="${id}">

                ${children}
            </div>
    `

    /**
     * @param {() => null} fn
     */
    set handleRightSectionProvider(fn) {
        this.useSelector.clickContextSetter("handleRightSectionProvider", fn)
    }

    hide = () => {

        if (!this.isActive) return
        this.isActive = false
        this.useSelector.entity.style.left = "100%"

        if (this.voidWhenClose) {
            this.voidBodyChildren()
        }
    }

    voidBodyChildren = () => {

        const children = Array.from(this.bodies.children)
        for (let i = 1; i < children.length; i++) {
            this.createdBodies = this.createdBodies.filter(id => id !== children[i].dataset[this.useSelector.datasetAttribute + "IdBody"])

            children[i].remove()
        }
    }

    active = (percentage = "60%") => {

        if (this.isActive) return this._returnContent()

        this.isActive = true
        this.useSelector.entity.style.left = percentage

        return this._returnContent()
    }

    toggle = (percentage = "60%") => {

        if (this.isActive) this.hide()
        else this.active(percentage)

        return this._returnContent()
    }

    _returnContent = () => ({
        content: this.body,
        addBody: this.addBody
    })

    expandSectionBar = (percentage) => {
        const percentageInNumber = +this.useSelector.entity.style.left.slice(0, -1)
        let finalPercentage = percentageInNumber - percentage

        if (finalPercentage < 0) finalPercentage = 0

        this.useSelector.entity.style.left = finalPercentage + "%"
    }

    addBody = (_bodies = [], { percentagePerChild = 10, replaceWhenEqual = false }) => {

        for (const { id, body, onClick = "" } of _bodies) {

            if (this.createdBodies.includes(String(id)) && replaceWhenEqual) {
                this.bodies.querySelector(`[data-${this.useSelector.dataset}-id-body='${id}']`).innerHTML = body
                continue
            }
            else if (this.createdBodies.includes(String(id))) continue

            this.createdBodies.push(String(id))
            this.bodies.insertAdjacentHTML("beforeend", this._bodyHTML({
                children: body,
                id,
                onClick
            }))

            this.expandSectionBar(percentagePerChild)
        }
    }

    removeBody = (id) => {

        this.bodies.querySelector(`[data-${this.useSelector.dataset}-id-body='${id}']`).remove()
        this.createdBodies = this.createdBodies.filter((_id) => _id !== String(id))
    }
}
