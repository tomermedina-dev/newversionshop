<div class="nv-table-container ">
  <table class="nv-table table table-striped ">
    <thead>
      <tr>
        <td class="nv-font-bc" scope="col">Name</td>
        <td class="nv-font-bc" scope="col">Username</td>
        <td class="nv-font-bc" scope="col"></td>
        <!-- <td></td> -->
      </tr>
    </thead>
    <tbody>
      <tr v-for="item in adminUsers">
        <td class="nv-font-bc" scope="col">@{{item.first_name}} @{{item.last_name}}</td>
        <td class="nv-font-bc" scope="col">@{{item.username}}</td>
        <td class="nv-font-bc" scope="col">
          <div class="custom-control custom-switch">
            <input v-on:click="changeAdminUserStatus(item.status ,  item.id )" type="checkbox" class="custom-control-input" :checked="item.status == 1 ? 'checked' : '' " :id="'customSwitch_admin_user_' + item.id">
            <label class="custom-control-label" :for="'customSwitch_admin_user_' + item.id"></label>
          </div>
        </td>
        <!-- <td>   <a class="btn float-right" v-on:click=" ">Edit</a> </td> -->
      </tr>
    </tbody>
  </table>
</div>
