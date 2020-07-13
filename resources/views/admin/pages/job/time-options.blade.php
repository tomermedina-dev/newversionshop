@extends('admin.layout.main')

@section('content')
<style media="screen">
  .col {
    margin: 2%;

  }
</style>
<script type="text/javascript">
  var joID = "{{$joDetails->job_order_id}}";
</script>
<div class="nv-bss-content" id='nv-jo-time-log'>
  <div class="row">
    <div class="col-lg-9 col-md-9">
      <h3 class="nv-header nv-font-bc">
        JOB  TIME IN / OUT LOG
      </h3>
    </div>
  </div>
  <div class="container">

    <div class="row">
      <div style="display:none;" id="nv-job-action-btn" class="col sm-12 card bg-warning pointer" v-on:click="submitJobAction()" >
        <div class="card-body">
          <h1>Set Job as Completed</h1>
        </div>
      </div>
    </div>

    <div class="row">
      <div  v-on:click="submitTimeHistory('in', pad(assignedEmployee.id) , assignedEmployee.employee_id , assignedEmployee.job_order_id )" style="display:none;" id="nv-job-start-day" class="col sm-4 card pointer bg-dark">
        <div class="card-body">
          <h1 class="text-white">Time-In for Today</h1>
        </div>
      </div>
      <div v-on:click="submitTimeHistory('out')"  style="display:none;"  id="nv-job-end-day" class="col sm-4 card pointer bg-dark  text-white" >
        <div class="card-body">
          <h1  class="text-white">Time-Out for Today</h1>
        </div>
      </div>
    </div>


  </div>
</div>

<script src="{{ asset('admin\js\job.time.log.js') }}" ></script>
@endsection
