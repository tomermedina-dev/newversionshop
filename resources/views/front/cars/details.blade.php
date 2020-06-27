@extends('front.layout.main')
@section('content')
<title>New Version Shop - Car Gallery</title>
<link rel="stylesheet" href="{{ asset('front/css/pages/product-details.css') }}">
<div class="container">
  <div class="nv-details-content" id="nv-product-details"  >

  <div class="nv-product-details row" >
    <div class="col-lg-5">
      <div class="nv-gallery ">

        @if(count($carImages) > 0)
          <div class="nv-selected nv-default-box-shadow mb-2" id="nv-selected-img-product"></div>
        @else
          <div class="nv-selected nv-default-box-shadow mb-2" id="nv-selected-img-product">
            <img   class="border"   src="{{ asset('images/no-image-available.png') }}">
          </div>
        @endif
        <div class="nv-lists d-flex align-items-center">
          <div class="nv-controls">
            <i class="fas fa-angle-left"></i>
          </div>
          <div class="nv-indicators row">
          @if(count($carImages) > 0)
            @foreach($carImages as $img)
              <div  class="col-3">
                <div class="nv-thumbnails">
                  <div class="nv-img-container nv-default-box-shadow">
                    <img onclick="setSelectedImage('{{$img->image_name}}')" src="{{ asset('uploads/images/cars/'.$img->image_name)}}"  alt="">
                  </div>

                </div>
              </div>
            @endforeach
           @endif
          </div>
          <div class="nv-controls">
            <i class="fas fa-angle-right"></i>
          </div>
        </div>
      </div>



    </div>
    <div class="col-lg-7">
      <div class="nv-labels">
        <div class="nv-details-header d-flex justify-content-between align-items-start">
          <div class="nv-name nv-font-bc">
            {{$carDetails->car_model}}
          </div>
        </div>



        <div class="nv-line"></div>
        <div class="nv-product-description">
          <div class="nv-header nv-font-bc">
            CAR DESCRIPTION:
          </div>
          <div class="nv-description">
              {{$carDetails->description}}
          </div>
          <div class="nv-line"></div>
          <div class="container">
            {!! $carDetails->details !!}
          </div>
        </div>
        <br>

      </div>

    </div>
  </div>

  <div class="nv-specification">
    <!-- <div class="nv-header nv-font-bc">
      Specification of  @{{productDetails.name}}
    </div> -->
    <div class="row">
      <div class="col-lg-3">
        <div class="nv-label">
          Car Brand
        </div>
        <div class="nv-value">
          {{$carDetails->car_manufacturer}}
        </div>
      </div>
      <div class="col-lg-3">
        <div class="nv-label">
          Car Model
        </div>
        <div class="nv-value">
            {{$carDetails->car_model}}
        </div>
      </div>

    </div>
  </div>
  <!-- <div class="nv-line"></div> -->
  </div>
</div>
<style media="screen">
  .nv-footer {
    margin-bottom: 0 !important;
  }
</style>
<script type="text/javascript">
  var initialImage = '{{isset($carImages[0]->image_name) ? $carImages[0]->image_name : ''}}';
  if(initialImage){
      setSelectedImage(initialImage);
  }

  function setSelectedImage(img){
    console.log(img);
      $("#nv-selected-img-product").empty();
      $("#nv-selected-img-product").append(`<img src="`+getCarImagesPath(img)+`" alt="">`);
  }
  function getCarImagesPath(img){
    return window.location.origin + "/uploads/images/cars/"+img;
  }
</script>
@endsection
