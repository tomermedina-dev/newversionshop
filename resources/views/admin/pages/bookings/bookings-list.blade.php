<div class="nv-table-container mb-3">
  <table class="nv-table table  ">
    <thead>
      <tr>
        <td class="nv-font-bc" scope="col">Service #</td>
        <td class="nv-font-bc" scope="col">Customer Name</td>
        <td class="nv-font-bc" scope="col">Service Name</td>
        <td class="nv-font-bc" scope="col">Booked Date</td>
        <td class="nv-font-bc" scope="col">Date of Service</td>
        <td class="nv-font-bc" scope="col">Time</td>
        <td class="nv-font-bc" scope="col">Notes</td>
        <td class="nv-font-bc" scope="col">Status </td>
        <td class="nv-font-bc" scope="col">Booking Fee Status </td>
        <td class="nv-font-bc nv-option-td" scope="col"></td>
      </tr>
    </thead>
    <tbody  v-for="(booking , index) in bookedServicesList">
      <tr  >

          <td  class="nv-font-bc"   >@{{pad(booking.bookingData.id)}}</td>
          <td class="nv-font-bc" scope="col">@{{booking.bookingData.first_name}} @{{booking.last_name}}</td>
          <td class="nv-font-bc" scope="col">@{{booking.bookingData.service_title}}</td>
          <td class="nv-font-bc" scope="col">@{{booking.bookingData.created_at}}</td>
          <td class="nv-font-bc" scope="col">@{{booking.bookingData.service_date_new}}</td>
          <td class="nv-font-bc" scope="col">@{{booking.bookingData.service_time_new}}</td>
          <td class="nv-font-bc" scope="col">@{{booking.bookingData.notes}}</td>
          <td>
            <div class="custom-control custom-switch">
              <input  :disabled="booking.bookingData.status == 1" v-on:click="changeStatus(booking.bookingData.status , pad(booking.bookingData.id,10) )" type="checkbox" class="custom-control-input" :checked="booking.bookingData.status == 1 ? 'checked' : '' " :id="'customSwitch_' + booking.bookingData.id">
              <label class="custom-control-label" :for="'customSwitch_' + booking.bookingData.id"></label>
            </div>
          </td>
          <td class="nv-font-bc" scope="col">
            <span v-if="booking.bookingData.payment_status == 0 ">
              Unpaid
            </span>
            <span v-else>Paid</span>
          </td>
          <td class="nv-font-bc" scope="col" class="info" id="nv-option-td">
            <div class="dropdown">
              <div class="nv-account dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-h"></i>
              </div>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <a class="dropdown-item" :href="'/admin/checklist/new/' + pad(booking.bookingData.id)">Proceed to Checklist</a>
                <a class="dropdown-item pointer" v-on:click="rejectBooking(booking.bookingData.id)">Reject</a>
                <span v-if="booking.bookingData.payment_status == 0 ">
                  <a class="dropdown-item pointer" v-on:click="setPaymentPaid(booking.bookingData.id)">Set Payment to Paid</a>
                </span>
 
              </div>
            </div>
          </td>

      </tr>
      <tr v-if="booking.schedules  != '[]'" class="nv-schedule-request">
        <td colspan="7">
          <div class="card p-2">
            <div  v-for="sched in JSON.parse(booking.schedules)">
              <div class="float-left p-2" style="text-align:left;">
                <h5>Client request to change the schedule of the service @{{pad(booking.bookingData.id)}}.
                   <span data-toggle="collapse" :href="'#collapse_' + booking.bookingData.id" role="button" aria-expanded="false" aria-controls="collapseExample"
                     class="pointer badge badge-pill badge-dark" name="button">See details</span>
                </h5>
                <div class="collapse" :id="'collapse_' + booking.bookingData.id">
                  <h4><b>New Service Date</b> : @{{sched.booking_date}}</h4>
                  <h4><b>New Time</b> : @{{sched.booking_time}}</h4>
                  <h4><b>Reason</b> : @{{sched.reason}}</h4>
                  <button type="button" v-on:click="requestResponse(pad(sched.id), 'approve')" class="btn btn-sm nv-btn-txt-white m-1 float-left" name="button">Approve</button>
                  <button type="button" v-on:click="requestResponse(pad(booking.id), 'reject')"   class="btn btn-sm nv-btn-txt-white  m-1 float-left" name="button">Reject</button>
                </div>
              </div>
            </div>

          </div>
        </td>
      </tr>
    </tbody>
  </table>
</div>
