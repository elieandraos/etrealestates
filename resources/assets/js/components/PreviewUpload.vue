<template>
    <div class="upload-preview" :style="style">
    	<div class="upload-trigger" @click="openUploader" v-if="!imageIsUploaded">
    		<i class="fa fa-upload"></i> Click to upload an image
    	</div>
    	<div class="image-preview" v-if="imageIsUploaded">
    		<span class="remove-image" @click="removeImage" data-toggle="tooltip" data-placement="top" title="Change image">
    			<i class="fa fa-close"></i>
    		</span>
            <img class="preview" :src="imageData">
        </div>
    	<input type="file" :id="name" :name="name" class="file-uploader" @change="previewImage"/>
    </div>
</template>

<script>
    export default {
        props: {
            width: {
                type: Number,
                required: false,
                default: 320
            },
            height: {
                type: Number,
                required: false,
                default: 240
            },
            name: {
            	type: String,
            	required: true
            }
        },
        data: function () {
	        return {
	        	imageData: ""  // we be a base64 format of the image in this string
	        }
	    },
        computed: {
			style: function () {
		    	return 'width: ' + this.width + 'px; height: ' + this.height + 'px;'  
		    },
		    imageIsUploaded: function () {
		    	return (this.imageData.length > 0) ? true : false;
		    }
		},
        methods: {
            openUploader(event) {
               let uploader = '#' + this.name;
               $(uploader).click();
            },
            removeImage(event){
            	let uploader = '#' + this.name;
            	this.imageData = '';
            	$(uploader).val('');
            },
            previewImage(event){
                // Reference to the DOM input element
            	var input = event.target;
	            // Ensure that you have a file before attempting to read it
	            if (input.files && input.files[0]) {
	                // create a new FileReader to read this image and convert to base64 format
	                var reader = new FileReader();
	                // Define a callback function to run, when FileReader finishes its job
	                reader.onload = (e) => {
	                    // Read image as base64 and set to imageData
	                    this.imageData = e.target.result;
	                }
	                // Start the reader job - read file as a data url (base64 format)
	                reader.readAsDataURL(input.files[0]);
	                
	                this.$nextTick(function () {
					  	// DOM updated
	                	$('[data-toggle="tooltip"]').tooltip();
					})
	            }
	        }
        },
    }
</script>

<style scoped>
	.upload-preview{
		border: 1px solid #e8e8e8;
		padding: 2px;
		display: table;
	}

	.upload-trigger{
		display: table-cell;
		vertical-align: middle;
		text-align: center;
		cursor: pointer;
		color: #a8a8a8;
	}

	.file-uploader{
		display: none;
	}
	.image-preview{
		position: relative;
	}
	img.preview{
		width: 100%;
		height: 100%;
	}
	span.remove-image{
		position: absolute;
	    top: 5px;
	    right: 5px;
	    background-color: #000;
	    color: #FFF;
	    display: block;
	    width: 20px;
	    height: 20px;
	    opacity: 0.4;
	    border-radius: 10px;
	    cursor: pointer;
	    z-index: 99;
	    text-align: center;
	}
</style>
