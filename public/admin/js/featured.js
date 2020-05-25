var featuredImage = '';
new Vue({
  el : ".nv-fp-content" ,
  data : {
    title : '' ,
    description : '' ,
    type : 'Products' ,
    featuredList : []
  } ,
  methods : {
    loadFeatured : function () {
      const t = this;
      axios.get('/admin/featured/list' ).
      then(function(response) {
        t.featuredList = response.data;
      }).catch(function(error) {
        swalWentWrong(error);
      });
    },
    getFeaturedImagesPath: function(img){
      return window.location.origin + "/uploads/images/featured/"+img;
    },
    pad : function (value) {
      return pad(value , 10);
    },
    changeStatus : function (status , id) {
      var setStatus ;
      if (status == 0){
        setStatus = 1;
      }else{
        setStatus = 0 ;
      }
      axios.
      get('/admin/featured/edit/status/'+id+'/'+setStatus)
      .then(function(response) {
        swalSuccess("Status has been changed.")
      }).catch(function(error) {
        swalWentWrong();
      }).finally(function(response) { });
    },
    deleteFeatured : function(id) {
      const t = this;
      axios.
      get('/admin/featured/delete/'+id)
      .then(function(response) {
        swalSuccess("Featured has been deleted.");
        t.loadFeatured();
      }).catch(function(error) {
        swalWentWrong();
      }).finally(function(response) { });
    },
    saveItem : function() {
      const t = this;
      if(!t.title.trim()){
        swalError("Please enter title.");
      }else if(!t.description.trim()){
        swalError("Please enter description.");
      }else if(featuredImage == ''){
        swalError("Please upload featured image");
      }else{
        var data = {
          'type' : t.type ,
          'title' : t.title ,
          'description' : t.description ,
          'image' : featuredImage
        };
        axios.post('/admin/featured/new' , data).
        then(function(response) {
          swalSuccess("Featured has been saved.");
          t.title = '';
          t.description = '';
          t.type = "Products";
          $("#addItemModal").modal('hide');
            t.loadFeatured();
        }).catch(function(error) {
          swalWentWrong(error);
        });
      }
    }
  } ,
  mounted  () {
    this.type = "Products";
    this.loadFeatured();
  }
});
Dropzone.options.dropzoneItem = {
    url: '/admin/upload/new/image/featured',
    renameFile: function(file) {
        var dt = new Date();
        var time = dt.getTime();
        return time + file.name;
    },
    acceptedFiles: ".jpeg,.jpg,.png,.gif",
    addRemoveLinks: true,
    maxFiles: 1,
    removedfile: function(file) {
        var name = featuredImage;
        featuredImage = '';
        var form_media = {
            filename: name
        };
        axios.post('/admin/upload/delete/image/featured', form_media).then(function(response) {}).catch(function(error) {
            swalWentWrong();
        }).finally(function(response) {});

        var fileRef;
        return (fileRef = file.previewElement) != null ?
            fileRef.parentNode.removeChild(file.previewElement) : void 0;
    },
    success: function(file, response) {
        featuredImage = response;
        featuredImage = featuredImage.substring(0, featuredImage.length - 1);
        featuredImage = featuredImage.substring(1);
    },
    init: function() {}
};
