<template>
  <div>
    <h2 class="h4 primary--text head-login mt-md-16 mb-2 text-center text-md-left">
      Reset password
    </h2>
    <p class="small-text font-weight-light mb-6 text-center text-md-left">
      Forgot your password? <br>
      Please enter your email address. <br>
      You will receive an email link to create a new password.
    </p>
    <validation-observer ref="observer" v-slot="{ invalid, handleSubmit }">
      <reset-password-form
        :invalid="invalid"
        :processing="processing"
        @submit="payload => handleSubmit(() => handleUserSubmit(payload))"
      />
    </validation-observer>
  </div>
</template>

<script>
import { ValidationObserver } from 'vee-validate';
import { RESET_USER_PASSWORD } from '../store/modules/auth/types/actions';
import namespace from '@/bundles/auth/store/modules/auth/namespace';
import { mapActions } from 'vuex';
import ResetPasswordForm from '../components/ResetPasswordForm';

export default {
  components: {
    ValidationObserver,
    ResetPasswordForm,
  },

  data() {
    return {
      processing: undefined,
    };
  },

  methods: {
    ...mapActions(namespace, {
      resetPassword: RESET_USER_PASSWORD,
    }),
    handleUserSubmit(payload) {
      if (this.processing) {
        return Promise.resolve();
      }

      this.processing = true;

      return this.resetPassword(payload)
        .then(() =>
          this.$router.push({ name: 'search' }), // TODO: need to specify correct route name
        )
        .catch((e) => this.$refs.observer.setErrors(e))
        .finally(() => {
          this.processing = false;
        });
    },
  },
};
</script>
