import api from '../../api'

export default {
  getProducts ({dispatch, commit, state}, page = 1) {
    commit('setIsLoading', true)
    api.products.getProducts(page, state.params).then(res => {
      commit('setProducts', res.data)
      commit('setIsLoading', false)
    })
  },
  updateSearchQuery ({ commit }, value) {
    commit('updateSearchQuery', value)
  },
  setCurrentModule ({ commit }, value) {
    commit('setCurrentModule', value)
  },
  setEditedProductId ({ commit }, id) {
    commit('setEditedProductId', id)
    commit('setCurrentModule', 'newproduct')
  },
  updateCategoriesParams ({ commit }, categories) {
    commit('updateCategoriesParams', categories)
  },
  updateOrderByParams ({ commit }, params) {
    commit('updateOrderByParams', params)
  },
  updateCostParams ({ commit }, params) {
    commit('updateCostParams', params)
  },
}
