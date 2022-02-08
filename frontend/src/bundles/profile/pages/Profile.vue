<template>
  <v-card>
    <v-card-title>
      Profile
    </v-card-title>
    <v-container>
      <Media />
      <WorkAndEducation />
    </v-container>

    <!-- <h3>Tell people more about yourself by adding your work and education details</h3>
    Job title -> Add title
    Company name -> Add company
    School or university -> Add education
    <h2>Location</h2> -> Town Select
    <h2>I'm here to</h2> radio
    <h2>Interests</h2> square select plitku -->
  </v-card>
</template>

<script>

import Media from '../components/profile/Media.vue';
import WorkAndEducation from '../components/profile/WorkAndEducation.vue';
export default {
  components: {
    Media,
    WorkAndEducation,
  },

};
</script>
