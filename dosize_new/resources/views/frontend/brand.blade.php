@extends('layout.brand')
@section('title')
Brand List
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
<main style="padding-bottom:200px" class="brand_main">
    <div class="main-wrapper">


        <!--  -->
        <div class="categories spacing">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="swiper myCategorySlider">
                            <div class="swiper-wrapper">
                                <div class="category_box swiper-slide">
                                    <div class="img_box box_shahdow">
                                        <img src="../../assets/img/mobile_component/category_5.png" alt=""
                                            class="img-fluid">
                                    </div>
                                    <p class="font-weight-600 font-size-12">ביגוד והנעלה</p>
                                </div>
                                <div class="category_box swiper-slide">
                                    <div class="img_box box_shahdow">
                                        <img src="../../assets/img/mobile_component/category_1.png" alt=""
                                            class="img-fluid">
                                    </div>
                                    <p class="font-weight-600 font-size-12">לבית ולגינה</p>
                                </div>
                                <div class="category_box swiper-slide">
                                    <div class="img_box box_shahdow">
                                        <img src="../../assets/img/mobile_component/category_10.png" alt=""
                                            class="img-fluid">
                                    </div>
                                    <p class="font-weight-600 font-size-12">מזון</p>
                                </div>
                                <div class="category_box swiper-slide">
                                    <div class="img_box box_shahdow">
                                        <img src="../../assets/img/mobile_component/category_9.png" alt=""
                                            class="img-fluid">
                                    </div>
                                    <p class="font-weight-600 font-size-12">פיננסים</p>
                                </div>
                                <div class="category_box swiper-slide">
                                    <div class="img_box box_shahdow">
                                        <img src="../../assets/img/mobile_component/category_8.png" alt=""
                                            class="img-fluid">
                                    </div>
                                    <p class="font-weight-600 font-size-12">לבית ולגינה</p>
                                </div>
                                <div class="category_box swiper-slide">
                                    <div class="img_box box_shahdow">
                                        <img src="../../assets/img/mobile_component/category_1.png" alt=""
                                            class="img-fluid">
                                    </div>
                                    <p class="font-weight-600 font-size-12">לבית ולגינה</p>
                                </div>
                                <div class="category_box swiper-slide">
                                    <div class="img_box box_shahdow">
                                        <img src="../../assets/img/mobile_component/category_2.png" alt=""
                                            class="img-fluid">
                                    </div>
                                    <p class="font-weight-600 font-size-12">בריאות</p>
                                </div>
                                <div class="category_box swiper-slide">
                                    <div class="img_box box_shahdow">
                                        <img src="../../assets/img/mobile_component/category_3.png" alt=""
                                            class="img-fluid">
                                    </div>
                                    <p class="font-weight-600 font-size-12">אופנה וטיפוח</p>
                                </div>
                                <div class="category_box swiper-slide">
                                    <div class="img_box box_shahdow">
                                        <img src="../../assets/img/mobile_component/category_4.png" alt=""
                                            class="img-fluid">
                                    </div>
                                    <p class="font-weight-600 font-size-12">חינוך</p>
                                </div>
                                <div class="category_box swiper-slide">
                                    <div class="img_box box_shahdow">
                                        <img src="../../assets/img/mobile_component/category_5.png" alt=""
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
        <!--  -->
        <div class="noteBox d-xl-flex position-relative d-none">
            <div class="box mr-2 d-flex align-items-center">
                <p class="txt m-0 mr-1">שימו לב, חדש באתר! משלוח חינם בקנייה מעל 300 ש”חשימו לב, חדש בא</p>
                <img src="../../assets/img/note1.png" alt="note1">
            </div>
            <div class="box mr-2 d-flex align-items-center">
                <p class="txt m-0 mr-1">שימו לב, חדש באתר! משלוח חינם בקנייה מעל 300 ש”ח</p>
                <img src="../../assets/img/note2.png" alt="note1">
            </div>
            <div class="box mr-2 d-flex align-items-center">
                <p class="txt m-0 mr-1">שימו לב, חדש באתר! משלוח חינם בקנייה מעל 300 ש”ח</p>
                <img src="../../assets/img/note1.png" alt="note1">
            </div>
            <a href="#" class="btn hotFlashes">מבזקים חמים <img src="../../assets/img/bell_right.png" alt="bell"
                    class="ml-1"></a>
        </div>
        <!--  -->
        <div class="search_clothFoot d-none d-xl-flex justify-content-xl-between justify-content-end">
            <div class="d-none d-xl-block">
                <div class="input_search position-relative">
                    <span class="icon"><i class="fa fa-search" aria-hidden="true"></i></span>
                    <input type="text">
                    <a href="#" class="link">חיפוש ...</a>
                </div>
            </div>
            <div class="cloth_footwear d-flex align-items-center">
                <h3 class="mr-2 font-bold"><b>כל המותגים</b></h3>
            </div>
        </div>
        <!--  -->
        <div class="consumption_block d-xl-none py-5 text-center">
            <img src="../../assets/img/home_icon.png" class="mb-2" alt="consumption">
            <p><b>מוזמנים להירשם למועדוני הצרכנות<br>
                    ולא לפספס שום הטבה! </b></p>
        </div>
        <!--  -->
        <div class="hot_flashes brand_chat d-xl-none">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <span class="annoucment_text font-size-16 font-weight-600">מבזקים חמים <img
                                src="../../assets/img/mobile_component/anaoucment.png" alt=""
                                class="img-fluid"></span>
                        <div class="hot_flashes_list">
                            <ul>
                                <li>
                                    <div class="img_box">
                                        <img src="../../assets/img/mobile_component/flashes_2.png" alt=""
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
                                        <img src="../../assets/img/mobile_component/flashes_1.png" alt=""
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
                                        <img src="../../assets/img/mobile_component/flashes_2.png" alt=""
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
        <!--  -->
        <div class="bazaar_cards mt-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6 col-xl-4 mb-3">
                        <div class="card">
                            <img src="../../assets/img/card_img.png" class="main_img d-xl-none" alt="item">
                            <img src="../../assets/img/B_Card.png" alt="card" class="d-xl-block d-none">
                            <div class="title d-flex justify-content-end align-items-center">
                                <div class="txt">
                                    <h3>בזאר שטראוס</h3>
                                    <a href="#" class="btn signForClub d-none d-xl-block">הירשמו בקליק למועדון
                                        <img src="../../assets/img/star_2.png" alt="star"></a>
                                </div>
                                <img src="../../assets/img/mobile_component/flashes_2.png" class="d-xl-none"
                                    alt="flash">
                                <img src="../../assets/img/card_title_img.png" alt="flash"
                                    class="d-none d-xl-block titleImg">
                            </div>
                            <a href="#" class="btn signForClub d-xl-none">הירשמו בקליק למועדון <img
                                    src="../../assets/img/star_2.png" alt="star"></a>
                        </div>
                    </div>
                    <div class="col-6 col-xl-4 mb-3">
                        <div class="card">
                            <img src="../../assets/img/card_img.png" class="main_img d-xl-none" alt="item">
                            <img src="../../assets/img/B_Card.png" alt="card" class="d-xl-block d-none">
                            <div class="title d-flex justify-content-end align-items-center">
                                <div class="txt">
                                    <h3>בזאר שטראוס</h3>
                                    <a href="#" class="btn signForClub d-none d-xl-block">הירשמו בקליק למועדון
                                        <img src="../../assets/img/star_2.png" alt="star"></a>
                                </div>
                                <img src="../../assets/img/mobile_component/flashes_2.png" class="d-xl-none"
                                    alt="flash">
                                <img src="../../assets/img/card_title_img.png" alt="flash"
                                    class="d-none d-xl-block titleImg">
                            </div>
                            <a href="#" class="btn signForClub d-xl-none">הירשמו בקליק למועדון <img
                                    src="../../assets/img/star_2.png" alt="star"></a>
                        </div>
                    </div>
                    <div class="col-6 col-xl-4 mb-3">
                        <div class="card">
                            <img src="../../assets/img/card_img.png" class="main_img d-xl-none" alt="item">
                            <img src="../../assets/img/B_Card.png" alt="card" class="d-xl-block d-none">
                            <div class="title d-flex justify-content-end align-items-center">
                                <div class="txt">
                                    <h3>בזאר שטראוס</h3>
                                    <a href="#" class="btn signForClub d-none d-xl-block">הירשמו בקליק למועדון
                                        <img src="../../assets/img/star_2.png" alt="star"></a>
                                </div>
                                <img src="../../assets/img/mobile_component/flashes_2.png" class="d-xl-none"
                                    alt="flash">
                                <img src="../../assets/img/card_title_img.png" alt="flash"
                                    class="d-none d-xl-block titleImg">
                            </div>
                            <a href="#" class="btn signForClub d-xl-none">הירשמו בקליק למועדון <img
                                    src="../../assets/img/star_2.png" alt="star"></a>
                        </div>
                    </div>
                    <div class="col-6 col-xl-4 mb-3">
                        <div class="card">
                            <img src="../../assets/img/card_img.png" class="main_img d-xl-none" alt="item">
                            <img src="../../assets/img/B_Card.png" alt="card" class="d-xl-block d-none">
                            <div class="title d-flex justify-content-end align-items-center">
                                <div class="txt">
                                    <h3>בזאר שטראוס</h3>
                                    <a href="#" class="btn signForClub d-none d-xl-block">הירשמו בקליק למועדון
                                        <img src="../../assets/img/star_2.png" alt="star"></a>
                                </div>
                                <img src="../../assets/img/mobile_component/flashes_2.png" class="d-xl-none"
                                    alt="flash">
                                <img src="../../assets/img/card_title_img.png" alt="flash"
                                    class="d-none d-xl-block titleImg">
                            </div>
                            <a href="#" class="btn signForClub d-xl-none">הירשמו בקליק למועדון <img
                                    src="../../assets/img/star_2.png" alt="star"></a>
                        </div>
                    </div>
                    <div class="col-6 col-xl-4 mb-3">
                        <div class="card">
                            <img src="../../assets/img/card_img.png" class="main_img d-xl-none" alt="item">
                            <img src="../../assets/img/B_Card.png" alt="card" class="d-xl-block d-none">
                            <div class="title d-flex justify-content-end align-items-center">
                                <div class="txt">
                                    <h3>בזאר שטראוס</h3>
                                    <a href="#" class="btn signForClub d-none d-xl-block">הירשמו בקליק למועדון
                                        <img src="../../assets/img/star_2.png" alt="star"></a>
                                </div>
                                <img src="../../assets/img/mobile_component/flashes_2.png" class="d-xl-none"
                                    alt="flash">
                                <img src="../../assets/img/card_title_img.png" alt="flash"
                                    class="d-none d-xl-block titleImg">
                            </div>
                            <a href="#" class="btn signForClub d-xl-none">הירשמו בקליק למועדון <img
                                    src="../../assets/img/star_2.png" alt="star"></a>
                        </div>
                    </div>
                    <div class="col-6 col-xl-4 mb-3">
                        <div class="card">
                            <img src="../../assets/img/card_img.png" class="main_img d-xl-none" alt="item">
                            <img src="../../assets/img/B_Card.png" alt="card" class="d-xl-block d-none">
                            <div class="title d-flex justify-content-end align-items-center">
                                <div class="txt">
                                    <h3>בזאר שטראוס</h3>
                                    <a href="#" class="btn signForClub d-none d-xl-block">הירשמו בקליק למועדון
                                        <img src="../../assets/img/star_2.png" alt="star"></a>
                                </div>
                                <img src="../../assets/img/mobile_component/flashes_2.png" class="d-xl-none"
                                    alt="flash">
                                <img src="../../assets/img/card_title_img.png" alt="flash"
                                    class="d-none d-xl-block titleImg">
                            </div>
                            <a href="#" class="btn signForClub d-xl-none">הירשמו בקליק למועדון <img
                                    src="../../assets/img/star_2.png" alt="star"></a>
                        </div>
                    </div>
                    <!-- <div class="col-6 col-xl-3 mb-3">
                        <div class="card">
                            <img src="../../assets/img/card_img.png" class="main_img d-xl-none" alt="item">
                            <img src="../../assets/img/B_Card.png" alt="card" class="d-xl-block d-none">
                            <div class="title d-flex justify-content-end align-items-center">
                                <h3>בזאר שטראוס</h3>
                                <img src="../../assets/img/mobile_component/flashes_2.png" alt="flash">
                            </div>
                            <a href="#" class="btn signForClub">הירשמו בקליק למועדון <img
                                    src="../../assets/img/star_2.png" alt="star"></a>
                        </div>
                    </div>
                    <div class="col-6 col-xl-3 mb-3">
                        <div class="card">
                            <img src="../../assets/img/card_img.png" class="main_img d-xl-none" alt="item">
                            <img src="../../assets/img/B_Card.png" alt="card" class="d-xl-block d-none">
                            <div class="title d-flex justify-content-end align-items-center">
                                <h3>בזאר שטראוס</h3>
                                <img src="../../assets/img/mobile_component/flashes_2.png" alt="flash">
                            </div>
                            <a href="#" class="btn signForClub">הירשמו בקליק למועדון <img
                                    src="../../assets/img/star_2.png" alt="star"></a>
                        </div>
                    </div>
                    <div class="col-6 col-xl-3 mb-3">
                        <div class="card">
                            <img src="../../assets/img/card_img.png" class="main_img d-xl-none" alt="item">
                            <img src="../../assets/img/B_Card.png" alt="card" class="d-xl-block d-none">
                            <div class="title d-flex justify-content-end align-items-center">
                                <h3>בזאר שטראוס</h3>
                                <img src="../../assets/img/mobile_component/flashes_2.png" alt="flash">
                            </div>
                            <a href="#" class="btn signForClub">הירשמו בקליק למועדון <img
                                    src="../../assets/img/star_2.png" alt="star"></a>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <!--  -->

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <img src="../../assets/img/mobile_component/email_icon.png" alt=""
                                        class="img-fluid">
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="../../assets/img/mobile_component/whtsapp_icon.png" alt=""
                                        class="img-fluid">
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="../../assets/img/mobile_component/twitter_icon.png" alt=""
                                        class="img-fluid">
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="../../assets/img/mobile_component/facebook_icon.png" alt=""
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
