<!DOCTYPE html>
<html lang="en">
  <head>
    @include('layout.partials.admin_head')
    <title>@yield('title')</title>
  </head>
  @if(Route::is(['error-404','error-500']))
  <body class="error-page">
  @endif
  <body>
    @include('layout.partials.admin_header')
    @include('layout.partials.admin_nav')
    @yield('content')

    @include('layout.partials.admin_footer_scripts')
    @yield('js')
  </body>
</html>