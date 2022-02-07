import { Module } from 'vuex';
import mutations from './mutations';
import { getActions } from './actions';
import { getGetters } from './getters';
import ProfileState, { createProfileState } from './ProfileState';
import namespace from './namespace';

export function getAuthModule<R>(): Module<ProfileState, R> {
  return {
    namespaced: true,
    mutations,
    actions: getActions<R>(),
    getters: getGetters<R>(),
    state: () => createProfileState(),
  };
}

export const authNamespace = namespace;
