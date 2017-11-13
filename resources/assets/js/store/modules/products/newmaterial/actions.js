import api from '../../../api'

export default {
  getMaterialId ({dispatch, commit, state}) {
    // commit('setIsLoading', true)
    api.newmaterial.getMaterialId().then(res => {
      commit('setMaterialId', res.data.material.data.id)
      // commit('setIsLoading', false)
    })
  },
  // updateMaterialParams ({ commit }, value) {
  //   commit('updateMaterialParams', value)
  // }
}
