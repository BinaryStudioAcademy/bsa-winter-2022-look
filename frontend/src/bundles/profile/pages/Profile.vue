<template>
  <v-main>
    <v-container>
      <Photos />
      <WorkAndEducation />
      <PurposeAndLocation />
    </v-container>
  </v-main>

</template>

<script>

import Photos from '../components/profile/Photos.vue';
import WorkAndEducation from '../components/profile/WorkAndEducation.vue';
import PurposeAndLocation from '../components/profile/PurposeAndLocation.vue';
export default {
  components: {
    Photos,
    WorkAndEducation,
    PurposeAndLocation,
  },

};
</script>
