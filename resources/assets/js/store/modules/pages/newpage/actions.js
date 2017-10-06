import api from '../../../api'

export default {
  getAvailableBlocks ({ commit }, value) {
    commit('setIsLoading', true)

    api.pages.getAvailableBlocks().then(res => {
      _.forEach(res.data, function(value, key) {
        Vue.component(value.name, function (resolve, reject) {
          resolve({
            template: value.template,
            data () {
              return {...value.data}
            }
          })
        })
      });
      commit('setBlocks', res.data)
      commit('setIsLoading', false)
    })
  },
  addBlockToLayout ({ commit }, value) {
    commit('addBlockToLayout', value)
  },
}
