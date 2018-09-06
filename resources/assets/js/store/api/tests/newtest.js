export default {
  getInitialData() {
    return new Promise((resolve, reject) => {
      axios.get(`/webapi/tests/create`).then(res => {
        resolve(res)
      })
    })
  },
  saveTest(test) {
    return new Promise((resolve, reject) => {
      axios.post(`/webapi/tests`, test).then(res => {
        resolve(res)
      }).catch(err => {
        reject(err)
      })
    })
  },
  // processData(page, elements) {
  //   return {
  //     name: page.name,
  //     description: page.desc,
  //     category_id: page.category ? page.category.id : null,
  //     theme_id: page.theme ? page.theme.id : null,
  //     elements
  //   }
  // },
  // getPage(id) {
  //   return new Promise((resolve, reject) => {
  //     axios.get(`/webapi/pages/${id}/edit`).then(res => {
  //       resolve(res)
  //     })
  //   })
  // },
  // updatePage(id, page, elements) {
  //   return new Promise((resolve, reject) => {
  //     axios.patch(`/webapi/pages/${id}`, this.processData(page, elements)).then(res => {
  //       resolve(res)
  //     }).catch(err => {
  //       reject(err)
  //     })
  //   })
  // }
}
