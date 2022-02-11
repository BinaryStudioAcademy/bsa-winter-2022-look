<template>
  <div>
    <h2 class="h4 primary--text head-login mt-md-16 mb-2">
      Log In
    </h2>
    <p class="small-text font-weight-light mb-6">
      Don’t have an account?
      <router-link
        class="link orange--text font-weight-regular"
        :to="{ name: 'auth-registration-set_up' }"
      >
        Sing Up
      </router-link>
    </p>
    <validation-observer ref="observer" v-slot="{ invalid, handleSubmit }">
      <login-form
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
import LoginForm from '../components/LoginForm';

export default {
  components: {
    ValidationObserver,
    LoginForm,
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

<style
  lang="scss"
>
@import "@/assets/scss/override.scss";
</style>
