var jobOrderHistory = new Vue ({
  el : "#nv-jo-list-details" ,
  data : {
    jobOrderList : [] ,
    employeeId  : '' ,
    slotId : '' ,
    notes : '' ,
    employeeList : [] ,
    slotList : [] ,
    assignedEmployee : [] ,
    totalAmount : totals ,
    evaluation_notes : '' ,
    is_approved : 0 ,
    start : '' ,
    end : '' ,
    warrantyDate : '' ,
    warrantyDetails : []
  } ,
  methods : {
    computeTotal : function (amount) {
      this.totalAmount = this.totalAmount + parseInt(amount);
    } ,
    loadJobOrderItems : function(){
      const t  = this;
      axios.
      get('/admin/job/list/items/'+this.pad(joID)).
      then(function (response) {
        t.jobOrderList = response.data;
      }).catch(function(error) {
        swalWentWrong(error);
      });

    },
    getJobWarranty : function(){
      const t  = this;
      axios.
      get('/admin/job/warranty/'+this.pad(joID)).
      then(function (response) {
        t.warrantyDetails = response.data;
      }).catch(function(error) {
        swalWentWrong(error);
      });

    } ,
    getEmployees : function(){
      const t  = this;
      axios.
      get('/admin/employee/list/1').
      then(function (response) {
        t.employeeList = response.data;
      }).catch(function(error) {
        swalWentWrong(error);
      });

    }  ,
    getSlots : function(){
      const t  = this;
      axios.
      get('/admin/slot/list/2').
      then(function (response) {
        t.slotList = response.data;
      }).catch(function(error) {
        swalWentWrong(error);
      });

    } ,
    setAssign : function() {
      swalLoading("Saving.. Please wait..");
      const t  = this;
      var assignmentDetails = new FormData();
      if(!t.employeeId){
        swalWarning("Please select employee first.")
      }else if(!t.slotId){
        swalWarning("Please select floor slot first.")
      }
      else{
        assignmentDetails.append('job_order_id' , t.pad(joID));
        assignmentDetails.append('employee_id' , t.employeeId);
        assignmentDetails.append('slot_id' , t.slotId);
        assignmentDetails.append('notes' , t.notes);
        axios.
        post('/admin/job/assignment/new' ,assignmentDetails).
        then(function(response) {
          swalSuccess("Assignment has been saved.");
          window.setTimeout(window.location.href = '/admin/job/details/'+t.pad(joID), 2500);
        }).catch(function(error) {
          swalWentWrong(error);
        });
      }

    },
    submitEvaluation : function() {
      swalLoading("Saving.. Please wait..");
      const t  = this;
      var assignmentDetails = new FormData();
      if(!t.evaluation_notes){
        swalWarning("Please enter evaluation comments first.")
      }else{
        assignmentDetails.append('job_order_id' , t.pad(joID));
        assignmentDetails.append('employee_id' , t.assignedEmployee.employee_id);
        assignmentDetails.append('evaluation_notes' , t.evaluation_notes);
        assignmentDetails.append('warranty_start' ,getCurrentDate());
        assignmentDetails.append('warranty_end' , $("#warranty_date").val());
        axios.
        post('/admin/job/assignment/evaluate' ,assignmentDetails).
        then(function(response) {
          swalSuccess("Job has been approved and evaluated.");
          window.setTimeout(window.location.href = '/admin/job/details/'+t.pad(joID), 2500);
        }).catch(function(error) {
          swalWentWrong(error);
        });
      }
    },
    getAssignedEmployee : function() {
      const t  = this;
      axios.
      get('/admin/job/assignment/'+t.pad(joID)).
      then(function (response) {
        t.assignedEmployee = response.data;
        var qrValue = window.location.hostname + "-qr-job-"+ t.pad(t.assignedEmployee.id)+'-'+t.assignedEmployee.job_order_id+'-'+t.assignedEmployee.employee_id;
        getQRImage(qrValue);
        t.start = t.assignedEmployee.start;
        t.end = t.assignedEmployee.end;
        // getQRImage('assignid_'t.assignedEmployee.id+'joid_'+t.assignedEmployee.job_order_id+'empid_'+t.assignedEmployee.employee_id);
      }).catch(function(error) {
        swalWentWrong(error);
      });
    },
    pad : function(value) {
      return pad(parseInt(value) , 10);
    } ,
    showCalendarPicker : function () {
      $('#warranty_date').datepicker("show" , { beforeShowDay: available });
    }
  } ,
  mounted (){
    this.loadJobOrderItems();
    this.getEmployees();
    this.getAssignedEmployee();
    this.getSlots();
    this.getJobWarranty();
  }
});
