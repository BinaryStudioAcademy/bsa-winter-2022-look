<template>
  <v-container
    class="router-layout ma-0 pa-1 pa-sm-4 mr-lg-6"
  >
    <validation-observer ref="observer" v-slot="{ invalid, handleSubmit }">
      <UserDetailsForm
        v-model="userAdditionalInfo"
        :invalid="invalid"
        :processing="processing"
        :user-additional-info="userAdditionalInfo"
        @submit="payload => handleSubmit(() => handleUserSubmit(payload))"
      />
      <v-row>
        <div class="col-md-3 col-xl-2 col-sm-12"></div>
        <div v-if="successfulMessage" class="successfulMessage col-md-5 col-xl-3 col-sm-12">
          <p>Changes has been saved</p>
        </div>
      </v-row>
    </validation-observer>
  </v-container>
</template>

<script>

import namespace from '../../auth/store/modules/auth/namespace';
import { ValidationObserver } from 'vee-validate';
import UserDetailsForm from '../components/UserDetailsForm';
import { mapActions } from 'vuex';
import {
  GET_USER_ADDITIONAL_INFO,
  SET_USER_ADDITIONAL_INFO,
} from '../../auth/store/modules/auth/types/actions';
export default {

  components: {
    UserDetailsForm,
    ValidationObserver,
  },

  data() {
    return {
      processing: undefined,
      userAdditionalInfo: {
        type: Object,
      },
      successfulMessage: false,
    };
  },

  beforeMount() {
    this.getUserInfo();
  },

  methods: {
    ...mapActions(namespace, {
      getUserAdditionalInfo: GET_USER_ADDITIONAL_INFO,
      setUserAdditionalInfo: SET_USER_ADDITIONAL_INFO,
    }),
    getUserInfo() {
      return this.getUserAdditionalInfo().then((response) => {
        this.userAdditionalInfo = response;
      })
        .catch((e) => {
          this.$refs.observer.setErrors(e);
        });
    },

    handleUserSubmit(payload) {
      if (this.processing) {
        return Promise.resolve();
      }

      this.processing = true;

      return this.setUserAdditionalInfo(payload)
        .then(() => {
          this.successfulMessage = true;
        },
        )
        .catch((e) => {
          this.$refs.observer.setErrors(e);
        })
        .finally(() => {
          this.processing = false;
        });
    },
  },

};

</script>

<style>
  .successfulMessage {
    color: green;
  }
  p {
    padding: 0 10px;
  }

  .router-layout {
    background-color: white;
    max-width: 100%;
  }

</style>
