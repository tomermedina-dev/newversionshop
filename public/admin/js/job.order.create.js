var currentSelectedIndex ;
var jobOrder =
new Vue({
  el: "#nv-jo-content" ,
  data : {
    productList:[] ,
    serviceList : [] ,
    jobItemsCtr : 0 ,
    notes : ''

  } ,
  methods : {
    loadProducts : function() {
      const t = this;
      axios.
      get('/admin/products/all').
      then(function(response) {
        t.productList = response.data;
      }).catch(function(error) {
        swalWentWrong(error);
      });
    } ,
    loadServices : function () {
      const t = this;
      axios.
      get('/admin/services/all').
      then(function(response) {
        t.serviceList = response.data;
      }).catch(function(error) {
        swalWentWrong(error);
      });
    } ,
    newLabor : function(action) {

      const t = this ;
      t.jobItemsCtr ++;
      var servicesOption = $("#service-list").html();
      var productOption = $("#product-list").html();
      var laborItemHTML = '';
      if(action == 'manual'){
        laborItemHTML = `<tr id="job_`+t.jobItemsCtr+`">

        <td class="nv-font-bc" scope="col">
          <input name="customLabor[]" type="hidden" value="manualInput" placeholder="Enter product name"    >
        </td>
        <td class="nv-font-bc" scope="col">
          <input name="customProduct[]" type="text"   placeholder="Enter product name"    >
        </td>
        <td class="nv-font-bc" scope="col">
          <input  onkeyup='jobOrder.setAmountCustom()'  name="customQuantity[]" type="text" placeholder="Enter quantity"  >
        </td>
        <td class="nv-font-bc" scope="col">
          <input  onkeyup='jobOrder.setAmountCustom()'   name="customUnit_price[]"  type="text" placeholder="Enter price"  >
        </td>
        <td class="nv-font-bc" scope="col">
          <input  name="customAmount[]" type="text" value="0"   >
        </td>
        <td>
          <button onclick="jobOrder.removeJob(`+t.jobItemsCtr+`)"  type="button"  class="btn btn-sm nv-btn-txt-dark nv-font-bc">
            <i class="fas fa-trash"></i>
          </button>
        </td>
      </tr>`;
        $("#labor-list-manual").append(laborItemHTML);
      }else {
        laborItemHTML = `<tr id="job_`+t.jobItemsCtr+`">

        <td class="nv-font-bc" scope="col">
          <div class="form-group">
            <select onchange='jobOrder.setAmount()'  name="labor[]"  class="custom-select"  >
              `+servicesOption+`
            </select>
          </div>
        </td>
        <td class="nv-font-bc" scope="col">
          <div class="form-group">
            <select onchange='jobOrder.setUnitPrice()' name="product[]"  class="custom-select"  >
              `+productOption+`
            </select>
          </div>
        </td>
        <td class="nv-font-bc" scope="col">
          <input disabled onkeyup='jobOrder.setAmount()'  name="quantity[]" type="text" value="0"    >
        </td>
        <td class="nv-font-bc" scope="col">
          <input disabled name="unit_price[]"  type="text" value="0"  >
        </td>
        <td class="nv-font-bc" scope="col">
          <input disabled name="amount[]"type="text" value="0"   >
        </td>
        <td>
          <button onclick="jobOrder.removeJob(`+t.jobItemsCtr+`)"  type="button"  class="btn btn-sm nv-btn-txt-dark nv-font-bc">
            <i class="fas fa-trash"></i>
          </button>
        </td>
      </tr>`;
        $("#labor-list").append(laborItemHTML);

      }





    } ,
    newLaborManual  : function() {

    },
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
    setUnitPrice : function () {
      const t = this;
      var index = currentSelectedIndex;
      var servicePrice  = t.selectedServicePrice(index);
      // if(!servicePrice){
      //   swalWarning("Please select service / labor first.");
      //   $("select[name='product[]']").eq(index).val('0*0');
      // }else{}
        $("input[name='quantity[]']").eq(index).prop("disabled", false);
        var productDetails = $("select[name='product[]']").eq(index).val();
        var price  = productDetails.split('*');
        price = price[1];
        $("input[name='unit_price[]']").eq(index).val(price);

        var quantity = $("input[name='quantity[]']").eq(index).val();
        var unitPrice = $("input[name='unit_price[]']").eq(index).val();
        t.setAmount(index);
        // $("input[name='amount[]']").eq(index).val((parseInt(unitPrice) * parseInt(quantity)) + parseInt(servicePrice));



    } ,
    setAmount : function () {
      var index = currentSelectedIndex;
      const t = this;
      var servicePrice  = parseInt(t.selectedServicePrice(index));
      var quantity = parseInt($("input[name='quantity[]']").eq(index).val());
      var unitPrice = parseInt($("input[name='unit_price[]']").eq(index).val());
      if(quantity == '' || !quantity){
        quantity = 0;
      }

      $("input[name='amount[]']").eq(index).val((unitPrice * quantity) + servicePrice);
    },
    setAmountCustom : function () {
      var index = currentSelectedIndex;
      const t = this;
      console.log(index);
      var quantity = parseInt($("input[name='customQuantity[]']").eq(index).val());
      var unitPrice = parseInt($("input[name='customUnit_price[]']").eq(index).val());

      if(quantity == '' || !quantity){
        quantity = 0;
      }
      if(unitPrice == '' || !unitPrice){
        unitPrice = 0;
      }

      $("input[name='customAmount[]']").eq(index).val((unitPrice * quantity) );
    },
    selectedServicePrice : function () {
      var index = currentSelectedIndex;
      var serviceDetails = $("select[name='labor[]']").eq(index).val();
      var serviceDetails  = serviceDetails.split('*');
      var id = serviceDetails[0];
      return serviceDetails[1];
    }
    ,
    numberWithCommas : function(x) {
      return numberWithCommas(x);
    },
    submitJobOrder : function () {
      var err;
      var tempQuantity = parseInt($("input[name='quantity[]']").eq(0).val());
      var tempUnitPrice = parseInt($("input[name='unit_price[]']").eq(0).val());
      var tempServiceDetails = $("select[name='labor[]']").eq(0).val();
      var tempServiceDetails  = tempServiceDetails.split('*');
      var tempServiceId = tempServiceDetails[0];

      var tempProductDetails = $("select[name='product[]']").eq(0).val();
      var tempProductDetails  = tempProductDetails.split('*');
      var tempProductId = tempProductDetails[0];
      // if(tempProductId == 0 && tempServiceId == 0){
      //   swalWarning("Please select atlease one labor / service or a product.");
      //   err = 1;
      // }

      if(err != 1){
        swalLoading("Saving job order.. Please wait..");
        const t = this;
        var jobOrderDetails = new FormData();
        var labor = $("select[name='labor[]']").map(function(){
          var tempLabor = this.value;
          tempLabor = tempLabor.split('*');
          return pad(tempLabor[0],10) ;
        }).get();

        var product = $("select[name='product[]']").map(function(){
          var tempProduct = this.value ;
          tempProduct = tempProduct.split('*');
          return pad(tempProduct[0],10)  ;
        }).get();

        var quantity = $("input[name='quantity[]']").map(function(){return this.value ;}).get();
        var unit_price = $("input[name='unit_price[]']").map(function(){return this.value ;}).get();
        var amount = $("input[name='amount[]']").map(function(){return this.value ;}).get();

        var manualLabor = $("input[name='customLabor[]']").map(function(){return this.value ;}).get();
        var manualProduct = $("input[name='customProduct[]']").map(function(){return this.value ;}).get();
        var manualQuantity = $("input[name='customQuantity[]']").map(function(){return this.value ;}).get();
        var manualUnit_price = $("input[name='customUnit_price[]']").map(function(){return this.value ;}).get();
        var manualAmount = $("input[name='customAmount[]']").map(function(){return this.value ;}).get();


        jobOrderDetails.append('labor', labor + ',' + manualLabor);
        jobOrderDetails.append('product', product + ',' + manualProduct);
        jobOrderDetails.append('quantity', quantity+ ',' +manualQuantity);
        jobOrderDetails.append('unit_price', unit_price+ ',' +manualUnit_price);
        jobOrderDetails.append('amount', amount+ ',' +manualAmount);
        jobOrderDetails.append('client_id' , client_id);
        jobOrderDetails.append('client_name' , client_name);
        jobOrderDetails.append('notes' , t.notes);
        jobOrderDetails.append('checklist_id' , pad(checklist_id , 10));
        axios.
        post('/admin/job/new' , jobOrderDetails).
        then(function (response) {
          swalSuccess("Job order has been saved.");
          window.setTimeout(window.location.href = '/admin/page/job.unassigned', 2500);
        }).catch(function (error) {
          swalWentWrong(error);
        });
      }

    }
  } ,
  mounted (){
    this.loadProducts();
    this.loadServices();
  }
});
$(".nv-table").on("click", "tbody tr", function() {
   currentSelectedIndex = $(this).index();
});
