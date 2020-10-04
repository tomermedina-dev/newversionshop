<nav class="d-flex  navbar navbar-icon-top navbar-expand-md navbar-light  " style="background-color: #2f3640;">
<div class="container">
    <a  class="navbar-brand">
      <img  width="80px" height="80px" src="{{ asset('images/logo_transpa.png') }}">
    </a>
    <button type="button" class="navbar-toggler bg-light" data-toggle="collapse" data-target="#nav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- <input type="text" class="form-control input-search-header" id="first_name" placeholder="Search "> -->
    <div  style="width:100%;">
      <div class="input-group md-form form-sm form-2 pl-0" id="nv-search">
        <input v-model="searchValue" class="form-control  nv-input-search-header" type="text" placeholder="Search" aria-label="Search products">
        <div class="input-group-append ">
          <span class="input-group-text nv-input-search-header pointer" onclick="window.location.href='/products/search/' + $('.nv-input-search-header').val()" >
            <i class="fas fa-search text-white"aria-hidden="true"></i></span>
        </div>
      </div>

      <div class="nv-header-contact-details">
         <i class="fa fa-envelope text-white"aria-hidden="true"></i>
         <span  > info@newversion.co</span>
         <i class="fa fa-phone-alt "></i>
         <span  > +63 961 285 1587</span>
         <i class="fab fa-facebook-square" style="display:none"></i>
      </div>
    </div>

    <div id="nav" class="navbar-collapse collapse w-100 order-3 dual-collapse2" >
         <ul class="navbar-nav ml-auto white">
             <!-- <li class="nav-item ">
               <a id="nav-home" class="nav-link" href="/">

                 <h5>Home</h5>
                 </a>
             </li> -->
             @if(!session()->has('userId'))
               <li class="nav-item">
                 <a id="nav-login" class="nav-link" href="/login">
                   <!-- <i class="fas fa-user-plus"></i> -->
                   <h5>Sign in</h5>
                   </a>
               </li>
             @endif
             <!-- <li class="nav-item ">
               <a id="nav-products" class="nav-link" href="/products">

                 <h5>Products</h5>
                 </a>
             </li> -->
             <li class="nav-item ">
               <a id="nav-services" class="nav-link" href="/services">
                 <!-- <i class="fa fa-cube"></i> -->
                 <h5>Services</h5>
                 </a>
             </li>
             <!-- <li class="nav-item ">
               <a id="nav-cars" class="nav-link" href="/gallery">

                 <h5>Gallery</h5>
                 </a>
             </li>
             <li class="nav-item ">
               <a id="nav-about" class="nav-link" href="/about">

                 <h5>About</h5>
                 </a>
             </li> -->
             @if(session()->has('userId'))
             <li class="nav-item ">
               <a id="nav-cart" class="nav-link" href="/cart">
                 <i class="fa fa-shopping-cart"><span class="badge badge-pill badge-warning" id="cart-count">0</span></i>
                 <!-- <h5>cart</h5> -->
                 </a>
             </li>
             <li class="nav-item ">
               <div class="dropdown" >
                 <div style="margin-top:15px;" class="nv-account dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   <i class="fa fa-user-circle"></i>
                 </div>
                 <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                   <a class="dropdown-item" href="/user/profile">View Profile</a>
                   <a class="dropdown-item" href="/logout">Logout</a>
                 </div>
               </div>
             </li>
             @endif
         </ul>
     </div>

</div>
</nav>
