<template>
  <div>
    <page-title
      title="Find your crash"
    />
    <div class="lightBlack--text text-12 pb-md-4 pb-3">
      There are <span class="orange--text">34098</span> candidates
    </div>

    <div class="block-filter d-flex search-bar">
      <div
        class="d-flex"
      >
        <div class="slider-range">
          <v-range-slider
            v-model="age"
            :max="age_max"
            :min="age_min"
            class="align-center"
            thumb-label="always"
            label="Age"
          >
            <template>
              <v-text-field
                :value="age[0]"
                class="mt-0 pt-0 slider-text"
                single-line
                type="number"
                @change="$set(age, 0, $event)"
              />
            </template>
            <template>
              <v-text-field
                :value="age[1]"
                class="mt-0 pt-0 slider-text"
                single-line
                type="number"
                @change="$set(age, 1, $event)"
              />
            </template>
          </v-range-slider>
        </div>
        <div class="slider-range">
          <v-slider
            v-model="range"
            min="0"
            max="1000"
            thumb-label="always"
            label="Search distance, km"
            inverse-label
          />
        </div>
      </div>
      <div class="button-holder">
        <v-btn
          class="white--text text-capitalize font-weight-bold d-flex mx-auto mx-md-0"
          color="primary"
          large
          rounded
          depressed
          max-width="100"
          width="50%"
          @click="getUsers"
        >
          Save
        </v-btn>
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
                  v-model="user.id"
                  class="greyMain mt-4 mr-3"
                  depressed
                  fab
                  icon
                  rounded
                  small
                  @click="rateUserById(user.id, rate[0], index)"
                >
                  <NoLikeIcon />
                </v-btn>
                <v-btn
                  v-model="user.id"
                  class="greyMain mt-4 mr-1"
                  depressed
                  fab
                  icon
                  rounded
                  small
                  @click="rateUserById(user.id, rate[1], index)"
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
import { GET_USERS_LIST, RATE_USER } from '../../auth/store/modules/auth/types/actions';

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
      age_min: 18,
      age_max: 100,
      age: [18, 100],
      range: 500,
    };
  },

  computed: {
    rate() {
      return [
        'like', 'dislike',
      ];
    },
  },

  beforeMount() {
    this.getUsers();
  },

  methods: {
    ...mapActions(namespace, {
      getUsersList: GET_USERS_LIST,
      rateUser: RATE_USER,
    }),
    getUsers() {
      return this.getUsersList({
        min_age: this.age[0],
        max_age: this.age[1],
        range: this.range,
      }).then(data => {
        this.users = data.users;
      }).catch(error => {
        console.dir(error);
      });
    },
    rateUserById(id, value, index) {
      return this.rateUser({
        id: id,
        status: value,
      }).then(() => {
        this.users.splice(index, 1);
      }).catch(error => {
        console.dir(error);
      });
    },
    testi(value) {
      alert(value);
    },
  },

};
</script>

<style>

.search-bar {
  height: 80px;
}

.button-holder {
  display: flex;
  align-items: center;
}

.slider-range {
  margin: 0 14px;
  display: flex;
  width: 400px;
  align-items: end;
  justify-content: center;
}

</style>
