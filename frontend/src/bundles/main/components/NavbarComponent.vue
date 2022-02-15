<template>
  <aside class="navbar-container">
    <LogoIcon class="logo" />
    <div class="user-info-block">
      <v-avatar
        class="user-avatar"
        size="61"
      >
        <img src="https://randomuser.me/api/portraits/women/81.jpg">
      </v-avatar>
      <div class="user-name">Ruben Septimus</div>
      <ArrowIcon class="nav-arrow" />
    </div>
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
      </router-link>
    </div>
    <div class="divider" />
  </aside>
</template>
<script>

import LogoIcon from '@/bundles/main/components/icons/LogoIcon';
import ArrowIcon from '@/bundles/main/components/icons/ArrowIcon';
import ListIcon from '@/bundles/main/components/icons/ListIcon';
import LikeIcon from '@/bundles/main/components/icons/LikeIcon';
import MapIcon from '@/bundles/main/components/icons/MapIcon';
import MessageIcon from '@/bundles/main/components/icons/MessageIcon';
import EventIcon from '@/bundles/main/components/icons/EventIcon';
import DotMapIcon from '@/bundles/main/components/icons/DotMapIcon';

export default {
  components: {
    ArrowIcon,
    LogoIcon,
    ListIcon,
    LikeIcon,
    MapIcon,
    MessageIcon,
    EventIcon,
    DotMapIcon,
  },
  data() {
    return {
      items: [
        { title: 'List', icon: 'ListIcon', name: 'list' },
        { title: 'Your match', icon: 'LikeIcon', name: 'match' },
        { title: 'Map', icon: 'MapIcon', name: 'map' },
        { title: 'Message', icon: 'MessageIcon', name: 'message' },
        { title: 'Event', icon: 'EventIcon', name: 'event' },
      ],
    };
  },

};
</script>

<style lang="scss">
@import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap');

.logo {
  position: absolute;
  width: 89px;
  height: 45px;
  left: 41px;
  top: 18px;
}

.navbar-container {
  position: absolute;
  width: 381px;
  height: 1143px;
  left: 0;
  top: 0;
  font-family: Lato;
  font-style: normal;
  font-weight: 600;
  font-size: 18px;
  line-height: 22px;
  background: #F5F5F5;
}

.user-info-block {
  position: absolute;
  width: 291px;
  height: 100px;
  left: 45px;
  top: 83px;
  background: #FFEBF5;
  border-radius: 7px;
}

.user-avatar {
  left: 29px;
  top: 19px;
}

.user-name {
  position: absolute;
  width: 129px;
  height: 22px;
  left: 102px;
  top: 39px;
  font-weight: 400;
  color: #282828;
}

.nav-arrow {
  position: absolute;
  left: 244px;
  top: 48px;
  cursor: pointer;
}

.list-block {
  position: absolute;
  top: 237px;
  left: 28px;

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

.item-icon {
  color: #8E9396;
}

.list-item {
  text-decoration: none;
  display: flex;
  align-items: center;
  justify-content: start;
  position: relative;
  margin-bottom: 30px;
  padding-left: 20px;
  list-style-type: none;
}

.dot-map-icon {
  display: block;
  position: absolute;
  left: 32px;
  top: 105px;
}

.divider {
  position: absolute;
  width: 291px;
  height: 0px;
  left: 45px;
  top: 533px;
  border: 1.5px solid rgba(94, 94, 94, 0.4);
  background: rgba(94, 94, 94, 0.4);
}

.v-application a {
  color: #8E9396;
}

</style>
