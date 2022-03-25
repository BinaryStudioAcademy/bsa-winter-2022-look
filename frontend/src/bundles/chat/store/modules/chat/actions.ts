import { SET_MESSAGES } from './types/mutations';
import {
  FETCH_MESSAGES,
} from './types/actions';
import MessagesState from "@/bundles/chat/store/modules/chat/MessagesState";
import messageRepository from "@/bundles/chat/repository/messageRepository";
import MessageRequest from '@/bundles/chat/repository/requests/MessageRequest';
import {ActionContext} from "vuex";
import { ActionTree } from 'vuex';
// import AuthState from './AuthState';
// import userRepository from '@/bundles/common/repository/userRepository';
//
export function getActions<R>(): ActionTree<MessagesState, R> {
  return {
    [FETCH_MESSAGES]({ commit }, data: MessageRequest): Promise<void> {
      return messageRepository.get()
        .then(result => commit(SET_MESSAGES, result));
    },
  };
}
