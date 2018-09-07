
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import store from './store'
// import router from './router'

// vue-quil-editor
import VueQuillEditor from 'vue-quill-editor'
import 'quill/dist/quill.core.css'
import 'quill/dist/quill.snow.css'
import 'quill/dist/quill.bubble.css'
Vue.use(VueQuillEditor, {
    modules: {
        toolbar: [
            ['bold', 'italic', 'strike'], 
            [{ 'list': 'ordered'}, { 'list': 'bullet' }], 
            [{ 'align': [] }],
            [{ 'header': [3, 4, 5, false] }]
        ]
    },
    placeholder: '...'
})

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
Vue.component('file-uploader', require('./components/base/FileUploader.vue'));

// Orders
Vue.component('orders', require('./components/products/orders/Orders.vue'));
Vue.component('order', require('./components/products/orders/Order.vue'));
Vue.component('new-order', require('./components/products/neworder/NewOrder.vue'));

// Products
Vue.component('products', require('./components/products/Products.vue'));
Vue.component('product', require('./components/products/Product.vue'));
Vue.component('new-product', require('./components/products/newproduct/NewProduct.vue'));
Vue.component('product-materials', require('./components/materials/Materials.vue'));
Vue.component('product-material', require('./components/materials/Material.vue'));
Vue.component('new-material', require('./components/products/newmaterial/NewMaterial.vue'));

// Pages
Vue.component('pages', require('./components/pages/Pages.vue'));
Vue.component('page', require('./components/pages/Page.vue'));
Vue.component('new-page', require('./components/pages/newpage/NewPage.vue'));

// Tests
Vue.component('iteam-tests', require('./components/tests/Tests.vue'));
Vue.component('iteam-test', require('./components/tests/Test.vue'));
Vue.component('new-test', require('./components/tests/newtest/NewTest.vue'));
Vue.component('question', require('./components/tests/newtest/Question.vue'));
Vue.component('answer', require('./components/tests/newtest/Answer.vue'));

// Special blocks
Vue.component('purchase', require('./components/pages/newpage/blocks/Purchase.vue'));
Vue.component('mp-purchase', require('./components/pages/newpage/blocks/MpPurchase.vue'));
Vue.component('mp-stages', require('./components/pages/newpage/blocks/MpStages.vue'));
Vue.component('text-reviews', require('./components/pages/newpage/blocks/TextReviews.vue'));
Vue.component('free-product', require('./components/pages/newpage/blocks/FreeProduct.vue'));

const app = new Vue({
    el: '#app',
    store,
    // router
});
