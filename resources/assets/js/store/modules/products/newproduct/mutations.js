export default {
    setCategories(state, value) {
        state.options.categories = value
    },
    setMaterials(state, value) {
        state.options.materials = value
    },
    setTests(state, value) {
        state.options.tests = value
    },
    setErrors(state, errors) {
        state.errors = errors
    },
    updateMaterialParams(state, value) {
        state.params.materials = value
    },
    updateTestParams(state, value) {
        state.params.tests = value
    },
    updateCategoryParams(state, value) {
        state.params.category = value
    },
    updateName(state, value) {
        state.params.name = value
    },
    updateBasePrice(state, value) {
        state.params.price = value
    },
    updatePriceTagPrice(state, value) {
        state.options.priceTag.price = value
    },
    updatePriceTagName(state, value) {
        state.options.priceTag.name = value
    },
    switchNewMaterial(state, value) {
        state.isNewMaterialOn = value
    },
    addPriceTag(state) {
        const priceTag = state.options.priceTag
        if (priceTag.price && priceTag.name) {
            state.params.priceTags.push({ ...priceTag })
            priceTag.price = null
            priceTag.name = null
        }
    },
    removePriceTag(state, index) {
        state.params.priceTags.splice(index, 1)
    },
    setIsLoading(state, value) {
        state.isLoading = value
    },
    resetState(state) {
        const initialState = {
            options: {
                materials: [],
                categories: [],
                tests: [],
                priceTag: { price: null, name: null }
            },
            params: {
                category: null,
                name: null,
                materials: [],
                tests: [],
                price: null,
                priceTags: [],
            },
            isLoading: false,
            errors: {},
            isNewMaterialOn: false
        }
        Object.keys(initialState).forEach(key => {
            state[key] = initialState[key]
        })
    },
    setProductToEdit(state, payload) {
        const {name, price, category, materials, tests, priceTags} = payload

        state.params = {
            name,
            price,
            category: category.data,
            materials: materials.data,
            tests: tests.data,
            priceTags: priceTags.data
        }
    },
    removeMaterial(state, id) {
        state.params.materials.splice(_.findIndex(state.params.materials, ['id', id]), 1)
    },
    removeTest(state, id) {
        state.params.tests.splice(_.findIndex(state.params.tests, ['id', id]), 1)
    }
}
