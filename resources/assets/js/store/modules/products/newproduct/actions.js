import api from '../../../api'

export default {
  getInitialData ({ commit }) {
    commit('setIsLoading', true)
    api.newproduct.getInitialData().then(res => {
      commit('setCategories', res.data.categories.data)
      commit('setMaterials', res.data.materials.data)
      commit('setTests', res.data.tests.data)
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
  switchNewMaterial ({ commit }, value) {
    commit('switchNewMaterial', value)
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
      commit('resetState')
      commit('setIsLoading', false)
      commit('products/setCurrentModule', 'products', { root: true })
    }).catch(err => {
      commit('setErrors', err.response.data)
      commit('setIsLoading', false)
    })
  },
  resetState ({ commit }) {
    commit('resetState')
  },
  setProductToEdit ({ commit }, id) {
    commit('setIsLoading', true)
    api.newproduct.getProduct(id).then(res => {
      commit('setProductToEdit', res.data.data)
      commit('setIsLoading', false)
    })
  },
  removeMaterial ({ commit }, id) {
    commit('removeMaterial', id)
  },
  updateProduct ({ commit, dispatch, state }, id) {
    commit('setIsLoading', true)
    api.newproduct.updateProduct(state.params, id).then(res => {
      dispatch('setProductToEdit', id)
    }).catch(err => {
      commit('setErrors', err.response.data)
      commit('setIsLoading', false)
    })
  }
}
