<template>
  <v-app>
    <v-card>
      <Navigation />
    </v-card>
    <v-main>
      <router-view />
    </v-main>
  </v-app>
</template>

<script>
import Navigation from '../../common/components/Navigation.vue';
export default {
  components: {
    Navigation,
  },
};
</script>
