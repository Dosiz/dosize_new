@extends('layout.message')
@section('title')
Message
@endsection
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/mobile-style.css') }}">
<link rel="stylesheet" href="{{asset('assets/css/desktop-css.css') }}">
<link rel="stylesheet" href="{{asset('assets/css/swiper.css') }}">
<link rel="stylesheet" href="{{asset('assets/css/thumb-slider.css') }}">
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- <link rel="stylesheet" href="{{asset('assets/star-rating-svg-master/thumb-slider.css') }}"> -->
<style>
    .mobile_header {
        display: none;
        padding: 18px 14px;
        background-color: var(--whiteColor);
        position: fixed;
        top: 0px;
        width: 100%;
        z-index: 999;
        left: 0px;
    }
    s{
        text-decoration: none;
    }
</style>
@endpush
@section('content')
@php 
if($id=="")
{
    $id=Auth::user()->id;
}
@endphp
@livewire('chat.chat',['receiver'=>$id])
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.8.4/swiper-bundle.min.js"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
<script src="{{asset('assets/js/script.js') }}"></script>

<script type="text/javascript">
    $("label").click(function(){
    // $(this).parent().find("label").css({"background-color": "#D8D8D8"});
    // $(this).css({"background-color": "#7ED321"});
    // $(this).nextAll().css({"background-color": "#7ED321"});
    $(this).prev().attr('checked','checked');
    $(this).parent().find("label").css({"color": "#D8D8D8"});
    $(this).css({"color": "#FEA73A"});
    $(this).nextAll().css({"color": "#FEA73A"});
  });
      
  </script>
  <script type="text/javascript">
  
  $(document).ready(function() {
          $('#login-modal').fadeOut()
          $("#signup_btn").click(function(e) {
              e.preventDefault();
              $('#sign_up_modal').fadeOut()
              $('#login-modal').fadeIn()
          });
          $("#login_btn").click(function(e) {
              e.preventDefault();
              $('#sign_up_modal').fadeIn()
              $('#login-modal').fadeOut()
          });
      });
  
  
  
      $('#sign_up_form').submit(function(e){
          e.preventDefault();
          $('.main-wrapper').addClass('active');
          $.ajax({
              type: "POST",
              url: "{{ route('register') }}",
              data: new FormData(this),
              datatype: "json",
              processData: false,
              contentType: false,
              cache: false,
              success: function (data) {
                  console.log("Success");
                  $('.close').click();
                  window.location.href="/";
  
              },
              error: function (data) {
                      $('.name_valid').text(data?.responseJSON?.errors?.name);
                      $('.email_valid').text(data?.responseJSON?.errors?.email);
                      $('.city_valid').text(data?.responseJSON?.errors?.city_id);
                      $('.password_valid').text(data?.responseJSON?.errors?.password);
              }
          });
      });
  
      $('#login_form').submit(function(e){
          e.preventDefault();
          $('.main-wrapper').addClass('active');
          $.ajax({
              type: "POST",
              url: "{{ route('login') }}",
              data: new FormData(this),
              datatype: "json",
              processData: false,
              contentType: false,
              cache: false,
              success: function (data) {
                  // console.log(data);
                  $('.close').click();
                  window.location.href="/dashboard/dashboard";
  
              },
              error: function (data) {
                  console.log('Error:', data.responseJSON);
                  if($('#email').val() == ''){
                      $('.email_valid').text(data.responseJSON.errors.email);
                  }
                  else{
                      $('.email_valid').text('');
                  }
                  if($('#password').val() == ''){
                      $('.password_valid').text(data.responseJSON.errors.password);
                  }
                  else{
                      $('.password_valid').text('');
                  }
  
  
              }
          });
      });
  
  </script>
  @endsection
