@extends('front.layout.main')

@section('content')
<div class="container">

<link rel="stylesheet" href="{{ asset('front/css/pages/user-profile.css') }}">
  <div class="nv-profile-content">
    <div class="row">

      <div class="col-lg-3 ">
        @include('front.includes.account-sidenav')
      </div>




      <div class="col-lg-9">
        <div class="nv-manage-account">
          <div class="nv-header nv-font-bc">
            Manage My Account
          </div>
          <div class="row">
            <div class="col-lg-4">
              <div class="card nv-personal-profile nv-default-box-shadow">
                <div class="card-header d-flex justify-content-between">
                  <div class="nv-label">
                    Personal Profile
                  </div>
                  <a href="#" class="nv-edit-button d-block">Edit</a>
                </div>
                <div class="card-body">
                  <ul>
                    <li>Darren Carlos</li>
                    <li>dgcarlos12@gmail.com</li>
                    <li>Taguig, Taguig City, Fort Bonifacio</li>
                    <li class="nv-see-more d-flex justify-content-center"> <a href="#">See More..</a> </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="card nv-address-book nv-default-box-shadow">
                <div class="card-header d-flex justify-content-between">
                  <div class="nv-label">
                    Address Book
                  </div>
                  <a href="#" class="nv-edit-button d-block">Edit</a>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-6">
                      <ul>
                        <li class="nv-header nv-font-bc">Default Shipping Address</li>
                        <li>32nd St. Eco Tower, Fort Bonifacio, Taguig City Metro Manila~Taguig</li>
                        <li>(+63)9174128290</li>
                      </ul>
                    </div>
                    <div class="col-lg-6">
                      <ul>
                        <li class="nv-header nv-font-bc">Default Billing Address</li>
                        <li>32nd St. Eco Tower, Fort Bonifacio, Taguig City Metro Manila~Taguig</li>
                        <li>(+63)9174128290</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="card nv-units nv-default-box-shadow">
                <div class="card-header d-flex justify-content-between">
                  <div class="nv-label">
                    Personal Profile
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
