

export default class CustomSelect {

  constructor({ values, sectionContainer, idStructure = "id", valueStructure = "value" }) {

    this.values = values
    this.hasError = true
    this.idStructure = idStructure
    this.valueStructure = valueStructure
    this.sectionContainer = sectionContainer
    this.sectionElement = this.sectionContainer.querySelector("#sectionElement")
    this.input = this.sectionContainer.querySelector("input")

    this.input.oninput = this.oninput
    this.input.onblur = this.onblur
    this.input.onfocus = this.onfocus

    this.sectionElement.onclick = this.sectionElementOnclick
    this.setSectionElements(values)
    this.disableSelect()
  }

  oninput = event => {

    event.target.value = event.target.value.replace(/\s+/g, " ")

    const filter = event.target.value.toLowerCase()
    const filteredValues = this.values.filter(value => value[this.valueStructure].toLowerCase().includes(filter))


    this.hasError = true
    if (filteredValues.length === 1) {

      this.hasError = false
      this.onSelectChange(filteredValues[0])
    }
    this.setSectionElements(filteredValues)
  }

  setValues = (newValues) => {
    this.values = newValues
    this.setSectionElements(newValues)
  }

  onblur = () => {

    setTimeout(this.disableSelect, 500)
  }

  setSectionElements = (filteredValues) => {

    let HTML = ""

    for (const { [this.idStructure]: id, [this.valueStructure]: value } of filteredValues) {

      HTML += `<p data-id='${id}'>${value}</p>`
    }

    this.sectionElement.innerHTML = HTML
  }

  sectionElementOnclick = event => {

    const { id } = event.target?.dataset || {};

    if (!id) return;

    this.input.value = event.target.textContent
    this.hasError = false
    this.onSelectChange({
      [this.idStructure]: id,
      [this.valueStructure]: event.target.textContent
    })
  }

  activeSelect = () => {

    if (!this.sectionElement.classList.contains("select-opacity")) return
    this.sectionElement.classList.remove("select-opacity")
  }

  disableSelect = () => {

    if (this.sectionElement.classList.contains("select-opacity")) return
    this.sectionElement.classList.add("select-opacity")

  }

  onfocus = () => {

    this.activeSelect()
  }

  onSelectChange = () => { }

}