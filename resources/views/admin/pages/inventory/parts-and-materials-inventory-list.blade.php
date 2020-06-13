<div class="nv-table-container mb-3" id="nv-inventory-list">
      <!-- <nv-component-inventory-list></nv-component-inventory-list> -->
      <table class="nv-table table table-striped "  >

      <thead>
        <tr>
          <td>Item Image</td>
          <td class="nv-font-bc" scope="col">Product Id</td>
          <td class="nv-font-bc" scope="col">Type</td>
          <td class="nv-font-bc" scope="col">Name</td>
          <td class="nv-font-bc" scope="col">Brand</td>
          <td class="nv-font-bc" scope="col">Car Brand</td>
          <td class="nv-font-bc" scope="col">Car Model</td>
          <td class="nv-font-bc" scope="col">Description</td>
          <td class="nv-font-bc" scope="col">Quantity</td>
          <td class="nv-font-bc" scope="col">Price</td>
          <td class="nv-font-bc" scope="col">Status</td>

          <td class="nv-font-bc" scope="col"></td>
        </tr>
      </thead>
      <tbody id="table-inventory-list">

      <tr v-for="item in inventoryList" class="item-list">
        <td   scope="col">
           <img class="border"  style="width:200px;height:200px;"  v-if='item.product_image == null' src="{{ asset('images/no-image-available.png') }}">
           <img v-else style="width:200px;height:200px;"  :src='getProductImagesPath(item.car_image)'   />
        </td>
        <td   scope="col"> @{{pad(item.id,10)}}</td>
        <td   scope="col"> @{{item.product_categ}}</td>
        <td   scope="col">@{{item.name}}</td>
        <td   scope="col">@{{item.brand}}</td>
        <td   scope="col">@{{item.car_brand}}</td>
        <td   scope="col">@{{item.car_model}}</td>
        <td   scope="col">@{{item.description}}</td>
        <td   scope="col">@{{item.quantity}}</td>
        <td   scope="col">PHP @{{item.price}}</td>
        <td>
          <div class="custom-control custom-switch">
            <input v-on:click="changeStatus(item.status , pad(item.id,10) )" type="checkbox" class="custom-control-input" :checked="item.status == 1 ? 'checked' : '' " :id="'customSwitch_' + item.id">
            <label class="custom-control-label" :for="'customSwitch_' + item.id"></label>
          </div>
        </td>
        <td   scope="col" class="info">
          <div class="dropdown">
            <div class="nv-account dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-ellipsis-h"></i>
            </div>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <a class="dropdown-item pointer" v-on:click="editItem(item.id,item.type_id ,item.product_categ , item.name , item.brand,item.car_brand,item.car_model,item.description,item.quantity ,item.price )" href="#">Edit</a>
              <a class="dropdown-item pointer" :href="'/admin/promo/new/' + pad(item.id  , 10)" target="_blank"  >Set Promo</a>

              <!-- <a class="dropdown-item" v-on:click="deleteItem(item.id)" href="#">Delete</a> -->
            </div>
          </div>
        </td>

      </tr>
      </tbody>
      </table>
</div>
  <!-- <ul   class="pagination pagination-sm nv-pagination justify-content-center align-items-center">
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
