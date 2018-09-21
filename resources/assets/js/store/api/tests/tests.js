export default {
  getTests(page, params) {
    return new Promise((resolve, reject) => {
      axios.get(`/webapi/tests?page=${page}`, {params}).then(res => {
        resolve(res)
      })
    })
  }
}
