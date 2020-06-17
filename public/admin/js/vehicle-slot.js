var vehicleSlot = new Vue({
  el : ".nv-vehicle-slot-content" ,
  data : {
    slotList :[]
  } ,
  methods :{
    loadSlots : function () {
      const t = this;
      axios.get('/admin/slot/list/1').
      then(function (response) {
        t.slotList = response.data;
      }).catch(function (error) {
        swalWentWrong(error);
      });
    } ,
    setColor : function(color){
      if(color == 'red'){
        return "border border-danger";
      }
      if(color == 'orange'){
        return "border-orange";
      }
      if(color == 'blue'){
        return "border border-primary";
      }
      if(color == 'yellow'){
        return "border border-warning";
      }
      if(color == 'white'){
        return "border border-white";
      }
      if(color == 'green'){
        return "border border-success";
      }
      console.log(color);
    } ,
    pad : function (value) {
      return pad(value , 10);
    },
    editSlot : function (id , title , description  , color) {
      id = pad(id , 10);
      if(description == null){
        description ='';
      }
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
           <h3 class="nv-font-bc">Request re-schedule </h3>
           <h4 class="float-left" >Slot ID : `+id+` </h4>
           <br>
           <br>
          <div class="form-group">
            <label class="float-left">Slot Name</label>
            <input  class="nv-input-custom form-control" id="slot_name" type="text" value="`+title+`">
          </div>
          <div class="form-group">
            <label class="float-left">Slot Description</label>
            <input  class="nv-input-custom form-control" id="slot_description" type="text" value="`+description+`" >
          </div>
          <div class="form-group">
            <label class="float-left">Color</label>
            <select    class="nv-input-custom form-control" id="slot_color"  >
              <option value="white">White</option>
              <option value="yellow">Yellow</option>
              <option value="green">Green</option>
              <option value="orange">Orange</option>
              <option value="blue">Blue</option>
              <option value="red">Red</option>
            </select>
          </div>

          <button  onclick="vehicleSlot.submitChanges( `+id+` )"    type="button" class="float-left btn nv-btn-txt-white nv-font-bc" >
            Submit changes
          </button>
          <br>
          <div class="nv-error-msg">
          </div>
        </div>
        `
      });
      $("#slot_color").val(color);
    } ,
    submitChanges : function (id) {
      var slot_name = $("#slot_name").val();
      var description = $("#slot_description").val();
      var color = $("#slot_color").val();

      const t = this;
      if(!slot_name.trim()){
        $(".nv-error-msg").append('<br><div class="swal2-validation-message" id="swal2-validation-message" style="display: flex;">Please enter name.</div>');
      }else{
        var data = {
          'id' : pad(id,10) ,
          'slot_name' : slot_name ,
          'description' : description ,
          'color_code' : color
        }
        swalLoading("Saving changes.. Please wait..")
        axios.post('/admin/slot/update' ,data).
        then(function(response) {
          t.loadSlots();
          swalSuccess("Changes has been saved.");
        }).catch(function(error) {
          swalWentWrong(error);
        });
      }

    } ,
    moveSlot : function (jobOrderId) {
      jobOrderId = pad(jobOrderId , 10);
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
           <h3 class="nv-font-bc">Move Slot </h3>
           <h4 class="float-left" >Job Order ID : `+jobOrderId+` </h4>
           <br>
           <br>
           <div class="form-group text-left">
             <label > Please select floor slot</label>
             <select  class="custom-select"  id="slot-list"></select>
           </div>
          <button  onclick="vehicleSlot.submitMoveSlot( `+jobOrderId+` )"    type="button" class="float-left btn nv-btn-txt-white nv-font-bc" >
            Submit changes
          </button>
          <br>
          <div class="nv-error-msg">
          </div>
        </div>
        `
      });
      axios.
      get('/admin/slot/list/2').
      then(function (response) {
        var slotList =  response.data;
        for (var i = 0; i < slotList.length; i++) {
          // console.log();
          $("#slot-list").append("<option value="+pad(slotList[i].id,10)+">"+slotList[i].slot_name+"</option>");
        }
      }).catch(function(error) {
        swalWentWrong(error);
      });
    } ,
    submitMoveSlot : function (jobOrderId) {
      const t = this;
      var slotId = pad($("#slot-list").val() , 10);

      var data = {
        'job_order_id' : jobOrderId ,
        'slot_id' : slotId
      };
      axios.post('/admin/job/slot/new' , data).
      then(function (response) {
        t.loadSlots();
        swalSuccess("Slot has been changed.");
      }).catch(function (error) {

      });
    }
  } ,
  mounted (){
    this.loadSlots();
  }
})
