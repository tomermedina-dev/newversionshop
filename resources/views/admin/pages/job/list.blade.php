@extends('admin.layout.main')

@section('content')

<link rel="stylesheet" href="{{ asset('admin/css/pages/booked-services-summary.css') }}">
<style media="screen">

</style>
<div class="nv-bss-content" id='nv-jo-list'>

  <div class="row">
    <div class="col-lg-9 col-md-9">
      <h3 class="nv-header nv-font-bc">
        JOB ORDERS
      </h3>
    </div>
    <div class="col-lg-3 col-md-9">
      <div class="input-group mb-3">
        <input type="text" class="form-control nv-input-default nv-font-c" placeholder="Search By..." aria-label="Search By..." >
        <div class="input-group-append ">
          <span class="input-group-text nv-input-default">
            <i class="fas fa-search"aria-hidden="true"></i>
          </span>
        </div>
      </div>
    </div>

  </div>

  <div class="nv-table-container mb-3">
    <table class="nv-table table table-striped ">
      <thead>
        <tr>
          <td class="nv-font-bc" scope="col">Customer Name</td>
          <td class="nv-font-bc" scope="col">Service Name</td>
          <td class="nv-font-bc" scope="col">Booked Date</td>
          <td class="nv-font-bc" scope="col">Date of Service</td>
          <td class="nv-font-bc" scope="col">Notes</td>
          <td class="nv-font-bc" scope="col"></td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="nv-font-bc" scope="col">ERRON MORALES</td>
          <td class="nv-font-bc" scope="col">SERVICE 1</td>
          <td class="nv-font-bc" scope="col">03/14/2020</td>
          <td class="nv-font-bc" scope="col">04/15/2020</td>
          <td class="nv-font-bc" scope="col">NOTE 1</td>
          <td class="nv-font-bc" scope="col" class="info">
            <div class="dropdown">
              <div class="nv-account dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-h"></i>
              </div>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <a class="dropdown-item" href="#">Something</a>
                <a class="dropdown-item" href="#">Something again</a>
                <a class="dropdown-item" href="#">Another Something</a>
              </div>
            </div>
          </td>
        </tr>
        <tr>
          <td class="nv-font-bc" scope="col">ERRON MORALES</td>
          <td class="nv-font-bc" scope="col">SERVICE 1</td>
          <td class="nv-font-bc" scope="col">03/14/2020</td>
          <td class="nv-font-bc" scope="col">04/15/2020</td>
          <td class="nv-font-bc" scope="col">NOTE 1</td>
          <td class="nv-font-bc" scope="col" class="info">
            <div class="dropdown">
              <div class="nv-account dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-h"></i>
              </div>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                <a class="dropdown-item" href="#">Something</a>
                <a class="dropdown-item" href="#">Something again</a>
                <a class="dropdown-item" href="#">Another Something</a>
              </div>
            </div>
          </td>
        </tr>
        <tr>
          <td class="nv-font-bc" scope="col">ERRON MORALES</td>
          <td class="nv-font-bc" scope="col">SERVICE 1</td>
          <td class="nv-font-bc" scope="col">03/14/2020</td>
          <td class="nv-font-bc" scope="col">04/15/2020</td>
          <td class="nv-font-bc" scope="col">NOTE 1</td>
          <td class="nv-font-bc" scope="col" class="info">
            <div class="dropdown">
              <div class="nv-account dropdown-toggle" type="button" id="dropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-h"></i>
              </div>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                <a class="dropdown-item" href="#">Something</a>
                <a class="dropdown-item" href="#">Something again</a>
                <a class="dropdown-item" href="#">Another Something</a>
              </div>
            </div>
          </td>
        </tr>
        <tr>
          <td class="nv-font-bc" scope="col">ERRON MORALES</td>
          <td class="nv-font-bc" scope="col">SERVICE 1</td>
          <td class="nv-font-bc" scope="col">03/14/2020</td>
          <td class="nv-font-bc" scope="col">04/15/2020</td>
          <td class="nv-font-bc" scope="col">NOTE 1</td>
          <td class="nv-font-bc" scope="col" class="info">
            <div class="dropdown">
              <div class="nv-account dropdown-toggle" type="button" id="dropdownMenuButton4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-h"></i>
              </div>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
                <a class="dropdown-item" href="#">Something</a>
                <a class="dropdown-item" href="#">Something again</a>
                <a class="dropdown-item" href="#">Another Something</a>
              </div>
            </div>
          </td>
        </tr>
        <tr>
          <td class="nv-font-bc" scope="col">ERRON MORALES</td>
          <td class="nv-font-bc" scope="col">SERVICE 1</td>
          <td class="nv-font-bc" scope="col">03/14/2020</td>
          <td class="nv-font-bc" scope="col">04/15/2020</td>
          <td class="nv-font-bc" scope="col">NOTE 1</td>
          <td class="nv-font-bc" scope="col" class="info">
            <div class="dropdown">
              <div class="nv-account dropdown-toggle" type="button" id="dropdownMenuButton5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-h"></i>
              </div>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton5">
                <a class="dropdown-item" href="#">Something</a>
                <a class="dropdown-item" href="#">Something again</a>
                <a class="dropdown-item" href="#">Another Something</a>
              </div>
            </div>
          </td>
        </tr>
        <tr>
          <td class="nv-font-bc" scope="col">ERRON MORALES</td>
          <td class="nv-font-bc" scope="col">SERVICE 1</td>
          <td class="nv-font-bc" scope="col">03/14/2020</td>
          <td class="nv-font-bc" scope="col">04/15/2020</td>
          <td class="nv-font-bc" scope="col">NOTE 1</td>
          <td class="nv-font-bc" scope="col" class="info">
            <div class="dropdown">
              <div class="nv-account dropdown-toggle" type="button" id="dropdownMenuButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-h"></i>
              </div>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton6">
                <a class="dropdown-item" href="#">Something</a>
                <a class="dropdown-item" href="#">Something again</a>
                <a class="dropdown-item" href="#">Another Something</a>
              </div>
            </div>
          </td>
        </tr>
        <tr>
          <td class="nv-font-bc" scope="col">ERRON MORALES</td>
          <td class="nv-font-bc" scope="col">SERVICE 1</td>
          <td class="nv-font-bc" scope="col">03/14/2020</td>
          <td class="nv-font-bc" scope="col">04/15/2020</td>
          <td class="nv-font-bc" scope="col">NOTE 1</td>
          <td class="nv-font-bc" scope="col" class="info">
            <div class="dropdown">
              <div class="nv-account dropdown-toggle" type="button" id="dropdownMenuButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-h"></i>
              </div>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                <a class="dropdown-item" href="#">Something</a>
                <a class="dropdown-item" href="#">Something again</a>
                <a class="dropdown-item" href="#">Another Something</a>
              </div>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

    <ul class="pagination pagination-sm nv-pagination justify-content-center align-items-center">
      <li class="page-item nv-previous ">
        <a class="page-link" href="#" tabindex="-1"><i class="fas fa-angle-left"></i></a>
      </li>
      <li class="page-item active"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item nv-next">
        <a class="page-link " href="#" tabindex="-1"><i class="fas fa-angle-right"></i></a>
      </li>
    </ul>
</div>

@endsection
