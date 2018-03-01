import api from '../../../api'

export default {
  getAvailableBlocks ({ commit }, value) {
    commit('setIsLoading', true)

    api.pages.getAvailableBlocks().then(res => {
      const blocks = res.data.blocks.data
      
      _.forEach(blocks, function(block, key) {
        Vue.component(block.tag, function (resolve, reject) {
          resolve({
            props:['id'],
            template: `<div>`
                + block.template
                + `<div class="row"><div class="col-md-12 text-right"><a href="#" class="btn btn-primary btn-xs" @click.prevent="deleteElement(id)">УДАЛИТЬ</a></div></div></div>`,
            data () {
              return {
                data: { ...block.data }, 
                meta: { blockId: block.id }
              }
            },
            methods: {
              deleteElement (id) {
                this.$emit('elementDeleted', id)
              }
            },
            mounted () {
              commit('addElementToElements', {
                id: this.id,
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
  addBlockToLayout ({ commit }, data) {
    commit('addBlockToLayout', data)
  },
  deleteElement ({ commit }, id) {
    commit('deleteElement', id)
  },
  save ({ commit, state }) {
    // commit('setIsLoading', true)
    api.pages.savePage(state.layout.elements).then(res => {
      console.log(res)
    })
    console.log(state.layout.elements)
  },
}
