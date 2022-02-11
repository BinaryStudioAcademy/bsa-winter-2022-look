import { SET_USER } from './types/mutations';
import { CREATE_USER, LOGIN_USER, ADD_ADDITIONAL_INFO, ADD_USER_MEDIA, RESET_USER_PASSWORD } from './types/actions';
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

    /**
     * TODO Chenge method api when api endpoint finished
     */
    [ADD_ADDITIONAL_INFO](args, data: UserRequest): Promise<void> {
      return userRepository.patch(data);
    },
    [ADD_USER_MEDIA](args, data: UserRequest): Promise<void> {
      return userRepository.patch(data);
    },
    [RESET_USER_PASSWORD](args, data: ResetPasswordRequest): Promise<void> {
      return userRepository.resetPassword(data);
    },

  };
}
