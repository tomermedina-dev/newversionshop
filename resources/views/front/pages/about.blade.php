@extends('front.layout.main')

@section('content')
<title>New Version - About Us</title>
<link rel="stylesheet" href="{{ asset('front/css/pages/about.css') }}">
<link rel="stylesheet" href="{{ asset('front/css/pages/extra.css') }}">

<div class="nv-section about">
      <div class="nv-title-container text-">
        <h1 class="nv-title">
          <span class="text-white">ABOUT US</span>
          <div class="nv-divider"></div>
        </h1>
      </div>
      <div class="nv-content-text">
        <h1 class="nv-header text-white">WE ARE DREAM BUILDERS</h1>
        <p class="nv-text text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nos-trud exercitation ullamco labois nisi ut aliquip ex ea commodo consequat.</p>
      </div>
      <!-- <div class="nv-chevron">
        <img  src="{{ asset('images/chevron-down.svg')}}" height="128px" />
      </div> -->
    </div>

    <div class="nv-section location">
      <div class="nv-title-container black">
        <h1 class="nv-title condensed bold">
          <span>LOCATE US</span>
          <div class="nv-divider"></div>
        </h1>
      </div>
      <div class="nv-inline-cards">
        <div class="nv-card">
          <h2 class="nv-card-title">NV Shop, Malolos Bulacan</h2>
          <p class="nv-card-subtitle">064 Bukid Street, Bagna Malolos Bulacan</p>

          <p>(+63) 912-435-6754</p>
          <p>(02) 791-7654</p>
        </div>
        <div class="nv-card">
          <h2 class="nv-card-title">NV Shop, Malolos Bulacan</h2>
          <p class="nv-card-subtitle">064 Bukid Street, Bagna Malolos Bulacan</p>

          <p>(+63) 912-435-6754</p>
          <p>(02) 791-7654</p>
        </div>
        <div class="nv-card">
          <h2 class="nv-card-title">NV Shop, Malolos Bulacan</h2>
          <p class="nv-card-subtitle">064 Bukid Street, Bagna Malolos Bulacan</p>

          <p>(+63) 912-435-6754</p>
          <p>(02) 791-7654</p>
        </div>
      </div>
    </div>

    <div class="nv-section vision">
      <!-- <div class="nv-arrow-down">
        <img src="{{ asset('images/chevron-down.svg')}}" />
      </div> -->
      <div class="nv-content-text">
        <h1 class="nv-heade text-white">We couldn't wait for the future ⁠—⁠ so we're building it now.</h1>
        <p class="nv-text text-white" style="margin: 16px 0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nos-trud exercitation ullamco labois nisi ut aliquip ex ea commodo consequat.</p>
        <p class="nv-text text-white" style="margin: 16px 0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nos-trud exercitation ullamco labois nisi ut aliquip ex ea commodo consequat.</p>
        <button class="nv-button outline">SEE MORE</button>
      </div>
    </div>

    <div class="nv-section mission">
      <div class="nv-content-text">
        <h1 class="nv-header">What drives us forward</h1>
        <p class="nv-text">Understand the philosophy behind everything we do, explore our history and get to know the people driving us into the future.</p>
      </div>
    </div>

<script type="text/javascript">
  $("#nav-about").addClass("active");
</script>
@endsection
