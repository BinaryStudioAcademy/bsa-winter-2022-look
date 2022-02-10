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

    <router-link
      :to="{ name: 'auth-reset_password' }"
    >
      Forgot your password?
    </router-link>
    <v-btn class="mr-4" type="submit" :disabled="invalid"> Sign In </v-btn>
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
      password: undefined,
    };
  },

  methods: {
    handleSubmit() {
      this.$emit('submit', {
        email: this.email,
        password: this.password,
      });
    },
  },
};
</script>
