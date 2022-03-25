import { Module } from 'vuex';
// import mutations from './mutations';
// import { getActions } from './actions';
import { getGetters } from './getters';
import MessagesState, { createMessagesState } from './MessagesState';
import namespace from './namespace';

export function getAuthModule<R>(): Module<MessagesState, R> {
  return {
    namespaced: true,
    // mutations,
    // actions: getActions<R>(),
    getters: getGetters<R>(),
    state: () => createMessagesState(),
  };
}

export const messageNamespace = namespace;
