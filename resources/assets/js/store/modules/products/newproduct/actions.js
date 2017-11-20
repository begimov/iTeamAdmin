import api from '../../../api'

export default {
  getInitialData ({ commit }) {
    commit('setIsLoading', true)
    api.newproduct.getInitialData().then(res => {
      commit('setCategories', res.data.categories.data)
      commit('setMaterials', res.data.materials.data)
      commit('setIsLoading', false)
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
  addPriceTag ({ commit }) {
    commit('addPriceTag')
  },
  removePriceTag ({ commit }, index) {
    commit('removePriceTag', index)
  },
  saveProduct ({ commit, state }) {
    commit('setIsLoading', true)
    api.newproduct.saveProduct(state.params).then(res => {
      console.log(res)
      // commit('setCategories', res.data.categories.data)
      // commit('setMaterials', res.data.materials.data)
      commit('setIsLoading', false)
    })
  },
}
