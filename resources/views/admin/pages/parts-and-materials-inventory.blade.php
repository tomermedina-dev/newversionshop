@extends('admin.layout.main')

@section('content')

<link rel="stylesheet" href="{{ asset('admin/css/pages/parts-and-materials-inventory.css') }}">

<div class="nv-pami-content">

  <div class="row">
    <div class="col-lg-9 col-md-9">
      <h3 class="nv-header nv-font-bc">
        PARTS AND MATERIALS INVENTORY
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
          <td class="nv-font-bc" scope="col">Type</td>
          <td class="nv-font-bc" scope="col">Name</td>
          <td class="nv-font-bc" scope="col">Brand</td>
          <td class="nv-font-bc" scope="col">Car Brand</td>
          <td class="nv-font-bc" scope="col">Car Model</td>
          <td class="nv-font-bc" scope="col">Description</td>
          <td class="nv-font-bc" scope="col">Quantity</td>
          <td class="nv-font-bc" scope="col">Price</td>
          <td class="nv-font-bc" scope="col"></td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="nv-font-bc" scope="col">TYPE A</td>
          <td class="nv-font-bc" scope="col">TOMER MEDINA</td>
          <td class="nv-font-bc" scope="col">BRAND X</td>
          <td class="nv-font-bc" scope="col">TOYOTA</td>
          <td class="nv-font-bc" scope="col">INNOVA</td>
          <td class="nv-font-bc" scope="col">DESC 1</td>
          <td class="nv-font-bc" scope="col">2</td>
          <td class="nv-font-bc" scope="col">PHP 10,000</td>
          <td class="nv-font-bc" scope="col" class="info"><i class="fas fa-ellipsis-h"></i></td>
        </tr>
        <tr>
          <td class="nv-font-bc" scope="col">TYPE A</td>
          <td class="nv-font-bc" scope="col">TOMER MEDINA</td>
          <td class="nv-font-bc" scope="col">BRAND X</td>
          <td class="nv-font-bc" scope="col">TOYOTA</td>
          <td class="nv-font-bc" scope="col">INNOVA</td>
          <td class="nv-font-bc" scope="col">DESC 1</td>
          <td class="nv-font-bc" scope="col">2</td>
          <td class="nv-font-bc" scope="col">PHP 10,000</td>
          <td class="nv-font-bc" scope="col" class="info"><i class="fas fa-ellipsis-h"></i></td>
        </tr>
        <tr>
          <td class="nv-font-bc" scope="col">TYPE A</td>
          <td class="nv-font-bc" scope="col">TOMER MEDINA</td>
          <td class="nv-font-bc" scope="col">BRAND X</td>
          <td class="nv-font-bc" scope="col">TOYOTA</td>
          <td class="nv-font-bc" scope="col">INNOVA</td>
          <td class="nv-font-bc" scope="col">DESC 1</td>
          <td class="nv-font-bc" scope="col">2</td>
          <td class="nv-font-bc" scope="col">PHP 10,000</td>
          <td class="nv-font-bc" scope="col" class="info"><i class="fas fa-ellipsis-h"></i></td>
        </tr>
        <tr>
          <td class="nv-font-bc" scope="col">TYPE A</td>
          <td class="nv-font-bc" scope="col">TOMER MEDINA</td>
          <td class="nv-font-bc" scope="col">BRAND X</td>
          <td class="nv-font-bc" scope="col">TOYOTA</td>
          <td class="nv-font-bc" scope="col">INNOVA</td>
          <td class="nv-font-bc" scope="col">DESC 1</td>
          <td class="nv-font-bc" scope="col">2</td>
          <td class="nv-font-bc" scope="col">PHP 10,000</td>
          <td class="nv-font-bc" scope="col" class="info"><i class="fas fa-ellipsis-h"></i></td>
        </tr>
        <tr>
          <td class="nv-font-bc" scope="col">TYPE A</td>
          <td class="nv-font-bc" scope="col">TOMER MEDINA</td>
          <td class="nv-font-bc" scope="col">BRAND X</td>
          <td class="nv-font-bc" scope="col">TOYOTA</td>
          <td class="nv-font-bc" scope="col">INNOVA</td>
          <td class="nv-font-bc" scope="col">DESC 1</td>
          <td class="nv-font-bc" scope="col">2</td>
          <td class="nv-font-bc" scope="col">PHP 10,000</td>
          <td class="nv-font-bc" scope="col" class="info"><i class="fas fa-ellipsis-h"></i></td>
        </tr>
        <tr>
          <td class="nv-font-bc" scope="col">TYPE A</td>
          <td class="nv-font-bc" scope="col">TOMER MEDINA</td>
          <td class="nv-font-bc" scope="col">BRAND X</td>
          <td class="nv-font-bc" scope="col">TOYOTA</td>
          <td class="nv-font-bc" scope="col">INNOVA</td>
          <td class="nv-font-bc" scope="col">DESC 1</td>
          <td class="nv-font-bc" scope="col">2</td>
          <td class="nv-font-bc" scope="col">PHP 10,000</td>
          <td class="nv-font-bc" scope="col" class="info"><i class="fas fa-ellipsis-h"></i></td>
        </tr>
        <tr>
          <td class="nv-font-bc" scope="col">TYPE A</td>
          <td class="nv-font-bc" scope="col">TOMER MEDINA</td>
          <td class="nv-font-bc" scope="col">BRAND X</td>
          <td class="nv-font-bc" scope="col">TOYOTA</td>
          <td class="nv-font-bc" scope="col">INNOVA</td>
          <td class="nv-font-bc" scope="col">DESC 1</td>
          <td class="nv-font-bc" scope="col">2</td>
          <td class="nv-font-bc" scope="col">PHP 10,000</td>
          <td class="nv-font-bc" scope="col" class="info"><i class="fas fa-ellipsis-h"></i></td>
        </tr>
      </tbody>
    </table>
  </div>

  <div class="nv-add-item">
    <button type="button" class="btn btn-sm nv-btn-txt-dark nv-font-bc" data-toggle="modal" data-target="#addItemModal">
      <i class="fas fa-plus-circle"></i>&nbsp;
      ADD ITEM
      </button>

      <div class="modal fade nv-modal" id="addItemModal" tabindex="-1" role="dialog" aria-labelledby="addItemModalLabel" aria-hidden="true">
        <!-- <div class="nv-invisible-padding"></div> -->
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <div class="modal-title">
              <div class="nv-title nv-font-bc">ADD ITEM</div>
              <div class="nv-subtitle">Fill out the details below.</div>
            </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <div class="row">

              <div class="col-lg-6">

                <div class="input-group nv-input-group-custom mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text nv-font-c">
                      <i class="fas fa-box-open"></i>&nbsp;&nbsp;TYPE</span>
                  </div>
                  <input type="text" class="form-control">
                </div>

                <div class="input-group nv-input-group-custom mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text nv-font-c">
                      <i class="fas fa-box-open"></i>&nbsp;&nbsp;BRAND</span>
                  </div>
                  <input type="text" class="form-control">
                </div>

                <div class="input-group nv-input-group-custom mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text nv-font-c">
                      <i class="fas fa-box-open"></i>&nbsp;&nbsp;CAR MODEL</span>
                  </div>
                  <input type="text" class="form-control">
                </div>

                <div class="input-group nv-input-group-custom mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text nv-font-c">
                      <i class="fas fa-box-open"></i>&nbsp;&nbsp;QUANTITY</span>
                  </div>
                  <input type="text" class="form-control">
                </div>
              </div>

              <div class="col-lg-6">
                <div class="input-group nv-input-group-custom mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text nv-font-c">
                      <i class="fas fa-box-open"></i>&nbsp;&nbsp;NAME</span>
                  </div>
                  <input type="text" class="form-control">
                </div>

                <div class="input-group nv-input-group-custom mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text nv-font-c">
                      <i class="fas fa-box-open"></i>&nbsp;&nbsp;CAR BRAND</span>
                  </div>
                  <input type="text" class="form-control">
                </div>

                <div class="input-group nv-input-group-custom mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text nv-font-c">
                      <i class="fas fa-box-open"></i>&nbsp;&nbsp;DESCRIPTION</span>
                  </div>
                  <input type="text" class="form-control">
                </div>

                <div class="input-group nv-input-group-custom mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text nv-font-c">
                      <i class="fas fa-box-open"></i>&nbsp;&nbsp;PRICE</span>
                  </div>
                  <input type="text" class="form-control">
                </div>
              </div>

            </div>



          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm nv-btn-txt-dark nv-font-bc" data-toggle="modal" data-target="#addItemModal">
              <i class="fas fa-forward"></i>&nbsp;
              PROCEED
            </button>
          </div>
        </div>
      </div>
    </div>
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
