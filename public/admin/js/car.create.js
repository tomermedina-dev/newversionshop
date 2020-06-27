var curr_img = "";
var arr_categories = [];
var arrImages = [];
var arrImagesEdit = [];
var formItems = new FormData();

var addItem = new Vue({
  el : "#nv-add-car" ,
  data : {
    car_manufacturer : car_manufacturer ,
    car_model : car_model ,
    color : color ,
    price : price ,
    description : description  ,
    imageList : ''
  },
  methods : {
    saveItem : function () {
      const t = this;
      if(!t.car_manufacturer.trim()){
        swalError("Please enter car manufacturer.");
      }else if(!t.car_model.trim()){
          swalError("Please enter car model.");
      }else if(!t.color.trim()){
          swalError("Please enter car color.");
      }else if(!t.description.trim()){
          swalError("Please enter description.");
      }else{
        this.getFieldValue();
        swalLoading("Saving car details. Please wait.")
        var url = '/admin/car/new';
        if (page == 'edit') {
          formItems.append('carId' , carId);
           url = '/admin/car/edit';
        }else {
          url = '/admin/car/new';
        }
        axios.post(url , formItems).then(function (response) {
          swalSuccess("Successfully saved.")
          window.setTimeout(window.location.href='/admin/page/car.index', 2500);

        }).catch(function (error) {
          swalWentWrong();
        }).finally(function(response) {});
      }



    } ,
    getFieldValue : function() {

      const t = this;
      formItems.append('car_manufacturer' , t.car_manufacturer);
      formItems.append('car_model' , t.car_model);
      formItems.append('color' , t.color);
      formItems.append('price' , t.price);
      formItems.append('description' , t.description);
      formItems.append('images' , arrImages);
      formItems.append('details', tinyMCE.activeEditor.getContent());
    } ,
    getCarImagesPath: function(img){
      return window.location.origin + "/uploads/images/cars/"+img;
    } ,
    removeImage : function(id ,img){
      const t = this;
      swalLoading("Deleting image. Please wait.")
      var formImage = new FormData();
      formImage.append('id' , id);
      formImage.append('img' , img);
      axios.post('/admin/upload/delete/image/cars' , formImage).then(function (response) {
        swalSuccess("Successfully saved.")
        $("#carImage"+id).remove();
        t.loadImage();
      }).catch(function (error) {
        swalWentWrong();
      }).finally(function(response) {

      });
    } ,
    loadImage : function () {
      const t = this;

      axios.
      get('/admin/car/image/'+ carId)
      .then(function(response) {
        t.imageList = response.data;
      }).catch(function(error) {
        swalWentWrong();
      }).finally(function(response) { });
    }
  } ,
  mounted (){
    if(page == 'edit'){
      this.loadImage();
    }
  }
});

  Dropzone.options.dropzoneItem= {
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
    var inx = arrImages.indexOf('"'+name+'"');
    arrImages.splice(inx, 1);
    var form_media = {
    filename : name
    };
    axios.post('/admin/upload/delete/image/cars' , form_media).then(
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
