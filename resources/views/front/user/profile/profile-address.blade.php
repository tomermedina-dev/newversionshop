<div class="card nv-address-book nv-default-box-shadow">
  <div class="card-header d-flex justify-content-between">
    <div class="nv-label">
      Addresses
    </div>
  <a data-toggle="modal" data-target="#editProfileAddress"   class="nv-edit-button d-block">Edit</a>
  </div>
  <div class="card-body">
    <div class="row">
      <div v-cloak v-for="address in addressDetails" class="col-lg-6">
        <ul>
          <!-- <li class="nv-header nv-font-bc">Default Shipping Address</li> -->
          <label class="nv-header nv-font-bc">Address / Location</label>
          <li>@{{address.address_details}}</li>
          <label class="nv-header nv-font-bc">Notes (For landmarks etc)</label>
          <li v-if="address.notes == null">None</li>
          <li v-else>@{{address.notes}}</li>
        </ul>
      </div>
      <!-- <div class="col-lg-6">
        <ul>
          <li class="nv-header nv-font-bc">Default Billing Address</li>
          <li>32nd St. Eco Tower, Fort Bonifacio, Taguig City Metro Manila~Taguig</li>
          <li>(+63)9174128290</li>
        </ul>
      </div> -->
    </div>
  </div>
  @include('front.user.profile.profile-address-edit')
</div>
