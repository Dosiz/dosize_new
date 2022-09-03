<?php
use App\Helpers\Helpers; 
$city_id = Helpers::city_id();
?>
@extends('layout.master')
@section('title')
Search Product
@endsection
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/mobile-style.css') }}">
<link rel="stylesheet" href="{{asset('assets/css/desktop-css.css') }}">
<link rel="stylesheet" href="{{asset('assets/css/swiper.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
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
                              
                                <div class="category_box swiper-slide">
                                    <a href="{{route('category_by_city',['category_id'=>$category->id,'city_id'=>$city_id])}}" style="color:#212529">
                                        <div class="img_box box_shahdow">
                                            <img src="{{asset('category/'.$category->image)}}" alt="" class="img-fluid" style="width:28px width:28px;">
                                        </div>
                                        <p class="font-weight-600 font-size-12"> {{$category->name}}</p>
                                    </a>
                                </div>
                                @endforeach
                                @endif


                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main_wallet_div d-lg-none">
            {{-- <img src="{{asset('assets/img/mobile_component/wallet_main.png') }}" alt="" class="img-fluid"> --}}
            <h3>הארנק שלי</h3>
            {{-- <p class="font-size-14">דוסיז צרכנות מעניקה עבור כל פעילות במערכת נקודות, הנקודות ניתנות למימוש בלה --}}
                בלה בלה...</p>
        </div>
        <div class="">
            {{-- <div class="col-lg-3">
                <div class="container-fluid">
                    <div class="main_wallet_div d-none d-lg-block bg-white py-3 mb-0 mt-4 rounded">
                        <img src="{{asset('assets/img/mobile_component/wallet_main.png') }}" alt="" class="img-fluid">
                        <h3>הארנק שלי</h3>
                        <p class="font-size-14"> מוצרים </p>
                    </div>
                    
                </div>
            </div> --}}
            @if(count($product_results) > 0)
            <div class="col-lg-12">
                <div class="promotion wallet_promotion">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <h3 class="common_title">ההצעות הקרובות בשבילך <img
                                        src="{{asset('assets/img/mobile_component/gift_pack.png') }}" alt="" class="img-fluid">
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="slider_div">
                        <div class="multiple_promotion swiper">
                            <div class="swiper-wrapper">
                                @if(count($product_results) > 0)
                                @foreach($product_results as $result)
                                <div class="promotion_box box_shahdow swiper-slide">
                                    <div class="promotion_img_box">
                                        <img src="{{asset('product/'.$result->image)}}" alt="" class="img-fluid" style="width:225px; height:112px;">
                                        <span class="font-size-14 font-weight-700" style="visibility: hidden">30%</span>
                                    </div>
                                    <div class="promotion_content">
                                        <div class="time_category_text">
                                            <div class="time_div" style="visibility: hidden">
                                                <p>
                                                    <span class="font-size-12 font-weight-600">02</span> : <span
                                                        class="font-size-12 font-weight-600">35</span> : <span
                                                        class="font-size-12 font-weight-600">22</span>
                                                </p>
                                            </div>
                                            <p class="promotion_category font-size-12 font-weight-400"> {{$result->brandprofile->brand_name}} </p>
                                        </div>
                                        <h4 class="title font-size-14 font-weight-700">  
                                            {{$result->name}}
                                        </h4>
                                        <p class="promotion_title font-size-14 font-weight-700 text-right">
                                            {!! substr($result->description, 0,  30) !!}
                                        </p>
                                        <div class="price_learn_more">
                                            <a href=""  data-toggle="modal" data-target="#exampleModal" class="font-size-14 font-weight-700" style="cursor:pointer;">קבל ></a>
                                            <p class="font-size-14 font-weight-600">{{$result->price}} ₪ </p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
        
                </div>
            </div>
            @endif

            @if(count($article_results) > 0)
            <div class="line spacing"></div>
            <div class="affordable_consumption spacing ">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <h3 class="common_title">צרכנות משתלמת <img
                                    src="{{ asset('assets/img/mobile_component/beg.png') }}" alt="" class="img-fluid"></h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="affordable_consumption_list d-flex multiple_afforable_consumption">
                                @if(count($article_results) > 0)
                                @foreach($article_results as $blog)
                                
                                <div class="affordable_consumption_box box_shahdow">
                                    <a href="{{route('article',$blog->id)}}">
                                    <img src="{{asset('blog/'.$blog->image)}}" alt=""
                                        class="img-fluid" style="width: 131px; height: 160px">
                                    </a>
                                    <div class="content_div">
                                        <a href="https://{{$blog->brandprofile->short_name ?? ''}}.arikliger.com/brand">
                                        <span class="category font-size-12 font-weight-400"> {{$blog->brandprofile->brand_name}} </span>
                                        </a>
                                        <a href="{{route('article',$blog->id)}}" style="color: #212529 !important">
                                        <h4 class="font-size-12 font-weight-700">
                                            {{$blog->title}}
                                        </h4>
                                        <p class="discription font-size-10 font-weight-400">
                                            {!! substr($blog->description, 0,  30) !!}  
                                        </p>
                                        </a>
                                        {{-- <span class="font-size-12">{{$blog->totallikes}} <i class="fa fa-heart"
                                                aria-hidden="true"></i></span> --}}
                                    </div>
                                </div>
                                @endforeach
                                @endif
                                <a href="" class="desktop_hide learn_more font-size-12 font-weight-400">לכל
                                    הכתבות ></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

        </div>
            <!-- main footer start from here -->
            <div class="main_footer mt-5 d-none d-xl-block">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <div class="box text-right px-3">
                                <p class="txt">בואו לעקוב אחרנו :)</p>
                                <div class="socials_icons mt-4">
                                    <a href="#" class="social_link mx-2">
                                        <img src="../../assets/img/fb.png" alt="fb">
                                    </a>
                                    <a href="#" class="social_link mx-2">
                                        <img src="../../assets/img/inst.png" alt="">
                                    </a>
                                    <a href="#" class="social_link mx-2">
                                        <img src="../../assets/img/twitter.png" alt="">
                                    </a>
                                    <a href="#" class="social_link mx-2">
                                        <img src="../../assets/img/whatsapp.png" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="box px-3 border_Side">
                                <div class="statments_links d-flex flex-column align-items-end">
                                    <p class="txt">
                                        דוסיז משפט הנעה על דוסיז >>
                                    </p>
                                    <div class="btns d-flex mt-4">
                                        <a href="#" class="btn btn_grey_out">הצטרפות לעסקים</a>
                                        <a href="#" class="btn btn_orange ml-2">הרשמה לדוסיז</a>
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
    </div>
