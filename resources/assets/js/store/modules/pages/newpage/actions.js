import api from '../../../api'

export default {
  getAvailableBlocks ({ commit }, value) {
    commit('setIsLoading', true)

    api.pages.getAvailableBlocks().then(res => {
      const blocks = res.data.blocks.data

      _.forEach(blocks, function(block, key) {
        Vue.component(block.name, function (resolve, reject) {
          resolve({
            template: block.template,
            data () {
              return {...block.data}
            },
            mounted () {
              commit('addComponentToComponents', {
                block_id: block.id,
                block_name: block.name,
                data: this.$data
              })
            }
          })
        })
      });

      commit('setBlocks', blocks)
      commit('setIsLoading', false)
    })
  },
  addBlockToLayout ({ commit }, value) {
    commit('addBlockToLayout', value)
  },
}
