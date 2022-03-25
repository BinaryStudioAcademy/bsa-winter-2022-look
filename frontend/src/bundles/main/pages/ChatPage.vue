<template>
  <div>
    <page-title
      title="Chat"
    />
    <div class="container">
      <div class="card">
        <div class="card-header">Chats</div>
        <div class="card-body">
          <ChatMessages :messages="messages"></ChatMessages>
        </div>
        <div class="card-footer">
          <ChatForm v-on:messagesent="addMessage" :user=""></ChatForm>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import PageTitle from '@/bundles/common/components/PageTitle';
import ChatForm from '@/bundles/main/components/chat/ChatForm';
import ChatMessages from '@/bundles/main/components/chat/ChatMessages';
import { FETCH_SESSION_USER } from '../store/modules/user/types/actions';
import {mapActions} from "vuex";
import namespace from "@/bundles/common/store/modules/user/namespace";

export default {
  components: {
    PageTitle, ChatForm, ChatMessages
  },
  methods: {
    ...mapActions(namespace, {
      fetchUser: FETCH_SESSION_USER,
    }),
  },

};
</script>
