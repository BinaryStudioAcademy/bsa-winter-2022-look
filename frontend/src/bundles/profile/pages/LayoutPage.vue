<template>
  <v-app>
    <v-card>
      <NavigationProfile />
    </v-card>
    <router-view />
  </v-app>
</template>

<script>
import NavigationProfile from '../components/NavigationProfile.vue';
export default {
  components: {
    NavigationProfile,
  },
};
</script>
