import Vue from 'vue';
import App from './App.vue';
import router from './router';
import vuetify from './plugins/vuetify';
import store from './store';
import './plugins/veeValidate';
// eslint-disable-next-line @typescript-eslint/ban-ts-comment
// @ts-ignore
import VueMask from 'v-mask';

Vue.use(VueMask);
Vue.config.productionTip = false;

new Vue({
  router,
  store,
  vuetify,
  render: h => h(App),
}).$mount('#app');
