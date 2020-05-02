<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('bootstrap/css/datepicker3.css') }}">
<link rel="stylesheet" href="{{ asset('bootstrap/css/check-radio.css') }}">
<link rel="stylesheet" href="{{ asset('fonts/fonts.css') }}">
<link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
<!-- <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"> -->
@include('fonts.fonts')
<link rel="stylesheet" href="{{ asset('front/css/header.css') }}">
<link rel="stylesheet" href="{{ asset('front/css/customs.css') }}">
<link rel="stylesheet" href="{{ asset('front/css/master.css') }}">
<link rel="stylesheet" href="{{ asset('front/css/datepicker.css') }}">
<script src="{{ asset('vue\vue.js') }}" ></script>
<script src="{{ asset('vue\axios.min.js') }}" ></script>
<script src="{{ asset('vue\vue-resource.js') }}" ></script>
<link rel="stylesheet" href="{{ asset('sweetalert/css/sweetalert2.css') }}">
<script src="{{ asset('sweetalert\js\sweetalert2.all.min.js') }}" ></script>
<script src="{{ asset('sweetalert\js\swal-alerts.js') }}" ></script>
<script src="{{ asset('jquery\js\jquery.slim.js') }}" charset="utf-8"></script>
<script src="{{ asset('jquery\js\jquery.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('jquery\js\jquery-ui.min.js') }}" charset="utf-8"></script>

<script type="text/javascript">
  var userId = "{{ session('userId') != null ? session('userId') : 0}}";
  var defaultAddress = [];
  var userFullName = "{{ session('userName') != null ? session('userName') : ''}}";
</script>
