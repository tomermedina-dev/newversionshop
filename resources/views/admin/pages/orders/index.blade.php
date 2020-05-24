@extends('admin.layout.main')

@section('content')

<link rel="stylesheet" href="{{ asset('admin/css/pages/booked-services-summary.css') }}">
<style media="screen">

</style>
<div class="nv-bss-content"  id="nv-orders-list">

  <div class="row">
    <div class="col-lg-7 col-md-9">
      <h3 class="nv-header nv-font-bc">
        Order Lists
      </h3>
    </div>
    <div class="col-lg-5 col-md-9">

      <div class="input-group mb-3 float-left">
        <button v-on:click="exportTableToExcel" type="button"  class="btn btn-sm nv-btn-txt-dark float-left mr-2">
          <i class="fas fa-file-excel"></i> Export to Excel
        </button>
        <input id="search-order" onkeyup="tableSearch('search-order' , 'table-order-list')" type="text" class="form-control nv-input-default nv-font-c" placeholder="Search By..." aria-label="Search By..." >
        <div class="input-group-append ">
          <span class="input-group-text nv-input-default">
            <i class="fas fa-search"aria-hidden="true"></i>
          </span>
        </div>
      </div>
    </div>

  </div>


  <div class="nv-table-container mb-3">

    @include('admin.pages.orders.order-list')
  </div>
  <div id="nv-order-item-list">

  </div>


    <!-- <ul class="pagination pagination-sm nv-pagination justify-content-center align-items-center">
      <li class="page-item nv-previous ">
        <a class="page-link" href="#" tabindex="-1"><i class="fas fa-angle-left"></i></a>
      </li>
      <li class="page-item active"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item nv-next">
        <a class="page-link " href="#" tabindex="-1"><i class="fas fa-angle-right"></i></a>
      </li>
    </ul> -->
</div>
<script src="{{ asset('admin\js\orders.js') }}" ></script>
@endsection
