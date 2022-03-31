<template>
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
          v-if="message"
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
</template>

<script>

import HeartIcon from '@/bundles/main/components/icons/HeartIcon';
import NoLikeIcon from '@/bundles/main/components/icons/NoLikeIcon';
import ChatIcon from '@/bundles/main/components/icons/ChatIcon';

export default {
  components: {
    HeartIcon,
    NoLikeIcon,
    ChatIcon,
  },
  props: {
    user: {
      type: Object,
      default: undefined,
    },
    message: {
      type: Boolean,
      default: false,
    },
  },
};
</script>
