@extends('front.layout.main')

@section('content')
<title>New Version Shop - Profile</title>
<div class="container">

<link rel="stylesheet" href="{{ asset('front/css/pages/user-profile.css') }}">
  <div class="nv-profile-content">
    <div class="row">

      <div class="col-lg-3 ">
        @include('front.includes.account-sidenav')
      </div>

      <div class="col-lg-9">
        <div class="nv-manage-account">
          <div class="nv-header nv-font-bc">
            Manage My Account
          </div>
          <div class="row">
            <div class="col-lg-6">
              @include('front.user.profile.profile-details')
            </div>
            <div class="col-lg-6">
              @include('front.user.profile.profile-address')
            </div>
            <div class="col-12">
                @include('front.user.profile.profile-units')
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<script src="{{ asset('front\js\customs.js') }}" charset="utf-8"></script>
<script src="{{ asset('front\js\profile.js') }}" ></script>
@endsection
