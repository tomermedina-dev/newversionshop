@extends('admin.layout.main')

@section('content')

<link rel="stylesheet" href="{{ asset('admin/css/pages/booked-services-summary.css') }}">
<style media="screen">
  textarea{
    border: none;
    resize: none;
  }
  .form-control:disabled, .form-control[readonly]  {
    background-color: whitesmoke;
    opacity: 1;
  }
  textarea:disabled{
    background-color: white;
  }
</style>
<script type="text/javascript">
  var checkboxItems = "{{$details->checkbox_items}}";
</script>
<div class="nv-vcm-content" id="nv-vcm-content-details">
  <h3 class="nv-header nv-font-bc">
    VEHICLE CHECK LIST DETAILS
  </h3>
  <h4>Checklist ID : #  {{  str_pad( $details->id, 10, '0', STR_PAD_LEFT)  }} </h4>
  <div class="container">
    <div class="nv-vcm-body">

      <div class="row">

        <div class="col-lg-7">
          <div class="input-group nv-input-group-custom mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text nv-font-c">
                CLIENT NAME</span>
            </div>
            <input disabled   type="text" class="form-control"  value="{{$details->client_name}}" >
          </div>
        </div>

        <div class="col-lg-5">
          <div class="input-group nv-input-group-custom mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text nv-font-c">
                ORDER NO.</span>
            </div>
            <input disabled  type="text" class="form-control" value="{{$details->order_number}}">
          </div>
        </div>

        <div class="col-lg-7">
          <div class="input-group nv-input-group-custom mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text nv-font-c">
                CLIENT CONTACT NO.</span>
            </div>
            <input disabled  type="text" class="form-control" value="{{$details->contact}}">
          </div>
        </div>

        <div class="col-lg-5">
          <div class="input-group nv-input-group-custom mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text nv-font-c">
                ORDER RECEIVED</span>
            </div>
            <input disabled   type="text" class="form-control" value="{{$details->order_received}}">
          </div>
        </div>

        <div class="col-lg-4">
          <div class="input-group nv-input-group-custom mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text nv-font-c">
                ORDER DATE & TIME</span>
            </div>
            <input disabled   type="text" class="form-control" value="{{$details->order_dt_time}}">
          </div>
        </div>

        <div class="col-lg-4">
          <div class="input-group nv-input-group-custom mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text nv-font-c">
                DATE PROMISED</span>
            </div>
            <input disabled  type="text" class="form-control" value="{{$details->order_dt_promised}}">
          </div>
        </div>

        <div class="col-lg-4">
          <div class="input-group nv-input-group-custom mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text nv-font-c">
                ACTUAL DATE</span>
            </div>
            <input disabled  type="text" class="form-control" value="{{$details->order_actual_dt}}">
          </div>
        </div>

        <div class="col-lg-4">
          <div class="card nv-card-custom mb-2">
            <div class="card-header">
              OTHER NOTES
            </div>

            <div class="card-body" >
              <div class="form-group">
                <textarea  disabled    id="exampleFormControlTextarea1" >
                  {{$details->notes}}
                </textarea>
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
            <input disabled value="{{$details->type}}"  type="text" class="form-control">
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
            <input disabled value="{{$details->odometer_reading}}" type="text" class="form-control">
          </div>
        </div>

        <div class="col-lg-6">
          <div class="input-group nv-input-group-custom mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text nv-font-c">
                MAKE & MODEL</span>
            </div>
            <input disabled value="{{$details->make_model}}"   type="text" class="form-control">
          </div>
        </div>

        <div class="col-lg-6">
          <div class="input-group nv-input-group-custom mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text nv-font-c">
                FUEL LEVEL</span>
            </div>
            <input disabled value="{{$details->fuel_level}}"  type="text" class="form-control">
          </div>
        </div>

        <div class="col-lg-6">
          <div class="input-group nv-input-group-custom mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text nv-font-c">
                PERSONAL ITEMS</span>
            </div>
            <input disabled  value="{{$details->personal_items}}"  type="text" class="form-control">
          </div>
        </div>

        <div class="col-lg-4 d-flex justify-content-center">
          <div class="nv-checkbox">
            <input disabled  class="nv-checkbox" type="checkbox" id="restoration">
            <label for="restoration">RESTORATION: &nbsp;&nbsp;&nbsp;<i class="far fa-square"></i></label>

          </div>

        </div>

        <div class="col-lg-4 d-flex justify-content-center">
          <div class="nv-checkbox">
            <input disabled  class="nv-checkbox" type="checkbox" id="workrepair">
            <label for="workrepair">BODY/WORK REPAIR: &nbsp;&nbsp;&nbsp;<i class="far fa-square"></i></label>
          </div>
        </div>

        <div class="col-lg-4 d-flex justify-content-center">
          <div class="nv-checkbox">
            <input disabled class="nv-checkbox" type="checkbox" id="service">
            <label for="service">AUTO REPAIR/SERVICE: &nbsp;&nbsp;&nbsp;<i class="far fa-square"></i></label>
          </div>

        </div>
      </div>
    </div>
    <br>
    <a href="{{ route('admin.checklist.details.print' , ['checklistId' => $details->id]) }}" type="button"  class="btn btn-lg nv-btn-txt-dark nv-font-bc">
      <i class="fas fa-print"></i>&nbsp;PRINT
    </a>

  </div>
</div>
<script src="{{ asset('admin\js\checklist-details.js') }}" ></script>
@endsection
