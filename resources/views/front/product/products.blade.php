@extends('front.layout.main')

@section('content')
<script type="text/javascript">
  var selectedCategory = '{{$categ}}';
</script>
<link rel="stylesheet" href="{{ asset('front/css/pages/products.css') }}">
<title>New Version Shop - Products</title>
<div class="nv-products-content">

  <div class="row">
    <div class="col-lg-3">
      <div class="list-group nv-category-list mb-3 nv-default-box-shadow">
        <a  class="list-group-item list-group-item-action nv-header nv-items"><i class="fas fa-box-open"></i>&nbsp;&nbsp;Product Categories</a>
        <a   href="/products/all" class="list-group-item list-group-item-action nv-items d-flex justify-content-between align-items-center">
        All <i class="fas fa-angle-right"></i>
         </a>
        <nv-component-product-category></nv-component-product-category>


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
            Results <label id="totalResult"></label>
          </div>
          <div class="input-group">
            <input v-on:keyup.enter="searchProduct" v-model="searchValue" type="text" class="form-control nv-input-default nv-font-c" placeholder="Search product..." aria-label="Search By..." >
            <div class="input-group-append d-flex justify-content-center">
              <button v-on:click="searchProduct" class="btn" type="button" name="button"><i class="fas fa-search"aria-hidden="true"></i></button>
            </div>
          </div>
        </div>
        <div class="nv-filter d-flex justify-content-center align-items-center nv-default-box-shadow">
          <button type="btn" name="button"><i class="fas fa-filter"></i></button>
        </div>
      </div>

      <div id="nv-product-grid">
          <nv-component-product-grid></nv-component-product-grid>
      </div>

      <!-- <ul  class="pagination pagination-sm nv-pagination justify-content-center align-items-center">
        <li class="page-item nv-previous ">
          <a class="page-link" href="#" tabindex="-1"><i class="fas fa-angle-left"></i></a>
        </li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item nv-next">
          <a class="page-link " href="#" tabindex="-1"><i class="fas fa-angle-right"></i></a>
        </li>
      </ul> -->
    </div>
  </div>

</div>
<script src="{{ asset('front\js\customs.js') }}" charset="utf-8"></script>
<script src="{{ asset('front\js\products.js') }}" ></script>
@endsection
