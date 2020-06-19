var currImg = "";
var arrCategories = [];
var arrImages = [];
var arrImagesEdit = [];
var formItems = new FormData();
var serviceImage ;
Vue.component('nv-component-add-service' ,
{
  data :function() {
    return {
      name : "" ,
      type : "" ,
      description : "" ,
      price : "" ,
      booking_price : "" ,
      typeList :[]
    }
  } ,
  template : `<div class="">
    <div class="modal-body">
      <div class="row">

        <div class="col-sm-6">
          <div class="form-group input-group nv-input-group-custom mb-2">
            <div  class="input-group-prepend">
              <span class="input-group-text nv-font-c">
                <i class="fas fa-tools"></i>&nbsp;&nbsp;TYPE</span>
            </div>
            <select v-model="type"   class="form-control" id="serviceType">
              <option v-for="type in typeList" :value="type.id" >{{type.type_name}}</option>
            </select>
          </div>
          <div class="input-group nv-input-group-custom mb-2">
             <div class="input-group-prepend">
                <span class="input-group-text nv-font-c">
                <i class="fas fa-tools"></i>&nbsp;&nbsp;NAME</span>
             </div>
             <input v-model="name" type="text" class="form-control">
          </div>
          <div class="input-group nv-input-group-custom mb-2">
             <div class="input-group-prepend">
                <span class="input-group-text nv-font-c">
                <i class="fas fa-tools"></i>&nbsp;&nbsp;Booking Price</span>
             </div>
             <input onkeypress="return isNumber(event)" v-model="booking_price" type="text" class="form-control">
          </div>
        </div>

        <div class="col-sm-6">
          <div class="input-group nv-input-group-custom mb-2">
             <div class="input-group-prepend">
                <span class="input-group-text nv-font-c">
                <i class="fas fa-tools"></i>&nbsp;&nbsp;Description</span>
             </div>
             <input v-model="description" type="text" class="form-control">
          </div>
          <div class="input-group nv-input-group-custom mb-2">
             <div class="input-group-prepend">
                <span class="input-group-text nv-font-c">
                <i class="fas fa-tools"></i>&nbsp;&nbsp;Price</span>
             </div>
             <input onkeypress="return isNumber(event)" v-model="price" type="text" class="form-control">
          </div>
        </div>
        <div class="container">
          <h3>Service Image</h3>
          <div class="dropzone" id="dropzoneService">
            <div class="dz-message" data-dz-message>Drop image or click to upload image</div>
          </div>
        </div>

      </div>
    </div>

    <div class="modal-footer">
      <button v-on:click="saveService" type="button" class="btn btn-sm nv-btn-txt-dark nv-font-bc" data-toggle="modal" >
        <i class="fas fa-forward"></i>&nbsp;
        PROCEED
      </button>
    </div>

  </div>` ,
  mounted (){
    const t = this;
    axios.
    get('/admin/services/type/all/active')
    .then(function(response) {

      t.typeList = response.data;

    }).catch(function(error) {
      swalWentWrong();
    }).finally(function(response) { });
    t.type = '1';
  } ,
  methods : {
    saveService : function() {

      const t = this ;
      var err ;
      if(!serviceImage || serviceImage == ''){
        swalError("Please upload service image");
        err = 1;
      }
      if(!t.price.trim()){
        swalError("Please enter price");
        err = 1;
      }
      if(!t.description.trim()){
        swalError("Please enter description");
        err = 1 ;
      }
      if(!t.name.trim()){
        swalError("Please enter service name");
        err = 1;
      }

      if(err != 1){
        swalLoading("Saving service.. Please wait..")
        t.getFieldValue();
        axios.
        post('/admin/services/new' , formItems).
        then(function(response) {
          swalSuccess("Service has been added");
          t.type = '1' ;
          t.name = '';
          t.description = '';
          t.price = '';

        }).catch(function(error) {

        }).finally(function(response) {});
        $("#addServiceModal").modal('hide');
      }

      formItems = new FormData();
      arrImages = [];
    } ,
    getFieldValue : function() {
      const t = this;
      formItems.append('type_id' , pad(t.type,10));
      formItems.append('name'  , t.name);
      formItems.append('description' , t.description);
      formItems.append('price' , t.price);
      formItems.append('booking_price' , t.booking_price);
      formItems.append('images' , serviceImage);
    }
  }
});
new Vue(
  {
    el : ".nv-add-service"
  }
);

