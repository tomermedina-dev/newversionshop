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
                    Rejected Services
                  </div>
                </div>
                <div class="card-body">
                  <div class="m-2">
                    @if(json_encode($servicesDetails) != '[]')
                    <table class="nv-table table table-striped "   >
                      <thead>
                        <tr>
                          <td class="nv-font-bc" scope="col">Unit</td>
                          <td class="nv-font-bc" scope="col">Address</td>
                          <td class="nv-font-bc" scope="col">Notes</td>
                          <td class="nv-font-bc" scope="col">Service Date</td>
                          <td class="nv-font-bc" scope="col">Service Time</td>
                          <td class="nv-font-bc" scope="col">Reject Reason</td>
                        </tr>
                      </thead>

                      @foreach($servicesDetails as $service)
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
                                {{$service->reject_reason}}
                              </td>
                          </tr>
                        </tbody>
                    @endforeach
                  </table>
                  @else
                    <div  class="text-center">
                      <h1>No result</h1>
                    </div>
                  @endif
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
