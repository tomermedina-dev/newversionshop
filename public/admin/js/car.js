var curr_img = "";
var arr_categories = [];
var arrImages = [];
var arrImagesEdit = [];
var formItems = new FormData();
// Vue.component("nv-component-add-car" ,
// {
//   data :function() {
//     return {
//       car_manufacturer : "" ,
//       car_model : "" ,
//       color : "" ,
//       price : "" ,
//       description : ""
//     }
//   } ,
//   template : `<div>
//   <div class="modal-body">
//
//     <div class="row">
//     <div class="col-lg-6">
//        <div class="input-group nv-input-group-custom mb-2">
//           <div class="input-group-prepend">
//              <span class="input-group-text nv-font-c">
//              <i class="fas fa-car"></i>&nbsp;&nbsp;<small>MANUFACTURER</small></span>
//           </div>
//           <input v-model="car_manufacturer" type="text" class="form-control">
//        </div>
//        <div class="input-group nv-input-group-custom mb-2">
//           <div class="input-group-prepend">
//              <span class="input-group-text nv-font-c">
//              <i class="fas fa-car"></i>&nbsp;&nbsp;MODEL</span>
//           </div>
//           <input v-model="car_model" type="text" class="form-control">
//        </div>
//        <div class="input-group nv-input-group-custom mb-2">
//           <div class="input-group-prepend">
//              <span class="input-group-text nv-font-c">
//              <i class="fas fa-car"></i>&nbsp;&nbsp;COLOR</span>
//           </div>
//           <input v-model="color" type="text" class="form-control">
//        </div>
//
//     </div>
//      <div class="col-lg-6">
//        <div class="input-group nv-input-group-custom mb-2">
//           <div class="input-group-prepend">
//              <span class="input-group-text nv-font-c">
//              <i class="fas fa-car"></i>&nbsp;&nbsp;PRICE</span>
//           </div>
//           <input  onkeypress="return isNumber(event)"  v-model="price" type="text" class="form-control">
//        </div>
//
//
//         <div class="input-group nv-input-group-custom mb-2">
//           <div class="input-group-prepend">
//             <span class="input-group-text nv-font-c">
//               <i class="fas fa-car"></i>&nbsp;&nbsp;DESCRIPTION</span>
//           </div>
//           <input v-model="description" type="text" class="form-control">
//         </div>
//
//       </div>
//       </div>
//     <div class="container">
//       <h3>Car Image</h3>
//       <div class="dropzone" id="dropzoneItem">
//         <div class="dz-message" data-dz-message>Drop image or click to upload image</div>
//       </div>
//     </div>
//   </div>
//   <div class="modal-footer">
//     <button v-on:click="saveItem" type="button" class="btn btn-sm nv-btn-txt-dark nv-font-bc" data-toggle="modal" >
//       <i class="fas fa-forward"></i>&nbsp;
//       PROCEED
//     </button>
//   </div>
//   </div>` ,
//
//   methods : {
//     saveItem : function () {
//       const t = this;
//       if(!t.car_manufacturer.trim()){
//         swalError("Please enter car manufacturer.");
//       }else if(!t.car_model.trim()){
//           swalError("Please enter car model.");
//       }else{
//         this.getFieldValue();
//         swalLoading("Saving car details. Please wait.")
//         axios.post('/admin/car/new' , formItems).then(function (response) {
//           swalSuccess("Successfully saved.")
//           carList.loadList()
//           $("#addItemModal").modal("hide");
//         }).catch(function (error) {
//           swalWentWrong();
//         }).finally(function(response) {});
//       }
//
//
//
//     } ,
//     getFieldValue : function() {
//
//       const t = this;
//       formItems.append('car_manufacturer' , t.car_manufacturer);
//       formItems.append('car_model' , t.car_model);
//       formItems.append('color' , t.color);
//       formItems.append('price' , t.price);
//       formItems.append('description' , t.description);
//       formItems.append('images' , arrImages);
//     }
//   }
// });



