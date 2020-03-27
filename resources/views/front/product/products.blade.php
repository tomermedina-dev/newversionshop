@extends('front.layout.main')

@section('content')

<link rel="stylesheet" href="{{ asset('front/css/pages/products.css') }}">

<div class="nv-products-content">

  <div class="row">
    <div class="col-lg-3">
      <div class="list-group nv-category-list mb-3 nv-default-box-shadow">
        <a href="#" class="list-group-item list-group-item-action nv-header nv-items"><i class="fas fa-box-open"></i>&nbsp;&nbsp;PRODUCTS</a>

        <a href="#" class="list-group-item list-group-item-action nv-items d-flex justify-content-between align-items-center">
          Category 1 <i class="fas fa-angle-right"></i>
        </a>

        <a href="#" class="list-group-item list-group-item-action nv-items d-flex justify-content-between align-items-center">
          Category 2 <i class="fas fa-angle-right"></i>
        </a>

        <a href="#" class="list-group-item list-group-item-action nv-items d-flex justify-content-between align-items-center">
          Category 3 <i class="fas fa-angle-right"></i>
        </a>

        <a href="#" class="list-group-item list-group-item-action nv-items d-flex justify-content-between align-items-center">
          Category 4 <i class="fas fa-angle-right"></i>
        </a>

        <a href="#" class="list-group-item list-group-item-action nv-items d-flex justify-content-between align-items-center">
          Category 5 <i class="fas fa-angle-right"></i>
        </a>

        <a href="#" class="list-group-item list-group-item-action nv-items d-flex justify-content-between align-items-center">
          Category 6 <i class="fas fa-angle-right"></i>
        </a>

        <a href="#" class="list-group-item list-group-item-action nv-items d-flex justify-content-between align-items-center">
          Category 7 <i class="fas fa-angle-right"></i>
        </a>



      </div>
    </div>

    <div class="col-lg-9">
      <div id="nv-carousel" class="carousel slide mb-3 nv-default-box-shadow" data-ride="carousel">
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
            <div class="row nv-product-info">
              <div class="col-lg-8">
                <div class="nv-name nv-font-bc">
                  Product 1
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
          <!-- <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('images/logo_transpa.png')}}" alt="First slide">
          </div> -->
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
      <div class="nv-search-filter-group d-flex mb-3 ">
        <div class="nv-search d-flex justify-content-between align-items-center nv-default-box-shadow">
          <div class="nv-results-label">
            Results (i.e 3 out of 20 found)
          </div>
          <div class="input-group">
            <input type="text" class="form-control nv-input-default nv-font-c" placeholder="Search By..." aria-label="Search By..." >
            <div class="input-group-append d-flex justify-content-center">
              <button class="btn" type="button" name="button"><i class="fas fa-search"aria-hidden="true"></i></button>
              <!-- <span class="input-group-text nv-input-default">
                <i class="fas fa-search"aria-hidden="true"></i>
              </span> -->
            </div>
          </div>
        </div>
        <div class="nv-filter d-flex justify-content-center align-items-center nv-default-box-shadow">
          <button type="btn" name="button"><i class="fas fa-filter"></i></button>
        </div>
      </div>

      <div class="nv-product-grid row">
        <div class="col-lg-4">
          <div class="card nv-product-card nv-default-box-shadow">
            <div class="nv-img-container">
              <div class="nv-product-actions d-flex justify-content-center align-items-center">
                <a href="#"><i class="fas fa-cart-plus"></i></a>
                <div class="nv-heart-checkbox">
                  <input type="checkbox" id="favorite1">
                  <label for="favorite1"><i class="far fa-heart"></i></label>
                </div>

              </div>
              <img src="" >
            </div>
            <div class="card-body d-flex justify-content-between align-items-center">
              <div class="">
                <div class="nv-name nv-font-bc">
                  Product 1
                </div>
                <div class="nv-category">
                  Category 1
                </div>
              </div>
              <div class="nv-price nv-font-bc">
                P 250.00
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="card nv-product-card nv-default-box-shadow">
            <div class="nv-img-container">
              <div class="nv-product-actions d-flex justify-content-center align-items-center">
                <a href="#"><i class="fas fa-cart-plus"></i></a>
                <div class="nv-heart-checkbox">
                  <input type="checkbox" id="favorite2">
                  <label for="favorite2"><i class="far fa-heart"></i></label>
                </div>

              </div>
              <img src="" >
            </div>
            <div class="card-body d-flex justify-content-between align-items-center">
              <div class="">
                <div class="nv-name nv-font-bc">
                  Product 1
                </div>
                <div class="nv-category">
                  Category 1
                </div>
              </div>
              <div class="nv-price nv-font-bc">
                P 250.00
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="card nv-product-card nv-default-box-shadow">
            <div class="nv-img-container">
              <div class="nv-product-actions d-flex justify-content-center align-items-center">
                <a href="#"><i class="fas fa-cart-plus"></i></a>
                <div class="nv-heart-checkbox">
                  <input type="checkbox" id="favorite3">
                  <label for="favorite3"><i class="far fa-heart"></i></label>
                </div>

              </div>
              <img src="" >
            </div>
            <div class="card-body d-flex justify-content-between align-items-center">
              <div class="">
                <div class="nv-name nv-font-bc">
                  Product 1
                </div>
                <div class="nv-category">
                  Category 1
                </div>
              </div>
              <div class="nv-price nv-font-bc">
                P 250.00
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="card nv-product-card nv-default-box-shadow">
            <div class="nv-img-container">
              <div class="nv-product-actions d-flex justify-content-center align-items-center">
                <a href="#"><i class="fas fa-cart-plus"></i></a>
                <div class="nv-heart-checkbox">
                  <input type="checkbox" id="favorite4">
                  <label for="favorite4"><i class="far fa-heart"></i></label>
                </div>

              </div>
              <img src="" >
            </div>
            <div class="card-body d-flex justify-content-between align-items-center">
              <div class="">
                <div class="nv-name nv-font-bc">
                  Product 1
                </div>
                <div class="nv-category">
                  Category 1
                </div>
              </div>
              <div class="nv-price nv-font-bc">
                P 250.00
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="card nv-product-card nv-default-box-shadow">
            <div class="nv-img-container">
              <div class="nv-product-actions d-flex justify-content-center align-items-center">
                <a href="#"><i class="fas fa-cart-plus"></i></a>
                <div class="nv-heart-checkbox">
                  <input type="checkbox" id="favorite5">
                  <label for="favorite5"><i class="far fa-heart"></i></label>
                </div>

              </div>
              <img src="" >
            </div>
            <div class="card-body d-flex justify-content-between align-items-center">
              <div class="">
                <div class="nv-name nv-font-bc">
                  Product 1
                </div>
                <div class="nv-category">
                  Category 1
                </div>
              </div>
              <div class="nv-price nv-font-bc">
                P 250.00
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="card nv-product-card nv-default-box-shadow">
            <div class="nv-img-container">
              <div class="nv-product-actions d-flex justify-content-center align-items-center">
                <a href="#"><i class="fas fa-cart-plus"></i></a>
                <div class="nv-heart-checkbox">
                  <input type="checkbox" id="favorite6">
                  <label for="favorite6"><i class="far fa-heart"></i></label>
                </div>

              </div>
              <img src="" >
            </div>
            <div class="card-body d-flex justify-content-between align-items-center">
              <div class="">
                <div class="nv-name nv-font-bc">
                  Product 1
                </div>
                <div class="nv-category">
                  Category 1
                </div>
              </div>
              <div class="nv-price nv-font-bc">
                P 250.00
              </div>
            </div>
          </div>
        </div>

      </div>
      <ul class="pagination pagination-sm nv-pagination justify-content-center align-items-center">
        <li class="page-item nv-previous ">
          <a class="page-link" href="#" tabindex="-1"><i class="fas fa-angle-left"></i></a>
        </li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item nv-next">
          <a class="page-link " href="#" tabindex="-1"><i class="fas fa-angle-right"></i></a>
        </li>
      </ul>
    </div>
  </div>

</div>

@endsection
