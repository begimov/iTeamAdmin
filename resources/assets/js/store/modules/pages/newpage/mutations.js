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
    setErrors(state, errors) {
        state.errors = errors
    },
    updateCategoryParams(state, value) {
        state.page.category = value
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
              themes:[],
            },
            page: {
              category: null,
              theme: null,
              name: '',
              desc: ''
            },
            blocks: [],
            layout: {
              blocks: [],
              elements: []
            },
            errors: {}
        }
        Object.keys(initialState).forEach(key => {
            state[key] = initialState[key]
        })
    },
    setPageToEdit(state, payload) {
        const { name, description, category, elements } = payload

        state.page = {
            name,
            desc: description,
            category: category.data
        }

        new Promise ((resolve, reject) => { 
            elements.data.forEach(element => {
                state.layout.blocks.push({
                    id: uuidv4(),
                    tag: element.block.data.tag
                })
            })
            resolve()
        }).then(res => {
            state.layout.elements.forEach((element, index) => {
                element.data.data = {...elements.data[index].data}
            });
        })

        function uuidv4() {
            return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
              var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
              return v.toString(16);
            });
         }
    }
}
