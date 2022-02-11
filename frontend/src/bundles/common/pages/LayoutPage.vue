<template>
  <div>
    <router-view />
  </div>

</template>

<script>
import namespace from '../store/modules/user/namespace';
import { mapActions } from 'vuex';
import { FETCH_SESSION_USER } from '../store/modules/user/types/actions';
export default {
  components: {
  },
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
