<template>
  <validation-observer ref="observer" v-slot="{ invalid, handleSubmit }">
    <user-login-form
      :invalid="invalid"
      :processing="processing"
      @submit="payload => handleSubmit(() => handleUserSubmit(payload))"
    />
  </validation-observer>
</template>

<script>
import { ValidationObserver } from 'vee-validate';
import { LOGIN_USER } from '../store/modules/auth/types/actions';
import namespace from '@/bundles/auth/store/modules/auth/namespace';
import { mapActions } from 'vuex';
import UserLoginForm from '../components/UserLoginForm';

export default {
  components: {
    ValidationObserver,
    UserLoginForm,
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
