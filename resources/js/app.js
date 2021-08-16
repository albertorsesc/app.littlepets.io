require('./bootstrap');
require('alpinejs');
import Vue from 'vue/dist/vue'
window.Event = new Vue()
window.baseURL = process.env.MIX_APP_URL
window.dd = console.log

Vue.component('app', require('./views/App').default);

Vue.component('adoptions', require('./views/Adoptions/Adoptions').default);
Vue.component('my-adoptions', require('./views/Adoptions/MyAdoptions').default);
Vue.component('adoption-profile', require('./views/Adoptions/AdoptionProfile').default);

Vue.component('lost-pets', require('./views/LostPets/LostPets').default);
Vue.component('lost-pet-profile', require('./views/LostPets/LostPetProfile').default);

Vue.component('shelters', require('./views/Shelters/Shelters').default);

Vue.component('profile', require('./views/User/Profile').default);

/**
 * SweetAlert2
 * https://sweetalert2.github.io
 */

/**
 * Vue-Multiselect
 * https://vue-multiselect.js.org/
 */

/**
 * Vue-Datetime
 * https://openbase.com/js/vue-datetime
 * Moment-Luxon
 * https://moment.github.io/luxon/#/formatting?id=presets
 */

/** Mixins */
import auth from './mixins/auth';
Vue.mixin(auth)

import mixins from './mixins/mixins';
Vue.mixin(mixins)

const app = new Vue({
    el: '#app',
});
