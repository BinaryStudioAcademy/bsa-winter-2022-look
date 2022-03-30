<template>
  <div>
    <page-title
      class="d-none d-sm-flex"
      title="Find your crash"
    />
    <div class="lightBlack--text text-12 pb-md-4 pb-3 d-none d-sm-flex">
      There are <span class="orange--text">34098</span> candidates
    </div>

    <div class="preference-button-positioner">
      <v-btn
        class="white--text text-capitalize font-weight-bold d-flex mx-auto mx-md-3 d-flex d-sm-none preference-button"
        color="primary"
        absolute
        large
        rounded
        depressed
        max-width="100"
        width="50%"
        @click="searchBar = !searchBar"
      >
        Preference
      </v-btn>
    </div>
    <div class="pt-4"></div>

    <div
      v-if="searchBar"
      class="block-filter search-bar d-flex flex-column flex-sm-row"
    >
      <div class="slider-parent col-md-4 col-xl-3 col-sm-12">
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

      <div class="slider-parent col-md-4 col-xl-3 col-sm-12">
        <v-slider
          v-model="range"
          min="1"
          max="1000"
          thumb-label="always"
          label="Range, km"
          inverse-label
        />
      </div>

      <div class="status-check mt-0 col-md-1 ml-1 col-xl-1 col-sm-12">
        <v-checkbox
          class="mt-0 pt-1"
          label="Only online"
          color="primary"
          value="false"
          hide-details
        />
      </div>

      <div class="col-md-2 col-xl-2 col-sm-12 pt-1">
        <v-btn
          class="white--text text-capitalize font-weight-bold d-flex mx-auto"
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
                  @click="rateUserById(user.id, rate.dislike, index)"
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
                  @click="rateUserById(user.id, rate.like, index)"
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
                    {{ user.distance }} km
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
      users: undefined,
      age_min: 18,
      age_max: 100,
      age: [18, 100],
      range: 500,
      rate: {
        like: 'like',
        dislike: 'dislike',
      },
      searchBar: true,
    };
  },

  beforeMount() {
    this.getUsers();
    this.hideSearchbar();
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
    rateUserById(id, rate, index) {
      return this.rateUser({
        id: id,
        status: rate,
      }).then(() => {
        this.users.splice(index, 1);
      }).catch(error => {
        console.dir(error);
      });
    },
    hideSearchbar() {
      if (document.documentElement.clientWidth <= 600) {
        this.searchBar = false;
      }
    },
  },

};
</script>

<style>

.search-bar > * {
  height: 80px;
  z-index: 6;
}

.status-check {
  height: auto;
  justify-content: center;
  align-items: center;
  text-align: center;
  padding: 0 12px !important;
}

.preference-button {
  top: -66px;
  right: 0px;
}

</style>
