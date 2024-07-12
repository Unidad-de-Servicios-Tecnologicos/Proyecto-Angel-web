
export const ATTRIBUTE = "onClick"
export const DATASET_ATTRIBUTE = "on-click"

const selector = (id, target = undefined) => {

  const entity = target ?? document.querySelector(id)
  let events = {}

  Array.from(entity.querySelectorAll(`[data-${DATASET_ATTRIBUTE}]`)).forEach(child => {

    const datasetValue = child.dataset[ATTRIBUTE]

    if (!datasetValue) return

    events[datasetValue] = child
  })

  return {
    ...events,
    entity
  }
}

export class UseSelector {

  constructor({ id, target = undefined, dataset, datasetAttribute, ...entityFragments }) {
    this.events = {}
    this.id = id
    this.target = target
    this.dataset = dataset
    this.datasetAttribute = datasetAttribute
    this.entityFragments = entityFragments
    this.entity = target ?? document.querySelector(id)

    this.isOnClickEventSet = false
    this.onClickContext = {}
  }

  onClick = ({ ...events }) => {
    if (this.isOnClickEventSet) {

      this.onClickContext = {
        ...this.onClickContext,
        ...events
      }
      return
    }

    this.isOnClickEventSet = true
    this.onClickContext = events

    this.entity.addEventListener("click", event => {

      const { target } = event
      const attribute = target.dataset[this.datasetAttribute + "OnClick"]

      if (typeof this.onClickContext[attribute] === "function") this.onClickContext[attribute]({ event, target })
    })

  }

  breakDownIntoComponents = () => {

    let children = {}
    Array.from(this.entity.querySelectorAll(`[data-${this.dataset}]`))
      .forEach(ch => {
        children[ch.dataset[this.datasetAttribute]] = ch
      })

    return children
  }

  getId = (target) => {

    const attribute = `[data-${this.dataset}-id]`
    console.log(attribute)
    let element = target.dataset[this.datasetAttribute + "Id"] ?? target.closest(attribute)

    if (!element) {
      element = target.querySelector(attribute)
    }

    return {
      element,
      id: element?.dataset?.[this.datasetAttribute + "Id"] ?? null
    }
  }
}

export default selector;
