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
import { ADD_ADDITIONAL_INFO } from '../store/modules/auth/types/actions';
import namespace from '@/bundles/auth/store/modules/auth/namespace';
import userNamespace from '@/bundles/common/store/modules/user/namespace';
import { FETCH_SESSION_USER } from '@/bundles/common/store/modules/user/types/actions';
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
    }),
    ...mapActions(userNamespace, {
      fetchSessionUser: FETCH_SESSION_USER,
    }),
    handleUserSubmit(payload) {
      if (this.processing) {
        return Promise.resolve();
      }

      this.processing = true;

      /**
       * TODO set user data when api completed
       */
      return this.addAdditionalInfo(payload)
        .then(() => this.fetchSessionUser())
        .then(() => this.$router.push({ name: 'main-list' }))
        .catch((e) => this.$refs.observer.setErrors(e))
        .finally(() => {
          this.processing = false;
        });
    },
  },
};
</script>
