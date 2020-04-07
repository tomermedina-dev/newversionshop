@extends('front.layout.main')

@section('content')
<div class="container">
<style media="screen">
  .g-recaptcha > div { margin: 0 auto;}
      .hidden_recaptcha { visibility: hidden;}
</style>
    <div class="d-flex justify-content-center" id="nv-register">
      <div class="container " style="padding:5%;">
        <div class="row ">
          <div class="nv-container-left  container col-sm-5 shadow-lg p-3 mb-5 nv-bg-dark" style="padding:2%;">
              @include('front.user.details')
              <br>
            <div class="d-flex justify-content-center">
              <a href="/login" class="btn nv-btn-mustard" name="button">Log In</a>
            </div>
          </div>
          <div class="nv-container-right col-sm-7 shadow-lg p-3 mb-5 white-bg" style="padding:2%;">
            <h1>Registration Form</h1>
            <div class="container">
              <h4 class="text-mustard">PERSONAL DETAILS</h4>
              <nv-component-register></nv-component-register>

            </div>

          </div>
        </div>
      </div>
    </div>
    <script src='https://www.google.com/recaptcha/api.js'></script>
<script src="{{ asset('front/js/register.js') }}" ></script>
</div>
@endsection
