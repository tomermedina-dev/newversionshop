var config = new Vue({
  el : ".nv-configuration-content" ,
  data : {
    productCategList : [] ,
    serviceCategList : [] ,
    adminUsers: []
  } ,
  methods :{
    loadProductCateg : function () {
      const t = this;
      axios.get('/admin/products/type/all').
      then(function(response) {
        t.productCategList = response.data;
      }).catch(function (error) {
        swalWentWrong(error);
      });
    } ,
    loadServiceCateg : function () {
      const t = this;
      axios.get('/admin/services/type/all').
      then(function(response) {
        t.serviceCategList = response.data;
      }).catch(function (error) {
        swalWentWrong(error);
      });
    },
    loadAdminUsers : function () {
      const t = this;
      axios.get('/admin/users/list').
      then(function(response) {
        t.adminUsers = response.data;
      }).catch(function (error) {
        swalWentWrong(error);
      });
    } ,
    changeStatus : function (status , id , categType) {
      const t = this;
      id = pad(id , 10);
      var setStatus ;
      if (status == 0){
        setStatus = 1;
      }else{
        setStatus = 0 ;
      }
      axios.get('/admin/'+categType+'/type/edit/status/'+id+'/'+setStatus).
      then(function(response) {
        t.loadProductCateg();
        t.loadServiceCateg();
      }).catch(function (error) {
        swalWentWrong(error);
      });
    } ,
    newCateg : function (type) {
      var lType = type.toLowerCase();
      Swal.fire({
        showConfirmButton: false,
        allowEscapeKey : false ,
        allowOutsideClick : false ,
        showCloseButton : true ,
        html: `
        <div class="p-2">
           <h3 class="nv-font-bc"> New `+type+` Category </h3>
           <br>
          <div class="form-group">
            <label class="float-left">Category Name</label>
            <input    class="nv-input-custom form-control" id="category" type="text" >
          </div>
          <div class="form-group">
            <label class="float-left">Description</label>
            <input class="nv-input-custom form-control" id="description" type="text" >
          </div>
          <button  onclick="config.saveCategory('`+lType+`')"    type="button" class="float-left btn nv-btn-txt-white nv-font-bc" >
            SAVE
          </button>
          <br>
          <div class="nv-error-msg">
          </div>
        </div>
        `
      })
    } ,
    saveCategory : function (type) {
      const t = this;
      var name = $("#category").val();
      var description = $("#description").val();
      var data  = {
        'type_name' :  name,
        'description' : description
      }
      if(name) {
        swalLoading("Saving new category.. Please wait..")
        axios.post('/admin/'+type+'/type/new' , data).
        then(function(response) {
          t.loadProductCateg();
          t.loadServiceCateg();
          swalSuccess("New Category has been added.");
        }).catch(function (error) {
          swalWentWrong(error);
        });
      }else {
        $(".nv-error-msg").append('<br><div class="swal2-validation-message" id="swal2-validation-message" style="display: flex;">Please enter category name.</div>');

      }


    } ,
    editCateg : function (type , id , name , description) {
      var lType = type.toLowerCase();
      if(description == null){
        description = '';
      }
      Swal.fire({
        showConfirmButton: false,
        allowEscapeKey : false ,
        allowOutsideClick : false ,
        showCloseButton : true ,
        html: `
        <div class="p-2">
           <h3 class="nv-font-bc"> Edit `+type+` Category </h3>
           <br>
          <div class="form-group">
            <label class="float-left">Category Name</label>
            <input    class="nv-input-custom form-control" id="category" type="text" value="`+name+`" >
          </div>
          <div class="form-group">
            <label class="float-left">Description</label>
            <input class="nv-input-custom form-control" id="description" type="text"  value="`+description+`" >
          </div>
          <button  onclick="config.saveEditCategory('`+lType+`' , '`+id+`')"    type="button" class="float-left btn nv-btn-txt-white nv-font-bc" >
            SAVE
          </button>
          <br>
          <div class="nv-error-msg">
          </div>
        </div>
        `
      })
    } ,
    saveEditCategory : function (type , id) {
      const t = this;
      var name = $("#category").val();
      var description = $("#description").val();
      id = pad(id , 10);
      var data  = {
        'id' : id ,
        'type_name' :  name,
        'description' : description
      }
      if(name) {
        swalLoading("Saving new category.. Please wait..")
        axios.post('/admin/'+type+'/type/new' , data).
        then(function(response) {
          t.loadProductCateg();
          t.loadServiceCateg();
          swalSuccess("Changes has been saved.");
        }).catch(function (error) {
          swalWentWrong(error);
        });
      }else {
        $(".nv-error-msg").append('<br><div class="swal2-validation-message" id="swal2-validation-message" style="display: flex;">Please enter category name.</div>');

      }
    } ,
    newAdminUser : function () {

      Swal.fire({
        showConfirmButton: false,
        allowEscapeKey : false ,
        allowOutsideClick : false ,
        showCloseButton : true ,
        html: `
        <div class="p-2">
           <h3 class="nv-font-bc"> New Admin User </h3>
           <br>
          <div class="form-group">
            <label class="float-left">First Name</label>
            <input    class="nv-input-custom form-control" id="admin-fname" type="text" >
          </div>
          <div class="form-group">
            <label class="float-left">Last Name</label>
            <input    class="nv-input-custom form-control" id="admin-lname" type="text" >
          </div>
          <div class="input-group mb-2">
          <label for="admin-username">Username</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupPrepend">admin_</span>
            </div>
            <input type="text" class="form-control" id="admin-username" placeholder="Username" aria-describedby="inputGroupPrepend" >

          </div>
          </div>
          <div class="form-group">
            <label class="float-left">Password</label>
            <input class="nv-input-custom form-control" id="admin-password" type="password" >
          </div>
          <div class="form-group">
            <label class="float-left">Email</label>
            <input class="nv-input-custom form-control" id="admin-email" type="text" >
          </div>
          <button  onclick="config.saveNewAdminUser()"    type="button" class="float-left btn nv-btn-txt-white nv-font-bc" >
            SAVE
          </button>
          <br>
          <div class="nv-error-msg">
          </div>
        </div>
        `
      })
    } ,
    saveNewAdminUser : function () {
      const t = this;
      var fname = $("#admin-fname").val();
      var lname = $("#admin-lname").val();
      var username = $("#admin-username").val();
      var password = $("#admin-password").val();
      var email = $("#admin-email").val();

      var data  = {
        'first_name' :  fname,
        'last_name' : lname ,
        'username' : 'admin_' + username  ,
        'password' : password ,
        'email' : email
      }
      if(fname && lname) {
        swalLoading("Saving new admin user.")
        axios.post('/admin/users/new' , data).
        then(function(response) {
          swalSuccess("New admin user has been added.");
          t.loadAdminUsers();
        }).catch(function (error) {
          swalWentWrong(error);
        });
      }else {
        $(".nv-error-msg").append('<br><div class="swal2-validation-message" id="swal2-validation-message" style="display: flex;">Please enter first name and last name.</div>');

      }
    } ,
    changeAdminUserStatus : function (status , id ) {
      console.log("admin");
      const t = this;
      id = pad(id , 10);
      var setStatus ;
      if (status == 0){
        setStatus = 1;
      }else{
        setStatus = 0 ;
      }
        swalLoading("Changing status..")
      axios.get('/admin/users/edit/status/'+id+'/'+setStatus).
      then(function(response) {
        t.loadAdminUsers();
          swalSuccess("User status has been changed.");
      }).catch(function (error) {
        swalWentWrong(error);
      });
    }
  } ,
  mounted (){
    this.loadProductCateg();
    this.loadServiceCateg();
    this.loadAdminUsers();
  }
})
