@extends('admin.layout.main')

@section('content')

<link rel="stylesheet" href="{{ asset('admin/css/pages/service-warranty.css') }}">
<style media="screen">

</style>
<div class="nv-sw-content" id="nv-sw-active">

  <div class="row">
    <div class="col-lg-9 col-md-9">
      <h3 class="nv-header nv-font-bc">
        SERVICE WARRANTY (Active)
      </h3>
    </div>
    <div class="col-lg-3 col-md-9">
      <div class="input-group mb-3">
        <input  id="search-warranty" onkeyup="tableSearch('search-warranty' , 'table-warranty-list')" type="text" class="form-control nv-input-default nv-font-c" placeholder="Search By..." aria-label="Search By..." >
        <div class="input-group-append ">
          <span class="input-group-text nv-input-default">
            <i class="fas fa-search"aria-hidden="true"></i>
          </span>
        </div>
      </div>
    </div>

  </div>

  <div class="nv-table-container mb-3">
    <table class="nv-table table table-striped ">
      <thead>
        <tr>
          <td class="nv-font-bc" scope="col">Job Order ID</td>
          <td class="nv-font-bc" scope="col">Model</td>
          <td class="nv-font-bc" scope="col">Client Name</td>
          <td class="nv-font-bc" scope="col">Job Order Date</td>
          <td class="nv-font-bc" scope="col">Warranty Start Date</td>
          <td class="nv-font-bc" scope="col">Warranty End Date</td>
          <td class="nv-font-bc" scope="col"></td>
        </tr>
      </thead>
      <tbody id="table-warranty-list">
        <tr v-for="warranty in warrantyList">
          <td class="nv-font-bc" scope="col"> @{{pad(warranty.job_order_id)}} </td>
          <td class="nv-font-bc" scope="col">
           @{{warranty.make_model}}
          </td>
          <td class="nv-font-bc" scope="col">@{{warranty.client_name}}</td>
          <td class="nv-font-bc" scope="col">@{{warranty.job_order_date}}</td>
          <td class="nv-font-bc" scope="col">@{{warranty.warranty_start}}</td>
          <td class="nv-font-bc" scope="col">@{{warranty.warranty_end}}</td>
          <td class="nv-font-bc" scope="col" class="info">
            <div class="dropdown">
              <div class="nv-account dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-h"></i>
              </div>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <a class="dropdown-item pointer" :href="'/admin/backjob/checklist/new/' + pad(warranty.job_order_id) + '/' + pad(warranty.warranty_id)"target="_blank" >Create Back Job</a>
                <a class="dropdown-item pointer"  v-on:click="voidWarranty(warranty.warranty_id)" target="_blank" >Void Warranty</a>
                <a class="dropdown-item"  :href="'/admin/job/details/' + pad(warranty.job_order_id)" target="_blank" >View Job Details</a>
                <a class="dropdown-item"  :href="'/admin/checklist/details/' + pad(warranty.checklist_id)" target="_blank" >View Checklist Details</a>
              </div>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>


</div>
<script src="{{ asset('admin\js\warranty.active.js') }}" ></script>
@endsection
