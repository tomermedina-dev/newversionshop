var config = new Vue({
  el : ".nv-configuration-content" ,
  data : {
    productCategList : [] ,
    serviceCategList : []
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
    }
  } ,
  mounted (){
    this.loadProductCateg();
    this.loadServiceCateg();
  }
})
