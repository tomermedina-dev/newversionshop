<link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/>
<script src="https://unpkg.com/cropperjs"></script>
<link rel="stylesheet" href=" {{ asset('dropzone/css/croppic.css') }} ">
<link rel="stylesheet"  href="{{ asset('dropzone/css/dropzone.css') }}">
<div id="nv-service-edit">
  <nv-component-edit-service></nv-component-edit-service>
</div>
<div class="nv-add-service">
  <button type="button" class="btn btn-lg nv-btn-txt-dark nv-font-bc" data-toggle="modal" data-target="#addServiceModal">
    <i class="fas fa-plus-circle"></i>&nbsp;
    NEW SERVICE
    </button>

    <div class="modal fade nv-modal" id="addServiceModal" tabindex="-1" role="dialog" aria-labelledby="addItemModalLabel" aria-hidden="true">
      <!-- <div class="nv-invisible-padding"></div> -->
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <div class="modal-title">
            <div class="nv-title nv-font-bc">ADD SERVICE</div>
            <div class="nv-subtitle">Fill out the details below.</div>
          </div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <nv-component-add-service></nv-component-add-service>

      </div>
    </div>
  </div>
</div>
