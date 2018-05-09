export default {
  getInitialData() {
    return new Promise((resolve, reject) => {
      axios.get(`/webapi/pages/create`).then(res => {
        resolve(res)
      })
    })
  },
  savePage(payload) {
    return new Promise((resolve, reject) => {
      axios.post(`/webapi/pages`, payload).then(res => {
        resolve(res)
      }).catch(err => {
        reject(err)
      })
    })
  },
  getPage(id) {
    return new Promise((resolve, reject) => {
      axios.get(`/webapi/pages/${id}/edit`).then(res => {
        resolve(res)
      })
    })
  }
}
