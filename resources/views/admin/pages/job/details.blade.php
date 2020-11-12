@extends('admin.layout.main')

@section('content')

<link rel="stylesheet" href="{{ asset('admin/css/pages/booked-services-summary.css') }}">
<link rel="stylesheet" href="{{ asset('front/css/datepicker.css') }}">
<script type="text/javascript">
  var joID = "{{$joDetails->job_order_id}}";
  var totals = numberWithCommas("{{$joTotals->totals}}") ;
</script>
<style media="screen">
  svg {
    width: 250px;
    height: 175px;
  }
  .nv-generator-container{
    position: relative !important ;
    left: 0px !important;
    margin: none !important;

  }
</style>
<div class="nv-bss-content" id='nv-jo-list-details'>

  <div class="row">
    <div class="col-lg-9 col-md-9">
      <h3 class="nv-header nv-font-bc">
        JOB ORDERS DETAILS
      </h3>
      <h5>Job Order ID : {{str_pad( $joDetails->job_order_id , 10, '0', STR_PAD_LEFT)  }}</h5>
      <h5>Client Name  : {{$joDetails->client_name}}</h5>
      <h5 v-cloak v-if="assignedEmployee">Assigned Employee : @{{assignedEmployee.first_name}} @{{assignedEmployee.last_name}}</h5>
      <div class="">
        <h5>Total Amount : ₱ @{{totalAmount}} </h5>
        <div v-if="start">
          <h5>Started At : @{{start}}</h5>
          <h5>Ended At : @{{end}}</h5>
        </div>
      </div>
      <div v-if="warrantyDetails.length != 0" v-cloak>
        <h5>Warranty Start Date :   @{{warrantyDetails.warranty_start}} </h5>
        <h5>Warranty End Date :  @{{warrantyDetails.warranty_end}} </h5>
      </div>
    @if( session('isAdmin') == 'true' )
      <div v-if="!assignedEmployee" class="shadow-lg p-3 mb-2 bg-white rounded">
        <h2>Assign to Employee</h2>
        <div class="form-group">
          <label for=""> Please select employee</label>
          <select    v-model="employeeId"   class="custom-select" id="employee-list">
            <option  v-for="employee in employeeList"  :value="pad(employee.id)"   >@{{employee.first_name}}   @{{employee.last_name}}</option>
          </select>
        </div>
        <div class="form-group">
          <label for=""> Please select floor slot</label>
          <select    v-model="slotId"   class="custom-select" id="slot-list">
            <option  v-for="slot in slotList"  :value="pad(slot.id)"   >@{{slot.slot_name}}   </option>
          </select>
        </div>
        <div class="form-group">
          <label for=""> Notes</label>
          <input v-model="notes" type="text" class="form-control">
        </div>
        <button v-on:click="setAssign" type="button"  class="mt-2 btn btn-md nv-btn-txt-dark nv-font-bc">
          <i class="fas fa-save"></i> SAVE
        </button>
      </div>

      <div v-cloak v-if="assignedEmployee.is_invoiced == '1' && assignedEmployee.is_released != '1'"  class="shadow-lg p-3 mb-2 bg-white rounded">
        <h2>Approve and Evaluate Assignee</h2>
        <div class="form-group">
          <label for="">Evaluation Comments</label>
          <input v-model="evaluation_notes" type="text" class="form-control">
        </div>
        <div class="dropdown-divider"></div>
        <h2>Set Service Warranty end date</h2>
        <div class="form-group">
          <label>Warranty End Date</label>
          <input v-on:focus="showCalendarPicker()" v-model="warrantyDate" data-date-format="mm/dd/yyyy"  class="nv-input-custom form-control datepicker" id="warranty_date" type="text" >
        </div>
        <button v-on:click="submitEvaluation" type="button"  class="mt-2 btn btn-md nv-btn-txt-dark nv-font-bc">
          <i class="fas fa-save"></i> SUBMIT
        </button>
      </div>

    </div>
    <div class="col-lg-3 col-md-9">
      <div class="input-group mb-3">
        <input id="search-jo-history" onkeyup="tableSearch('search-jo-history' , 'table-jo-history-list')" type="text" class="form-control nv-input-default nv-font-c" placeholder="Search By..." aria-label="Search By..." >
        <div class="input-group-append ">
          <span class="input-group-text nv-input-default">
            <i class="fas fa-search"aria-hidden="true"></i>
          </span>
        </div>
      </div>
      <div  v-if="assignedEmployee" id="qr-details-img">

      </div>
    </div>

  </div>

  <div>

    <a   target="_blank"   :href="'/admin/job/time/history/all/' + assignedEmployee.employee_id   + '/' +   pad(assignedEmployee.id)  + '/' + assignedEmployee.job_order_id"  class="mt-2 btn btn-md nv-btn-txt-dark nv-font-bc">
    View Time in / out history
    </a>
  </div>
  @endif
  <a   target="_blank"   :href="'/admin/job/time/history/log/' + assignedEmployee.employee_id   + '/' +   pad(assignedEmployee.id)  + '/' + assignedEmployee.job_order_id"  class="mt-2 btn btn-md nv-btn-txt-dark nv-font-bc">
   Set Time in / out  for Today
  </a>
  <br><br>
  <a   target="_blank"   :href="'/admin/job/edit/'  + assignedEmployee.job_order_id"  class="mt-2 btn btn-sm nv-btn-txt-dark nv-font-bc">
    Edit Items
  </a>
  <div class="nv-table-container mb-3 mt-2">

    <table class="nv-table table table-striped ">
      <thead>
        <tr>
          <td class="nv-font-bc" scope="col">Job Order Item ID</td>
          <td class="nv-font-bc" scope="col">Service / Labor</td>
          <td class="nv-font-bc" scope="col">Service Description</td>
          <td class="nv-font-bc" scope="col">Service Fee</td>
          <td class="nv-font-bc" scope="col">Product / Part</td>
          <td class="nv-font-bc" scope="col">Product Description</td>
          <td class="nv-font-bc" scope="col">Quantity</td>
          <td class="nv-font-bc" scope="col">Unit Price</td>
        </tr>
      </thead>
      <tbody id="table-jo-history-list">
        <tr v-for="jo in jobOrderList">
          <td class="nv-font-bc" scope="col"> @{{pad(jo.id)}} </td>
          <td class="nv-font-bc" scope="col">@{{jo.service_name}}</td>
          <td class="nv-font-bc" scope="col">@{{jo.service_description}}</td>
          <td class="nv-font-bc" scope="col">@{{jo.service_fee}}</td>
          <td class="nv-font-bc" scope="col">@{{jo.product_name}}</td>
          <td class="nv-font-bc" scope="col">@{{jo.product_description}}</td>
          <td class="nv-font-bc" scope="col">@{{jo.quantity}}</td>
          <td class="nv-font-bc"  scope="col">@{{jo.unit_price}}</td>
        </tr>

      </tbody>
    </table>
  </div>
</div>
<script src="{{ asset('front\js\customs.js') }}" charset="utf-8"></script>

<script src="{{ asset('admin\js\job.order.details.js') }}" ></script>
@endsection
