<template>
  <div>
    <div v-if="successMessage">
      Your email has been confirmed.You would be redirected to the login page in 5 sec.<br>
      <router-link :to="{ name: 'auth-login' }">Click here if you don`t want to wait.</router-link>
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
    errorMessage: false,
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
        this.successMessage = true;
        setTimeout(() => {
          this.$router.push({ name: 'auth-login' });
        }, 5000);
      }).catch((error) => {
        this.errorMessage = true;
        this.errorText = error.token[0];
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
