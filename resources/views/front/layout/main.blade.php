<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Version Shop - </title>
    @include('front.includes.resources-header')
  </head>

  <body>
    @include('front.includes.header')
    <div class="container">
      @yield('content')
    </div>
  </body>
  @include('front.includes.resources-footer')
</html>
