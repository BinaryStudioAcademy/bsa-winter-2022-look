<template>
  <form :value="!invalid" @submit.prevent="handleSubmit">
    <validation-provider
      v-slot="{ errors }"
      name="Height"
    >
      <v-slider
        v-model="height"
        min="50"
        max="250"
        :error-messages="errors"
        thumb-label="always"
        label="Height, cm"
      />
    </validation-provider>
    <validation-provider
      v-slot="{ errors }"
      name="Weight"
    >
      <v-slider
        v-model="weight"
        min="30"
        max="250"
        :error-messages="errors"
        thumb-label="always"
        label="Weight, kg"
      />
    </validation-provider>
    <validation-provider
      v-slot="{ errors }"
      name="about"
      rules="required|min:10"
    >
      <v-textarea
        v-model="about"
        clearable
        clear-icon="mdi-close-circle"
        filled
        auto-grow
        label="About yourself"
        :error-messages="errors"
        rows="4"
        row-height="30"
        hint="At least 10 characters"
        shaped
        counter
      />
    </validation-provider>
    <validation-provider
      v-slot="{ errors }"
      name="phone"
    >
      <v-text-field
        v-model="phone"
        type="text"
        name="phone"
        label="Phone"
        :error-messages="errors"
      />
    </validation-provider>
    <validation-provider
      v-slot="{ errors }"
      name="location"
    >
      <v-autocomplete
        v-model="location"
        chips
        clearable
        deletable-chips
        dense
        filled
        rounded
        label="Location"
        :error-messages="errors"
      />
    </validation-provider>

    <validation-provider
      v-slot="{ errors }"
      name="interests"
    >
      <v-autocomplete
        v-model="interestSelected"
        :items="interests"
        dense
        chips
        deletable-chips
        small-chips
        label="Interests"
        multiple
        filled
        rounded
        :error-messages="errors"
      />
    </validation-provider>

    <validation-provider
      v-slot="{ errors }"
      name="hobbies"
    >
      <v-autocomplete
        v-model="hobbieSelected"
        :items="hobbies"
        dense
        chips
        deletable-chips
        small-chips
        label="Hobbies"
        multiple
        filled
        rounded
        :error-messages="errors"
      />
    </validation-provider>

    <v-btn class="mr-4" type="submit" :disabled="invalid"> Next Step </v-btn>
  </form>
</template>

<script>
import { ValidationProvider } from 'vee-validate';

export default {
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

  data() {
    return {
      height: 150,
      weight: 140,
      about: undefined,
      phone: undefined,
      location: [],
      interests: ['foo', 'bar', 'fizz', 'buzz'],
      interestSelected: [],
      hobbies: ['foo', 'bar', 'fizz', 'buzz'],
      hobbieSelected: [],
    };
  },

  methods: {
    handleSubmit() {
      this.$emit('submit', {
        height: this.height,
        weight: this.weight,
        about: this.about,
        phone: this.phone,
        interest: this.interestSelected,
        hobbie: this.hobbieSelected,
      });
    },
  },
};
</script>
