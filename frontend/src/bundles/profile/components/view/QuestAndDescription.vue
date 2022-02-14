<template>
  <v-list>
    <v-list-item>
      <v-list-item-content>
        <v-list-item-title class="my-2">Quest</v-list-item-title>
        <v-list-item-subtitle class="text-desc">
          <v-icon class="mx-1">{{ "$male" }}</v-icon>
          {{ purpose }}
        </v-list-item-subtitle>
      </v-list-item-content>
    </v-list-item>
    <v-list-item>
      <v-list-item-content>
        <v-list-item-title class="my-2">Descriptiion</v-list-item-title>
        <div>
          <span v-if="!readMoreActivated" class="text-desc">{{ description.slice(0, 200) }}</span>
          <a
            v-if="!readMoreActivated"
            class="see-more__link"
            href="#"
            @click="activateReadMore"
          >
            See more...
          </a>
          <p v-if="readMoreActivated" class="see-more">{{ description }}</p>
        </div>
      </v-list-item-content>
    </v-list-item>
  </v-list>
</template>

<script>
export default {
  props: {
    purpose: String,
    description: String,
  },

  data: () => ({
    readMoreActivated: false,
  }),

  methods: {
    activateReadMore() {
      this.readMoreActivated = true;
    },
  },
};
</script>

<style lang="scss" scoped>
.v-list-item__content {
  color: #787878;
  font-size: 14px;
}

.see-more__link {
  text-decoration: none;
  font-size: 14px;
  color: #FF6C6D;
}

.text-desc {
  color: #282828 !important;
  font-size: 16px;
}
</style>
