var curr_img = "";
var arr_categories = [];
var arrImages = [];
var arrImagesEdit = [];
var formItems = new FormData();
Vue.component("nv-component-add-inventory" ,
{
  data :function() {
    return {
      name : "" ,
      car_brand : "" ,
      car_model : "" ,
      description : "" ,
      price : "" ,
      type : 1 ,
      brand: "" ,
      quantity : "" ,
      typeList : []
    }
  } ,
  template : `<div>
  <div class="modal-body">

    <div class="row">
    <div class="col-lg-6">
       <div class="input-group nv-input-group-custom mb-2">
          <div class="input-group-prepend">
             <span class="input-group-text nv-font-c">
             <i class="fas fa-box-open"></i>&nbsp;&nbsp;NAME</span>
          </div>
          <input v-model="name" type="text" class="form-control">
       </div>
       <div class="input-group nv-input-group-custom mb-2">
          <div class="input-group-prepend">
             <span class="input-group-text nv-font-c">
             <i class="fas fa-box-open"></i>&nbsp;&nbsp;CAR BRAND</span>
          </div>
          <input v-model="car_brand" type="text" class="form-control">
       </div>
       <div class="input-group nv-input-group-custom mb-2">
          <div class="input-group-prepend">
             <span class="input-group-text nv-font-c">
             <i class="fas fa-box-open"></i>&nbsp;&nbsp;DESCRIPTION</span>
          </div>
          <input v-model="description" type="text" class="form-control">
       </div>
       <div class="input-group nv-input-group-custom mb-2">
          <div class="input-group-prepend">
             <span class="input-group-text nv-font-c">
             <i class="fas fa-box-open"></i>&nbsp;&nbsp;PRICE</span>
          </div>
          <input  onkeypress="return isNumber(event)"  v-model="price" type="text" class="form-control">
       </div>
    </div>
     <div class="col-lg-6">
      <!---  <div class="input-group nv-input-group-custom mb-2">
          <div  class="input-group-prepend">
            <span class="input-group-text nv-font-c">
              <i class="fas fa-box-open"></i>&nbsp;&nbsp;TYPE</span>
          </div>
          <input  v-model="type" type="text" class="form-control">

        </div>-->
        <div>
          <div class="form-group input-group nv-input-group-custom mb-2">
            <div  class="input-group-prepend">
              <span class="input-group-text nv-font-c">
                <i class="fas fa-box-open"></i>&nbsp;&nbsp;TYPE</span>
            </div>
            <select v-model="type"   class="form-control" id="productType">
              <option v-for="type in typeList" :value="type.id" >{{type.type_name}}</option>
            </select>
          </div>

        </div>
        <div class="input-group nv-input-group-custom mb-2">
          <div class="input-group-prepend">
            <span class="input-group-text nv-font-c">
              <i  class="fas fa-box-open"></i>&nbsp;&nbsp;BRAND</span>
          </div>
          <input v-model="brand" type="text" class="form-control">
        </div>

        <div class="input-group nv-input-group-custom mb-2">
          <div class="input-group-prepend">
            <span class="input-group-text nv-font-c">
              <i class="fas fa-box-open"></i>&nbsp;&nbsp;CAR MODEL</span>
          </div>
          <input v-model="car_model" type="text" class="form-control">
        </div>

        <div class="input-group nv-input-group-custom mb-2">
          <div class="input-group-prepend">
            <span class="input-group-text nv-font-c">
              <i class="fas fa-box-open"></i>&nbsp;&nbsp;QUANTITY</span>
          </div>
          <input  onkeypress="return isNumber(event)"  v-model="quantity" type="text" class="form-control">
        </div>
      </div>
      </div>
    <div class="container">
      <h3>Product Image</h3>
      <div class="dropzone" id="dropzoneItem">
        <div class="dz-message" data-dz-message>Drop image or click to upload image</div>
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button v-on:click="saveItem" type="button" class="btn btn-sm nv-btn-txt-dark nv-font-bc" data-toggle="modal" >
      <i class="fas fa-forward"></i>&nbsp;
      PROCEED
    </button>
  </div>
  </div>` ,

  methods : {
    saveItem : function () {
      const t = this;
      if(!t.name.trim()){
        swalError("Please enter product name");
      }else{
        this.getFieldValue();
        swalLoading("Saving product. Please wait.")
        axios.post('/admin/products/new' , formItems).then(function (response) {
          swalSuccess("Successfully saved.")
          inventoryList.loadList()
          $("#addItemModal").modal("hide");
          arrImages = [];
        }).catch(function (error) {
          swalWentWrong();
        }).finally(function(response) {});
      }
    } ,
    getFieldValue : function() {
      const t = this;
      formItems.append('name' , t.name);
      formItems.append('car_brand' , t.car_brand);
      formItems.append('description' , t.description);
      formItems.append('price' , t.price);
      formItems.append('type_id' , t.type);
      formItems.append('brand' , t.brand);
      formItems.append('car_model' , t.car_model);
      formItems.append('quantity' , t.quantity);
      formItems.append('images' , arrImages);
      formItems.append('target' , target);
    }
  } ,
  mounted (){
    const t = this;
    axios.
    get('/admin/products/type/all/active')
    .then(function(response) {

      t.typeList = response.data;

    }).catch(function(error) {
      swalWentWrong();
    }).finally(function(response) { });
  }
});

