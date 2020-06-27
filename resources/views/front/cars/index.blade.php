@extends('front.layout.main')

@section('content')
<style media="screen">
  a:hover{
    text-decoration: none;;
  }
</style>
<link rel="stylesheet" href="{{ asset('front/css/pages/car-gallery.css') }}">
<title>New Version Shop - Car Gallery</title>

<div class="container">
  <div class="nv-car-gallery-content"  >
    <div class="nv-carousel-container">
      @include('front.cars.featured')
    </div>
    <div class="nv-divider d-flex justify-content-between align-items-center">
      <div class="nv-label nv-font-bc">
        CAR GALLERY
      </div>
      <!-- <div class="nv-filter d-flex align-items-center">
        Filter&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-filter"></i>
      </div> -->
    </div>
    <div class="nv-list-container" id="nv-car-gallery-content">

        <div class="row">
          <!-- Start loop -->

          <div v-for="car in carList" class="col-lg-6" style="width: 18rem;">
              <a :href=" '/gallery/car/' +  car.id ">
            <div class="m-2 shadow-lg  bg-light rounded">
              <div class="card">
                <div class="card-body">
                  <div class="nv-brand nv-font-bc">@{{car.car_manufacturer}}</div>
                  <div class="nv-model nv-font-bc">@{{car.car_model}}</div>
                </div>
                <div class="nv-img-container">
                  <img   class="border"  v-if='car.car_image == null' src="{{ asset('images/no-image-available.png') }}">
                  <img v-else :src='getCarImagesPath(car.car_image)' alt="Car Image">

                </div>
                <div class="card-body" style="background-color:#2f3640;">
                  <!-- <div class="nv-price-group d-flex">
                    <div class="nv-price nv-font-bc white-text">
                      ₱ @{{car.price}}
                    </div>&nbsp;&nbsp;&nbsp;
                    <div class="nv-label">
                      starting
                    </div>
                  </div> -->
                  <div class="nv-est-group d-flex">
                    <!-- <div class="nv-est nv-font-bc">
                      31/40
                    </div>&nbsp;&nbsp;&nbsp; -->
                    <div class="nv-label" style="color:white !important;">
                      @{{car.description}}
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </a>
          </div>
          <!-- End loop -->
        </div>

    </div>
  </div>
</div>
<script src="{{ asset('front\js\car.js') }}" ></script>
<script type="text/javascript">
  $("#nav-cars").addClass("active");
</script>
<script type="text/javascript">
  var featuredType = 'cars';
</script>
<script src="{{ asset('front\js\featured.js') }}" ></script>
@endsection
