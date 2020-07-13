var jobAction = '';
var jobActionData = {};
var timeInChecker = 0;
var jobOrderHistory = new Vue ({
  el : "#nv-jo-time-log" ,
  data : {
    jobOrderList : []  ,
    start : '' ,
    end : '' ,
    timeInChecker : '' ,
    assignedEmployee : [] ,
  } ,
  methods : {

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
    getAssignedEmployee : function() {
      const t  = this;
      axios.
      get('/admin/job/assignment/'+t.pad(joID)).
      then(function (response) {
        t.assignedEmployee = response.data;
        var temp ;
        if(!t.assignedEmployee.start || !t.assignedEmployee.end){
          if(t.assignedEmployee.start){
            temp = 'end';
            $("#nv-job-action-btn .card-body").html("<h1>Click to End Job</h1>");

          }else {
            temp = 'start';
            $("#nv-job-action-btn .card-body").html("<h1> Click to Start Job </h1>");
          }

          $("#nv-job-action-btn").show();
        }
        if(t.assignedEmployee.end){
          window.location.href = '/admin/dashboard/home';
        }
        jobAction = temp;

        jobActionData = {
          'action' :jobAction ,
          'assignmentId' :  t.pad(t.assignedEmployee.id) ,
          'jobId' : t.assignedEmployee.job_order_id,
          'employeeId' : t.assignedEmployee.employee_id
        };
        t.start = t.assignedEmployee.start;
        t.end = t.assignedEmployee.end;
        t.getCurrentDateTimeHistory( t.assignedEmployee.employee_id  ,t.pad(t.assignedEmployee.id) ,   t.assignedEmployee.job_order_id);

       }).catch(function(error) {
        swalWentWrong(error);
      });

    },
    pad : function(value) {
      return pad(parseInt(value) , 10);
    } ,
    submitJobAction : function () {
      const t = this;
      swalLoading("Setting job time " + jobAction+ ".. Please wait..")
      axios.post('/admin/qr/job/scan' , jobActionData).
      then(function (response) {

          window.setTimeout(window.location.href = '', 2500);
      }).catch(function (error) {
        swalWentWrong(error);
      });
    } ,
    submitTimeHistory : function (action ,assignment_id , employee_id  , job_id) {
      var data = {};
      const t = this;
      if(action == 'in'){
        data = {
          'employee_id' : employee_id ,
          'assignment_id' : assignment_id ,
          'job_id' : job_id
        };
      }else {
        data = {
          'id' : this.timeInChecker ,
        }
      }

      axios.post('/admin/job/time/history/new' , data).
      then(function (response) {
        swalSuccess("Time-" + action + " has been saved.")
        window.setTimeout(window.location.href = '', 2500);
      }).catch(function (error) {
        swalWentWrong(error);
      });

    } ,
    getCurrentDateTimeHistory : function (employee_id , assignment_id ,job_id ) {
      const t = this;
      axios.get('/admin/job/time/history/current-day/'+ employee_id + '/' + assignment_id+ '/' + job_id).
      then(function (response) {
        t.timeInChecker = response.data;
        if(t.timeInChecker != 'X'){
          if(t.timeInChecker == 0){
            $("#nv-job-start-day").show();
          }else {
            $("#nv-job-end-day").show();
          }
        }

      }).catch(function (error) {
        swalWentWrong(error);
      });
    }
  } ,
  mounted (){
    this.loadJobOrderItems();
    this.getAssignedEmployee();
  }
});
