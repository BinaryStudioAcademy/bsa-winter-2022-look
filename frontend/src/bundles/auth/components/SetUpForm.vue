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
        placeholder="Name"
        filled
        rounded
        background-color="#faf9f9"
        outlined
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
        type="email"
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
        name="password"
        label="Password"
        :error-messages="errors"
        :append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
        :type="showPassword ? 'text' : 'password'"
        hint="At least 8 characters"
        filled
        rounded
        background-color="#faf9f9"
        outlined
        @click:append="togglePassword"
      />
    </validation-provider>
    <validation-provider
      v-slot="{ errors }"
      name="passwordConfirmation"
      rules="required|confirmed:password"
    >
      <v-text-field
        v-model="passwordConfirmation"
        name="passwordConfirmation"
        label="Password confirmation"
        :error-messages="errors"
        :append-icon="showPasswordConfirmation ? 'mdi-eye' : 'mdi-eye-off'"
        :type="showPasswordConfirmation ? 'text' : 'password'"
        filled
        rounded
        background-color="#faf9f9"
        outlined
        @click:append="togglePasswordConfirmation"
      />
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
      showPassword: false,
      showPasswordConfirmation: false,
      fullName: undefined,
      email: undefined,
      password: undefined,
      passwordConfirmation: undefined,
    };
  },

  computed: {

  },
  methods: {
    handleSubmit() {
      this.$emit('submit', {
        name: this.fullName,
        email: this.email,
        password: this.password,
      });
    },
    togglePassword() {
      this.showPassword = !this.showPassword;
    },
    togglePasswordConfirmation() {
      this.showPasswordConfirmation = !this.showPasswordConfirmation;
    },
  },
};
</script>
