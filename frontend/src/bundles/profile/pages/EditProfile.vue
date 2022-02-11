<template>
  <v-container>
    <v-row>
      <v-col>
        <Photos />
        <ProfileForm />
      </v-col>
    </v-row>
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
