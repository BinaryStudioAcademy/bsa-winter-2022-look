<template>
  <div>
    <v-row class="ma-2">
      <div class="col-4">
        <h3>User photo</h3>
      </div>
      <div class="col-6">
        <v-avatar
          class="user-avatar"
          size=61
          right
        >
          <img src="https://randomuser.me/api/portraits/women/81.jpg">
        </v-avatar>
      </div>
    </v-row>
    <v-form>
      <v-row class="ma-2">
        <div class="col-4">
          <h3>User details</h3>
        </div>
        <div class="col-6">
          <v-text-field
            v-model="userInfo.name"
            label="Full name"
            required
          />
          <v-select
            :items="genders"
            label="Looking for"
          />
        </div>
      </v-row>
      <v-row class="ma-2">
        <div class="col-4">
          <h3>Social network</h3>
        </div>
        <div class="col-6">
          Social parameters
        </div>
      </v-row>
    </v-form>

  </div>
</template>

<script>

export default {
  name: 'UserDetailsForm',

  data() {
    return {
      genders: ['male', 'female'],
      userInfo: {
        type: Object,
        default: undefined,
      },
    };
  },
};
</script>
