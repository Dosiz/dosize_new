<!DOCTYPE html>
<html lang="en">
  <head>
    @include('layout.partials.head_admin')
    <title>@yield('title')</title>
  </head>
  @if(Route::is(['error-404','error-500']))
  <body class="error-page">
  @endif
  <body>
  @if(request()->is('login') || request()->is('brand')  || request()->is('/') || request()->is('register') || request()->is('password/reset'))
  @include('layout.partials.header_admin')
  @else
  @include('layout.partials.header_admin')
  @include('layout.partials.nav_admin')
  @endif
 @yield('content')

 @include('layout.partials.footer_admin-scripts')
 @yield('js')
  </body>
</html>