<!DOCTYPE html>
<html lang="en">
<head>
  @include('layout.partials.head')
</head>
<body>
    <div class="bg_color">
      @include('layout.partials.article_header')
      @yield('content')
      @include('layout.partials.footer')

    </div>
</body>
@include('layout.partials.footer_scripts')

</html>