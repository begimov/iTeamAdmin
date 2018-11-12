import api from '../../api'

export default {
  getReports ({commit}) {
    commit('setIsLoading', true)
    api.reports.getReports().then(res => {
      console.log(res.data)
      // commit('setReviews', res.data)
      commit('setIsLoading', false)
    })
  }
}
