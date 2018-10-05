export default {
  saveReview(review) {
    return new Promise((resolve, reject) => {
      axios.post(`/webapi/reviews`, review).then(res => {
        resolve(res)
      }).catch(err => {
        reject(err)
      })
    })
  }
}
