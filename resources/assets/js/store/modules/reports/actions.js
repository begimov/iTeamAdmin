import api from '../../api'

export default {
  getReports ({commit}) {
    commit('setIsLoading', true)
    api.reports.getDailyReport().then(res => {
      commit('setDailyReport', res.data.data)
      api.reports.getWeeklyReport().then(res => {
        commit('setWeeklyReport', res.data.data)
        api.reports.getMonthlyReport().then(res => {
          commit('setMonthlyReport', res.data.data)
          commit('setIsLoading', false)
        })
      })
    })
    
  }
}
