@extends('admin.layout.main')

@section('content')

<link rel="stylesheet" href="{{ asset('admin/css/pages/booked-services-summary.css') }}">
<style media="screen">

</style>
<div class="nv-bss-content" id='nv-bss-content'>

  <div class="row">
    <div class="col-lg-9 col-md-9">
      <h3 class="nv-header nv-font-bc">
        BOOKED SERVICES SUMMARY
      </h3>
    </div>
    <div class="col-lg-3 col-md-9">
      <div class="input-group mb-3">
        <input id="search-bookings" onkeyup="tableSearch('search-bookings' , 'table-bookings-list')"  type="text" class="form-control nv-input-default nv-font-c" placeholder="Search By..." aria-label="Search By..." >
        <div class="input-group-append ">
          <span class="input-group-text nv-input-default">
            <i class="fas fa-search"aria-hidden="true"></i>
          </span>
        </div>
      </div>
    </div>

  </div>
  @include('admin.pages.bookings.bookings-list')
</div>
<script src="{{ asset('admin\js\bookings.js') }}" ></script>
@endsection
