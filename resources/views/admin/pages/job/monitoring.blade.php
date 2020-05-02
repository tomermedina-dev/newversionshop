@extends('admin.layout.main')

@section('content')
<link rel="stylesheet" href="{{ asset('admin/css/pages/booked-services-summary.css') }}">

<div class="nv-jo-content" id="nv-jo-monitoring">

  <div class="row">
    <div class="col-lg-9 col-md-9">
      <h3 class="nv-header nv-font-bc">
        JOB MONITORING
      </h3>
    </div>
    <div class="col-lg-3 col-md-9">
      <div class="input-group mb-3">
        <input type="text" class="form-control nv-input-default nv-font-c" placeholder="Search ..." aria-label="Search By..." >
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
          <td class="nv-font-bc" scope="col">Job ID</td>
          <td class="nv-font-bc" scope="col">Client Name</td>
          <td class="nv-font-bc" scope="col">Assigned Employee</td>
          <td class="nv-font-bc" scope="col">Time Started</td>
          <td class="nv-font-bc" scope="col">Status</td>
          <td></td>
        </tr>
      </thead>
      <tbody id="labor-list"  >
        <tr v-for="jo in jobList">
          <td class="nv-font-bc" scope="col">
           @{{jo.job_order_id}}
          </td>
          <td class="nv-font-bc" scope="col">
           @{{jo.client_name}}
          </td>
          <td class="nv-font-bc" scope="col">
           @{{jo.first_name}} @{{jo.last_name}}
          </td>
          <td class="nv-font-bc" scope="col">
            <span v-if="jo.start == null">N/A</span>
            <span v-else> @{{jo.start}}</span>
          </td>
          <td class="nv-font-bc" scope="col">
           <span v-if="jo.start == null">Not Started</span>
           <span v-else>In-Progress</span>
          </td>
          <td class="nv-font-bc" scope="col" class="info">
            <div class="dropdown">
              <div class="nv-account dropdown-toggle" type="button" id="dropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-h"></i>
              </div>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                <a class="dropdown-item" v-on:click="viewQR(jo.id , jo.job_order_id , jo.employee_id)" >View QR</a>
                <a class="dropdown-item"  :href="'/admin/job/details/' + jo.job_order_id" target="_blank" >View Job Details</a>
                <a class="dropdown-item"  :href="'/admin/checklist/details/' + jo.job_order_id" target="_blank" >View Checklist Details</a>
              </div>
            </div>
          </td>
        </tr>

      </tbody>

    </table>

  </div>


</div>
<script src="{{ asset('admin\js\job.order.monitoring.js') }}" ></script>
@endsection
