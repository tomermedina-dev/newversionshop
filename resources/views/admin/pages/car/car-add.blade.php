<link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/>
<script src="https://unpkg.com/cropperjs"></script>
<link rel="stylesheet" href=" {{ asset('dropzone/css/croppic.css') }} ">
<link rel="stylesheet"  href="{{ asset('dropzone/css/dropzone.css') }}">
@include('admin.pages.car.car-edit')
<div class="nv-add-car">
  <a target="_blank" href="/admin/page/car.create" class="btn btn-lg nv-btn-txt-dark nv-font-bc" >
    <i class="fas fa-plus-circle"></i>&nbsp;
    ADD CAR
  </a>

    <div class="modal fade nv-modal" id="addCarModal" tabindex="-1" role="dialog" aria-labelledby="addCarModalLabel" aria-hidden="true">
      <!-- <div class="nv-invisible-padding"></div> -->
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <div class="modal-title">
            <div class="nv-title nv-font-bc">ADD CAR</div>
            <div class="nv-subtitle">Fill out the details below.</div>
          </div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- <nv-component-add-car></nv-component-add-car> -->

      </div>
    </div>
  </div>
</div>
