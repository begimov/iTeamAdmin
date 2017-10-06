export default {
  getPages(page, params) {
    return new Promise((resolve, reject) => {
      axios.get(`/webapi/pages?page=${page}`, {
        params: {
          params
        }
      }).then(res => {
        resolve(res)
      })
    })
  }
}