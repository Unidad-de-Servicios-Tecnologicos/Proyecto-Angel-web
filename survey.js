import { RightSectionBarProvider, HTMLStructureProvider } from "./public/js/dom-providers/index.js"
import { tableBuilder } from "./public/js/helpers/HTML.utils.js"
import { ObjectTransformer, useFetch } from "./public/js/helpers/index.js"
import { UseSelector } from "./public/js/helpers/selector.js"

const selector = new UseSelector({
    id: "#table",
    dataset: "survey-table",
    datasetAttribute: "surveyTable"
})

const htmlProvider = new HTMLStructureProvider()
const rightSectionBarProvider = new RightSectionBarProvider({ voidWhenClose: true })
const objectTransformer = new ObjectTransformer()

rightSectionBarProvider.useSelector.pushToClickContext("getQuestionOptions", async ({ target }) => {

    const { id } = rightSectionBarProvider.useSelector.getId(target)
    const { result } = await useFetch({
        getJson: true,
        url: `./controllers/AdminTraitsController.php?type=getQuestionOptions&questionId=${id}`,
        method: "GET"
    })

    let HTML = ""
    for (const obj of result?.questionOptions ?? []) {

        const convertedObject = objectTransformer.questionOption(obj)
        for (const key in convertedObject) {

            const option = convertedObject[key]
            HTML += htmlProvider.userOrganizationHTML({
                label: option.key,
                value: option.value,
            })
        }

        HTML = `
        <div>
            ${HTML}
            <button data-${rightSectionBarProvider.dataset}-on-click='getOptions'
                data-${rightSectionBarProvider.dataset}-id='${convertedObject.id_pregunta.value}'
            >
                Ver Opciones de la pregunta
            </button>
        </div>
        `
    }

    HTML = htmlProvider.userOrganizationParentHTML({
        children: HTML
    })

    rightSectionBarProvider.addBody([
        {
            id: 1,
            body: HTML
        }
    ], {
        replaceWhenEqual: true,
        percentagePerChild: 40
    })
})

rightSectionBarProvider.useSelector.pushToClickContext("getOptions", async ({ target }) => {

    const { id } = rightSectionBarProvider.useSelector.getId(target)

    const { result } = await useFetch({
        getJson: true,
        url: `./controllers/AdminTraitsController.php?type=getQuestionOptions&questionId=${id}`,
        method: "GET"
    })

    rightSectionBarProvider.addBody([
        {
            id: 2,
            body: "<h2>The other body</h2>"
        }
    ], {
        percentagePerChild: 40,
        replaceWhenEqual: true
    })
})

selector.onClick({

    showOptions: async () => {
        const { result, request } = await useFetch({
            getJson: true,
            url: `./controllers/AdminTraitsController.php?type=getQuestionsBySurveyId&surveyId=1`,
            method: "GET"
        })

        if (!request?.ok) return alert("Hubo un error")
        const transformedResult = result.surveyQuestions?.map(s => objectTransformer.surveyQuestions(s)) ?? []

        const table = tableBuilder(transformedResult, {
            transform: {
                tdValue: val => val.value,
                customHeader: Object.keys(transformedResult[0]).map(s => transformedResult[0][s].key),
                opToHeader: "Opciones",
                opToBody: ({ id_pregunta }) => `<button
                data-${rightSectionBarProvider.dataset}-on-click="getQuestionOptions"
                data-${rightSectionBarProvider.dataset}-id="${id_pregunta?.value}"
                >Opciones de la pregunta</button>`
            }
        })

        rightSectionBarProvider
            .active()
            .content.innerHTML = table

    }
})