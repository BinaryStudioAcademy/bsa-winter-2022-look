import { SET_USER } from './types/mutations';
import {
  CREATE_USER,
  LOGIN_USER,
  LOGOUT_USER,
  ADD_ADDITIONAL_INFO,
  ADD_USER_MEDIA,
  RESET_USER_PASSWORD,
  CHANGE_USER_PASSWORD,
  USER_EMAIL_CONFIRMATION,
  SEND_VALIDATION_EMAIL,
  GET_USER_ADDITIONAL_INFO,
  SET_USER_ADDITIONAL_INFO,
  GET_USERS_LIST,
  RATE_USER,
  GET_USERS_MATCHED,
  GET_USERS_LIKED,
} from './types/actions';
import UserRequest from '@/bundles/common/repository/requests/UserRequest';
import { ActionTree } from 'vuex';
import AuthState from './AuthState';
import userRepository from '@/bundles/common/repository/userRepository';
import UserLoginRequest from '@/bundles/common/repository/requests/UserLoginRequest';
import ChangePasswordRequest from '@/bundles/common/repository/requests/ChangePasswordRequest';
import ChangeUserInfoRequest from '@/bundles/common/repository/requests/ChangeUserInfoRequest';
import UsersListRequest from '@/bundles/common/repository/requests/UsersListRequest';
import RateUserRequest from '@/bundles/common/repository/requests/RateUserRequest';
import { RESET_USER } from '@/bundles/common/store/modules/user/types/mutations';
import namespace from '@/bundles/common/store/modules/user/namespace';

export function getActions<R>(): ActionTree<AuthState, R> {
  return {
    [CREATE_USER]({ commit }, data: UserRequest): Promise<void> {
      return userRepository.create(data)
        .then(result => commit(SET_USER, result));
    },
    [LOGIN_USER](args, data: UserLoginRequest): Promise<void> {
      return userRepository.login(data);
    },
    [LOGOUT_USER]({ commit }): Promise<void> {
      return userRepository.logout()
        .then(() => commit(`${namespace}/${RESET_USER}`, null, { root: true }));
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
    [RESET_USER_PASSWORD](args, email): Promise<void> {
      return userRepository.resetPassword(email);
    },
    [CHANGE_USER_PASSWORD](args, data: ChangePasswordRequest): Promise<void> {
      return userRepository.changePassword(data);
    },
    [USER_EMAIL_CONFIRMATION](args, token): Promise<void> {
      return userRepository.emailConfirmation(token);
    },
    [SEND_VALIDATION_EMAIL](args, email): Promise<void> {
      return userRepository.sendValidationEmail(email);
    },
    [GET_USER_ADDITIONAL_INFO](): Promise<void> {
      return userRepository.getUserAdditionalInfo();
    },
    [SET_USER_ADDITIONAL_INFO](args, data: ChangeUserInfoRequest): Promise<void> {
      return userRepository.setUserAdditionalInfo(data);
    },
    [GET_USERS_LIST](args, data: UsersListRequest): Promise<void> {
      return userRepository.getUsersList(data);
    },
    [RATE_USER](args, data: RateUserRequest): Promise<void> {
      return userRepository.rateUser(data);
    },
    [GET_USERS_MATCHED](args, status): Promise<void> {
      return userRepository.getMatchedUsers(status);
    },
    [GET_USERS_LIKED](args, status): Promise<void> {
      return userRepository.getLikedUsers(status);
    },
  };
}
