@extends('admin.layout.main')

@section('content')
<link rel="stylesheet" href="{{ asset('admin/css/pages/parts-and-materials-inventory.css') }}">

<div class="nv-pami-content">

  <div class="row">
    <div class="col-lg-9 col-md-9">
      <h3 class="nv-header nv-font-bc">
        PARTS AND MATERIALS INVENTORY for Admin
      </h3>
    </div>
    <div class="col-lg-3 col-md-9">
      <div class="input-group mb-3">
        <input id="search-inventory" onkeyup="tableSearch('search-inventory' , 'table-inventory-list')" type="text" class="form-control nv-input-default nv-font-c" placeholder="Search ..." aria-label="Search By..." >
        <div class="input-group-append ">
          <span class="input-group-text nv-input-default">
            <i class="fas fa-search"aria-hidden="true"></i>
          </span>
        </div>
      </div>
    </div>
    @include('admin.pages.inventory.parts-and-materials-inventory-add')
  </div>

  <br>
  @include('admin.pages.inventory.parts-and-materials-inventory-list')
  <script type="text/javascript">
    var target = 'admin';
    $("#col-status").hide();
  </script>
  <script src="{{ asset('dropzone\js\dropzone.js') }}" ></script>
  <script src="{{ asset('dropzone\js\croppic.min.js') }}" ></script>
  <script src="{{ asset('admin\js\inventory.js') }}" ></script>
</div>
@endsection