var addItem = new Vue({
  el : ".nv-add-item"
});

Dropzone.options.dropzoneItem= {
          url: '/admin/upload/new/image/products',
          renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
               return time+file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            maxFiles: 10 ,
            removedfile: function(file)
            {
                var name = file.upload.filename;
                var inx = arrImages.indexOf('"'+name+'"');
                arrImages.splice(inx, 1);
                var form_media = {
                  filename : name
                };
                axios.post('/admin/upload/delete/image/products' , form_media).then(
                  function(response) {

                  }
                ).catch(function(error) {
                  swalWentWrong();
                }).finally(function (response) {

                });

                var fileRef;
                return (fileRef = file.previewElement) != null ?
                fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },
            success: function(file, response)
            {
                //console.log(response);
                arrImages.push(response);


            },
            init: function() {}
        };


var inventoryList = new Vue ({
  el : "#nv-inventory-list" ,
  data : {
    inventoryList : []
  },
  methods :{
    loadList : function(start = 0 ,end = 5) {
        const t = this;
      axios.
      // get('/admin/products/page/'+start+'/'+end)
      get('/admin/products/all/target/'+target)
      .then(function(response) {

        t.inventoryList = response.data;

      }).catch(function(error) {
        swalWentWrong();
      }).finally(function(response) { });
    } ,
    pad : function(value , length){
      return pad(value , length);
    },
    changeStatus : function (status , productId) {
      var setStatus ;
      if (status == 0){
        setStatus = 1;
      }else{
        setStatus = 0 ;
      }
      axios.
      get('/admin/products/edit/status/'+productId+'/'+setStatus)
      .then(function(response) {
        swalSuccess("Status has been changed.")
      }).catch(function(error) {
        swalWentWrong();
      }).finally(function(response) { });
    } ,
    getProductImagesPath: function(img){
      return window.location.origin + "/uploads/images/products/"+img;
    },
    editItem : function (id , type_id ,product_categ , name , brand,car_brand,car_model,description,quantity ,price) {

      if ($("#EditItemModal").get(0)){
          $("#nv-inventory-edit").empty();
          $("#nv-inventory-edit").append("<nv-component-edit-inventory></nv-component-edit-inventory>");
      }

      Vue.component('nv-component-edit-inventory' , {
        data :function() {
          return {
            productId : pad(id, 10) ,
            name : name ,
            car_brand : car_brand ,
            car_model : car_model ,
            description : description ,
            price : price ,
            type : parseInt(type_id,10) ,
            brand: brand ,
            quantity : quantity ,
            typeList : [] ,
            imageList : []
          }
        } ,
        template:`<div class="modal fade nv-modal" id="EditItemModal" tabindex="-1" role="dialog" aria-labelledby="addItemModalLabel" aria-hidden="true">
          <!-- <div class="nv-invisible-padding"></div> -->
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <div class="modal-title">
                <div class="nv-title nv-font-bc">EDIT ITEM</div>
                <div class="nv-subtitle">Product ID : <label>{{productId}}</label></div>
              </div>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">

              <div class="row">
              <div class="col-lg-6">
                 <div class="input-group nv-input-group-custom mb-2">
                    <div class="input-group-prepend">
                       <span class="input-group-text nv-font-c">
                       <i class="fas fa-box-open"></i>&nbsp;&nbsp;NAME</span>
                    </div>
                    <input v-model="name" type="text" class="form-control" >
                 </div>
                 <div class="input-group nv-input-group-custom mb-2">
                    <div class="input-group-prepend">
                       <span class="input-group-text nv-font-c">
                       <i class="fas fa-box-open"></i>&nbsp;&nbsp;CAR BRAND</span>
                    </div>
                    <input v-model="car_brand" type="text" class="form-control">
                 </div>
                 <div class="input-group nv-input-group-custom mb-2">
                    <div class="input-group-prepend">
                       <span class="input-group-text nv-font-c">
                       <i class="fas fa-box-open"></i>&nbsp;&nbsp;DESCRIPTION</span>
                    </div>
                    <input v-model="description" type="text" class="form-control">
                 </div>
                 <div class="input-group nv-input-group-custom mb-2">
                    <div class="input-group-prepend">
                       <span class="input-group-text nv-font-c">
                       <i class="fas fa-box-open"></i>&nbsp;&nbsp;PRICE</span>
                    </div>
                    <input  onkeypress="return isNumber(event)"  v-model="price" type="text" class="form-control">
                 </div>
              </div>
               <div class="col-lg-6">
                <!---  <div class="input-group nv-input-group-custom mb-2">
                    <div  class="input-group-prepend">
                      <span class="input-group-text nv-font-c">
                        <i class="fas fa-box-open"></i>&nbsp;&nbsp;TYPE</span>
                    </div>
                    <input  v-model="type" type="text" class="form-control">

                  </div>-->
                  <div>
                    <div class="form-group input-group nv-input-group-custom mb-2">
                      <div  class="input-group-prepend">
                        <span class="input-group-text nv-font-c">
                          <i class="fas fa-box-open"></i>&nbsp;&nbsp;TYPE</span>
                      </div>
                      <select v-model="type"   class="form-control" id="productTypeEdit">
                        <option v-for="type in typeList" :value="type.id" :id="'productCategEdit_' + type.id" >{{type.type_name}}</option>
                      </select>
                    </div>

                  </div>
                  <div class="input-group nv-input-group-custom mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text nv-font-c">
                        <i  class="fas fa-box-open"></i>&nbsp;&nbsp;BRAND</span>
                    </div>
                    <input v-model="brand" type="text" class="form-control">
                  </div>

                  <div class="input-group nv-input-group-custom mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text nv-font-c">
                        <i class="fas fa-box-open"></i>&nbsp;&nbsp;CAR MODEL</span>
                    </div>
                    <input v-model="car_model" type="text" class="form-control">
                  </div>

                  <div class="input-group nv-input-group-custom mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text nv-font-c">
                        <i class="fas fa-box-open"></i>&nbsp;&nbsp;QUANTITY</span>
                    </div>
                    <input  onkeypress="return isNumber(event)"  v-model="quantity" type="text" class="form-control">
                  </div>
                </div>
                </div>
              <div v-if="imageList.length > 0" class="container">
                <h3>Current Product Image</h3>
                <div class="container">
                <div  style="float:left;margin:5px;" v-for="image in imageList"  >

                  <img style="width:200px;"  :src='getProductImagesPath(image.image_name)'   />
                  <br>
                  <div class="center">
                    <span class="badge badge-warning" style="cursor:pointer;" v-on:click="removeImage(image.id , image.image_name)">DELETE</span>
                  </div>
                </div>
                </div>
              </div>
              <br>
              <div class="container"  style="float:left" >
                <h3>Add Product Image</h3>
                <div class="dropzone" id="dropzoneItemEdit">
                  <div class="dz-message" data-dz-message>Drop image or click to upload image</div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button v-on:click="saveItemEdit" type="button" class="btn btn-sm nv-btn-txt-dark nv-font-bc" >
                <i class="fas fa-forward"></i>&nbsp;
                PROCEED
              </button>
            </div>

          </div>
        </div>
        </div>` ,
        mounted (){
          const t = this;
          axios.
          get('/admin/products/type/all')
          .then(function(response) {
            t.typeList = response.data;
          }).catch(function(error) {
            swalWentWrong();
          }).finally(function(response) { });

          axios.
          get('/admin/products/image/'+t.productId)
          .then(function(response) {
            t.imageList = response.data;
          }).catch(function(error) {
            swalWentWrong();
          }).finally(function(response) { });

        },
        methods : {
          getProductImagesPath: function(img){
            return window.location.origin + "/uploads/images/products/"+img;
          },
          saveItemEdit : function() {
            // swalLoading("Saving.. Please wait..")
            const t = this;
            if(!t.name.trim()){
              swalError("Please enter product name");
            }else{
              this.getFieldValue();
              swalLoading("Saving product. Please wait.")
              axios.post('/admin/products/edit' , formItems).then(function (response) {
                swalSuccess("Successfully saved.")
                inventoryList.loadList()
                $("#EditItemModal").modal('hide')
                arrImagesEdit = [];
              }).catch(function (error) {
                swalWentWrong();
              }).finally(function(response) {

              });
            }

          },
          getFieldValue : function() {
            const t = this;
            formItems.append('productId' , t.productId)
            formItems.append('name' , t.name);
            formItems.append('car_brand' , t.car_brand);
            formItems.append('description' , t.description);
            formItems.append('price' , t.price);
            formItems.append('type_id' , t.type);
            formItems.append('brand' , t.brand);
            formItems.append('car_model' , t.car_model);
            formItems.append('quantity' , t.quantity);
            formItems.append('images' , arrImagesEdit);
          } ,
          removeImage : function(id ,img){
            swalLoading("Deleting image. Please wait.")
            var formImage = new FormData();
            formImage.append('id' , id);
            formImage.append('img' , img);
            axios.post('/admin/upload/delete/image/product' , formImage).then(function (response) {
              swalSuccess("Successfully saved.")
              inventoryList.loadList()
              $("#EditItemModal").modal('hide')

            }).catch(function (error) {
              swalWentWrong();
            }).finally(function(response) {

            });
          }

        }
      });

      new Vue({el  : "#nv-inventory-edit"});

      $("#EditItemModal").modal();
      // $("#productTypeEdit").val(type_id);
      $(document).ready(function() {
          new Dropzone("#dropzoneItemEdit", {
            url: '/admin/upload/new/image/products',
            renameFile: function(file) {
                  var dt = new Date();
                  var time = dt.getTime();
                 return time+file.name;
              },
              acceptedFiles: ".jpeg,.jpg,.png,.gif",
              addRemoveLinks: true,
              maxFiles: 10 ,
              removedfile: function(file)
              {
                  var name = file.upload.filename;
                  var inx = arrImagesEdit.indexOf('"'+name+'"');
                  arrImagesEdit.splice(inx, 1);
                  var form_media = {
                    filename : name
                  };
                  axios.post('/admin/upload/delete/image/products' , form_media).then(
                    function(response) {

                    }
                  ).catch(function(error) {
                    swalWentWrong();
                  }).finally(function (response) {

                  });

                  var fileRef;
                  return (fileRef = file.previewElement) != null ?
                  fileRef.parentNode.removeChild(file.previewElement) : void 0;
              },
              success: function(file, response)
              {
                  //console.log(response);
                  arrImagesEdit.push(response);


              },
              init: function() {}
          });
      });
    }
  }
});
inventoryList.loadList(0,5);
