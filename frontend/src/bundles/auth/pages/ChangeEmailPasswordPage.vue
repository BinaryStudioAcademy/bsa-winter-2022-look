<template>
  <div>
    <h2 class="h4 primary--text head-login mt-md-16 mb-2">
      Change password
    </h2>
    <p class="small-text font-weight-light mb-6">
      Enter your new password <br>
    </p>
    <validation-observer ref="observer" v-slot="{ invalid }">
      <form @submit.prevent="handleSubmit">
        <validation-provider
          v-slot="{ errors }"
          name = 'password'
          rules = 'required|min:8'
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
    </validation-observer>

  </div>
</template>

<script>

import { ValidationObserver, ValidationProvider } from 'vee-validate';
import { mapActions } from 'vuex';
import { RESET_USER_PASSWORD } from '../store/modules/auth/types/actions';
import namespace from '@/bundles/auth/store/modules/auth/namespace';

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
    password: '',
    confirmPassword: '',
  }),

  methods: {
    ...mapActions(namespace, {
      resetPassword: RESET_USER_PASSWORD,
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
