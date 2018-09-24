export default {
    // setIsLoading(state, value) {
    //     state.isLoading = value
    // },
    // setErrors(state, errors) {
    //     state.errors = errors
    // },
    updateAuthor(state, author) {
        state.review.author = author
    },
    updatePosition(state, position) {
        state.review.position = position
    },
    updateQuote(state, quote) {
        state.review.quote = quote
    },
    resetState(state) {
        const initialState = {
            // isLoading: false,
            review: {
                author: '',
                position: '',
                quote: '',
            },
            // errors: {}
        }
        Object.keys(initialState).forEach(key => {
            state[key] = initialState[key]
        })
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
