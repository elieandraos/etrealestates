<template>
  <vue-dropzone ref="myVueDropzone" id="dropzone" :options="dropzoneOptions"></vue-dropzone>
</template>

<script>
  import vue2Dropzone from 'vue2-dropzone'
  import 'vue2-dropzone/dist/vue2Dropzone.min.css'

  export default {
      name: 'app',
      components: {
        vueDropzone: vue2Dropzone
      },
      props: {
          url: {
              type: String,
              required: true
          },
          media: {
              type: Array,
              required: false
          }
      },
      data: function () {
      
        return {
          dropzoneOptions: {
              url: this.url,
              headers: {
                "X-CSRF-TOKEN": document.head.querySelector("[name=csrf-token]").content
              },
              thumbnailWidth: 150,
              maxFilesize: 2,
              addRemoveLinks: true,
              removedfile: function(file) {
                $('img[alt="' + file.name +'"]').closest('.dz-image-preview').remove();
                $.ajax({
                  url: "/properties/remove-media/" + file.id,
                  type: 'POST',
                  headers: {
                      'X-CSRF-TOKEN': document.head.querySelector("[name=csrf-token]").content
                  },
                  success: function(response) {
                      //alert('deleted');
                  }
                });  
              }
          }
        }
    },
    mounted() {
      if(this.media.length) {
        for(var key in this.media) {
          let mediaItem = this.media[key];
          let file = { size: mediaItem.size, name: mediaItem.name, type: mediaItem.type, id: mediaItem.id };
          let url = mediaItem.url;
          this.$refs.myVueDropzone.manuallyAddFile(file, url);
        }
      }
    }
}
</script>