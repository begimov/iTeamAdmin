export default {
  materialOptions (state) {
    return state.options.materials
  },
  materialParams (state) {
    return state.params.materials
  },
  testOptions (state) {
    return state.options.tests
  },
  testParams (state) {
    return state.params.tests
  },
  categoryOptions (state) {
    return state.options.categories
  },
  categoryParams (state) {
    return state.params.category
  },
  getName(state) {
    return state.params.name
  },
  getBasePrice(state) {
    return state.params.price
  },
  getPriceTagPrice(state) {
    return state.options.priceTag.price
  },
  getPriceTagName(state) {
    return state.options.priceTag.name
  },
  isNewMaterialOn(state) {
    return state.isNewMaterialOn
  },
  isLoading(state) {
    return state.isLoading
  },
  priceTags(state) {
    return state.params.priceTags
  },
  errors (state) {
    return state.errors
  },
}
