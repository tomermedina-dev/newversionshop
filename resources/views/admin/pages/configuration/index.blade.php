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
              <div class="nv-table-container ">
                <table class="nv-table table table-striped ">
                  <thead>
                    <tr>
                      <td class="nv-font-bc" scope="col">Category Name</td>
                      <td class="nv-font-bc" scope="col">Description</td>
                      <td class="nv-font-bc" scope="col"></td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="item in productCategList">
                      <td class="nv-font-bc" scope="col">@{{item.type_name}}</td>
                      <td class="nv-font-bc" scope="col">@{{item.description}}</td>
                      <td class="nv-font-bc" scope="col">
                        <div class="custom-control custom-switch">
                          <input v-on:click="changeStatus(item.status ,  item.id  ,'products' )" type="checkbox" class="custom-control-input" :checked="item.status == 1 ? 'checked' : '' " :id="'customSwitch_product_' + item.id">
                          <label class="custom-control-label" :for="'customSwitch_product_' + item.id"></label>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
            </div>
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
              <div class="nv-table-container ">
                <table class="nv-table table table-striped ">
                  <thead>
                    <tr>
                      <td class="nv-font-bc" scope="col">Category Name</td>
                      <td class="nv-font-bc" scope="col">Description</td>
                      <td class="nv-font-bc" scope="col"></td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="item in serviceCategList">
                      <td class="nv-font-bc" scope="col">@{{item.type_name}}</td>
                      <td class="nv-font-bc" scope="col">@{{item.description}}</td>
                      <td class="nv-font-bc" scope="col">
                        <div class="custom-control custom-switch">
                          <input v-on:click="changeStatus(item.status , item.id  ,'services' )" type="checkbox" class="custom-control-input" :checked="item.status == 1 ? 'checked' : '' " :id="'customSwitch_service_' + item.id">
                          <label class="custom-control-label" :for="'customSwitch_service_' + item.id"></label>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
            </div>
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
