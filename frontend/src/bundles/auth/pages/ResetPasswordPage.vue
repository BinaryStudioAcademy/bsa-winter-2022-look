<template>
  <validation-observer
    ref="observer"
    v-slot="{ invalid }"
  >
    <v-container
      display="flex"
      align-items="center"
      justify-content="center"
    >
      <v-col
        display="flex"
        align-items="center"
        justify-content="center"
        md="4"
      >
        <form @submit.prevent="handleSubmit">
          <h3>Enter your email to reset password</h3>
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

          <router-link
            :to="{ name: 'auth-reset_password' }"
          >
            Back to login page
          </router-link>
          <v-btn class="mr-4" type="submit" :disabled="invalid"> Reset password </v-btn>
        </form>

        <div v-show="error">
          User with such email not found
        </div>
        <div v-show="success">
          Change password link send to your emil
        </div>

      </v-col>
    </v-container>
  </validation-observer>
</template>

<script>
import { required, email } from 'vee-validate/dist/rules';
import { extend, ValidationObserver, ValidationProvider, setInteractionMode } from 'vee-validate';
import { mapActions } from 'vuex';
import { RESET_PASSWORD } from '../store/modules/auth/types/actions';
import namespace from '@/bundles/auth/store/modules/auth/namespace';

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
      this.resetPassword(this.email).then(
        success => true,
        error = >true,
      );
    },
  },
};
</script>
