@extends('admin.layout.main')

@section('content')

<link rel="stylesheet" href="{{ asset('admin/css/pages/dashboard.css') }}">

<div class="e-dashboard-content">
  <h1 class="e-header e-font-heading-bold">
  Dashboard
  </h1>

  <div class="row">
    <div class="col-sm-12 col-lg-6 e-items">
      <div class="card">
        <div class="card-header">
          <i class="fas fa-clipboard-list"></i>
          <div class="e-text e-font-heading-bold">ORDERS OF THE DAY</div>
        </div>
        <div class="card-body">
          <div class="e-text e-font-count">
            2500
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-12 col-lg-6 e-items">
      <div class="card">
        <div class="card-header">
          <i class="fas fa-edit"></i>
          <div class="e-text e-font-heading-bold">BOOKED SERVICES OF THE DAY</div>
        </div>
        <div class="card-body">
          <div class="e-text e-font-count">
            2500
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-12 col-lg-6 e-items">
      <div class="card">
        <div class="card-header">
          <i class="fas fa-spinner"></i>
          <div class="e-text e-font-heading-bold">IN PROGRESS SERVICES</div>
        </div>
        <div class="card-body">
          <div class="e-text e-font-count">
            2500
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-12 col-lg-6 e-items">
      <div class="card">
        <div class="card-header">
          <i class="fas fa-car-side"></i>
          <div class="e-text e-font-heading-bold">AVAILABLE CARS</div>
        </div>
        <div class="card-body">
          <div class="e-text e-font-count">
            2500
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
