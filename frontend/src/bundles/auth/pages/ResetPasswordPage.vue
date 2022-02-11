<template>
  <div>
    <h2 class="h4 primary--text head-login mt-md-16 mb-2">
      Reset password
    </h2>
    <p class="small-text font-weight-light mb-6">
      Forgot your password? <br>
      Please enter your email address. <br>
      You will receive an email link to create a new password.
    </p>
    <validation-observer ref="observer" v-slot="{ invalid }">
      <form @submit.prevent="handleSubmit">
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
        <v-btn class="mr-4" type="submit" :disabled="invalid"> Reset password </v-btn>
      </form>
    </validation-observer>

  </div>
</template>

<script>
import { extend, ValidationObserver, ValidationProvider, setInteractionMode } from 'vee-validate';
import { required, email } from 'vee-validate/dist/rules';
import { RESET_PASSWORD } from '../store/modules/auth/types/actions';
import namespace from '@/bundles/auth/store/modules/auth/namespace';
import { mapActions } from 'vuex';

setInteractionMode('eager');

extend('required', {
  ...required,
  message: '{_field_} can not be empty',
});

extend('email', {
  ...email,
  message: 'Email must be valid',
});

export default {
  components: {
    ValidationProvider,
    ValidationObserver,
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
    email: '',
    error: false,
    success: false,
  }),

  methods: {
    ...mapActions(namespace, {
      resetPassword: RESET_PASSWORD,
    }),
    handleSubmit() {
      this.error = false;
      this.resetPassword(this.email).then(() => {
        this.success = true;
      }).catch(() => {
        this.error = true;
      });
    },
  },
};
</script>
