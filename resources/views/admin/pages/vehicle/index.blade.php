@extends('admin.layout.main')

@section('content')

<link rel="stylesheet" href="{{ asset('admin/css/pages/parts-and-materials-inventory.css') }}">
<style media="screen">

/* Float four columns side by side */
.column {
  float: left;
  width: 20%;
  padding: 0 10px;
}

/* Remove extra left and right margins, due to padding */
.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
content: "";
display: table;
clear: both;

}

/* Responsive columns */
  @media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}
.nv-job-details p{
  margin: 0px;
}
.border-orange{
  border-color: #f0ad4e;
}
</style>
<div class="nv-vehicle-slot-content" >

  <div class="row">
    <div class="col-lg-9 col-md-9">
      <h3 class="nv-header nv-font-bc">
        VEHICLE STORAGE
      </h3>
    </div>
    <div class="col-lg-3 col-md-9">
    </div>


  </div>
  <br>
  <div class="row">

   <div  v-for="slot in slotList" class="column mb-2 ">
     <div   :class="'card shadow p-3 mb-5 rounded ' + setColor(slot.color_code)   ">
       <h1>@{{slot.slot_name}}</h1>
       <p>@{{slot.description}}</p>
       <div class="dropdown-divider"></div>
       <div class="nv-job-details" v-if="slot.job_order_id != null">
         <h4>Current Job Details</h4>
         <p>Client Name : @{{slot.client_name}}</p>
         <p> Unit : @{{slot.make_model}}</p>
         <div class="dropdown-divider"></div>
         <p>Assigned Employee : @{{slot.assigned_first_name}} @{{slot.assigned_last_name}}</p>
         <b>
           <p>Status :
             <label v-if="slot.start != null">Not Started</label>
             <label v-else>In-Progress</label>
           </p>
         </b>
         <a :href="'/admin/job/details/' + slot.job_order_id" target="_blank">
           <span data-toggle="collapse"   role="button" aria-expanded="false"
             class="pointer badge badge-pill badge-dark" name="button">View Job Order</span>
         </a>
         <a  :href="'/admin/checklist/details/' + pad(slot.checklist_id)">
          <span data-toggle="collapse"   role="button" aria-expanded="false"
             class="pointer badge badge-pill badge-dark" name="button">View Checklist</span>

          </a>
          <a v-on:click="moveSlot(slot.job_order_id)"><span data-toggle="collapse" role="button" aria-expanded="false" name="button" class="pointer badge badge-pill badge-dark">Move Slot</span></a>
          <div class="dropdown-divider"></div>
       </div>
       <br>
       <div class="row">
         <div class="col sm-6">
           <h4  v-if="slot.job_order_id == null" class="float-left text-success">Available</h4>
           <h4 class="float-left text-danger" v-else>Occupied</h4>
         </div>
         <div class="col sm-6">
           <i v-on:click="editSlot(slot.id , slot.slot_name , slot.description , slot.color_code)" class="far fa-edit float-right"></i>
         </div>
       </div>

     </div>
   </div>

  </div>

</div>
<script src="{{ asset('admin\js\vehicle-slot.js') }}" ></script>
@endsection
