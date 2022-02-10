<template>
  <div>
    <div>Media Page</div>
    <validation-observer ref="observer" v-slot="{ invalid, handleSubmit }">
      <media-form
        :invalid="invalid"
        :processing="processing"
        @submit="payload => handleSubmit(() => handleUserSubmit(payload))"
      />
    </validation-observer>
  </div>
</template>

<script>
import { ValidationObserver } from 'vee-validate';
import { CREATE_USER } from '../store/modules/auth/types/actions';
import namespace from '@/bundles/auth/store/modules/auth/namespace';
import { mapActions } from 'vuex';
import MediaForm from '../components/MediaForm';

export default {
  components: {
    ValidationObserver,
    MediaForm,
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
          this.$router.push({ name: 'auth-login' }),
        )
        .catch((e) => this.$refs.observer.setErrors(e))
        .finally(() => {
          this.processing = false;
        });
    },
  },
};
</script>
