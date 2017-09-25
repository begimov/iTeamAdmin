export default {
  updateMaterialParams (state, value) {
      state.params.materials = value
  },
  updateCategoryParams (state, value) {
      state.params.categories = value
  },
  updateName (state, value) {
      state.params.name = value
  },
  updateBasePrice (state, value) {
      state.params.basePrice = value
  }
}
