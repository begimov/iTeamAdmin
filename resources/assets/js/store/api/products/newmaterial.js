export default {
  getMaterialId() {
    return new Promise((resolve, reject) => {
      axios.get(`/webapi/materials/create`).then(res => {
        resolve(res)
      })
    })
  },
  saveMaterial(data) {
    return new Promise((resolve, reject) => {
      axios.post(`/webapi/materials`, data).then(res => {
        resolve(res)
      }).catch((err) => {
        resolve(err)
      })
    })
  },
}
