@extends('front.layout.main')

@section('content')
<div class="container">
<link rel="stylesheet" href="{{ asset('front/css/pages/confirmed.css') }}">
<title>New Version Shop - Thanks for ordering!</title>

<script type="text/javascript">
  var orderId =  "{{$orderDetails->id}}";
</script>
<div class="container">
  <div class="nv-confirmed-content">
    <h1 class="nv-font-bc">ORDER CONFIRMATION</h1>
    <div class="nv-order-message">
      <p>Hello <span class="nv-font-bc">{{$orderDetails->first_name}}  {{$orderDetails->last_name}} </span> , </p>
      <p>Thank you for shopping at New Version Shop. Your order number is <span class="nv-font-bc">  {{str_pad( $orderDetails->id , 10, '0', STR_PAD_LEFT)  }}</span>.</p>
    </div>
    <br>
    <div class="nv-shipping-details">
      <p>Please see your order confirmation and delivery detail below.</p>
      <p> <span class="nv-font-bc">Email Address : </span> {{$orderDetails->email}} </p>
      <p> <span class="nv-font-bc">Contact Number : </span> {{$orderDetails->contact}}  </p>
      <p><span class="nv-font-bc">Delivery Method :</span>  {{$orderDetails->delivery_method}}  </p>
      @if($orderDetails->delivery_method == 'Pick-Up')
        <p><span class="nv-font-bc">Pick-up Address : </span>  {{$orderDetails->address}}</p>
      @else
       <p><span class="nv-font-bc">Shipping Address : </span>  {{$orderDetails->address}}</p>
      @endif

      <p><span class="nv-font-bc">Notes / Other details : </span>  {{$orderDetails->notes}} </p>
    </div>
    <a :href="'https://nv.ipayapp.me/?amnt=' + orderTotal.total_amount + '&pid=' + '{{{str_pad( $orderDetails->id , 10, '0', STR_PAD_LEFT)  }}}' "   class="btn btn-lg btn-warning w-25 mb-2"> Send Payment now! </a>

    <div class="nv-table-container mb-3">
      <table class="nv-table table table-striped ">
        <thead>
          <tr>
            <td></td>
            <td class="nv-font-bc" scope="col">Item</td>
            <td class="nv-font-bc" scope="col">Price</td>
            <td class="nv-font-bc" scope="col">Quantity</td>
            <td class="nv-font-bc" scope="col">Total</td>
          </tr>
        </thead>
        <tbody>
          <tr v-for="items in orderList">
            <td>
              <div class="nv-img-container">
                <img  :src="getProductImagesPath(items.product_image)" width="250px" alt="">
              </div>
            </td>
            <td class="nv-font-bc" scope="col">@{{items.name}}</td>
            <td class="nv-font-bc" scope="col">@{{numberWithCommas(items.price)}}</td>
            <td class="nv-font-bc" scope="col">@{{items.quantity}}</td>
            <td class="nv-font-bc" scope="col">₱ @{{parseInt(items.price) * parseInt(items.quantity) }}</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="">
      <h2 class="nv-font-bc" v-cloak>Total Amount : ₱ @{{orderTotal.total_amount}}</h2>
      <a href="/products">Continue Shopping</a>
    </div>
  </div>
</div>
</div>
<script src="{{ asset('front\js\customs.js') }}" charset="utf-8"></script>
<script src="{{ asset('front\js\confirmed.order.js') }}" ></script>
@endsection
