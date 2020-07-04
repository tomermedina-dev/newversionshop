@extends('admin.layout.main')

@section('content')
<link rel="stylesheet" href="{{ asset('admin/css/pages/booked-services-summary.css') }}">
<div class="nv-bss-content" id='nv-jo-list-details'>
  <div class="row">
    <div class="col-lg-9 col-md-9">
      <h3 class="nv-header nv-font-bc">
        JOB ORDERS TIME IN / OUT HISTORY
      </h3>
    </div>
  </div>
  <div class="container">
    <div class="">
      <h5>Job Order ID : {{str_pad( $joDetails->job_order_id , 10, '0', STR_PAD_LEFT)  }}</h5>
      <h5>Client Name  : {{$joDetails->client_name}}</h5>
      <h5  >Assigned Employee : {{$jobAssignment->first_name}}  {{$jobAssignment->last_name}}</h5>
    </div>
    <div class="nv-table-container mb-3 mt-2">
      @if(count($history) > 0)
      <table class="nv-table table table-striped ">
        <thead>
          <tr>
            <td class="nv-font-bc" scope="col">Time-In</td>
            <td class="nv-font-bc" scope="col">Time-Out</td>
          </tr>
        </thead>
        <tbody id="table-jo-history-list">

          @foreach($history as $items)
          <tr >
            <td class="nv-font-bc" scope="col"> {{$items->start}}  </td>
            <td class="nv-font-bc" scope="col"> {{$items->end}}  </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      @else
        <div class="p-2">
          <h2>No result found.</h2>
        </div>
      @endif
    </div>
  </div>
</div>
@endsection
