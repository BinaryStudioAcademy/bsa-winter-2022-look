<template>
  <div>
    <div v-if="successMessage">
      Your email has been confirmed.You would be redirected to the login page in 5 sec.<br>
      <router-link :to="{ name: 'auth-login' }">Click this link if you dont want wait.</router-link>
    </div>
    <div v-if="errorMessage">
      {{ errorText }}
    </div>
  </div>
</template>

<script>

import namespace from '@/bundles/auth/store/modules/auth/namespace';
import { mapActions } from 'vuex';
import { USER_EMAIL_CONFIRMATION } from '../store/modules/auth/types/actions';

export default {

  props: {
    token: String,
  },

  data: () => ({
    successMessage: false,
    errorMessage: true,
    errorText: false,
  }),

  beforeMount() {
    this.confirmUserEmail();
  },

  methods: {
    ...mapActions(namespace, {
      emailConfirmation: USER_EMAIL_CONFIRMATION,
    }),
    confirmUserEmail() {
      return this.emailConfirmation(this.token).then(() => {
        this.resultMessage = true;
      }).catch((e) => {
        this.errorText = 'wrong test';
        console.dir(e);
      });
    },
  },

};
</script>

<style scoped>
.h3 {
  font-size: 100%;
}
</style>
