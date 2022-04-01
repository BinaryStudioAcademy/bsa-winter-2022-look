<template>
  <div>
    <Header
      :is-authorized="isAuthorized"
      :user-info="userInfo"
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
              <h1 class="textMain--text h1 font-weight-bold pb-md-4 pb-2">
                It is never too late
                to fall in love
              </h1>
              <p class="main-sub--text textMain--text subheading black--text pb-md-2 pb-2">
                When you find that one that's right for you,
                you feel like they were put there for you,
                you never want to be apart.
              </p>
              <v-btn
                class="white--text text-capitalize font-weight-bold"
                color="primary"
                large
                rounded
                depressed
                :to="{ name: 'auth-registration-set_up' }"
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
        class="about greyBg pa-md-11 pa-6"
        tag="section"
      >
        <v-container>
          <h2 class="textMain--text h2 font-weight-bold pb-md-10 pb-5">Simple and quick way to find match</h2>
          <v-row
            align="center"
          >
            <v-col
              cols="12"
              md="6"
            >
              <v-row
                align="start"
              >
                <v-col
                  v-for="(item, index) in itemsAbout"
                  :key="index"
                  cols="12"
                  md="6"
                >
                  <component :is="item.icon" />
                  <h4 class="h4 purple--text font-weight-bold pb-5">{{ item.title }}</h4>
                  <p class="textMain--text">{{ item.text }}</p>
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
              <h4 class="h4 purple--text font-weight-bold pb-5 text-center text-md-left">
                More than a just app
              </h4>
              <p class="textMain--text text-center text-md-left">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum fermentum viverra amet id arcu. Id adipiscing risus pulvinar nisi, turpis.
              </p>
              <p class="textMain--text text-center text-md-left">
                Malesuada elit nullam sollicitudin ante enim non tempus.
              </p>
              <v-btn
                class="text-capitalize font-weight-bold d-flex mx-auto mx-md-0"
                color="primary"
                large
                raised
                rounded
                outlined
                depressed
                max-width="162"
                width="100%"
                :to="{ name: 'auth-registration-set_up' }"
              >
                Join
              </v-btn>
            </v-col>
          </v-row>
        </v-container>
      </div>
    </v-main>
    <Footer />
  </div>
</template>

<script>

import Header from '../components/Header';
import Footer from '../components/Footer';
import IconSwipe from '../components/icons/IconSwipe';
import IconVideoChat from '../components/icons/IconVideoChat';
import IconChat from '../components/icons/IconChat';
import IconMail from '../components/icons/IconMail';
import namespace from '@/bundles/common/store/modules/user/namespace';
import { mapState } from 'vuex';

export default {
  components: {
    Header,
    Footer,
    IconSwipe,
    IconVideoChat,
    IconChat,
    IconMail,
  },
  computed: {
    ...mapState(namespace, {
      isAuthorized: 'isAuthorized',
      userInfo: 'user',
    }),
    itemsAbout() {
      return [
        {
          icon: 'IconSwipe',
          title: 'More than a swipe',
          text: 'We’re not a fan of labels, so we offer a dating experience designed to connect you with new people outside your usual circles. On our app, we put everyone in front of you and let you choose who you want to chat with.',
        },
        {
          icon: 'IconMail',
          title: 'Meet on a date',
          text: 'Meet people at the cinema, in a cafe or on the street.',
        },
        {
          icon: 'IconChat',
          title: 'Get chatting',
          text: 'Go beyond your distance settings and chat with people around the world.',
        },
      ];
    },
  },
};
</script>

<style
  lang="scss"
  scoped
>
.header-person {
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
</style>
