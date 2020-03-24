@extends('admin.layout.main')

@section('content')

<link rel="stylesheet" href="{{ asset('admin/css/pages/vehicle-check-list.css') }}">

<div class="nv-vcm-content">
      <h3 class="nv-header nv-font-bc">
        VEHICLE CHECK LIST MODULE
      </h3>
      <div class="nv-vcm-body">

        <div class="row">

          <div class="col-lg-7">
            <div class="input-group nv-input-group-custom mb-2">
              <div class="input-group-prepend">
                <span class="input-group-text nv-font-c">
                  <i class="fas fa-box-open"></i>&nbsp;&nbsp;CLIENT NAME</span>
              </div>
              <input type="text" class="form-control">
            </div>
          </div>

          <div class="col-lg-5">
            <div class="input-group nv-input-group-custom mb-2">
              <div class="input-group-prepend">
                <span class="input-group-text nv-font-c">
                  <i class="fas fa-box-open"></i>&nbsp;&nbsp;ORDER NO.</span>
              </div>
              <input type="text" class="form-control">
            </div>
          </div>

          <div class="col-lg-7">
            <div class="input-group nv-input-group-custom mb-2">
              <div class="input-group-prepend">
                <span class="input-group-text nv-font-c">
                  <i class="fas fa-box-open"></i>&nbsp;&nbsp;CLIENT CONTACT NO.</span>
              </div>
              <input type="text" class="form-control">
            </div>
          </div>

          <div class="col-lg-5">
            <div class="input-group nv-input-group-custom mb-2">
              <div class="input-group-prepend">
                <span class="input-group-text nv-font-c">
                  <i class="fas fa-box-open"></i>&nbsp;&nbsp;ORDER RECEIVED</span>
              </div>
              <input type="text" class="form-control">
            </div>
          </div>

          <div class="col-lg-4">
            <div class="input-group nv-input-group-custom mb-2">
              <div class="input-group-prepend">
                <span class="input-group-text nv-font-c">
                  <i class="fas fa-box-open"></i>&nbsp;&nbsp;ORDER DATE & TIME</span>
              </div>
              <input type="text" class="form-control">
            </div>
          </div>

          <div class="col-lg-4">
            <div class="input-group nv-input-group-custom mb-2">
              <div class="input-group-prepend">
                <span class="input-group-text nv-font-c">
                  <i class="fas fa-box-open"></i>&nbsp;&nbsp;DATE PROMISED</span>
              </div>
              <input type="text" class="form-control">
            </div>
          </div>

          <div class="col-lg-4">
            <div class="input-group nv-input-group-custom mb-2">
              <div class="input-group-prepend">
                <span class="input-group-text nv-font-c">
                  <i class="fas fa-box-open"></i>&nbsp;&nbsp;ACTUAL DATE</span>
              </div>
              <input type="text" class="form-control">
            </div>
          </div>

          <div class="col-lg-4">
            <div class="card nv-card-custom mb-2">
              <div class="card-header">
                <i class="fas fa-box-open"></i>&nbsp;&nbsp;
                OTHER NOTES
              </div>
              <div class="card-body">
                  <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excep</div>
              </div>
            </div>
          </div>

          <div class="col-lg-8">
            <div class="input-group nv-input-group-custom mb-2">
              <div class="input-group-prepend">
                <span class="input-group-text nv-font-c">
                  <i class="fas fa-box-open"></i>&nbsp;&nbsp;TYPE</span>
              </div>
              <input type="text" class="form-control">
            </div>
          </div>

          <div class="col-lg-6">
            <div class="input-group nv-input-group-custom mb-2">
              <div class="input-group-prepend">
                <span class="input-group-text nv-font-c">
                  <i class="fas fa-box-open"></i>&nbsp;&nbsp;ODOMETER READING</span>
              </div>
              <input type="text" class="form-control">
            </div>
          </div>

          <div class="col-lg-6">
            <div class="input-group nv-input-group-custom mb-2">
              <div class="input-group-prepend">
                <span class="input-group-text nv-font-c">
                  <i class="fas fa-box-open"></i>&nbsp;&nbsp;MAKE & MODEL</span>
              </div>
              <input type="text" class="form-control">
            </div>
          </div>

          <div class="col-lg-6">
            <div class="input-group nv-input-group-custom mb-2">
              <div class="input-group-prepend">
                <span class="input-group-text nv-font-c">
                  <i class="fas fa-box-open"></i>&nbsp;&nbsp;FUEL LEVEL</span>
              </div>
              <input type="text" class="form-control">
            </div>
          </div>

          <div class="col-lg-6">
            <div class="input-group nv-input-group-custom mb-2">
              <div class="input-group-prepend">
                <span class="input-group-text nv-font-c">
                  <i class="fas fa-box-open"></i>&nbsp;&nbsp;PERSONAL ITEMS</span>
              </div>
              <input type="text" class="form-control">
            </div>
          </div>

        </div>
      </div>
</div>

@endsection
