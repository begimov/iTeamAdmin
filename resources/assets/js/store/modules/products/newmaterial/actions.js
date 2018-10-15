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
      dispatch('materials/getMaterials', null, { root: true })
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
  },
  setMaterialToEdit ({ commit }, id) {
    commit('setIsLoading', true)
    api.newmaterial.getMaterial(id).then(res => {
      commit('setMaterialToEdit', res.data.data)
      commit('setIsLoading', false)
    })
  },
  removeDeletedFile ({ commit }, id) {
    commit('removeDeletedFile', id)
  },
  updateMaterial ({ commit, dispatch, state }, id) {
    commit('setIsLoading', true)
    api.newmaterial.updateMaterial(state.params, id).then(res => {
      dispatch('setMaterialToEdit', id)
    }).catch(err => {
      commit('setErrors', err.response.data)
      commit('setIsLoading', false)
    })
  }
}
