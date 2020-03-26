<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    @include('admin.pages.resources.header')
  </head>
  <body>

      <div class="nv-body">
          @include('admin.includes.sidebar')
          @include('admin.includes.navbar')
        <div id="container">
          <div class="nv-invisible-padding"></div>
          <div id="main-container">
            @yield('content')
          </div>

          <div class="spinner-border nv-spinner" role="status" >
            <span class="sr-only">Loading...</span>
          </div>
        </div>
      </div>




    @include('admin.pages.resources.footer')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $('.nv-invisible-padding').toggleClass('padded');
                $('.nv-navbar .nv-navbar-content .nv-account').toggleClass('d-none');
            });
        });
    </script>
  </body>
</html>
