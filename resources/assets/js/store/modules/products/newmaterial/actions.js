import api from '../../../api'

export default {
  getMaterialId ({dispatch, commit, state}) {
    commit('setIsLoading', true)
    api.newmaterial.getMaterialId().then(res => {
      commit('setMaterialId', res.data.material.data.id)
      commit('setIsLoading', false)
    })
  },
  saveMaterial ({dispatch, commit, state}) {
    commit('setIsLoading', true)
    api.newmaterial.saveMaterial(state.params).then(res => {
      commit('setIsLoading', false)
    })
  },
  updateName ({ commit }, value) {
    commit('updateName', value)
  },
  updateVideoId ({ commit }, value) {
    commit('updateVideoId', value)
  },
  addVideo ({ commit }) {
    commit('addVideo')
  },
}
