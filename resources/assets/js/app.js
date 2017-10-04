
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import store from './store'
import router from './router'

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Base components
Vue.component('paginator', require('./components/base/Paginator.vue'));
Vue.component('search', require('./components/base/Search.vue'));
Vue.component('typeahead-search', require('./components/base/TypeaheadSearch.vue'));
Vue.component('orderby', require('./components/base/OrderBy.vue'));

Vue.component('orders', require('./components/products/orders/Orders.vue'));
Vue.component('order', require('./components/products/orders/Order.vue'));
Vue.component('new-order', require('./components/products/neworder/NewOrder.vue'));

Vue.component('products', require('./components/products/Products.vue'));
Vue.component('product', require('./components/products/Product.vue'));
Vue.component('new-product', require('./components/products/newproduct/NewProduct.vue'));

Vue.component('pages', require('./components/pages/Pages.vue'));
Vue.component('new-page', require('./components/pages/newpage/NewPage.vue'));

const app = new Vue({
    el: '#app',
    store,
    router
});
