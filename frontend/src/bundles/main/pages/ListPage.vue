<template>
  <div>
    <page-title
      title="Find your crash"
    />
    <div class="lightBlack--text text-12 pb-md-4 pb-3">
      There are <span class="orange--text">34098</span> candidates
    </div>

    <div class="block-filter d-flex">
      <div
        class="d-flex"
      >
        <div class="slider-range">
          <v-range-slider
            v-model="range"
            :max="max"
            :min="min"
            class="align-center"
            thumb-label="always"
          >
            <template>
              <v-text-field
                :value="range[0]"
                class="mt-0 pt-0 slider-text"
                single-line
                type="number"
                @change="$set(range, 0, $event)"
              />
            </template>
            <template>
              <v-text-field
                :value="range[1]"
                class="mt-0 pt-0 slider-text"
                single-line
                type="number"
                @change="$set(range, 1, $event)"
              />
            </template>
          </v-range-slider>
        </div>
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
          class="mr-4 w-280"
        />
      </div>
      <v-spacer />
      <v-checkbox
        label="Only online"
        color="primary"
        value="false"
        hide-details
      />
    </div>

    <div class="users">
      <v-row
        justify="space-around"
      >
        <v-col
          v-for="(user, index) in users"
          :key="index"
          cols="12"
          xl="2"
          lg="3"
          md="4"
          sm="6"
        >
          <v-card
            class="v-card__user"
            elevation="0"
          >
            <v-img
              :src="user.avatar"
              height="255"
              class="grey darken-4"
            >
              <v-app-bar
                flat
                color="rgba(0, 0, 0, 0)"
              >
                <v-spacer />
                <v-btn
                  class="greyMain mt-4 mr-3"
                  depressed
                  fab
                  icon
                  rounded
                  small
                >
                  <NoLikeIcon />
                </v-btn>
                <v-btn
                  class="greyMain mt-4 mr-1"
                  depressed
                  fab
                  icon
                  rounded
                  small
                >
                  <HeartIcon />
                </v-btn>
              </v-app-bar>
            </v-img>

            <v-card-title class="text-h6 pa-5">
              <v-row
                justify="space-between"
                align="center"
              >
                <v-col
                  cols="9"
                >
                  <v-badge
                    :color="user.online ? 'green' : 'lightGrey'"
                    class="h6 font-weight-bold lightBlack--text"
                    dot
                    inline
                    left
                  >
                    {{ user.name }}
                  </v-badge>
                  <div
                    class="text-12 font-weight-regular border--text"
                  >
                    {{ user.distance }}
                  </div>
                </v-col>
                <v-col
                  cols="3"
                  class="d-flex justify-end"
                >
                  <v-btn
                    class="greyMain"
                    depressed
                    fab
                    icon
                    rounded
                  >
                    <ChatIcon />
                  </v-btn>
                </v-col>
              </v-row>
            </v-card-title>
          </v-card>
        </v-col>
      </v-row>
    </div>
  </div>
</template>

<script>

import HeartIcon from '@/bundles/main/components/icons/HeartIcon';
import NoLikeIcon from '@/bundles/main/components/icons/NoLikeIcon';
import ChatIcon from '@/bundles/main/components/icons/ChatIcon';
import PageTitle from '@/bundles/common/components/PageTitle';
import { mapActions } from 'vuex';
import namespace from '../../auth/store/modules/auth/namespace';
import { GET_USERS_LIST } from '../../auth/store/modules/auth/types/actions';

export default {
  components: {
    PageTitle,
    HeartIcon,
    NoLikeIcon,
    ChatIcon,
  },
  data() {
    return {
      agesSelected: [],
      locations: [
        'Ukraine',
        'Canada',
        'USA',
        'Germany',
      ],
      locationSelected: undefined,
      users: undefined,
      min: 18,
      max: 100,
      range: [18, 100],
    };
  },

  computed: {
    ages() {
      return [
        20, 21, 22, 23, 24, 25, 26, 27, 28, 29,
        30, 31, 32, 33, 34, 35, 36, 37, 38, 39,
        40, 41, 42, 43, 44, 45, 46, 47, 48, 49,
      ];
    },
  },

  beforeMount() {
    this.getUsers();
  },

  methods: {
    ...mapActions(namespace, {
      getUsersList: GET_USERS_LIST,
    }),
    getUsers() {
      return this.getUsersList({
        min_age: 18,
        max_age: 100,
        range: 700,
      }).then(data => {
        this.users = data.users;
      });
    },
  },

};
</script>

<style>

.slider {
  width: 60px;
}

.slider-range {
  display: flex;
  width: 400px;
  align-items: center;
  justify-content: center;
}

</style>
