
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import readingTime from 'reading-time';

window.Vue = require('vue');

$(document).ready(function() {
    CKEDITOR.replace( 'post_short_text', { height: 150 });
    CKEDITOR.replace( 'post_long_text', { height: 150 });
    CKEDITOR.replace( 'post_full_text');
});



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});
