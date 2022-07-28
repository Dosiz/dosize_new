@extends('layout.article')
@section('title')
Articles
@endsection
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/mobile-style.css') }}">
<link rel="stylesheet" href="{{asset('assets/css/swiper.css') }}">
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
</style>
@endpush
@section('content')

@section('content')
<main>
    <div class="main-wrapper article_main_wrapper">
        <div class="article_category_slider categories spacing">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="swiper myCategorySlider">
                            <div class="swiper-wrapper">
                                @if(count($categories) > 0)
                                
                                @foreach($categories as $key=>$category)
                              
                                <div class="category_box swiper-slide">
                       
                                    <div class="img_box box_shahdow">
                                        <img src="{{asset('category/'.$category->image)}}" alt="" class="img-fluid" style="width:28px width:28px;">
                                    </div>
                                    <p class="font-weight-600 font-size-12"> {{$category->name}}</p>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="article_banner">
            <div class="article_slider">
                <div class="slider_div">
                    <div class="multiple_articles swiper_article">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="{{asset('blog/'.$blog->image)}}" alt=""
                                    class="img-fluid"style="width:580px; height:298px;">
                            </div>
                            <div class="swiper-slide">
                                <img src="{{asset('blog/'.$blog->image)}}" alt=""
                                    class="img-fluid"style="width:580px; height:298px;">
                            </div>
                            <div class="swiper-slide">
                                <img src="{{asset('blog/'.$blog->image)}}" alt=""
                                    class="img-fluid"style="width:580px; height:298px;">
                            </div>
                            <div class="swiper-slide">
                                <img src="{{asset('blog/'.$blog->image)}}" alt=""
                                    class="img-fluid"style="width:580px; height:298px;">
                            </div>

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
            <div class="aricle_detail">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <h5 class="article_category font-size-14"> {{$blog->category->name}} </h5>
                            <h2 class="article_title">הולך מעולה: מבצע חם בנעלי העיר על 2 זוגות סנדלים</h2>
                            <p class="article_description font-size-16">הילד שלכם רוצה סנדלים? רוצים לקנות
                                סנדלים לכל המשפחה ולצאת בזול? • מבצע חם במיוחד לקיץ: זוג סנדלים ב-99 ₪ ו-2 ב-159
                                ₪ בלבד • אל תחמיצו את ההזדמנות</p>
                        </div>
                        <div class="col-lg-12">
                            <div class="city_shoe">
                                <img src="{{asset('brand_image/'.$blog->brandprofile->brand_image)}}" style="width: 39px;" alt=""
                                    class="img-fluid">
                                <p class="font-size-18"><span class="category" > {{ $blog->brandprofile->brand_name}} </span>
                                    <span>24.05.22</span> <span>| כ”ג אייר פ”ב</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="article_content_main">
            <div class="article_detail">
                <div class="container-fluid article_mobile_bg_color">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="article_title"> {{$blog->title}} </h4>
                            <div class="line"></div>
                            <div class="article_detail_para">
                                {!! $blog->description !!}
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="article_like">
                                <h4 class="font-size-18 font-weight-600">אהבתם את הכתבה? רוצים לא לפספס את
                                    התכנים שלנו? הרשמו כאן ווקבלו ישירות למייל את התוכן האיכותתי של דוסיז >>>
                                </h4>
                            </div>
                        </div>
                        <div class="deals deal_two">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-12 text-right">
                                        <h3 class="common_title">הכי מומלצים <img
                                                src="{{asset('assets/img/mobile_component/star.png') }}" alt=""
                                                class="img-fluid">
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="slider_div">
                                <div class="multiple_deals swiper">
                                    <div class="swiper-wrapper">
                                        @if(count($products) > 0)
                                        @foreach($products as $product)
                                        <div class="deals_box box_shahdow swiper-slide">
                                            <a class="font-size-14 font-weight-700" href="{{route('product',$product->id ?? '')}}">
                                                <img src="{{asset('product/'.$product->image)}}" alt="" class="img-fluid"style="width:135px; height:107px;">
                                            </a>

                                            <div class="content_div">
                                                <span class="deal_category font-size-12 font-weight-400"> {{$product->brandprofile->brand_name}}</span>
                                                <h4 class="title font-size-14 font-weight-700">
                                                    {{$product->name}}
                                                </h4>
                                                <div class="rating_price_div">
                                                    <p class="font-size-14 font-weight-600">{{$product->price}} ₪ <span
                                                            class="font-size-12 font-weight-400">80 ₪</span></p>
                                                    <p class="rating_text">4.8 <i class="fa fa-star"></i></p>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="multiple_shoe">
                                <ul>
                                    <li class="font-size-12">מבצע</li>
                                    <li class="font-size-12">סנדלים</li>
                                    <li class="font-size-12">נעלי ילדים</li>
                                    <li class="font-size-12">נעלי העיר</li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="stand_brand_sign_up_div">
                            <div class="stand_brand_message">
                                <img src="{{asset('assets/img/mobile_component/flashes_2.png') }}" alt=""
                                    class="img-fluid">
                                <a class="font-size-16" href="{{route('brand-profile',$blog->brand_profile_id)}}">לעמוד המותג</a>
                                <a class="font-size-16" href="">שליחת הודעה</a>
                            </div>
                            <div class="sign_up_div">
                                <img src="{{asset('assets/img/mobile_component/sign_up_icon.png') }}" alt=""
                                    class="img-fluid">
                                <p class="font-size-16">הירשמו בקליק למועדון הצרכנות של <br><a href="">{שם
                                        המותג}</a> ולא תפספסו שום דיל!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="post_comment">
                            <div class="total_comment">
                                <p class="font-size-16">תגובות(<span class="blog_comment_count">{{count($blog_comments)}}</span> )<img
                                        src="{{asset('assets/img/mobile_component/comment.png') }}" alt=""
                                        class="img-fluid"></p>
                            </div>
                            <div class="formDiv">
                                <form id="blog_comment">
                                    @csrf
                                    <input type="hidden" name="blog_id" class="blog_id_like" value="{{ $blog->id }}" />
                                    <input type="text" name="comment" id="comment" placeholder="התגובה שלך"
                                        class="text-right font-size-16 comment_input">
                                    
                                    <div class="comment_hearder">
                                        @guest
                                        <button type="submit" class="font-size-16 enrollemnt_button cursor-pointer" data-toggle="modal" data-target="#enrollmentModal">פירסום תגובה</button>
                                        @else
                                        <button type="submit" class="font-size-16 cursor-pointer">פירסום תגובה</button>
                                        @endguest
                                        <div class="anonymous_text font-size-16">אנונימי <span
                                                class="checkBox">
                                                <input type="checkbox" name="name" id="approve">
                                                </span></div>
                                    </div>
                                    <span class="text-danger comment_valid" style="position:absolute; bottom:0px;"></span>
                                </form>
                            </div>

                            <div class="comment_list">
                                <ul class="new_comment_list">
                                    @if(count($blog_comments) > 0)
                                    @foreach($blog_comments as $comment)
                                    <div>
                                    <li>
                                        <a href="#" class="add_comment font-size-12 text-dark">הוספת תגובה</a>
                                        <div class="user_detail">
                                            <h4 class="font-size-14"> {{$comment->name ?? $comment->user->name}} </h4>
                                            <p class="font-size-14">{{$comment->comment}}</p>
                                        </div>
                                    </li>
                                    <div class="formDiv replyForm">
                                        <form action="{{ route('store-blog-comment-reply') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="blog_id" value="{{ $blog->id }}" />
                                            <input type="hidden" name="blog_comment_id" value="{{$comment->id ?? ''}}" />
                                            <input type="text" name="comment" id="comment" placeholder="התגובה שלך"
                                                class="text-right font-size-16">
                                            
                                            <div class="comment_hearder">
                                                @guest
                                                <button type="submit" class="font-size-16 enrollemnt_button cursor-pointer" data-toggle="modal" data-target="#enrollmentModal">פירסום תגובה</button>
                                                @else
                                                <button type="submit" class="font-size-16 cursor-pointer">פירסום תגובה</button>
                                                @endguest
                                                <div class="anonymous_text font-size-16">אנונימי <span
                                                        class="checkBox">
                                                        <input type="checkbox" name="name" id="approve">
                                                        </span></div>
                                            </div>
                                            <span class="text-danger comment_valid" style="position:absolute; bottom:0px;"></span>
                                         </form>
                                        </div>
                                             
                                    </div>
                                    @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(count($recomanded_blogs) > 0)
        <div class="affordable_consumption spacing article_affordable_consumption">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 text-right">
                        <div
                            class="col-lg-12 d-flex flex-xl-row-reverse justify-content-between align-items-center text-right">
                            <h3 class="common_title">צרכנות משתלמת <img
                                    src="{{asset('assets/img/mobile_component/beg.png') }}" alt=""
                                    class="img-fluid"></h3>
                            <p class="d-none d-xl-block"><a href="#" class="text-dark">לכל הכתבות ></a></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="affordable_consumption_list d-flex multiple_afforable_consumption">
                            @if(count($recomanded_blogs) > 0)
                            @foreach($recomanded_blogs as $recomended_blog)
                            <div class="affordable_consumption_box box_shahdow">
                                <a class="font-size-14 font-weight-700" href="{{route('article',$recomended_blog->recomended_blog->id ?? '')}}">
                                    <img src="{{asset('blog/'.$recomended_blog->recomended_blog->image)}}" alt="" class="img-fluid" style="width:131px; height:181px;">
                                </a>
                                <div class="content_div">
                                    <span class="category font-size-12 font-weight-400"> {{$blog->brandprofile->brand_name}} </span>
                                    <a class="font-size-14 font-weight-700" href="{{route('article',$recomended_blog->recomended_blog->id ?? '')}}" style="color: #212529 !important">
                                    <h4 class="font-size-12 font-weight-700">
                                        {{$recomended_blog->recomended_blog->title}}
                                    </h4>
                                    <p class="discription font-size-10 font-weight-400">
                                        {!! $recomended_blog->recomended_blog->description ?? '' !!}
                                    </p>
                                    </a>
                                    <span class="font-size-12">4 <i class="fa fa-heart"
                                            aria-hidden="true"></i></span>
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
        <!-- main footer -->
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
                            <img src="{{ asset('assets/img/footer_img.png') }}" class="footer_Img" alt="footer">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main footer start end here -->
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul>
                        <li>
                            <a href="">
                                <img src="{{asset('assets/img/mobile_component/email_icon.png') }}" alt=""
                                    class="img-fluid">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="{{asset('assets/img/mobile_component/whtsapp_icon.png') }}" alt=""
                                    class="img-fluid">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="{{asset('assets/img/mobile_component/twitter_icon.png') }}" alt=""
                                    class="img-fluid">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="{{asset('assets/img/mobile_component/facebook_icon.png') }}" alt=""
                                    class="img-fluid">
                            </a>
                        </li>
                    </ul>
                    <div class="copy_input">
                        <i class="fa fa-clone" aria-hidden="true"></i>
                        <input type="text" name="copy_text" id="copy_text"
                            value="https://dossiz-vmnlvb/dfv.co.il" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<div class="modal fade enrollmentModel" id="enrollmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content " id="sign_up_modal">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">הרשמה</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="formDiv">
                    <form id="sign_up_form">
                        @csrf
                        <div class="inputDiv">
                            <label for="" class="font-size-16">שם</label>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            <span class="text-danger name_valid"></span>
                        </div>
                        <div class="inputDiv">
                            <label for="" class="font-size-16">עיר</label>
                            <select name="city_id" id="city_id">
                                <option selected disabled value="">בחר מתוך הרשימה</option>
                                @foreach($cities as $city)
                                    <option value="{{$city->id}}"> {{$city->name}} </option>
                                @endforeach
                            </select>
                            <span class="text-danger city_valid"></span>
                        </div>
                        <div class="inputDiv">
                            <label for="" class="font-size-16">דוא”ל</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                            <span class="text-danger email_valid"></span>
                        </div>
                        <div class="inputDiv">
                            <label for="" class="font-size-16">סיסמה</label>
                            <div class="password_div">
                                <input id="password" type="password" name="password" required autocomplete="new-password">
                                <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                <span class="text-danger password_valid"></span>
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
                        <button type="submit" class="font-size-16">הרשמה</button>
                        <div class="sign_up_with">
                            <h6 class="text-center">או הרשם עם</h6>
                            <div class="signup_btn">
                                <a href="">
                                    <img src="{{ asset('assets/img/mobile_component/facebookIcon.png') }}" alt=""
                                        class="img-fluid">
                                </a>
                                <a href="">
                                    <img src="{{ asset('assets/img/mobile_component/googleIcon.png') }}" alt=""
                                        class="img-fluid">
                                </a>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            <a href="" id="signup_btn" class="text-dark">
                                <b>אין לכם חשבון? לחצו כאן להרשמה > </b>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal-content" id="login-modal">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">התחברות</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="formDiv">
                    <form id="login_form">
                        @csrf
                        <div class="inputDiv">
                            <label for="" class="font-size-16">דוא”ל</label>
                            <input id="email" type="email" name="email" required value="{{ old('email') }}" required autocomplete="email" autofocus>
                            <span class="text-danger email_valid"></span>
                        </div>
                        <div class="inputDiv">
                            <label for="" class="font-size-16">סיסמה</label>
                            <div class="password_div">
                                <input id="password" type="password" name="password" required autocomplete="current-password">
                                <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                <span class="text-danger password_valid"></span>
                            </div>
                        </div>
                        <button type="submit" class="font-size-16"> הרשמה </button>
                        <div class="sign_up_with">
                            <h6 class="text-center">התחברו עם </h6>
                            <div class="signup_btn">
                                <a href="">
                                    <img src="{{ asset('assets/img/mobile_component/facebookIcon.png') }}" alt=""
                                        class="img-fluid">
                                </a>
                                <a href="">
                                    <img src="{{ asset('assets/img/mobile_component/googleIcon.png') }}" alt=""
                                        class="img-fluid">
                                </a>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            <a href="" id="login_btn" class="text-dark">
                            </b> אין לכם חשבון? לחצו כאן להרשמה > </b>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
  
