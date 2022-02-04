import Vuex from 'vuex';
import { getAuthModule, authNamespace } from '@/bundles/auth/store/modules/auth';
import Vue from 'vue';

Vue.use(Vuex);

const store = new Vuex.Store({
  modules: {
    [authNamespace]: getAuthModule(),
  },
});

export default store;
