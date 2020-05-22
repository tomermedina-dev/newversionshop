var warrantyActive = new Vue({
  el : "#nv-sw-active" ,
  data : {
    warrantyList : []
  } ,
  methods : {
    loadActiveWarranty : function () {
      const t  = this;
      axios.
      get('/admin/job/warranty/list/active').
      then(function (response) {
        t.warrantyList = response.data;
      }).catch(function(error) {
        swalWentWrong(error);
      });
    } ,
    pad : function (value) {
      return pad(value , 10);
    } ,
    voidWarranty : function(id) {
      var warrantyId = this.pad(id);
      Swal.fire({
        showConfirmButton: false,
        allowEscapeKey : false ,
        allowOutsideClick : false ,
        showCloseButton : true ,
        html: `
        <style>
         .datepicker.dropdown-menu{
           z-index:9999999 !important;
         }
       </style>
        <div class="p-2">
           <h3 class="nv-font-bc">Void Warranty</h3>
           <h4 class="float-left" >Warranty ID : `+warrantyId+` </h4>
           <br>
           <br>
          <div class="form-group">
            <label class="float-left">Void Reason</label>
            <input class="nv-input-custom form-control" id="void_reason" type="text" >
          </div>
          <button  onclick="warrantyActive.submitVoidWarranty( `+warrantyId+` )"    type="button" class="float-left btn nv-btn-txt-white nv-font-bc" >
            Submit Void Warranty
          </button>
          <br>
          <div class="nv-error-msg">
          </div>
        </div>
        `
      })
    } ,
    submitVoidWarranty : function(id) {
      const t  = this;
      var voidReason = $("#void_reason").val();

      if(!voidReason.trim()){
        $(".nv-error-msg").append('<br><div class="swal2-validation-message" id="swal2-validation-message" style="display: flex;">Please enter void reason.</div>');
      }else{

        var data = new FormData();
        data.append('id' , t.pad(id));
        data.append('void_reason' , voidReason);
        swalLoading("Voiding warranty.. Please wait..");
         
        axios.
        post('/admin/job/warranty/void' , data).
        then(function (response) {
          swalSuccess("Warrant has been voided.");
          t.loadActiveWarranty();
        }).catch(function(error) {
          swalWentWrong(error);
        });
      }

    }
  } ,
  mounted (){
    this.loadActiveWarranty();
  }
})
