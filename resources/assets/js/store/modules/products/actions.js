import api from '../../api'

export default {
  getProducts ({dispatch, commit}, page = 1) {
    commit('setIsLoading', true)
    api.products.getProducts(page).then(res => {
      commit('setProducts', res.data)
      commit('setIsLoading', false)
    })
  },
  updateSearchQuery ({ commit }, value) {
    commit('updateSearchQuery', value)
  },
}
