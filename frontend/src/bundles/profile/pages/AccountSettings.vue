<template>
  <v-main>
    <v-container>
      <h2>Settings</h2>
      <validation-observer ref="observer" v-slot="{ invalid }">
        <form @submit.prevent="submit">
          <validation-provider
            v-slot="{ errors }"
            name="Name"
            rules="required|max:255"
          >
            <v-text-field
              v-model="name"
              :counter="255"
              :error-messages="errors"
              label="Name"
              required
            />
          </validation-provider>
          <validation-provider
            v-slot="{ errors }"
            name="email"
            rules="required|email"
          >
            <v-text-field
              v-model="email"
              :error-messages="errors"
              label="E-mail"
              required
            />
          </validation-provider>
          <v-btn class="mr-4" type="submit" :disabled="invalid"> submit </v-btn>
          <v-btn @click="clear"> clear </v-btn>
        </form>
      </validation-observer>
    </v-container>

  </v-main>

</template>

<script>
import { ValidationObserver, ValidationProvider, setInteractionMode } from 'vee-validate';

setInteractionMode('eager');

export default {
  components: {
    ValidationProvider,
    ValidationObserver,
  },
  data: () => ({
    name: '',
    email: '',
  }),

  methods: {
    submit() {
      this.$refs.observer.validate();
    },
    clear() {
      this.name = '';
      this.email = '';
    },
  },
};
</script>
