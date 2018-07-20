import api from '../../api'

export default {
  getMaterials ({commit, state}, page = 1) {
    commit('setIsLoading', true)
    api.materials.getMaterials(page, state.params).then(res => {
      console.log(res)
      // commit('setPages', res.data)
      commit('setIsLoading', false)
    })
  },
  // updateSearchQuery ({ commit }, value) {
  //   commit('updateSearchQuery', value)
  // },
  // setCurrentModule ({ commit }, value) {
  //   commit('setCurrentModule', value)
  // },
  // setEditedPageId ({ commit }, id) {
  //   commit('setEditedPageId', id)
  //   commit('setCurrentModule', 'newpage')
  // },
}
