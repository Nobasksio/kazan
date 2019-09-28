import Vue from 'vue'
import VueRouter from 'vue-router'
import App from './App.vue'
import vuetify from './plugins/vuetify';
import Vuex from 'vuex';

Vue.config.productionTip = false

Vue.use(VueRouter)

import routes from './routes'

const router = new VueRouter({
  //mode: 'history',
  routes
})

import createStore from './store/index'

const store = typeof createStore === 'function'
    ? createStore({Vue})
    : createStore


new Vue({
  vuetify,
  store,
  router,
  render: h => h(App)
}).$mount('#app')


require('./assets/style.scss')