@endsection
@section('script')
<script src="{{asset('assets/js/swiper.min.js') }}"></script>
<script src="{{asset('assets/js/script.js') }}"></script>
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
                window.location.href="/dosiz/public";
                 
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
                window.location.href="/dosiz/public/dashboard/dashboard";
                 
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

    // reply functionality
    $('.replyForm').fadeOut();
    $('.add_comment').click(function(e){
        e.preventDefault();
        $(this).parent().parent().children('.replyForm').fadeToggle();
    })

    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        if (scroll >= 10) {
            $("header .desktop_header").css("display", "none");
            $("header .mobile_header").css("display", "block");
        } else {
            $("header .desktop_header").css("display", "block");
            $("header .mobile_header").css("display", "none");
        }
    });

    $('.blog_like').click(function(e){
        e.preventDefault();
        var blog_id = $('.blog_id_like').val();
        $.ajax({
            type: "POST",
            url: "{{ route('store-blog-comment-like') }}",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                "_token": "{{ csrf_token() }}",
                blog_id:blog_id} ,
            cache: false,
            success: function (data) {
                console.table(data);
                if(data.success == 'Blog Like Removed')
                {
                let likeNum = Number($('.like_count').text())
                $('.like_count').text(likeNum-=1)
                }
                else if(data.success == 'Blog Like successfully')
                {
                let likeNum = Number($('.like_count').text())
                $('.like_count').text(likeNum+=1)
                }
                 
            },
            error: function (data) {
                console.log(data);
            }
        });
    });   

    $('.blog_bookmark').click(function(e){
        e.preventDefault();
        var blog_id = $('.blog_id_like').val();
        $.ajax({
            type: "POST",
            url: "{{ route('store-blog-bookmark') }}",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                "_token": "{{ csrf_token() }}",
                blog_id:blog_id} ,
            cache: false,
            success: function (data) {
                console.table(data);
                if(data.success == 'Blog Bookmark Removed')
                {
                let bookmarkNum = Number($('.bookmark_count').text())
                $('.bookmark_count').text(bookmarkNum-=1)
                }
                else if(data.success == 'Blog Bookmark Successfully')
                {
                let bookmarkNum = Number($('.bookmark_count').text())
                $('.bookmark_count').text(bookmarkNum+=1)
                }
                 
            },
            error: function (data) {
                console.log(data);
            }
        });
    }); 

    $('#blog_comment').submit(function(e){
        e.preventDefault();
        
        $.ajax({
            type: "POST",
            url: "{{ route('store-blog-comment') }}",
            data: new FormData(this),
            datatype: "json",
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
                // console.table(data);
                // console.table(data.comment);
                $('.new_comment_list').prepend(`<li>
                                        <a href="#" class="add_comment font-size-12 text-dark">הוספת תגובה</a>
                                        <div class="user_detail">
                                            <h4 class="font-size-14">${data.name} </h4>
                                            <p class="font-size-14">${data.comment}</p>
                                        </div>
                                    </li>`);
                
                $('.comment_input').val('');
                let commentNum = Number($('.blog_comment_count').text())
                $('.blog_comment_count').text(commentNum+=1)

                let commentsNum = Number($('.comment_count').text())
                $('.comment_count').text(commentsNum+=1)

                $('.close').click();
                 
            },
            error: function (data) {
                if($('#comment').val() == ''){
                    $('.comment_valid').text(data.responseJSON.errors.comment);
                }
                else{
                    $('.comment_valid').text('');
                }
            }
        });
    });
</script>
@endsection
