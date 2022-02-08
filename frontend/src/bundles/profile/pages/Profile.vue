<template>
  <v-card>
    <v-card-title>
      Profile
    </v-card-title>
    <v-container>
      <Media />
      <WorkAndEducation />
    </v-container>
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
