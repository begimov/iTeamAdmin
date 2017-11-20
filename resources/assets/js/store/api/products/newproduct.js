export default {
  getInitialData() {
    return new Promise((resolve, reject) => {
      axios.get(`/webapi/products/create`).then(res => {
        resolve(res)
      })
    })
  },
  saveProduct(data) {
    return new Promise((resolve, reject) => {
      axios.post(`/webapi/products`).then(res => {
        resolve(res)
      })
    })
  },
}
