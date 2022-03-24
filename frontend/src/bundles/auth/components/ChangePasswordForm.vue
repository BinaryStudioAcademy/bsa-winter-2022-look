<template>
  <form @submit.prevent="handleSubmit">
    <validation-provider
      v-slot="{ errors }"
      name = 'Password'
      rules = 'required|min:8'
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
        required
        @click:append="togglePassword"
      />
    </validation-provider>
    <validation-provider
      v-slot="{ errors }"
      name = 'password_confirmation'
      rules = 'required_password|min:8|confirmed:Password'
    >
      <v-text-field
        v-model="passwordConfirmation"
        label="Confirm Password"
        :error-messages="errors"
        :append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
        :type="showConfirmPassword ? 'text' : 'password'"
        name="confirm-password"
        hint="At least 8 characters"
        filled
        rounded
        background-color="#faf9f9"
        outlined
        required
        @click:append="toggleConfirmPassword"
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
      Change password
    </v-btn>
  </form>

</template>

<script>
import { ValidationProvider } from 'vee-validate';

export default {
  name: 'ChangePasswordForm',

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

  data: () => ({
    password: undefined,
    passwordConfirmation: undefined,
    showPassword: false,
    showConfirmPassword: false,
  }),

  methods: {
    handleSubmit() {
      this.$emit('submit', {
        password: this.password,
        passwordConfirmation: this.passwordConfirmation,
      });
    },
    togglePassword() {
      this.showPassword = !this.showPassword;
    },
    toggleConfirmPassword() {
      this.showConfirmPassword = !this.showConfirmPassword;
    },
  },

};
</script>
