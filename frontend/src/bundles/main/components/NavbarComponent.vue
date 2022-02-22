<template>
  <div>
    <v-navigation-drawer
      app
      absolute
      class="navbar-container"
      color="greyMain"
      width=381
      mobile-breakpoint=600
    >
      <div class="logo">
        <router-link to="/">
          <LogoIcon />
        </router-link>
      </div>
      <v-card
        flex
        class="user-info-block"
        color="lightPink"
        height=100
        width=291
        flat
      >
        <v-avatar
          class="user-avatar"
          size=61
          right
        >
          <img src="https://randomuser.me/api/portraits/women/81.jpg">
        </v-avatar>
        <span v-if="userInfo" class="user-name lightBlack--text">{{ userInfo.name }}</span>
        <ArrowIcon class="nav-arrow" />
      </v-card>
      <div class="list-block">
        <router-link
          v-for="item in items"
          :key="item.title"
          :to="{
            name: item.name,
          }"
          class="list-item"
        >
          <component
            :is="item.icon"
          />
          <span class="space-between" />
          {{ item.title }}
          <div v-if="hasNewMessage && item.name === 'main-chat'">
            <HasMassageDotIcon class="dot-notification" />
          </div>
        </router-link>
      </div>
      <div class="divider" />
    </v-navigation-drawer>
    <div
      :if="isMobileScreen"
      class="nav-mobile greyMain"
    >
      <v-app-bar clipped-left flat>
        <v-app-bar-nav-icon @click="drawer = !drawer" />
      </v-app-bar>
      <v-navigation-drawer
        v-model="drawer"
        width=56
      >
        <div class="list-block list-block-mobile">
          <router-link
            v-for="item in items"
            :key="item.title"
            :to="{
              name: item.name,
            }"
            class="list-item"
          >
            <component
              :is="item.icon"
            />
            <div v-if="hasNewMessage && item.name === 'main-chat'">
              <HasMassageDotIcon class="dot-notification" />
            </div>
          </router-link>
        </div>
      </v-navigation-drawer>
    </div>
  </div>
</template>
<script>

import LogoIcon from '@/bundles/main/components/icons/LogoIcon';
import ArrowIcon from '@/bundles/main/components/icons/ArrowIcon';
import ListIcon from '@/bundles/main/components/icons/ListIcon';
import LikeIcon from '@/bundles/main/components/icons/LikeIcon';
import MapIcon from '@/bundles/main/components/icons/MapIcon';
import ChatIcon from '@/bundles/main/components/icons/ChatIcon';
import EventsIcon from '@/bundles/main/components/icons/EventsIcon';
import HasMassageDotIcon from '@/bundles/main/components/icons/HasMassageDotIcon';

export default {
  components: {
    ArrowIcon,
    LogoIcon,
    ListIcon,
    LikeIcon,
    MapIcon,
    ChatIcon,
    EventsIcon,
    HasMassageDotIcon,
  },
  props: {
    userInfo: {
      type: Object,
      default: undefined,
    },
  },
  data() {
    return {
      drawer: false,
    };
  },
  computed: {
    items() {
      return [
        { title: 'List', icon: 'ListIcon', name: 'main-list' },
        { title: 'Your match', icon: 'LikeIcon', name: 'main-match' },
        { title: 'Map', icon: 'MapIcon', name: 'main-map' },
        { title: 'Chat', icon: 'ChatIcon', name: 'main-chat' },
        { title: 'Events', icon: 'EventsIcon', name: 'main-events' },
      ];
    },
    hasNewMessage() {
      return true;
    },
    isMobileScreen() {
      return window.innerWidth < 600;
    },
  },

};
</script>

<style lang="scss">
@import "@/assets/scss/override.scss";

.navbar-container {
  font-style: normal;
  font-weight: 600;
  font-size: 18px;
  line-height: 22px;
  border: none;
  padding-left: 45px;
}

.v-navigation-drawer__border {
  width: 0 !important;
}

.logo {
  margin-top: 19px;
}

.user-info-block {
  margin-top: 26px;
}

.user-avatar {
  margin: 19px 12px 20px 29px;
}

.user-name {
  display: inline-block;
  max-width: 129px;
  font-weight: 400;
}

.nav-arrow {
  margin-bottom: 4px;
  margin-left: 13px;
  cursor: pointer;
}

.list-block {
  margin-top: 53px;
  .list-item {
    &:hover {
      svg path {
        fill: #FE5FAA;
      }
      color: #FE5FAA;
    }
  }
}

.space-between {
  padding-right: 17px;
}

.list-item {
  text-decoration: none;
  display: flex;
  align-items: center;
  justify-content: start;
  margin-bottom: 35px;
  list-style-type: none;
}

.divider {
  margin-top: 9px;
  width: 291px;
  height: 0px;
  border: 1.5px solid rgba(94, 94, 94, 0.4);
  background: rgba(94, 94, 94, 0.4);
}

.v-application a {
  color: #8E9396;
}

.dot-notification {
  position: relative;
  top: -7px;
  left: -61px;
  border: 1px solid white;
  border-radius: 50%;
}

.nav-mobile{
  height: 100%;
}
.list-block-mobile {
  padding-left: 15px;
  border-radius: 4px;
  margin-top: 20px;
}

</style>
