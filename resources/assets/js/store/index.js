import products from './modules/products'
import pages from './modules/pages'
import materials from './modules/materials'
import tests from './modules/tests'
import reviews from './modules/reviews'
import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  modules: {
    products,
    pages,
    materials,
    tests,
    reviews
  }
})
