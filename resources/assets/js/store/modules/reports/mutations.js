export default {
  setDailyReport (state, report) {
    state.reports.dailyReport = report.data
  },
  setWeeklyReport (state, report) {
    state.reports.weeklyReport = report.data
  },
  setMonthlyReport (state, report) {
    state.reports.monthlyReport = report.data
  },
  setIsLoading (state, flag) {
    state.isLoading = flag
  }
}
