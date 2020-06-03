<div class="modal fade nv-modal" id="addProfileUnits" tabindex="-1" role="dialog" aria-labelledby="addProfileUnits" aria-hidden="true">
  <!-- <div class="nv-invisible-padding"></div> -->
<div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <div class="modal-title">
        <div class="nv-title nv-font-bc">New Unit</div>
      </div>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true" style="color:black" >&times;</span>
      </button>
    </div>

    <div class="modal-body">
      <div class="form-group">
        <label>Brand</label>
        <input  v-model="brand" type="text" class="form-control nv-input-custom" id="car-brand" placeholder="Enter Car Brand"  >
      </div>
      <div class="form-group">
        <label>Model</label>
        <input  v-model="model" type="text" class="form-control nv-input-custom" id="car-model" placeholder="Enter Car Model"  >
      </div>
      <div class="form-group">
        <label>VIN</label>
        <input  v-model="vin" type="text" class="form-control nv-input-custom" id="car-vin" placeholder="Enter VIN"  >
      </div>
      <div class="form-group">
        <label>Plate Number</label>
        <input  v-model="plateNumber" type="text" class="form-control nv-input-custom" id="car-plate" placeholder="Enter Plate Number"  >
      </div>

      <button  v-on:click="createNewUnit"    type="button" class="float-right btn nv-btn-txt-white nv-font-bc" >
        <i class="fas fa-save text-white"></i>&nbsp;
        SAVE
      </button>
    </div>
    <!-- <div class="modal-footer">

    </div> -->

  </div>
</div>
</div>
