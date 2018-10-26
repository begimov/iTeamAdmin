export default {
  getProducts(page, params) {
    return new Promise((resolve, reject) => {
      axios.get(`/webapi/products?page=${page}`, {params: this.preparePayload(params)}).then(res => {
        resolve(res)
      })
    })
  },
  preparePayload(data) {
    return {
      searchQuery: data.searchQuery,
      categories: _.map(data.categories, (category) => category.id),
      ...data.orderBy,
      cost: data.cost ? data.cost.id : null
    }
  }
}
