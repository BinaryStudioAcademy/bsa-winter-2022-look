<template>
  <form :value="!invalid" @submit.prevent="handleSubmit">
    <validation-provider
      v-slot="{ errors }"
      name="phone"
      rules="phone"
    >
      <v-text-field
        v-model="phone"
        type="text"
        name="phone"
        label="Phone"
        placeholder="(0XX) XXX-XXXX"
        filled
        rounded
        background-color="#faf9f9"
        outlined
        :error-messages="errors"
      />
    </validation-provider>
    <validation-provider
      v-slot="{ errors }"
      name="location"
    >
      <v-autocomplete
        v-model="locationSelected"
        :items="locations"
        small-chips
        label="Location"
        placeholder="Location"
        filled
        rounded
        background-color="#faf9f9"
        outlined
        clearable
        :error-messages="errors"
      />
    </validation-provider>
    <validation-provider
      v-slot="{ errors }"
      name="Height"
    >
      <v-slider
        v-model="height"
        min="50"
        max="250"
        :thumb-size="25"
        :error-messages="errors"
        thumb-label="always"
        label="Height, cm"
        inverse-label
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
        :thumb-size="25"
        :error-messages="errors"
        thumb-label="always"
        label="Weight, kg"
        inverse-label
      />
    </validation-provider>
    <validation-provider
      v-slot="{ errors }"
      name="interests"
    >
      <v-autocomplete
        v-model="interestSelected"
        :items="interests"
        small-chips
        label="Interests"
        placeholder="Interests"
        filled
        rounded
        background-color="#faf9f9"
        outlined
        multiple
        clearable
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
        small-chips
        label="Hobbies"
        placeholder="Hobbies"
        filled
        rounded
        background-color="#faf9f9"
        outlined
        multiple
        clearable
        :error-messages="errors"
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
        rounded
        filled
        label="About yourself"
        background-color="#faf9f9"
        rows="3"
        hint="At least 10 characters"
        outlined
        :error-messages="errors"
      />
    </validation-provider>

    <v-btn
      type="submit"
      :disabled="invalid"
      class="white--text text-capitalize font-weight-bold mr-4"
      color="primary"
      large
      rounded
      depressed
      max-width="215"
      width="100%"
    >
      Sign Up
    </v-btn>
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
      locations: [
        'Ukraine',
        'Canada',
        'USA',
        'Germany',
      ],
      locationSelected: undefined,
      interests: [
        'Making or listening to music',
        'Gaming',
        'Travel',
        'Art',
        'Nature',
        'Social causes',
        'Foreign languages',
        'Topical blogs or research',
        'History',
        'Theater',
      ],
      interestSelected: [],
      hobbies: [
        'Artistic activities such as painting or graphic design',
        'Community service',
        'Cooking or baking',
        'Examples of interests',
        'Exercising and healthcare',
        'Outdoor activities',
        'Playing an instrument',
        'Team or individual sports',
        'Travel',
        'Woodworking or other projects',
        'Writing or blogging',
      ],
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
