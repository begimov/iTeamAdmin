import api from '../../../api'

export default {
  getInitialData ({ commit }) {
    // commit('setIsLoading', true)
    api.newproduct.getInitialData().then(res => {
      commit('setCategories', res.data.categories.data)
      commit('setMaterials', res.data.materials.data)
      // this.options.products = response.data.products.data
      // this.params.paymentState = this.options.paymentStates[0]
      // commit('setMaterialId', res.data.material.data.id)
      // commit('setIsLoading', false)
    })
  },
  updateMaterialParams ({ commit }, value) {
    commit('updateMaterialParams', value)
  },
  updateCategoryParams ({ commit }, value) {
    commit('updateCategoryParams', value)
  },
  updateName ({ commit }, value) {
    commit('updateName', value)
  },
  updateBasePrice ({ commit }, value) {
    commit('updateBasePrice', value)
  },
  updatePriceTagPrice ({ commit }, value) {
    commit('updatePriceTagPrice', value)
  },
  updatePriceTagName ({ commit }, value) {
    commit('updatePriceTagName', value)
  },
  newMaterialOn ({ commit }) {
    commit('newMaterialOn')
  },
  addPrice ({ commit }) {
    commit('addPrice')
  },
}
