@extends('admin.layout.main')

@section('content')
<div class="nv-configuration-content">
  <h1 class="nv-header nv-font-bc "  >
  CONFIGURATION
  </h1>
  <div class="p2">
    <div class="row">
      <div class="col-sm-5">
          <div class="card p-2">
            <div class="row">
              <div class="col sm-6">
                <h3>Product Category</h3>
              </div>
              <div class="col sm-6">
                <a class="btn float-right" v-on:click="newCateg('Products')">Add New</a>
              </div>
            </div>
            <div class="dropdown-divider"></div>
            <div class="">
              @include('admin.pages.configuration.category-product')
          </div>
        </div>
      </div>
      <div class="col-sm-5">
        <div class="card p-2">
          <div class="row">
            <div class="col sm-6">
              <h3>Service Category</h3>
            </div>
            <div class="col sm-6">
              <a   v-on:click="newCateg('Services')" class="btn float-right">Add New</a>
            </div>
          </div>
            <div class="dropdown-divider"></div>
            <div class="">
                @include('admin.pages.configuration.category-services')  
            </div>
        </div>
      </div>

      <div class="col-sm-5 mt-2 " style="display:none">
        <div class="card p-2">
            <h3>Admin Password</h3>
            <div class="dropdown-divider"></div>
        </div>
      </div>

    </div>
  </div>
</div>
<script src="{{ asset('admin\js\configuration.js') }}" ></script>
@endsection
