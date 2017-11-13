export default {
  getMaterialId() {
    return new Promise((resolve, reject) => {
      axios.get(`/webapi/materials`).then(res => {
        resolve(res)
      })
    })
  }
}
