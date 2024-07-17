
export const tableBuilder = (elements, onCall = {}) => {

    const { tdValue, customHeader, opToHeader, opToBody } = onCall?.transform || {}
    let BODY = ""

    const headerKeys = customHeader ?? Object.keys(elements[0])

    let header = headerKeys.map(h => `<th scope="col">${h}</th>`).join("")

    elements.forEach(el => {

        if (onCall?.transform?.transformObj) {
            el = onCall.transform.transformObj(el)
        }

        const values = Object.values(el)

        let VALUES = ""

        for (const key in el) {

            const value = el[key]
            const { tdId, tdCaller, useTh } = onCall[key] ?? {}

            if (typeof tdCaller === "function") {
                VALUES += tdCaller(values)
            }
            else if (tdId) {
                VALUES += `<td ${tdId}>${value}</td>`
            }
            else if (useTh) {
                VALUES += `<th>${value}</th>`
            }
            else if (typeof tdValue === "function") {
                VALUES += `<td>${tdValue(value)}</td>`
            }
            else {
                VALUES += `<td>${value}</td>`
            }


        }

        if (typeof opToBody === "function") {
            VALUES += `<td>${opToBody(el)}</td>`
        }

        BODY += `<tr>${VALUES}</tr>`

    })

    return `
        <table class="table table-striped">
        <thead>
          <tr>
          ${header}
          ${opToHeader ? `<th>${opToHeader}</th>` : ""}
          </tr>
        </thead>
        <tbody>
            ${BODY}
        </tbody>
      </table>
    
    `
}