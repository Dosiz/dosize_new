@extends('layout.product')
@section('title')
Course - Details
@endsection
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/mobile-style.css') }}">
<link rel="stylesheet" href="{{asset('assets/css/desktop-css.css') }}">
<link rel="stylesheet" href="{{asset('assets/css/swiper.css') }}">
<link rel="stylesheet" href="{{asset('assets/css/thumb-slider.css') }}">
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
    <div class="main-wrapper">
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
        <div class="product_div">
            <div class="article_slider">
                <div class="slider_div">
                    <div class="multiple_articles swiper_article thumb_swiper">
                        <div class="swiper-container-wrapper">
                            <!-- Slider main container -->
                            <div class="swiper-container gallery-top">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="{{asset('product/'.$product->image)}}" alt="" class="img-fluid"style="width:360px; height:353px;">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset('product/'.$product->image)}}" alt="" class="img-fluid"style="width:360px; height:353px;">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset('product/'.$product->image)}}" alt="" class="img-fluid"style="width:360px; height:353px;">
                                    </div>

                                </div>

                                <div class="swiper-pagination"></div>
                            </div>
                            <!-- Slider thumbnail container -->
                            <div class="swiper-container gallery-thumbs d-none d-xl-block">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    <!-- Slides -->
                                    <div class="swiper-slide swiperThumbImg">
                                        <img src="{{asset('product/'.$product->image)}}" alt="" class="img-fluid"style="width:131px; height:129px;">
                                    </div>
                                    <div class="swiper-slide swiperThumbImg">
                                        <img src="{{asset('product/'.$product->image)}}" alt="" class="img-fluid"style="width:131px; height:129px;">
                                    </div>
                                    <div class="swiper-slide swiperThumbImg">
                                        <img src="{{asset('product/'.$product->image)}}" alt="" class="img-fluid"style="width:131px; height:129px;">
                                    </div>
                                </div>
                            </div>
                            <!-- container end -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="product_detail">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6 col-xl-12 text-left d-xl-none">
                            <div class="product_price">
                                <p>50 ₪ <span class="font-size-14">80 ₪</span></p>
                            </div>
                        </div>
                        <div class="col-6 col-xl-12 text-right">
                            <div class="product_category">
                                <span> {{$product->brandprofile->brand_name }}</span>
                            </div>
                        </div>
                        <div class="col-12 d-none d-xl-flex my-4 justify-content-end">
                            <img src="{{asset('assets/img/star.png') }}" alt="star">
                            <img src="{{asset('assets/img/star.png') }}" alt="star">
                            <img src="{{asset('assets/img/star.png') }}" alt="star">
                            <img src="{{asset('assets/img/star.png') }}" alt="star">
                            <img src="{{asset('assets/img/star.png') }}" alt="star">
                        </div>
                        <div class="col-6 col-xl-12 text-left d-xl-block d-none mb-4">
                            <div class="product_price d-flex justify-content-end">
                                <p><b>{{$product->name}}</b></p>
                            </div>
                        </div>
                        <div class="col-6 col-xl-12 text-left d-xl-block d-none mb-4">
                            <div class="product_price d-flex justify-content-end">
                                <p>{{$product->discount_price ?? $product->price}} ₪ <span class=" font-size-14">@if($product->discount_price){{$product->price}} ₪ @endif</span></p>
                            </div>
                        </div>
                        {{-- <div class="col-6 col-xl-12 text-left d-xl-block d-none mb-4">
                            <hr>
                            <div class="product_price d-flex justify-content-end py-4">
                                <p><b>מידות</b>: 4, 6, 8, 10, 12</p>
                            </div>
                            <hr>
                        </div> --}}
                    </div>
                </div>
                <div class="product_category_div d-xl-flex justify-content-end">
                    <div class="more_detail_for_purchase">
                        <a href="" class="font-size-16">לפרטים נוספים ולרכישה</a>
                    </div>
                    <div class="choose_size d-xl-none">
                        <a href="" class="font-size-16">בחר מידה ></a>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="product_description">
                                <p class="font-size-16"><b>פרטים:</b></p>
                                <p class="font-size-16"> {!! $product->description !!} </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="deals sliderDivDes">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 text-right">
                        <h3 class="common_title px-xl-2">מוצרים שאולי יעניינו אתכם גם <img
                                src="{{asset('assets/img/mobile_component/deals.png') }}" alt="" class="img-fluid"></h3>
                    </div>
                </div>
            </div>
            <div class="slider_div">
                <div class="multiple_deals swiper">
                    <div class="swiper-wrapper">
                        @if(count($products)>0)
                        @foreach($products as $product_value)
                        <div class="deals_box box_shahdow swiper-slide">
                            <a class="font-size-14 font-weight-700" href="{{route('product',$product_value->id ?? '')}}">
                                <img src="{{asset('product/'.$product_value->image)}}" alt="" class="img-fluid"style="width:100%;">
                            </a>
                            <div class="content_div">
                                <span class="deal_category font-size-12 font-weight-400"> {{$product_value->brandprofile->brand_name}} </span>
                                <h4 class="title font-size-14 font-weight-700">{{$product_value->name}}</h4>
                                <div class="rating_price_div">
                                    <p class="font-size-14 font-weight-600">{{$product_value->discount_price ?? $product_value->price}} ₪ <span
                                            class="font-size-12 font-weight-400">@if($product_value->discount_price){{$product_value->price}} ₪ @endif</span></p>
                                    <p class="rating_text">4.8 <i class="fa fa-star"></i></p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                    <!-- pagination -->
                    <div class="swiper-button-next btn-swiper">
                        <i class="fa fa-caret-right" aria-hidden="true"></i>
                    </div>
                    <div class="swiper-button-prev btn-swiper">
                        <i class="fa fa-caret-left" aria-hidden="true"></i>
                    </div>
                </div>
            </div>

        </div>
        <div class="container-fluid container_desk">
            <div class="row flex-xl-row-reverse">

                <div class="col-lg-12 col-xl-6">
                    <div class="stand_brand_message">
                        <img src="{{asset('assets/img/mobile_component/flashes_2.png') }}" alt="" class="img-fluid">
                        <a class="font-size-16" href="">לעמוד המותג</a>
                        <a class="font-size-16" href="">שליחת הודעה</a>
                    </div>
                </div>
                <div class="col-lg-12 col-xl-6">
                    <div class="sign_up_div">
                        <img src="{{asset('assets/img/mobile_component/sign_up_icon.png') }}" alt="" class="img-fluid">
                        <p class="font-size-16">הירשמו בקליק למועדון הצרכנות של <br><a href="">{שם המותג}</a>
                            ולא תפספסו שום דיל!</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-xl-center">
                <div class="col-xl-8">
                    <div class="post_comment">
                        <div class="total_comment">
                            <p>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </p>
                            <p class="font-size-16">תגובות <span>(33)</span> <img
                                    src="{{asset('assets/img/mobile_component/comment.png') }}" alt=""
                                    class="img-fluid">
                            </p>
                        </div>
                        <form id="product_comment">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}" />
                            <input type="text" name="comment" id="comment" placeholder="התגובה שלך"
                                class="text-right font-size-16">
                            <div class="comment_hearder">
                                <button type="submit" class="font-size-16">פירסום תגובה</button>
                                <div class="anonymous_text font-size-16">אנונימי 
                                    <span class="checkBox">
                                        <input type="checkbox" name="name" id="approve">
                                    </span></div>
                            </div>
                            <span class="text-danger comment_valid" style="position:absolute; bottom:0px;"></span>
                        </form>

                        <div class="comment_list">
                            <ul>
                                @if(count($product_comments) > 0)
                                @foreach($product_comments as $comment)
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
                                @if(count($blogs) > 0)
                                @foreach($blogs as $blog)
                                <div class="affordable_consumption_box box_shahdow">
                                    <a class="font-size-14 font-weight-700" href="{{route('article',$blog->id ?? '')}}">
                                        <img src="{{asset('blog/'.$blog->image)}}" alt="" class="img-fluid" style="width:131px; height:181px;">
                                    </a>
                                    <div class="content_div">
                                        <span class="category font-size-12 font-weight-400"> {{$blog->brandprofile->brand_name}} </span>
                                        <h4 class="font-size-12 font-weight-700">
                                            {{$blog->title}}
                                        </h4>
                                        <p class="discription font-size-10 font-weight-400">
                                            {!! $blog->discription !!}
                                        </p>
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
                                    <img src="{{asset('assets/img/fb.png') }}" alt="fb">
                                </a>
                                <a href="#" class="social_link mx-2">
                                    <img src="{{asset('assets/img/inst.png') }}" alt="">
                                </a>
                                <a href="#" class="social_link mx-2">
                                    <img src="{{asset('assets/img/twitter.png') }}" alt="">
                                </a>
                                <a href="#" class="social_link mx-2">
                                    <img src="{{asset('assets/img/whatsapp.png') }}" alt="">
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
                            <img src="{{asset('assets/img/footer_img.png') }}" class="footer_Img" alt="footer">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.8.4/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

    $('#product_comment').submit(function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "{{ route('store-product-comment') }}",
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

    // for swiper
    $(function () {
        console.log($(window).width())
        if ($(window).width() > 440) {
            var galleryThumbs = new Swiper(".gallery-thumbs", {
                centeredSlides: true,
                centeredSlidesBounds: true,
                direction: "horizontal",
                spaceBetween: 10,
                slidesPerView: 3,
                freeMode: false,
                watchSlidesVisibility: true,
                watchSlidesProgress: true,
                watchOverflow: true,
                breakpoints: {
                    480: {
                        direction: "vertical",
                        slidesPerView: 3
                    }
                }
            });
            var galleryTop = new Swiper(".gallery-top", {
                autoHeight: true,
                direction: "horizontal",
                spaceBetween: 10,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev"
                },
                thumbs: {
                    swiper: galleryThumbs
                }
            });
            galleryTop.on("slideChangeTransitionStart", function () {
                galleryThumbs.slideTo(galleryTop.activeIndex);
            });
            galleryThumbs.on("transitionStart", function () {
                galleryTop.slideTo(galleryThumbs.activeIndex);
            });

        }
    });

    
</script>
@endsection
