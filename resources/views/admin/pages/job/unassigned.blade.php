@extends('admin.layout.main')

@section('content')

<link rel="stylesheet" href="{{ asset('admin/css/pages/booked-services-summary.css') }}">
<style media="screen">

</style>
<div class="nv-bss-content" id='nv-jo-list-unassigned'>

  <div class="row">
    <div class="col-lg-9 col-md-9">
      <h3 class="nv-header nv-font-bc">
        NEW JOB ORDERS
      </h3>
    </div>
    <div class="col-lg-3 col-md-9">
      <div class="input-group mb-3">
        <input id="search-jo-unassigned" onkeyup="tableSearch('search-jo-unassigned' , 'table-jo-unassigned-list')" type="text" class="form-control nv-input-default nv-font-c" placeholder="Search By..." aria-label="Search By..." >
        <div class="input-group-append ">
          <span class="input-group-text nv-input-default">
            <i class="fas fa-search"aria-hidden="true"></i>
          </span>
        </div>
      </div>
    </div>

  </div>

  <div class="nv-table-container mb-3">
    <table class="nv-table table table-striped " v-if="jobOrderList.length > 0">
      <thead>
        <tr>
          <td class="nv-font-bc" scope="col">Job Order ID</td>
          <td class="nv-font-bc" scope="col">Make & Model</td>
          <td class="nv-font-bc" scope="col">Client Name</td>
          <td class="nv-font-bc" scope="col">Job Order Date</td>
          <td class="nv-font-bc" scope="col">Notes</td>
          <td class="nv-font-bc" scope="col"></td>
        </tr>
      </thead>
      <tbody id="table-jo-unassigned-list">
        <tr v-for="jo in jobOrderList">
          <td class="nv-font-bc" scope="col"> @{{pad(jo.job_order_id)}} </td>
          <td class="nv-font-bc" scope="col">
           @{{jo.make_model}}
          </td>
          <td class="nv-font-bc" scope="col">@{{jo.client_name}}</td>
          <td class="nv-font-bc" scope="col">@{{jo.job_order_date}}</td>
          <td class="nv-font-bc" scope="col">@{{jo.job_order_notes}}</td>
          <td class="nv-font-bc" scope="col" class="info">
            <div class="dropdown">
              <div class="nv-account dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-h"></i>
              </div>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <a class="dropdown-item"  :href="'/admin/job/details/' + pad(jo.job_order_id)">Assign Worker and Set slot</a>
                <a class="dropdown-item"  :href="'/admin/job/details/' + pad(jo.job_order_id)">View Job Details</a>
                <a class="dropdown-item"  :href="'/admin/checklist/details/' + pad(jo.checklist_id)" target="_blank" >View Checklist Details</a>
              </div>
            </div>
          </td>
        </tr>

      </tbody>
    </table>
    <div v-else class="text-center">
      <h1>No result</h1>
    </div>
  </div>
</div>
<script src="{{ asset('admin\js\job.order.unassigned.js') }}" ></script>
@endsection
