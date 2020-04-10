<div class="card nv-units nv-default-box-shadow">
  <div class="card-header d-flex justify-content-between">
    <div class="nv-label">
      Units
    </div>

    <a data-toggle="modal" data-target="#addProfileUnits"   class="nv-edit-button d-block">Add New Unit</a>
  </div>
  <div class="card-body">
    <table class="table">
      <thead>
        <tr>
          <td class="nv-font-bc" scope="col">Brand</td>
          <td class="nv-font-bc" scope="col">Model</td>
          <td class="nv-font-bc" scope="col">VIN</td>
          <td class="nv-font-bc" scope="col">Plate Number</td>
          <td class="nv-font-bc" scope="col"></td>
        </tr>
      </thead>
      <tbody>
        <tr v-cloak v-for="units in unitDetails">
          <td>@{{units.car_brand}}</td>
          <td>@{{units.model}}</td>
          <td>@{{units.vin}}</td>
          <td>@{{units.plate_number}}</td>
          <th class="nv-actions"> <a v-on:click="deleteUnit(units.id)"><i class="far fa-trash-alt"></i> </a></th>
        </tr>


      </tbody>
    </table>
  </div>
    @include('front.user.profile.profile-units-add')
</div>
