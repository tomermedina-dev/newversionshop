
<div class="nv-add-item">
  <button type="button" class="btn btn-lg nv-btn-txt-dark nv-font-bc" data-toggle="modal" data-target="#addItemModal">
    <i class="fas fa-plus-circle"></i>&nbsp;
    ADD ITEM
    </button>

    <div class="modal fade nv-modal" id="addItemModal" tabindex="-1" role="dialog" aria-labelledby="addItemModalLabel" aria-hidden="true">
      <!-- <div class="nv-invisible-padding"></div> -->
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <div class="modal-title">
            <div class="nv-title nv-font-bc">ADD ITEM</div>
            <div class="nv-subtitle">Fill out the details below.</div>
          </div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!--  -->
        <div>
        <div class="modal-body">

          <div class="row">
          <div class="col-lg-12">
            <div>
              <div class="form-group input-group nv-input-group-custom mb-2">
                <div  class="input-group-prepend">
                  <span class="input-group-text nv-font-c">
                    TYPE</span>
                </div>
                <select v-model="type"   class="form-control" id="featuredType">
                  <option  value="Products"  >Products</option>
                  <option  value="Services"  >Services</option>
                  <option  value="Cars"  >Cars</option>
                  <option  value="Home"  >Homepage</option>
                </select>
              </div>

            </div>
             <div class="input-group nv-input-group-custom mb-2">
                <div class="input-group-prepend">
                   <span class="input-group-text nv-font-c">TITLE</span>
                </div>
                <input v-model="title" type="text" class="form-control">
             </div>
             <div class="input-group nv-input-group-custom mb-2">
                <div class="input-group-prepend">
                   <span class="input-group-text nv-font-c">DESCRIPTION</span>
                </div>
                <input v-model="description" type="text" class="form-control">
             </div>
          </div>
          </div>
          <div class="container">
            <h3>Featured Image</h3>
            <small>(Please upload at least image with 350px height.)</small>
            <div class="dropzone" id="dropzoneItem">
              <div class="dz-message" data-dz-message>Drop image or click to upload image</div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button v-on:click="saveItem" type="button" class="btn btn-sm nv-btn-txt-dark nv-font-bc" data-toggle="modal" >
            <i class="fas fa-forward"></i>&nbsp;
            PROCEED
          </button>
        </div>
        </div>
<!--  -->
      </div>
    </div>
  </div>
</div>
