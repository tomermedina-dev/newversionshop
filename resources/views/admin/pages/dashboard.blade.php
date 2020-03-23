<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    @include('fonts.fonts')
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/master.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/sidebar.css') }}">

  </head>
  <body>
    <!-- <div class="e-body">

      <div class="e-sidebar"> -->
      <div class="wrapper e-sidebar">
        @include('admin.includes.sidebar2')
      </div>
      <!-- </div>

    </div> -->





    <script src="{{ asset('jquery\js\jquery.slim.js') }}" charset="utf-8"></script>
    <script src="{{ asset('jquery\js\jquery.min.js') }}" charset="utf-8"></script>
    <script src="{{ asset('bootstrap\js\bootstrap.min.js') }}" charset="utf-8"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
  </body>
</html>
