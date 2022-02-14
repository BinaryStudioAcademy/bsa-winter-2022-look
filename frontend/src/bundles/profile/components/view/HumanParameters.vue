<template>
  <v-list dense>
    <v-list-item>
      <v-list-item-content>
        <v-list-item-title class="my-2">Age</v-list-item-title>
        <span class="text-desc">25 year old</span>
      </v-list-item-content>
      <v-list-item-content>
        <v-list-item-title class="my-2">Weight</v-list-item-title>
        <span class="text-desc">67 kg</span>
      </v-list-item-content>
      <v-list-item-content>
        <v-list-item-title class="my-2">Height</v-list-item-title>
        <span class="text-desc">167 m</span>
      </v-list-item-content>
    </v-list-item>
  </v-list>
</template>

<script>
export default {

};
</script>

<style lang="scss">
.v-list-item__content {
  color: #787878;
  font-size: 14px;
}

.v-list-item__title {
  color: #787878;
  font-size: 16px !important;
}

.text-desc {
  color: #282828 !important;
  font-size: 16px;
}

</style>
