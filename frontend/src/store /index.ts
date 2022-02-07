import Vuex from 'vuex';
import Vue from 'vue';
import { getAuthModule, authNamespace } from '@/bundles/auth/store/modules/auth';
import { getUserModule, userNamespace } from './../bundles/common/store/modules/user/index';

Vue.use(Vuex);

const store = new Vuex.Store({
  modules: {
    [authNamespace]: getAuthModule(),
    [userNamespace]: getUserModule(),
  },
});

export default store;
