<template>
  <v-list>
    <v-list-item>
      <v-list-item-content>
        <v-list-item-title class="my-1">Contacts</v-list-item-title>
        <v-btn
          class="ma-2"
          outlined
          normal
          fab
          color="indigo">
          <v-icon>{{ "$phone" }}</v-icon>
        </v-btn>
        <v-btn
          class="ma-2"
          outlined
          normal
          fab
          color="indigo">
          <v-icon>{{ "$telegram" }}</v-icon>
        </v-btn>
        <v-btn
          class="ma-2"
          outlined
          normal
          fab
          color="indigo">
          <v-icon>{{ "$instagram" }}</v-icon>
        </v-btn>
        <v-btn
          class="ma-2"
          outlined
          normal
          fab
          color="indigo">
          <v-icon>{{ "$facebook" }}</v-icon>
        </v-btn>
      </v-list-item-content>
    </v-list-item>
  </v-list>
</template>

<script>
export default {};
</script>