var serviceList = new Vue({
  el : "#nv-service-list"  ,
  data : {
    serviceList : []
  } ,
  methods :{
    loadServices : function(){
      const t = this;
      axios.
      get('/admin/services/all').
      then(function (response) {
        t.serviceList = response.data;
      }).catch(function(error) {
        swalWentWrong();
      }).finally(function() {});
    } ,
    pad : function (value) {
      return pad(value , 10);
    } ,
    changeStatus : function (status , serviceId) {
      var setStatus ;
      if (status == 0){
        setStatus = 1;
      }else{
        setStatus = 0 ;
      }
      axios.
      get('/admin/services/edit/status/'+serviceId+'/'+setStatus)
      .then(function(response) {
        swalSuccess("Status has been changed.")
      }).catch(function(error) {
        swalWentWrong();
      }).finally(function(response) { });
    } ,
    getServiceImagesPath: function(img){
      return window.location.origin + "/uploads/images/services/"+img;
    } ,
    editService : function (id, service_image_id , service_image , service_categ , name , description , price , booking_price ) {
        const t = this;
        if ($("#editServiceModal").get(0)){
          $("#nv-service-edit").empty();
          $("#nv-service-edit").append("<nv-component-edit-service></nv-component-edit-service>");
        }

      Vue.component('nv-component-edit-service' ,{
        data :function() {
          return {
            serviceId : id ,
            name : name,
            type : parseInt(service_categ),
            description : description ,
            price : price,
            typeList :[] ,
            image : service_image ,
            image_id : service_image_id ,
            booking_price : booking_price
          }
        } ,
        template : `<div class="modal fade nv-modal" id="editServiceModal" tabindex="-1" role="dialog" aria-labelledby="editServiceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <div class="modal-title">
                <div class="nv-title nv-font-bc">EDIT SERVICE</div>
                <div class="nv-subtitle">Fill out the details below.</div>
              </div>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="">
              <div class="modal-body">
                <div class="row">

                  <div class="col-sm-6">
                    <div class="form-group input-group nv-input-group-custom mb-2">
                      <div  class="input-group-prepend">
                        <span class="input-group-text nv-font-c">
                          <i class="fas fa-tools"></i>&nbsp;&nbsp;TYPE</span>
                      </div>
                      <select v-model="type"   class="form-control" id="serviceType">
                        <option v-for="type in typeList" :value="type.id" >{{type.type_name}}</option>
                      </select>
                    </div>
                    <div class="input-group nv-input-group-custom mb-2">
                       <div class="input-group-prepend">
                          <span class="input-group-text nv-font-c">
                          <i class="fas fa-tools"></i>&nbsp;&nbsp;NAME</span>
                       </div>
                       <input v-model="name" type="text" class="form-control">
                    </div>
                    <div class="input-group nv-input-group-custom mb-2">
                       <div class="input-group-prepend">
                          <span class="input-group-text nv-font-c">
                          <i class="fas fa-tools"></i>&nbsp;&nbsp;Booking Price</span>
                       </div>
                       <input onkeypress="return isNumber(event)" v-model="booking_price" type="text" class="form-control">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="input-group nv-input-group-custom mb-2">
                       <div class="input-group-prepend">
                          <span class="input-group-text nv-font-c">
                          <i class="fas fa-tools"></i>&nbsp;&nbsp;Description</span>
                       </div>
                       <input v-model="description" type="text" class="form-control">
                    </div>
                    <div class="input-group nv-input-group-custom mb-2">
                       <div class="input-group-prepend">
                          <span class="input-group-text nv-font-c">
                          <i class="fas fa-tools"></i>&nbsp;&nbsp;Price</span>
                       </div>
                       <input onkeypress="return isNumber(event)" v-model="price" type="text" class="form-control">
                    </div>
                  </div>

                  <div v-if="image != null" class="container" id="nv-service-img">
                    <h3>Current Service Image</h3>
                    <div class="container">
                      <img style="width:200px;"  :src='getServiceImagesPath(image)'   />
                      <br>
                      <div class="center">
                        <span class="badge badge-warning" style="cursor:pointer;" v-on:click="removeImage(image_id , image)">DELETE</span>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="container" id="nv-dropzone-img" style="display:none;"   >
                    <h3>New Service Image</h3>
                    <div class="dropzone" id="dropzoneEditService">
                      <div class="dz-message" data-dz-message>Drop image or click to upload image</div>
                    </div>
                  </div>

                </div>
              </div>

              <div class="modal-footer">
                <button v-on:click="saveServiceChanges(serviceId)" type="button" class="btn btn-sm nv-btn-txt-dark nv-font-bc" data-toggle="modal" >
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
          get('/admin/services/type/all')
          .then(function(response) {

            t.typeList = response.data;

          }).catch(function(error) {
            swalWentWrong();
          }).finally(function(response) { });
          if(t.image == null){
            $("#nv-dropzone-img").show();
          }
        } ,
        methods :{
          saveServiceChanges : function(serviceId) {

            const t = this ;
            var err ;
            if(!t.image){
              if(!serviceImage || serviceImage ==''){
                swalError("Please upload service image");
                err = 1;
              }
            }
            if(!t.price.trim()){
              swalError("Please enter price");
              err = 1;
            }
            if(!t.description.trim()){
              swalError("Please enter description");
              err = 1 ;
            }
            if(!t.name.trim()){
              swalError("Please enter service name");
              err = 1;
            }

            if(err != 1){
              swalLoading("Saving service.. Please wait..")
              formItems.append('serviceId' , serviceId);
              t.getFieldValue();
              axios.
              post('/admin/services/edit' , formItems).
              then(function(response) {
                swalSuccess("Service has been added");
                t.type = '1' ;
                t.name = '';
                t.description = '';
                t.price = '';
                $("#editServiceModal").modal('hide');
                serviceList.loadServices();
              }).catch(function(error) {

              }).finally(function(response) {});
            }

            formItems = new FormData();
            serviceImage = '';
          } ,
          getFieldValue : function() {
            const t = this;
            formItems.append('type_id' , pad(t.type,10));
            formItems.append('name'  , t.name);
            formItems.append('description' , t.description);
            formItems.append('price' , t.price);
            formItems.append('booking_price' , t.booking_price);
            if(!t.image){
              formItems.append('images' , serviceImage);
            }
          },
          getServiceImagesPath: function(img){
            return window.location.origin + "/uploads/images/services/"+img;
          } ,
          removeImage : function(id ,img){
            swalLoading("Deleting image. Please wait.")
            var formImage = new FormData();
            formImage.append('id' , service_image_id);
            formImage.append('img' , img);
            axios.post('/admin/upload/delete/image/service' , formImage).then(function (response) {
              swalSuccess("Successfully saved.")
              serviceList.loadServices();
            }).catch(function (error) {
              swalWentWrong();
            }).finally(function(response) {

            });
            $("#nv-service-img").empty();
            $("#nv-dropzone-img").show();
          }
        }
      });

      new Vue({
        el : "#nv-service-edit"
      }) ;
      $("#editServiceModal").modal('show');
      $(document).ready(function() {
          new Dropzone("#dropzoneEditService", {
            url: '/admin/upload/new/image/services',
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
                return time + file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            maxFiles: 1,
            removedfile: function(file) {
                // var name = file.upload.filename;
                // var inx = arrImages.indexOf('"' + name + '"');
                // arrImages.splice(inx, 1);
                serviceImage = '';
                var form_media = {
                    filename: name
                };
                axios.post('/admin/upload/delete/image/services', form_media).then(
                    function(response) {}
                ).catch(function(error) {
                    swalWentWrong();
                }).finally(function(response) {});

                var fileRef;
                return (fileRef = file.previewElement) != null ?
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },
            success: function(file, response) {
                //console.log(response);
                // arrImages.push(response);
                serviceImage = response.toString();

            },
            init: function() {}
          });
      });
    }
  }
});

serviceList.loadServices();
Dropzone.options.dropzoneService = {
    url: '/admin/upload/new/image/services',
    renameFile: function(file) {
        var dt = new Date();
        var time = dt.getTime();
        return time + file.name;
    },
    acceptedFiles: ".jpeg,.jpg,.png,.gif",
    addRemoveLinks: true,
    maxFiles: 1,
    removedfile: function(file) {
        // var name = file.upload.filename;
        // var inx = arrImages.indexOf('"' + name + '"');
        // arrImages.splice(inx, 1);
        serviceImage = '';
        var form_media = {
            filename: name
        };
        axios.post('/admin/upload/delete/image/services', form_media).then(
            function(response) {

            }
        ).catch(function(error) {
            swalWentWrong();
        }).finally(function(response) {

        });

        var fileRef;
        return (fileRef = file.previewElement) != null ?
            fileRef.parentNode.removeChild(file.previewElement) : void 0;
    },
    success: function(file, response) {
        //console.log(response);
        // arrImages.push(response);
        serviceImage = response.toString();

    },
    init: function() {}
};
