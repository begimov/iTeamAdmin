import api from '../../../api'

export default {
  getMaterialId ({dispatch, commit, state}) {
    // commit('setIsLoading', true)
    api.newmaterial.getMaterialId().then(res => {
      console.log(res.data.id)
      // commit('setMaterialId', res.data)
      // commit('setIsLoading', false)
    })
  },
  // updateMaterialParams ({ commit }, value) {
  //   commit('updateMaterialParams', value)
  // }
}
