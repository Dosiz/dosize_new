<!DOCTYPE html>
<html lang="en">
  <head>
    @if(isset($brand_profile))
    <meta property="og:title" content="{{$brand_profile->brand_name ?? ''}}">
    <meta name="description" content="{{$brand_profile->description ?? ''}}"/>
    <meta property="og:description" content="{{$brand_profile->description ?? ''}}" />
    <meta property="og:image:alt" content="{{$brand_profile->brand_name ?? ''}}" />
    <meta name="twitter:title" content="{{$brand_profile->brand_name ?? ''}}" />
    <meta property="og:image" content="{{asset('brand_image/'.$brand_profile->brand_image ?? '')}}" />
    <meta property="og:image:secure_url" content="{{asset('brand_image/'.$brand_profile->brand_image ?? '')}}" />
    <meta property="og:image:width" content="999" />
    <meta property="og:image:height" content="984" />
    <meta property="og:image:alt" content="בית האופנה GOLBARY משיק קולקציית בישום לנשים. סקירה דוסיז צרכנות." />
    <meta property="og:image:type" content="image/jpeg/png" />
    <meta name="twitter:image" content="{{asset('brand_image/'.$brand_profile->brand_image ?? '')}}" />
    <meta name="twitter:description" content="{{$brand_profile->description ?? ''}}" />
    @endif
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
 <script src="https://cdn.enable.co.il/licenses/enable-L12268se734xbazj-0822-30217/init.js"></script>
  </body>
  @if (count($errors) > 0)
  @if($errors->first('email')=='These credentials do not match our records.')
  <script>
      $('#enrollmentModal2').modal('show');
  </script>
  @else
  <script>
      $('#enrollmentModal').modal('show');
  </script>
  @endif
@endif
</html>