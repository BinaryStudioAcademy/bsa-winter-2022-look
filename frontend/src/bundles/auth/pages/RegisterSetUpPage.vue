<template>
  <validation-observer ref="observer" v-slot="{ invalid, handleSubmit }">
    <user-set-up-form
      :invalid="invalid"
      :processing="processing"
      @submit="payload => handleSubmit(() => handleUserSubmit(payload))"
    />
  </validation-observer>
</template>

<script>
import { ValidationObserver } from 'vee-validate';
import { CREATE_USER } from '../store/modules/auth/types/actions';
import namespace from '@/bundles/auth/store/modules/auth/namespace';
import { mapActions } from 'vuex';
import UserSetUpForm from '../components/UserSetUpForm';

export default {
  components: {
    ValidationObserver,
    UserSetUpForm,
  },

  data() {
    return {
      processing: undefined,
    };
  },

  methods: {
    ...mapActions(namespace, {
      createUser: CREATE_USER,
    }),
    handleUserSubmit(payload) {
      if (this.processing) {
        return Promise.resolve();
      }

      this.processing = true;

      return this.createUser(payload)
        .then(() =>
          this.$router.push({ name: 'auth-registration-additional_info' }),
        )
        .catch((e) => this.$refs.observer.setErrors(e))
        .finally(() => {
          this.processing = false;
        });
    },
  },
};
</script>
