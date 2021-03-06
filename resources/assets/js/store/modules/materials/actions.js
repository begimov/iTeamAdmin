import api from '../../api'

export default {
  getMaterials ({commit, state}, page = 1) {
    commit('setIsLoading', true)
    api.materials.getMaterials(page, state.params).then(res => {
      commit('setMaterials', res.data)
      commit('setIsLoading', false)
    })
  },
  updateSearchQuery ({ commit }, value) {
    commit('updateSearchQuery', value)
  },
  setCurrentModule ({ commit }, value) {
    commit('setCurrentModule', value)
  },
  setEditedMaterialId ({ commit }, id) {
    commit('setEditedMaterialId', id)
    commit('setCurrentModule', 'newmaterial')
  },
}
