<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Version Shop - Login Now</title>
    @include('front.includes.resources-header')
  </head>
  <style media="screen">
    .g-recaptcha > div { margin: 0 auto;}
        .hidden_recaptcha { visibility: hidden;}
  </style>
  <body>
    @include('front.includes.header')
    <div class="d-flex justify-content-center" >
      <div class="container "  style="padding:5%;">
        <div class="row ">
          <div  class="nv-container-left col-sm-5 container shadow-lg p-3 mb-5 nv-bg-dark" style="padding:2%;">
              @include('front.user.details')
              <br>
              <!-- <div class="d-flex justify-content-center">
                <img style="float:right;" width="150px" src="{{ asset('images/logo_transpa.png') }}" />
              </div> -->
            </div>
          <div class="nv-container-right col-sm-7 shadow-lg p-3 mb-5 white-bg" style="padding:2%;">
              <br>
              <div class="d-flex justify-content-center">
                <div class="nv-dot-dark"  ></div>
                <div class="nv-dot-mustard" style="margin-left:-25px;" ></div>
              </div>

              <div class="d-flex justify-content-center ">
                  <h1>Please enter validation code</h1>
              </div>

               <div class="">
                 <div class="nv-line-divider d-flex justify-content-center" ></div>
                 <div class=" d-flex justify-content-center">
                   <div class="nv-mustard-divider" style="width:50px; margin-top:-3.5px;"></div>
                 </div>
               </div>
               <br>

              <div class="d-flex justify-content-center " style="margin-top:20px;">
              <div class="container nv-login-form " style="width:70%;">
                
                <div class="form-group">
                  <div class="input-group-prepend">
                     <input type="text" class="left form-control nv-input-custom" id="username" placeholder="Enter your username">
                   </div>
                </div>

                <div class="container d-flex justify-content-center">
                  <div class="d-flex flex-nowrap">
                    <div class="order-1 p-2">  <button type="button" class="btn nv-btn-txt-white" name="button">Log Me in</button> </div>
                    <div class="order-2 p-2 nv-horizontal-center">
                      <a class="badge badge-pill badge-light" href="#">Re-send validation code</a>
                    </div>

                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src='https://www.google.com/recaptcha/api.js'></script>
  </body>
  @include('front.includes.resources-footer')
</html>
