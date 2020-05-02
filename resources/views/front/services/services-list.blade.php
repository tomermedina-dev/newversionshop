<div v-cloak class="container" id="nv-service-list">
  <div style="cursor:pointer" class="nv-service-grid row" v-if="serviceList.length > 0">
    <div v-for='service in serviceList' class="col-lg-4">
      <div class="card nv-service-card nv-default-box-shadow">

        <div class="card-header">
          <div class="row">
            <div class="col-sm-6 ">
              <h3 class=" nv-font-bc text-white">  @{{service.name}} </h3>
            </div>
            <div class="col-sm-6 ">
              <h5 class="text-white float-right">   @{{service.service_categ}}  </h5>
            </div>
          </div>
        </div>
        <div class="nv-service-img-container">
          <img  v-if='service.service_image == null'   src="{{ asset('images/no-image-available.png') }}">
          <img  v-else   :src='getServiceImagesPath(service.service_image)'   />
        </div>
        <div class="card-body ">
          <div class="nv-service-description ">
            <p>
              @{{service.description}}
            </p>
             <div class="nv-service-price">
               <h1>Starting at   ₱ <span class="nv-services-amount">@{{numberWithCommas(service.price)}} </span> </h1>
             </div>
          </div>
          <div class="container">
            <a v-on:click="visitScheduleService(service.id , service.name)" class="nv-schedule-btn btn btn-lg btn-warning nv-font-bc w-100" >
              Schedule Now
            </a>
          </div>
        </div>
      </div>
    </div>

  </div>
  <div v-else class="d-flex justify-content-center">
    <div id="noResult" class="d-flex justify-content-center">
       <div class="fa fa-car fa-4x loader-icon"></div>
       <div class="fa fa-tools fa-4x loader-icon"></div>
    </div>
  </div>
</div>
