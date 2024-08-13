const allowNumbers = (element) => {
    const isNumber = new RegExp(/^[\d+]+$/g).test(element.target.value)

    if (!isNumber) {
        element.target.value = element.target.value.slice(0, -1)
    }
}

const allowLetters = (element) => {
    const isLetter = new RegExp(/^[A-Za-z ]+$/g).test(element.target.value)

    if (!isLetter) {
        element.target.value = element.target.value.slice(0, -1)
    }
}


const form = document.querySelector("#onRegister")
const alertHTML = text => `<div class="warn-alert" 
role="alert" id='alert-error'>
${text}</div>`
const passwordElement = form.querySelector("[name='password']")
const phoneElement = form.querySelector("[name='phone']")
const phoneNumberElement = form.querySelector("[name='phoneNumber']")
const idElement = form.querySelector("[name='id']")
const nameElement = document.querySelector("[name='inputFirstName']")

const lastnameElement = document.querySelector("[name='inputLastName']")

Array.from([
    nameElement,
    lastnameElement
]).forEach(e => {
    e.oninput = allowLetters
})

Array.from([
    idElement,
    phoneElement,
    phoneNumberElement
]).forEach(e => {
    e.oninput = allowNumbers
})

form.onsubmit = event => {

    event.preventDefault()
    const formData = new FormData(form)
    const { password, phone, phoneNumber, id, ...object } = Object.fromEntries(formData)

    Array.from(form.querySelectorAll("#alert-error")).forEach(child => {
        child.remove()
    })

    if (!onValidate(password).password()) {
        passwordElement.insertAdjacentHTML("afterend", alertHTML("Por favor, verifica los campos de la contraseña."))
    }
    if (!onValidate(phone).phone()) {
        phoneElement.insertAdjacentHTML("afterend", alertHTML("Debe tener Min 7 Caracteres."))

    }
    if (!onValidate(phoneNumber).phoneNumber()) {
        phoneNumberElement.insertAdjacentHTML("afterend", alertHTML("Debe tener Min 10 Caracteres."))
    }
    if (!onValidate(id).id()) {
        idElement.insertAdjacentHTML("afterend", alertHTML("Debe tener Min 10 Caracteres"))
        console.log(idElement)
        console.log(onValidate(idElement).id())
    }
}

const onValidate = (element = String("")) => ({

    phoneNumber: () => element.length >= 10 && element.length <= 15,
    phone: () => (element.length >= 7 && element.length <= 10) || element === "",
    id: () => element.length >= 7 && element.length <= 15,
    password: () => new RegExp(/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{7,100}$/g).test(element)
})

$('#submit').click(function(){
    Swal.fire({
        position: "top-end",
        icon: "success",
        title: "Your work has been saved",
        showConfirmButton: false,
        timer: 1500
      });

});