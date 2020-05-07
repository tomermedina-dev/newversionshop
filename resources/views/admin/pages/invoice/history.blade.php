@extends('admin.layout.main')

@section('content')
<link rel="stylesheet" href="{{ asset('admin/css/pages/booked-services-summary.css') }}">
<div class="nv-jo-content" id="nv-history-list">

  <div class="row">
    <div class="col-lg-9 col-md-9">
      <h3 class="nv-header nv-font-bc">
        Invoice History
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
    <table class="nv-table table table-striped " v-if="jobList.length > 0">
      <thead>
        <tr>
          <td class="nv-font-bc" scope="col">Invoice ID</td>
          <td class="nv-font-bc" scope="col">Job Order ID</td>
          <td class="nv-font-bc" scope="col">Client Name</td>
          <td></td>
        </tr>
      </thead>
      <tbody id="labor-list"  >
        <tr v-for="jo in jobList">
          <td class="nv-font-bc" scope="col">
           @{{pad(jo.id)}}
          </td>
          <td class="nv-font-bc" scope="col">
           @{{jo.job_order_id}}
          </td>
          <td class="nv-font-bc" scope="col">
           @{{jo.client_name}}
          </td>

          <td class="nv-font-bc" scope="col" class="info">
            <div class="dropdown" >
              <div class="nv-account dropdown-toggle" type="button" id="dropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-h"></i>
              </div>
              <div style="z-index:9999" class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                <a class="dropdown-item"  :href="'/admin/job/details/' + jo.job_order_id" target="_blank" >View Job Details</a>
                <a class="dropdown-item"  :href="'/admin/invoice/details/' + pad(jo.id)" target="_blank" >View Invoice Details</a>
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
<script src="{{ asset('admin\js\invoice.history.js') }}" ></script>
@endsection
