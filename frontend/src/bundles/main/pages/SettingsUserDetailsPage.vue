<template>
  <validation-observer ref="observer" v-slot="{ invalid, handleSubmit }">
    <UserDetailsForm
      :invalid="invalid"
      :processing="processing"
      @submit="payload => handleSubmit(() => handleUserSubmit(payload))"
    />
  </validation-observer>
</template>

<script>

import { ValidationObserver } from 'vee-validate';
import UserDetailsForm from '../components/UserDetailsForm';
export default {

  components: {
    UserDetailsForm,
    ValidationObserver,
  },

  data() {
    return {
      processing: undefined,
    };
  },

};

</script>
