export default {
    setCategories(state, value) {
        state.options.categories = value
    },
    setMaterials(state, value) {
        state.options.materials = value
    },
    updateMaterialParams(state, value) {
        state.params.materials = value
    },
    updateCategoryParams(state, value) {
        state.params.category = value
    },
    updateName(state, value) {
        state.params.name = value
    },
    updateBasePrice(state, value) {
        state.params.basePrice = value
    },
    updatePriceTagPrice(state, value) {
        state.options.priceTag.price = value
    },
    updatePriceTagName(state, value) {
        state.options.priceTag.name = value
    },
    newMaterialOn(state) {
        state.isNewMaterialOn = true
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
                priceTag: { price: null, name: null }
            },
            params: {
                category: null,
                name: null,
                materials: [],
                basePrice: null,
                priceTags: [],
            },
            isLoading: false,
            errors: {},
            isNewMaterialOn: false
        }
        Object.keys(initialState).forEach(key => {
            state[key] = initialState[key]
        })
    }
}
