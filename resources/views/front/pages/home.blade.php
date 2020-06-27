@extends('front.layout.main')

@section('content')
<title>New Version</title>
<link rel="stylesheet" href="{{ asset('front/css/pages/home.css') }}">
<link rel="stylesheet" href="{{ asset('front/css/pages/extra.css') }}">


<div class="nv-carousel" style="z-index: -1">
      <div class="nv-prev-slide" onclick="prevSlide()">
        <img src="assets/icons/left-chevron.svg"/>
      </div>
      <div class="nv-next-slide" onclick="nextSlide()">
        <img src="assets/icons/right-chevron.svg" />
      </div>
      <div class="nv-carousel-nav">
        <div class="nv-carousel-nav-link active"></div>
        <div class="nv-carousel-nav-link"></div>
        <div class="nv-carousel-nav-link"></div>
      </div>
      <div class="nv-carousel-items">
        <div class="nv-carousel-item active" data-src="{{ asset('images/home/thumbnail1.jpg')}}">
          <div class="nv-carousel-description hide-on-small-devices">
            <h3 class="title">Ford Mustang Shelby GT350</h3>
            <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidi-dunt ut labore et dolore magna aliqua.</p>
            <p class="text">Ut enim ad minim veniams, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div>
        </div>
        <div class="nv-carousel-item" data-src="{{ asset('images/home/thumbnail1.jpg')}}">
          <div class="nv-carousel-description hide-on-small-devices">
            <h3 class="title">Hello World</h3>
            <p class="text">More custom text here just for testing purposes.</p>
            <p class="text">There isn't really much else to do here.</p>
          </div>
        </div>
        <div class="nv-carousel-item" data-src="{{ asset('images/home/thumbnail1.jpg')}}">
          <div class="nv-carousel-description hide-on-small-devices">
            <h3 class="title">Custom Carousel</h3>
            <p class="text">Completely built from scratch using Pure JS</p>
            <p class="text">I think it works pretty well!</p>
          </div>
        </div>

      </div>
    </div>

    <!-- <div class="nv-section">
      <div class="nv-inline-cards feature">
        <div class="nv-card">
          <div class="nv-image-container">
            <svg class="bi bi-box" width="1em" height="1em" viewBox="0 0 16 16" fill="black" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5 8 5.961 14.154 3.5 8.186 1.113zM15 4.239l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"></path>
            </svg>
          </div>
          <h3>FEATURED PRODUCTS</h3>
        </div>
        <div class="nv-card">
          <div class="nv-image-container">
            <svg class="bi bi-truck" width="1em" height="1em" viewBox="0 0 16 16" fill="black" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5v7h-1v-7a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .5.5v1A1.5 1.5 0 0 1 0 10.5v-7zM4.5 11h6v1h-6v-1z"/>
              <path fill-rule="evenodd" d="M11 5h2.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5h-1v-1h1a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4.5h-1V5zm-8 8a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 1a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
              <path fill-rule="evenodd" d="M12 13a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 1a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
            </svg>
          </div>
          <h3>EXPLORE VEHICLES</h3>
        </div>
        <div class="nv-card">
          <div class="nv-image-container">
            <svg class="bi bi-info-square" width="1em" height="1em" viewBox="0 0 16 16" fill="black" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
              <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
              <circle cx="8" cy="4.5" r="1"/>
            </svg>
          </div>
          <h3>LIST OF FEATURES</h3>
        </div>
      </div>
      <div class="nv-divider"></div>
    </div> -->

    <div class="nv-section message">
      <div class="nv-text-content" style="flex: 1; text-align: center; padding: 32px;">
        <h1 style="font-size: 3rem; margin-top: 0;">A Message From NV Shop</h1>
        <p style="font-size: 2rem;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ul-lamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <p style="font-size: 2rem;">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. EXcepeteur sint ocaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <button class="nv-button filled">LEARN MORE</button>
      </div>
      <div class="nv-image-container">
        <img src="{{ asset('images/home/thumbnail1.jpg')}}"class="show-on-small-devices" />
      </div>
    </div>

    <div class="nv-divider"></div>

    <div class="nv-section" style="display:none;">
      <div class="nv-header">
        <div>
          <h1>Featured Products</h1>
        </div>
        <div class="float: right">
          <a href="#">See All >></a>
        </div>
      </div>
      <div class="nv-products-list">
        <div style="display: flex; justify-content: center; align-items: center;">
          <img src="assets/icons/chevron-left-dark.svg" style="width: 32px; height: 32px"/>
        </div>
        <div class="nv-product-group active">
          <div class="nv-product-item">
            <div class="nv-product-header">
              <h1>SSR III</h1>
              <p>Wheels 2020</p>
            </div>
            <div class="nv-products-image-container">
              <img src="assets/wheels.jpg" style="width: 25%;"/>
            </div>
            <div class="nv-product-footer">
              <p>Brand 1</p>
              <h3><b>P 12,999</b> starting</h3>
            </div>
          </div>
          <div class="nv-product-item">
            <div class="nv-product-header">
              <h1>SSR III</h1>
              <p>Wheels 2020</p>
            </div>
            <div class="nv-products-image-container">
              <img src="assets/wheels.jpg" style="width: 25%;"/>
            </div>
            <div class="nv-product-footer">
              <p>Brand 1</p>
              <h3><b>P 12,999</b> starting</h3>
            </div>
          </div>
          <div class="nv-product-item">
            <div class="nv-product-header">
              <h1>SSR III</h1>
              <p>Wheels 2020</p>
            </div>
            <div class="nv-products-image-container">
              <img src="assets/wheels.jpg" style="width: 25%;"/>
            </div>
            <div class="nv-product-footer">
              <p>Brand 1</p>
              <h3><b>P 12,999</b> starting</h3>
            </div>
          </div>
          <div class="nv-product-item">
            <div class="nv-product-header">
              <h1>SSR III</h1>
              <p>Wheels 2020</p>
            </div>
            <div class="nv-products-image-container">
              <img src="assets/wheels.jpg" style="width: 25%;"/>
            </div>
            <div class="nv-product-footer">
              <p>Brand 1</p>
              <h3><b>P 12,999</b> starting</h3>
            </div>
          </div>
        </div>
        <div class="nv-product-group">
          <div class="nv-product-item">
            <div class="nv-product-header">
              <h1>SSR III</h1>
              <p>Wheels 2020</p>
            </div>
            <div class="nv-products-image-container">
              <img src="assets/wheels.jpg" style="width: 25%;"/>
            </div>
            <div class="nv-product-footer">
              <p>Brand 1</p>
              <h3><b>P 12,999</b> starting</h3>
            </div>
          </div>
          <div class="nv-product-item">
            <div class="nv-product-header">
              <h1>SSR III</h1>
              <p>Wheels 2020</p>
            </div>
            <div class="nv-products-image-container">
              <img src="assets/wheels.jpg" style="width: 25%;"/>
            </div>
            <div class="nv-product-footer">
              <p>Brand 1</p>
              <h3><b>P 12,999</b> starting</h3>
            </div>
          </div>
          <div class="nv-product-item">
            <div class="nv-product-header">
              <h1>SSR III</h1>
              <p>Wheels 2020</p>
            </div>
            <div class="nv-products-image-container">
              <img src="assets/wheels.jpg" style="width: 25%;"/>
            </div>
            <div class="nv-product-footer">
              <p>Brand 1</p>
              <h3><b>P 12,999</b> starting</h3>
            </div>
          </div>
          <div class="nv-product-item">
            <div class="nv-product-header">
              <h1>SSR III</h1>
              <p>Wheels 2020</p>
            </div>
            <div class="nv-products-image-container">
              <img src="assets/wheels.jpg" style="width: 25%;"/>
            </div>
            <div class="nv-product-footer">
              <p>Brand 1</p>
              <h3><b>P 12,999</b> starting</h3>
            </div>
          </div>
        </div>
        <div style="display: flex; justify-content: center; align-items: center;">
          <img src="assets/icons/chevron-right-dark.svg" style="width: 32px; height: 32px"/>
        </div>
      </div>
    </div>

    <div class="nv-banner" style="display:none;">
      <h1 class="title">Explore All Vehicles</h1>
      <a href="#">See All >></a>
    </div>

    <div class="nv-section" style="display:none;">
      <div class="nv-products-nav">
        <div class="nv-products-nav-item active"><div><a href="#">CARS & MINIVAN</a></div></div>
        <div class="nv-products-nav-item"><div><a href="#">TRUCKS</a></div></div>
        <div class="nv-products-nav-item"><div><a href="#">CROSSOVERS & SUVS</a></div></div>
        <div class="nv-products-nav-item"><div><a href="#">HYBRIDS & FUEL CELL</a></div></div>
        <div class="nv-products-nav-item"><div><a href="#">UPCOMING VEHICLES</a></div></div>
      </div>
      <div class="nv-products-list cars">
        <div style="display: flex; justify-content: center; align-items: center;">
          <img src="assets/icons/chevron-left-dark.svg" style="width: 32px; height: 32px"/>
        </div>
        <div class="nv-product-item">
          <div class="nv-product-header">
            <h1>Toyota</h1>
            <p style="font-size: 3rem">COROLLA 2020</p>
          </div>
          <div class="nv-products-image-container" style="background: url('assets/car.png') no-repeat; background-size: contain; background-position: center; height: 150px;" ></div>
          <div class="nv-product-footer">
            <p>Brand 1</p>
            <h3 style="text-align: left"><b>P 850,000</b> starting</h3>
            <h3 style="text-align: left"><b>31/40</b> est MPG</h3>
          </div>
        </div>
        <div class="nv-product-item">
          <div class="nv-product-header">
            <h1>Toyota</h1>
            <p style="font-size: 3rem">COROLLA 2020</p>
          </div>
          <div class="nv-products-image-container" style="background: url('assets/car.png') no-repeat; background-size: contain; background-position: center; height: 150px;" ></div>
          <div class="nv-product-footer">
            <p>Brand 1</p>
            <h3 style="text-align: left"><b>P 850,000</b> starting</h3>
            <h3 style="text-align: left"><b>31/40</b> est MPG</h3>
          </div>
        </div>
        <div class="nv-product-item">
          <div class="nv-product-header">
            <h1>Toyota</h1>
            <p style="font-size: 3rem">COROLLA 2020</p>
          </div>
          <div class="nv-products-image-container" style="background: url('assets/car.png') no-repeat; background-size: contain; background-position: center; height: 150px;" ></div>
          <div class="nv-product-footer">
            <p>Brand 1</p>
            <h3 style="text-align: left"><b>P 850,000</b> starting</h3>
            <h3 style="text-align: left"><b>31/40</b> est MPG</h3>
          </div>
        </div>
        <div class="nv-product-item">
          <div class="nv-product-header">
            <h1>Toyota</h1>
            <p style="font-size: 3rem">COROLLA 2020</p>
          </div>
          <div class="nv-products-image-container" style="background: url('assets/car.png') no-repeat; background-size: contain; background-position: center; height: 150px;" ></div>
          <div class="nv-product-footer">
            <p>Brand 1</p>
            <h3 style="text-align: left"><b>P 850,000</b> starting</h3>
            <h3 style="text-align: left"><b>31/40</b> est MPG</h3>
          </div>
        </div>
        <div style="display: flex; justify-content: center; align-items: center;">
          <img src="assets/icons/chevron-right-dark.svg" style="width: 32px; height: 32px"/>
        </div>
      </div>
    </div>

    <div class="nv-section services" style="display: flex;">
      <div style="flex: 1; background-color: #fbc531; padding: 32px;">
        <h3 style="margin: 0; font-weight: lighter; font-size: 2rem">List Of</h3>
        <h1 style="margin: 0; font-weight: bold; font-size: 4rem">SERVICES</h1>
        <div style="display: flex; justify-content: center;">
          <ul style="font-size: 2.5rem; font-weight: bold;">
            <li>REPAIR</li>
            <li>CUSTOMIZE</li>
            <li>REPAINT</li>
            <li>OTHERS</li>
          </ul>
        </div>
      </div>
      <div style="flex: 3; background: url('/images/home/thumbnail2.jpg') no-repeat; background-position: center;">
        <!-- <div class="nv-arrow-right">
          <img src="assets/icons/arrow-filler-custom.svg" />
        </div> -->
        <div class="nv-description">
          <h3 class="text-white">*Upping the cars on</h3>
          <h1 class="text-white">ALL OUT PERFORMANCES</h1>
        </div>
      </div>
    </div>

    <div class="nv-section">
      <div class="nv-inline-cards tools">
        <div class="nv-card">
          <div class="nv-image-container">
            <svg class="bi bi-box" width="1em" height="1em" viewBox="0 0 16 16" fill="black" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5 8 5.961 14.154 3.5 8.186 1.113zM15 4.239l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"></path>
            </svg>
          </div>
          <div class="nv-card-content">
            <h1 style="font-size: 3rem">Products</h1>
            <p style="font-size: 2rem;" class="subheader">Browse available products for your vehicle.</p>
          </div>
          <div class="nv-card-footer">
            <a href="/products">Browse Now <span style="text-align: right;">></span></a>
          </div>
        </div>
        <div class="nv-card">
          <div class="nv-image-container">
            <svg class="bi bi-truck" width="1em" height="1em" viewBox="0 0 16 16" fill="black" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5v7h-1v-7a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .5.5v1A1.5 1.5 0 0 1 0 10.5v-7zM4.5 11h6v1h-6v-1z"/>
              <path fill-rule="evenodd" d="M11 5h2.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5h-1v-1h1a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4.5h-1V5zm-8 8a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 1a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
              <path fill-rule="evenodd" d="M12 13a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 1a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
            </svg>
          </div>
          <div class="nv-card-content">
            <h1 style="font-size: 3rem">Cars</h1>
            <p style="font-size: 2rem;" class="subheader">Browse Car Gallery</p>
          </div>
          <div class="nv-card-footer">
            <a href="/gallery">View Gallery<span style="text-align: right;">></span></a>
          </div>
        </div>
        <div class="nv-card">
          <div class="nv-image-container">
            <svg class="bi bi-info-square" width="1em" height="1em" viewBox="0 0 16 16" fill="black" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
              <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
              <circle cx="8" cy="4.5" r="1"/>
            </svg>
          </div>
          <div class="nv-card-content">
            <h1 style="font-size: 3rem">Schedule a service now</h1>
            <p style="font-size: 2rem;" class="subheader"  >Browse the available services.</p>
          </div>
          <div class="nv-card-footer">
            <a href="/services">Book Now <span style="text-align: right;">></span></a>
          </div>
        </div>
      </div>
      <div class="nv-divider"></div>
    </div>

<script type="text/javascript">
  $("#nav-home").addClass("active");
</script>
@endsection
