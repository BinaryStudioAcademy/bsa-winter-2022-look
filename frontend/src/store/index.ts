import { createStore } from 'vuex';
import { getAuthModule, authNamespace } from '@/bundles/auth/store/modules/auth';

export default createStore({
  modules: {
    [authNamespace]: getAuthModule(),
  },
});
