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
  <div class="nv-profile-content" id="nv-sw-history">
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
                    Warranty History
                  </div>
                </div>
                <div class="card-body p-3">
                  <table  v-cloak class="nv-table table table-striped " v-if="warrantyList.length > 0">
                    <thead>
                      <tr>
                        <td class="nv-font-bc" scope="col">Job Order ID</td>
                        <td class="nv-font-bc" scope="col">Model</td>
                        <td class="nv-font-bc" scope="col">Job Order Date</td>
                        <td class="nv-font-bc" scope="col">Warranty Start Date</td>
                        <td class="nv-font-bc" scope="col">Warranty End Date</td>
                        <td class="nv-font-bc" scope="col"></td>
                      </tr>
                    </thead>
                    <tbody id="table-warranty-list">
                      <tr v-cloak v-for="warranty in warrantyList">
                        <td class="nv-font-bc" scope="col"> @{{pad(warranty.job_order_id)}} </td>
                        <td class="nv-font-bc" scope="col">
                         @{{warranty.make_model}}
                        </td>
                        <td class="nv-font-bc" scope="col">@{{warranty.job_order_date}}</td>
                        <td class="nv-font-bc" scope="col">@{{warranty.warranty_start}}</td>
                        <td class="nv-font-bc" scope="col">@{{warranty.warranty_end}}</td>
                        <td class="nv-font-bc" scope="col" class="info">
                          <div class="dropdown">
                            <div class="nv-account dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fas fa-ellipsis-h"></i>
                            </div>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                              <a class="dropdown-item"  :href="'/user/services/jobs/details/' + pad(warranty.job_order_id)" target="_blank" >View Job Details</a>
                              <a style="display:none;" class="dropdown-item"  :href="'/admin/checklist/details/' + pad(warranty.checklist_id)" target="_blank" >View Checklist Details</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <div v-cloak v-else class="text-center">
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
<script src="{{ asset('front\js\services.warranty.js') }}" ></script>

@endsection
