import api from '../../../api'

export default {
  getInitialData ({ commit }) {
    return new Promise((resolve, reject) => {
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
                        <a href="#" class="btn btn-info btn-xs" @click.prevent="copyElement(id)">ДУБЛИРОВАТЬ</a>
                        <a href="#" class="btn btn-primary btn-xs" @click.prevent="deleteElement(id)">УДАЛИТЬ</a>
                        <hr>
                      </div>
                    </div>
                    </div>`,
              data () {
                return {
                  data: _.cloneDeep(block.data), 
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
                copyElement (id) {
                  this.$emit('elementCopied', id)
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
        commit('setThemesOptions', res.data.themes.data)
        commit('setIsLoading', false)
        resolve(res)
      })
    })
  },
  updateCategoryParams ({ commit }, value) {
    commit('updateCategoryParams', value)
  },
  updateThemeParams ({ commit }, value) {
    commit('updateThemeParams', value)
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
    commit('moveElementUp', {id, type:'blocks'})
    commit('moveElementUp', {id, type:'elements'})
  },
  moveElementDown ({ commit }, id) {
    commit('moveElementDown', { id, type:'blocks' })
    commit('moveElementDown', { id, type:'elements' })
  },
  deleteElement ({ commit }, id) {
    commit('deleteElement', id)
  },
  copyExistingElement ({ commit }, id) {
    commit('copyExistingElement', id)
  },
  save ({ commit, dispatch, state }) {
    commit('setIsLoading', true)
    const elements = _.map(state.layout.elements, (element) => {
      return { data: element.data.data, meta: element.data.meta }
    })
    api.newpage.savePage(state.page, elements).then(res => {
      commit('resetState')
      commit('setIsLoading', false)
      commit('pages/setCurrentModule', 'pages', { root: true })
      dispatch('pages/getPages', null, { root: true })
    }).catch(err => {
      commit('setErrors', err.response.data)
      commit('setIsLoading', false)
    })
  },
  resetState ({ commit }) {
    commit('resetState')
  },
  setPageToEdit ({ commit }, id) {
    commit('setIsLoading', true)
    api.newpage.getPage(id).then(res => {
      commit('setPageToEdit', res.data.data)
      commit('setIsLoading', false)
    })
    
  },
  update ({ commit, state }, id) {
    commit('setIsLoading', true)
    const elements = _.map(state.layout.elements, (element) => {
      return { data: element.data.data, meta: element.data.meta }
    })
    api.newpage.updatePage(id, state.page, elements).then(res => {
      commit('setIsLoading', false)
    }).catch(err => {
      commit('setErrors', err.response.data)
      commit('setIsLoading', false)
    })
  }
}
