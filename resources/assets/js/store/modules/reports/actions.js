import api from '../../api'

export default {
  getReports ({commit}) {
    commit('setIsLoading', true)
    api.reports.getDailyReport().then(res => {
      commit('setDailyReport', res.data.data)
      commit('setIsLoading', false)
    })
  }
}
