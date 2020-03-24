<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Version Shop - Register Now</title>
    @include('front.includes.resources-header')
  </head>
  <style media="screen">
    .g-recaptcha > div { margin: 0 auto;}
        .hidden_recaptcha { visibility: hidden;}
  </style>
  <body>
    @include('front.includes.header')

    <div class="d-flex justify-content-center">
      <div class="container " style="padding:5%;">
        <div class="row ">
          <div class="nv-container-left  container col-sm-5 shadow-lg p-3 mb-5 nv-bg-dark" style="padding:2%;">
              @include('front.user.details')
              <br>
            <div class="d-flex justify-content-center">
              <button type="button" class="btn nv-btn-mustard" name="button">Sign In</button>
            </div>
          </div>
          <div class="nv-container-right col-sm-7 shadow-lg p-3 mb-5 white-bg" style="padding:2%;">
            <h1>Registration Form</h1>
            <div class="container">
              <h4 class="text-mustard">PERSONAL DETAILS</h4>
              <div class="row">
                <div class="col-12">
                  <div class="row">

                    <div class="col-sm-6">
                      <div class="form-group">
                        <input type="text" class="form-control nv-input-custom" id="first_name" placeholder="First Name">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control nv-input-custom" id="username" placeholder="Username">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <input type="text" class="form-control nv-input-custom" id="last_name" placeholder="Last Name">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control nv-input-custom" id="email" placeholder="Email Address">
                      </div>
                    </div>

                    <div class="col-sm-12">
                      <div class="form-group">
                        <input type="password" class="form-control nv-input-custom" id="password" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control nv-input-custom" id="confirm_password" placeholder="Confirm Password">
                      </div>

                      <div class="form-group">
                        <input type="text" class="form-control nv-input-custom" id="password" placeholder="Contact No.">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control nv-input-custom" id="password" placeholder="Address">
                      </div>
                    </div>

                  </div>

                </div>


                  <div class="col-sm-6">

                      <!--live : 6LeucJ0UAAAAABwS_ucAQsf4i2YqEYWhXr4pFVBg-->
                      <!--Local : 6LdF3JoUAAAAAEPm-cs3kzNgfzSdrg5Cfu4MQVpK-->



                    <div class="custom-control custom-checkbox  ">
                      <input type="checkbox" class="custom-control-input" id="customCheck1">
                      <label class="custom-control-label" for="customCheck1">  I agree to the <a href=""> Terms and Condition</a></label>
                    </div>
                    <input type="text" class="hidden_recaptcha required" name="hidden_recaptcha" id="hidden_recaptcha" required>
                    <div class="g-recaptcha" data-sitekey="6LdF3JoUAAAAAEPm-cs3kzNgfzSdrg5Cfu4MQVpK"  data-callback="correctCaptcha"></div>

                  </div>
                  <div class="col-sm-6">
                      <button style="float:right" type="button" class="btn nv-btn-txt-white" name="button">REGISTER</button>
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
