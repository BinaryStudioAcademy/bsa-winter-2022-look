<template>
  <form @submit.prevent="handleSubmit">
    <validation-provider
      v-slot="{ errors }"
      name = 'password'
      rules = 'required|min:8|password:@confirmPassword'
    >
      <v-text-field
        v-model="password"
        label="Password"
        type="password"
        :error-messages="errors"
        required
      />
    </validation-provider>
    <validation-provider
      v-slot="{ errors }"
      name = 'confirmPassword'
      rules = 'required|min:8'
    >
      <v-text-field
        v-model="confirmPassword"
        label="Confirm Password"
        type="password"
        :error-messages="errors"
        required
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
    confirmPassword: undefined,
  }),

  methods: {
    handleSubmit() {
      this.$emit('submit', {
        password: this.password,
        confirmPassword: this.confirmPassword,
      });
    },
  },

};
</script>
