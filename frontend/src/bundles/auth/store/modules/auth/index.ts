import { Module } from 'vuex';
import mutations from './mutations';
import { getActions } from './actions';
import { getGetters } from './getters';
import AuthState, { createAuthState } from './AuthState';
import namespace from './namespace';

export function getAuthModule<R>(): Module<AuthState, R> {
  return {
    namespaced: true,
    mutations,
    actions: getActions<R>(),
    getters: getGetters<R>(),
    state: () => createAuthState(),
  };
}

export const authNamespace = namespace;
