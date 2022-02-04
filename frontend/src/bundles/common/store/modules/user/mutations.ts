import { MutationTree } from 'vuex';
import UserState from './UserState';
import {
  RESET_USER,
  SET_USER,
} from './types/mutations';
import User from '@/bundles/common/entity/User';

const mutations: MutationTree<UserState> = {
  [SET_USER](state: UserState, user: User) {
    state.isAuthorized = true;
    state.user = { ...user };
  },
  [RESET_USER](state: UserState) {
    state.user = undefined;
    state.isAuthorized = false;
  },
};

export default mutations;
