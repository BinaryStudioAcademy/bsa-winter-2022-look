<template>
  <v-app>
    <Navigation />
    <v-main>
      <router-view />
    </v-main>
  </v-app>
</template>

<script>
import Navigation from '../components/navigation/Navigation.vue';
export default {
  components: {
    Navigation,
  },
};
</script>
