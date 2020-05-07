@extends('front.layout.main')

@section('content')
<title>New Version - About Us</title>
<div class="container">
  <img class="d-block w-100" src="{{ asset('images/mockup/about.jpg')}}" >
</div>
<script type="text/javascript">
  $("#nav-about").addClass("active");
</script>
@endsection
