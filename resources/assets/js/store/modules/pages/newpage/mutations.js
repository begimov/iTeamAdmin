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

        state.layout[type].splice(index - 1, 0, state.layout[type].splice(index, 1)[0])
    },
    moveElementDown(state, { id, type }) {
        const index = _.findIndex(state.layout[type], function(elem) {
            return elem.id === id
        })
        if (index === state.layout[type].length - 1) return

        state.layout[type].splice(index + 1, 0, state.layout[type].splice(index, 1)[0])
    },
    deleteElement(state, id) {
        state.layout.blocks = _.filter(state.layout.blocks, function (o) { return o.id != id; })
        state.layout.elements = _.filter(state.layout.elements, function (o) { return o.id != id; })
    },
    resetState(state) {
        const initialState = {
            isLoading: false,
            options: {
              categories:[],
            },
            page: {
              categoryId: null,
              name: '',
              desc: ''
            },
            blocks: [],
            layout: {
              blocks: [],
              elements: []
            },
        }
        Object.keys(initialState).forEach(key => {
            state[key] = initialState[key]
        })
    }
}
