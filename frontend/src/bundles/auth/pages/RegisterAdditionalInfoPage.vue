<template>
  <div>
    <div>Additional Info Page</div>

    <validation-observer ref="observer" v-slot="{ invalid, handleSubmit }">
      <additional-form
        :invalid="invalid"
        :processing="processing"
        @submit="payload => handleSubmit(() => handleUserSubmit(payload))"
      />
    </validation-observer>

    <router-link
      :to="{ name: 'auth-registration-media' }"
    >
      Step 3
    </router-link>
  </div>
</template>

<script>
import { ValidationObserver } from 'vee-validate';
import { CREATE_USER } from '../store/modules/auth/types/actions';
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
      createUser: CREATE_USER,
    }),
    handleUserSubmit(payload) {
      if (this.processing) {
        return Promise.resolve();
      }

      this.processing = true;

      return this.createUser(payload)
        .then(() =>
          this.$router.push({ name: 'auth-registration-media' }),
        )
        .catch((e) => this.$refs.observer.setErrors(e))
        .finally(() => {
          this.processing = false;
        });
    },
  },
};
</script>
