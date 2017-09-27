import Vue from 'vue'
import VueRouter from 'vue-router'

//Global components
Vue.component('products', require('./../components/products/Products.vue'));
Vue.component('new-product', require('./../components/products/newproduct/NewProduct.vue'));

Vue.use(VueRouter)

export default new VueRouter({
  routes: [
    { path: '/', name: 'products', component: Vue.component('products')},
    { path: '/newproduct', name: 'newproduct', component: Vue.component('new-product')},
  ]
})
