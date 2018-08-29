<template>
	 <div class="row" id="properties-listing">
	 		<div class="col-md-4" v-for="property in properties">
			    <property-card :content="property"></property-card>
			</div>
			<infinite-loading @infinite="infiniteHandler" ref="infiniteLoading">
				 <span slot="no-more"></span>
				 <div slot="spinner" class="col-md-12" style="padding: 30px;">
				 	<center><img src="/ajax-loader.gif" /></center>
				 </div>
			</infinite-loading>
	 </div>
</template>

<script>
	import InfiniteLoading from 'vue-infinite-loading';
	import axios from 'axios';
	import PropertyCard from './PropertyCard.vue';
	import {EventBus} from './../EventBus.js';
	import Helper from './../mixins/Helper.js';

	export default {
		components: { InfiniteLoading, PropertyCard },
		mixins: [ Helper ],
		data(){
            return {
                properties: {},
                payload: {
	        		area: -1,
	        		type: -1,
	        		maxAmount: -1,
	        	},
                link: '',
                total: 0,
            }
        },
        mounted() {
           this.listenToEvents();
        },
        methods: {
            /*
             * Bus Event Handlers
             */
            listenToEvents()
            {
                const vm = this;

                EventBus.$on('doFilter', function(payload){
                    // reset the properties
                    vm.properties = {};
                    // update the payload
                    vm.payload = payload;
                    // reset the infiniteLoading so it can call the infiniteHandler() again with the new payload
                    vm.$nextTick(() => {
                        vm.link = ''; //reset the pagination link
                        vm.total = 0; //reset the pagination total
                        vm.$refs.infiniteLoading.$emit('$InfiniteLoading:reset');
                    });
                });
            },
            /*
             * Hanldes the infinite loading scroll
             *  
             */
            infiniteHandler($state) {
                var _url;
                const vm = this;
                
                // get the request url
                if(this.link)
                    _url = this.link;
                else
                    _url = '/properties/fetch';

                // run the request
                axios.post(_url, this.payload)
                    .then(function(response){
                        response = response.data;
                        var _data = response.data;
                        if(_data.length){
                            if(!vm.properties.length)
                                vm.properties = _data;
                            else
                                vm.properties = vm.properties.concat(_data);
                            
                            if(vm.object_has(response, 'links.next'))
                                vm.link = response.links.next;
                            if(vm.object_has(response, 'meta.total'))
                                vm.total = response.meta.total;

                             // set the infinite state to loaded
                            $state.loaded();

                            // do dom update after the data is reflected
                            vm.$nextTick(() => {
                                //$('[data-toggle="tooltip"]').tooltip();
                            });

                            // set the state to complete when all the results are loaded.
                            if (vm.total == vm.properties.length || vm.total == 0) {
                                $state.complete();
                            }
                        }
                        else{
                            $state.complete();
                        }

                    })
                    .catch(function(error){
                        console.log(error);
                    });
            },
        }
	}
</script>

<style>
	#properties-listing{
		min-height: 400px;
	}
	div.infinite-loading-container{
		width: 100% !important;
	}
</style>