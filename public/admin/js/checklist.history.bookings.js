var workrepair = $("#workrepair").val();
var service = $("#service").val();
var restoration = $("#restoration").val();
var checklistDetails = new FormData();


var baseURL = '/admin/checklist';
var checklistList = new Vue({
  el : "#nv-cvm-content-list" ,
  data :{
    checklistList : []
  } ,
  methods : {
    loadCheckList : function(){
      const t  = this;
      axios.
      get(baseURL +'/list/all/Booking').
      then(function(response) {
        t.checklistList = response.data;
      }).catch(function (error) {
        swalWentWrong(error);
      });
    } ,
    pad : function (value) {
      return pad(value , 10);
    } ,
    deleteCheckList : function (checkListId) {
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
            'id' : checkListId
          }
          swalLoading("Deleting.. Please wait..")
          axios.
          post('/admin/checklist/delete' , data).
          then(function (response) {
            swalSuccess("Checklist has been deleted.");
            t.loadCheckList();
          }).catch(function(error) {
            swalWentWrong(error);
          });
        }
      });
    }
  } ,
  mounted : function (){
    this.loadCheckList();
  }
})
