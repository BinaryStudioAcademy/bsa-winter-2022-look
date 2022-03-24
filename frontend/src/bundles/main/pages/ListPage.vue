<template>
  <div>
    <page-title
      title="List"
    />
    <div class="lightBlack--text text-12 pb-md-4 pb-3">
      There are <span class="orange--text">34098</span> candidates
    </div>

    <div class="block-filter d-flex">
      <div
        class="d-flex"
      >
        <v-autocomplete
          v-model="agesSelected"
          :items="ages"
          small-chips
          label="Age"
          placeholder="Age"
          filled
          rounded
          background-color="#faf9f9"
          outlined
          multiple
          clearable
          class="mr-4 w-280"
        >
          <template #selection="{ index }">
            <span
              v-if="index === 0"
              class="text-overline grey--text text--darken-3 mx-2"
            >
              +{{ agesSelected.length }} Selected
            </span>
          </template>
        </v-autocomplete>
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
              :src="user.image"
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
    users() {
      return [
        {
          image: 'https://randomuser.me/api/portraits/women/1.jpg',
          id: 1,
          name: 'Zoe Kim',
          online: true,
          distance: '500m',
        },
        {
          image: 'https://randomuser.me/api/portraits/women/2.jpg',
          id: 2,
          name: 'Monica Biluc',
          online: false,
          distance: '1500m',
        },
        {
          image: 'https://randomuser.me/api/portraits/women/3.jpg',
          id: 3,
          name: 'Tatiana Carder',
          online: true,
          distance: '700m',
        },
        {
          image: 'https://randomuser.me/api/portraits/women/4.jpg',
          id: 4,
          name: 'Gretchen Gouse',
          online: false,
          distance: '2500m',
        },
        {
          image: 'https://randomuser.me/api/portraits/women/5.jpg',
          id: 5,
          name: 'Madelyn Geidt',
          online: false,
          distance: '1500 km',
        },
        {
          image: 'https://randomuser.me/api/portraits/women/6.jpg',
          id: 6,
          name: 'Zoe Kim',
          online: true,
          distance: '500m',
        },
        {
          image: 'https://randomuser.me/api/portraits/women/7.jpg',
          id: 7,
          name: 'Monica Biluc',
          online: false,
          distance: '1500m',
        },
        {
          image: 'https://randomuser.me/api/portraits/women/8.jpg',
          id: 8,
          name: 'Tatiana Carder',
          online: true,
          distance: '700m',
        },
        {
          image: 'https://randomuser.me/api/portraits/women/9.jpg',
          id: 9,
          name: 'Gretchen Gouse',
          online: false,
          distance: '2500m',
        },
        {
          image: 'https://randomuser.me/api/portraits/women/10.jpg',
          id: 10,
          name: 'Madelyn Geidt',
          online: false,
          distance: '1500 km',
        },
        {
          image: 'https://randomuser.me/api/portraits/women/11.jpg',
          id: 11,
          name: 'Gretchen Gouse',
          online: false,
          distance: '2500m',
        },
        {
          image: 'https://randomuser.me/api/portraits/women/12.jpg',
          id: 12,
          name: 'Madelyn Geidt',
          online: false,
          distance: '1500 km',
        },
      ];
    },
  },
};
</script>
