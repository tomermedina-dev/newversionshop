@extends('admin.layout.main')

@section('content')

<link rel="stylesheet" href="{{ asset('admin/css/pages/booked-services-summary.css') }}">
<style media="screen">
  textarea{
    border: none;
    resize: none;
  }
</style>
<script type="text/javascript">
  var name = " ";
  var contact = " ";
  var serviceId = 000000000;
  var notes = "";
  var order_dt_time = getCurrentDate() ;
  var client_id =  "000000000" ;
  var client_type = 'Walk-In';
</script>
<div class="nv-vcm-content" id="nv-vcm-content">
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
            <input v-model="name" type="text" class="form-control"   >
          </div>
        </div>

        <div class="col-lg-5">
          <div class="input-group nv-input-group-custom mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text nv-font-c">
                ORDER NO.</span>
            </div>
            <input v-model="serviceId" type="text" class="form-control"  >
          </div>
        </div>

        <div class="col-lg-7">
          <div class="input-group nv-input-group-custom mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text nv-font-c">
                CLIENT CONTACT NO.</span>
            </div>
            <input v-model="contact" type="text" class="form-control">
          </div>
        </div>

        <div class="col-lg-5">
          <div class="input-group nv-input-group-custom mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text nv-font-c">
                ORDER RECEIVED</span>
            </div>
            <input v-model='order_received' type="text" class="form-control">
          </div>
        </div>

        <div class="col-lg-4">
          <div class="input-group nv-input-group-custom mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text nv-font-c">
                ORDER DATE & TIME</span>
            </div>
            <input v-model="order_dt_time" id="order_dt_time" type="text" class="form-control">
          </div>
        </div>

        <div class="col-lg-4">
          <div class="input-group nv-input-group-custom mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text nv-font-c">
                DATE PROMISED</span>
            </div>
            <input v-model="date_promised" id="date_promised" type="text" class="form-control">
          </div>
        </div>

        <div class="col-lg-4">
          <div class="input-group nv-input-group-custom mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text nv-font-c">
                ACTUAL DATE</span>
            </div>
            <input v-model="actual_date" type="text" class="form-control">
          </div>
        </div>

        <div class="col-lg-4">
          <div class="card nv-card-custom mb-2">
            <div class="card-header">
              OTHER NOTES
            </div>

            <div class="card-body" >
              <div class="form-group">
                <textarea v-model="notes" placeholder="Enter additional notes"  id="exampleFormControlTextarea1" cols="50" rows="11"></textarea>
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
            <input v-model="type" type="text" class="form-control">
          </div>
          <div class="border">
              <img style="width:100%" src="{{ asset('images/checklist-car-img.png') }}">
          </div>
          <br>
        </div>

        <div class="col-lg-6">
          <div class="input-group nv-input-group-custom mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text nv-font-c">
                ODOMETER READING</span>
            </div>
            <input v-model="odometer_reading" type="text" class="form-control">
          </div>
        </div>

        <div class="col-lg-6">
          <div class="input-group nv-input-group-custom mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text nv-font-c">
                MAKE & MODEL</span>
            </div>
            <input v-model="make_model" type="text" class="form-control">
          </div>
        </div>

        <div class="col-lg-6">
          <div class="input-group nv-input-group-custom mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text nv-font-c">
                FUEL LEVEL</span>
            </div>
            <input v-model="fuel_level" type="text" class="form-control">
          </div>
        </div>

        <div class="col-lg-6">
          <div class="input-group nv-input-group-custom mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text nv-font-c">
                PERSONAL ITEMS</span>
            </div>
            <input v-model="personal_items" type="text" class="form-control">
          </div>
        </div>

        <div class="col-lg-4 d-flex justify-content-center">
          <div class="nv-checkbox">
            <input v-on:click="addCheckboxItem('restoration')" class="nv-checkbox" type="checkbox" id="restoration">
            <label for="restoration">RESTORATION: &nbsp;&nbsp;&nbsp;<i class="far fa-square"></i></label>

          </div>

        </div>

        <div class="col-lg-4 d-flex justify-content-center">
          <div class="nv-checkbox">
            <input v-on:click="addCheckboxItem('workrepair')" class="nv-checkbox" type="checkbox" id="workrepair">
            <label for="workrepair">BODY/WORK REPAIR: &nbsp;&nbsp;&nbsp;<i class="far fa-square"></i></label>
          </div>
        </div>

        <div class="col-lg-4 d-flex justify-content-center">
          <div class="nv-checkbox">
            <input v-on:click="addCheckboxItem('service')" class="nv-checkbox" type="checkbox" id="service">
            <label for="service">AUTO REPAIR/SERVICE: &nbsp;&nbsp;&nbsp;<i class="far fa-square"></i></label>
          </div>

        </div>

        <div style="display:none;">
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
    </div>
    <br>
    <button v-on:click="submitChecklist" type="button"  class="btn btn-lg nv-btn-txt-dark nv-font-bc">
      <i class="fas fa-save"></i>&nbsp;SAVE
    </button>


  </div>
</div>
<script src="{{ asset('admin\js\checklist.js') }}" ></script>
<script type="text/javascript">
  $("#order_dt_time").val(getCurrentDate());
  $("#date_promised").val(getCurrentDate());
</script>
@endsection
