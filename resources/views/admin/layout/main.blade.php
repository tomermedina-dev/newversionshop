<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    @include('admin.pages.resources.header')
  </head>
  <body>

      <div class="e-body">
          @include('admin.includes.sidebar')
          @include('admin.includes.navbar')
        <div id="container">
          <div class="e-invisible-padding"></div>
          <div id="main-container">
            @yield('content')
          </div>
        </div>
      </div>


    @include('admin.pages.resources.footer')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $('.e-invisible-padding').toggleClass('padded');
                $('.e-navbar .e-navbar-content .e-account').toggleClass('d-none');
            });
        });
    </script>
  </body>
</html>
