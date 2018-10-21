import api from '../../api'

export default {
  getPages ({dispatch, commit, state}, page = 1) {
    commit('setIsLoading', true)
    api.pages.getPages(page, state.params).then(res => {
      commit('setPages', res.data)
      commit('setIsLoading', false)
    })
  },
  updateSearchQuery ({ commit }, value) {
    commit('updateSearchQuery', value)
  },
  setCurrentModule ({ commit }, value) {
    commit('setCurrentModule', value)
  },
  setEditedPageId ({ commit }, id) {
    commit('setEditedPageId', id)
    commit('setCurrentModule', 'newpage')
  },
  updateCategoriesParams ({ commit }, categories) {
    commit('updateCategoriesParams', categories)
  },
  updateThemesParams ({ commit }, themes) {
    commit('updateThemesParams', themes)
  },
}
