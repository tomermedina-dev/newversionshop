@extends('front.layout.main')

@section('content')
<title>New Version Shop - Recent Orders</title>
<div class="container">
<link rel="stylesheet" href="{{ asset('front/css/pages/orders.css') }}">
<style media="screen">
  .nv-header-order-details p{
    color: black !important;
    margin: 0;
  }
</style>
  <div class="nv-profile-content" id="nv-orders-list">
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
                    Recent Orders
                  </div>
                </div>
                <div class="card-body">
                  @foreach($orderHistory as $order)
                    <div class="container mt-2">
                      <div class="bg-white rounded p-2">
                        <div class="row nv-header-order-details">
                          <div class="col-lg-6">
                            <h2><b>Order ID : </b>  {{$order['order_id']}} </h2>
                            <h4><b>Total Amount :  </b> ₱  {{$order['total_amount']}}</h4>
                            <h4><b>Total Items :  </b>  {{$order['items_count']}}</h4>
                            @if($order['delivery_method'] == 'Shipping')
                            <h4> <b>Status:  </b> {{$order['is_delivered'] =='1' ? 'Delivered' : 'Pending'}}   </h4>
                            @else
                            <h4> <b>Status : </b>  {{$order['is_claimed'] =='1' ? 'Claimed' : 'Unclaimed'}}  </h4>
                            @endif
                          </div>
                          <div class="col-lg-6">
                            <p><b>Delivery Method</b> : {{$order['delivery_method']}}</p>
                            <p><b>Address</b> : {{$order['address']}}</p>
                            <p><b>Contact</b> : {{$order['contact']}}</p>
                            <p><b>Notes</b> : {{$order['notes']}}</p>
                            <p><b>Date Ordered</b> : {{$order['order_date']}}</p>

                          </div>
                        </div>
                        <div class="nv-line-divider m-2 bg-dark"></div>
                        <div class="container">
                          <table class="table">
                            <thead>
                              <tr>
                                <td class="nv-font-bc" scope="col"></td>
                                <td class="nv-font-bc" scope="col">Item</td>
                                <td class="nv-font-bc" scope="col">Price</td>
                                <td class="nv-font-bc" scope="col">Quantity</td>
                                <td class="nv-font-bc" scope="col">Total</td>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($order['order_items'] as $orderItems)
                              <tr>
                                <td>
                                  <img  width="100px" height="100px" src="{{ asset('uploads/images/products/'.$orderItems->product_image) }}">
                                </td>
                                <td>{{$orderItems->name}}</td>
                                <td>{{$orderItems->price}}</td>
                                <td>{{ $orderItems->quantity}}</td>
                                <td>{{$orderItems->price * $orderItems->quantity}}</td>

                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="nv-line-divider m-2 bg-dark"></div>
                  @endforeach
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
<script src="{{ asset('front\js\customs.js') }}" charset="utf-8"></script>
<script src="{{ asset('front\js\order.recents.js') }}" ></script>

@endsection
