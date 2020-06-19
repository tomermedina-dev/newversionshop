<div class="nv-table-container ">
  <table class="nv-table table table-striped ">
    <thead>
      <tr>
        <td class="nv-font-bc" scope="col">Category Name</td>
        <td class="nv-font-bc" scope="col">Description</td>
        <td class="nv-font-bc" scope="col"></td>
        <td></td>
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
        <td>   <a class="btn float-right" v-on:click="editCateg('Products',item.id ,item.type_name ,item.description )">Edit</a> </td>
      </tr>
    </tbody>
  </table>
</div>
