export default {
  getProducts(page) {
    return new Promise((resolve, reject) => {
      axios.get(`/webapi/products?page=${page}`, {
        params: {
          params: {
            orderBy: 1,
            filters: {
              payment_type_id: 2,
              payment_state_id: 3,
            },
            searchQuery: 4
          }
        }
      }).then(res => {
        resolve(res)
      })
    })
  }
}
