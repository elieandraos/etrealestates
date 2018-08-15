<template>
	<div id="filters" class="clearfix">
		<div class="filter-item">
			<label>Area:</label>
			<select name="areas" class="selectpicker">
				<option value="-1">All Areas</option>
				<option v-for="(value, key) in filters.areas" :value="key">{{ value }}</option>
			</select>
		</div>

		<div class="filter-item">
			<label>Property Type:</label>
			<select name="areas" class="selectpicker">
				<option value="-1">All Properties</option>
				<option v-for="(value, key) in filters.types" :value="key">{{ value }}</option>
			</select>
		</div>

		<div class="filter-item">
			<label>
				Price Range:
				<div class="price text-right">
	                  <span>$</span>
	                  <div class="leftLabel"></div>
	                  <span>to $</span>
	                  <div class="rightLabel"></div>
	            </div>
            </label>
			<div class="nstSlider" data-range_min="0" data-range_max="500000" data-cur_min="80000"  data-cur_max="200000">
			    <div class="bar"></div>
			    <div class="leftGrip"></div>
			    <div class="rightGrip"></div>
			</div>
		</div>

	</div>
</template>

<script>
	import RangeSlider from 'v-range-slider'

    export default {
    	components: {
			RangeSlider
		},
        props: {
            areas: {
                required: true,
            },
            types: {
                required: true,
            },
        },
        data: function () {
	        return {
	        	payload: {
	        		amount: null,
	        	},
	        	filters: {
	        		areas: {},
	        		types: {},
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
        },
        methods: {
            // getSuffix(value) {
            //    	if(value > 1)
            //    		return 's';

            //    	return null;
            // }
       }
    }
</script>

<style scoped>

</style>
