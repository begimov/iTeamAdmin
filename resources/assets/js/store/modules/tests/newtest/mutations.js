export default {
    setIsLoading(state, value) {
        state.isLoading = value
    },
    setTypesOptions(state, payload) {
        state.options.types = payload
    },
    // setErrors(state, errors) {
    //     state.errors = errors
    // },
    updateTypeParams(state, value) {
        state.test.type = value
    },
    updateTestName(state, name) {
        state.test.name = name
    },
    updateTestDesc(state, desc) {
        state.test.desc = desc
    },
    updateCertificate(state, cert) {
        state.test.certificate = cert
    },
    resetState(state) {
        const initialState = {
            isLoading: false,
            options: {
                types:[],
            },
            test: {
                type: null,
                name: '',
                desc: '',
                questions: [],
                conditions: []
            },
            errors: {}
        }
        Object.keys(initialState).forEach(key => {
            state[key] = initialState[key]
        })
    },
    addQuestion(state) {
        state.test.questions.push({})
    },
    addCondition(state) {
        state.test.conditions.push({})
    },
    removeQuestion(state) {
        console.log('REMOVE')
    },
    // setPageToEdit(state, payload) {
    //     const { name, description, category, elements, theme } = payload

    //     state.page = {
    //         name,
    //         desc: description,
    //         category: category.data,
    //         theme: theme.data
    //     }

    //     new Promise ((resolve, reject) => { 
    //         elements.data.forEach(element => {
    //             state.layout.blocks.push({
    //                 id: uuidv4(),
    //                 tag: element.block.data.tag
    //             })
    //         })
    //         resolve()
    //     }).then(res => {
    //         state.layout.elements.forEach((element, index) => {
    //             element.data.data = {...elements.data[index].data}
    //         });
    //     })

    //     function uuidv4() {
    //         return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
    //           var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
    //           return v.toString(16);
    //         });
    //      }
    // }
}
