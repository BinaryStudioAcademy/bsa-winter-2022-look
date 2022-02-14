import Vue from 'vue';
import Vuetify from 'vuetify/lib/framework';
import IconHeart from '@/assets/icons/general/IconHeart.vue';
import IconBadged from '@/assets/icons/general/IconBadged.vue';
import IconClose from '@/assets/icons/general/IconClose.vue';
import IconDisLike from '@/assets/icons/general/IconDisLike.vue';
import IconFire from '@/assets/icons/general/IconFire.vue';
import IconMiniChat from '@/assets/icons/general/IconMiniChat.vue';
import IconPaper from '@/assets/icons/general/IconPaper.vue';
import IconArrow from '@/assets/icons/general/IconArrow.vue';
import IconArrowPrev from '@/assets/icons/general/IconArrowPrev.vue';
import IconArrowNext from '@/assets/icons/general/IconArrowNext.vue';
import IconMaper from '@/assets/icons/general/IconMaper.vue';
import IconFemale from '@/assets/icons/general/IconFemale.vue';
import IconDot from '@/assets/icons/circle/IconDot.vue';
import IconMale from '@/assets/icons/general/IconMale.vue';
import IconPhone from '@/assets/icons/general/IconPhone.vue';
import IconFacebook from '@/assets/icons/general/IconFacebook.vue';
import IconInstagram from '@/assets/icons/general/IconInstagram.vue';
import IconTelegram from '@/assets/icons/general/IconTelegram.vue';
import IconOutlineHeart from '@/assets/icons/general/IconOutlineHeart.vue';

Vue.use(Vuetify);
export default new Vuetify({
  icons: {
    values: {
      heart: {
        component: IconHeart,
      },
      badged: {
        component: IconBadged,
      },
      close: {
        component: IconClose,
      },
      dislike: {
        component: IconDisLike,
      },
      fire: {
        component: IconFire,
      },
      minichat: {
        component: IconMiniChat,
      },
      paper: {
        component: IconPaper,
      },
      arrow: {
        component: IconArrow,
      },
      map: {
        component: IconMaper,
      },
      female: {
        component: IconFemale,
      },
      dot: {
        component: IconDot,
      },
      arrowprev: {
        component: IconArrowPrev,
      },
      arrownext: {
        component: IconArrowNext,
      },
      male: {
        component: IconMale,
      },
      facebook: {
        component: IconFacebook,
      },
      telegram: {
        component: IconTelegram,
      },
      instagram: {
        component: IconInstagram,
      },
      phone: {
        component: IconPhone,
      },
      outlineheart: {
        component: IconOutlineHeart,
      },
    },
  },
});
