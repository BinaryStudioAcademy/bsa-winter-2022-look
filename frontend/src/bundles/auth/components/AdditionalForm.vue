<template>
  <form
    :value="!invalid"
    @submit.prevent="handleSubmit"
  >
    <validation-provider
      name="gender"
    >
      <p>You are <span class="primary--text font-weight-bold">{{ gender }}</span></p>
      <v-radio-group
        v-model="gender"
        row
      >
        <v-radio
          v-for="(gender, index) in genders"
          :key="index"
          :label="gender.gender_label"
          :value="gender.gender_name"
        />
      </v-radio-group>
    </validation-provider>
    <validation-provider
      name="gender_preference"
    >
      <p>Your preference selection <span class="primary--text font-weight-bold">{{ gender_preference }}</span></p>
      <v-radio-group
        v-model="gender_preference"
        row
      >
        <v-radio
          v-for="(gender, index) in gender_preferences"
          :key="index"
          :label="gender.gender_label"
          :value="gender.gender_name"
        />
      </v-radio-group>
    </validation-provider>
    <validation-provider
      v-slot="{ errors }"
      name="phone"
      rules="required|phone"
    >
      <v-text-field
        v-model="phone"
        v-mask="'+##(###)###-##-##'"
        type="text"
        name="phone"
        label="Phone"
        placeholder="+38(067)123-45-67"
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
      name="Age"
    >
      <v-slider
        v-model="age"
        min="18"
        max="120"
        :thumb-size="25"
        :error-messages="errors"
        thumb-label="always"
        label="Age, years"
        inverse-label
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
        label="Height, sm"
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
      >
        <template #selection="{ index }">
          <span
            v-if="index === 0"
            class="text-overline grey--text text--darken-3 mx-2"
          >
            +{{ interestSelected.length }} Selected
          </span>
        </template>
      </v-autocomplete>
    </validation-provider>

    <validation-provider
      v-slot="{ errors }"
      name="hobbies"
    >
      <v-autocomplete
        v-model="hobbiesSelected"
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
      >
        <template #selection="{ index }">
          <span
            v-if="index === 0"
            class="text-overline grey--text text--darken-3 mx-2"
          >
            +{{ hobbiesSelected.length }} Selected
          </span>
        </template>
      </v-autocomplete>
    </validation-provider>

    <validation-provider
      v-slot="{ errors }"
      name="about"
      rules="required|min:10,description|max:500,description"
    >
      <v-textarea
        v-model="about"
        auto-grow
        counter="500"
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
      class="white--text text-capitalize font-weight-bold d-flex mx-auto mx-md-0"
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
      age: 25,
      height: 150,
      weight: 140,
      about: undefined,
      phone: undefined,
      gender: 'male',
      gender_preference: 'female',
      locations: [
        'Ukraine',
        'Canada',
        'USA',
        'Germany',
      ],
      locationSelected: undefined,
      interestSelected: [],
      hobbiesSelected: [],
    };
  },

  computed: {
    hobbies() {
      return [
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
      ];
    },
    interests() {
      return [
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
      ];
    },
    genders() {
      return [
        {
          gender_name: 'male',
          gender_label: 'Male',
        },
        {
          gender_name: 'female',
          gender_label: 'Female',
        },
        {
          gender_name: 'other',
          gender_label: 'Other',
        },
      ];
    },
    gender_preferences() {
      return [
        {
          gender_name: 'male',
          gender_label: 'Male',
        },
        {
          gender_name: 'female',
          gender_label: 'Female',
        },
        {
          gender_name: 'both',
          gender_label: 'Both',
        },
      ];
    },
  },

  methods: {
    handleSubmit() {
      this.$emit('submit', {
        age: this.age,
        height: this.height,
        weight: this.weight,
        about: this.about,
        phone: this.phone,
        interest: this.interestSelected,
        hobby: this.hobbiesSelected,
        gender: this.gender,
        gender_preference: this.gender_preference,
      });
    },
  },
};
</script>
