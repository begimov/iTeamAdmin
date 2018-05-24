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
      axios.post(`/webapi/products`, this.processData(data)).then(res => {
        resolve(res)
      }).catch(err => {
        reject(err)
      })
    })
  },
  processData(data) {
    return {
      name: data.name,
      price: data.price,
      category_id: data.category ? data.category.id : null,
      materials: data.materials,
      priceTags: data.priceTags
    }
  },
  getProduct(id) {
    return new Promise((resolve, reject) => {
      axios.get(`/webapi/products/${id}/edit`).then(res => {
        resolve(res)
      })
    })
  },
  updateProduct(data, id) {
    return new Promise((resolve, reject) => {
      axios.patch(`/webapi/products/${id}`, this.processData(data)).then((res) => {
        resolve(res)
      }).catch((err) => {
        reject(err)
      })
    })
  }
}
