@extends('admin.layout.main')

@section('content')

<link rel="stylesheet"  href="{{ asset('admin/css/pages/dashboard.css') }}">
<div class="container">

  <div class="nv-dashboard-content">
    <h1 class="nv-header nv-font-bc " style="display:none;">
    Dashboard
    </h1>

    <div class="row">
      <div class="col-sm-12 col-lg-6 nv-items">
        <div class="card">
          <div class="card-header">
            <i class="fas fa-clipboard-list"></i>
            <div class="nv-text nv-font-bc">ORDERS OF THE DAY</div>
          </div>
          <div class="card-body">
            <div class="nv-text">
              {{$orderDay->count}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-lg-6 nv-items">
        <div class="card">
          <div class="card-header">
          <i class="fas fa-wrench"></i>
            <div class="nv-text nv-font-bc">BOOKED SERVICES OF THE DAY</div>
          </div>
          <div class="card-body">
            <div class="nv-text">
              {{$bookedDay->count}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-lg-6 nv-items">
        <div class="card">
          <div class="card-header">
            <i class="fas fa-spinner"></i>
            <div class="nv-text nv-font-bc">IN PROGRESS SERVICES</div>
          </div>
          <div class="card-body">
            <div class="nv-text">
              {{$inProgress->count}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-lg-6 nv-items">
        <div class="card">
          <div class="card-header">
            <i class="fas fa-car-side"></i>
            <div class="nv-text nv-font-bc">TO RELEASE CARS</div>
          </div>
          <div class="card-body">
            <div class="nv-text">
              {{$releaseCars->count}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-lg-6 nv-items">
        <div class="card">
          <div class="card-header">
              <i class="fas fa-tasks"></i>
            <div class="nv-text nv-font-bc">COMPLETED SERVICE / JOBS</div>
          </div>
          <div class="card-body">
            <div class="nv-text">
              {{$completed->count}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-lg-6 nv-items">
        <div class="card">
          <div class="card-header">
              <i class="fas fa-tools"></i>
            <div class="nv-text nv-font-bc">AVAILABLE PRODUCTS</div>
          </div>
          <div class="card-body">
            <div class="nv-text">
              {{$products->count}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-lg-12 nv-items" id="nv-home-admin">
        <div class="card">
          <div class="card-header">
              <i class="fas fa-tools"></i>
            <div class="nv-text nv-font-bc">Job Order Total Sales &emsp;</div>

              <div class="w-25">

                <div class="form-row">
                  <div class="col">
                    <select class="custom-select float-left" v-model="month">
                      <option  value="0" >January</option>
                      <option  value="1" >February</option>
                      <option  value="2" >March</option>
                      <option  value="3" >April</option>
                      <option  value="4" >May</option>
                      <option  value="5" >June</option>
                      <option  value="6" >July</option>
                      <option  value="7" >August</option>
                      <option  value="8" >September</option>
                      <option  value="9" >October</option>
                      <option  value="10" >November</option>
                      <option  value="11" >December</option>
                    </select>
                  </div>
                  <div class="col">
                    <input v-model="year" type="text" class="form-control nv-input-custom float-left"   placeholder="Year">
                  </div>
                  <div class="col">
                    <button  v-on:click="loadJoTotalSales" type="button"  class="btn btn-sm nv-btn-txt-mustard nv-font-bc mt-1">
                      View
                    </button>
                  </div>


                </div>
              </div>

          </div>
          <div class="card-body">
            <div class="nv-text" id='jo_total_sales'>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
  <script src="{{ asset('admin\js\home.js') }}" ></script>
@endsection
