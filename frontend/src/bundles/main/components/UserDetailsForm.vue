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
            name = 'gender_preference'
            rules = 'required|min:3'
          >
            <v-autocomplete
              :items="gender_preferences"
              label="Looking for"
              rounded
              outlined
              :error-messages="errors"
            />
          </validation-provider>
          <v-autocomplete
            :items="genders"
            label="Gender"
            rounded
            outlined
          />
          <validation-provider
            v-slot="{ errors }"
            name="location"
            rules = 'required'
          >
            <v-autocomplete
              v-model="locationSelected"
              :items="locations"
              small-chips
              label="Location"
              placeholder="Location"
              rounded
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
            rules = 'required'
          >
            <v-autocomplete
              v-model="interestSelected"
              :items="interests"
              small-chips
              label="Interests"
              placeholder="Interests"
              rounded
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
            rules = 'required'
          >
            <v-autocomplete
              v-model="hobbiesSelected"
              :items="hobbies"
              small-chips
              label="Hobbies"
              placeholder="Hobbies"
              rounded
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
            rules="required|min:10"
          >
            <v-textarea
              v-model="about"
              clearable
              clear-icon="mdi-close-circle"
              rounded
              label="About yourself"
              rows="3"
              hint="At least 10 characters"
              outlined
              :error-messages="errors"
            />
          </validation-provider>

        </div>
      </v-row>
      <v-row class="ma-2">
        <div class="col-md-3 col-xl-2 col-sm-12">
          <h3>Social network</h3>
        </div>
        <div class="col-md-5 col-xl-3 col-sm-12">
          <validation-provider
            v-slot="{ errors }"
            name = 'email'
            rules = 'required|min:3|email'
          >
            <v-text-field
              :items="email"
              label="Email"
              rounded
              outlined
              :error-messages="errors"
            />
          </validation-provider>
          <validation-provider
            v-slot="{ errors }"
            name = 'instagram'
          >
            <v-text-field
              :items="instagram"
              label="Instagram"
              rounded
              outlined
              :error-messages="errors"
            />
          </validation-provider>
          <validation-provider
            v-slot="{ errors }"
            name = 'facebook'
          >
            <v-text-field
              :items="facebook"
              label="Facebook"
              rounded
              outlined
              :error-messages="errors"
            />
          </validation-provider>
          <validation-provider
            v-slot="{ errors }"
            name = 'other_social'
          >
            <v-text-field
              :items="other_social"
              label="Other"
              rounded
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
            Save changes
          </v-btn>

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
        'Male', 'Female', 'Other',
      ];
    },
    gender_preferences() {
      return [
        'Male', 'Female', 'Both',
      ];
    },
    locations() {
      return [
        'Ukraine',
        'Canada',
        'USA',
        'Germany',
      ];
    },
  },

};
</script>
