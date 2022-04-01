<template>
  <v-item-group
    class="pt-5"
  >
    <v-list-item-title
      class="font-weight-medium h6 mt-3 mb-3"
    >
      Frequently chat
    </v-list-item-title>

    <v-list-item
      v-for="(item, index) in frequentlyChat"
      :key="index"
      class="d-flex pa-0"
      flat
    >
      <v-badge
        :color="item.online ? 'green' : 'lightGrey'"
        dot
        overlap
        bordered
        bottom
        class="mr-3"
      >
        <v-avatar
          size="32"
        >
          <img
            :src="item.image"
          >
        </v-avatar>
      </v-badge>

      <router-link
        class="d-block w-100"
        :to="{name: 'main-chat'}"
      >
        <v-list-item-title
          class="d-flex justify-space-between"
        >
          <span
            class="text-14 lightBlack--text"
          >
            {{ item.name }}
          </span>
          <span
            v-if="item.message > 0"
            class="counter-msg primary font-weight-bold text-14 white--text"
          >
            {{ item.message }}
          </span>
        </v-list-item-title>
      </router-link>
    </v-list-item>
  </v-item-group>
</template>

<script>
export default {
  props: {
    frequentlyChat: {
      type: Array,
      default: undefined,
    },
  },
};
</script>
