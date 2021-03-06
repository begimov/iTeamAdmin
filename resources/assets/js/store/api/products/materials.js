export default {
  getMaterials(page, params) {
    return new Promise((resolve, reject) => {
      axios.get(`/webapi/materials?page=${page}`, {params}).then(res => {
        resolve(res)
      })
    })
  }
}
