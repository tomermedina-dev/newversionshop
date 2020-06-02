var workrepair = $("#workrepair").val();
var service = $("#service").val();
var restoration = $("#restoration").val();
var checklistDetails = new FormData();


var baseURL = '/admin/checklist';
var checklist = new Vue({
  el : "#nv-vcm-content" ,
  data : {
    name : name,
    serviceId : serviceId ,
    contact : contact ,
    order_dt_time : order_dt_time ,
    order_received : "" ,
    order_dt_time : "" ,
    date_promised : "" ,
    actual_date : "" ,
    notes : notes ,
    odometer_reading : "" ,
    make_model : "" ,
    fuel_level : "" ,
    personal_items : "" ,
    type : "" ,
    client_id : client_id ,
    checkbox_items : []
  } ,
  methods : {
    getFieldValue : function() {
      const t = this;
      checklistDetails.append('client_id' , t.client_id);
      checklistDetails.append('client_name' ,t.name );
      checklistDetails.append('order_number' , t.serviceId );
      checklistDetails.append('contact' , t.contact );
      checklistDetails.append('order_received' ,  t.order_received);
      checklistDetails.append('order_dt_time' , t.order_dt_time);
      checklistDetails.append('order_dt_promised' , t.date_promised );
      checklistDetails.append('order_actual_dt' ,  t.actual_date);
      checklistDetails.append('odometer_reading' , t.odometer_reading );
      checklistDetails.append('fuel_level' , t.fuel_level);
      checklistDetails.append('make_model' ,t.make_model);
      checklistDetails.append('personal_items' , t.personal_items);
      checklistDetails.append('checkbox_items' , t.checkbox_items);
      checklistDetails.append('notes' , t.notes);
      checklistDetails.append('type' , t.type);
      checkbox_items = [];

    } ,
    submitChecklist : function () {
      this.getFieldValue();
      axios.
      post(baseURL +'/new' ,checklistDetails).then(function () {
        swalSuccess("Checklist has been saved.");
        window.setTimeout(window.location.href='/admin/page/checklist.list', 2500);
      }).catch(function(error) {
        swalWentWrong();
      });
      checklistDetails = new FormData();
    },
    addCheckboxItem : function (value) {
      const t = this;
      var inx =  t.checkbox_items.indexOf(value);
      if (inx !== -1){
           t.checkbox_items.splice(inx, 1);
      }else {
           t.checkbox_items.push(value);
      }
    },
    saveAndPrint : function () {
        //Insert saving here

        window.location.replace("/admin/pdf/checklist/new/" + window.id) //Call this after a successful save.
    }

  }
}) ;

