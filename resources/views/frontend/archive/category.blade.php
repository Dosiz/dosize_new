@extends('layout.master')
@section('title')
Archive - Catagorey
@endsection
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/mobile-style.css') }}">
<link rel="stylesheet" href="{{asset('assets/css/desktop-css.css') }}">
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
<main style="padding-bottom:200px">
    <div class="main-wrapper">
        <div class="article_category_slider categories spacing">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="swiper myCategorySlider">
                            <div class="swiper-wrapper">
                                <div class="category_box swiper-slide">
                                    <div class="img_box box_shahdow">
                                        <img src="{{asset('assets/img/mobile_component/category_5.png') }}" alt=""
                                            class="img-fluid">
                                    </div>
                                    <p class="font-weight-600 font-size-12">ביגוד והנעלה</p>
                                </div>
                                <div class="category_box swiper-slide">
                                    <div class="img_box box_shahdow">
                                        <img src="{{asset('assets/img/mobile_component/category_1.png') }}" alt=""
                                            class="img-fluid">
                                    </div>
                                    <p class="font-weight-600 font-size-12">לבית ולגינה</p>
                                </div>
                                <div class="category_box swiper-slide">
                                    <div class="img_box box_shahdow">
                                        <img src="{{asset('assets/img/mobile_component/category_10.png') }}" alt=""
                                            class="img-fluid">
                                    </div>
                                    <p class="font-weight-600 font-size-12">מזון</p>
                                </div>
                                <div class="category_box swiper-slide">
                                    <div class="img_box box_shahdow">
                                        <img src="{{asset('assets/img/mobile_component/category_9.png') }}" alt=""
                                            class="img-fluid">
                                    </div>
                                    <p class="font-weight-600 font-size-12">פיננסים</p>
                                </div>
                                <div class="category_box swiper-slide">
                                    <div class="img_box box_shahdow">
                                        <img src="{{asset('assets/img/mobile_component/category_8.png') }}" alt=""
                                            class="img-fluid">
                                    </div>
                                    <p class="font-weight-600 font-size-12">לבית ולגינה</p>
                                </div>
                                <div class="category_box swiper-slide">
                                    <div class="img_box box_shahdow">
                                        <img src="{{asset('assets/img/mobile_component/category_1.png') }}" alt=""
                                            class="img-fluid">
                                    </div>
                                    <p class="font-weight-600 font-size-12">לבית ולגינה</p>
                                </div>
                                <div class="category_box swiper-slide">
                                    <div class="img_box box_shahdow">
                                        <img src="{{asset('assets/img/mobile_component/category_2.png') }}" alt=""
                                            class="img-fluid">
                                    </div>
                                    <p class="font-weight-600 font-size-12">בריאות</p>
                                </div>
                                <div class="category_box swiper-slide">
                                    <div class="img_box box_shahdow">
                                        <img src="{{asset('assets/img/mobile_component/category_3.png') }}" alt=""
                                            class="img-fluid">
                                    </div>
                                    <p class="font-weight-600 font-size-12">אופנה וטיפוח</p>
                                </div>
                                <div class="category_box swiper-slide">
                                    <div class="img_box box_shahdow">
                                        <img src="{{asset('assets/img/mobile_component/category_4.png') }}" alt=""
                                            class="img-fluid">
                                    </div>
                                    <p class="font-weight-600 font-size-12">חינוך</p>
                                </div>
                                <div class="category_box swiper-slide">
                                    <div class="img_box box_shahdow">
                                        <img src="{{asset('assets/img/mobile_component/category_5.png') }}" alt=""
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
        <div class="search_clothFoot d-flex justify-content-xl-between justify-content-end">
            <div class="d-none d-xl-block">
                <div class="input_search position-relative">
                    <span class="icon"><i class="fa fa-search" aria-hidden="true"></i></span>
                    <input type="text">
                    <a href="#" class="link">חיפוש ...</a>
                </div>
            </div>
            <div class="cloth_footwear d-flex align-items-center">
                <p class="mr-2 font-bold"><b>ביגוד והנעלה</b></p>
                <img src="{{asset('assets/img/clothFoot.png') }}" alt="clothFootWear">
            </div>
        </div>
        <!--  -->
        <div class="promotion spacing">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 text-right">
                        <h3 class="common_title">המבצעים שלא תרצו לפספס <img
                                src="{{asset('assets/img/mobile_component/percentage_icon.png') }}" alt=""
                                class="img-fluid">
                        </h3>
                    </div>
                </div>
            </div>
            <div class="slider_div">
                <div class="multiple_promotion swiper">
                    <div class="swiper-wrapper">
                        <div class="promotion_box box_shahdow swiper-slide">
                            <div class="promotion_img_box">
                                <img src="{{asset('assets/img/mobile_component/promotionImg.png') }}" alt=""
                                    class="img-fluid">
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
                                    <p class="promotion_category font-size-12 font-weight-400">נעלי העיר</p>
                                </div>
                                <p class="promotion_title font-size-14 font-weight-700 text-right">רהיטי בלה
                                    בלה
                                    ספה 3 מושבים במצבעדחלישד עביע
                                </p>
                                <div class="price_learn_more">
                                    <a class="font-size-14 font-weight-700" href="">למידע נוסף ></a>
                                    <p class="font-size-14 font-weight-600">2,100 ₪ <span
                                            class="font-size-12 font-weight-400">80 ₪</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="promotion_box box_shahdow swiper-slide">
                            <div class="promotion_img_box">
                                <img src="{{asset('assets/img/mobile_component/promotionImg.png') }}" alt=""
                                    class="img-fluid">
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
                                    <p class="promotion_category font-size-12 font-weight-400">נעלי העיר</p>
                                </div>
                                <p class="promotion_title font-size-14 font-weight-700 text-right">רהיטי בלה
                                    בלה
                                    ספה 3 מושבים במצבעדחלישד עביע
                                </p>
                                <div class="price_learn_more">
                                    <a class="font-size-14 font-weight-700" href="">למידע נוסף ></a>
                                    <p class="font-size-14 font-weight-600">2,100 ₪ <span
                                            class="font-size-12 font-weight-400">80 ₪</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="promotion_box box_shahdow swiper-slide">
                            <div class="promotion_img_box">
                                <img src="{{asset('assets/img/mobile_component/promotionImg.png') }}" alt=""
                                    class="img-fluid">
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
                                    <p class="promotion_category font-size-12 font-weight-400">נעלי העיר</p>
                                </div>
                                <p class="promotion_title font-size-14 font-weight-700 text-right">רהיטי בלה
                                    בלה
                                    ספה 3 מושבים במצבעדחלישד עביע
                                </p>
                                <div class="price_learn_more">
                                    <a class="font-size-14 font-weight-700" href="">למידע נוסף ></a>
                                    <p class="font-size-14 font-weight-600">2,100 ₪ <span
                                            class="font-size-12 font-weight-400">80 ₪</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="promotion_box box_shahdow swiper-slide">
                            <div class="promotion_img_box">
                                <img src="{{asset('assets/img/mobile_component/promotionImg.png') }}" alt=""
                                    class="img-fluid">
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
                                    <p class="promotion_category font-size-12 font-weight-400">נעלי העיר</p>
                                </div>
                                <p class="promotion_title font-size-14 font-weight-700 text-right">רהיטי בלה
                                    בלה
                                    ספה 3 מושבים במצבעדחלישד עביע
                                </p>
                                <div class="price_learn_more">
                                    <a class="font-size-14 font-weight-700" href="">למידע נוסף ></a>
                                    <p class="font-size-14 font-weight-600">2,100 ₪ <span
                                            class="font-size-12 font-weight-400">80 ₪</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="promotion_box box_shahdow swiper-slide">
                            <div class="promotion_img_box">
                                <img src="{{asset('assets/img/mobile_component/promotionImg.png') }}" alt=""
                                    class="img-fluid">
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
                                    <p class="promotion_category font-size-12 font-weight-400">נעלי העיר</p>
                                </div>
                                <p class="promotion_title font-size-14 font-weight-700 text-right">רהיטי בלה
                                    בלה
                                    ספה 3 מושבים במצבעדחלישד עביע
                                </p>
                                <div class="price_learn_more">
                                    <a class="font-size-14 font-weight-700" href="">למידע נוסף ></a>
                                    <p class="font-size-14 font-weight-600">2,100 ₪ <span
                                            class="font-size-12 font-weight-400">80 ₪</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="promotion_box box_shahdow swiper-slide">
                            <div class="promotion_img_box">
                                <img src="{{asset('assets/img/mobile_component/promotionImg.png') }}" alt=""
                                    class="img-fluid">
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
                                    <p class="promotion_category font-size-12 font-weight-400">נעלי העיר</p>
                                </div>
                                <p class="promotion_title font-size-14 font-weight-700 text-right">רהיטי בלה
                                    בלה
                                    ספה 3 מושבים במצבעדחלישד עביע
                                </p>
                                <div class="price_learn_more">
                                    <a class="font-size-14 font-weight-700" href="">למידע נוסף ></a>
                                    <p class="font-size-14 font-weight-600">2,100 ₪ <span
                                            class="font-size-12 font-weight-400">80 ₪</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- pagination -->
                    <div class="swiper-button-next btn-swiper">
                        <i class="fa fa-caret-left" aria-hidden="true"></i>
                    </div>
                    <div class="swiper-button-prev btn-swiper">
                        <i class="fa fa-caret-right" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
        <!--  -->
        <div class="affordable_consumption spacing">
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
                            <div class="affordable_consumption_box box_shahdow d-none d-xl-flex">
                                <img src="{{asset('assets/img/mobile_component/affordable_iten.png') }}') }}" alt=""
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
                            <div class="affordable_consumption_box box_shahdow d-none d-xl-flex">
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
                            <div class="affordable_consumption_box box_shahdow d-none d-xl-flex">
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
                            <!-- <a href="" class="desktop_hide d-none learn_more font-size-12 font-weight-400">לכל
                                הכתבות ></a> -->
                        </div>
                        <div class="more_btn mt-4 d-flex justify-content-center">
                            <a href="#" class="btn btn_outline_grey">עוד כתבות</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  -->
        <div class="deals sliderDivDes mt-0 pt-3">
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
                        <div class="deals_box box_shahdow swiper-slide">
                            <img src="{{asset('assets/img/mobile_component/recommendedItem.png') }}" alt=""
                                class="w-100">
                            <div class="content_div">
                                <span class="deal_category font-size-12 font-weight-400">נעלי העיר</span>
                                <h4 class="title font-size-14 font-weight-700">סט חולצות ילדים</h4>
                                <div class="rating_price_div">
                                    <p class="font-size-14 font-weight-600">50 ₪ <span
                                            class="font-size-12 font-weight-400">80 ₪</span></p>
                                    <p class="rating_text">4.8 <i class="fa fa-star"></i></p>
                                </div>
                            </div>
                        </div>
                        <div class="deals_box box_shahdow swiper-slide">
                            <img src="{{asset('assets/img/mobile_component/recommendedItem.png') }}" alt=""
                                class="w-100">
                            <div class="content_div">
                                <span class="deal_category font-size-12 font-weight-400">נעלי העיר</span>
                                <h4 class="title font-size-14 font-weight-700">סט חולצות ילדים</h4>
                                <div class="rating_price_div">
                                    <p class="font-size-14 font-weight-600">50 ₪ <span
                                            class="font-size-12 font-weight-400">80 ₪</span></p>
                                    <p class="rating_text">4.8 <i class="fa fa-star"></i></p>
                                </div>
                            </div>
                        </div>
                        <div class="deals_box box_shahdow swiper-slide">
                            <img src="{{asset('assets/img/mobile_component/recommendedItem.png') }}" alt=""
                                class="w-100">
                            <div class="content_div">
                                <span class="deal_category font-size-12 font-weight-400">נעלי העיר</span>
                                <h4 class="title font-size-14 font-weight-700">סט חולצות ילדים</h4>
                                <div class="rating_price_div">
                                    <p class="font-size-14 font-weight-600">50 ₪ <span
                                            class="font-size-12 font-weight-400">80 ₪</span></p>
                                    <p class="rating_text">4.8 <i class="fa fa-star"></i></p>
                                </div>
                            </div>
                        </div>
                        <div class="deals_box box_shahdow swiper-slide">
                            <img src="{{asset('assets/img/mobile_component/recommendedItem.png') }}" alt=""
                                class="w-100">
                            <div class="content_div">
                                <span class="deal_category font-size-12 font-weight-400">נעלי העיר</span>
                                <h4 class="title font-size-14 font-weight-700">סט חולצות ילדים</h4>
                                <div class="rating_price_div">
                                    <p class="font-size-14 font-weight-600">50 ₪ <span
                                            class="font-size-12 font-weight-400">80 ₪</span></p>
                                    <p class="rating_text">4.8 <i class="fa fa-star"></i></p>
                                </div>
                            </div>
                        </div>
                        <div class="deals_box box_shahdow swiper-slide">
                            <img src="{{asset('assets/img/mobile_component/recommendedItem.png') }}" alt=""
                                class="w-100">
                            <div class="content_div">
                                <span class="deal_category font-size-12 font-weight-400">נעלי העיר</span>
                                <h4 class="title font-size-14 font-weight-700">סט חולצות ילדים</h4>
                                <div class="rating_price_div">
                                    <p class="font-size-14 font-weight-600">50 ₪ <span
                                            class="font-size-12 font-weight-400">80 ₪</span></p>
                                    <p class="rating_text">4.8 <i class="fa fa-star"></i></p>
                                </div>
                            </div>
                        </div>
                        <div class="deals_box box_shahdow swiper-slide">
                            <img src="{{asset('assets/img/mobile_component/recommendedItem.png') }}" alt=""
                                class="w-100">
                            <div class="content_div">
                                <span class="deal_category font-size-12 font-weight-400">נעלי העיר</span>
                                <h4 class="title font-size-14 font-weight-700">סט חולצות ילדים</h4>
                                <div class="rating_price_div">
                                    <p class="font-size-14 font-weight-600">50 ₪ <span
                                            class="font-size-12 font-weight-400">80 ₪</span></p>
                                    <p class="rating_text">4.8 <i class="fa fa-star"></i></p>
                                </div>
                            </div>
                        </div>
                        <div class="deals_box box_shahdow swiper-slide">
                            <img src="{{asset('assets/img/mobile_component/recommendedItem.png') }}" alt=""
                                class="w-100">
                            <div class="content_div">
                                <span class="deal_category font-size-12 font-weight-400">נעלי העיר</span>
                                <h4 class="title font-size-14 font-weight-700">סט חולצות ילדים</h4>
                                <div class="rating_price_div">
                                    <p class="font-size-14 font-weight-600">50 ₪ <span
                                            class="font-size-12 font-weight-400">80 ₪</span></p>
                                    <p class="rating_text">4.8 <i class="fa fa-star"></i></p>
                                </div>
                            </div>
                        </div>
                        <div class="deals_box box_shahdow swiper-slide">
                            <img src="{{asset('assets/img/mobile_component/recommendedItem.png') }}" alt=""
                                class="w-100">
                            <div class="content_div">
                                <span class="deal_category font-size-12 font-weight-400">נעלי העיר</span>
                                <h4 class="title font-size-14 font-weight-700">סט חולצות ילדים</h4>
                                <div class="rating_price_div">
                                    <p class="font-size-14 font-weight-600">50 ₪ <span
                                            class="font-size-12 font-weight-400">80 ₪</span></p>
                                    <p class="rating_text">4.8 <i class="fa fa-star"></i></p>
                                </div>
                            </div>
                        </div>
                        <div class="deals_box box_shahdow swiper-slide">
                            <img src="{{asset('assets/img/mobile_component/recommendedItem.png') }}" alt=""
                                class="w-100">
                            <div class="content_div">
                                <span class="deal_category font-size-12 font-weight-400">נעלי העיר</span>
                                <h4 class="title font-size-14 font-weight-700">סט חולצות ילדים</h4>
                                <div class="rating_price_div">
                                    <p class="font-size-14 font-weight-600">50 ₪ <span
                                            class="font-size-12 font-weight-400">80 ₪</span></p>
                                    <p class="rating_text">4.8 <i class="fa fa-star"></i></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- pagination -->
                    <div class="swiper-button-next btn-swiper">
                        <i class="fa fa-caret-left" aria-hidden="true"></i>
                    </div>
                    <div class="swiper-button-prev btn-swiper">
                        <i class="fa fa-caret-right" aria-hidden="true"></i>
                    </div>
                </div>
            </div>

        </div>
        <!--  -->
        <div class="deals sliderDivDes mt-0 pt-3">
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
                        <div class="deals_box box_shahdow swiper-slide">
                            <img src="{{asset('assets/img/mobile_component/deal_item.png') }}" alt="" class="w-100">
                            <div class="content_div">
                                <span class="deal_category font-size-12 font-weight-400">נעלי העיר</span>
                                <h4 class="title font-size-14 font-weight-700">סט חולצות ילדים</h4>
                                <div class="rating_price_div">
                                    <p class="font-size-14 font-weight-600">50 ₪ <span
                                            class="font-size-12 font-weight-400">80 ₪</span></p>
                                    <p class="rating_text">4.8 <i class="fa fa-star"></i></p>
                                </div>
                            </div>
                        </div>
                        <div class="deals_box box_shahdow swiper-slide">
                            <img src="{{asset('assets/img/mobile_component/deal_item.png') }}" alt="" class="w-100">
                            <div class="content_div">
                                <span class="deal_category font-size-12 font-weight-400">נעלי העיר</span>
                                <h4 class="title font-size-14 font-weight-700">סט חולצות ילדים</h4>
                                <div class="rating_price_div">
                                    <p class="font-size-14 font-weight-600">50 ₪ <span
                                            class="font-size-12 font-weight-400">80 ₪</span></p>
                                    <p class="rating_text">4.8 <i class="fa fa-star"></i></p>
                                </div>
                            </div>
                        </div>
                        <div class="deals_box box_shahdow swiper-slide">
                            <img src="{{asset('assets/img/mobile_component/deal_item.png') }}" alt="" class="w-100">
                            <div class="content_div">
                                <span class="deal_category font-size-12 font-weight-400">נעלי העיר</span>
                                <h4 class="title font-size-14 font-weight-700">סט חולצות ילדים</h4>
                                <div class="rating_price_div">
                                    <p class="font-size-14 font-weight-600">50 ₪ <span
                                            class="font-size-12 font-weight-400">80 ₪</span></p>
                                    <p class="rating_text">4.8 <i class="fa fa-star"></i></p>
                                </div>
                            </div>
                        </div>
                        <div class="deals_box box_shahdow swiper-slide">
                            <img src="{{asset('assets/img/mobile_component/deal_item.png') }}" alt="" class="w-100">
                            <div class="content_div">
                                <span class="deal_category font-size-12 font-weight-400">נעלי העיר</span>
                                <h4 class="title font-size-14 font-weight-700">סט חולצות ילדים</h4>
                                <div class="rating_price_div">
                                    <p class="font-size-14 font-weight-600">50 ₪ <span
                                            class="font-size-12 font-weight-400">80 ₪</span></p>
                                    <p class="rating_text">4.8 <i class="fa fa-star"></i></p>
                                </div>
                            </div>
                        </div>
                        <div class="deals_box box_shahdow swiper-slide">
                            <img src="{{asset('assets/img/mobile_component/deal_item.png') }}" alt="" class="w-100">
                            <div class="content_div">
                                <span class="deal_category font-size-12 font-weight-400">נעלי העיר</span>
                                <h4 class="title font-size-14 font-weight-700">סט חולצות ילדים</h4>
                                <div class="rating_price_div">
                                    <p class="font-size-14 font-weight-600">50 ₪ <span
                                            class="font-size-12 font-weight-400">80 ₪</span></p>
                                    <p class="rating_text">4.8 <i class="fa fa-star"></i></p>
                                </div>
                            </div>
                        </div>
                        <div class="deals_box box_shahdow swiper-slide">
                            <img src="{{asset('assets/img/mobile_component/deal_item.png') }}" alt="" class="w-100">
                            <div class="content_div">
                                <span class="deal_category font-size-12 font-weight-400">נעלי העיר</span>
                                <h4 class="title font-size-14 font-weight-700">סט חולצות ילדים</h4>
                                <div class="rating_price_div">
                                    <p class="font-size-14 font-weight-600">50 ₪ <span
                                            class="font-size-12 font-weight-400">80 ₪</span></p>
                                    <p class="rating_text">4.8 <i class="fa fa-star"></i></p>
                                </div>
                            </div>
                        </div>
                        <div class="deals_box box_shahdow swiper-slide">
                            <img src="{{asset('assets/img/mobile_component/deal_item.png') }}" alt="" class="w-100">
                            <div class="content_div">
                                <span class="deal_category font-size-12 font-weight-400">נעלי העיר</span>
                                <h4 class="title font-size-14 font-weight-700">סט חולצות ילדים</h4>
                                <div class="rating_price_div">
                                    <p class="font-size-14 font-weight-600">50 ₪ <span
                                            class="font-size-12 font-weight-400">80 ₪</span></p>
                                    <p class="rating_text">4.8 <i class="fa fa-star"></i></p>
                                </div>
                            </div>
                        </div>
                        <div class="deals_box box_shahdow swiper-slide">
                            <img src="{{asset('assets/img/mobile_component/deal_item.png') }}" alt="" class="w-100">
                            <div class="content_div">
                                <span class="deal_category font-size-12 font-weight-400">נעלי העיר</span>
                                <h4 class="title font-size-14 font-weight-700">סט חולצות ילדים</h4>
                                <div class="rating_price_div">
                                    <p class="font-size-14 font-weight-600">50 ₪ <span
                                            class="font-size-12 font-weight-400">80 ₪</span></p>
                                    <p class="rating_text">4.8 <i class="fa fa-star"></i></p>
                                </div>
                            </div>
                        </div>
                        <div class="deals_box box_shahdow swiper-slide">
                            <img src="{{asset('assets/img/mobile_component/deal_item.png') }}" alt="" class="w-100">
                            <div class="content_div">
                                <span class="deal_category font-size-12 font-weight-400">נעלי העיר</span>
                                <h4 class="title font-size-14 font-weight-700">סט חולצות ילדים</h4>
                                <div class="rating_price_div">
                                    <p class="font-size-14 font-weight-600">50 ₪ <span
                                            class="font-size-12 font-weight-400">80 ₪</span></p>
                                    <p class="rating_text">4.8 <i class="fa fa-star"></i></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- pagination -->
                    <div class="swiper-button-next btn-swiper">
                        <i class="fa fa-caret-left" aria-hidden="true"></i>
                    </div>
                    <div class="swiper-button-prev btn-swiper">
                        <i class="fa fa-caret-right" aria-hidden="true"></i>
                    </div>
                </div>
            </div>

        </div>
        <!--  -->
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
</script>
@endsection