var carList = new Vue ({
  el : "#nv-car-list" ,
  data : {
    carList : []
  },
  methods :{
    loadList : function() {
        const t = this;
      axios.
      // get('/admin/products/page/'+start+'/'+end)
      get('/admin/car/all')
      .then(function(response) {

        t.carList = response.data;

      }).catch(function(error) {
        swalWentWrong();
      }).finally(function(response) { });
    } ,
    getCarImagesPath: function(img){
      return window.location.origin + "/uploads/images/cars/"+img;
    },
    getFirstImage(type , id) {
      var img = "";
      axios.
      get('/admin/image/first/'+type+'/'+pad(id,10))
      .then(function(response) {
         return response.data  ;
      }).catch(function(error) {
        swalWentWrong();
      }).finally(function(response) { });

    } ,
    pad : function(value , length){
      return pad(value , length);
    },
    changeStatus : function (status , carId) {
      var setStatus ;
      if (status == 0){
        setStatus = 1;
      }else{
        setStatus = 0 ;
      }
      swalLoading("Changing status please wait..")
      axios.
      get('/admin/car/edit/status/'+carId+'/'+setStatus)
      .then(function(response) {
        swalSuccess("Status has been changed.")
      }).catch(function(error) {
        swalWentWrong();
      }).finally(function(response) { });
    } ,
    editItem : function (id , car_manufacturer ,car_model , color , price ,description) {

      if ($("#EditCarModal").get(0)){
          $("#nv-car-edit").empty();
          $("#nv-car-edit").append("<nv-component-edit-car></nv-component-edit-car>");
      }

      Vue.component('nv-component-edit-car' , {
        data :function() {
          return {
            carId : pad(id, 10) ,
            car_manufacturer : car_manufacturer ,
            car_model : car_model ,
            color : color ,
            price : price ,
            description : description ,
            imageList : []
          }
        } ,
        template:`  <div class="modal fade nv-modal" id="EditCarModal" tabindex="-1" role="dialog" aria-labelledby="addItemModalLabel" aria-hidden="true">
            <!-- <div class="nv-invisible-padding"></div> -->
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <div class="modal-title">
                  <div class="nv-title nv-font-bc">EDIT ITEM</div>
                  <div class="nv-subtitle">CAR ID : <label>{{carId}}</label></div>
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
                             <i class="fas fa-car"></i>&nbsp;&nbsp;<small>MANUFACTURER</small></span>
                          </div>
                          <input v-model="car_manufacturer" type="text" class="form-control">
                       </div>
                       <div class="input-group nv-input-group-custom mb-2">
                          <div class="input-group-prepend">
                             <span class="input-group-text nv-font-c">
                             <i class="fas fa-car"></i>&nbsp;&nbsp;MODEL</span>
                          </div>
                          <input v-model="car_model" type="text" class="form-control">
                       </div>
                       <div class="input-group nv-input-group-custom mb-2">
                          <div class="input-group-prepend">
                             <span class="input-group-text nv-font-c">
                             <i class="fas fa-car"></i>&nbsp;&nbsp;COLOR</span>
                          </div>
                          <input v-model="color" type="text" class="form-control">
                       </div>

                    </div>
                    <div class="col-lg-6">
                       <div class="input-group nv-input-group-custom mb-2">
                          <div class="input-group-prepend">
                             <span class="input-group-text nv-font-c">
                             <i class="fas fa-car"></i>&nbsp;&nbsp;PRICE</span>
                          </div>
                          <input  onkeypress="return isNumber(event)"  v-model="price" type="text" class="form-control">
                       </div>
                        <div class="input-group nv-input-group-custom mb-2">
                          <div class="input-group-prepend">
                            <span class="input-group-text nv-font-c">
                              <i class="fas fa-car"></i>&nbsp;&nbsp;DESCRIPTION</span>
                          </div>
                          <input v-model="description" type="text" class="form-control">
                        </div>

                    </div>
                    <div v-if="imageList.length > 0" class="container">
                      <h3>Current Product Image</h3>
                      <div class="container">
                      <div  style="float:left;margin:5px;" v-for="image in imageList"  >

                        <img style="width:200px;"  :src='getCarImagesPath(image.image_name)'   />
                        <br>
                        <div class="center">
                          <span class="badge badge-warning" style="cursor:pointer;" v-on:click="removeImage(image.id , image.image_name)">DELETE</span>
                        </div>
                      </div>
                      </div>
                    </div>
                    <br>
                    <div class="container" style="float:left" >
                      <h3>Add Car Image</h3>
                      <div class="dropzone" id="dropzoneItemEdit">
                        <div class="dz-message" data-dz-message>Drop image or click to upload image</div>
                      </div>
                    </div>
                  </div>
                <div class="modal-footer">
                  <button v-on:click="saveCarEdit" type="button" class="btn btn-sm nv-btn-txt-dark nv-font-bc" data-toggle="modal" >
                    <i class="fas fa-forward"></i>&nbsp;
                    PROCEED
                  </button>
                </div>
              </div>
            </div>
          </div>
          </div>` ,
        mounted (){
          const t = this;

          axios.
          get('/admin/car/image/'+t.carId)
          .then(function(response) {
            t.imageList = response.data;
          }).catch(function(error) {
            swalWentWrong();
          }).finally(function(response) { });

        },
        methods : {

          saveCarEdit : function() {
            // swalLoading("Saving.. Please wait..")
            const t = this;
            if(!t.car_manufacturer.trim()){
              swalError("Please enter car manufacturer.");
            }else if(!t.car_model.trim()){
                swalError("Please enter car model.");
            }else{
              this.getFieldValue();
              swalLoading("Saving product. Please wait.")
              axios.post('/admin/car/edit' , formItems).then(function (response) {
                swalSuccess("Successfully saved.")
                carList.loadList()
                $("#EditCarModal").modal('hide')
                arrImagesEdit = [];
              }).catch(function (error) {
                swalWentWrong();
              }).finally(function(response) {

              });
            }

          },
          getFieldValue : function() {
            const t = this;
            formItems.append('carId' , t.carId)
            formItems.append('car_manufacturer' , t.car_manufacturer);
            formItems.append('car_model' , t.car_model);
            formItems.append('color' , t.color);
            formItems.append('price' , t.price);
            formItems.append('description' , t.description);
            formItems.append('images' , arrImagesEdit);
          } ,
          removeImage : function(id ,img){
            swalLoading("Deleting image. Please wait.")
            var formImage = new FormData();
            formImage.append('id' , id);
            formImage.append('img' , img);
            axios.post('/admin/upload/delete/image/cars' , formImage).then(function (response) {
              swalSuccess("Successfully saved.")
              carList.loadList()
              $("#EditCarModal").modal('hide')

            }).catch(function (error) {
              swalWentWrong();
            }).finally(function(response) {

            });
          } ,
          getCarImagesPath: function(img){
            return window.location.origin + "/uploads/images/cars/"+img;
          }
        }
      });

      new Vue({el  : "#nv-car-edit"});

      $("#EditCarModal").modal();
      // $("#productTypeEdit").val(type_id);
      $(document).ready(function(){

     // $("#productTypeEdit").val(type_id);
       new Dropzone("#dropzoneItemEdit",  {
                   url: '/admin/upload/new/image/cars',
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
carList.loadList();
