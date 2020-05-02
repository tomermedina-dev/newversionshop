
<table class="nv-table table table-striped ">
  <thead>
    <tr>
      <td class="nv-font-bc" scope="col">Order #</td>
      <td class="nv-font-bc" scope="col">Customer Name</td>
      <td class="nv-font-bc" scope="col">Address</td>
      <td class="nv-font-bc" scope="col">Contact</td>
      <td class="nv-font-bc" scope="col">Email</td>
      <td class="nv-font-bc" scope="col">Notes</td>
      <td class="nv-font-bc" scope="col">
        <select v-on:change="filterList('delivery_method')" v-model='deliveryMethodFilter' class="custom-select">
          <option  selected>Delivery Method</option>
          <option value="Shipping">Shipping</option>
          <option value="Pick-Up">Pick-Up</option>
          <option value="All">All</option>
        </select>
      </td>
      <td class="nv-font-bc" scope="col">
        <select v-on:change="filterList('order_status')" v-model='orderStatusFilter' class="custom-select">
          <option selected>Order Status</option>
          <option value="New">New</option>
          <option value="Claimed">Claimed</option>
          <option value="Delivered">Delivered</option>
          <option value="All">All</option>
        </select>
      </td>
      <td class="nv-font-bc" scope="col">Order Date</td>

      <td></td>
    </tr>
  </thead>
  <tbody id="table-order-list">

    <tr v-for="items in orderList">
      <td class="nv-font-bc" scope="col">@{{pad(items.id)}}</td>
      <td class="nv-font-bc" scope="col">@{{items.first_name}} @{{items.last_name}}</td>
      <td class="nv-font-bc" scope="col">@{{items.address}}</td>
      <td class="nv-font-bc" scope="col">@{{items.contact}}</td>
      <td class="nv-font-bc" scope="col">@{{items.email}}</td>
      <td class="nv-font-bc" scope="col">@{{items.notes}}</td>
      <td class="nv-font-bc" scope="col">@{{items.delivery_method}}</td>
      <td class="nv-font-bc" scope="col">
        @{{setStatus(items.delivery_method , items.is_delivered , items.is_claimed)}}
      </td>
      <td class="nv-font-bc" scope="col">@{{items.created_at}}</td>


      <td class="nv-font-bc" scope="col" class="info">
        <div class="dropdown">
          <div class="nv-account dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-ellipsis-h"></i>
          </div>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <a class="dropdown-item" v-on:click="getOrderItems(items.id)">View Order Items</a>
            <a v-on:click="changeOrderStatus(items.id , 'Y' , 'is_delivered')" class="dropdown-item pointer"  v-if="items.delivery_method == 'Shipping' && items.is_delivered =='N'">Set Order Status to Delivered </a>
            <a v-on:click="changeOrderStatus(items.id , 'Y' , 'is_claimed')"  class="dropdown-item pointer" v-if="items.delivery_method == 'Pick-Up' && items.is_claimed == 'N'">Set Order Status to Claimed</a>
          </div>
        </div>
      </td>
    </tr>


  </tbody>
</table>
