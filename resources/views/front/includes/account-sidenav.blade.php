<link rel="stylesheet" href="{{ asset('front/css/account-sidenav.css') }}">
<script type="text/javascript">
  var userFullName = "{{ session('userName') != null ? session('userName') : ''}}";
</script>
<div class="nv-sidenav nv-default-box-shadow">
  <div class="nv-greetings">

  </div>
  <div class="nv-badge nv-font-bc">
    <i class="fas fa-check"></i>&nbsp;&nbsp;&nbsp;Verified Account
  </div>


  <ul class="nv-sidenav-lists">
    <li class="nv-header nv-font-bc">MANAGE MY ACCOUNT</li>
    <li class="nv-items"> <a href="#">My Profile</a> </li>
    <!-- <li class="nv-items"> <a href="#">Address Book</a> </li>
    <li class="nv-items"> <a href="#">My Payment Option</a> </li> -->
  </ul>

  <ul class="nv-sidenav-lists">
    <li class="nv-header nv-font-bc">MY ORDERS</li>
    <li class="nv-items"> <a href="#">Recent Orders</a> </li>
    <li class="nv-items"> <a href="#">My Returns</a> </li>
    <li class="nv-items"> <a href="#">My Cancellations</a> </li>
  </ul>

  <ul class="nv-sidenav-lists">
    <li class="nv-header nv-font-bc">MY REVIEWS</li>
  </ul>

  <ul class="nv-sidenav-lists">
    <li class="nv-header nv-font-bc">MY FAVORITES</li>
  </ul>

</div>

 
