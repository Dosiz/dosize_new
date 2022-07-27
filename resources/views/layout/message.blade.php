<!DOCTYPE html>
<html lang="en">
<head>
  @include('layout.partials.head')
</head>
<body>
    <div class="bg_color">
      @include('layout.partials.message_header')
      @yield('content')
      @include('layout.partials.brand_footer')

    </div>
</body>
@include('layout.partials.footer_scripts')

</html>