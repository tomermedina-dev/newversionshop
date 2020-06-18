<style media="screen">
  .nv-service-img {
    max-width: 100%;
    max-height: 75%;
    display: block; /* remove extra space below image */
    object-fit: cover;
  }
</style>
<div  class="bg-dark nv-featured-bottom d-flex flex-row" >
  <div class="nv-label nv-font-bc" style="font-size: 1.5rem;color:#f5f6fa;">
    List of Services
  </div>
  <div  class="input-group md-form form-sm form-2 w-25" style="left:60%;display:none;">
    <input v-model="searchValue"  style="z-index:9999;height:35px;font-size:1.5em;" class="form-control nv-input-search-header" type="text" placeholder="Search" aria-label="Search">
    <div v-on:click="searchService" class="input-group-append pointer " style="height:35px;">
      <span style="z-index:9999;" class="input-group-text nv-input-search-header">
        <i class="fas fa-search text-white" aria-hidden="true"></i></span>
    </div>
  </div>
</div>
<div v-cloak class="container mt-2" id="nv-service-list">
  <div style="cursor:pointer" class="nv-service-grid row" v-if="serviceList.length > 0">
    <div v-for='service in serviceList' class="col-lg-6">
      <div class="card nv-service-card nv-default-box-shadow">

        <div class="card-header">
          <div class="row">
            <div class="col-sm-6 ">
              <h4  class=" nv-font-bc text-white">  @{{service.name}} </h4>
            </div>
            <div class="col-sm-6 ">
              <h5 class="text-white float-right">   @{{service.service_categ}}  </h5>
            </div>
          </div>
        </div>
        <div class="nv-service-img-container">
          <img    v-if='service.service_image == null'   src="{{ asset('images/no-image-available.png') }}">
          <img class="nv-service-img"   v-else   :src='getServiceImagesPath(service.service_image)'   />
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
