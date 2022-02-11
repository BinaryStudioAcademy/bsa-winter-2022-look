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
    <validation-provider
      v-slot="{ errors }"
      name="password"
      rules="required|min:8,password"
    >
      <v-text-field
        v-model="password"
        :error-messages="errors"
        :append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
        :type="showPassword ? 'text' : 'password'"
        label="Password"
        name="password"
        hint="At least 8 characters"
        filled
        rounded
        background-color="#faf9f9"
        outlined
        @click:append="togglePassword"
      />
    </validation-provider>

    <div class="mb-6">
      <router-link
        class="small-text black--text font-weight-regular link"
        :to="{ name: 'auth-reset_password' }"
      >
        Forgot your password?
      </router-link>
    </div>
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
      Sign In
    </v-btn>
    <v-btn
      color="primary"
      depressed
      icon
      large
      outlined
    >
      <v-icon>mdi-google</v-icon>
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
      showPassword: false,
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
    togglePassword() {
      this.showPassword = !this.showPassword;
    },
  },
};
</script>
