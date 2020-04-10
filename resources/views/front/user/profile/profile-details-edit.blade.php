<div class="modal fade nv-modal" id="editProfileDetails" tabindex="-1" role="dialog" aria-labelledby="editProfileDetails" aria-hidden="true">
  <!-- <div class="nv-invisible-padding"></div> -->
<div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <div class="modal-title">
        <div class="nv-title nv-font-bc">EDIT PROFILE DETAILS</div>
      </div>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true" style="color:black" >&times;</span>
      </button>
    </div>

    <div class="modal-body">
      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link bg-white text-black active" id="pills-personal-info" data-toggle="pill" href="#pills-personal-content" role="tab" aria-controls="pills-home" aria-selected="true">Personal Information</a>
        </li>
        <li class="nav-item">
          <a class="nav-link bg-white text-black" id="pills-email" data-toggle="pill" href="#pills-email-content" role="tab" aria-controls="pills-profile" aria-selected="false">Email</a>
        </li>
        <li class="nav-item">
          <a class="nav-link bg-white text-black" id="pills-password" data-toggle="pill" href="#pills-password-content" role="tab" aria-controls="pills-profile" aria-selected="false">Password</a>
        </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-personal-content" role="tabpanel" aria-labelledby="pills-personal-info">
          <div class="form-group">
            <label>Username</label>
            <input v-on:blur="validateUsername" v-model="username" type="text" class="form-control nv-input-custom" id="username" placeholder="Username"  >
            <small id="err_username" style="color:red" ></small>
          </div>
          <div class="form-group">
            <label>First Name</label>
            <input v-model="first_name" type="text" class="form-control nv-input-custom" id="first_name" placeholder="First Name"  >
          </div>
          <div class="form-group">
            <label>Last Name</label>
            <input v-model="last_name"  type="text" class="form-control nv-input-custom" id="last_name" placeholder="Last Name"   >
          </div>
          <div class="form-group">
            <label>Contact Number</label>
            <input onkeypress="return isNumber(event)" v-model="contact"  type="text" class="form-control nv-input-custom" id="contact" placeholder="Contact"  >
          </div>

          <button  v-on:click="updateProfile('update-personal')"  type="button" class="float-right btn nv-btn-txt-white nv-font-bc" >
            <i class="fas fa-save text-white"></i>&nbsp;
            SAVE
          </button>
        </div>
        <div class="tab-pane fade" id="pills-email-content" role="tabpanel" aria-labelledby="pills-email">
          <div class="form-group">
            <label>New Email</label>
            <input v-model="email" v-on:blur="validateEmail"  type="text" class="form-control nv-input-custom" id="email" placeholder="Enter new email">
            <small id="err_email" style="color:red" ></small>
          </div>
          <button  v-on:click="updateProfile('update-email')"   type="button" class="float-right btn nv-btn-txt-white nv-font-bc" >
            <i class="fas fa-save text-white"></i>&nbsp;
            SAVE
          </button>
        </div>
        <div class="tab-pane fade" id="pills-password-content" role="tabpanel" aria-labelledby="pills-password">
          <div class="form-group">
            <label>Old Password</label>
            <input v-model="old_password"   type="password" class="form-control nv-input-custom" id="old-password" placeholder="Enter old password">
          </div>
          <div class="form-group">
            <label>New Password</label>
            <input v-model="new_password"   type="password" class="form-control nv-input-custom" id="new-password" placeholder="Enter new password">
          </div>
          <button  v-on:click="updateProfile('update-password')"    type="button" class="float-right btn nv-btn-txt-white nv-font-bc" >
            <i class="fas fa-save text-white"></i>&nbsp;
            SAVE
          </button>
        </div>

      </div>


    </div>
    <!-- <div class="modal-footer">

    </div> -->

  </div>
</div>
</div>
