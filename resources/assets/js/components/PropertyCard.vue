<template>
	<div class="card-content">
		<div class="card-header">
	    	<a :href="property.url">
		    	<img :src="property.thumb" class="thumb" />
		    	<span class="listed-for">{{property.listed_for}}</span>
		    	<span class="price">{{ property.price }}</span>
		    	<span class="featured" v-if="property.featured">featured</span>
		    </a>
	    </div>
	    <div class="card-body">
	    	<h2 class='title'>{{ property.title }}</h2>
	    	<h3 class='subtitle'>{{ property.city }}, {{ property.area }}</h3>
	    	
	    	<div class="details">
	    		<div class="container">
		    		<div class="row">
		    			<div class="col-md-6 detail">
		    				<span><i class="fa fa-object-group"></i> {{ property.sq_ft}} <span class="low">m</span><sup>2</sup></span>
		    			</div>
		    			<div class="col-md-6 detail" v-if="property.nb_bedrooms">
		    				<span><i class="fa fa-bed"></i> {{ property.nb_bedrooms}} bedroom{{ this.getSuffix(property.nb_bedrooms)}}</span>
		    			</div>
		    			<div class="col-md-6 detail" v-if="property.nb_bathrooms">
		    				<span><i class="fa fa-bathtub"></i> {{ property.nb_bathrooms}} bathroom{{ this.getSuffix(property.nb_bathrooms)}}</span>
		    			</div>
		    			<div class="col-md-6 detail" v-if="property.nb_parkings">
		    				<span><i class="fa fa-car"></i> {{ property.nb_parkings}} parking{{ this.getSuffix(property.nb_parkings)}}</span>
		    			</div>
		    		</div>
		    	</div>
	    	</div>
	    </div>
    	<div class="card-footer">
    		<i class="fa fa-calendar-o"></i> {{ property.posted_at }}
    	</div>
	</div>
</template>

<script>
    export default {
        props: {
            content: {
                required: true,
            },
            parse: {
            	required: false,
            	default: false
            }
        },
        data: function () {
	        return {
	        	property: {}
	        }
	    },
        computed: {
			hasDetails: function () {
		    	if(this.property.nb_bathrooms || this.property.nb_bedrooms || this.property.nb_parkings) 
		    		return true;

		    	return false;
		    }
		},
		mounted() {
			if(this.parse)
				this.property = JSON.parse(this.content);
			else
        		this.property = this.content;
        },
        methods: {
            getSuffix(value) {
               	if(value > 1)
               		return 's';

               	return null;
            }
       }
    }
</script>

<style scoped>
	.card-content{
		border: 1px solid #e8e8e8;
		background-color: #FFF;
		padding: 0;
		margin-bottom: 30px;
	}
	.card-content .thumb{
		width: 100%;
	}
	.card-content .card-header{
		position: relative;
		padding: 0;

	}
	.card-content .card-header .listed-for{
		background-color: #FFD119;
		position: absolute;
	    top: 10px;
	    right: 10px;
	    display: inline-block;
	    z-index: 1;
	    font-size: 10px;
	    padding: 5px 14px;
	    color: #333;
	    font-weight: 400;
    	text-transform: uppercase;
	}
	.card-content .card-header .featured{
		background-color: #e64942;
		position: absolute;
	    top: 10px;
	    left: 10px;
	    display: inline-block;
	    z-index: 1;
	    font-size: 10px;
	    padding: 5px 14px;
	    color: #FFF;
	    font-weight: 400;
    	text-transform: uppercase;
	}
	.card-content .card-header .price{
		background-color: #173471;
		position: absolute;
		bottom: 0px;
		right: 0px;
		display: inline-block;
		color: #FFF;
		padding: 8px 15px;
		font-size: 15px;
		font-weight: 400;
		min-width: 100px;
    	text-align: center;
	}
	.card-content .card-body{
		padding-top: 20px;
		padding-bottom: 20px;
		padding-left: 15px;
		padding-right: 15px
	}
	.card-content .card-body h2.title{
		font-size: 26px;
	    padding: 0;
	    margin: 0;
	    font-family: "Roboto Condensed";
	    color: #000;
	    text-transform: capitalize;
	    font-weight: 400;
	}
	.card-content .card-body h3.subtitle{
		font-size: 15px;
    	color: #676767;
    	margin: 0;
    	padding: 0;
    	font-family: "Roboto Condensed";
	}
	.card-content .card-body .details{
		padding-top: 20px;
		padding-bottom: 20px;
		min-height: 100px;
	}
	.card-content .card-body .details .detail{
		margin-top: 10px;
	}
	.card-content .card-body .details span{
		color: #1f1d22;
		font-size: 13px;
		text-transform: capitalize;
	}
	.card-content .card-body .details span i.fa{
		color: #999;
		font-size: 15px;
		margin-right: 5px;
	}
	.card-content .card-footer{
		background-color: #FFF;
	}
	.card-content .card-footer i.fa{
		margin-right: 5px;
	}
	.card-content .card-body .details span span.low{
		text-transform: lowercase;
	}
</style>
