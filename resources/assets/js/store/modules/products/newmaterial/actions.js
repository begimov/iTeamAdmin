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
      commit('resetState')
      commit('setIsLoading', false)
      commit('products/newproduct/switchNewMaterial', false, { root: true })

    }).catch((err) => {
      commit('setErrors', err.response.data)
      commit('setIsLoading', false)
    })
  },
  cancel ({ commit }) {
    commit('resetState')
    commit('products/newproduct/switchNewMaterial', false, { root: true })
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
  removeVideo ({ commit }) {
    commit('removeVideo')
  },
  resetState ({ commit }) {
    commit('resetState')
  }
}
