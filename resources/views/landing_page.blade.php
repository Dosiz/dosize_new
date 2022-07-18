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
                                <div class="category_box swiper-slide">
                                    <div class="img_box box_shahdow">
                                        <img src="{{ asset('assets/img/mobile_component/category_5.png') }}" alt=""
                                            class="img-fluid">
                                    </div>
                                    <p class="font-weight-600 font-size-12">ביגוד והנעלה</p>
                                </div>
                                <div class="category_box swiper-slide">
                                    <div class="img_box box_shahdow">
                                        <img src="{{ asset('assets/img/mobile_component/category_1.png') }}" alt=""
                                            class="img-fluid">
                                    </div>
                                    <p class="font-weight-600 font-size-12">לבית ולגינה</p>
                                </div>
                                <div class="category_box swiper-slide">
                                    <div class="img_box box_shahdow">
                                        <img src="{{ asset('assets/img/mobile_component/category_10.png') }}" alt=""
                                            class="img-fluid">
                                    </div>
                                    <p class="font-weight-600 font-size-12">מזון</p>
                                </div>
                                <div class="category_box swiper-slide">
                                    <div class="img_box box_shahdow">
                                        <img src="{{ asset('assets/img/mobile_component/category_9.png') }}" alt=""
                                            class="img-fluid">
                                    </div>
                                    <p class="font-weight-600 font-size-12">פיננסים</p>
                                </div>
                                <div class="category_box swiper-slide">
                                    <div class="img_box box_shahdow">
                                        <img src="{{ asset('assets/img/mobile_component/category_8.png') }}" alt=""
                                            class="img-fluid">
                                    </div>
                                    <p class="font-weight-600 font-size-12">לבית ולגינה</p>
                                </div>
                                <div class="category_box swiper-slide">
                                    <div class="img_box box_shahdow">
                                        <img src="{{ asset('assets/img/mobile_component/category_1.png') }}" alt=""
                                            class="img-fluid">
                                    </div>
                                    <p class="font-weight-600 font-size-12">לבית ולגינה</p>
                                </div>
                                <div class="category_box swiper-slide">
                                    <div class="img_box box_shahdow">
                                        <img src="{{ asset('assets/img/mobile_component/category_2.png') }}" alt=""
                                            class="img-fluid">
                                    </div>
                                    <p class="font-weight-600 font-size-12">בריאות</p>
                                </div>
                                <div class="category_box swiper-slide">
                                    <div class="img_box box_shahdow">
                                        <img src="{{ asset('assets/img/mobile_component/category_3.png') }}" alt=""
                                            class="img-fluid">
                                    </div>
                                    <p class="font-weight-600 font-size-12">אופנה וטיפוח</p>
                                </div>
                                <div class="category_box swiper-slide">
                                    <div class="img_box box_shahdow">
                                        <img src="{{ asset('assets/img/mobile_component/category_4.png') }}" alt=""
                                            class="img-fluid">
                                    </div>
                                    <p class="font-weight-600 font-size-12">חינוך</p>
                                </div>
                                <div class="category_box swiper-slide">
                                    <div class="img_box box_shahdow">
                                        <img src="{{ asset('assets/img/mobile_component/category_5.png') }}" alt=""
                                            class="img-fluid">
                                    </div>
                                    <p class="font-weight-600 font-size-12">ביגוד והנעלה</p>
                                </div>
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
                    <div class="col-lg-12">
                        <ul>
                            <li class="active">
                                <a class="font-size-12" href="">מבזקים חמים <img
                                        src="{{ asset('assets/img/mobile_component/anaoucment.png') }}" alt=""
                                        class="img-fluid"></a>
                            </li>
                            <li>
                                <a class="font-size-12" href="">שימו לב, חדש באתר! משלוח חינם בקנייה מעל 300
                                    ש”ח <img src="{{ asset('assets/img/mobile_component/flashes_2.png') }}" alt=""
                                        class="img-fluid"></a>
                            </li>
                            <li>
                                <a class="font-size-12" href="">שימו לב, חדש באתר! משלוח חינם בקנייה מעל 300
                                    ש”ח <img src="{{ asset('assets/img/mobile_component/flashes_1.png') }}" alt=""
                                        class="img-fluid"></a>
                            </li>
                            <li>
                                <a class="font-size-12" href="">שימו לב, חדש באתר! משלוח חינם בקנייה מעל 300
                                    ש”ח <img src="{{ asset('assets/img/mobile_component/flashes_2.png') }}" alt=""
                                        class="img-fluid"></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="line spacing"></div>
        <div class="promotion spacing">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 text-right">
                        <h3 class="common_title">המבצעים שלא תרצו לפספס <img
                                src="{{ asset('assets/img/mobile_component/percentage_icon.png') }}" alt=""
                                class="img-fluid">
                        </h3>
                    </div>
                </div>
            </div>
            <div class="slider_div">
                <div class="multiple_promotion swiper">
                    <div class="swiper-wrapper">
                        @if(count($products) > 0)
                            @foreach($products as $product)
                                <div class="promotion_box box_shahdow swiper-slide">
                                    <div class="promotion_img_box">
                                        <img src="{{asset('product/'.$product->image)}}" alt=""
                                            class="img-fluid" style="width: 209px; height:105px;">
                                        <span class="font-size-14 font-weight-700">30%</span>
                                    </div>
                                    <div class="promotion_content">
                                        <div class="time_category_text">
                                            <div class="time_div">
                                                <p>
                                                    <span class="font-size-12 font-weight-600">02</span> : <span
                                                        class="font-size-12 font-weight-600">35</span> : <span
                                                        class="font-size-12 font-weight-600">22</span> 
                                                </p>
                                            </div>
                                            <p class="promotion_category font-size-12 font-weight-400"> {{$product->brandprofile->brand_name}} </p>
                                        </div>
                                        <p class="promotion_title font-size-14 font-weight-700 text-right">
                                            {{$product->name}}
                                        </p>
                                        <div class="price_learn_more">
                                            <a class="font-size-14 font-weight-700" href="">למידע נוסף ></a>
                                            <p class="font-size-14 font-weight-600">{{$product->price}} ₪ <span
                                                    class="font-size-12 font-weight-400">{{$product->discount_price ?? '00'}} ₪</span></p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="line spacing"></div>
        <div class="affordable_consumption spacing">
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
                            @if(count($blogs) > 0)
                            @foreach($blogs as $blog)
                            <div class="affordable_consumption_box box_shahdow">
                                <img src="{{asset('blog/'.$blog->image)}}" alt=""
                                    class="img-fluid" style="width: 131px; height: 160pxpx">
                                <div class="content_div">
                                    <span class="category font-size-12 font-weight-400"> {{$blog->brandprofile->brand_name}} </span>
                                    <h4 class="font-size-12 font-weight-700">
                                        {{$blog->title}}
                                    </h4>
                                    <p class="discription font-size-10 font-weight-400">
                                        {{ substr($blog->description, 0,  30) }}  
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
        <div class="line spacing"></div>
        <div class="order_div spacing">
            <div class="deals deal_one">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <h3 class="common_title">דילים חמים מהתנור <img
                                    src="{{ asset('assets/img/mobile_component/deals.png') }}" alt="" class="img-fluid">
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
                                        <img src="{{asset('product/'.$product->image)}}" alt=""
                                            class="img-fluid" style="width: 208px; height:163px">
                                        <div class="content_div">
                                            <span class="deal_category font-size-12 font-weight-400"> {{$product->brandprofile->brand_name}}</span> </span>
                                            <h4 class="title font-size-14 font-weight-700">  
                                                {{$product->name}}
                                            </h4>
                                            <div class="rating_price_div">
                                                <p class="font-size-14 font-weight-600">50 ₪ <span
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
            <div class="hot_flashes">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <span class="annoucment_text font-size-16 font-weight-600">מבזקים חמים <img
                                    src="{{ asset('assets/img/mobile_component/anaoucment.png') }}" alt=""
                                    class="img-fluid"></span>
                            <div class="hot_flashes_list">
                                <ul>
                                    <li>
                                        <div class="img_box">
                                            <img src="{{ asset('assets/img/mobile_component/flashes_2.png') }}" alt=""
                                                class="img-fluid">
                                        </div>
                                        <p class="flashes_comment font-size-14">שימו לב, חדש באתר! משלוח
                                            חינם בקנייה
                                            מעל
                                            300 ש”ח
                                        </p>
                                    </li>
                                    <li>
                                        <div class="img_box">
                                            <img src="{{ asset('assets/img/mobile_component/flashes_1.png') }}" alt=""
                                                class="img-fluid">
                                        </div>
                                        <p class="flashes_comment font-size-14">שימו לב, חדש באתר! משלוח
                                            חינם בקנייה
                                            מעל
                                            300 ש”ח
                                        </p>
                                    </li>
                                    <li>
                                        <div class="img_box">
                                            <img src="{{ asset('assets/img/mobile_component/flashes_2.png') }}" alt=""
                                                class="img-fluid">
                                        </div>
                                        <p class="flashes_comment font-size-14">שימו לב, חדש באתר! משלוח
                                            חינם בקנייה
                                            מעל
                                            300 ש”ח
                                        </p>
                                    </li>
                                </ul>
                                <p class="more_flashes text-center font-size-12">עוד מבזקים...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="deals deal_two">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <h3 class="common_title">הכי מומלצים <img
                                    src="{{ asset('assets/img/mobile_component/star.png') }}" alt="" class="img-fluid">
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
                                <img src="{{asset('product/'.$product->image)}}" alt=""
                                    class="img-fluid" style="width: 208px; height: 165px;">
                                <div class="content_div">
                                    <span class="deal_category font-size-12 font-weight-400">נעלי
                                        העיר</span>
                                    <h4 class="title font-size-14 font-weight-700">ספה 3 מושבים מעור אמיתי
                                        דגם AKOL
                                    </h4>
                                    <div class="rating_price_div">
                                        <p class="font-size-14 font-weight-600">2,100 ₪ <span
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
        </div>
        <div class="products_div spacing">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 no_padding">
                        <div class="affordable_consumption">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-12 text-right">
                                        <div class="header_cloth">
                                            <img src="{{ asset('assets/img/mobile_component/fashion_groming.png') }}"
                                                alt="" class="img-fluid">
                                            <h3 class="common_title">אופנה וטיפוח <img
                                                    src="{{ asset('assets/img/mobile_component/Line.png') }}" alt=""
                                                    class="img-fluid">
                                            </h3>
                                            <span class="read_more">
                                                <a href="" class="font-size-12 font-weight-400">
                                                    כתבות ביגוד והנעלה</a> </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="article_div">
                                    <div class="row">
                                        <div class="col-lg-6 d-none">
                                            <div class="article_list">
                                                <ul>
                                                    <li class="text-right">
                                                        <a href="">
                                                            <h4 class="font-size-14">
                                                                קולקציית קיץ הושקה בלידר
                                                                אתמול אחרי הצהריים
                                                            </h4>
                                                            <p class="font-size-12">צפו
                                                                בגלריית התמונות של
                                                                הקולקצייה המדהימה הזאת
                                                                כאן
                                                            </p>
                                                        </a>
                                                    </li>
                                                    <li class="text-right">
                                                        <a href="">
                                                            <h4 class="font-size-14">
                                                                קולקציית קיץ הושקה בלידר
                                                                אתמול אחרי הצהריים
                                                            </h4>
                                                            <p class="font-size-12">צפו
                                                                בגלריית התמונות של
                                                                הקולקצייה המדהימה הזאת
                                                                כאן
                                                            </p>
                                                        </a>
                                                    </li>
                                                    <li class="text-right">
                                                        <a href="">
                                                            <h4 class="font-size-14">
                                                                קולקציית קיץ הושקה בלידר
                                                                אתמול אחרי הצהריים
                                                            </h4>
                                                            <p class="font-size-12">צפו
                                                                בגלריית התמונות של
                                                                הקולקצייה המדהימה הזאת
                                                                כאן
                                                            </p>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="main_article">
                                                <div class="article_box">
                                                    <img src="{{ asset('assets/img/mobile_component/recommendedItem.png') }}"
                                                        alt="" class="img-fluid">
                                                    <div class="article_content">
                                                        <h4 class="font-size-18"
                                                            style="margin-bottom: 20px;">
                                                            קולקציית קיץ הושקה בלידר
                                                            אתמול אחרי הצהריים
                                                        </h4>
                                                        <p class="font-size-12">צפו
                                                            בגלריית התמונות של הקולקצייה
                                                            המדהימה הזאת כאן בכתבה
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="affordable_consumption_list">
                                            <div class="affordable_consumption_box box_shahdow">
                                                <img src="{{ asset('assets/img/mobile_component/affordable_iten.png') }}"
                                                    alt="" class="img-fluid">
                                                <div class="content_div">
                                                    <span class="category font-size-12 font-weight-400">נעלי
                                                        העיר</span>
                                                    <h4 class="font-size-14 font-weight-700">
                                                        קולקציית קיץ
                                                        הושקה
                                                        בלידר אתמול
                                                        אחרי
                                                        הצהריים
                                                    </h4>
                                                    <p class="discription font-size-12 font-weight-400">
                                                        צפו
                                                        בגלריית התמונות
                                                        של
                                                        הקולקצייה המדהימה הזאת כאן בכתבה
                                                    </p>
                                                    <span class="font-size-12 like_span">4 <i
                                                            class="fa fa-heart"
                                                            aria-hidden="true"></i></span>
                                                    <div class="rating_price_div">
                                                        <p class="font-size-14 font-weight-600">
                                                            2,100 ₪
                                                        </p>
                                                        <p class="rating_text">4.8 <i
                                                                class="fa fa-star"></i></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="affordable_consumption_box box_shahdow">
                                                <img src="{{ asset('assets/img/mobile_component/affordable_iten.png') }}"
                                                    alt="" class="img-fluid">
                                                <div class="content_div">
                                                    <span class="category font-size-12 font-weight-400">נעלי
                                                        העיר</span>
                                                    <h4 class="font-size-14 font-weight-700">
                                                        קולקציית קיץ
                                                        הושקה
                                                        בלידר אתמול
                                                        אחרי
                                                        הצהריים
                                                    </h4>
                                                    <p class="discription font-size-12 font-weight-400">
                                                        צפו
                                                        בגלריית התמונות
                                                        של
                                                        הקולקצייה המדהימה הזאת כאן בכתבה
                                                    </p>
                                                    <span class="font-size-12 like_span">4 <i
                                                            class="fa fa-heart"
                                                            aria-hidden="true"></i></span>
                                                    <div class="rating_price_div">
                                                        <p class="font-size-14 font-weight-600">
                                                            2,100 ₪
                                                        </p>
                                                        <p class="rating_text">4.8 <i
                                                                class="fa fa-star"></i></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="affordable_consumption_box box_shahdow d-none">
                                                <img src="{{ asset('assets/img/mobile_component/affordable_iten.png') }}"
                                                    alt="" class="img-fluid">
                                                <div class="content_div">
                                                    <span class="category font-size-12 font-weight-400">נעלי
                                                        העיר</span>
                                                    <h4 class="font-size-14 font-weight-700">
                                                        קולקציית קיץ
                                                        הושקה
                                                        בלידר אתמול
                                                        אחרי
                                                        הצהריים
                                                    </h4>
                                                    <p class="discription font-size-12 font-weight-400">
                                                        צפו
                                                        בגלריית התמונות
                                                        של
                                                        הקולקצייה המדהימה הזאת כאן בכתבה
                                                    </p>
                                                    <span class="font-size-12 like_span">4 <i
                                                            class="fa fa-heart"
                                                            aria-hidden="true"></i></span>
                                                    <div class="rating_price_div">
                                                        <p class="font-size-14 font-weight-600">
                                                            2,100 ₪
                                                        </p>
                                                        <p class="rating_text">4.8 <i
                                                                class="fa fa-star"></i></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slider_div">
                                                <img src="{{ asset('assets/img/mobile_component/slider_img.png') }}"
                                                    alt="" class="img-fluid">
                                            </div>
                                            <a href="" class="learn_more font-size-12 font-weight-400">לעוד
                                                כתבות ביגוד
                                                והנעלה
                                                ></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 no_padding">
                        <div class="affordable_consumption">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-12 text-right">
                                        <div class="header_cloth">
                                            <img src="{{ asset('assets/img/mobile_component/shoe_cloth.png') }}" alt=""
                                                class="img-fluid">
                                            <h3 class="common_title">ביגוד והנעלה <img
                                                    src="{{ asset('assets/img/mobile_component/Line.png') }}" alt=""
                                                    class="img-fluid">
                                            </h3>
                                            <span class="read_more">
                                                <a href="" class="font-size-12 font-weight-400">
                                                    < כתבות ביגוד והנעלה</a> </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="article_div">
                                    <div class="row">
                                        <div class="col-lg-6 d-none">
                                            <div class="article_list">
                                                <ul>
                                                    <li class="text-right">
                                                        <a href="">
                                                            <h4 class="font-size-14">
                                                                קולקציית קיץ
                                                                הושקה בלידר
                                                                אתמול אחרי
                                                                הצהריים
                                                            </h4>
                                                            <p class="font-size-12">
                                                                צפו בגלריית
                                                                התמונות של
                                                                הקולקצייה
                                                                המדהימה הזאת כאן
                                                            </p>
                                                        </a>
                                                    </li>
                                                    <li class="text-right">
                                                        <a href="">
                                                            <h4 class="font-size-14">
                                                                קולקציית קיץ
                                                                הושקה בלידר
                                                                אתמול אחרי
                                                                הצהריים
                                                            </h4>
                                                            <p class="font-size-12">
                                                                צפו בגלריית
                                                                התמונות של
                                                                הקולקצייה
                                                                המדהימה הזאת כאן
                                                            </p>
                                                        </a>
                                                    </li>
                                                    <li class="text-right">
                                                        <a href="">
                                                            <h4 class="font-size-14">
                                                                קולקציית קיץ
                                                                הושקה בלידר
                                                                אתמול אחרי
                                                                הצהריים
                                                            </h4>
                                                            <p class="font-size-12">
                                                                צפו בגלריית
                                                                התמונות של
                                                                הקולקצייה
                                                                המדהימה הזאת כאן
                                                            </p>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="main_article">
                                                <div class="article_box">
                                                    <img src="{{ asset('assets/img/mobile_component/recommendedItem.png') }}"
                                                        alt="" class="img-fluid">
                                                    <div class="article_content">
                                                        <h4 class="font-size-18"
                                                            style="margin-bottom: 20px;">
                                                            קולקציית קיץ הושקה
                                                            בלידר אתמול אחרי
                                                            הצהריים
                                                        </h4>
                                                        <p class="font-size-12">
                                                            צפו בגלריית התמונות
                                                            של הקולקצייה המדהימה
                                                            הזאת כאן בכתבה
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="affordable_consumption_list">
                                            <div class="affordable_consumption_box box_shahdow">
                                                <img src="{{ asset('assets/img/mobile_component/affordable_iten.png') }}"
                                                    alt="" class="img-fluid">
                                                <div class="content_div">
                                                    <span class="category font-size-12 font-weight-400">נעלי
                                                        העיר</span>
                                                    <h4 class="font-size-14 font-weight-700">
                                                        קולקציית קיץ
                                                        הושקה
                                                        בלידר אתמול
                                                        אחרי
                                                        הצהריים
                                                    </h4>
                                                    <p class="discription font-size-12 font-weight-400">
                                                        צפו
                                                        בגלריית התמונות
                                                        של
                                                        הקולקצייה המדהימה הזאת כאן בכתבה
                                                    </p>
                                                    <span class="font-size-12 like_span">4
                                                        <i class="fa fa-heart"
                                                            aria-hidden="true"></i></span>
                                                    <div class="rating_price_div">
                                                        <p class="font-size-14 font-weight-600">
                                                            2,100 ₪
                                                        </p>
                                                        <p class="rating_text">4.8 <i
                                                                class="fa fa-star"></i></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="affordable_consumption_box box_shahdow">
                                                <img src="{{ asset('assets/img/mobile_component/affordable_iten.png') }}"
                                                    alt="" class="img-fluid">
                                                <div class="content_div">
                                                    <span class="category font-size-12 font-weight-400">נעלי
                                                        העיר</span>
                                                    <h4 class="font-size-14 font-weight-700">
                                                        קולקציית קיץ
                                                        הושקה
                                                        בלידר אתמול
                                                        אחרי
                                                        הצהריים
                                                    </h4>
                                                    <p class="discription font-size-12 font-weight-400">
                                                        צפו
                                                        בגלריית התמונות
                                                        של
                                                        הקולקצייה המדהימה הזאת כאן בכתבה
                                                    </p>
                                                    <span class="font-size-12 like_span">4
                                                        <i class="fa fa-heart"
                                                            aria-hidden="true"></i></span>
                                                    <div class="rating_price_div">
                                                        <p class="font-size-14 font-weight-600">
                                                            2,100 ₪
                                                        </p>
                                                        <p class="rating_text">4.8 <i
                                                                class="fa fa-star"></i></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="affordable_consumption_box box_shahdow d-none">
                                                <img src="{{ asset('assets/img/mobile_component/affordable_iten.png') }}"
                                                    alt="" class="img-fluid">
                                                <div class="content_div">
                                                    <span class="category font-size-12 font-weight-400">נעלי
                                                        העיר</span>
                                                    <h4 class="font-size-14 font-weight-700">
                                                        קולקציית קיץ
                                                        הושקה
                                                        בלידר אתמול
                                                        אחרי
                                                        הצהריים
                                                    </h4>
                                                    <p class="discription font-size-12 font-weight-400">
                                                        צפו
                                                        בגלריית התמונות
                                                        של
                                                        הקולקצייה המדהימה הזאת כאן בכתבה
                                                    </p>
                                                    <span class="font-size-12 like_span">4
                                                        <i class="fa fa-heart"
                                                            aria-hidden="true"></i></span>
                                                    <div class="rating_price_div">
                                                        <p class="font-size-14 font-weight-600">
                                                            2,100 ₪
                                                        </p>
                                                        <p class="rating_text">4.8 <i
                                                                class="fa fa-star"></i></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slider_div">
                                                <img src="{{ asset('assets/img/mobile_component/slider_img.png') }}"
                                                    alt="" class="img-fluid">
                                            </div>
                                            <a href="" class="learn_more font-size-12 font-weight-400">לעוד
                                                כתבות ביגוד
                                                והנעלה
                                                ></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="home_medical_items spacing">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="affordable_consumption">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-12 text-right">
                                        <div class="header_cloth">
                                            <img src="{{ asset('assets/img/mobile_component/fashion_groming.png') }}"
                                                alt="" class="img-fluid">
                                            <h3 class="common_title">אופנה וטיפוח <img
                                                    src="{{ asset('assets/img/mobile_component/Line.png') }}" alt=""
                                                    class="img-fluid">
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="affordable_consumption_list">
                                            <div class="affordable_consumption_box box_shahdow">
                                                <img src="{{ asset('assets/img/mobile_component/affordable_iten.png') }}"
                                                    alt="" class="img-fluid">
                                                <div class="content_div">
                                                    <span class="category font-size-12 font-weight-400">נעלי
                                                        העיר</span>
                                                    <h4 class="font-size-14 font-weight-700">
                                                        קולקציית קיץ הושקה בלידר אתמול
                                                        אחרי
                                                        הצהריים
                                                    </h4>
                                                    <p class="discription font-size-12 font-weight-400">
                                                        צפו בגלריית התמונות
                                                        של
                                                        הקולקצייה המדהימה הזאת כאן בכתבה
                                                    </p>
                                                    <span class="font-size-12 like_span">4
                                                        <i class="fa fa-heart"
                                                            aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                            <div class="affordable_consumption_box box_shahdow">
                                                <img src="{{ asset('assets/img/mobile_component/affordable_iten.png') }}"
                                                    alt="" class="img-fluid">
                                                <div class="content_div">
                                                    <span class="category font-size-12 font-weight-400">נעלי
                                                        העיר</span>
                                                    <h4 class="font-size-14 font-weight-700">
                                                        ספה 3 מושבים
                                                    </h4>
                                                    <p class="discription font-size-12 font-weight-400">
                                                        צפו בגלריית התמונות
                                                        של
                                                        הקולקצייה המדהימה הזאת כאן בכתבה
                                                    </p>
                                                    <span class="font-size-12 like_span">4
                                                        <i class="fa fa-heart"
                                                            aria-hidden="true"></i></span>
                                                    <div class="rating_price_div">
                                                        <p class="font-size-14 font-weight-600">
                                                            ₪ 2,100
                                                        </p>
                                                        <p class="rating_text"><i class="fa fa-star"></i>
                                                            4.8
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="affordable_consumption_box box_shahdow d-none">
                                                <img src="{{ asset('assets/img/mobile_component/affordable_iten.png') }}"
                                                    alt="" class="img-fluid">
                                                <div class="content_div">
                                                    <span class="category font-size-12 font-weight-400">נעלי
                                                        העיר</span>
                                                    <h4 class="font-size-14 font-weight-700">
                                                        ספה 3 מושבים
                                                    </h4>
                                                    <p class="discription font-size-12 font-weight-400">
                                                        צפו בגלריית התמונות
                                                        של
                                                        הקולקצייה המדהימה הזאת כאן בכתבה
                                                    </p>
                                                    <span class="font-size-12 like_span">4
                                                        <i class="fa fa-heart"
                                                            aria-hidden="true"></i></span>
                                                    <div class="rating_price_div">
                                                        <p class="font-size-14 font-weight-600">
                                                            ₪ 2,100
                                                        </p>
                                                        <p class="rating_text"><i class="fa fa-star"></i>
                                                            4.8
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slider_div">
                                                <img src="{{ asset('assets/img/mobile_component/slider_img.png') }}"
                                                    alt="" class="img-fluid">
                                            </div>
                                            <a href="" class="learn_more font-size-12 font-weight-400">לעוד
                                                כתבות ביגוד
                                                והנעלה
                                                ></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="affordable_consumption">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-12 text-right">
                                        <div class="header_cloth">
                                            <img src="{{ asset('assets/img/mobile_component/fashion_groming.png') }}"
                                                alt="" class="img-fluid">
                                            <h3 class="common_title">אופנה וטיפוח <img
                                                    src="{{ asset('assets/img/mobile_component/Line.png') }}" alt=""
                                                    class="img-fluid">
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="affordable_consumption_list">
                                            <div class="affordable_consumption_box box_shahdow">
                                                <img src="{{ asset('assets/img/mobile_component/affordable_iten.png') }}"
                                                    alt="" class="img-fluid">
                                                <div class="content_div">
                                                    <span class="category font-size-12 font-weight-400">נעלי
                                                        העיר</span>
                                                    <h4 class="font-size-14 font-weight-700">
                                                        קולקציית קיץ הושקה בלידר אתמול
                                                        אחרי
                                                        הצהריים
                                                    </h4>
                                                    <p class="discription font-size-12 font-weight-400">
                                                        צפו בגלריית התמונות
                                                        של
                                                        הקולקצייה המדהימה הזאת כאן בכתבה
                                                    </p>
                                                    <span class="font-size-12 like_span">4
                                                        <i class="fa fa-heart"
                                                            aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                            <div class="affordable_consumption_box box_shahdow">
                                                <img src="{{ asset('assets/img/mobile_component/affordable_iten.png') }}"
                                                    alt="" class="img-fluid">
                                                <div class="content_div">
                                                    <span class="category font-size-12 font-weight-400">נעלי
                                                        העיר</span>
                                                    <h4 class="font-size-14 font-weight-700">
                                                        ספה 3 מושבים
                                                    </h4>
                                                    <p class="discription font-size-12 font-weight-400">
                                                        צפו בגלריית התמונות
                                                        של
                                                        הקולקצייה המדהימה הזאת כאן בכתבה
                                                    </p>
                                                    <span class="font-size-12 like_span">4
                                                        <i class="fa fa-heart"
                                                            aria-hidden="true"></i></span>
                                                    <div class="rating_price_div">
                                                        <p class="font-size-14 font-weight-600">
                                                            ₪ 2,100
                                                        </p>
                                                        <p class="rating_text"><i class="fa fa-star"></i>
                                                            4.8
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="affordable_consumption_box box_shahdow d-none">
                                                <img src="{{ asset('assets/img/mobile_component/affordable_iten.png') }}"
                                                    alt="" class="img-fluid">
                                                <div class="content_div">
                                                    <span class="category font-size-12 font-weight-400">נעלי
                                                        העיר</span>
                                                    <h4 class="font-size-14 font-weight-700">
                                                        ספה 3 מושבים
                                                    </h4>
                                                    <p class="discription font-size-12 font-weight-400">
                                                        צפו בגלריית התמונות
                                                        של
                                                        הקולקצייה המדהימה הזאת כאן בכתבה
                                                    </p>
                                                    <span class="font-size-12 like_span">4
                                                        <i class="fa fa-heart"
                                                            aria-hidden="true"></i></span>
                                                    <div class="rating_price_div">
                                                        <p class="font-size-14 font-weight-600">
                                                            ₪ 2,100
                                                        </p>
                                                        <p class="rating_text"><i class="fa fa-star"></i>
                                                            4.8
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slider_div">
                                                <img src="{{ asset('assets/img/mobile_component/slider_img.png') }}"
                                                    alt="" class="img-fluid">
                                            </div>
                                            <a href="" class="learn_more font-size-12 font-weight-400">לעוד
                                                כתבות ביגוד
                                                והנעלה
                                                ></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="gifts_event_div spacing">
            <div class="affordable_consumption">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <div class="header_cloth">
                                <img src="{{ asset('assets/img/mobile_component/health_medicine.png') }}" alt=""
                                    class="img-fluid">
                                <h3 class="common_title">בריאות ורפואה <img
                                        src="{{ asset('assets/img/mobile_component/Line.png') }}" alt=""
                                        class="img-fluid">
                                </h3>
                                <span class="read_more">
                                    <a href="" class="font-size-12 font-weight-400">לעוד
                                        כתבות ביגוד
                                        והנעלה
                                        ></a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-6 column_width_change">
                        <div class="affordable_consumption">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="affordable_consumption_list">
                                            <div class="affordable_consumption_box box_shahdow">
                                                <img src="{{ asset('assets/img/mobile_component/affordable_iten.png') }}"
                                                    alt="" class="img-fluid">
                                                <div class="content_div">
                                                    <span class="category font-size-12 font-weight-400">נעלי
                                                        העיר</span>
                                                    <h4 class="font-size-14 font-weight-700">
                                                        קולקציית קיץ
                                                        הושקה בלידר אתמול
                                                        אחרי
                                                        הצהריים
                                                    </h4>
                                                    <p class="discription font-size-12 font-weight-400">
                                                        צפו
                                                        בגלריית התמונות
                                                        של
                                                        הקולקצייה המדהימה הזאת כאן בכתבה
                                                    </p>
                                                    <span class="font-size-12 like_span">4
                                                        <i class="fa fa-heart"
                                                            aria-hidden="true"></i></span>
                                                    <div class="rating_price_div">
                                                        <p class="font-size-14 font-weight-600">
                                                            2,100 ₪
                                                        </p>
                                                        <p class="rating_text">4.8 <i
                                                                class="fa fa-star"></i></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="affordable_consumption_box box_shahdow d-none">
                                                <img src="{{ asset('assets/img/mobile_component/affordable_iten.png') }}"
                                                    alt="" class="img-fluid">
                                                <div class="content_div">
                                                    <span class="category font-size-12 font-weight-400">נעלי
                                                        העיר</span>
                                                    <h4 class="font-size-14 font-weight-700">
                                                        קולקציית קיץ
                                                        הושקה בלידר אתמול
                                                        אחרי
                                                        הצהריים
                                                    </h4>
                                                    <p class="discription font-size-12 font-weight-400">
                                                        צפו
                                                        בגלריית התמונות
                                                        של
                                                        הקולקצייה המדהימה הזאת כאן בכתבה
                                                    </p>
                                                    <span class="font-size-12 like_span">4
                                                        <i class="fa fa-heart"
                                                            aria-hidden="true"></i></span>
                                                    <div class="rating_price_div">
                                                        <p class="font-size-14 font-weight-600">
                                                            2,100 ₪
                                                        </p>
                                                        <p class="rating_text">4.8 <i
                                                                class="fa fa-star"></i></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="affordable_consumption_box box_shahdow d-none">
                                                <img src="{{ asset('assets/img/mobile_component/affordable_iten.png') }}"
                                                    alt="" class="img-fluid">
                                                <div class="content_div">
                                                    <span class="category font-size-12 font-weight-400">נעלי
                                                        העיר</span>
                                                    <h4 class="font-size-14 font-weight-700">
                                                        קולקציית קיץ
                                                        הושקה בלידר אתמול
                                                        אחרי
                                                        הצהריים
                                                    </h4>
                                                    <p class="discription font-size-12 font-weight-400">
                                                        צפו
                                                        בגלריית התמונות
                                                        של
                                                        הקולקצייה המדהימה הזאת כאן בכתבה
                                                    </p>
                                                    <span class="font-size-12 like_span">4
                                                        <i class="fa fa-heart"
                                                            aria-hidden="true"></i></span>
                                                    <div class="rating_price_div">
                                                        <p class="font-size-14 font-weight-600">
                                                            2,100 ₪
                                                        </p>
                                                        <p class="rating_text">4.8 <i
                                                                class="fa fa-star"></i></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slider_div">
                                                <img src="{{ asset('assets/img/mobile_component/slider_img.png') }}"
                                                    alt="" class="img-fluid">
                                            </div>
                                            <a href="" class="learn_more font-size-12 font-weight-400">לעוד
                                                כתבות ביגוד
                                                והנעלה
                                                ></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 column_flex_width_change">
                        <div class="article_div">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="article_list">
                                        <ul>
                                            <li class="text-right">
                                                <a href="">
                                                    <h4 class="font-size-14">
                                                        קולקציית קיץ הושקה בלידר
                                                        אתמול אחרי הצהריים
                                                    </h4>
                                                    <p class="font-size-12">צפו
                                                        בגלריית התמונות של
                                                        הקולקצייה המדהימה הזאת
                                                        כאן
                                                    </p>
                                                </a>
                                            </li>
                                            <li class="text-right">
                                                <a href="">
                                                    <h4 class="font-size-14">
                                                        קולקציית קיץ הושקה בלידר
                                                        אתמול אחרי הצהריים
                                                    </h4>
                                                    <p class="font-size-12">צפו
                                                        בגלריית התמונות של
                                                        הקולקצייה המדהימה הזאת
                                                        כאן
                                                    </p>
                                                </a>
                                            </li>
                                            <li class="text-right">
                                                <a href="">
                                                    <h4 class="font-size-14">
                                                        קולקציית קיץ הושקה בלידר
                                                        אתמול אחרי הצהריים
                                                    </h4>
                                                    <p class="font-size-12">צפו
                                                        בגלריית התמונות של
                                                        הקולקצייה המדהימה הזאת
                                                        כאן
                                                    </p>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="main_article">
                                        <div class="article_box">
                                            <img src="{{ asset('assets/img/mobile_component/recommendedItem.png') }}"
                                                alt="" class="img-fluid">
                                            <div class="article_content">
                                                <h4 class="font-size-18" style="margin-bottom: 20px;">
                                                    קולקציית קיץ הושקה בלידר
                                                    אתמול אחרי הצהריים
                                                </h4>
                                                <p class="font-size-12">צפו
                                                    בגלריית התמונות של הקולקצייה
                                                    המדהימה הזאת כאן בכתבה
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  -->
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
        <!--  -->
    </div>
</main>

<div class="modal fade" id="enrollmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <input type="checkbox" name="" id="" checked>
                            <label for="" class="font-size-16">אני מאשר קבלת תכנים מדוסיז צרכנות.</label>
                        </div>
                        <div class="checkBox_div">
                            <input type="checkbox" name="" id="" checked>
                            <label for="" class="font-size-16">אני מסכים <a href="">למדיניות</a>
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

</script>
@endsection