<template>
  <v-container>
    <v-row>
      <v-col>
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
        <v-list>
          <v-list-item>
            <v-list-item-content>
              <v-list-item-title>Quest</v-list-item-title>
              <v-list-item-subtitle>
                Your quest
              </v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
          <v-list-item>
            <v-list-item-content>
              <v-list-item-title>Descriptiion</v-list-item-title>
              <v-list-item-subtitle>
                Your Description
              </v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
        </v-list>
        <v-list dense>
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
        </v-list>
        <v-list dense>
          <v-list-item>
            <v-list-item-content>
              <v-list-item-title>Contacts</v-list-item-title>
              <v-list-item-subtitle>25 year old</v-list-item-subtitle>
            </v-list-item-content>
            <v-list-item-content>
              <v-list-item-subtitle>67 kg</v-list-item-subtitle>
            </v-list-item-content>
            <v-list-item-content>
              <v-list-item-subtitle>167 m</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
        </v-list>
      </v-col>
    </v-row>
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
