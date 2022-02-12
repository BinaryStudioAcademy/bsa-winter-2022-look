<template>
  <div>

    <v-carousel
      :interval=1000
      :light=false
      :multiple=false
    >
      <v-carousel-item
        v-for="(slide,i) in slides"
        :key="i"
        :src="slide.src"
      />
    </v-carousel>
  </div>
</template>
<script>

export default {
  components: {

  },
  data: () => ({
    show3d: false,
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
  color: #fe5faa;
}

.custom .v-carousel__controls__item.v-btn {
  color: red;
}

.custom .v-carousel__controls__item.v-btn.v-btn--active {
  color: green;
}

.custom .v-carousel__controls__item.v-btn.v-btn--active:before {
  opacity: 0;
}

.custom .v-carousel__controls__item.v-btn:hover {
  color: blue;
}

.custom .v-carousel__controls__item.v-btn:hover:before {
  opacity: 0;
}

</style>
