export default {
    setIsLoading(state, value) {
        state.isLoading = value
    },
    setBlocks(state, value) {
        state.blocks = value
    },
    setCategoriesOptions(state, payload) {
        state.options.categories = payload
    },
    updateCategoryParams(state, value) {
        state.page.categoryId = value.id
    },
    updatePageName(state, name) {
        state.page.name = name
    },
    updatePageDesc(state, desc) {
        state.page.desc = desc
    },
    addBlockToLayout(state, data) {
        state.layout.blocks.push(data)
    },
    addElementToElements(state, value) {
        state.layout.elements.push(value)
    },
    moveElementUp(state, { id, type }) {
        const index = _.findIndex(state.layout[type], function(elem) {
            return elem.id === id
        })
        if (index === 0) return

        const head = _.slice(state.layout[type], 0, index - 1)
        const tail = _.slice(state.layout[type], index - 1)
        const filteredTail = _.filter(tail, function(elem) {
            return elem.id !== id
        })

        state.layout[type] = [ ...head, state.layout[type][index], ...filteredTail ]
    },
    moveElementDown(state, { id, type }) {
        const index = _.findIndex(state.layout[type], function(elem) {
            return elem.id === id
        })
        if (index === state.layout[type].length - 1) return

        const head = _.slice(state.layout[type], 0, index + 2)
        const tail = _.slice(state.layout[type], index + 2)
        const filteredHead = _.filter(head, function(element) {
            return element.id !== id
        })

        state.layout[type] = [ ...filteredHead, state.layout[type][index], ...tail ]
    },
    deleteElement(state, id) {
        state.layout.blocks = _.filter(state.layout.blocks, function (o) { return o.id != id; })
        state.layout.elements = _.filter(state.layout.elements, function (o) { return o.id != id; })
    },
}
