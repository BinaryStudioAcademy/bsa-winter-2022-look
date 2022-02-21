<template>
  <form :value="!invalid" @submit.prevent="handleSubmit">
    <validation-provider
      v-slot="{ errors }"
      name="email"
      rules="required|email"
    >
      <v-text-field
        v-model="email"
        :error-messages="errors"
        label="E-mail"
        placeholder="E-mail"
        filled
        rounded
        background-color="#faf9f9"
        outlined
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
      Reset
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
      email: undefined,
    };
  },

  methods: {
    handleSubmit() {
      this.$emit('submit', {
        email: this.email,
      });
    },
  },
};
</script>
