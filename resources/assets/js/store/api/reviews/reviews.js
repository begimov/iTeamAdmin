export default {
  getReviews(page, params) {
    return new Promise((resolve, reject) => {
      axios.get(`/webapi/reviews?page=${page}`, {params}).then(res => {
        resolve(res)
      })
    })
  }
}
