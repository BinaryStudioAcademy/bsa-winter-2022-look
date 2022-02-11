<template>
  <v-carousel v-model="model" height="383" hide-delimiter-background>
    <v-carousel-item v-for="(color, i) in colors" :key="color">
      <v-sheet
        :color="color"
        height="100%"
        tile>
        <v-row class="fill-height" align="center" justify="center">
          <div class="text-h2">Slide {{ i + 1 }}</div>
        </v-row>
      </v-sheet>
    </v-carousel-item>
  </v-carousel>
</template>
<script>
export default {
  data: () => ({
    model: 0,
    colors: ['primary', 'secondary', 'yellow darken-2', 'red', 'orange'],
  }),
};
</script>
<style lang="scss">
.theme--dark.v-carousel .v-carousel__controls {
  top: 10px;
}

.v-carousel {
  width: 299px;
}

</style>
