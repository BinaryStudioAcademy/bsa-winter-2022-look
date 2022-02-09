<template>
  <div>
    <HeaderLandingNav
      :items="itemsMenu"
      :is-authorized="isAuthorized"
    />
    <v-main>
      <v-parallax
        height="900"
        src="@/assets/image/home_bg_header_no_harts.png"
      >
        <v-container>
          <v-row
            align="center"
            justify="center"
          >
            <v-col
              class="text-center"
              cols="10"
              md="4"
              sm="6"
            >
              <h1 class="main--text h1 black--text font-weight-bold pb-md-4 pb-2">
                It is never too late
                to fall in love
              </h1>
              <p class="main-sub--text subheading black--text pb-md-2 pb-2">
                When you find that one that's right for you,
                you feel like they were put there for you,
                you never want to be apart.
              </p>
              <v-btn
                class="white--text text-capitalize font-weight-bold"
                color="button-main"
                large
                rounded
                depressed
                to="/auth"
              >
                Create Account
              </v-btn>
            </v-col>
          </v-row>
          <v-row
            class="mt-md-16"
            align="end"
            justify="center"
          >
            <v-col
              align-self="center"
              justify="center"
              cols="6"
            >
              <v-img
                max-height="415"
                max-width="160"
                contain
                class="header-person"
                src="@/assets/image/home_header_boy.svg"
              />
            </v-col>
            <v-col
              cols="6"
            >
              <div class="relative">
                <v-img
                  max-height="415"
                  max-width="160"
                  contain
                  class="header-person"
                  src="@/assets/image/home_header_girl.svg"
                />
                <span class="header-person--harts"></span>
              </div>
            </v-col>
          </v-row>
        </v-container>
      </v-parallax>
      <div
        class="about pa-md-11 pa-6"
        tag="section"
      >
        <v-container>
          <h2 class="main--text h2 font-weight-bold pb-md-10 pb-5">Simple and quick way to find match</h2>
          <v-row
            align="center"
          >
            <v-col
              cols="12"
              md="6"
            >
              <v-row
                align="center"
              >
                <v-col
                  v-for="(item, index) in itemsAbout"
                  :key="index"
                  cols="12"
                  md="6"
                >
                  <v-img
                    max-width="37"
                    max-height="37"
                    height="100%"
                    contain
                    :src="item.icon"
                  />
                  <h4 class="h4 font-weight-bold pb-5">{{ item.title }}</h4>
                  <p>{{ item.text }}</p>
                </v-col>
              </v-row>
            </v-col>
            <v-col
              cols="12"
              md="6"
            >
              <v-img
                max-height="465"
                max-width="855"
                contain
                src="@/assets/image/home_section_2.png"
              />
            </v-col>
          </v-row>
        </v-container>
      </div>
      <div
        class="join-us pa-md-11 pa-6"
        tag="section"
      >
        <v-container>
          <v-row
            align="center"
          >
            <v-col
              cols="12"
              md="7"
            >
              <v-img
                max-height="500"
                max-width="900"
                contain
                src="@/assets/image/home_section_3.png"
              />
            </v-col>
            <v-col
              cols="12"
              md="5"
            >
              <h4 class="h4 font-weight-bold pb-5">
                More than a just app
              </h4>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum fermentum viverra amet id arcu. Id adipiscing risus pulvinar nisi, turpis.
              </p>
              <p>
                Malesuada elit nullam sollicitudin ante enim non tempus.
              </p>
              <v-btn
                class="text-capitalize font-weight-bold"
                color="button-main"
                large
                raised
                rounded
                outlined
                depressed
                max-width="162"
                width="100%"
                to="/auth"
              >
                Join
              </v-btn>
            </v-col>
          </v-row>
        </v-container>
      </div>
    </v-main>
    <FooterLandingNav />
  </div>
</template>

<script>

import HeaderLandingNav from '../components/HeaderLandingNav';
import FooterLandingNav from '../components/FooterLandingNav';
import namespace from '@/bundles/common/store/modules/user/namespace';
import { mapState } from 'vuex';

export default {
  components: {
    HeaderLandingNav,
    FooterLandingNav,
  },
  data() {
    return {
      itemsAbout: [
        {
          icon: `${require('@/assets/image/landing-icon-1.svg')}`,
          title: 'More than a swipe',
          text: 'You decide with a simple swipe who you would be interested in getting to know.',
        },
        {
          icon: `${require('@/assets/image/landing-icon-2.svg')}`,
          title: 'Get video chatting',
          text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut tempus dui dictum.',
        },
        {
          icon: `${require('@/assets/image/landing-icon-3.svg')}`,
          title: 'Get chatting',
          text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut tempus dui dictum.',
        },
        {
          icon: `${require('@/assets/image/landing-icon-4.svg')}`,
          title: 'Meet on a date',
          text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut tempus dui dictum.',
        },
      ],
      itemsMenu: [
        { url: 'products', title: 'Products' },
        { url: 'learn', title: 'Learn' },
        { url: 'safety', title: 'Safety' },
        { url: 'support', title: 'Support' },
        { url: 'download', title: 'Download' },
      ],
    };
  },
  computed: {
    ...mapState(namespace, {
      isAuthorized: 'isAuthorized',
    }),
  },
};
</script>

<style
  lang="scss"
  scoped
>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/override.scss";

.relative {
  position: relative;
}
::v-deep .header-person {
  margin: 0 auto -40px;
}

.header-person--harts {
  display: block;
  position: absolute;
  z-index: -1;
  background: url("~@/assets/image/home_header_harts.svg") no-repeat center;
  max-width: 127px;
  width: 100%;
  height: 137px;
  top: -40%;
  left: 60%;
}

.about {
  background-color: $grey;
}
</style>
