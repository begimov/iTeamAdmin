export default {
  getProducts(page, params) {
    return new Promise((resolve, reject) => {
      axios.get(`/webapi/products?page=${page}`, {params}).then(res => {
        resolve(res)
      })
    })
  }
}
