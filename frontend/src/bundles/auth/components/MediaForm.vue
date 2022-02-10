<template>
  <form :value="!invalid" @submit.prevent="handleSubmit">
    <validation-provider
      v-slot="{ errors }"
      name="Photo"
      rules="required"
    >
      <v-file-input
        v-model="userFiles"
        color="deep-purple accent-4"
        counter
        label="Photos"
        multiple
        placeholder="Select your files"
        prepend-icon="mdi-paperclip"
        outlined
        :show-size="1000"
        :error-messages="errors"
      >
        <template #selection="{ index, text }">
          <v-chip
            v-if="index < 2"
            color="deep-purple accent-4"
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

    <v-btn class="mr-4" type="submit" :disabled="invalid"> Sign Up </v-btn>
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
