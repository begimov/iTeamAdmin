import api from '../../api'

export default {
  getReviews ({commit, state}, page = 1) {
    commit('setIsLoading', true)
    api.reviews.getReviews(page, state.params).then(res => {
      commit('setReviews', res.data)
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
