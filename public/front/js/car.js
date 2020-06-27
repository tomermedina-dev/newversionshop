var carList = new Vue ({
  el : "#nv-car-gallery-content" ,
  data : {
    carList : []
  },
  methods :{
    loadList : function() {
        const t = this;
      axios.
      // get('/admin/products/page/'+start+'/'+end)
      get('/cars/all/1')
      .then(function(response) {
        t.carList = response.data;
      }).catch(function(error) {
        swalWentWrong();
      }).finally(function(response) { });
    } ,
    getCarImagesPath: function(img){
      return window.location.origin + "/uploads/images/cars/"+img;
    } 
  } ,
  mounted(){
    this.loadList();
  }
});
