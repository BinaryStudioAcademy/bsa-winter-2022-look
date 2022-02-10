<template>
  <validation-observer ref="observer" v-slot="{ invalid }">
    <form @submit.prevent="submit">
      <h2>Work & Education</h2>
      <v-spacer />
      <validation-provider v-slot="{ errors }" name="job">
        <v-select
          v-model="selectJob"
          :items="jobs"
          :error-messages="errors"
          label="Job"
          data-vv-name="selectJob"
        />
      </validation-provider>
      <validation-provider
        v-slot="{ errors }"
        name="Company field"
        rules="required|max:30"
      >
        <v-text-field
          v-model="companyName"
          :counter="30"
          :error-messages="errors"
          label="Company Name"
          required
        />
      </validation-provider>
      <validation-provider
        v-slot="{ errors }"
        name="Education name"
        rules="required|max:255"
      >
        <v-text-field
          v-model="educationName"
          :counter="255"
          :error-messages="errors"
          label="School or University"
          required
        />
      </validation-provider>
      <h2>Locaction</h2>
      <v-spacer />
      <validation-provider
        v-slot="{ errors }"
        name="selectLocation"
        rules="required"
      >
        <v-select
          v-model="selectLocation"
          :items="locations"
          :error-messages="errors"
          label="Location"
          data-vv-name="selectLocation"
          required
        />
      </validation-provider>
      <h2>Purpose</h2>
      <validation-provider>
        <v-radio-group v-model="radioGroup">
          <v-radio
            v-for="(purp, id) in purposes"
            :key="id"
            :label="purp"
            :value="purp"
          />
        </v-radio-group>
      </validation-provider>
      <h2>Interest</h2>
      <validation-provider>
        <v-combobox
          v-model="chips"
          :items="items"
          chips
          clearable
          label="Your favorite hobbies"
          multiple
          solo
        >
          <template #selection="{ attrs, item, select, selected }">
            <v-chip
              v-bind="attrs"
              :input-value="selected"
              close
              @click="select"
              @click:close="remove(item)"
            >
              <strong>{{ item }}</strong
              >&nbsp;
              <span>(interest)</span>
            </v-chip>
          </template>
        </v-combobox>
      </validation-provider>
      <h2>Personal info</h2>
      <h3>Bio</h3>
      <validation-provider>
        <v-textarea v-model="bio" color="teal">
          <template #label>
            <div>About me</div>
          </template>
        </v-textarea>
      </validation-provider>
      <h3>Relationship</h3>
      <validation-provider v-slot="{ errors }" name="relationship">
        <v-select
          v-model="selectRelation"
          :items="relationships"
          :error-messages="errors"
          label="Relationship"
          data-vv-name="selectRelation"
        />
      </validation-provider>
      <h3>Sexuality</h3>
      <validation-provider v-slot="{ errors }" name="sexuality">
        <v-select
          v-model="selectSexuality"
          :items="sexuality"
          :error-messages="errors"
          label="Sexuality"
          data-vv-name="selectSexuality"
        />
      </validation-provider>
      <h3>Height</h3>
      <validation-provider v-slot="{ errors }" name="height">
        <v-select
          v-model="selectHeight"
          :items="heights"
          :error-messages="errors"
          label="Height"
          data-vv-name="selectHeight"
        />
      </validation-provider>
      <validation-provider v-slot="{ errors }" name="weight">
        <v-select
          v-model="selectWeight"
          :items="weights"
          :error-messages="errors"
          label="Wight"
          data-vv-name="selectWeight"
        />
      </validation-provider>
      <v-btn class="mr-4" type="submit" :disabled="invalid"> Save </v-btn>
      <v-btn @click="clear"> Clear </v-btn>
    </form>
  </validation-observer>
</template>
<script>
import {
  ValidationObserver,
  ValidationProvider,
  setInteractionMode,
} from 'vee-validate';

setInteractionMode('eager');

export default {
  components: {
    ValidationProvider,
    ValidationObserver,
  },
  data: () => ({
    bio: '',
    chips: [
      'Programming',
      'Playing video games',
      'Watching movies',
      'Sleeping',
    ],
    items: ['Streaming', 'Eating'],
    relationships: [
      'I’d prefer not to say',
      'I’m in a complicated relationship',
      'Single',
      'Taken',
    ],
    sexuality: [
      'I’d prefer not to say',
      'Bisexual',
      'Gay',
      'Ask me',
      'Straight',
    ],
    companyName: '',
    educationName: '',
    selectSexuality: null,
    selectRelation: null,
    selectJob: null,
    selectLocation: null,
    selectHeight: null,
    selectWeight: null,
    radioGroup: null,

    heights: [150, 160, 170, 180, 190, 200, 210],
    weights: [150, 160, 170, 180, 190, 200, 210],
    jobs: ['Agent', 'Builder', 'Conductor', 'Mainer'],
    locations: ['Kyiv', 'Warshawa', 'New-York', 'London'],

    purposes: [
      'To chat and meet new people',
      'To date',
      'To date seriously',
      'To see what happens',
      'To make a long-term commitment',
    ],
  }),

  methods: {
    remove(item) {
      this.chips.splice(this.chips.indexOf(item), 1);
      this.chips = [...this.chips];
    },
    submit() {
      this.$refs.observer.validate();
    },
    clear() {
      this.bio = '';
      this.radioGroup = null;
      this.companyName = '';
      this.educationName = '';
      this.selectJob = null;
      this.selectLocation = null;
      this.selectSexuality = null;
      this.selectRelation = null;
      this.selectHeight = null;
      this.selectWeight = null;
      this.$refs.observer.reset();
    },
  },
};
</script>
