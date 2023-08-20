/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

const { createApp } = require('vue');

const { AutoTyping } = require('autotyping');


const { Bootstrap5Pagination } = require('laravel-vue-pagination');
require('./bootstrap');



window.Vue = require('vue').default;


const months = require('months');




import { defineAsyncComponent } from 'vue';


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


import test from './components/test.vue';


const index = defineAsyncComponent(() => import('./components/index.vue'))
const loading_page = defineAsyncComponent(() => import('./components/loading-page.vue'))

const login = defineAsyncComponent(() => import('./components/login.vue'))
const contact_us = defineAsyncComponent(() => import('./components/contact-us.vue'));
const guest_topbar = defineAsyncComponent(() => import('./components/guest-topbar'));
const register = defineAsyncComponent(() => import('./components/register.vue'));
const dashboard = defineAsyncComponent(() => import('./components/dashboard/dashboard.vue'));
const types_recipes = defineAsyncComponent(() => import('./components/dashboard/types_recipes.vue'));
const profile_user = defineAsyncComponent(() => import('./components/profile_user.vue'));
const edit_profile = defineAsyncComponent(() => import('./components/user/edit-profile.vue'));
const navbar = defineAsyncComponent(() => import('./components/nav-bar.vue'))


const search = defineAsyncComponent(() => import('./components/user/search.vue'))
const top_bar = defineAsyncComponent(() => import('./components/user/top-bar.vue'))


const comments = defineAsyncComponent(() => import('./components/comments.vue'));
const recipes = defineAsyncComponent(() => import('./components/recipes.vue'));
const random_recipe = defineAsyncComponent(() => import('./components/random_recipe.vue'));
const single_recipe = defineAsyncComponent(() => import('./components/single_recipe.vue'));
const similar_recipes = defineAsyncComponent(() => import('./components/similar-recipes.vue'));

const authnavbar = defineAsyncComponent(() => import('./components/auth-nav-bar.vue'));

// import footerpage from './components/footer.vue';
const footerpage = defineAsyncComponent(() => import('./components/footer.vue'))

// import add_recipe from './components/recipe/add_recipe.vue';
// import update_recipe from './components/recipe/update-recipe.vue';
// import table_recipes from './components/recipe/table_recipes.vue';
// import table_datatable from './components/dashboard/table-datatable.vue';

const add_recipe = defineAsyncComponent(() => import('./components/recipe/add_recipe.vue'))
const update_recipe = defineAsyncComponent(() => import('./components/recipe/update-recipe.vue'))
const table_recipes = defineAsyncComponent(() => import('./components/recipe/table_recipes.vue'))
const table_datatable = defineAsyncComponent(() => import('./components/dashboard/table-datatable.vue'))


const status = defineAsyncComponent(() => import('./components/status.vue'))
//User 
const form_message = defineAsyncComponent(() => import('./components/user/form-message.vue'))
const last_activity = defineAsyncComponent(() => import('./components/user/last-activity.vue'))
const email_verified = defineAsyncComponent(() => import('./components/user/email-verified.vue'))

//dashboard 


const static_user = defineAsyncComponent(() => import('./components/dashboard/static.vue'))
const wishlist_setting = defineAsyncComponent(() => import('./components/dashboard/wishlist-setting.vue'))
const user_messages = defineAsyncComponent(() => import('./components/dashboard/messages.vue'))
const user_notifications = defineAsyncComponent(() => import('./components/dashboard/notifications.vue'))


// custome component 


const img_hoverable = defineAsyncComponent(() => import('./components/custome/img_hoverable.vue'))
const btn_wishlist = defineAsyncComponent(() => import('./components/user/btn_wishlist.vue'))
const wishlist = defineAsyncComponent(() => import('./components/user/wishlist.vue'))


// admin component


const dashboard_admin = defineAsyncComponent(() => import('./components/admin/dashboard-admin.vue'));
const login_admin = defineAsyncComponent(() => import('./components/admin/login-admin.vue'));
const users_table = defineAsyncComponent(() => import('./components/admin/users.vue'));
const recipe_table = defineAsyncComponent(() => import('./components/admin/recipes.vue'));
const latest_activity_table = defineAsyncComponent(() => import('./components/admin/latest-activity.vue'));
const admins_table = defineAsyncComponent(() => import('./components/admin/admins-table.vue'));
const admin_messages = defineAsyncComponent(() => import('./components/admin/messages.vue'));
const add_message = defineAsyncComponent(() => import('./components/admin/add-message.vue'));
const static_admin = defineAsyncComponent(() => import('./components/admin/statistic.vue'));
const types = defineAsyncComponent(() => import('./components/admin/types.vue'));
const social_media = defineAsyncComponent(() => import('./components/admin/social-media.vue'));
const page404 = defineAsyncComponent(() => import('./components/custome/404.vue'));



import { plugin, defaultConfig } from '@formkit/vue'
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue';
import ChevronDownIcon from '@heroicons/vue/solid/ChevronDoubleDownIcon';

import { createI18n } from 'vue-i18n'

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



app.component('test', test);
app.component('pagination', Bootstrap5Pagination);
app.component('index-page', index);
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
app.component('auth-nav-bar', authnavbar);
app.component('footer-page', footerpage);
app.component('nav-bar', navbar);
app.component('loading-page', loading_page);
app.component('similar-recipes', similar_recipes);
app.component('register', register);
app.component('guest-topbar', guest_topbar);
app.component('top-bar', top_bar);
app.component('contact-us', contact_us);



// recipe component
app.component('add-recipe', add_recipe);
app.component('update-recipe', update_recipe);
app.component('table-datatable', table_datatable);
//User 
app.component('form-message', form_message);
app.component('email-verified', email_verified);
//dashboard
app.component('static_user', static_user);
app.component('last-activity', last_activity);
app.component('wishlist-setting', wishlist_setting);
app.component('user-messages', user_messages);
app.component('user-notifications', user_notifications);
//actions components

app.component('btn-wishlist', btn_wishlist);
app.component('img-hoverable', img_hoverable);

app.component('wishlist', wishlist);

//admin
app.component('dashboard-admin', dashboard_admin);
app.component('login-admin', login_admin);
app.component('users-table', users_table);
app.component('recipes-table', recipe_table);
app.component('latest-activity-table', latest_activity_table);
app.component('admins-table', admins_table);
app.component('admin-messages', admin_messages);
app.component('add-message', add_message);
app.component('static-admin', static_admin);
app.component('types', types);
app.component('social-media', social_media);
app.component('page-404', page404);



import { Refomate } from './components/formateDate';

app.mixin(Refomate);
app.use(plugin, defaultConfig);
app.use(i18n).mount('#app');


