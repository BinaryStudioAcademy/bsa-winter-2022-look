import Vue from 'vue';
import App from './App.vue';
import router from './router';
import vuetify from './plugins/vuetify';
import store from './store';
import './plugins/veeValidate';
import Echo from 'laravel-echo';

Vue.config.productionTip = false;

new Vue({
  router,
  store,
  vuetify,
  render: h => h(App),
}).$mount('#app');


const Pusher = require('pusher-js');
new Echo({
  broadcaster: 'pusher',
  key: process.env.MIX_PUSHER_APP_KEY,
  cluster: process.env.MIX_PUSHER_APP_CLUSTER,
  forceTLS: true
});
