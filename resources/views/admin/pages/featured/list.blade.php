@extends('admin.layout.main')

@section('content')
<link rel="stylesheet" href="{{ asset('admin/css/pages/featured-products.css') }}">
<link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/>
<script src="https://unpkg.com/cropperjs"></script>
<link rel="stylesheet" href=" {{ asset('dropzone/css/croppic.css') }} ">
<link rel="stylesheet"  href="{{ asset('dropzone/css/dropzone.css') }}">
<style media="screen">
  .nv-input-group-custom > .input-group-prepend > .input-group-text {
    width: 115px;
  }

</style>
<div class="nv-fp-content">

  <div class="row">
    <div class="col-lg-9 col-md-9">
      <h3 class="nv-header nv-font-bc">
        FEATURED
      </h3>
    </div>
    <div class="col-lg-3 col-md-9">
      <div class="input-group mb-3">
        <input id="search-featured" onkeyup="tableSearch('search-featured' , 'table-featured-list')" type="text" class="form-control nv-input-default nv-font-c" placeholder="Search ..." aria-label="Search By..." >
        <div class="input-group-append ">
          <span class="input-group-text nv-input-default">
            <i class="fas fa-search"aria-hidden="true"></i>
          </span>
        </div>
      </div>
    </div>
    @include('admin.pages.featured.featured-products-add')
    <table class="nv-table table table-striped mt-2">
      <thead>
          <tr>
              <td class="nv-font-bc" scope="col">Featured Image</td>
              <td class="nv-font-bc" scope="col">Featured ID</td>
              <td class="nv-font-bc" scope="col">Type</td>
              <td class="nv-font-bc" scope="col">Title</td>
              <td class="nv-font-bc" scope="col">Description</td>
              <td class="nv-font-bc" scope="col">Status</td>
              <td></td>
          </tr>
      </thead>
      <tbody id="table-featured-list">
          <tr v-cloak v-for="item in featuredList" class="item-list">
            <td   scope="col">
               <img class="border"  style="width:200px;height:200px;"  v-if='item.featured_image == null' src="{{ asset('images/no-image-available.png') }}">
               <img v-else style="height:200px;"  :src='getFeaturedImagesPath(item.featured_image)'   />
            </td>
            <td   scope="col"> @{{pad(item.id,10)}}</td>
            <td   scope="col"> @{{item.type}}</td>
            <td   scope="col"> @{{item.title}}</td>
            <td   scope="col"> @{{item.description}}</td>
            <td>
              <div class="custom-control custom-switch">
                <input v-on:click="changeStatus(item.status , pad(item.id,10) )" type="checkbox" class="custom-control-input" :checked="item.status == 1 ? 'checked' : '' " :id="'customSwitch_' + item.id">
                <label class="custom-control-label" :for="'customSwitch_' + item.id"></label>
              </div>
            </td>
            <td>
              <i class="fas fa-trash-alt pointer" v-on:click="deleteFeatured(pad(item.id,10))"></i>
            </td>
          </tr>
      </tbody>
    </table>

  </div>
</div>
<script src="{{ asset('dropzone\js\dropzone.js') }}" ></script>
<script src="{{ asset('dropzone\js\croppic.min.js') }}" ></script>
<script src="{{ asset('admin\js\featured.js') }}" ></script>
@endsection
