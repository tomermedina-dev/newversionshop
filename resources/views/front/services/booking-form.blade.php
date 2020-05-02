@extends('front.layout.main')

@section('content')
<title>New Version Shop - Services</title>
<link rel="stylesheet" href="{{ asset('front/css/pages/booking-form.css') }}">
<script type="text/javascript">
  var serviceId = "{{$serviceDetails->id}}";
</script>
<div class="nv-services-content" id="nv-booking-form">
  <div id="nv-carousel" class="mb-3" >
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="{{ asset('images/service.jpg')}}" >
          <div class="corousel-details justify-content-between  text-center ">
            <h3 class="nv-featured-title">We have covered you</h3>
            <p class="text-white nv-featured-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean at est maximus, volutpat augue fermentum, pretium massa. Quisque eu dignissim nibh. Morbi velit erat, ultrices vitae dolor a, sollicitudin interdum nisl. Praesent posuere et quam nec blandit. Morbi id lorem ut sapien facilisis pretium interdum quis urna. Ut placerat urna mi, sed sollicitudin ante semper non. Sed ultricies justo dui, non iaculis elit rutrum id. Sed non pretium libero. Aenean urna purus, bibendum vitae fringilla ac, fermentum vel ex. Etiam nibh felis, eleifend ac turpis at, aliquam venenatis mauris. Aliquam posuere ex et eros aliquet venenatis. Fusce rutrum molestie tortor eget maximus. In nec orci sit amet enim vehicula porta et et turpis</p>
          </div>
        </div>
      </div>
    </div>
  <div class="container">

    <div class="text-center">
      <h1 class="nv-header nv-font-bc">
        BOOK A SERVICE
      </h1>
    </div>
    <div class="container">
      <h3 class="nv-header nv-font-bc">
        {{$serviceDetails->name}}
      </h3>
      <p class="nv-service-details">
        {{$serviceDetails->description}}
      </p>
      <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
            <label>First Name</label>
            <input v-model="first_name" type="text" id="first_name" placeholder="First Name" class="form-control nv-input-custom">
          </div>
          <div class="form-group">
              <label>Email</label>
            <input v-model="email" type="text" id="email" placeholder="Email" class="form-control nv-input-custom">
          </div>

        </div>

        <div class="col-lg-6">

          <div class="form-group">
            <label>Last Name</label>
            <input v-model="last_name"  type="text" id="last_name" placeholder="Last Name" class="form-control nv-input-custom">
          </div>
          <div class="form-group">
              <label>Contact No.</label>
            <input v-model="contact" type="text" id="contact" placeholder="Contact No." class="form-control nv-input-custom">
          </div>
        </div>

      </div>
      <div style="padding:0 10px 0 10px;">
        <div class="form-group">
          <label>Address</label>
          <input v-model="address" type="text" id="address" placeholder="Address" class="form-control nv-input-custom">
        </div>
        <div class="form-group">
          <label>Select Unit</label>
          <table class="table" style="background-color:whitesmoke">
            <thead>
              <tr>
                <td></td>
                <td class="nv-font-bc" scope="col">Brand</td>
                <td class="nv-font-bc" scope="col">Model</td>
                <td class="nv-font-bc" scope="col">VIN</td>
                <td class="nv-font-bc" scope="col">Plate Number</td>
              </tr>
            </thead>
            <tbody>
              <tr v-cloak v-for="unit in units">
                <td>
                  <div class="custom-control custom-radio">
                    <input v-on:click="selectUnit(unit.id)"  name="customRadio" type="radio" class="custom-control-input" :id="unit.id">
                    <label class="custom-control-label" :for="unit.id"></label>
                  </div>
                </td>
                <td>@{{unit.car_brand}}</td>
                <td>@{{unit.model}}</td>
                <td>@{{unit.vin}}</td>
                <td>@{{unit.plate_number}}</td>

              </tr>
            </tbody>
          </table>

        </div>
      </div>

      <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
            <label>Service Date</label>
            <input data-date-format="MM/DD/YYYY" v-model="date" class="nv-input-custom form-control datepicker" id="service_date" type="text" >
          </div>
        </div>
        <div class="col-lg-6">
          <div class="form-group">
            <label>Time</label>
            <select  v-model="time"   class="nv-input-custom form-control"  >
              <option value="08:00  AM">08:00  AM</option>
              <option value="09:00  AM">09:00  AM</option>
              <option value="10:00 AM">10:00 AM</option>
              <option value="11:00 AM">11:00 AM</option>
              <option value="01:00  PM">01:00  PM</option>
              <option value="02:00  PM">02:00  PM</option>
              <option value="03:00  PM">03:00  PM</option>
              <option value="04:00  PM">04:00  PM</option>
            </select>
          </div>
        </div>
      </div>

      <div style="padding:0 10px 0 10px;">
        <div class="form-group">
          <label>Notes</label>
          <input v-model="notes" type="text" id="notes" placeholder="Notes" class="form-control nv-input-custom">
        </div>

        <div class="justify-content-between  text-center ">
          <a v-on:click="submitBooking" class="nv-schedule-btn btn btn-lg btn-warning nv-font-bc w-50">
                Schedule Now
          </a>
        </div>

      </div>
    </div>
  </div>
</div>

<script src="{{ asset('front\js\customs.js') }}" charset="utf-8"></script>
<script src="{{ asset('front\js\booking-form.js') }}" ></script>
@endsection
