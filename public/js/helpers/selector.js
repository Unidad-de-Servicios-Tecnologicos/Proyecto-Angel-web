
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

  clickContextSetter(name, fn) {

    if (this.onClickContext[name]) {
      this.onClickContext[name] = fn
    }
  }

  pushToClickContext(name, fn) {
    if (this.onClickContext[name]) return

    this.onClickContext[name] = fn
  }

  onClick = ({ asParent = false, ...events }) => {
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
      let attribute = target.dataset[this.datasetAttribute + "OnClick"]

      if (!attribute && asParent) {
        attribute = target.closest(`[data-${this.dataset}-on-click]`)?.dataset[this.datasetAttribute + "OnClick"] ?? ""
      }

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
    let id = target?.dataset[this.datasetAttribute + "Id"] ?? target.closest(attribute)?.dataset[this.datasetAttribute + "Id"]

    if (!id) {
      id = target.querySelector(attribute)?.dataset?.[this.datasetAttribute + "Id"] ?? null
    }

    return {
      element: target,
      id
    }
  }
}

export default selector;
