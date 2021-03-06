export default {
  getDailyReport() {
    return new Promise((resolve, reject) => {
      axios.get(`/webapi/reports/daily`).then(res => {
        resolve(res)
      })
    })
  },
  getWeeklyReport() {
    return new Promise((resolve, reject) => {
      axios.get(`/webapi/reports/weekly`).then(res => {
        resolve(res)
      })
    })
  },
  getMonthlyReport() {
    return new Promise((resolve, reject) => {
      axios.get(`/webapi/reports/monthly`).then(res => {
        resolve(res)
      })
    })
  }
}
