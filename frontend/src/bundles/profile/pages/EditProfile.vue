<template>
  <v-main>
    <v-container>
      <Photos />
      <ProfileForm />
    </v-container>
  </v-main>
</template>

<script>

import Photos from '../components/profile/Photos.vue';
import ProfileForm from '../components/profile/ProfileForm.vue';

export default {
  components: {
    Photos,
    ProfileForm,
    // WorkAndEducation,
  },

};
</script>
