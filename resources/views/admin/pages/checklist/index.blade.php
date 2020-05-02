@extends('admin.layout.main')

@section('content')

<link rel="stylesheet" href="{{ asset('admin/css/pages/vehicle-check-list.css') }}">

<div class="nv-vcm-content">
  <h3 class="nv-header nv-font-bc">
    VEHICLE CHECK LIST MODULE
  </h3>
  <div class="container">
    <div class="nv-vcm-body">

      <div class="row">

        <div class="col-lg-7">
          <div class="input-group nv-input-group-custom mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text nv-font-c">
                CLIENT NAME</span>
            </div>
            <input type="text" class="form-control">
          </div>
        </div>

        <div class="col-lg-5">
          <div class="input-group nv-input-group-custom mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text nv-font-c">
                ORDER NO.</span>
            </div>
            <input type="text" class="form-control">
          </div>
        </div>

        <div class="col-lg-7">
          <div class="input-group nv-input-group-custom mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text nv-font-c">
                CLIENT CONTACT NO.</span>
            </div>
            <input type="text" class="form-control">
          </div>
        </div>

        <div class="col-lg-5">
          <div class="input-group nv-input-group-custom mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text nv-font-c">
                ORDER RECEIVED</span>
            </div>
            <input type="text" class="form-control">
          </div>
        </div>

        <div class="col-lg-4">
          <div class="input-group nv-input-group-custom mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text nv-font-c">
                ORDER DATE & TIME</span>
            </div>
            <input type="text" class="form-control">
          </div>
        </div>

        <div class="col-lg-4">
          <div class="input-group nv-input-group-custom mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text nv-font-c">
                DATE PROMISED</span>
            </div>
            <input type="text" class="form-control">
          </div>
        </div>

        <div class="col-lg-4">
          <div class="input-group nv-input-group-custom mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text nv-font-c">
                ACTUAL DATE</span>
            </div>
            <input type="text" class="form-control">
          </div>
        </div>

        <div class="col-lg-4">
          <div class="card nv-card-custom mb-2">
            <div class="card-header">

              OTHER NOTES
            </div>
            <style media="screen">
              textarea{
                border: none;
                resize: none;
              }
            </style>
            <div class="card-body" >
              <div class="form-group">
                <textarea placeholder="Enter additional notes"  id="exampleFormControlTextarea1" cols="40" rows="9"></textarea>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-8">
          <div class="input-group nv-input-group-custom mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text nv-font-c">
                TYPE</span>
            </div>
            <input type="text" class="form-control">
          </div>
          <div class="border">
              <img style="width:100%" src="{{ asset('images/checklist-car-img.png') }}">
          </div>
        </div>

        <div class="col-lg-6">
          <div class="input-group nv-input-group-custom mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text nv-font-c">
                ODOMETER READING</span>
            </div>
            <input type="text" class="form-control">
          </div>
        </div>

        <div class="col-lg-6">
          <div class="input-group nv-input-group-custom mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text nv-font-c">
                MAKE & MODEL</span>
            </div>
            <input type="text" class="form-control">
          </div>
        </div>

        <div class="col-lg-6">
          <div class="input-group nv-input-group-custom mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text nv-font-c">
                FUEL LEVEL</span>
            </div>
            <input type="text" class="form-control">
          </div>
        </div>

        <div class="col-lg-6">
          <div class="input-group nv-input-group-custom mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text nv-font-c">
                PERSONAL ITEMS</span>
            </div>
            <input type="text" class="form-control">
          </div>
        </div>

        <div class="col-lg-4 d-flex justify-content-center">
          <div class="nv-checkbox">
            <input class="nv-checkbox" type="checkbox" id="restoration">
            <label for="restoration">RESTORATION: &nbsp;&nbsp;&nbsp;<i class="far fa-square"></i></label>

          </div>

        </div>

        <div class="col-lg-4 d-flex justify-content-center">
          <div class="nv-checkbox">
            <input class="nv-checkbox" type="checkbox" id="workrepair">
            <label for="workrepair">BODY/WORK REPAIR: &nbsp;&nbsp;&nbsp;<i class="far fa-square"></i></label>
          </div>
        </div>

        <div class="col-lg-4 d-flex justify-content-center">
          <div class="nv-checkbox">
            <input class="nv-checkbox" type="checkbox" id="service">
            <label for="service">AUTO REPAIR/SERVICE: &nbsp;&nbsp;&nbsp;<i class="far fa-square"></i></label>
          </div>

        </div>


        <div class="col-lg-4 d-flex justify-content-start">
          <div class="nv-input-group-line">
            <input class="form-control nv-input-line" type="text" name="" value="">
            <label for="">WORK AUTHORIZED BY:</label>
          </div>
        </div>

        <div class="col-lg-4 d-flex justify-content-center">
          <div class="nv-input-group-line">
            <input class="form-control nv-input-line" type="text" name="" value="">
            <label for="">AUTHORIZED CLIENT SIGNATURE</label>
          </div>
        </div>

        <div class="col-lg-4 d-flex justify-content-end">
          <div class="nv-input-group-line">
            <input class="form-control nv-input-line" type="text" name="" value="">
            <label for="">DATE</label>
          </div>
        </div>

      </div>
    </div>
    <br>
    <button type="button"  class="btn btn-lg nv-btn-txt-dark nv-font-bc">
      <i class="fas fa-save"></i>&nbsp;SAVE
    </button>
    <button type="button"  class="btn btn-lg nv-btn-txt-dark nv-font-bc">
      <i class="fas fa-print"></i>&nbsp;PRINT
    </button>
    <br><br>
    <button type="button"  class="btn btn-lg nv-btn-txt-dark nv-font-bc">
      <i class="fas fa-save"></i>&nbsp;<i class="fas fa-print"></i>&nbsp;SAVE AND PRINT
    </button>
  </div>
</div>
<script src="{{ asset('admin\js\checklist.js') }}" ></script>
@endsection
