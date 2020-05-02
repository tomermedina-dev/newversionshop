@extends('front.layout.main')

@section('content')

<link rel="stylesheet" href="{{ asset('front/css/pages/car-gallery.css') }}">
<title>New Version Shop - Car Gallery</title>
<div class="container">
  <div class="nv-car-gallery-content">
    <div class="nv-carousel-container">
      <div id="nv-carousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators d-flex justify-content-center">
          <div data-target="#nv-carousel" data-slide-to="0" class="active">
            <i class="fas fa-circle"></i>
          </div>
          <div data-target="#nv-carousel" data-slide-to="1">
            <i class="fas fa-circle"></i>
          </div>
          <div data-target="#nv-carousel" data-slide-to="2">
            <i class="fas fa-circle"></i>
          </div>
          <!-- <li data-target="#nv-carousel" data-slide-to="0" class="active"><i class="fas fa-circle"></i></li>
          <li data-target="#nv-carousel" data-slide-to="1"><i class="fas fa-circle"></i></li>
          <li data-target="#nv-carousel" data-slide-to="2"><i class="fas fa-circle"></i></li> -->
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="{{ asset('images/logo_transpa.png')}}" >
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('images/logo_transpa.png')}}" >
            <div class="row nv-product-info">
              <div class="col-lg-8">
                <div class="nv-name nv-font-bc">
                  Product 2
                </div>
                <div class="nv-description nv-font">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </div>
              </div>
              <div class="col-lg-4 nv-price nv-price nv-font-bc">
                P 250.00
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('images/logo_transpa.png')}}" >
            <div class="row nv-product-info">
              <div class="col-lg-8">
                <div class="nv-name nv-font-bc">
                  Product 2
                </div>
                <div class="nv-description nv-font">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </div>
              </div>
              <div class="col-lg-4 nv-price nv-price nv-font-bc">
                P 250.00
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#nv-carousel" role="button" data-slide="prev">
          <i class="fas fa-angle-left"></i>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#nv-carousel" role="button" data-slide="next">
          <i class="fas fa-angle-right"></i>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
    <div class="nv-divider d-flex justify-content-between align-items-center">
      <div class="nv-label nv-font-bc">
        CAR GALLERY
      </div>
      <div class="nv-filter d-flex align-items-center">
        Filter&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-filter"></i>
      </div>
    </div>
    <div class="nv-list-container">
      <div class="row">
        <div class="nv-inv-border-top"></div>
        <div class="nv-inv-border-left"></div>
        <div class="nv-inv-border-bottom"></div>
        <div class="nv-inv-border-right"></div>
        <div class="col-12 card col-lg-4 col-md-6 col-sm-6" style="width: 18rem;">
          <div class="card-body">
            <div class="nv-brand nv-font-bc">Toyota</div>
            <div class="nv-model nv-font-bc">COROLLA 2020</div>
          </div>
          <div class="nv-img-container">
            <img src="{{ asset('images/logo_transpa.png')}}" alt="Card image cap">
          </div>
          <div class="card-body">
            <div class="nv-price-group d-flex">
              <div class="nv-price nv-font-bc">
                P850,000
              </div>&nbsp;&nbsp;&nbsp;
              <div class="nv-label">
                starting
              </div>
            </div>
            <div class="nv-est-group d-flex">
              <div class="nv-est nv-font-bc">
                31/40
              </div>&nbsp;&nbsp;&nbsp;
              <div class="nv-label">
                est MPG
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 card col-lg-4 col-md-6 col-sm-6" style="width: 18rem;">
          <div class="card-body">
            <div class="nv-brand nv-font-bc">Toyota</div>
            <div class="nv-model nv-font-bc">COROLLA 2020</div>
          </div>
          <div class="nv-img-container">
            <img src="{{ asset('images/logo_transpa.png')}}" alt="Card image cap">
          </div>
          <div class="card-body">
            <div class="nv-price-group d-flex">
              <div class="nv-price nv-font-bc">
                P850,000
              </div>&nbsp;&nbsp;&nbsp;
              <div class="nv-label">
                starting
              </div>
            </div>
            <div class="nv-est-group d-flex">
              <div class="nv-est nv-font-bc">
                31/40
              </div>&nbsp;&nbsp;&nbsp;
              <div class="nv-label">
                est MPG
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 card col-lg-4 col-md-6 col-sm-6" style="width: 18rem;">
          <div class="card-body">
            <div class="nv-brand nv-font-bc">Toyota</div>
            <div class="nv-model nv-font-bc">COROLLA 2020</div>
          </div>
          <div class="nv-img-container">
            <img src="{{ asset('images/logo_transpa.png')}}" alt="Card image cap">
          </div>
          <div class="card-body">
            <div class="nv-price-group d-flex">
              <div class="nv-price nv-font-bc">
                P850,000
              </div>&nbsp;&nbsp;&nbsp;
              <div class="nv-label">
                starting
              </div>
            </div>
            <div class="nv-est-group d-flex">
              <div class="nv-est nv-font-bc">
                31/40
              </div>&nbsp;&nbsp;&nbsp;
              <div class="nv-label">
                est MPG
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 card col-lg-4 col-md-6 col-sm-6" style="width: 18rem;">
          <div class="card-body">
            <div class="nv-brand nv-font-bc">Toyota</div>
            <div class="nv-model nv-font-bc">COROLLA 2020</div>
          </div>
          <div class="nv-img-container">
            <img src="{{ asset('images/logo_transpa.png')}}" alt="Card image cap">
          </div>
          <div class="card-body">
            <div class="nv-price-group d-flex">
              <div class="nv-price nv-font-bc">
                P850,000
              </div>&nbsp;&nbsp;&nbsp;
              <div class="nv-label">
                starting
              </div>
            </div>
            <div class="nv-est-group d-flex">
              <div class="nv-est nv-font-bc">
                31/40
              </div>&nbsp;&nbsp;&nbsp;
              <div class="nv-label">
                est MPG
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 card col-lg-4 col-md-6 col-sm-6" style="width: 18rem;">
          <div class="card-body">
            <div class="nv-brand nv-font-bc">Toyota</div>
            <div class="nv-model nv-font-bc">COROLLA 2020</div>
          </div>
          <div class="nv-img-container">
            <img src="{{ asset('images/logo_transpa.png')}}" alt="Card image cap">
          </div>
          <div class="card-body">
            <div class="nv-price-group d-flex">
              <div class="nv-price nv-font-bc">
                P850,000
              </div>&nbsp;&nbsp;&nbsp;
              <div class="nv-label">
                starting
              </div>
            </div>
            <div class="nv-est-group d-flex">
              <div class="nv-est nv-font-bc">
                31/40
              </div>&nbsp;&nbsp;&nbsp;
              <div class="nv-label">
                est MPG
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 card col-lg-4 col-md-6 col-sm-6" style="width: 18rem;">
          <div class="card-body">
            <div class="nv-brand nv-font-bc">Toyota</div>
            <div class="nv-model nv-font-bc">COROLLA 2020</div>
          </div>
          <div class="nv-img-container">
            <img src="{{ asset('images/logo_transpa.png')}}" alt="Card image cap">
          </div>
          <div class="card-body">
            <div class="nv-price-group d-flex">
              <div class="nv-price nv-font-bc">
                P850,000
              </div>&nbsp;&nbsp;&nbsp;
              <div class="nv-label">
                starting
              </div>
            </div>
            <div class="nv-est-group d-flex">
              <div class="nv-est nv-font-bc">
                31/40
              </div>&nbsp;&nbsp;&nbsp;
              <div class="nv-label">
                est MPG
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
