<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NV Shop - Register Now</title>

    @include('front.includes.resources-header')
  </head>
  <style media="screen">

    .g-recaptcha > div { margin: 0 auto;}
        .hidden_recaptcha { visibility: hidden;}
  </style>
  <body>
    @include('front.includes.header')
    <br>
    <div class="d-flex justify-content-center">
      <div class="container ">
        <div class="row ">
          <div class="col-sm-4 shadow-lg p-3 mb-5 " style="background-color:#e1b12c;padding:2%;">
            <h1>INFORMATION</h1>
            <div style="text-indent: 50px">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ullamcorper lorem nibh, sed ullamcorper nisi dapibus sed. Vivamus gravida vel quam a iaculis. Proin pulvinar, tellus sit amet rutrum ornare, mi nibh varius velit, non lobortis mi ante eget nisl. Vestibulum tristique tincidunt faucibus. Nam viverra metus consectetur, vulputate mauris in, vehicula lectus. Vivamus ipsum enim, imperdiet nec vestibulum nec, semper a arcu. Quisque hendrerit sem vel orci faucibus lacinia.</p>
            </div>
            <div class="d-flex justify-content-center">
              <button type="button" class="btn btn-txt-mustard" name="button">Have an Account</button>
            </div>
            <br>
            <!-- <div class="d-flex justify-content-center">
              <img style="float:right;" width="150px" src="{{ asset('images/logo_transpa.png') }}" />
            </div> -->
          </div>
          <div class="col-sm-8 shadow-lg p-3 mb-5" style="background-color:white;padding:2%;">
            <h1>Registration Form</h1>
            <div class="container">
              <h4 class="text-mustard">PERSONAL DETAILS</h4>
              <div class="row">
                <div class="col-12">
                  <div class="row">

                    <div class="col-sm-6">
                      <div class="form-group">
                        <input type="text" class="form-control input-custom" id="first_name" placeholder="First Name">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control input-custom" id="username" placeholder="Username">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <input type="text" class="form-control input-custom" id="last_name" placeholder="Last Name">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control input-custom" id="email" placeholder="Email Address">
                      </div>
                    </div>

                    <div class="col-sm-12">
                      <div class="form-group">
                        <input type="password" class="form-control input-custom" id="password" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control input-custom" id="confirm_password" placeholder="Confirm Password">
                      </div>

                      <div class="form-group">
                        <input type="text" class="form-control input-custom" id="password" placeholder="Contact No.">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control input-custom" id="password" placeholder="Address">
                      </div>
                    </div>

                  </div>

                </div>


                  <div class="col-sm-6">

                      <!--live : 6LeucJ0UAAAAABwS_ucAQsf4i2YqEYWhXr4pFVBg-->
                      <!--Local : 6LdF3JoUAAAAAEPm-cs3kzNgfzSdrg5Cfu4MQVpK-->


                    <div class="checkbox">
                      <label>
                        <input type="checkbox" value="">
                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                        I agree to the <a href=""> Terms and Condition</a>
                      </label>
                    </div>
                    <input type="text" class="hidden_recaptcha required" name="hidden_recaptcha" id="hidden_recaptcha" required>
                    <div class="g-recaptcha" data-sitekey="6LdF3JoUAAAAAEPm-cs3kzNgfzSdrg5Cfu4MQVpK"  data-callback="correctCaptcha"></div>

                  </div>
                  <div class="col-sm-6">
                      <button style="float:right" type="button" class="btn btn-txt-white" name="button">REGISTER</button>
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
