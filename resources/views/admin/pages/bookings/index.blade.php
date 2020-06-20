@extends('admin.layout.main')

@section('content')

<link rel="stylesheet" href="{{ asset('admin/css/pages/booked-services-summary.css') }}">
<link rel="stylesheet" href="{{ asset('calendar/fullcalendar.css') }}">
<style media="screen">
  td.fc-day.fc-widget-content{
    padding: 5px !important;
    font-size: 1.1em;
  }
  .nv-calendar-container{
    width: 1600px;
    height: 1200px;
    overflow: auto;
  }
</style>
<div class="nv-bss-content" id='nv-bss-content'>

  <div class="row">
    <div class="col-lg-6 col-md-9">
      <h3 class="nv-header nv-font-bc">
        BOOKED SERVICES (New)
      </h3>
    </div>

      <div class="col-lg-3 col-md-3 justify-content-end" id="nv-booking-table-print"   style="display:none">
          <div class="container">
              <div class="row justify-content-end">
                  <a href="{{ route('admin.pdf.booked_services') }}" type="button"  class="btn nv-btn-txt-dark nv-font-bc">
                      <i class="fas fa-print"></i>&nbsp;PRINT
                  </a>
              </div>
          </div>

      </div>

    <div class="col-lg-3">

      <div class="input-group mb-3 float-left" id="nv-booking-table-search" style="display:none"    >
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
  <div class="">
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"   v-on:click="showContainer('calendar')" checked>
      <label class="form-check-label" for="inlineRadio1">Calendar</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" v-on:click="showContainer('table')">
      <label class="form-check-label" for="inlineRadio2">Table List</label>
    </div>
  </div>
  <div id="nv-booking-table"  style="display:none;">
    @include('admin.pages.bookings.bookings-list')
  </div>
  <div id="nv-booking-calendar">
    <div class="nv-calendar-container" >
      <div id="calendar_master"  >

      </div>
    </div>
  </div>

</div>

<script src="{{ asset('calendar\moment.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('calendar\fullcalendar.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('admin\js\bookings.js') }}" ></script>
@endsection
