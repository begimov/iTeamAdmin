import api from '../../api'

export default {
  getTests ({commit, state}, page = 1) {
    commit('setIsLoading', true)
    api.tests.getTests(page, state.params).then(res => {
      commit('setTests', res.data)
      commit('setIsLoading', false)
    })
  },
  updateSearchQuery ({ commit }, value) {
    commit('updateSearchQuery', value)
  },
  setCurrentModule ({ commit }, value) {
    commit('setCurrentModule', value)
  },
  // setEditedPageId ({ commit }, id) {
  //   commit('setEditedPageId', id)
  //   commit('setCurrentModule', 'newpage')
  // },
}
