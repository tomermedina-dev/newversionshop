<div class="modal fade nv-modal" id="editProfileAddress" tabindex="-1" role="dialog" aria-labelledby="editProfileAddress" aria-hidden="true">
  <!-- <div class="nv-invisible-padding"></div> -->
<div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <div class="modal-title">
        <div class="nv-title nv-font-bc">EDIT ADDRESS</div>
      </div>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true" style="color:black" >&times;</span>
      </button>
    </div>

    <div class="modal-body">
      <div class="form-group">
        <label>Address / Location</label>
        <input  v-model="address" type="text" class="form-control nv-input-custom" id="address" placeholder="Enter address"  >
      </div>
      <div class="form-group">
        <label>Notes Notes (For landmarks , etc)</label>
        <input v-model="notes" type="text" class="form-control nv-input-custom" id="notes" placeholder="Notes (Optional)"  >
      </div>
      <button  v-on:click="updateProfile('update-address')"    type="button" class="float-right btn nv-btn-txt-white nv-font-bc" >
        <i class="fas fa-save text-white"></i>&nbsp;
        SAVE
      </button>
    </div>
    <!-- <div class="modal-footer">

    </div> -->

  </div>
</div>
</div>
