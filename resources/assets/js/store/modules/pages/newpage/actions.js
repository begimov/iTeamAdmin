import api from '../../../api'

export default {
  getAvailableBlocks ({ commit }, value) {
    commit('setIsLoading', true)

    let comp = [
      {
        id: 1,
        name: 'async-example',
        template: '<div>Я — асинхронный!</div>',
        data: {
          par1: 'par1',
          par2: 'par2',
        }
      }
    ]
    _.forEach(comp, function(value, key) {
      Vue.component(value.name, function (resolve, reject) {
        resolve({
          template: value.template,
          data () {
            return value.data
          }
        })
      })
    });

    commit('setBlocks', comp)

    setTimeout(() => {
      // this.layout.push(0)
      commit('setIsLoading', false)
    }, 2000)

  },
  addBlockToLayout ({ commit }, value) {
    commit('addBlockToLayout', value)
  },
}
