<!DOCTYPE html>
<html lang="en">
<head>
  @include('layout.partials.head')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>

<body>
    <div class="bg_color archive">
        @include('layout.partials.product_header')
        @yield('content')
        @include('layout.partials.footer')

    </div>
</body>
@include('layout.partials.footer_scripts')
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