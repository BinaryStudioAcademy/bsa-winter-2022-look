import User from '@/bundles/common/entity/User';
import { MutationTree } from 'vuex';
import AuthState from './AuthState';
import {
  SET_USER,
} from './types/mutations';

const mutations: MutationTree<AuthState> = {
  [SET_USER](state: AuthState, data: User) {
    state.user = data;
  },
};

export default mutations;
