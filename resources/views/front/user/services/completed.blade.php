@extends('front.layout.main')

@section('content')
<title>New Version Shop - Job Monitoring</title>
<div class="container">
<link rel="stylesheet" href="{{ asset('front/css/pages/orders.css') }}">
<style media="screen">
  .nv-header-order-details p{
    color: black !important;
    margin: 0;
  }
</style>
  <div class="nv-profile-content" id="nv-job-monitoring-list">
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
                    Completed Services
                  </div>
                </div>
                <div class="card-body p-3">
                  <table class="nv-table table table-striped "  v-if="jobList.length > 0">
                    <thead>
                      <tr>
                        <td class="nv-font-bc" scope="col">Job ID</td>
                        <td class="nv-font-bc" scope="col">Make & Model</td>
                        <td class="nv-font-bc" scope="col">Floor Slot</td>
                        <td class="nv-font-bc" scope="col">Status</td>
                        <td></td>
                      </tr>
                    </thead>
                    <tbody id="table-jo-monitoring-list "  >
                      <tr v-for="jo in jobList" v-cloak>
                        <td class="nv-font-bc" scope="col">
                         @{{jo.job_order_id}}
                        </td>
                        <td class="nv-font-bc" scope="col">
                         @{{jo.make_model}}
                        </td>
                        <td class="nv-font-bc" scope="col">
                         @{{jo.slot_name}}
                        </td>
                        <td class="nv-font-bc" scope="col">
                          <span v-if="jo.is_invoiced == 0 && jo.is_released == 0">
                            For Invoicing
                          </span>
                          <span v-if="jo.is_invoiced == 1 && jo.is_released == 0">
                            For Releasing
                          </span>
                        </td>
                        <td class="nv-font-bc" scope="col" class="info">
                          <div class="dropdown">
                            <div class="nv-account dropdown-toggle" type="button" id="dropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fas fa-ellipsis-h"></i>
                            </div>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                              <a class="dropdown-item"  :href="'/user/services/jobs/details/' + jo.job_order_id" target="_blank" >View Job Details</a>
                              <a style="display:none;" class="dropdown-item"  :href="'/user/services/checklist/details/' + pad(jo.checklist_id)" target="_blank" >View Checklist Details</a>
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

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</div>
<script src="{{ asset('front\js\customs.js') }}" charset="utf-8"></script>
<script src="{{ asset('front\js\services.completed.js') }}" ></script>

@endsection
