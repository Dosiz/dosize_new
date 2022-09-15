<?php
use App\Helpers\Helpers; 
$city_id = Helpers::city_id();
?>
@extends('layout.master')
@section('title')
Dosize
@endsection
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/mobile-style.css') }}">
<link rel="stylesheet" href="{{asset('assets/css/desktop-css.css') }}">
<link rel="stylesheet" href="{{asset('assets/css/swiper.css') }}">
@endpush
@section('content')

<main>
    <div class="main-wrapper">
        <div class="categories spacing">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="swiper myCategorySlider">
                            <div class="swiper-wrapper">
                                
                                @if(count($categories) > 0)
                                
                                @foreach($categories as $key=>$category)
                              
                                <div onclick="open_category('{{route('category_by_city',['category_id'=>$category->id,'city_id'=>$city_id])}}')" class="category_box swiper-slide">
                                    {{-- <a href="{{route('category_by_city',['category_id'=>$category->id,'city_id'=>$city_id])}}" style="color:#212529"> --}}
                                        <div class="img_box box_shahdow">
                                            <img src="{{asset('category/'.$category->image)}}" alt="" class="img-fluid" style="width:28px;">
                                        </div>
                                        <p class="font-weight-600 font-size-12"> {{$category->name}}</p>
                                    {{-- </a> --}}
                                </div>
                                @endforeach
                                @endif


                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(count($bookmark_blogs) > 0)
        <div class="line spacing"></div>
        <div class="affordable_consumption spacing">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 text-right">
                        <h3 class="common_title"> סימניית מאמר <img
                                src="{{ asset('assets/img/mobile_component/percentage_icon.png') }}" alt=""
                                class="img-fluid">
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="affordable_consumption_list d-flex multiple_afforable_consumption">
                        @foreach($bookmark_blogs as $blog)
                        <div class="affordable_consumption_box box_shahdow">
                            <a href="{{route('article',$blog->blog->id)}}">
                                <img src="{{asset('blog/'.$blog->blog->image)}}" alt="" class="img-fluid" style="width: 131px; height:160px;">
                            </a>
                            <div class="content_div">
                                <a href="{{route('article',$blog->blog->id)}}" style="color: #000">
                                    <h4 class="font-size-12 font-weight-700">
                                        {{$blog->blog->title}}
                                    </h4>
                                    {{-- <p class="discription font-size-10 font-weight-400">
                                    {!! \Illuminate\Support\Str::limit($blog->blog->description ?? '',40,'...') !!}
                                    </p> --}}
                                    <p class="discription font-size-10 font-weight-400">
                                        {{ $blog->blog->sub_title ?? '' }}
                                    </p>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if(count($bookmark_products) > 0)
        <div class="line spacing"></div>
        <div class="deals deal_two">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 text-right">
                        <h3 class="common_title"> מוצר סימניה <img
                                src="{{ asset('assets/img/mobile_component/percentage_icon.png') }}" alt=""
                                class="img-fluid">
                        </h3>
                    </div>
                </div>
            </div>
            <div class="slider_div">
                <div class="multiple_deals swiper">
                    <div class="swiper-wrapper">
                        @foreach($bookmark_products as $product)
                        <div class="deals_box box_shahdow swiper-slide">
                            <a href="{{route('product',$product->product->id)}}">
                                <img src="{{asset('product/'.$product->product->image)}}" alt="" class="img-fluid" style="width: 235px; height:146px;">
                            </a>
                            <div class="content_div">
                                <a href="{{route('product',$product->product->id)}}" style="color: #000">
                                    <h4 class="title font-size-14 font-weight-700">
                                        {{ $product->product->name }}
                                    </h4>
                                    <div class="rating_price_div">
                                        <p class="font-size-14 font-weight-600">{{$product->product->price}} ₪ <span
                                                class="font-size-12 font-weight-400">80 ₪</span></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @else
        <div style="height:472px">
            {{-- <p class="text-center">No Bookmark Yet</p> --}}
        </div>
        @endif
        
        <!-- main footer start from here -->
        <div class="main_footer mt-5 d-none d-xl-block">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-4">
                        <div class="box text-right px-3">
                            <p class="txt">בואו לעקוב אחרנו :)</p>
                            <div class="socials_icons mt-4">
                                <a href="#" class="social_link mx-2">
                                    <img src="{{ asset('assets/img/fb.png') }}" alt="fb">
                                </a>
                                <a href="#" class="social_link mx-2">
                                    <img src="{{ asset('assets/img/inst.png') }}" alt="">
                                </a>
                                <a href="#" class="social_link mx-2">
                                    <img src="{{ asset('assets/img/twitter.png') }}" alt="">
                                </a>
                                <a href="#" class="social_link mx-2">
                                    <img src="{{ asset('assets/img/whatsapp.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="box px-3 border_Side">
                            <div class="statments_links d-flex flex-column align-items-end">
                                <p class="txt">
                                    הצטרפו למהפיכת הצרכנות המקומית של דוסיז צרכנות >>‎

                                </p>
                                <div class="btns d-flex mt-4">
                                    <a href="https://dosiz.co.il/landing-page/"  class="btn btn_grey_out">הצטרפות לעסקים</a>
									<!-- data-toggle="modal" data-target="#enrollmentModal" -->
                                    <a  data-toggle="modal" data-target="#enrollmentModal2" href="#" class="btn btn_orange ml-2">הרשמה לדוסיז</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="box px-3 d-flex align-items-center justify-content-center">
                            <img src="{{asset('assets/img/mobile_component/footer_img.svg') }}" class="footer_Img" alt="footer">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main footer start end here -->
        <!--  -->
    </div>
</main>


@endsection
@section('script')
<script src="{{ asset('assets/js/swiper.min.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>
<script>
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