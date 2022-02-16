<template>
  <form :value="!invalid" @submit.prevent="handleSubmit">
    <validation-provider
      v-slot="{ errors }"
      name="Photo"
      rules="required"
    >
      <v-file-input
        v-model="userFiles"
        color="primary"

        counter
        label="Photos"
        multiple
        rounded
        placeholder="Select your files"
        prepend-icon="mdi-camera"
        outlined
        :show-size="1000"
        :error-messages="errors"
      >
        <template #selection="{ index, text }">
          <v-chip
            v-if="index < 2"
            color="purple"
            dark
            label
            small
          >
            {{ text }}
          </v-chip>

          <span
            v-else-if="index === 2"
            class="text-overline grey--text text--darken-3 mx-2"
          >
            +{{ userFiles.length - 2 }} File(s)
          </span>
        </template>
      </v-file-input>
    </validation-provider>

    <v-btn
      type="submit"
      :disabled="invalid"
      class="white--text text-capitalize font-weight-bold mr-4"
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

export default {
  components: {
    ValidationProvider,
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
        userFiles: this.userFiles,
      });
    },
  },
};
</script>
