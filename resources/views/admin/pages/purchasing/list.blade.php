@extends('admin.layout.main')

@section('content')
<link rel="stylesheet" href="{{ asset('admin/css/pages/booked-services-summary.css') }}">
<div class="nv-jo-content" id="nv-po-list">

  <div class="row">
    <div class="col-lg-6 col-md-6">
      <h3 class="nv-header nv-font-bc">
        Purchase History
      </h3>
    </div>

      <div class="col-lg-3 col-md-3 justify-content-end">


      </div>

    <div class="col-lg-3 col-md-9">
      <div class="input-group mb-3">
        <input   id="search-po" onkeyup="tableSearch('search-po' , 'table-po-list')"type="text" class="form-control nv-input-default nv-font-c" placeholder="Search ..." aria-label="Search By..." >
        <div class="input-group-append ">
          <span class="input-group-text nv-input-default">
            <i class="fas fa-search"aria-hidden="true"></i>
          </span>
        </div>
      </div>
    </div>
  </div>

  <div class="nv-table-container mb-3">
    <table class="nv-table table table-striped " v-if="poList.length > 0">
      <thead>
        <tr>
          <td class="nv-font-bc" scope="col">Invoice ID</td>
          <td class="nv-font-bc" scope="col">Supplier</td>
          <td class="nv-font-bc" scope="col">Purchase Date</td>
          <td class="nv-font-bc" scope="col">Total Amount</td>
          <td class="nv-font-bc" scope="col">Notes</td>
          <td></td>
        </tr>
      </thead>
      <tbody id="table-po-list"  >
        <tr v-for="po in poList">
          <td class="nv-font-bc" scope="col">
           @{{pad(po.invoice_id)}}
          </td>
          <td class="nv-font-bc" scope="col">
           @{{po.supplier}}
          </td>
          <td class="nv-font-bc" scope="col">
           @{{po.purchase_date}}
          </td>
          <td class="nv-font-bc" scope="col">
           @{{po.total_amount}}
          </td>
          <td class="nv-font-bc" scope="col">
           @{{po.notes}}
          </td>
          <td class="nv-font-bc" scope="col" class="info">
            <div class="dropdown" >
              <div class="nv-account dropdown-toggle" type="button" id="dropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-h"></i>
              </div>
              <div style="z-index:9999" class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                <a class="dropdown-item"  :href="'/admin/purchasing/details/' + pad(po.id)" target="_blank" >View PO Details</a>
                </div>
            </div>
          </td>
        </tr>

      </tbody>

    </table>
    <div v-else class="text-center">
      <h1>No result</h1>
    </div>
  </div>


</div>
<script src="{{ asset('admin\js\purchasing.history.js') }}" ></script>
@endsection
