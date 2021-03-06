import api from '../../../api'

export default {
  getInitialData ({ commit }) {
    return new Promise((resolve, reject) => {
      commit('setIsLoading', true)
      api.newtest.getInitialData().then(res => {
        commit('setTypesOptions', res.data.types.data)
        commit('setIsLoading', false)
        resolve(res)
      })
    })
  },
  updateTypeParams ({ commit }, value) {
    commit('updateTypeParams', value)
  },
  updateTestName ({ commit }, name) {
    commit('updateTestName', name)
  },
  updateTestDesc ({ commit }, desc) {
    commit('updateTestDesc', desc)
  },
  updateCertificate ({ commit }, cert) {
    commit('updateCertificate', cert)
  },
  save ({ commit, dispatch, state }) {
    commit('setIsLoading', true)
    api.newtest.saveTest(state.test).then(res => {
      commit('resetState')
      commit('setIsLoading', false)
      commit('tests/setCurrentModule', 'tests', { root: true })
      dispatch('tests/getTests', null, { root: true })
    }).catch(err => {
      commit('setErrors', err.response.data)
      commit('setIsLoading', false)
    })
  },
  resetState ({ commit }) {
    commit('resetState')
  },
  addQuestion ({ commit }) {
    commit('addQuestion')
  },
  addCondition ({ commit }) {
    commit('addCondition')
  },
  removeQuestion ({ commit }, index) {
    commit('removeQuestion')
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
