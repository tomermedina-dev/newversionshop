<div id="nv-carousel" class="carousel slide  nv-default-box-shadow" data-ride="carousel">
  <ol class="carousel-indicators d-flex justify-content-center">
    <div v-cloak  v-for="(item,index) in featuredList" data-target="#nv-carousel" :data-slide-to="index" class="active">
      <i class="fas fa-circle"></i>
    </div>
    <!-- <div data-target="#nv-carousel" data-slide-to="1">
      <i class="fas fa-circle"></i>
    </div>
    <div data-target="#nv-carousel" data-slide-to="2">
      <i class="fas fa-circle"></i>
    </div> -->
    <!-- <li data-target="#nv-carousel" data-slide-to="0" class="active"><i class="fas fa-circle"></i></li>
    <li data-target="#nv-carousel" data-slide-to="1"><i class="fas fa-circle"></i></li>
    <li data-target="#nv-carousel" data-slide-to="2"><i class="fas fa-circle"></i></li> -->
  </ol>
  <div class="carousel-inner">
    <div v-cloak v-for="(item,index) in featuredList" :class="index == 0 ? 'carousel-item active' : 'carousel-item'" >
      <!-- <img class="d-block w-100 " style="height:350px !important;" src="{{ asset('images/service.jpg')}}" > -->
      <img class="d-block w-100 " style="height:350px !important;"   v-if='item.featured_image == null' src="{{ asset('images/no-image-available.png') }}">
      <img class="d-block w-100 " style="height:350px !important;"  v-else style="height:200px;"  :src='getFeaturedImagesPath(item.featured_image)'   />

      <div class="row nv-product-info" style="display:none;">
        <div class="col-lg-8">
          <div class="nv-name nv-font-bc">
            Product 1
          </div>
          <div class="nv-description nv-font">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
          </div>
        </div>
        <div class="col-lg-4 nv-price nv-price nv-font-bc">
          P 250.00
        </div>
      </div>
    </div>

  </div>
  <a class="pointer carousel-control-prev" href="#nv-carousel" role="button" data-slide="prev">
    <i class="fas fa-angle-left"></i>
    <span class="sr-only">Previous</span>
  </a>
  <a class="pointer carousel-control-next" href="#nv-carousel" role="button" data-slide="next">
    <i class="fas fa-angle-right"></i>
    <span class="sr-only">Next</span>
  </a>
</div>
