var jobOrderHistory = new Vue ({
  el : "#nv-jo-list-details" ,
  data : {
    jobOrderList : [] ,
    employeeId  : '' ,
    notes : '' ,
    employeeList : [] ,
    assignedEmployee : [] ,
    totalAmount : totals
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
    setAssign : function() {
      swalLoading("Saving.. Please wait..");
      const t  = this;
      var assignmentDetails = new FormData();
      if(!t.employeeId){
        swalWarning("Please select employee first.")
      }else{
        assignmentDetails.append('job_order_id' , t.pad(joID));
        assignmentDetails.append('employee_id' , t.employeeId);
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
    getAssignedEmployee : function() {
      const t  = this;
      axios.
      get('/admin/job/assignment/'+t.pad(joID)).
      then(function (response) {
        t.assignedEmployee = response.data;
        var qrValue = window.location.hostname + "-qr-job-"+ t.pad(t.assignedEmployee.id)+'-'+t.assignedEmployee.job_order_id+'-'+t.assignedEmployee.employee_id;
        getQRImage(qrValue);

        // getQRImage('assignid_'t.assignedEmployee.id+'joid_'+t.assignedEmployee.job_order_id+'empid_'+t.assignedEmployee.employee_id);
      }).catch(function(error) {
        swalWentWrong(error);
      });
    },
    pad : function(value) {
      return pad(value , 10);
    }
  } ,
  mounted (){
    this.loadJobOrderItems();
    this.getEmployees();
    this.getAssignedEmployee();

  }
});
