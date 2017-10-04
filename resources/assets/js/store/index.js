import products from './modules/products'
import pages from './modules/pages'
import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  modules: {
    products,
    pages,
  }
})
