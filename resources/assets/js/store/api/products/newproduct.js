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
      axios.post(`/webapi/products`, {
        name: data.name,
        price: data.price,
        category_id: data.category.id,
        materials: data.materials,
        priceTags: data.priceTags
      }).then(res => {
        resolve(res)
      }).catch(err => {
        reject(err)
      })
    })
  },
  getProduct(id) {
    return new Promise((resolve, reject) => {
      axios.get(`/webapi/products/${id}/edit`).then(res => {
        resolve(res)
      })
    })
  }
}
