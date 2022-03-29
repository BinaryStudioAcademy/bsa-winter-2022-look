<template>
  <v-app>
    <router-view />
  </v-app>
</template>

<script>
import namespace from '../store/modules/user/namespace';
import { mapActions } from 'vuex';
import { FETCH_SESSION_USER } from '../store/modules/user/types/actions';
// import store from '@/store';

export default {
  // beforeRouteEnter(to, from, next) {
  //   if (
  //     store.state.user.isAuthorized ||
  //     to.name.includes('auth') ||
  //     to.name === 'home'
  //   ) {
  //     next();
  //   }
  //
  //   next({ name: 'auth-login' });
  // },
  created() {
    return this.fetchUser();
  },
  methods: {
    ...mapActions(namespace, {
      fetchUser: FETCH_SESSION_USER,
    }),
  },
};
</script>
