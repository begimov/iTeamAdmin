import api from '../../api'

export default {
  getReviews ({commit, state}, page = 1) {
    console.log('RRR')
    // commit('setIsLoading', true)
    // api.tests.getTests(page, state.params).then(res => {
    //   commit('setTests', res.data)
    //   commit('setIsLoading', false)
    // })
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
