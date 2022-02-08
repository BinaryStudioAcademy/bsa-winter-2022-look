<template>
  <validation-observer
    ref="observer"
    v-slot="{ invalid }"
  >
    <v-spacer />
    <form @submit.prevent="submit">
      <validation-provider
        v-slot="{ errors }"
        name="select"
        rules="required"
      >
        <h2>Locaction</h2>
        <v-select
          v-model="select"
          :items="items"
          :error-messages="errors"
          label="Select"
          data-vv-name="select"
          required
        />
      </validation-provider>
      <validation-provider
        v-slot="{ errors }"
        name="Company field"
        rules="required|max:30"
      >
        <v-text-field
          v-model="name"
          :counter="30"
          :error-messages="errors"
          label="Company Name"
          required
        />
      </validation-provider>
      <validation-provider
        v-slot="{ errors }"
        name="School or University"
        rules="required|max:255"
      >
        <v-text-field
          v-model="name"
          :counter="255"
          :error-messages="errors"
          label="School or University"
          required
        />
      </validation-provider>
      <v-btn
        class="mr-4"
        type="submit"
        :disabled="invalid"
      >
        submit
      </v-btn>
      <v-btn @click="clear">
        clear
      </v-btn>
    </form>
  </validation-observer>
</template>
<script>
import { required, max } from 'vee-validate/dist/rules';
import { extend, ValidationObserver, ValidationProvider, setInteractionMode } from 'vee-validate';

setInteractionMode('eager');

extend('required', {
  ...required,
  message: '{_field_} can not be empty',
});

extend('max', {
  ...max,
  message: '{_field_} may not be greater than {length} characters',
});

export default {
  components: {
    ValidationProvider,
    ValidationObserver,
  },
  data: () => ({
    name: '',
    select: null,
    items: [
      'Agent',
      'Builder',
      'Conductor',
      'Mainer',
    ],
  }),

  methods: {
    submit() {
      this.$refs.observer.validate();
    },
    clear() {
      this.name = '';
      this.select = null;
      this.$refs.observer.reset();
    },
  },
};
</script>
