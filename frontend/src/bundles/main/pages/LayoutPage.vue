<template>
  <v-app
    class="greyBg"
  >
    <navbar-component
      :user="user"
    />
    <v-container
      fluid
      class="py-4 px-5"
    >
      <v-main>
        <router-view />
      </v-main>
    </v-container>
  </v-app>
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
      user: 'user',
    }),
  },
};
</script>
