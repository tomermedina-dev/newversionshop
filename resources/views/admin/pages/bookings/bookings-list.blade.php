<div class="nv-table-container mb-3">
  <table class="nv-table table table-striped ">
    <thead>
      <tr>
        <td class="nv-font-bc" scope="col">Service #</td>
        <td class="nv-font-bc" scope="col">Customer Name</td>
        <td class="nv-font-bc" scope="col">Service Name</td>
        <td class="nv-font-bc" scope="col">Booked Date</td>
        <td class="nv-font-bc" scope="col">Date of Service</td>
        <td class="nv-font-bc" scope="col">Notes</td>
        <td class="nv-font-bc" scope="col"></td>
      </tr>
    </thead>
    <tbody id="table-bookings-list">
      <tr v-for="booking in bookedServicesList">
        <td class="nv-font-bc" scope="col">@{{pad(booking.id)}}</td>
        <td class="nv-font-bc" scope="col">@{{booking.first_name}} @{{booking.last_name}}</td>
        <td class="nv-font-bc" scope="col">@{{booking.service_title}}</td>
        <td class="nv-font-bc" scope="col">@{{booking.created_at}}</td>
        <td class="nv-font-bc" scope="col">@{{booking.service_date_orig}}</td>
        <td class="nv-font-bc" scope="col">@{{booking.notes}}</td>
        <td class="nv-font-bc" scope="col" class="info">
          <div class="dropdown">
            <div class="nv-account dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-ellipsis-h"></i>
            </div>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <a class="dropdown-item" :href="'/admin/checklist/new/' + pad(booking.id)">Proceed to Checklist</a>
              <a class="dropdown-item" href="#">Reject</a>
            </div>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
</div>
