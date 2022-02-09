<template>
  <form :value="!invalid" @submit.prevent="handleSubmit">
    <validation-provider
      v-slot="{ errors }"
      name="Name"
      rules="required"
    >
      <v-text-field
        v-model="fullName"
        :error-messages="errors"
        label="Name"
      />
    </validation-provider>
    <validation-provider
      v-slot="{ errors }"
      name="email"
      rules="required|email"
    >
      <v-text-field
        v-model="email"
        :error-messages="errors"
        label="E-mail"
      />
    </validation-provider>
    <validation-provider
      v-slot="{ errors }"
      name="password"
      rules="required|min:8,password"
    >
      <v-text-field
        v-model="password"
        type="password"
        name="password"
        label="Password"
        :error-messages="errors"
        hint="At least 8 characters"
        counter
      />
    </validation-provider>
    <validation-provider
      v-slot="{ errors }"
      name="passwordConfirmation"
      rules="required|confirmed:password"
    >
      <v-text-field
        v-model="passwordConfirmation"
        type="password"
        name="passwordConfirmation"
        label="Password confirmation"
        :error-messages="errors"
        counter
      />
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
      fullName: undefined,
      email: undefined,
      password: undefined,
      passwordConfirmation: undefined,
    };
  },

  methods: {
    handleSubmit() {
      this.$emit('submit', {
        name: this.fullName,
        email: this.email,
        password: this.password,
      });
    },
  },
};
</script>
