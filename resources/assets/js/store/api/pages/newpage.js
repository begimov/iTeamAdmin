export default {
  getInitialData() {
    return new Promise((resolve, reject) => {
      axios.get(`/webapi/pages/create`).then(res => {
        resolve(res)
      })
    })
  },
  savePage(page, elements) {
    return new Promise((resolve, reject) => {
      axios.post(`/webapi/pages`, this.processData(page, elements)).then(res => {
        resolve(res)
      }).catch(err => {
        reject(err)
      })
    })
  },
  processData(page, elements) {
    return {
      name: page.name,
      description: page.desc,
      category_id: page.category ? page.category.id : null,
      theme_id: page.theme ? page.theme.id : null,
      elements
    }
  },
  getPage(id) {
    return new Promise((resolve, reject) => {
      axios.get(`/webapi/pages/${id}/edit`).then(res => {
        resolve(res)
      })
    })
  },
  updatePage(id, page, elements) {
    return new Promise((resolve, reject) => {
      axios.patch(`/webapi/pages/${id}`, this.processData(page, elements)).then(res => {
        resolve(res)
      }).catch(err => {
        reject(err)
      })
    })
  }
}
