<template>
  <div>
    <v-row class="ma-2">
      <div class="col-md-3 col-xl-2 col-sm-12">
        <h3>User photo</h3>
      </div>
      <div class="col-md-5 col-xl-3 col-sm-12">
        <v-avatar
          class="user-avatar"
          size=61
          right
        >
          <img src="https://randomuser.me/api/portraits/women/81.jpg">
        </v-avatar>
      </div>
    </v-row>
    <form :value="!invalid" @submit.prevent="handleSubmit">
      <v-row class="ma-2">
        <div class="col-md-3 col-xl-2 col-sm-12">
          <h3>User details</h3>
        </div>
        <div class="col-md-5 col-xl-3 col-sm-12">
          <validation-provider
            v-slot="{ errors }"
            name = 'name'
            rules = 'required|min:3'
          >
            <v-text-field
              v-if="userInfo"
              v-model="userInfo.name"
              label="Full name"
              rounded
              outlined
              :error-messages="errors"
            />
          </validation-provider>
          <validation-provider
            v-slot="{ errors }"
            name = 'Password'
            rules = 'required|min:3'
          >
            <v-select
              :items="genders"
              label="Looking for"
              rounded
              outlined
              :error-messages="errors"
            />
          </validation-provider>
          <v-select
            :items="genders"
            label="Gender"
            rounded
            outlined
          />
        </div>
      </v-row>
      <v-row class="ma-2">
        <div class="col-md-3 col-xl-2 col-sm-12">
          <h3>Social network</h3>
        </div>
        <div class="col-md-5 col-xl-3 col-sm-12">
          Social parameters
        </div>
      </v-row>
    </form>

  </div>
</template>

<script>

import namespace from '@/bundles/common/store/modules/user/namespace';
import { ValidationProvider } from 'vee-validate';
import { mapState } from 'vuex';

export default {
  name: 'UserDetailsForm',

  components: {
    ValidationProvider,
  },

  props: {
    invalid: {
      type: Boolean,
      default: false,
    },
    processing: {
      type: Boolean,
      default: false,
    },
  },

  computed: {
    ...mapState(namespace, {
      userInfo: 'user',
    }),
    genders() {
      return [
        'Male',
        'Female',
      ];
    },
  },

};
</script>
