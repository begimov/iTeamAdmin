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
  getProductToEdit ({ commit }, value) {
    // TODO: getting product from server
    commit('setProductToEdit', value)
    commit('setCurrentModule', 'newproduct')
  },
}
