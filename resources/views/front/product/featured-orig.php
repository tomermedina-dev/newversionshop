<!-- <div id="nv-carousel" class="carousel slide mb-3 nv-default-box-shadow" data-ride="carousel"> -->
<div id="nv-carousel" class="carousel slide mb-3  " >
  <ol class="carousel-indicators d-flex justify-content-center">
    <div data-target="#nv-carousel" data-slide-to="0" class="active">
      <i class="fas fa-circle"></i>
    </div>
    <div data-target="#nv-carousel" data-slide-to="1">
      <i class="fas fa-circle"></i>
    </div>
    <div data-target="#nv-carousel" data-slide-to="2">
      <i class="fas fa-circle"></i>
    </div>
    <!-- <li data-target="#nv-carousel" data-slide-to="0" class="active"><i class="fas fa-circle"></i></li>
    <li data-target="#nv-carousel" data-slide-to="1"><i class="fas fa-circle"></i></li>
    <li data-target="#nv-carousel" data-slide-to="2"><i class="fas fa-circle"></i></li> -->
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{ asset('images/service.jpg')}}" >
      <div class="corousel-details justify-content-between  text-center ">

        <h3 class="nv-featured-title">Title</h3>
        <p class="text-white nv-featured-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean at est maximus, volutpat augue fermentum, pretium massa. Quisque eu dignissim nibh. Morbi velit erat, ultrices vitae dolor a, sollicitudin interdum nisl. Praesent posuere et quam nec blandit. Morbi id lorem ut sapien facilisis pretium interdum quis urna. Ut placerat urna mi, sed sollicitudin ante semper non. Sed ultricies justo dui, non iaculis elit rutrum id. Sed non pretium libero. Aenean urna purus, bibendum vitae fringilla ac, fermentum vel ex. Etiam nibh felis, eleifend ac turpis at, aliquam venenatis mauris. Aliquam posuere ex et eros aliquet venenatis. Fusce rutrum molestie tortor eget maximus. In nec orci sit amet enim vehicula porta et et turpis</p>
        <a href="/test" class="nv-featured-button">SEE MORE</a>
      </div>
    </div>
    <div class="carousel-item  ">
      <img class="d-block w-100" src="{{ asset('images/service.jpg')}}" >
      <div class="corousel-details justify-content-between  text-center ">

        <h3 class="nv-featured-title">Title</h3>
        <p class="text-white nv-featured-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean at est maximus, volutpat augue fermentum, pretium massa. Quisque eu dignissim nibh. Morbi velit erat, ultrices vitae dolor a, sollicitudin interdum nisl. Praesent posuere et quam nec blandit. Morbi id lorem ut sapien facilisis pretium interdum quis urna. Ut placerat urna mi, sed sollicitudin ante semper non. Sed ultricies justo dui, non iaculis elit rutrum id. Sed non pretium libero. Aenean urna purus, bibendum vitae fringilla ac, fermentum vel ex. Etiam nibh felis, eleifend ac turpis at, aliquam venenatis mauris. Aliquam posuere ex et eros aliquet venenatis. Fusce rutrum molestie tortor eget maximus. In nec orci sit amet enim vehicula porta et et turpis</p>
        <a href="/test" class="nv-featured-button">SEE MORE</a>
      </div>
    </div>
    <!-- <div class="carousel-item">
      <img class="d-block w-100" src="{{ asset('images/service.jpg')}}" alt="First slide">
    </div> -->
  </div>
  <div class="bg-dark nv-featured-bottom">
    <div class="row">
      <div class="col-lg-9">
        <h1 class="text-white">List of Services</h1>
      </div>
      <div class="col-lg-3">
        <div  class="input-group md-form form-sm form-2 pl-0">
        <input v-model="searchValue"  style="z-index:9999;" class=" form-control  nv-input-search-header" type="text" placeholder="Search" aria-label="Search">
          <div v-on:click="searchService" class="input-group-append pointer ">
            <span style="z-index:9999;" class="input-group-text nv-input-search-header">
              <i class="fas fa-search text-white" aria-hidden="true"></i></span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#nv-carousel" role="button" data-slide="prev">
    <i class="fas fa-angle-left"></i>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#nv-carousel" role="button" data-slide="next">
    <i class="fas fa-angle-right"></i>
    <span class="sr-only">Next</span>
  </a>
</div>
