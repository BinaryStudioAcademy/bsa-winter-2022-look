<template>
  <v-container>
    <v-row>
      <v-col>
        <ProfileViewCarousel />
        <QuestAndDescription />
        <Contacts />
        <HumanParameters />
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import ProfileViewCarousel from '../components/view/ProfileViewCarousel.vue';
import QuestAndDescription from '../components/view/QuestAndDescription.vue';
import HumanParameters from '../components/view/HumanParameters.vue';
import Contacts from '../components/view/Contacts.vue';
export default {
  components: {
    ProfileViewCarousel,
    QuestAndDescription,
    Contacts,
    HumanParameters,
  },
  data: () => ({
    model: 0,
    colors: ['primary', 'secondary', 'yellow darken-2', 'red', 'orange'],
  }),
};
</script>
