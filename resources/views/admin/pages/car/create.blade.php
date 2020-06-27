@extends('admin.layout.main')
@section('content')
<link rel="stylesheet" href="{{ asset('admin/css/pages/parts-and-materials-inventory.css') }}">
<link rel="stylesheet" href="{{ asset('tinymce/cms-tinymce.css') }}">
<link rel="stylesheet" href="{{ asset('tinymce/flexslider.css') }}">
<link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/>
<script src="https://unpkg.com/cropperjs"></script>
<link rel="stylesheet" href=" {{ asset('dropzone/css/croppic.css') }} ">
<link rel="stylesheet"  href="{{ asset('dropzone/css/dropzone.css') }}">
<script src="{{ asset('tinymce\tinymce.min.js') }}"  ></script>
<script type="text/javascript">
  var page = 'create';
  var car_manufacturer = "";
  var car_model = "" ;
  var color = "" ;
  var price = "" ;
  var description = "" ;
</script>
<div class="nv-pami-content">
  <div class="row">
    <div class="col-lg-9 col-md-9">
      <h3 class="nv-header nv-font-bc">
        CREATE CAR DETAILS
      </h3>
    </div>
  </div>
</div>
<div class="container" id="nv-add-car">
  <div class="row">
  <div class="col-lg-6">
     <div class="input-group nv-input-group-custom mb-2">
        <div class="input-group-prepend">
           <span class="input-group-text nv-font-c">
           <i class="fas fa-car"></i>&nbsp;&nbsp;<small>MANUFACTURER</small></span>
        </div>
        <input v-model="car_manufacturer" type="text" class="form-control">
     </div>
     <div class="input-group nv-input-group-custom mb-2">
        <div class="input-group-prepend">
           <span class="input-group-text nv-font-c">
           <i class="fas fa-car"></i>&nbsp;&nbsp;MODEL</span>
        </div>
        <input v-model="car_model" type="text" class="form-control">
     </div>
     <div class="input-group nv-input-group-custom mb-2">
        <div class="input-group-prepend">
           <span class="input-group-text nv-font-c">
           <i class="fas fa-car"></i>&nbsp;&nbsp;COLOR</span>
        </div>
        <input v-model="color" type="text" class="form-control">
     </div>

  </div>
   <div class="col-lg-6">
     <div class="input-group nv-input-group-custom mb-2">
        <div class="input-group-prepend">
           <span class="input-group-text nv-font-c">
           <i class="fas fa-car"></i>&nbsp;&nbsp;PRICE</span>
        </div>
        <input  onkeypress="return isNumber(event)"  v-model="price" type="text" class="form-control">
     </div>


      <div class="input-group nv-input-group-custom mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text nv-font-c">
            <i class="fas fa-car"></i>&nbsp;&nbsp;DESCRIPTION</span>
        </div>
        <input v-model="description" type="text" class="form-control">
      </div>

    </div>
    </div>
  <div class="container">
    <h3>Car Image</h3>
    <div class="dropzone" id="dropzoneItem">
      <div class="dz-message" data-dz-message>Drop image or click to upload image</div>
    </div>
  </div>

  <div class="form-group mt-5">
    <label for="content">Content Details</label>
    <textarea id="tinymce" name="content" class="form-control tinymce" rows="40">{{ isset($page) ? $page->content : '' }}</textarea>
    <input name="image" type="file" id="upload" class="hidden" hidden onchange="">
  </div>
  <button v-on:click="saveItem" type="button" class="btn btn-md nv-btn-txt-dark nv-font-bc" data-toggle="modal" >
       <i class="fas fa-forward"></i>&nbsp;
     PROCEED
   </button>
</div>

<script src="{{ asset('dropzone\js\dropzone.js') }}" ></script>
<script src="{{ asset('dropzone\js\croppic.min.js') }}" ></script>
<script src="{{ asset('admin\js\car-tinymce.js') }}"  ></script>
<script src="{{ asset('admin\js\car.create.js') }}"  ></script>
@endsection
