
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
Vue.component('properties', require('./components/Properties.vue'));
Vue.component('properties-filter', require('./components/PropertiesFilter.vue'));
Vue.component('property-feature', require('./components/PropertyFeature.vue'));
Vue.component('property-card', require('./components/PropertyCard.vue'));
Vue.component('google-maps-locator', require('./components/GoogleMapsLocationSelector.vue'));

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

String.prototype.number_format = function(d) {
    var n = this;
    var c = isNaN(d = Math.abs(d)) ? 2 : d;
    var s = n < 0 ? "-" : "";
    var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
    return s + (j ? i.substr(0, j) + ',' : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + ',');
}

