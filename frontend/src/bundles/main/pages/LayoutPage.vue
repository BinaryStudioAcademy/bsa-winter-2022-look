<template>
  <v-layout>
    <navbar-component
      :user-info="userInfo"
    />
    <v-main
      class="page-layout"
    >
      <router-view />
    </v-main>
  </v-layout>
</template>

<script>
import namespace from '@/bundles/common/store/modules/user/namespace';
import NavbarComponent from '@/bundles/main/components/NavbarComponent';
import { mapState } from 'vuex';

export default {
  name: 'LayoutPage',
  components: { NavbarComponent },
  computed: {
    ...mapState(namespace, {
      userInfo: 'user',
    }),
  },
};
</script>

<style>

.page-layout {
  background-color:#faf9f9;
}

</style>
