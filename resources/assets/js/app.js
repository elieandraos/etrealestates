
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
import VueSwal from 'vue-swal';
require('bootstrap-select');

Vue.use(VueSwal)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('confirm-delete', require('./components/ConfirmDelete.vue'));
Vue.component('preview-upload', require('./components/PreviewUpload.vue'));

const app = new Vue({
    el: '#app'
});

$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
	$('div.alert').not('.alert-important').delay(2000).fadeOut(350);
	$('.selectpicker').selectpicker({
	 	'showTick' : true,
	 	'tickIcon' : 'fa-check',
	 	'iconBase' : 'fa'
	});
})
