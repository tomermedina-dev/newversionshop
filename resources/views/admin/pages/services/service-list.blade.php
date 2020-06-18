<div class="nv-table-container mb-3 " id="nv-service-list">
  <table class="nv-table table table-striped ">
    <thead>
      <tr>
        <td class="nv-font-bc" scope="col">Service ID</td>
        <td class="nv-font-bc" scope="col">Service Image</td>
        <td class="nv-font-bc" scope="col">Service Type</td>
        <td class="nv-font-bc" scope="col">Service Title</td>
        <td class="nv-font-bc" scope="col">Description</td>
        <td class="nv-font-bc" scope="col">Price</td>
        <td class="nv-font-bc" scope="col">Booking Price</td>
        <td class="nv-font-bc" scope="col">Status</td>
        <td class="nv-font-bc" scope="col"></td>
      </tr>
    </thead>
    <tbody  id="table-service-list">
      <tr v-for="items in serviceList">
        <td class="nv-font-bc" scope="col">@{{pad(items.id)}}</td>
        <td class="nv-font-bc" scope="col">
          <img class="border" v-if='items.service_image == null'  src="{{ asset('images/no-image-available.png') }}">
          <img v-else style="width:200px;"  :src='getServiceImagesPath(items.service_image)'   />
        </td>
        <td class="nv-font-bc" scope="col">@{{items.service_categ}}</td>
        <td class="nv-font-bc" scope="col">@{{items.name}}</td>
        <td class="nv-font-bc" scope="col">@{{items.description}}</td>
        <td class="nv-font-bc" scope="col">@{{items.price}}</td>
        <td class="nv-font-bc" scope="col">@{{items.booking_price}}</td>
        <td>
          <div class="custom-control custom-switch">
            <input v-on:click="changeStatus(items.status , pad(items.id) )" type="checkbox" class="custom-control-input" :checked="items.status == 1 ? 'checked' : '' " :id="'customSwitch_' + items.id">
            <label class="custom-control-label" :for="'customSwitch_' + items.id"></label>
          </div>
        </td>
        <td class="nv-font-bc" scope="col" class="info">
          <div class="dropdown">
            <div class="nv-account dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-ellipsis-h"></i>
            </div>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <a class="dropdown-item" v-on:click="editService(pad(items.id),items.service_image_id , items.service_image , items.type_id , items.name , items.description , items.price , items.booking_price)"  >Edit</a>
            </div>
          </div>
        </td>
      </tr>

    </tbody>
  </table>
</div>
