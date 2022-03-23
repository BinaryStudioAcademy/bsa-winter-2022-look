<template>
  <div>
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
import { ADD_USER_MEDIA } from '../store/modules/auth/types/actions';
import namespace from '@/bundles/auth/store/modules/auth/namespace';
import { mapActions } from 'vuex';
import MediaForm from '../components/MediaForm';
import userNamespace from '@/bundles/common/store/modules/user/namespace';
import { FETCH_SESSION_USER } from '@/bundles/common/store/modules/user/types/actions';

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
      addUserMedia: ADD_USER_MEDIA,
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
      return this.addUserMedia(payload)
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
