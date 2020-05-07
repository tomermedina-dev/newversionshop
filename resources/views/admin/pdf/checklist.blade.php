<!-- <link href="{{ public_path('admin/css/pages/vehicle-check-list.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet"  href="{{ public_path('bootstrap/css/bootstrap.min.css') }}"   type="text/css"  >
<link rel="stylesheet"  href="{{ public_path('admin/css/master.css') }}"  type="text/css"  > -->

<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
<link rel="stylesheet" href="{{ asset('admin/css/master.css') }}">
<style media="screen">
*, ::after, ::before {
    box-sizing: border-box;

}
nv-card-custom > .card-header {
    display: flex;
    align-items: center;
    height: 38px;
    padding: .375rem .75rem;
    background-color: #fbc531;
}
.card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0,0,0,.125);
    border-radius: .25rem;
}
.card-header:first-child {
    border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
}
.card-header {
    padding: .75rem 1.25rem;
    margin-bottom: 0;
    background-color: rgba(0,0,0,.03);
    border-bottom: 1px solid rgba(0,0,0,.125);
}
div {
    display: block;
}
.nv-font-bc {
  font-family: 'Myriad Pro Bold Condensed';
}
.h3, h3 {
  font-size: 1.75rem;
}
.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
  margin-bottom: .5rem;
  font-weight: 500;
  line-height: 1.2;
}
h1, h2, h3, h4, h5, h6 {
  margin-top: 0;
  margin-bottom: .5rem;
}
.row {
    margin: 0;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
}
.col, .col-1, .col-10, .col-11, .col-12, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-auto, .col-lg, .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-auto, .col-md, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-auto, .col-sm, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-auto, .col-xl, .col-xl-1, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-auto {
    padding-right: 5px;
    padding-left: 5px;
}
.col, .col-1, .col-10, .col-11, .col-12, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-auto, .col-lg, .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-auto, .col-md, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-auto, .col-sm, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-auto, .col-xl, .col-xl-1, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-auto {
    position: relative;
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
}
.mb-2, .my-2 {
    margin-bottom: .5rem!important;
}
.input-group {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    -ms-flex-align: stretch;
    align-items: stretch;
    width: 100%;
}
input-group-prepend {
    margin-right: -1px;
}
.input-group-append, .input-group-prepend {
    display: -ms-flexbox;
    display: flex;
}
.input-group>.custom-select:not(:first-child), .input-group>.form-control:not(:first-child) {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
}
.input-group>.custom-file, .input-group>.custom-select, .input-group>.form-control, .input-group>.form-control-plaintext {
    position: relative;
    -ms-flex: 1 1 0%;
    flex: 1 1 0%;
    min-width: 0;
    margin-bottom: 0;
}
.nv-input-group-custom > input {
    background-color: whitesmoke;
    color: #2f3640;
    outline: !important;
    box-shadow: none !important;
    border: none !important;
}
.form-control {
    display: block;
    width: 100%;
    height: calc(1.5em + .75rem + 2px);
    padding: .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
button, input {
    overflow: visible;
}
button, input, optgroup, select, textarea {
    margin: 0;
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
}
.justify-content-center {
    -ms-flex-pack: center!important;
    justify-content: center!important;
}
.nv-checkbox {
    padding: 1rem;
}
.nv-checkbox label {
    display: flex;
    align-items: center;
}

label {
    display: inline-block;
    margin-bottom: .5rem;
}
.d-flex {
    display: -ms-flexbox!important;
    display: flex!important;
}
.nv-input-group-line {
    text-align: center;
}
.nv-input-group-line input {
    background-color: rgba(0,0,0,0);
    border: 0;
    outline: 0;
    box-shadow: none !important;
    border-radius: 0;
    border-bottom: 1px solid #2f3640;
    min-width: 250px;
}
.nv-input-group-custom > .input-group-prepend > .input-group-text {
    background-color: #fbc531;
    color: #2f3640;
    border: none !important;
}
</style>
<div class="nv-vcm-content">
      <h3 class="nv-header nv-font-bc">
        VEHICLE CHECK LIST MODULE
      </h3>
      <div class="nv-vcm-body">

        <div class="row">

          <div class="col-lg-7">
            <div class="input-group nv-input-group-custom mb-2">
              <div class="input-group-prepend">
                <span class="input-group-text nv-font-c">
                  CLIENT NAME</span>
              </div>
              <input type="text" class="form-control">
            </div>
          </div>

          <div class="col-lg-5">
            <div class="input-group nv-input-group-custom mb-2">
              <div class="input-group-prepend">
                <span class="input-group-text nv-font-c">
                  ORDER NO.</span>
              </div>
              <input type="text" class="form-control">
            </div>
          </div>

          <div class="col-lg-7">
            <div class="input-group nv-input-group-custom mb-2">
              <div class="input-group-prepend">
                <span class="input-group-text nv-font-c">
                  CLIENT CONTACT NO.</span>
              </div>
              <input type="text" class="form-control">
            </div>
          </div>

          <div class="col-lg-5">
            <div class="input-group nv-input-group-custom mb-2">
              <div class="input-group-prepend">
                <span class="input-group-text nv-font-c">
                  ORDER RECEIVED</span>
              </div>
              <input type="text" class="form-control">
            </div>
          </div>

          <div class="col-lg-4">
            <div class="input-group nv-input-group-custom mb-2">
              <div class="input-group-prepend">
                <span class="input-group-text nv-font-c">
                  ORDER DATE & TIME</span>
              </div>
              <input type="text" class="form-control">
            </div>
          </div>

          <div class="col-lg-4">
            <div class="input-group nv-input-group-custom mb-2">
              <div class="input-group-prepend">
                <span class="input-group-text nv-font-c">
                  DATE PROMISED</span>
              </div>
              <input type="text" class="form-control">
            </div>
          </div>

          <div class="col-lg-4">
            <div class="input-group nv-input-group-custom mb-2">
              <div class="input-group-prepend">
                <span class="input-group-text nv-font-c">
                  ACTUAL DATE</span>
              </div>
              <input type="text" class="form-control">
            </div>
          </div>

          <div class="col-lg-4">
            <div class="card nv-card-custom mb-2">
              <div class="card-header">

                OTHER NOTES
              </div>
              <div class="card-body" style="height:250px;">

              </div>
            </div>
          </div>

          <div class="col-lg-8">
            <div class="input-group nv-input-group-custom mb-2">
              <div class="input-group-prepend">
                <span class="input-group-text nv-font-c">
                  TYPE</span>
              </div>
              <input type="text" class="form-control">
            </div>
            <div class="border">

            </div>
          </div>

          <div class="col-lg-6">
            <div class="input-group nv-input-group-custom mb-2">
              <div class="input-group-prepend">
                <span class="input-group-text nv-font-c">
                  ODOMETER READING</span>
              </div>
              <input type="text" class="form-control">
            </div>
          </div>

          <div class="col-lg-6">
            <div class="input-group nv-input-group-custom mb-2">
              <div class="input-group-prepend">
                <span class="input-group-text nv-font-c">
                  MAKE & MODEL</span>
              </div>
              <input type="text" class="form-control">
            </div>
          </div>

          <div class="col-lg-6">
            <div class="input-group nv-input-group-custom mb-2">
              <div class="input-group-prepend">
                <span class="input-group-text nv-font-c">
                  FUEL LEVEL</span>
              </div>
              <input type="text" class="form-control">
            </div>
          </div>

          <div class="col-lg-6">
            <div class="input-group nv-input-group-custom mb-2">
              <div class="input-group-prepend">
                <span class="input-group-text nv-font-c">
                  PERSONAL ITEMS</span>
              </div>
              <input type="text" class="form-control">
            </div>
          </div>

          <div class="col-lg-4 d-flex justify-content-center">
            <div class="nv-checkbox">
              <input class="nv-checkbox" type="checkbox" id="restoration">
              <label for="restoration">RESTORATION: &nbsp;&nbsp;&nbsp;<i class="far fa-square"></i></label>

            </div>

          </div>

          <div class="col-lg-4 d-flex justify-content-center">
            <div class="nv-checkbox">
              <input class="nv-checkbox" type="checkbox" id="workrepair">
              <label for="workrepair">BODY/WORK REPAIR: &nbsp;&nbsp;&nbsp;<i class="far fa-square"></i></label>
            </div>
          </div>

          <div class="col-lg-4 d-flex justify-content-center">
            <div class="nv-checkbox">
              <input class="nv-checkbox" type="checkbox" id="service">
              <label for="service">AUTO REPAIR/SERVICE: &nbsp;&nbsp;&nbsp;<i class="far fa-square"></i></label>
            </div>

          </div>


          <div class="col-lg-4 d-flex justify-content-start">
            <div class="nv-input-group-line">
              <input class="form-control nv-input-line" type="text" name="" value="">
              <label for="">WORK AUTHORIZED BY:</label>
            </div>
          </div>

          <div class="col-lg-4 d-flex justify-content-center">
            <div class="nv-input-group-line">
              <input class="form-control nv-input-line" type="text" name="" value="">
              <label for="">AUTHORIZED CLIENT SIGNATURE</label>
            </div>
          </div>

          <div class="col-lg-4 d-flex justify-content-end">
            <div class="nv-input-group-line">
              <input class="form-control nv-input-line" type="text" name="" value="">
              <label for="">DATE</label>
            </div>
          </div>

        </div>
      </div>
</div>
