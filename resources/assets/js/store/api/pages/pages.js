export default {
  getPages(page, params) {
    return new Promise((resolve, reject) => {
      axios.get(`/webapi/pages?page=${page}`, {params}).then(res => {
        resolve(res)
      })
    })
  },
  getAvailableBlocks() {
    return new Promise((resolve, reject) => {
      axios.get(`/webapi/pages/create`).then(res => {
        resolve(res)
      })
    })
  },
  savePage(payload) {
    return new Promise((resolve, reject) => {
      axios.get(`/webapi/pages/store`, { payload }).then(res => {
        resolve(res)
      })
    })
  }
}
