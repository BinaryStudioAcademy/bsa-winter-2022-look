<template>
  <v-container>
    <v-row>
      <v-col>
        <ProfileViewCarouselVue />
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
import ProfileViewCarouselVue from '../components/view/ProfileViewCarousel.vue';
export default {
  components: {
    ProfileViewCarouselVue,
  },
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
