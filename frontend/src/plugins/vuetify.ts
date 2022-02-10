import Vue from 'vue';
import Vuetify from 'vuetify/lib/framework';

Vue.use(Vuetify);

export default new Vuetify({
  theme: {
    themes: {
      light: {
        primary: '#fe5faa',
        secondary: '#424242',
        accent: '#82B1FF',
        error: '#fe5faa',
        info: '#2196F3',
        success: '#4CAF50',
        warning: '#FFC107',
        textMain: '#101012',
        headerMain: '#f7e9f4',
        greyMain: '#f5f5f5',
        greyBg: '#faf9f9',
        orange: '#ff6c6d',
        purple: '#574f8c',
        purpleFooter: '#443748',
      },
    },
  },
});
