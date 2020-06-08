@extends('front.layout.main')

@section('content')
<title>New Version Shop - Recent Orders</title>
<div class="p-5">
<link rel="stylesheet" href="{{ asset('front/css/pages/orders.css') }}">
<style media="screen">
  .nv-header-order-details p{
    color: black !important;
    margin: 0;
  }
  .nv-scheds p {
    margin: 0;
  }
</style>
  <div class="nv-profile-content" id="nv-services-list">
    <div class="row">

      <div class="col-lg-2 ">
        @include('front.includes.account-sidenav')
      </div>


      <div class="col-lg-10">
        <div class="nv-my-orders">
          <div class="row">
            <div class="col-12">
              <div class="card nv-units nv-default-box-shadow">
                <div class="card-header d-flex justify-content-between">
                  <div class="nv-label">
                    Pending Services
                  </div>
                </div>
                <div class="card-body">
                  <div class="m-2">
                    <table class="nv-table table table-striped "   >
                      <thead>
                        <tr>
                          <td class="nv-font-bc" scope="col">Unit</td>
                          <td class="nv-font-bc" scope="col">Address</td>
                          <td class="nv-font-bc" scope="col">Notes</td>
                          <td class="nv-font-bc" scope="col">Service Date</td>
                          <td class="nv-font-bc" scope="col">Service Time</td>
                          <td class="nv-font-bc" scope="col">Remaining Days before the service</td>
                          <td class="nv-font-bc" scope="col"></td>

                        </tr>
                      </thead>

                      @foreach($servicesDetails as $service)
                        @php
                          $bookingsSchedule = App\Http\Controllers\Front\ServicesHistoryController::getRequestBookingScheds($service->id);
                        @endphp
                        <tbody id="table-jo-monitoring-list "   >
                          <tr >
                              <td class="nv-font-bc" scope="col">
                                {{$service->car_brand}} - {{$service->model}} - {{$service->plate_number}}
                              </td>
                              <td class="nv-font-bc" scope="col">
                                {{$service->address}}
                              </td>
                              <td class="nv-font-bc" scope="col">
                                {{$service->notes}}
                              </td>
                              <td class="nv-font-bc" scope="col">
                                {{$service->service_date_new}}
                              </td>
                              <td class="nv-font-bc" scope="col">
                                {{$service->service_time_new}}
                              </td>
                              <td class="nv-font-bc" scope="col">
                                 @{{getDateDiff('{{{$service->service_date_new}}}')}}
                              </td>
                              <td class="nv-font-bc" scope="col">
                                @if(json_encode($bookingsSchedule) == '[]')
                                <button v-cloak v-if="getDateDiff('{{{$service->service_date_new}}}') >= 2"  v-on:click="changeSchedule('{{$service->id}}')"    type="button" class="float-left btn nv-btn-txt-white nv-font-bc" >
                                  Request re-schedule
                                </button>
                                @endif
                              </td>
                          </tr>
                          @foreach ($bookingsSchedule as $schedule)
                          <tr style="background-color:transparent !important;">
                            <td colspan="7">
                              <div class="shadow p-3 bg-white rounded text-left nv-scheds">
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
                            </td>
                          </tr>

                          @endforeach
                      </tbody>
                    @endforeach

                  </table>
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

</div>
<script src="{{ asset('front\js\customs.js') }}" charset="utf-8"></script>
<script src="{{ asset('front\js\services.history.js') }}" ></script>

@endsection
