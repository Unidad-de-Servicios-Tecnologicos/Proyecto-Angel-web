
export const ATTRIBUTE = "onClick"
export const DATASET_ATTRIBUTE = "on-click"

const selector = (id) => {

  const entity = document.querySelector(id)
  console.log("Ds: ", entity.querySelectorAll(`data-${DATASET_ATTRIBUTE}`))
  let events = {}

  Array.from(entity.querySelectorAll(`data-${DATASET_ATTRIBUTE}`)).forEach(child => {

    const datasetValue = child.dataset[ATTRIBUTE]

    if (!datasetValue) return

    events[datasetValue] = child
  })

  return {
    ...events,
    entity
  }
}

export default selector;