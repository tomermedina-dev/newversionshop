@extends('admin.layout.main')

@section('content')
<link rel="stylesheet" href="{{ asset('admin/css/pages/parts-and-materials-inventory.css') }}">
<link rel="stylesheet" href="{{ asset('tinymce/cms-tinymce.css') }}">
<link rel="stylesheet" href="{{ asset('tinymce/flexslider.css') }}">

<!-- <script src="{{ asset('tinymce\tinymce.min.js') }}"  ></script>
<script>tinymce.init({selector:'textarea#tinymce' });</script> -->
<div class="nv-pami-content">
  <div class="row">
    <div class="col-lg-9 col-md-9">
      <h3 class="nv-header nv-font-bc">
        CARS
      </h3>
    </div>
    <div class="col-lg-3 col-md-9">
      <div class="input-group mb-3">
        <input id="search-car" onkeyup="tableSearch('search-car' , 'table-car-list')" type="text" class="form-control nv-input-default nv-font-c" placeholder="Search ..." aria-label="Search By..." >
        <div class="input-group-append ">
          <span class="input-group-text nv-input-default">
            <i class="fas fa-search"aria-hidden="true"></i>
          </span>
        </div>
      </div>
    </div>
    @include('admin.pages.car.car-add')
  </div>

  <br>
  @include('admin.pages.car.car-list')
  <script src="{{ asset('dropzone\js\dropzone.js') }}" ></script>
  <script src="{{ asset('dropzone\js\croppic.min.js') }}" ></script>
  <script src="{{ asset('admin\js\car.js') }}" ></script>
  <script src="{{ asset('jquery\js\jquery.min.js') }}"  ></script>
  <script src="{{ asset('jquery\js\jquery-ui.min.js') }}"  ></script>
  <script src="{{ asset('tinymce\tinymce.min.js') }}"  ></script>

  <script src="{{ asset('admin\js\car-tinymce.js') }}"  ></script>
</div>
@endsection
