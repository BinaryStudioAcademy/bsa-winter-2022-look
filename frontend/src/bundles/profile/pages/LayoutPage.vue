<template>
  <v-app>
    <v-card>
      <Navigation />
    </v-card>
    <router-view />
  </v-app>
</template>

<script>
import Navigation from '../components/Navigation.vue';
export default {
  components: {
    Navigation,
  },
};
</script>
