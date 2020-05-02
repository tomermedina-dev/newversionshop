var checklistDetails = new FormData();
var baseURL = '/admin/checklist';
var checklist = new Vue({
  el : "#nv-vcm-content-details" ,
  data : {

  } ,
  methods : {


  }
}) ;
var arrCheckInputs = checkboxItems.split(",");
for (var i = 0; i < arrCheckInputs.length; i++) {
  console.log();
  $("#"+arrCheckInputs[i]).prop("checked", true);
}
