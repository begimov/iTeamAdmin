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
        data: _.omitBy(data, function(param, key) {
          return _.isNull(param) || param.length === 0
        })
      }).then(res => {
        resolve(res)
      }).catch(err => {
        reject(err)
      })
    })
  },
}
