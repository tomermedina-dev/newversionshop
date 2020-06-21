@extends('front.layout.main')

@section('content')

<div class="container">

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
      @include('front.product.featured')
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
    </div>
  </div>

</div>

</div>
<script type="text/javascript">
  var newSearchValue = '{{$searchValue}}';

</script>
<script src="{{ asset('front\js\customs.js') }}" charset="utf-8"></script>
<script src="{{ asset('front\js\products.js') }}" ></script>
<script type="text/javascript">
  var featuredType = 'products';
</script>
<script src="{{ asset('front\js\featured.js') }}" ></script>
@endsection
