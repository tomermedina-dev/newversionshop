@extends('admin.layout.main')

@section('content')
<link rel="stylesheet" href="{{ asset('admin/css/pages/invoicing.css') }}">

<div class="nv-invoice-content">

  <div class="row">

    <div class="col-lg-6 col-md-12 d-flex d-sm-flex d-md-flex d-lg-none">
      <div class="">
        <div class="nv-invoice nv-font-bc">
          INVOICE
        </div>

        <div class="d-flex justify-content-between">
          <div class="">
            INVOICE ID
          </div>
          <div class="">
            1234567890
          </div>
        </div>
      </div>

    </div>

    <div class="col-lg-6 col-md-12">
      <div class="nv-label-1 mb-3">
        <div class="nv-font-bc">
          INVOICE TO
        </div>
        <div class="nv-name nv-font-bc">
          TOMER CATAHAN MEDINA
        </div>
        <div class="nv-label-1">
          DIRECTOR
        </div>
      </div>

      <div class="mb-3">
        <div class="nv-label-2 nv-font-bc">
          A: 123 HANGGA HAGONOY BULACAN
        </div>
        <div class="nv-label-2 nv-font-bc">
          W: TOMERCATAHANMEDINA@GMAIL.COM
        </div>
        <div class="nv-label-2 nv-font-bc">
          P: +639123456789
        </div>
      </div>
    </div>

    <div class="col-lg-6 col-md-6 justify-content-end d-none d-lg-flex d-xl-flex">
      <div class="">
        <div class="nv-invoice nv-font-bc">
          INVOICE
        </div>

        <div class="d-flex justify-content-between">
          <div class="">
            INVOICE ID
          </div>
          <div class="">
            1234567890
          </div>
        </div>
      </div>

    </div>



  </div>

  <div class="nv-table-container mb-3">
    <table class="nv-table table table-striped ">
      <thead>
        <tr>
          <td class="nv-font-bc" scope="col">Labor Description</td>
          <td class="nv-font-bc" scope="col">parts Description</td>
          <td class="nv-font-bc" scope="col">Quantity</td>
          <td class="nv-font-bc" scope="col">Unit Price</td>
          <td class="nv-font-bc" scope="col">Amount</td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="nv-font-bc" scope="col">LABOR 1</td>
          <td class="nv-font-bc" scope="col">PART 1</td>
          <td class="nv-font-bc" scope="col">28</td>
          <td class="nv-font-bc" scope="col">PHP 2,500</td>
          <td class="nv-font-bc" scope="col">PHP 70,000</td>
        </tr>
        <tr>
          <td class="nv-font-bc" scope="col">LABOR 1</td>
          <td class="nv-font-bc" scope="col">PART 1</td>
          <td class="nv-font-bc" scope="col">28</td>
          <td class="nv-font-bc" scope="col">PHP 2,500</td>
          <td class="nv-font-bc" scope="col">PHP 70,000</td>
        </tr>
        <tr>
          <td class="nv-font-bc" scope="col">LABOR 1</td>
          <td class="nv-font-bc" scope="col">PART 1</td>
          <td class="nv-font-bc" scope="col">28</td>
          <td class="nv-font-bc" scope="col">PHP 2,500</td>
          <td class="nv-font-bc" scope="col">PHP 70,000</td>
        </tr>
        <tr>
          <td class="nv-font-bc" scope="col">LABOR 1</td>
          <td class="nv-font-bc" scope="col">PART 1</td>
          <td class="nv-font-bc" scope="col">28</td>
          <td class="nv-font-bc" scope="col">PHP 2,500</td>
          <td class="nv-font-bc" scope="col">PHP 70,000</td>
        </tr>
        <tr>
          <td class="nv-font-bc" scope="col">LABOR 1</td>
          <td class="nv-font-bc" scope="col">PART 1</td>
          <td class="nv-font-bc" scope="col">28</td>
          <td class="nv-font-bc" scope="col">PHP 2,500</td>
          <td class="nv-font-bc" scope="col">PHP 70,000</td>
        </tr>
      </tbody>
    </table>
  </div>

  <div class="row">
    <div class="col-lg-6 col-md-12">
      <div class="input-group nv-input-group-custom mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text nv-font-c">
            <i class="fas fa-box-open"></i>&nbsp;&nbsp;SUBTOTAL</span>
        </div>
        <input type="text" class="form-control">
      </div>
      <div class="input-group nv-input-group-custom mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text nv-font-c">
            <i class="fas fa-box-open"></i>&nbsp;&nbsp;OTHERS</span>
        </div>
        <input type="text" class="form-control">
      </div>
    </div>
    <div class="col-lg-6 col-md-12">
      <div class="input-group nv-input-group-custom mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text nv-font-c">
            <i class="fas fa-box-open"></i>&nbsp;&nbsp;TOTAL</span>
        </div>
        <input type="text" class="form-control">
      </div>
    </div>
  </div>



  <div class="row d-none d-lg-flex">
    <div class="col-lg-6">
    </div>
    <div class="col-lg-6  d-flex justfy-content-end" style="width:50%;">
        "A FEE OF 500 PESOS STORAGE FEE WILL BE CHARGE TO THE CUSTOMER AFTER A SPAN OF 3 DAYS UPON COMPLETION AND NOTIFICATION TO THE OWNER. AN ADDITIONAL FEE OF 350 PESOS PER DAY AS ON GOING CHARGE FOR UNCLAIMED CARS AFTER ALLOTED TIME"
    </div>
  </div>

  <div class="row d-flex d-sm-flex d-md-flex d-lg-none">
    <div class="col-12  d-flex justfy-content-end" style="width:50%;">
        "A FEE OF 500 PESOS STORAGE FEE WILL BE CHARGE TO THE CUSTOMER AFTER A SPAN OF 3 DAYS UPON COMPLETION AND NOTIFICATION TO THE OWNER. AN ADDITIONAL FEE OF 350 PESOS PER DAY AS ON GOING CHARGE FOR UNCLAIMED CARS AFTER ALLOTED TIME"
    </div>
  </div>
</div>

@endsection
