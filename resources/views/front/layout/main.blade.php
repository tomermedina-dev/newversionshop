<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('front.includes.resources-header')
  </head>

  <body>
    @include('front.includes.header')
    <div class="container">
      @yield('content')
    </div>
    @include('front.includes.footer')
  </body>

  @include('front.includes.resources-footer')
</html>
