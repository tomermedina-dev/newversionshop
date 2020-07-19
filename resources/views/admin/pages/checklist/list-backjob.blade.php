@extends('admin.layout.main')

@section('content')
<link rel="stylesheet" href="{{ asset('admin/css/pages/booked-services-summary.css') }}">
<div class="nv-vcm-content" id="nv-cvm-content-list">

  <div class="row">
    <div class="col-lg-6 col-md-6">
      <h3 class="nv-header nv-font-bc">
        CHECKLIST HISTORY - Back Job
      </h3>
    </div>

      <div class="col-lg-3 col-md-3 justify-content-end">
          <div class="container">
              <div class="row justify-content-end">
                  <a href="{{ route('admin.pdf.checklist_history') }}" type="button"  class="btn btn-lg nv-btn-txt-dark nv-font-bc">
                      <i class="fas fa-print"></i>&nbsp;PRINT
                  </a>
              </div>
          </div>

      </div>

    <div class="col-lg-3 col-md-9">
      <div class="input-group mb-3">
        <input type="text" class="form-control nv-input-default nv-font-c" placeholder="Search By..." aria-label="Search By..." >
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
          <td class="nv-font-bc" scope="col">Checklist ID</td>
          <td class="nv-font-bc" scope="col">Client Name</td>
          <td class="nv-font-bc" scope="col">Order / Service ID</td>
          <td class="nv-font-bc" scope="col">Notes</td>
          <td class="nv-font-bc" scope="col"></td>
        </tr>
      </thead>
      <tbody>
        <tr v-for="checklist in checklistList">
          <td class="nv-font-bc" scope="col">@{{pad(checklist.id)}}</td>
          <td class="nv-font-bc" scope="col">@{{checklist.client_name}}</td>
          <td class="nv-font-bc" scope="col">@{{checklist.order_number}}</td>
          <td class="nv-font-bc" scope="col">@{{checklist.notes}}</td>
          <td class="nv-font-bc" scope="col" class="info">
            <div class="dropdown">
              <div class="nv-account dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-h"></i>
              </div>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <a class="dropdown-item"  :href="'/admin/checklist/details/' + pad(checklist.id)">View Details</a>
                <a class="dropdown-item" :href="'/admin/job/new/' + pad(checklist.id)">Create Job Order</a>
              </div>
            </div>
          </td>
        </tr>

      </tbody>
    </table>
  </div>
</div>
<script src="{{ asset('admin\js\checklist.history.backjob.js') }}" ></script>
@endsection
