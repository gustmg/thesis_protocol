/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap')

import Vue from 'vue'
import vuetify from '../js/plugins/vuetify'
import Vuex from 'vuex'

Vue.use(Vuex)

import storeData from '../js/store/index'

const store = new Vuex.Store(storeData)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('login-card-component', require('./components/LoginCardComponent.vue').default)
Vue.component('register-card-component', require('./components/RegisterCardComponent.vue').default)
Vue.component('home-student-component', require('./components/HomeStudentComponent.vue').default)
Vue.component('home-admin-component', require('./components/HomeAdminComponent.vue').default)
Vue.component('menu-drawer-component', require('./components/MenuDrawerComponent.vue').default)
Vue.component('top-app-bar-component', require('./components/TopAppBarComponent.vue').default)
Vue.component('assign-evaluator-dialog-component', require('./components/AssignEvaluatorDialogComponent.vue').default)
Vue.component('home-evaluator-component', require('./components/HomeEvaluatorComponent.vue').default)
Vue.component(
    'thesis-protocol-evaluation-component',
    require('./components/ThesisProtocolEvaluationComponent.vue').default
)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    vuetify,
    store,
})
