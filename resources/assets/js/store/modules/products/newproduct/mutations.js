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
    resetParams(state) {
        state.params.name = null
        state.params.basePrice = null
        state.params.materials = []
        state.params.priceTags = []
    },
}
