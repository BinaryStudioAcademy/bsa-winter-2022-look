<template>
  <v-list>
    <v-list-item>
      <v-list-item-content>
        <v-btn
          depressed="true"
          class="ma-2"
          large
          fab
          color="#F5F5F5">
          <v-icon>{{ "$dislike" }}</v-icon>
        </v-btn>
        <v-btn
          depressed="true"
          class="ma-2"
          large
          fab
          color="#F5F5F5">
          <v-icon>{{ "$outlineheart" }}</v-icon>
        </v-btn>
        <v-btn
          depressed="true"
          class="ma-2"
          large
          fab
          color="#F5F5F5">
          <v-icon>{{ "$greychat" }}</v-icon>
        </v-btn>
      </v-list-item-content>
    </v-list-item>
  </v-list>
</template>

<script>
export default {

};
</script>
