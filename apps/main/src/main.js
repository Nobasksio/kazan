import Vue from 'vue'
import VueRouter from 'vue-router'
import App from './App.vue'
import vuetify from './plugins/vuetify';
import VueBus from 'vue-bus';

Vue.config.productionTip = false

Vue.use(VueBus);
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


Vue.component('AppHeaderCommon', require('./components/client/common/app-header-common').default);
Vue.component('AppHeaderBack', require('./components/client/common/app-header-back').default);

new Vue({
  vuetify,
  store,
  router,
  render: h => h(App)
}).$mount('#app')




require('./assets/style.scss')
import 'swiper/dist/css/swiper.css'

