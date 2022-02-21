import { Module } from 'vuex';
import UserState, { createUserState } from './UserState';
import mutations from './mutations';
import { getActions } from './actions';
import namespace from './namespace';

export function getUserModule<R>(): Module<UserState, R> {
  return {
    namespaced: true,
    mutations,
    actions: getActions<R>(),
    state: () => createUserState(),
  };
}

export const userNamespace = namespace;
