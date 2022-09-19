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

<style>
    input.form-control{
        background-color: #F6F6F6 !important;
        border: 0 !important;
        box-shadow: none !important;
    }
    .main-wrapper{
        background-color: #fff;
    }
    .checkBox_div{
        display: flex;
    justify-content: end;
    flex-direction: row-reverse;
    align-items: center;
    }
    .btn_orange {
        background: #DB1580;
        color: #fff;
        border-radius: 10px;
    }
    .btn_grey_out{
        border: 1px solid #353039;
        color: #000;
        border-radius: 10px;
    }
    .link{
        font-style: normal;
        font-weight: 700;
        font-size: 16px;
        line-height: 14px;
        /* identical to box height, or 88% */

        text-align: center;
        text-decoration-line: underline;

        color: #4F4C52;
    }
</style>

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
        <div class="line spacing"></div>
        <div class="hot_flashes_div spacing">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12" style="display: flex; justify-content:end;">
                    <div class="text-right w-100">
                        <h1 class="mb-4">איזור אישי</h1>
                        <form action="{{ route('store__user_register') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <div class="row justify-content-end">
                                <div class="col-lg-3">
                                    <div class="inputDiv d-flex flex-column mb-4">
                                        <label for="" class="font-size-16">שם משתמש</label>
                                        <input id="name" class="form-control text-right" type="text" name="name" value="{{ $user->name }}"  autocomplete="name">
                                        <span class="text-danger name_valid">{{$errors->first('name')}}</span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="inputDiv d-flex flex-column mb-4">
                                        <label for="" class="font-size-16">אימייל</label>
                                        <input id="email" class="form-control text-right" type="email" name="email" value="{{ $user->email }}"  autocomplete="email">
                                        <span class="text-danger name_valid">{{$errors->first('email')}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-lg-3">
                                    <div class="inputDiv d-flex flex-column mb-4">
                                        <label for=""class="font-size-16">בחר את העיר שלך</label>
                                        
                                        <select name="city_id" id="city_id" class="form-control text-right">
                                            <option selected disabled value="">בחר מתוך הרשימה</option>
                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}" {{ $user->city_id == $city->id ? 'selected' : '' }}> {{$city->hebrew_name}} </option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger name_valid">{{$errors->first('city_id')}}</span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="inputDiv d-flex flex-column mb-4">
                                        <label for="" class="font-size-16">סיסמה</label>
                                        <input id="password"  class="form-control text-right"  type="password" name="password" value=""  autocomplete="password">
                                        <span class="text-danger name_valid">{{$errors->first('password')}}</span>
                                    </div>
                                </div>
                            </div>
                           
                            
                            <div class="checkBox_div">
                                <input type="checkbox" name="" id="approve" checked>
                                <label for="approve" class="font-size-16">אני מאשר קבלת תכנים מדוסיז צרכנות.</label>
                            </div>
                            <div class="checkBox_div">
                                <input type="checkbox" name="" id="policy" checked>
                                <label for="policy" class="font-size-16">אני מסכים <a href="">למדיניות</a>
                                    המערכת...</label>
                            </div>
                            <div class="btns my-3">
                                <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn_grey_out me-2">הצטרפות לעסקים</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                <button type="submit" class="btn btn_orange ml-2">הרשמה לדוסיז</button>
                            </div>
                            <a href="{{route('delete_user')}}" class="link">מחיקת משתמש</a>
                            <!-- <button type="submit" class="font-size-16" style="cursor: pointer;">הרשמה</button> -->
                            <!-- <div class="d-flex justify-content-center mt-4">
                                <a href="" id="signup_btn" class="text-dark">
                                    <b>אין לכם חשבון? לחצו כאן להרשמה > </b>
                                </a>
                            </div> -->
                        </form>
                    </div>
                    </div>
                </div>
            </div>
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