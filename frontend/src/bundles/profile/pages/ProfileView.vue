<template>
  <v-container>
    <v-carousel
      :show-arrows="true"
      hide-delimiter-background
      height="300"
    >
      <v-carousel-item v-for="(color, i) in colors" :key="color" @click="showlog">
        <v-sheet :color="color" height="100%" tile>
          <v-row class="fill-height" align="center" justify="center">
            <div class="text-h2">Slide {{ i + 1 }}</div>
          </v-row>
        </v-sheet>
      </v-carousel-item>
    </v-carousel>
    <v-card>
      <v-card-title class="align-start"> Quest </v-card-title>

      <v-card-text class="text-no-wrap text--primary mt-3">
        <p class="font-weight-semibold text-sm mb-1">Your quest</p>
      </v-card-text>
      <v-card-title class="align-start"> Description </v-card-title>

      <v-card-text class="text-no-wrap text--primary mt-3">
        <p class="font-weight-semibold text-sm mb-1">Your description</p>
      </v-card-text>
    </v-card>
    <v-card>
      <v-list dense>
        <v-subheader>REPORTS</v-subheader>
        <v-list-item>
          <v-list-item-content>
            <v-list-item-title>Age</v-list-item-title>
            <v-list-item-subtitle>25 year old</v-list-item-subtitle>
          </v-list-item-content>
          <v-list-item-content>
            <v-list-item-title>Weight</v-list-item-title>
            <v-list-item-subtitle>67 kg</v-list-item-subtitle>
          </v-list-item-content>
          <v-list-item-content>
            <v-list-item-title>Height</v-list-item-title>
            <v-list-item-subtitle>167 m</v-list-item-subtitle>
          </v-list-item-content>
        </v-list-item>
      </v-list></v-card
    >
  </v-container>
</template>

<script>
export default {
  data: () => ({
    model: 0,
    colors: ['primary', 'secondary', 'yellow darken-2', 'red', 'orange'],
  }),

  methods: {
    showlog() {
      console.log('Viktor');
    },
  },
};
</script>
