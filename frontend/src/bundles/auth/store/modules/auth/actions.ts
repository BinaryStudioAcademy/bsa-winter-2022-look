import { SET_USER } from './types/mutations';
import { CREATE_USER, LOGIN_USER, ADD_ADDITIONAL_INFO, ADD_USER_MEDIA } from './types/actions';
import UserRequest from '@/bundles/common/repository/requests/UserRequest';
import { ActionTree } from 'vuex';
import AuthState from './AuthState';
import userRepository from '@/bundles/common/repository/userRepository';
import UserLoginRequest from '@/bundles/common/repository/requests/UserLoginRequest';

export function getActions<R>(): ActionTree<AuthState, R> {
  return {
    [CREATE_USER]({ commit }, data: UserRequest): Promise<void> {
      return userRepository.create(data)
        .then(result => commit(SET_USER, result));
    },
    [LOGIN_USER](args, data: UserLoginRequest): Promise<void> {
      return userRepository.login(data);
    },
    [ADD_ADDITIONAL_INFO](args, data: UserRequest): Promise<void> {
      return userRepository.patch(data);
    },
    [ADD_USER_MEDIA](args, data: UserRequest): Promise<void> {
      return userRepository.patch(data);
    },
  };
}
