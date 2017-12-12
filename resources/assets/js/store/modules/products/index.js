import newproduct from './newproduct'
import newmaterial from './newmaterial'
import state from './state'
import getters from './getters'
import actions from './actions'
import mutations from './mutations'

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations,
  modules: {
    newproduct,
    newmaterial
  }
}
