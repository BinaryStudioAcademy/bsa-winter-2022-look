<template>
  <div>
    <h2 class="h4 primary--text head-login mt-md-16 mb-2">
      Change password
    </h2>
    <p class="small-text font-weight-light mb-6">
      Enter your new password <br>
    </p>
    <validation-observer ref="observer" v-slot="{ invalid, handleSubmit }">
      <change-password-form
        :invalid="invalid"
        :processing="processing"
        @submit="payload => handleSubmit(() => handleUserSubmit(payload))"
      />
    </validation-observer>

  </div>
</template>

<script>

import { extend, ValidationObserver } from 'vee-validate';
import { required } from 'vee-validate/dist/rules';
import { mapActions } from 'vuex';
import { CHANGE_USER_PASSWORD } from '../store/modules/auth/types/actions';
import namespace from '@/bundles/auth/store/modules/auth/namespace';
import ChangePasswordForm from '../components/ChangePasswordForm';
import router from '../../../router';

extend('required', {
  ...required,
  message: 'Password field can not be empty',
});

extend('password', {
  params: ['target'],
  validate(value, { target }) {
    return value === target;
  },
  message: 'Passwords does not match',
});

export default {
  components: {
    ChangePasswordForm,
    ValidationObserver,
  },

  props: {
    token: String,
  },

  data() {
    return {
      processing: undefined,
    };
  },

  methods: {
    ...mapActions(namespace, {
      changePassword: CHANGE_USER_PASSWORD,
    }),

    handleUserSubmit(payload) {
      if (this.processing) {
        return Promise.resolve();
      }

      this.processing = true;

      payload.token = this.token;
      return this.changePassword(payload)
        .then(() => {
          router.push({ name: 'auth-login' });
        });
    },
  },

};

</script>
