@extends('front.layout.main')

@section('content')
<title>New Version Shop - Job Details</title>
<div class="container">
<link rel="stylesheet" href="{{ asset('front/css/pages/orders.css') }}">
<style media="screen">
  .nv-header-order-details p{
    color: black !important;
    margin: 0;
  } ,
  .nv-job-details h5 {
    color: black !important;
  }
</style>
<script src="{{ asset('front\js\customs.js') }}" charset="utf-8"></script>
<script type="text/javascript">
  var joID = "{{$joDetails->job_order_id}}";
  var totals = numberWithCommas("{{$joTotals->totals}}") ;
  var clientId = "{{$joDetails->client_id}}";
  if(clientId != userId){
    window.location.href = '/user/services/jobs';
  }
</script>
  <div class="nv-profile-content" id="nv-jo-list-details">
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
                    Job Details
                  </div>
                </div>
                <div class="card-body p-3">
                  <div class="row ">
                    <div class="col-lg-6 col-md-6">
                      <h3 class="nv-header nv-font-bc">
                        JOB ORDERS DETAILS
                      </h3>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="nv-job-details">
                        <h4>Job Order ID : {{str_pad( $joDetails->job_order_id , 10, '0', STR_PAD_LEFT)  }}</h4>
                        <h4 v-cloak>Total Amount : ₱ @{{totalAmount}} </h4>
                        <h4>Status :
                          @if($jobAssignment->start != null)
                            @if($joDetails->is_invoiced == '1')
                              <span>Completed</span>
                            @elseif($joDetails->is_released == '1')
                              <span>Released</span>
                            @else
                              <span>In-Progress</span>
                            @endif
                          @else
                            <span>Not Started</span>
                          @endif
                        </h4>
                      </div>
                    </div>
                    <div class="col-sm-6">

                      <div v-if="warrantyDetails.length != 0" v-cloak>
                        <h4>Warranty Start Date :   @{{warrantyDetails.warranty_start}} </h4>
                        <h4>Warranty End Date :  @{{warrantyDetails.warranty_end}} </h4>
                      </div>
                    </div>
                  </div>

                  <div class="nv-table-container mb-3">
                    <table class="nv-table table table-striped ">
                      <thead>
                        <tr>
                          <td class="nv-font-bc" scope="col">Job Order Item ID</td>
                          <td class="nv-font-bc" scope="col">Service / Labor</td>
                          <td class="nv-font-bc" scope="col">Service Description</td>
                          <td class="nv-font-bc" scope="col">Service Fee</td>
                          <td class="nv-font-bc" scope="col">Product / Part</td>
                          <td class="nv-font-bc" scope="col">Product Description</td>
                          <td class="nv-font-bc" scope="col">Quantity</td>
                          <td class="nv-font-bc" scope="col">Unit Price</td>
                        </tr>
                      </thead>
                      <tbody id="table-jo-history-list">
                        <tr v-for="jo in jobOrderList">
                          <td class="nv-font-bc" scope="col"> @{{pad(jo.id)}} </td>
                          <td class="nv-font-bc" scope="col">@{{jo.service_name}}</td>
                          <td class="nv-font-bc" scope="col">@{{jo.service_description}}</td>
                          <td class="nv-font-bc" scope="col">@{{jo.service_fee}}</td>
                          <td class="nv-font-bc" scope="col">@{{jo.product_name}}</td>
                          <td class="nv-font-bc" scope="col">@{{jo.product_description}}</td>
                          <td class="nv-font-bc" scope="col">@{{jo.quantity}}</td>
                          <td class="nv-font-bc"  scope="col">@{{jo.unit_price}}</td>
                        </tr>

                      </tbody>
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

<script src="{{ asset('front\js\services.job.details.js') }}" ></script>

@endsection
