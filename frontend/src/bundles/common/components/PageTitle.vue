<template>
  <h1 class="purple--text h3 font-weight-bold pb-md-6 pb-3">
    {{ pageTitle }}
  </h1>
</template>

<script>
export default {
  props: {
    title: {
      type: String,
      default: 'Title',
    },
  },
  computed: {
    pageTitle() {
      return this.title;
    },
  },
};
</script>
