<template>
  <v-footer
    padless
  >
    <v-card
      flat
      tile
      width="100%"
      class="footer pa-md-11 pa-6 text-center"
    >
      <v-card-text
        class="footer--text white--text"
      >
        &copy; {{ new Date().getFullYear() }} Look
      </v-card-text>
    </v-card>
  </v-footer>
</template>

<style
  lang="scss"
  scoped
>
@import "@/assets/styles/variables.scss";

.v-footer {
  ::v-deep .footer {
    background-color: $purple-footer;
  }
}
.footer--text {
  font-weight: bold;
}
</style>
