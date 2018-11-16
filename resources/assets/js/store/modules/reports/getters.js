export default {
  isLoading (state) {
    return state.isLoading
  },
  dailyReport (state) {
    return state.reports.dailyReport
  },
  weeklyReport (state) {
    return state.reports.weeklyReport
  },
  monthlyReport (state) {
    return state.reports.monthlyReport
  }
}
