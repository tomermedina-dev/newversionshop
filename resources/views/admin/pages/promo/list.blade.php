@extends('admin.layout.main')

@section('content')
<link rel="stylesheet" href="{{ asset('admin/css/pages/promo-and-sales.css') }}">

<div class="nv-ps-content">

  <div class="row">
    <div class="col-lg-9 col-md-9">
      <h3 class="nv-header nv-font-bc">
        PROMO LIST
      </h3>
    </div>
    <div class="col-lg-3 col-md-9">
      <div class="input-group mb-3">
        <input id="search-promo" onkeyup="" type="text" class="form-control nv-input-default nv-font-c" placeholder="Search ..." aria-label="Search By..." >
        <div class="input-group-append ">
          <span class="input-group-text nv-input-default">
            <i class="fas fa-search"aria-hidden="true"></i>
          </span>
        </div>
      </div>
    </div>

  </div>

  <br>
  <div class="nv-table-container mb-3" id="nv-promo-list">
        <table class="nv-table table table-striped "  v-if="promoList.length > 0" >

        <thead>
          <tr>
            <td class="nv-font-bc" scope="col">Product ID</td>
            <td class="nv-font-bc" scope="col">Name</td>
            <td class="nv-font-bc" scope="col">Discount %</td>
            <td class="nv-font-bc" scope="col">Start of Sale Date</td>
            <td class="nv-font-bc" scope="col">End of Sale Date</td>
            <td class="nv-font-bc" scope="col"></td>
          </tr>
        </thead>
        <tbody id="table-promo-list">

        <tr v-for="item in promoList" class="item-list">
          <td   scope="col">@{{item.product_id}}</td>
          <td   scope="col">@{{item.name}}</td>
          <td   scope="col">@{{item.percentage}}%</td>
          <td   scope="col">@{{item.start_date}}</td>
          <td   scope="col">@{{item.end_date}}</td>
          <td   scope="col" class="info">
            <div class="dropdown">
              <div class="nv-account dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-h"></i>
              </div>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <a class="pointer dropdown-item" v-on:click="removePromo(item.id)" >Remove Promo</a>
                <!-- <a class="dropdown-item" v-on:click="deleteItem(item.id)" href="#">Delete</a> -->
              </div>
            </div>
          </td>

        </tr>

        </tbody>
        </table>
        <div v-else class="text-center">
          <h1>No result</h1>
        </div>
  </div>
</div>
<script src="{{ asset('admin\js\promo.list.js') }}" ></script>
@endsection
