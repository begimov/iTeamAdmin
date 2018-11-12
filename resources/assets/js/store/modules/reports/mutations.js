export default {
  setDailyReport (state, report) {
    state.reports.dailyReport = report.data
  },
  setIsLoading (state, flag) {
    state.isLoading = flag
  }
}
