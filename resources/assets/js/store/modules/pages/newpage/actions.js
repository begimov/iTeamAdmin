import api from '../../../api'

export default {
  getInitialData ({ commit }) {
    commit('setIsLoading', true)
    api.newpage.getInitialData().then(res => {
      const blocks = res.data.blocks.data
      
      _.forEach(blocks, function(block, key) {
        Vue.component(block.tag, function (resolve, reject) {
          resolve({
            props:['id'],
            template: `<div>`
                + block.template
                + `<div class="row">
                    <div class="col-md-12 text-right">
                      <a href="#" class="btn btn-default btn-xs" @click.prevent="moveUp(id)">вверх</a>
                      <a href="#" class="btn btn-default btn-xs" @click.prevent="moveDown(id)">вниз</a>
                      <a href="#" class="btn btn-primary btn-xs" @click.prevent="deleteElement(id)">УДАЛИТЬ</a>
                    </div>
                  </div>
                  </div>`,
            data () {
              return {
                data: { ...block.data }, 
                meta: { blockId: block.id }
              }
            },
            methods: {
              moveUp (id) {
                this.$emit('elementMovedUp', id)
              },
              moveDown (id) {
                this.$emit('elementMovedDown', id)
              },
              deleteElement (id) {
                this.$emit('elementDeleted', id)
              },
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
      commit('setCategoriesOptions', res.data.categories.data)
      commit('setIsLoading', false)
    })
  },
  updateCategoryParams ({ commit }, value) {
    commit('updateCategoryParams', value)
  },
  updatePageName ({ commit }, name) {
    commit('updatePageName', name)
  },
  updatePageDesc ({ commit }, desc) {
    commit('updatePageDesc', desc)
  },
  addBlockToLayout ({ commit }, data) {
    commit('addBlockToLayout', data)
  },
  moveElementUp ({ commit }, id) {
    commit('moveElementUp', id)
  },
  moveElementDown ({ commit }, id) {
    commit('moveElementDown', id)
  },
  deleteElement ({ commit }, id) {
    commit('deleteElement', id)
  },
  save ({ commit, state }) {
    commit('setIsLoading', true)
    const elements = _.map(state.layout.elements, (element) => {
      return { data: element.data.data, meta: element.data.meta }
    })
    api.newpage.savePage({
      page: {
        data: state.page,
        elements
      }
    }).then(res => {
      console.log(res)
      commit('setIsLoading', false)
    })
  },
}
