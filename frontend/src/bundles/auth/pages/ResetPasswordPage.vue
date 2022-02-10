<template>
  <div>
    <div>Reset Password Page</div>
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
import { LOGIN_USER } from '../store/modules/auth/types/actions';
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
      loginUser: LOGIN_USER,
    }),
    handleUserSubmit(payload) {
      if (this.processing) {
        return Promise.resolve();
      }

      this.processing = true;

      return this.loginUser(payload)
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
