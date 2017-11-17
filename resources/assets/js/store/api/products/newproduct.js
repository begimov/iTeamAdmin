export default {
  getInitialData() {
    return new Promise((resolve, reject) => {
      axios.get(`/webapi/products/create`).then(res => {
        resolve(res)
      })
    })
  },
}
