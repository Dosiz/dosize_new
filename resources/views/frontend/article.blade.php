@extends('layout.product')
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
                                <a class="font-size-16" href="">לעמוד המותג</a>
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
                                <p class="font-size-16">תגובות <span>(33)</span> <img
                                        src="{{asset('assets/img/mobile_component/comment.png') }}" alt=""
                                        class="img-fluid"></p>
                            </div>
                            <div class="formDiv">
                                <form id="blog_comment">
                                    @csrf
                                    <input type="hidden" name="blog_id" value="{{ $blog->id }}" />
                                    <input type="text" name="comment" id="comment" placeholder="התגובה שלך"
                                        class="text-right font-size-16">
                                    
                                    <div class="comment_hearder">
                                        <button type="submit" class="font-size-16">פירסום תגובה</button>
                                        <div class="anonymous_text font-size-16">אנונימי <span
                                                class="checkBox">
                                                <input type="checkbox" name="name" id="approve">
                                                </span></div>
                                    </div>
                                    <span class="text-danger comment_valid" style="position:absolute; bottom:0px;"></span>
                                </form>
                            </div>

                            <div class="comment_list">
                                <ul>
                                    @if(count($blog_comments) > 0)
                                    @foreach($blog_comments as $comment)
                                    <li>
                                        <p class="add_comment font-size-12">הוספת תגובה</p>
                                        <div class="user_detail">
                                            <h4 class="font-size-14"> {{$comment->name ?? $comment->user->name}} </h4>
                                            <p class="font-size-14">{{$comment->comment}}</p>
                                        </div>
                                    </li>
                                    @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="affordable_consumption spacing article_affordable_consumption">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 text-right">
                        <h3 class="common_title">צרכנות משתלמת <img
                                src="{{asset('assets/img/mobile_component/beg.png') }}" alt="" class="img-fluid"></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="affordable_consumption_list d-flex multiple_afforable_consumption">
                            <div class="affordable_consumption_box box_shahdow">
                                <img src="{{asset('assets/img/mobile_component/affordable_iten.png') }}" alt=""
                                    class="img-fluid">
                                <div class="content_div">
                                    <span class="category font-size-12 font-weight-400">נעלי העיר</span>
                                    <h4 class="font-size-12 font-weight-700">קולקציית קיץ הושקה בלידר אתמול
                                        אחרי
                                        הצהריים
                                    </h4>
                                    <p class="discription font-size-10 font-weight-400">צפו בגלריית התמונות
                                        של
                                        הקולקצייה המדהימה הזאת כאן בכתבה
                                    </p>
                                    <span class="font-size-12">4 <i class="fa fa-heart"
                                            aria-hidden="true"></i></span>
                                </div>
                            </div>
                            <div class="affordable_consumption_box box_shahdow">
                                <img src="{{asset('assets/img/mobile_component/affordable_iten.png') }}" alt=""
                                    class="img-fluid">
                                <div class="content_div">
                                    <span class="category font-size-12 font-weight-400">נעלי העיר</span>
                                    <h4 class="font-size-12 font-weight-700">קולקציית קיץ הושקה בלידר אתמול
                                        אחרי
                                        הצהריים
                                    </h4>
                                    <p class="discription font-size-10 font-weight-400">צפו בגלריית התמונות
                                        של
                                        הקולקצייה המדהימה הזאת כאן בכתבה
                                    </p>
                                    <span class="font-size-12">4 <i class="fa fa-heart"
                                            aria-hidden="true"></i></span>
                                </div>
                            </div>
                            <div class="affordable_consumption_box box_shahdow">
                                <img src="{{asset('assets/img/mobile_component/affordable_iten.png') }}" alt=""
                                    class="img-fluid">
                                <div class="content_div">
                                    <span class="category font-size-12 font-weight-400">נעלי העיר</span>
                                    <h4 class="font-size-12 font-weight-700">קולקציית קיץ הושקה בלידר אתמול
                                        אחרי
                                        הצהריים
                                    </h4>
                                    <p class="discription font-size-10 font-weight-400">צפו בגלריית התמונות
                                        של
                                        הקולקצייה המדהימה הזאת כאן בכתבה
                                    </p>
                                    <span class="font-size-12">4 <i class="fa fa-heart"
                                            aria-hidden="true"></i></span>
                                </div>
                            </div>
                            <div class="affordable_consumption_box box_shahdow d-none">
                                <img src="{{asset('assets/img/mobile_component/affordable_iten.png') }}" alt=""
                                    class="img-fluid">
                                <div class="content_div">
                                    <span class="category font-size-12 font-weight-400">נעלי העיר</span>
                                    <h4 class="font-size-12 font-weight-700">קולקציית קיץ הושקה בלידר אתמול
                                        אחרי
                                        הצהריים
                                    </h4>
                                    <p class="discription font-size-10 font-weight-400">צפו בגלריית התמונות
                                        של
                                        הקולקצייה המדהימה הזאת כאן בכתבה
                                    </p>
                                    <span class="font-size-12">4 <i class="fa fa-heart"
                                            aria-hidden="true"></i></span>
                                </div>
                            </div>
                            <a href="" class="desktop_hide learn_more font-size-12 font-weight-400">לכל
                                הכתבות ></a>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
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
@endsection
@section('script')
<script src="{{asset('assets/js/swiper.min.js') }}"></script>
<script src="{{asset('assets/js/script.js') }}"></script>
<script>
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
                console.log("Success");
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
