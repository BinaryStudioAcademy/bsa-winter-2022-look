<template>
  <div>
    <h2>Your Address</h2>
    <vuetify-google-autocomplete
      id="map"
      ref="address"
      classname="form-control"
      placeholder="Please type your address"
      v-on:placechanged="getAddressData"
    >
      <template #append>
        <!-- my fancy component rather than a simple icon -->
        <my-btn />
      </template>
    </vuetify-google-autocomplete>
  </div>
</template>

<script>
export default {
  data: function () {
    return {
      address: '',
    };
  },
  mounted() {
    // To demonstrate functionality of exposed component functions
    // Here we make focus on the user input
    this.$refs.address.focus();
  },
  methods: {
    /**
     * When the location found
     * @param {Object} addressData Data of the found location
     * @param {Object} placeResultData PlaceResult object
     * @param {String} id Input container ID
     */
    getAddressData: function (addressData /* placeResultData, id */) {
      this.address = addressData;
    },
  },
};
</script>
