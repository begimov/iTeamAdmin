export default {
  getProducts(page) {
    return new Promise((resolve, reject) => {
      axios.get(`/webapi/products?page=${page}`).then(res => {
        resolve(res)
      })
    })
  }
}
