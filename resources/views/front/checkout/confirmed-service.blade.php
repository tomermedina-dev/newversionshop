@extends('front.layout.main')

@section('content')
<div class="container">
<link rel="stylesheet" href="{{ asset('front/css/pages/confirmed.css') }}">
<title>New Version Shop - Thanks for ordering!</title>
<div class="container">
  <div class="nv-confirmed-content">
    <h1 class="nv-font-bc">ORDER CONFIRMATION</h1>
    <div class="nv-order-message">
      <p>Hello <span class="nv-font-bc">{{$serviceDetails->first_name}}  {{$serviceDetails->last_name}} </span> , </p>
      <p>Thank you for booking a service at New Version Shop. Your service number is <span class="nv-font-bc">  {{str_pad( $serviceDetails->id , 10, '0', STR_PAD_LEFT)  }}</span>.</p>
    </div>
    <br>

    <div class="nv-shipping-details">
      <p>Please see your service confirmation details below.</p>
      <div class="nv-service-details">
        <h2 class="nv-font-bc">{{$serviceDetails->service_title}}</h2>
        <p>{{$serviceDetails->description}}</p>
      </div>
      <br>
      <p> <span class="nv-font-bc">Email Address : </span> {{$serviceDetails->email}} </p>
      <p> <span class="nv-font-bc">Contact Number : </span> {{$serviceDetails->contact}}  </p>
      <p><span class="nv-font-bc">Address : </span>  {{$serviceDetails->notes}} </p>
      <p><span class="nv-font-bc">Notes / Other details : </span>  {{$serviceDetails->notes}} </p>

      <p><span class="nv-font-bc">Model : </span>  {{$serviceDetails->model}} </p>
      <br>
      <p><span class="nv-font-bc">Appointment Date : </span>  {{$serviceDetails->service_date_orig}} </p>
      <p><span class="nv-font-bc">TIme : </span>  {{$serviceDetails->service_time_orig}} </p>
    </div>
    <br>

    <div class="">
      <h2 class="nv-font-bc" v-cloak>Service Fee : ₱ {{$serviceDetails->price}}</h2>
      <a href="/products">Continue Shopping</a>
    </div>
  </div>
</div>
</div>
<script src="{{ asset('front\js\customs.js') }}" charset="utf-8"></script>
@endsection
