<template>
  <validation-observer
    ref="observer"
    v-slot="{ invalid }"
  >
    <v-container
      align="center"
      justify="center"
    >
      <v-col
        class="text-center"
        cols="10"
        md="4"
        sm="6"
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
      </v-col>
    </v-container>
  </validation-observer>
</template>

<script>
import { required, email } from 'vee-validate/dist/rules';
import { extend, ValidationObserver, ValidationProvider, setInteractionMode } from 'vee-validate';

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
  }),

  methods: {
    handleSubmit() {
      alert('test');
    },
  },
};
</script>
