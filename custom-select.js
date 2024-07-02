

class CustomSelect {

  constructor({ values, sectionContainer }) {

    this.values = values
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
    const filteredValues = this.values.filter(value => value.value.toLowerCase().includes(filter))

    this.setSectionElements(filteredValues)
  }

  onblur = () => {

    setTimeout(this.disableSelect, 500)
  }

  setSectionElements = (filteredValues) => {

    let HTML = ""

    for (const { value, id } of filteredValues) {

      HTML += `<p data-id='${id}'>${value}</p>`
    }

    this.sectionElement.innerHTML = HTML
  }

  sectionElementOnclick = event => {

    const { id } = event.target?.dataset || {};

    if (!id) return;

    this.input.value = event.target.textContent
    console.log("Clicked")
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

}

new CustomSelect({
  values: [
    {
      value: "Sebas",
      id: 2
    }
  ],
  sectionContainer: document.querySelector("#sectionContainer")
})
