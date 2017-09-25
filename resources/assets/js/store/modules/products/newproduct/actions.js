import api from '../../../api'

export default {
  updateMaterialParams ({ commit }, value) {
    commit('updateMaterialParams', value)
  },
  updateCategoryParams ({ commit }, value) {
    commit('updateCategoryParams', value)
  },
  updateName ({ commit }, value) {
    commit('updateName', value)
  }
}
