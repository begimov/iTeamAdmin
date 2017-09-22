import products from './modules/products'
import newproduct from './modules/newproduct'
import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  modules: {
    products,
    newproduct,
  }
})
