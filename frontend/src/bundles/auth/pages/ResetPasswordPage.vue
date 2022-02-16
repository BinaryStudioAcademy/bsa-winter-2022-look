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
    <validation-observer ref="observer" v-slot="{ invalid, handleSubmit }">
      <reset-password-form
        :invalid="invalid"
        :processing="processing"
        @submit="payload => handleSubmit(() => handleUserSubmit(payload))"
      />
      <div v-if="success" class="result-message">
        <span class="success-message">
          Change password link send to your email
        </span>
      </div>
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

  props: {
    invalid: {
      type: Boolean,
      default: false,
    },
  },

  data: () => ({
    processing: false,
    success: false,
  }),

  methods: {
    ...mapActions(namespace, {
      resetPassword: RESET_USER_PASSWORD,
    }),
    handleUserSubmit(payload) {
      if (this.processing) {
        return Promise.resolve();
      }

      this.processing = true;

      return this.resetPassword(payload).then(() => {
        this.success = true;
      })
        .catch((e) => this.$refs.observer.setErrors(e))
        .finally(() => {
          this.processing = false;
        });
    },
  },
};
</script>

<style
  lang="scss"
  scoped
>

.success-message {
  color: green;
}

</style>
