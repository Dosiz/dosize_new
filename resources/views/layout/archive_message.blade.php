<!DOCTYPE html>
<html lang="en">
<head>
  @include('layout.partials.head')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>
<body>
    <div class="bg_color">
      @include('layout.partials.archive_message_header')
      @yield('content')
      @include('layout.partials.brand_footer')

    </div>
</body>
@include('layout.partials.footer_scripts')

</html>