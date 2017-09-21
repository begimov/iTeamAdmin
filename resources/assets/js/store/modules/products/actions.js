import api from '../../api'

export default {
  getProducts ({dispatch, commit}, page = 1) {
    commit('setLoadingProducts', true)
    api.products.getProducts(page).then(res => {
      commit('setProducts', res.data)
      commit('setLoadingProducts', false)
    })
  }
}
