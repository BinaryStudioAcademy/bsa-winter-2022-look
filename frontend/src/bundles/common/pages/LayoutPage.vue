<template>
  <div>
    <h1>Common Layout</h1>
    <router-view />
  </div>
</template>

<script>
import namespace from '../store/modules/user/namespace';
import { mapActions } from 'vuex';
import { FETCH_SESSION_USER } from '../store/modules/user/types/actions';

export default {
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
