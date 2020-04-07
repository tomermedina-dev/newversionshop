@extends('front.layout.main')

@section('content')

<div class="container">

<link rel="stylesheet" href="{{ asset('front/css/pages/orders.css') }}">
  <div class="nv-profile-content">
    <div class="row">

      <div class="col-lg-3 ">
        @include('front.includes.account-sidenav')
      </div>


      <div class="col-lg-9">
        <div class="nv-my-orders">
          <div class="row">
            <div class="col-12">
              <div class="card nv-units nv-default-box-shadow">
                <div class="card-header d-flex justify-content-between">
                  <div class="nv-label">
                    My Cancellations
                  </div>
                </div>
                <div class="card-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <td class="nv-font-bc" scope="col">Brand</td>
                        <td class="nv-font-bc" scope="col">Car Brand</td>
                        <td class="nv-font-bc" scope="col">Model</td>
                        <td class="nv-font-bc" scope="col">Description</td>
                        <td class="nv-font-bc" scope="col"></td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Brand 1</td>
                        <td>Honda</td>
                        <td>Civic Hatchback</td>
                        <td>Description 1</td>
                        <th class="nv-actions"> <a href="#">Edit</a> </th>
                      </tr>
                      <tr>
                        <td>Brand 1</td>
                        <td>Honda</td>
                        <td>Civic Hatchback</td>
                        <td>Description 1</td>
                        <th class="nv-actions"> <a href="#">Edit</a> </th>
                      </tr>
                      <tr>
                        <td>Brand 1</td>
                        <td>Honda</td>
                        <td>Civic Hatchback</td>
                        <td>Description 1</td>
                        <th class="nv-actions"> <a href="#">Edit</a> </th>
                      </tr>
                      <tr>
                        <td>Brand 1</td>
                        <td>Honda</td>
                        <td>Civic Hatchback</td>
                        <td>Description 1</td>
                        <th class="nv-actions"> <a href="#">Edit</a> </th>
                      </tr>

                    </tbody>
                  </table>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</div>


@endsection
