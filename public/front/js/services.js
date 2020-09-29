$("#nav-services").addClass("active");
var serviceList = new Vue({
  el : "#nv-service-list"  ,
  data : {
    serviceList : [] ,
    searchValue : '' ,
    serviceTypes : []
  } ,
  methods :{
    loadServices : function(selectedCategory){
      console.log(selectedCategory);
      const t = this;
      axios.
      get('/services/list/by-type/'+selectedCategory).
      then(function (response) {
        t.serviceList = response.data;
      }).catch(function(error) {
        swalWentWrong();
      }).finally(function() {
        if(t.serviceList.length == 0){
          noResultMessage()
        }
      });

      axios.
      get('/services/type/all/active').
      then(function (response) {
        t.serviceTypes = response.data;
      }).catch(function(error) {
        swalWentWrong();
      }).finally(function() {});

    } ,
    numberWithCommas : function(x) {
      return numberWithCommas(x);
    } ,
    getServiceImagesPath: function(img){
      return window.location.origin + "/uploads/images/services/"+img;
    },
    visitScheduleService: function(serviceId , slug) {
      if(userId == 0){
        Swal.fire({
          html : `<div class='container'>
                    <div class="d-flex justify-content-center">
                      <div class="nv-dot-dark"  ></div>
                      <div class="nv-dot-mustard" style="margin-left:-25px;" ></div>
                    </div>
                    <h3> Please login your account to continue. </h3>
                    <div class="">
                      <div class="nv-line-divider d-flex justify-content-center" ></div>
                      <div class=" d-flex justify-content-center">
                        <div class="nv-mustard-divider" style="width:50px; margin-top:-3.5px;"></div>
                      </div>
                    </div>

                    <br>
                    <a href="/login" class="btn btn-lg nv-btn-txt-white" style="width:100%"> Log in now </a>
                    <br>
                    or
                    <br>
                    <a href="/register" class="btn btn-lg nv-btn-txt-white" style="width:100%"> Create an account </a>
                  </div>` ,
        showConfirmButton : false
        });
      }else{
        window.location.href = "/services/booking/form/"+pad(serviceId,10)+"/"+ slug.replace(" " , "-").toLowerCase();
      }

    },
    searchService : function () {
      const t = this;
      if(!t.searchValue.trim() || t.searchValue == ''){
        swalWarning("Please enter service to search");
      }else{
        axios.
        get('/services/list/search/'+t.searchValue).
        then(function (response) {
          t.serviceList = response.data;
        }).catch(function(error) {
          swalWentWrong();
        }).finally(function() {});
      }

    }
  }
});
serviceList.loadServices(selectedCategory);
