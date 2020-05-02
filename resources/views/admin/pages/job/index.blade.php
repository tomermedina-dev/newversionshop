@extends('admin.layout.main')

@section('content')

<link rel="stylesheet" href="{{ asset('admin/css/pages/job-order.css') }}">
<style media="screen">

</style>
<div class="nv-jo-content">

    <h3 class="nv-header nv-font-bc">
      JOB ORDER
    </h3>

  <div class="nv-table-container mb-3">
    <table class="nv-table table table-striped ">
      <thead>
        <tr>
          <td class="nv-font-bc" scope="col">Labor Description</td>
          <td class="nv-font-bc" scope="col">Parts Description</td>
          <td class="nv-font-bc" scope="col">Quantity</td>
          <td class="nv-font-bc" scope="col">Unit Price</td>
          <td class="nv-font-bc" scope="col">Amount</td>
          <td class="nv-font-bc" scope="col"></td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="nv-font-bc" scope="col">
            <input type="text" name="" value="LABOR 1" placeholder="input details">
          </td>
          <td class="nv-font-bc" scope="col">
            <input type="text" name="" value="PART 1" placeholder="input details">
          </td>
          <td class="nv-font-bc" scope="col">
            <input type="text" name="" value="28" placeholder="input details">
          </td>
          <td class="nv-font-bc" scope="col">
            <input type="text" name="" value="PHP 2,500" placeholder="input details">
          </td>
          <td class="nv-font-bc" scope="col">
            <input type="text" name="" value="PHP 70,000" placeholder="input details">
          </td>
          <td class="nv-font-bc nv-actions" scope="col" class="info">
            <!-- <a href="#"><i class="fas fa-plus-circle"></i></a> -->
          </td>
        </tr>

        <tr>
          <td class="nv-font-bc" scope="col">
            <input type="text" name="" value="LABOR 1" placeholder="input details">
          </td>
          <td class="nv-font-bc" scope="col">
            <input type="text" name="" value="PART 1" placeholder="input details">
          </td>
          <td class="nv-font-bc" scope="col">
            <input type="text" name="" value="28" placeholder="input details">
          </td>
          <td class="nv-font-bc" scope="col">
            <input type="text" name="" value="PHP 2,500" placeholder="input details">
          </td>
          <td class="nv-font-bc" scope="col">
            <input type="text" name="" value="PHP 70,000" placeholder="input details">
          </td>
          <td class="nv-font-bc nv-actions" scope="col" class="info">
            <!-- <a href="#"><i class="fas fa-plus-circle"></i></a> -->
          </td>
        </tr>

        <tr>
          <td class="nv-font-bc" scope="col">
            <input type="text" name="" value="LABOR 1" placeholder="input details">
          </td>
          <td class="nv-font-bc" scope="col">
            <input type="text" name="" value="PART 1" placeholder="input details">
          </td>
          <td class="nv-font-bc" scope="col">
            <input type="text" name="" value="28" placeholder="input details">
          </td>
          <td class="nv-font-bc" scope="col">
            <input type="text" name="" value="PHP 2,500" placeholder="input details">
          </td>
          <td class="nv-font-bc" scope="col">
            <input type="text" name="" value="PHP 70,000" placeholder="input details">
          </td>
          <td class="nv-font-bc nv-actions" scope="col" class="info">
            <!-- <a href="#"><i class="fas fa-plus-circle"></i></a> -->
          </td>
        </tr>

        <tr>
          <td class="nv-font-bc" scope="col">
            <input type="text" name="" value="LABOR 1" placeholder="input details">
          </td>
          <td class="nv-font-bc" scope="col">
            <input type="text" name="" value="PART 1" placeholder="input details">
          </td>
          <td class="nv-font-bc" scope="col">
            <input type="text" name="" value="28" placeholder="input details">
          </td>
          <td class="nv-font-bc" scope="col">
            <input type="text" name="" value="PHP 2,500" placeholder="input details">
          </td>
          <td class="nv-font-bc" scope="col">
            <input type="text" name="" value="PHP 70,000" placeholder="input details">
          </td>
          <td class="nv-font-bc nv-actions" scope="col" class="info">
            <!-- <a href="#"><i class="fas fa-plus-circle"></i></a> -->
          </td>
        </tr>



        <tr>
          <td class="nv-font-bc" scope="col">
            <input type="text" name="" value="LABOR 1" placeholder="input details">
          </td>
          <td class="nv-font-bc" scope="col">
            <input type="text" name="" value="PART 1" placeholder="input details">
          </td>
          <td class="nv-font-bc" scope="col">
            <input type="text" name="" value="28" placeholder="input details">
          </td>
          <td class="nv-font-bc" scope="col">
            <input type="text" name="" value="PHP 2,500" placeholder="input details">
          </td>
          <td class="nv-font-bc" scope="col">
            <input type="text" name="" value="PHP 70,000" placeholder="input details">
          </td>
          <td class="nv-font-bc nv-actions" scope="col" class="info">
            <a href="#"><i class="fas fa-plus-circle"></i></a>
          </td>
        </tr>

      </tbody>
    </table>
  </div>

  <div class="row">
    <div class="col-lg-4">
      <div class="input-group nv-input-group-custom mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text nv-font-c">
            <i class="fas fa-box-open"></i>&nbsp;&nbsp;SUBTOTAL</span>
        </div>
        <input type="text" class="form-control">
      </div>
    </div>
    <div class="col-lg-8">

    </div>
    <div class="col-lg-4">
      <div class="input-group nv-input-group-custom mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text nv-font-c">
            <i class="fas fa-box-open"></i>&nbsp;&nbsp;OTHERS</span>
        </div>
        <input type="text" class="form-control">
      </div>
    </div>
    <div class="col-lg-4">

    </div>
    <div class="col-lg-4">
      <div class="input-group nv-input-group-custom mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text nv-font-c">
            <i class="fas fa-box-open"></i>&nbsp;&nbsp;TOTAL</span>
        </div>
        <input type="text" class="form-control">
      </div>
    </div>
  </div>

</div>

@endsection
