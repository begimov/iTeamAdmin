export default {
  getDailyReport() {
    return new Promise((resolve, reject) => {
      axios.get(`/webapi/reports/daily`).then(res => {
        resolve(res)
      })
    })
  }
}
