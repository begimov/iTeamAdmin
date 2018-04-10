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
    moveUpInBlocks(state, id) {
        const blockIndex = _.findIndex(state.layout.blocks, function(block) {
            return block.id === id
        })
        if (blockIndex === 0) return

        const head = _.slice(state.layout.blocks, 0, blockIndex - 1)
        const tail = _.slice(state.layout.blocks, blockIndex - 1)
        const filteredTail = _.filter(tail, function(block) {
            return block.id !== id
        })

        state.layout.blocks = [...head, state.layout.blocks[blockIndex], ...filteredTail]
    },
    moveUpInElements(state, id) {
        const elementIndex = _.findIndex(state.layout.elements, function(element) {
            return element.id === id
        })
        if (elementIndex === 0) return

        const head = _.slice(state.layout.elements, 0, elementIndex - 1)
        const tail = _.slice(state.layout.elements, elementIndex - 1)
        const filteredTail = _.filter(tail, function(element) {
            return element.id !== id
        })

        state.layout.elements = [...head, state.layout.elements[elementIndex], ...filteredTail]
    },
    moveDownInBlocks(state, id) {
        //
    },
    moveDownInElements(state, id) {
        //
    },
    deleteElement(state, id) {
        state.layout.blocks = _.filter(state.layout.blocks, function (o) { return o.id != id; })
        state.layout.elements = _.filter(state.layout.elements, function (o) { return o.id != id; })
    },
}
