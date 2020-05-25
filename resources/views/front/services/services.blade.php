@extends('front.layout.main')

@section('content')
<title>New Version Shop - Services</title>
<link rel="stylesheet" href="{{ asset('front/css/pages/services.css') }}">
<style media="screen">
  .carousel-control-prev, .carousel-control-next  {
    height: 100%;
    width: 35px;
  }
</style>
<div class="container">
  <div class="nv-services-content">
    @include('front.services.featured')
    @include('front.services.services-list')
  </div>

</div>
<script src="{{ asset('front\js\customs.js') }}" charset="utf-8"></script>
<script src="{{ asset('front\js\services.js') }}" ></script>
<script type="text/javascript">
  var featuredType = 'services';
</script>
<script src="{{ asset('front\js\featured.js') }}" ></script>
@endsection
