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


import index from './components/index.vue';
import loading_page from './components/loading-page.vue'
import login from './components/login.vue';
import contact_us from './components/contact-us.vue';
import guest_topbar from './components/guest-topbar';
import register from './components/register.vue';
import dashboard from './components/dashboard/dashboard.vue';
import types_recipes from './components/dashboard/types_recipes.vue';
import profile_user from './components/profile_user.vue';
import edit_profile from './components/user/edit-profile.vue';
import navbar from './components/nav-bar.vue';


import search from './components/user/search.vue';
import top_bar from './components/user/top-bar.vue';

import comments from './components/comments.vue';
import recipes from './components/recipes.vue';
import random_recipe from './components/random_recipe.vue';
import single_recipe from './components/single_recipe.vue';
import similar_recipes from './components/similar-recipes.vue';

import authnavbar from './components/auth-nav-bar.vue';
import footerpage from './components/footer.vue';

import add_recipe from './components/recipe/add_recipe.vue';
import update_recipe from './components/recipe/update-recipe.vue';
import table_recipes from './components/recipe/table_recipes.vue';
import table_datatable from './components/dashboard/table-datatable.vue';


import  status  from './components/status.vue';

//User 

import form_message from './components/user/form-message.vue';
import last_activity from './components/user/last-activity.vue';
import email_verified from './components/user/email-verified.vue';



//dashboard 
import static_user from './components/dashboard/static.vue';
import wishlist_setting from './components/dashboard/wishlist-setting.vue';
import user_messages from './components/dashboard/messages.vue';
import user_notifications from './components/dashboard/notifications.vue';



// custome component 

import img_hoverable from './components/custome/img_hoverable.vue';
import btn_wishlist from './components/user/btn_wishlist.vue';
import wishlist from './components/user/wishlist.vue';


// admin component

import dashboard_admin from "./components/admin/dashboard-admin.vue";
import login_admin from "./components/admin/login-admin.vue";
import users_table from "./components/admin/users.vue";
import recipe_table from "./components/admin/recipes.vue";
import latest_activity_table from "./components/admin/latest-activity.vue";
import admins_table from "./components/admin/admins-table.vue";
import admin_messages from "./components/admin/messages.vue";
import add_message from "./components/admin/add-message.vue";
import static_admin from "./components/admin/statistic.vue";
import types from "./components/admin/types.vue";
import social_media from "./components/admin/social-media.vue";
import page404 from "./components/custome/404.vue";



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


