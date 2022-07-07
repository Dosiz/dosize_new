<!DOCTYPE html>
<html lang="en">
<head>
  @include('layout.partials.head')
</head>

<body>
    <div class="bg_color">
        @include('layout.partials.mobile_side_menu')
        <div class="main_page">
          @include('layout.partials.header')
          @yield('content')
          @include('layout.partials.footer')
            
        </div>
    </div>
</body>
@include('layout.partials.footer_scripts')
</html>