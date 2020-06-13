new Vue({
  el : "#nv-ps-content" ,
  data : {
    percentage : "" ,
    description : ""
  } ,
  methods : {
    savePromo : function () {
      productId = pad(productId , 10);
      var startDate = $("#promo_date_start").val();
      var endDate = $("#promo_date_end").val();
      var err ;



      if(!endDate){
        swalError("Please enter promo end date.")
        err = 1;
      }
      if(!startDate){
        swalError("Please enter promo start date.")
        err = 1;
      }
      if(!percentage){
        swalError("Please enter percentage.");
        err = 1;
      }
      if(err != 1){
         this.percentage =  this.percentage.replace('.' , '');
         this.percentage = '.' + this.percentage;
        var data = {
          'product_id' : productId ,
          'start' : startDate ,
          'end' : endDate ,
          'percentage' : this.percentage ,
          'description' : this.description
        }
        swalLoading("Saving promo.. Please wait..")
        axios.post("/admin/promo/new" ,data).
        then(function(response) {
          swalSuccess("Promo has been saved.")
          window.setTimeout(window.location.href='/admin/page/promo.list', 2500);
        }).catch(function(error) {
          swalWentWrong(error);
        });
      }


    }
  }
});

$('#promo_date_start').datepicker({ beforeShowDay: available });
$('#promo_date_end').datepicker({ beforeShowDay: available });
