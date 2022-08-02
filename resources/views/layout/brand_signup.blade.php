<!DOCTYPE html>
<html lang="en">
  <head>
    @include('layout.partials.brand_signup_head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <title>@yield('title')</title>
  </head>
  {{-- @if(Route::is(['mentor-register','login','register','mentee-register'])) --}}
  <body class="account-page">
  {{-- @endif --}}
@include('layout.partials.brand_signup_header')

@yield('content')
<!-- @if(!Route::is(['chat','chat-mentee','voice-call','video-call','login','register','forgot-password']))@endif -->

@include('layout.partials.brand_signup_footer')
@include('layout.partials.brand_signup_footer_scripts')
 @yield('js')
  </body>
</html>