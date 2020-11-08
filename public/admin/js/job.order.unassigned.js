var jobOrderUnassigned = new Vue ({
  el : "#nv-jo-list-unassigned" ,
  data : {
    jobOrderList : []
  } ,
  methods : {
    loadJobOrders : function(){
      const t  = this;
      axios.
      get('/admin/job/list/unassigned').
      then(function (response) {
        t.jobOrderList = response.data;
      }).catch(function(error) {
        swalWentWrong(error);
      });

    } ,
    pad : function(value) {
      return pad(value , 10);
    },
    deleteJo : function (jobId) {
      const t  = this;
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then(function (result)   {
        if (result.value) {
          var data = {
            'id' : t.pad(jobId)
          }
          swalLoading("Deleting.. Please wait..")
          axios.
          post('/admin/job/delete' , data).
          then(function (response) {
            swalSuccess("Job Order has been deleted.");
            t.loadJobOrders();
          }).catch(function(error) {
            swalWentWrong(error);
          });
        }
      });
    }
  } ,
  mounted (){
    this.loadJobOrders();
  }
})
