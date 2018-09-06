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
      axios.post(`/webapi/tests`, this.processData(test)).then(res => {
        resolve(res)
      }).catch(err => {
        reject(err)
      })
    })
  },
  processData(test) {
    return {
      name: test.name,
      description: test.desc,
      type_id: test.type ? test.type.id : null
    }
  },
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
