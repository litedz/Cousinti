/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

const { createApp } = require('vue');

const { AutoTyping } = require('autotyping');

require('./bootstrap');

require('moment');

window.Vue = require('vue').default;



/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their:basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */







import index from './components/index.vue'
import loading_page from './components/loading-page.vue'
import login from './components/login.vue';
import guest_topbar from './components/guest-topbar';
import register from './components/register.vue';
import dashboard from './components/dashboard/dashboard.vue';
import types_recipes from './components/dashboard/types_recipes.vue';
import profile_user from './components/profile_user.vue';
import edit_profile from './components/user/edit-profile.vue';
import navbar from './components/nav-bar.vue';
import search from './components/user/search.vue';

import comments from './components/comments.vue';
import recipes from './components/recipes.vue';
import random_recipe from './components/random_recipe.vue';
import single_recipe from './components/single_recipe.vue';
import similar_recipes from './components/similar-recipes.vue';

import topnavbar from './components/top-nav-bar.vue';
import footerpage from './components/footer.vue';

import add_recipe from './components/recipe/add_recipe.vue';
import update_recipe from './components/recipe/update-recipe.vue';
import table_recipes from './components/recipe/table_recipes.vue';



import status from './components/status.vue';



import { plugin, defaultConfig } from '@formkit/vue'
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue';
import ChevronDownIcon from '@heroicons/vue/solid/ChevronDoubleDownIcon';

import { createI18n } from 'vue-i18n'
import moment from 'moment';


const messages = {
  ar: {
    labels: {
      username: 'اسم المستخدم',
      first_name: 'الاسم الاول',
      last_name: 'الاسم الثاني',
      email: 'الايمايل',
      age: 'العمر',
      phone: 'الهاتف',
      Account_Details: 'معلومات الحساب',
      save_change: 'حفظ التغيير',
      newPassword: 'كلمة المرور الجديدة',
      confirmPassword: 'اعادة كتابة كلمة المرور',
      currentPassword: 'كلمة المرور الحالية',
    }
  },
}

const i18n = createI18n({
  locale: 'ar', // set locale
  messages, // set locale messages
  // If you need to specify other options, you can set other options
  // ...
})

const app = createApp({
  provide: {
    w_path: window.location.protocol + '//' + window.location.host,
  }
})



app.component('index', index);
app.component('login', login);
app.component('search', search);
app.component('dashboard', dashboard);
app.component('types-recipes', types_recipes);
app.component('table-recipes', table_recipes);
app.component('profile-user', profile_user);
app.component('edit-profile', edit_profile);
app.component('status', status);
app.component('comments', comments);
app.component('recipes', recipes);
app.component('single-recipe', single_recipe);
app.component('random-recipe', random_recipe);
app.component('top-nav-bar', topnavbar);
app.component('footer-page', footerpage);
app.component('nav-bar', navbar);
app.component('loading-page', loading_page);
app.component('similar-recipes', similar_recipes);
app.component('register', register);
app.component('guest-topbar', guest_topbar);

// recipe component
app.component('add-recipe', add_recipe);
app.component('update-recipe', update_recipe);


app.use(plugin, defaultConfig);
app.use(i18n).mount('#app');



// app.component('example-component', require('./components/ExampleComponent.vue').default);
// app.component('random_recipe', require('./components/random_recipe.vue').default);
// app.component('recettes', require('./components/recettes.vue').default);
// app.component('single-recette', require('./components/single_recette.vue').default);
// app.component('footer-page', require('./components/footer.vue').default);


