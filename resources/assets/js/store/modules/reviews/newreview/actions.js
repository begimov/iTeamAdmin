import api from '../../../api'

export default {
  // getInitialData ({ commit }) {
  //   return new Promise((resolve, reject) => {
  //     commit('setIsLoading', true)
  //     api.newtest.getInitialData().then(res => {
  //       commit('setTypesOptions', res.data.types.data)
  //       commit('setIsLoading', false)
  //       resolve(res)
  //     })
  //   })
  // },
  updateAuthor ({ commit }, author) {
    commit('updateAuthor', author)
  },
  updatePosition ({ commit }, position) {
    commit('updatePosition', position)
  },
  updateQuote ({ commit }, quote) {
    commit('updateQuote', quote)
  },
  save ({ commit, state }) {
    commit('setIsLoading', true)
    api.newreview.saveReview(state.review).then(res => {
      commit('resetState')
      commit('setIsLoading', false)
      commit('reviews/setCurrentModule', 'reviews', { root: true })
    }).catch(err => {
      // commit('setErrors', err.response.data)
      // commit('setIsLoading', false)
    })
  },
  resetState ({ commit }) {
    commit('resetState')
  },
  // setPageToEdit ({ commit }, id) {
  //   commit('setIsLoading', true)
  //   api.newpage.getPage(id).then(res => {
  //     commit('setPageToEdit', res.data.data)
  //     commit('setIsLoading', false)
  //   })
    
  // },
  // update ({ commit, state }, id) {
  //   commit('setIsLoading', true)
  //   const elements = _.map(state.layout.elements, (element) => {
  //     return { data: element.data.data, meta: element.data.meta }
  //   })
  //   api.newpage.updatePage(id, state.page, elements).then(res => {
  //     commit('setIsLoading', false)
  //   }).catch(err => {
  //     commit('setErrors', err.response.data)
  //     commit('setIsLoading', false)
  //   })
  // }
}
