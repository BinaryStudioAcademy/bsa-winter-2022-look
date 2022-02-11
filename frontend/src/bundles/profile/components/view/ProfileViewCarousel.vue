<template>
  <carousel-3d :controls-visible="true" :clickable="false" :height="611" :border="0">
    <slide v-for="(slide, i) in slides" :key="i" :index="i">
      <figure>
        <img :src="slide.src" />
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
.carousel-3d-container figure {
  margin: 0;
}

.next span,
.prev span {
  color: #FE5FAA;
}
</style>
