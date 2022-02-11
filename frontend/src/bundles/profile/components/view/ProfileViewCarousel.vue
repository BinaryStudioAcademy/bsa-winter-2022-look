<template>
  <carousel-3d :controls-visible="true" :clickable="false" :height="300">
    <slide v-for="(slide, i) in slides" :key="i" :index="i">
      <figure>
        <img :src="slide.src" />
        <figcaption>
          <v-btn text color="white">{{ slide.text }}</v-btn>
        </figcaption>
      </figure>
    </slide>
  </carousel-3d>
</template>
<script>
import { Carousel3d, Slide } from 'vue-carousel-3d';

export default {
  components: {
    Carousel3d,
    Slide,
  },
  data: () => ({
    slides: [
      {
        src: 'https://cdn.vuetifyjs.com/images/carousel/bird.jpg',
        text: 'John',
      },
      {
        src: 'https://cdn.vuetifyjs.com/images/carousel/planer.jpg',
        text: 'John',
      },
      {
        src: 'https://cdn.vuetifyjs.com/images/carousel/bird.jpg',
        text: 'John',
      },
      {
        src: 'https://cdn.vuetifyjs.com/images/carousel/planet.jpg',
        text: 'John',
      },
    ],
  }),
};
</script>
<style lang="scss">
// .theme--dark .v-carousel .v-window__container {
//   border-radius: 8px;
//   // max-width: 70%;
// }

// .theme--dark.v-carousel .v-carousel__controls {
//   top: 20px;
//   height: 3px;
// }

// .v-carousel {
//   width: 299px;
// }

.carousel-3d-container figure {
  margin: 0;
}

.carousel-3d-container figcaption {
  position: absolute;
  background-color: rgba(0, 0, 0, 0.5);
  color: white;
  bottom: 0;
  position: absolute;
  bottom: 0;
  padding: 15px;
  font-size: 12px;
  min-width: 100%;
  box-sizing: border-box;
}

.next span,
.prev span {
  color: orange;
}
</style>
