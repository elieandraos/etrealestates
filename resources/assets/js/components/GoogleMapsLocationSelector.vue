<template>
  <div>
    <div class="map-container" id="google-map"></div>
    <input type="hidden" name="lat" id="lat" v-model="lat" />
    <input type="hidden" name="lng" id="lng" v-model="lng" />
  </div>
</template>

<script>
  export default {
    props: {
      latitude: {
        type: Number,
        default: 33.97650028600334
      },
      longitude: {
        type: Number,
        default: 35.635358863524516
      }
    },

    data(){
      return {
        lat: this.latitude,
        lng: this.longitude,
      }
    },

    mounted(){
      // Set coordinates
      let myLatlng = new google.maps.LatLng(this.lat, this.lng);

      // Options
      let mapOptions = {
        zoom: 12,
        center: myLatlng,
        mapTypeControl: false,
        streetViewControl: false
      };

      // Apply options
      let map = new google.maps.Map(document.getElementById('google-map'), mapOptions);

      // Add marker
      let marker = new google.maps.Marker({
        position: myLatlng,
        map: map
      });

      marker.setMap(map);

      let self = this;

      google.maps.event.addListener(map, "center_changed", function() {
        let lat = map.getCenter().lat();
        let lon = map.getCenter().lng();
        let newLatLng = {lat: lat, lng: lon};
        marker.setPosition(newLatLng);

        self.$emit('locationUpdated', newLatLng);
        self.lat = newLatLng.lat;
        self.lng = newLatLng.lng;
      });
    }
  }
</script>

<style scoped>
  .map-container{
    width: 320px;
    height: 240px;
    margin: 0 auto;
    background: gray;
  }
</style>