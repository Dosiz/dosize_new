<!DOCTYPE html>
<html lang="en">
  <head>
    @include('layout.partials.admin_head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <title>@yield('title')</title>
    @livewireStyles
  </head>
  @if(Route::is(['error-404','error-500']))
  <body class="error-page">
  @endif
  <body>
    @include('layout.partials.admin_header')
    @include('layout.partials.admin_nav')
    @yield('content')

    @include('layout.partials.admin_footer_scripts')
    @livewireScripts
    @yield('js')
  </body>
</html>