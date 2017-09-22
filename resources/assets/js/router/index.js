import Vue from 'vue'
import VueRouter from 'vue-router'

//Global components
Vue.component('products', require('./../components/products/Products.vue'));

Vue.use(VueRouter)

const routes = [
  { path: '/', name: 'products', component: Vue.component('products')},
]

export default new VueRouter({
  routes
})
