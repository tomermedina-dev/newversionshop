@extends('admin.layout.main')

@section('content')

<link rel="stylesheet" href="{{ asset('admin/css/pages/booked-services-summary.css') }}">
<div class="nv-bss-content" id='nv-bss-content-rejected'>

  <div class="row">
    <div class="col-lg-6 col-md-9">
      <h3 class="nv-header nv-font-bc">
        BOOKED SERVICES (Rejected)
      </h3>
    </div>

      <div class="col-lg-3 col-md-3 justify-content-end">
          <div style="display:none;" class="container">
              <div class="row justify-content-end">
                  <a href="{{ route('admin.pdf.booked_services') }}" type="button"  class="btn nv-btn-txt-dark nv-font-bc">
                      <i class="fas fa-print"></i>&nbsp;PRINT
                  </a>
              </div>
          </div>

      </div>

    <div class="col-lg-3">

      <div class="input-group mb-3 float-left">
        <button v-on:click="exportTableToExcel" type="button"  class="btn btn-sm nv-btn-txt-dark float-left mr-2">
          <i class="fas fa-file-excel"></i> Export to Excel
        </button>
        <input id="search-bookings" onkeyup="tableSearch('search-bookings' , 'table-bookings-list')"  type="text" class="form-control nv-input-default nv-font-c" placeholder="Search By..." aria-label="Search By..." >
        <div class="input-group-append ">
          <span class="input-group-text nv-input-default">
            <i class="fas fa-search"aria-hidden="true"></i>
          </span>
        </div>
      </div>
    </div>

  </div>
  <div class="nv-table-container mb-3">
    <table class="nv-table table  ">
      <thead>
        <tr>
          <td class="nv-font-bc" scope="col">Service #</td>
          <td class="nv-font-bc" scope="col">Customer Name</td>
          <td class="nv-font-bc" scope="col">Service Name</td>
          <td class="nv-font-bc" scope="col">Booked Date</td>
          <td class="nv-font-bc" scope="col">Date of Service</td>
          <td class="nv-font-bc" scope="col">Time</td>
          <td class="nv-font-bc" scope="col">Notes</td>
          <td class="nv-font-bc" scope="col">Reject Reason</td>

        </tr>
      </thead>
      <tbody  v-for="(booking , index) in bookedServicesList">
        <tr  >

            <td  class="nv-font-bc"   >@{{pad(booking.bookingData.id)}}</td>
            <td class="nv-font-bc" scope="col">@{{booking.bookingData.first_name}} @{{booking.last_name}}</td>
            <td class="nv-font-bc" scope="col">@{{booking.bookingData.service_title}}</td>
            <td class="nv-font-bc" scope="col">@{{booking.bookingData.created_at}}</td>
            <td class="nv-font-bc" scope="col">@{{booking.bookingData.service_date_new}}</td>
            <td class="nv-font-bc" scope="col">@{{booking.bookingData.service_time_new}}</td>
            <td class="nv-font-bc" scope="col">@{{booking.bookingData.notes}}</td>
            <td class="nv-font-bc" scope="col">@{{booking.bookingData.reject_reason}}</td>

        </tr>

      </tbody>
    </table>
  </div>

</div>
<script src="{{ asset('admin\js\bookings-rejected.js') }}" ></script>
@endsection
