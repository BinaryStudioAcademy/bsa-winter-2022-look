<template>
  <v-carousel height="383" hide-delimiter-background delimiter-icon="mdi-minus">
    <template #prev="{ on, attrs }">
      <v-btn
        depressed="true"
        v-bind="attrs"
        fab
        small
        color="grey lighten-2"
        v-on="on"
      ><v-icon size="12">{{ "$arrowprev" }}</v-icon></v-btn
      >
    </template>
    <template #next="{ on, attrs }">
      <v-btn
        depressed="true"
        fab
        small
        color="grey lighten-2"
        v-bind="attrs"
        v-on="on"
      ><v-icon size="12">{{ "$arrownext" }}</v-icon></v-btn
      >
    </template>
    <v-carousel-item v-for="(slide, i) in slides" :key="i">
      <v-sheet
        :color="colors[i]"
        height="383"
        width="600"
        class="mx-auto elevation-3"
        rounded="true"
      >
        <v-row class="fill-height" align="center" justify="center">
          <div class="text-h2">{{ slide }} Slide</div>
        </v-row>
      </v-sheet>
    </v-carousel-item>
  </v-carousel>
</template>
<script>
export default {
  data() {
    return {
      colors: [
        'indigo',
        'warning',
        'pink darken-2',
        'red lighten-1',
        'deep-purple accent-4',
      ],
      slides: ['First', 'Second', 'Third', 'Fourth', 'Fifth'],
    };
  },
};
</script>

<style lang="scss">
.v-carousel__controls {
  top: 0;
}

.v-btn .v-btn--is-elevated .v-btn--has-bg .theme--dark .v-size--default {
  height: 36px !important;
  width: 36px !important;
  border-radius: 100%;
}
.v-application--is-ltr .v-window__prev {
  left: 22% !important;
}

.v-application--is-ltr .v-window__next {
  right: 22% !important;
}

</style>
