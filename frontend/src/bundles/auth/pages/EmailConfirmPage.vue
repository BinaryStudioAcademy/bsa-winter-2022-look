<template>
  <div></div>
</template>

<script>

import namespace from '@/bundles/auth/store/modules/auth/namespace';
import { mapActions } from 'vuex';
import { USER_EMAIL_CONFIRMATION } from '../store/modules/auth/types/actions';

export default {

  props: {
    token: String,
  },

  beforeMount() {
    // this.confirmUserEmail();
  },

  methods: {
    ...mapActions(namespace, {
      emailConfirmation: USER_EMAIL_CONFIRMATION,
    }),
    confirmUserEmail() {
      return this.emailConfirmation(this.token).then(() => {
        alert('success');
      }).catch((e) => {
        alert(e);
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
