<template>
  <v-container>
    <v-row>
      <v-col>
        <Name />
        <Location />
        <ProfileViewCarousel />
        <QuestAndDescription :purpose="purpose" :description="description" />
        <HumanParameters />
        <Contacts />
        <Likes />
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import Name from '../components/view/Name.vue';
import Location from '../components/view/Location.vue';
import ProfileViewCarousel from '../components/view/ProfileViewCarousel.vue';
import QuestAndDescription from '../components/view/QuestAndDescription.vue';
import HumanParameters from '../components/view/HumanParameters.vue';
import Contacts from '../components/view/Contacts.vue';
import Likes from '../components/view/Likes.vue';
export default {
  components: {
    Name,
    Location,
    ProfileViewCarousel,
    QuestAndDescription,
    Contacts,
    HumanParameters,
    Likes,
  },
  data: () => ({
    purpose: 'looking for a man for a dates and a good time',
    description:
      'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Commodo sed ac donec nam auctor fusce tempor. Nisl elit, non blandit pretium malesuada. Etiam aliquam eu mattis varius in amet aliquet parturient. Maecenas amet, et senectus faucibus. ',
    model: 0,
    colors: ['primary', 'secondary', 'yellow darken-2', 'red', 'orange'],
  }),
};
</script>
<style lang="sass" scoped>
@import "@/assets/scss/main.scss"
</style>
