import { ActionTree, ActionContext } from 'vuex';
import UserState from './UserState';
import {
  FETCH_SESSION_USER,
} from './types/actions';
import {
  RESET_USER,
  SET_USER,
} from './types/mutations';
import userRepository from '@/bundles/common/repository/userRepository';

export function getActions<R>(): ActionTree<UserState, R> {
  return {
    async [FETCH_SESSION_USER]({ commit }: ActionContext<UserState, R>): Promise<void> {
      return userRepository.get()
        .then(data => {
          commit(SET_USER, data);
        })
        .catch(() => {
          commit(RESET_USER);
        });
    },
  };
}
