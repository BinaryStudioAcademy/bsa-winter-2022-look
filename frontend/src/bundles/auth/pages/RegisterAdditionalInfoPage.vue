<template>
  <div>
    <validation-observer ref="observer" v-slot="{ invalid, handleSubmit }">
      <additional-form
        :invalid="invalid"
        :processing="processing"
        @submit="payload => handleSubmit(() => handleUserSubmit(payload))"
      />
    </validation-observer>
  </div>
</template>

<script>
import { ValidationObserver } from 'vee-validate';
import {ADD_ADDITIONAL_INFO, REGISTER_USER_ADDITIONAL_INFO} from '../store/modules/auth/types/actions';
import namespace from '@/bundles/auth/store/modules/auth/namespace';
import { mapActions } from 'vuex';
import AdditionalForm from '../components/AdditionalForm';

export default {
  components: {
    ValidationObserver,
    AdditionalForm,
  },

  data() {
    return {
      processing: undefined,
    };
  },

  methods: {
    ...mapActions(namespace, {
      addAdditionalInfo: ADD_ADDITIONAL_INFO,
      registerUserAdditionalInfo: REGISTER_USER_ADDITIONAL_INFO,
    }),
    handleUserSubmit(payload) {
      if (this.processing) {
        return Promise.resolve();
      }

      this.processing = true;

      /**
       * TODO set user data when api completed
       */
      return this.registerUserAdditionalInfo(payload)
        .then(() => this.$router.push({ name: 'auth-registration-media' }))
        .catch((e) => this.$refs.observer.setErrors(e))
        .finally(() => {
          this.processing = false;
        });
    },
  },
};
</script>
