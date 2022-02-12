<template>
  <v-list>
    <v-list-item>
      <v-list-item-content>
        <v-list-item-title>Quest</v-list-item-title>
        <v-list-item-subtitle>
          {{ purpose }}
        </v-list-item-subtitle>
      </v-list-item-content>
    </v-list-item>
    <v-list-item>
      <v-list-item-content>
        <v-list-item-title>Descriptiion</v-list-item-title>
        <v-list-item-subtitle>
          {{ description }}
        </v-list-item-subtitle>
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
};
</script>
