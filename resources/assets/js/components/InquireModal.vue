<template>
    <modal :name="modalName" :height="'auto'" :pivot-y="0.1" :width="'80%'" :maxWidth="600" :adaptive="true" @before-open="updateData">
        <modal-content :name="modalName">
            <template slot="title">Inquire about this property</template>
            <template slot="content">
            	<div v-if="!inquirySent">
	            	<div class="alert alert-danger alert-dismissible" v-if="hasErrors">
		            	<ul>
		            		<li v-for="error in errors">{{ error }}</li>
		            	</ul>
	            	</div>
	                <div class="form-group form-inline">
	                    <label class="col-12 col-lg-2">Full Name</label>
	                    <input type="text" class="form-control col-12 col-lg-10" v-model="name"/>
	                </div>
	                <div class="form-group form-inline">
	                    <label class="col-12 col-lg-2">Email Address</label>
	                    <input type="text" class="form-control col-12 col-lg-10" v-model="email"/>
	                </div>
	                <div class="form-group form-inline">
	                    <label class="col-12 col-lg-2">Phone</label>
	                    <input type="text" class="form-control col-12 col-lg-10" v-model="phone"/>
	                </div>
	                 <div class="form-group form-inline">
	                    <label class="col-12 col-lg-2">Message</label>
	                    <textarea class="form-control col-12 col-lg-10" v-model="message" style="height: 100px"></textarea>
	                </div>
	            </div>
	            <div v-else>
	            	<div class="alert alert-success">
	            		Thank you for your inquiry. We will contact you within 2 business days.
	            	</div>
	            </div>
            </template>
            <template slot="actions">
            	<button class="btn btn-default" @click="$modal.hide(modalName)" v-if="inquirySent">Close</button>
                <button class="btn btn-default" @click="$modal.hide(modalName)" v-if="!inquirySent">Cancel</button>
                <button class="btn btn-primary" @click="inquire" v-if="!inquirySent">
                    Submit
                </button>
        </template>
        </modal-content>
    </modal>
</template>

<script>
import ModalContent from "./ModalContent";
import Helper from './../mixins/Helper.js';
import axios from 'axios';

export default {
    components: { ModalContent },
    mixins: [ Helper ],
    data() {
        return {
            modalName: "inquire-property",
            propertyReference: null,
            name: null,
            email: null,
            phone: null,
            message: null,
            errors: [],
            inquirySent: false
        };
    },
    computed: {
    	hasErrors: function () {
    		return (this.errors.length) ? true : false;
    	},
    	payload: function() {
    		return {
    			name: this.name,
    			email: this.email,
    			phone: this.phone,
    			message: this.message,
    			reference: this.propertyReference
    		}
    	}
    },
    methods: {
        updateData(event) {
            this.propertyReference = event.params.reference;
            this.inquirySent = false;
            this.errors = [];
            this.name = null;
            this.email = null;
            this.phone = null;
            this.message = null;
        },
        validateForm() {
        	this.errors = [];
        	
        	if(!this.name)
        		this.errors.push("The name is required.");

        	if(!this.email)
        		this.errors.push("The email is required.");

        	if(this.email && !this.validEmail(this.email))
        		this.errors.push("The email is invalid.");

        	if(!this.phone)
        		this.errors.push("the phone is required.");

        	if(!this.message)
        		this.errors.push("the message is required.");

        },
        async inquire() {
        	this.validateForm();
            if (this.hasErrors) 
            	return;

            axios.post('/inquire', this.payload)
                    .then((response) => {
                    	this.inquirySent = true;
                    });
        }
    }
};
</script>

<style scoped>
	.alert ul{
		margin: 0;
		padding: 0;
	}
	.alert ul li{
		list-style: none;
		padding: 5px;
		color: #a94442;
	}
</style>