</main>

@endsection
@section('script')

<script src="{{ asset('assets/js/swiper.min.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>
<script src="{{ asset('assets/js/Minimal-jQuery-Countdown/jquery.countdown.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
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

    // console.log($('.example'))
    [...document.querySelectorAll('.example')].forEach(elem => {
        $(elem).countdown({
        date: elem.getAttribute('discount-time')
        }, function () {
            $(elem).parent().parent().parent().parent().addClass('d-none');
    });
    });

    document.querySelector('#purchase_product2').addEventListener('click', function(e) {
        // e.stopPropagation();
        e.preventDefault();
        alert(100);
    })

    // $('#purchase_product').click(function(e){
    //     e.preventDefault();
    //     alert('Purchase Product');
    //     exit();
    //     let brand_profile_id = $('#brand_profile_id').val();
    //     let email = $('#email').val();
    //     let _token   = $('meta[name="csrf-token"]').attr('content');
    //     // console.log(postFormData);
    //     $.ajax({
    //         type: "POST",
    //         url: "{{ route('store-subscriber') }}",
    //         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    //         data: {
    //             email:email,
    //             brand_profile_id:brand_profile_id,
    //             _token: _token
    //         } ,
    //         datatype: "json",
    //         success: function (data) {
    //              console.table(data.success);
    //             toastr.success(data.success);
    //             // console.table(data.comment);
                
                 
    //         },
    //         error: function (data) {
    //             // toastr.warning(data);
    //             toastr.error("Already Subscribed");
                
    //         }
    //     });
    });

</script>
@endsection