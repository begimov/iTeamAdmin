import api from '../../../api'

export default {
  getAvailableBlocks ({ commit }, value) {
    commit('setIsLoading', true)

    let comp = [
      {
        id: 1,
        name: 'async-example',
        template: `
          <div class="row">
            <div class="col-md-12">
              <input type="text" v-model="name" class="form-control"></input>
            </div>
          </div>`,
        data: {
          name: '',
        }
      },
      {
        id: 2,
        name: 'async-example2',
        template: '<div><input type="text" v-model="name"></input><input type="text" v-model="title"></input></div>',
        data: {
          name: '',
          title: '',
        }
      }
    ]

    _.forEach(comp, function(value, key) {
      Vue.component(value.name, function (resolve, reject) {
        resolve({
          template: value.template,
          data () {
            return {...value.data}
          }
        })
      })
    });

    commit('setBlocks', comp)
    commit('setIsLoading', false)
  },
  addBlockToLayout ({ commit }, value) {
    commit('addBlockToLayout', value)
  },
}
