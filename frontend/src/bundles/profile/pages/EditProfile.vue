<template>
  <v-container>
    <Photos />
    <ProfileForm />
  </v-container>
</template>

<script>

import Photos from '../components/profile/Photos.vue';
import ProfileForm from '../components/profile/ProfileForm.vue';

export default {
  components: {
    Photos,
    ProfileForm,
  },

};
</script>
