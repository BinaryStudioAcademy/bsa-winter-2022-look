<template>
  <form
    :value="!invalid"
    enctype="multipart/form-data"
    @submit.prevent="handleSubmit"
  >
    <validation-provider
      name="Photo"
    >
      <Dropzone
        @file-upload="addMediaFile"
        @file-delete="deleteFile"
      />
    </validation-provider>

    <v-btn
      type="submit"
      :disabled="invalid"
      class="white--text text-capitalize font-weight-bold d-flex mx-auto mx-md-0"
      color="primary"
      large
      rounded
      depressed
      max-width="215"
      width="100%"
    >
      Sign Up
    </v-btn>
  </form>
</template>

<script>
import { ValidationProvider } from 'vee-validate';
import Dropzone from '@/bundles/common/components/Dropzone';

export default {
  components: {
    ValidationProvider,
    Dropzone,
  },

  props: {
    invalid: {
      type: Boolean,
      default: false,
    },
    processing: {
      type: Boolean,
      default: false,
    },
  },

  data() {
    return {
      userFiles: [],
    };
  },

  methods: {
    handleSubmit() {
      this.$emit('submit', {
        files: this.userFiles,
        id: this.$store.state.auth.user.id,
      });
    },
    addMediaFile(file) {
      this.userFiles = [
        ...this.userFiles,
        file,
      ];
      console.dir(this.userFiles);
    },
    deleteFile(file) {
      this.userFiles = this.userFiles.filter(value => value.name !== file.name);
    },
  },
};
</script>
