new Vue({
  el : '#nv-carousel' ,
  data :{
    featuredList : []
  } ,
  methods :{
    loadFeatured : function () {
      const  t = this;
      axios.
      get('/admin/featured/list/'+featuredType).
      then(function(response) {
        t.featuredList = response.data;
      }).catch(function(error) {
        swalWentWrong(error);
      })
    } ,
    getFeaturedImagesPath: function(img){
      return window.location.origin + "/uploads/images/featured/"+img;
    },
  },
  mounted (){
    this.loadFeatured();
  }
})
