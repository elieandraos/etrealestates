<template>
	<form  @submit.prevent="handleSubmit">
		<input type="hidden" name="_token" :value="csrf" />
		<div id="filters" class="clearfix">
				<div class="filter-item">
					<label>Area:</label>
					<select name="area" class="selectpicker" v-model="payload.area">
						<option value="-1">All Areas</option>
						<option v-for="(value, key) in filters.areas" :value="key">{{ value }}</option>
					</select>
				</div>

				<div class="filter-item">
					<label>Property Type:</label>
					<select name="type" class="selectpicker" v-model="payload.type">
						<option value="-1">All Properties</option>
						<option v-for="(value, key) in filters.types" :value="key">{{ value }}</option>
					</select>
				</div>

				<div class="filter-item">
					<label>Price Range:</label>
					<select name="maxAmount" class="selectpicker" v-model="payload.maxAmount">
						<option value="-1">All Prices</option>
						<option v-for="(value, key) in filters.prices" :value="key">{{ value }}</option>
					</select>
				</div>

				<div class="filter-item">
					<label>Listed For:</label>
					<select name="listed_for" class="selectpicker" v-model="payload.listed_for">
						<option value="-1">All Listings</option>
						<option v-for="(value, key) in filters.listings" :value="key">{{ value }}</option>
					</select>
				</div>

				<div class="filter-item" style="vertical-align: middle">
					<input type="submit" class="btn btn-primary" value="Search" />
				</div>
		</div>
	</form>
</template>

<script>
	import {EventBus} from './../EventBus.js';

    export default {
        props: {
            areas: {
                required: true,
            },
            priceRanges: {
                required: true,
            },
            listings: {
                required: true,
            },
            types: {
                required: true,
            },
            csrf: {
            	required: true,
            }
        },
        data: function () {
	        return {
	        	payload: {
	        		area: -1,
	        		type: -1,
	        		maxAmount: -1,
	        		listed_for: -1,
	        		_token: this.csrf
	        	},
	        	filters: {
	        		areas: {},
	        		types: {},
	        		prices: {},
	        		listings: {}
	        	}
	        }
	    },
        computed: {
			// hasDetails: function () {
		 //    	if(this.property.nb_bathrooms || this.property.nb_bedrooms || this.property.nb_parkings) 
		 //    		return true;

		 //    	return false;
		 //    }
		},
		mounted() {
        	this.filters.areas = JSON.parse(this.areas);
        	this.filters.types = JSON.parse(this.types);
        	this.filters.prices = JSON.parse(this.priceRanges);
        	this.filters.listings = JSON.parse(this.listings);
        },
        methods: {
            handleSubmit() {
               	EventBus.$emit('doFilter', this.payload);
            }
       }
    }
</script>

<style>
/** Homepage filters **/
div#homepage-filter-container{
	background: url('/banner.jpg');
	background-size: cover !important;
	background-repeat: no-repeat;
	margin-top: -32px;
	margin-bottom: 30px;
	padding-top: 80px;
	padding-bottom: 80px;
}
div#filters{
	background-color: rgba(255, 255, 255, 0.5);
	border-radius: 10px;
	display: table;
    margin: 0 auto;
}
h1.banner-title{
	padding: 0;
	margin: 0;
	font-size: 44px;
	font-family: "Roboto Condensed";
	text-align: center;
	color: #FFF;
	margin-bottom: 20px;
}
div.filter-item{
    margin-right: 20px;
    display: table-cell;
    padding: 20px 15px;
}

div.filter-item label{
	display: block;
	font-weight: 400;
	color: #FFF;
}
/** End Of Homepage filters **/
</style>
