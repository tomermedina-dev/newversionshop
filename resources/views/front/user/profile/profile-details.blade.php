<div class="card nv-personal-profile nv-default-box-shadow">
  <div class="card-header d-flex justify-content-between">
    <div class="nv-label">
      Personal Profile
    </div>
    <a data-toggle="modal" data-target="#editProfileDetails"   class="nv-edit-button d-block">Edit</a>
    <!-- <a href="#" class="nv-edit-button d-block"></a> -->

  </div>
  <div class="card-body">
    <ul v-cloak>
      <li>
        <label class="nv-header nv-font-bc">Name</label>
        @{{profileDetails.first_name}} @{{profileDetails.last_name}}
      </li>

      <li>
        <label class="nv-header nv-font-bc">Email</label>
        @{{profileDetails.email}}
      </li>

      <li>
        <label class="nv-header nv-font-bc">Contact Number</label>
        @{{profileDetails.contact_num}}
      </li>
    </ul>
  </div>
  @include('front.user.profile.profile-details-edit')
</div>
