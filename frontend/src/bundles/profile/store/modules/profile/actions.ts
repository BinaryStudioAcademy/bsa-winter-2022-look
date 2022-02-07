import { ActionTree } from 'vuex';
import ProfileState from './ProfileState';

export function getActions<R>(): ActionTree<ProfileState, R> {
  return {
    // [CREATE_USER]({ commit }, data: UserRequest): Promise<void> {
    //   return userRepository.create(data)
    //     .then(result => commit(SET_USER, result));
    // },
    // [LOGIN_USER](args, data: UserLoginRequest): Promise<void> {
    //   return userRepository.login(data);
    // },
  };
}
