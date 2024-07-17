const MEMO = () => {

  let memorizedObjects = {}
  return (uniqueId, obj) => {

    if (memorizedObjects[uniqueId]) return memorizedObjects[uniqueId]

    memorizedObjects[uniqueId] = obj
    return obj
  }
}

export default MEMO