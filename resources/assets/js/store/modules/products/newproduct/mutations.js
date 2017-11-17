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
        state.params.categories = value
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
    addPrice(state) {
        state.params.priceTags.push(state.options.priceTag)
    },
}
