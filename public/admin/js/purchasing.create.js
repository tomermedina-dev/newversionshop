var currentSelectedIndex ;
var jobOrder =
new Vue({
  el: "#nv-po-content" ,
  data : {
    invoice : '' ,
    notes : '' ,
    supplier : '' ,
    purchaseDate : '' ,
    totalAmount : ''

  } ,
  methods : {
    newLabor : function() {

      const t = this ;
      t.jobItemsCtr ++;
      var servicesOption = $("#service-list").html();
      var productOption = $("#product-list").html();
      var laborItemHTML = `<tr id="job_`+t.jobItemsCtr+`">
        <td class="nv-font-bc" scope="col">
            <input class="w-100"   type="text" name="item[]"   >
        </td>
        <td class="nv-font-bc" scope="col">
            <input   class="w-100"     type="text" name="description[]"    >
        </td>
        <td class="nv-font-bc" scope="col">
          <input    onkeyup="return isNumber(event)"   type="text" name="quantity[]"  value="0" >
        </td>
        <td class="nv-font-bc" scope="col">
          <input    type="text" name="unit_price[]"   >
        </td>
        <td>
          <button onclick="jobOrder.removeJob(`+t.jobItemsCtr+`)"  type="button"  class="btn btn-sm nv-btn-txt-dark nv-font-bc">
            <i class="fas fa-trash"></i>
          </button>
        </td>
      </tr>`;



      $("#labor-list").append(laborItemHTML);

    } ,
    removeJob: function (index) {
      const t = this;
      $("#job_"+index).remove();
      // t.jobItemsCtr --;
    },
    isSameIndex : function () {
      const t = this;
      var jobCtr = $("select[name='labor[]']").map(function(){return this.value ;}).get();
      jobCtr = jobCtr.length == 1 ? 0 : jobCtr.length - 1;
      var res ;
      if(jobCtr != t.jobItemsCtr){
        return false ;
      }else{
        return true;
      }

    },
    numberWithCommas : function(x) {
      return numberWithCommas(x);
    },
    submitPO : function () {
      const t = this;
      var err;
      var enteredDate = $("#purchase_date").val();
      t.purchaseDate = enteredDate;
      if(!t.totalAmount.trim()){
        swalError("Please enter total amount.");
        err = 1;
      }
      if(!t.purchaseDate.trim()){
        swalError("Please enter purchase date.");
        err = 1;
      }
      if(!t.supplier.trim()){
        swalError("Please enter supplier name.");
        err = 1;
      }
      if(!t.invoice.trim()){
        swalError("Please enter invoice #.");
        err = 1;
      }
      if(err != 1){
        swalLoading("Saving PO.. Please wait..");

        var purchaseDetails = new FormData();


        var item = $("input[name='item[]']").map(function(){return this.value ;}).get();
        var description = $("input[name='description[]']").map(function(){return this.value ;}).get();
        var quantity = $("input[name='quantity[]']").map(function(){return this.value ;}).get();
        var unit_price = $("input[name='unit_price[]']").map(function(){return this.value ;}).get();


        purchaseDetails.append('item', item);
        purchaseDetails.append('description', description);
        purchaseDetails.append('quantity', quantity);
        purchaseDetails.append('unit_price', unit_price);
        purchaseDetails.append('invoice_id', t.invoice);
        purchaseDetails.append('total_amount', t.totalAmount);
        purchaseDetails.append('supplier' , t.supplier);
        purchaseDetails.append('notes' , t.notes);
        purchaseDetails.append('purchase_date' , t.purchaseDate);

        axios.
        post('/admin/purchasing/new' , purchaseDetails).
        then(function (response) {
          swalSuccess("New PO has been added.");
          window.setTimeout(window.location.href = '/admin/page/purchasing.list', 2500);
        }).catch(function (error) {
          swalWentWrong(error);
        });
      }

    }
  }
});
$(".nv-table").on("click", "tbody tr", function() {
   currentSelectedIndex = $(this).index();
});
$('#purchase_date').datepicker();
