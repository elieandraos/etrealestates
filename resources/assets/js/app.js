
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
import VueSwal from 'vue-swal';
require('bootstrap-select');
require('./jquery.nstSlider');

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

	$('.nstSlider').nstSlider({
	    "rounding": {
	        "100": "1000",
	        "1000": "10000",
	        "10000": "100000"
	    },
	    "left_grip_selector": ".leftGrip",
	    "right_grip_selector": ".rightGrip",
	    "value_bar_selector": ".bar",
	    "value_changed_callback": function(cause, leftValue, rightValue) {
	        var $container = $(this).parent();
	        $("#min_price").val(leftValue);
	        $("#max_price").val(rightValue);

	        $("#min_price")[0].dispatchEvent(new Event('change'));
	        $("#max_price")[0].dispatchEvent(new Event('change'));

	        $container.find('.leftLabel').text(String($("#min_price").val()).number_format());
	        $container.find('.rightLabel').text(String($("#max_price").val()).number_format());
	    }
	});
})

String.prototype.number_format = function(d) {
    var n = this;
    var c = isNaN(d = Math.abs(d)) ? 2 : d;
    var s = n < 0 ? "-" : "";
    var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
    return s + (j ? i.substr(0, j) + ',' : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + ',');
}

