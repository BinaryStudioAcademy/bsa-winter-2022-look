import { SET_USER } from './types/mutations';
import { CREATE_USER, LOGIN_USER, RESET_PASSWORD } from './types/actions';
import UserRequest from '@/bundles/common/repository/requests/UserRequest';
import { ActionTree } from 'vuex';
import AuthState from './AuthState';
import userRepository from '@/bundles/common/repository/userRepository';
import UserLoginRequest from '@/bundles/common/repository/requests/UserLoginRequest';
import ResetPasswordRequest from '@/bundles/common/repository/requests/ResetPasswordRequest';

export function getActions<R>(): ActionTree<AuthState, R> {
  return {
    [CREATE_USER]({ commit }, data: UserRequest): Promise<void> {
      return userRepository.create(data)
        .then(result => commit(SET_USER, result));
    },
    [LOGIN_USER](args, data: UserLoginRequest): Promise<void> {
      return userRepository.login(data);
    },
    [RESET_PASSWORD](args, data: ResetPasswordRequest): Promise<void> {
      return userRepository.resetPassword(data);
    },
  };
}
