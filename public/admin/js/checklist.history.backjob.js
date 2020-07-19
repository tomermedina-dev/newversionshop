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
      get(baseURL +'/list/all/Back-Job').
      then(function(response) {
        t.checklistList = response.data;
      }).catch(function (error) {
        swalWentWrong(error);
      });
    } ,
    pad : function (value) {
      return pad(value , 10);
    }
  } ,
  mounted : function (){
    this.loadCheckList();
  }
})
