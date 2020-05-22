@extends('front.layout.main')

@section('content')
<title>New Version Shop - Recent Orders</title>
<div class="container">
<link rel="stylesheet" href="{{ asset('front/css/pages/orders.css') }}">
<style media="screen">
  .nv-header-order-details p{
    color: black !important;
    margin: 0;
  }
</style>
  <div class="nv-profile-content" id="nv-services-list">
    <div class="row">

      <div class="col-lg-3 ">
        @include('front.includes.account-sidenav')
      </div>


      <div class="col-lg-9">
        <div class="nv-my-orders">
          <div class="row">
            <div class="col-12">
              <div class="card nv-units nv-default-box-shadow">
                <div class="card-header d-flex justify-content-between">
                  <div class="nv-label">
                    Services History
                  </div>
                </div>
                <div class="card-body">
                  @foreach($servicesDetails as $service)
                    <div class="container mt-2">
                      <div class="bg-white rounded p-2">
                        <div class="row nv-header-order-details">
                          <div class="col-lg-6">
                            <div class="align-self-center mt-5 mb-2">
                              <img class="rounded mx-auto d-block"  width="250px" height="250px" src="{{ asset('uploads/images/services/'.$service->service_image) }}">
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <p><b>Unit</b> :  {{$service->car_brand}} - {{$service->model}} - {{$service->plate_number}}</p>
                            <p><b>Address</b> : {{$service->address}}</p>
                            <p><b>Contact</b> : {{$service->contact}}</p>
                            <p><b>Notes</b> : {{$service->notes}}</p>
                            <p><b>Service Date</b> : {{$service->service_date_new}}</p>
                            <p><b>Time</b> : {{$service->service_time_new}}</p>
                            <p v-cloak v-if="getDateDiff('{{{$service->service_date_new}}}') != 0"><b>Remaining Days before the service : </b>  @{{getDateDiff('{{{$service->service_date_new}}}')}}</p>
                            @php
                              $bookingsSchedule = App\Http\Controllers\Front\ServicesHistoryController::getRequestBookingScheds($service->id);
                            @endphp
                            <br>
                            @foreach ($bookingsSchedule as $schedule)
                              <div class="container shadow-lg p-3 mb-5 bg-white rounded">
                                @if($schedule->is_approve == 'X')
                                  <h4 class=" nv-font-bc">Your schedule change request has been rejected. </h4>
                                @elseif($schedule->is_approve == '1')
                                  <h4 class=" nv-font-bc">Your schedule change request has been approved. </h4>

                                @else
                                  <h4 class=" nv-font-bc">  Pending Schedule change request </h4>
                                @endif
                                @if($schedule->is_approve == 'X')
                                  <p><b>Service Date</b> : {{$schedule->booking_date}}</p>
                                  <p><b>Time</b> : {{$schedule->booking_time}}</p>
                                  <p><b>Reason</b> : {{$schedule->reason}}</p>
                                @else
                                  <p><b>New Service Date</b> : {{$schedule->booking_date}}</p>
                                  <p><b>New Time</b> : {{$schedule->booking_time}}</p>
                                  <p><b>Reason</b> : {{$schedule->reason}}</p>
                                @endif

                              </div>
                            @endforeach
                            <br>

                            @if(json_encode($bookingsSchedule) == '[]')
                            <button v-cloak v-if="getDateDiff('{{{$service->service_date_new}}}') >= 2"  v-on:click="changeSchedule('{{$service->id}}')"    type="button" class="float-left btn nv-btn-txt-white nv-font-bc" >
                              Request re-schedule
                            </button>
                            @endif
                          </div>
                        </div>
                        <h2><b>Service :  </b> {{$service->service_title}}</h2s>
                        <h4><b>Service ID : </b> @{{pad({{{$service->id}}})}}  </h4>
                        <h4><b>Fee :  </b> ₱  {{$service->price}}</h4>

                        <h4 style="font-size:1em"><b>Description :  </b> {{$service->description}}</h4>
                      </div>
                    </div>
                    <div class="nv-line-divider m-2 bg-dark"></div>

                  @endforeach
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</div>
<script src="{{ asset('front\js\customs.js') }}" charset="utf-8"></script>
<script src="{{ asset('front\js\services.history.js') }}" ></script>

@endsection
