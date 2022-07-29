@extends('layout.master')
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
<main class="brand_main">
    <div class="main-wrapper">


        <!--  -->
        <div class="categories spacing">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="swiper myCategorySlider">
                            <div class="swiper-wrapper">
                                @if(count($categories) > 0)
                                
                                @foreach($categories as $key=>$category)
                              
                                <div class="category_box swiper-slide">
                                    <a href="{{route('category_by_city',['category_id'=>$category->id,'city_id'=>5])}}" style="color:#212529">
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
        <!--  -->
        <div class="noteBox d-xl-flex position-relative d-none">
            <div class="box mr-2 d-flex align-items-center">
                <p class="txt m-0 mr-1">שימו לב, חדש באתר! משלוח חינם בקנייה מעל 300 ש”חשימו לב, חדש בא</p>
                <img src="{{asset('assets/img/note1.png') }}" alt="note1">
            </div>
            <div class="box mr-2 d-flex align-items-center">
                <p class="txt m-0 mr-1">שימו לב, חדש באתר! משלוח חינם בקנייה מעל 300 ש”ח</p>
                <img src="{{asset('assets/img/note2.png') }}" alt="note1">
            </div>
            <div class="box mr-2 d-flex align-items-center">
                <p class="txt m-0 mr-1">שימו לב, חדש באתר! משלוח חינם בקנייה מעל 300 ש”ח</p>
                <img src="{{asset('assets/img/note1.png') }}" alt="note1">
            </div>
            <a href="#" class="btn hotFlashes">מבזקים חמים <img src="{{asset('assets/img/bell_right.png') }}" alt="bell"
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
            <img src="{{asset('assets/img/home_icon.png') }}" class="mb-2" alt="consumption">
            <p><b>מוזמנים להירשם למועדוני הצרכנות<br>
                    ולא לפספס שום הטבה! </b></p>
        </div>
        <!--  -->
        <div class="hot_flashes brand_chat d-xl-none">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <span class="annoucment_text font-size-16 font-weight-600">מבזקים חמים <img
                                src="{{asset('assets/img/mobile_component/anaoucment.png') }}" alt=""
                                class="img-fluid"></span>
                        <div class="hot_flashes_list">
                            <ul>
                                <li>
                                    <div class="img_box">
                                        <img src="{{asset('assets/img/mobile_component/flashes_2.png') }}" alt=""
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
                                        <img src="{{asset('assets/img/mobile_component/flashes_1.png') }}" alt=""
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
                                        <img src="{{asset('assets/img/mobile_component/flashes_2.png') }}" alt=""
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
                    @if(count($city_brands) > 0)
                    @foreach($city_brands as $city_brand)
                    <div class="col-6 col-xl-4 mb-3">
                        <div class="card">
                            <img src="{{asset('assets/img/card_img.png') }}" class="main_img d-xl-none" alt="item">
                            <a href="{{route('brand-profile',$city_brand->id)}}">
                            <img src="{{asset('brand_image/'.$city_brand->brand_image)}}"  style="width: 330px !important" alt="carbazaar_cards mt-4d" class="d-xl-block d-none">
                            </a>
                            <div class="title d-flex justify-content-end align-items-center">
                                <div class="txt">
                                    <a href="{{route('brand-profile',$city_brand->id)}}" style="color: #212529 !important">
                                    <h3>{{$city_brand->brand_name}}</h3>
                                    </a>
                                    <a href="#" class="btn signForClub d-none d-xl-block">הירשמו בקליק למועדון
                                        <img src="{{asset('assets/img/star_2.png') }}" alt="star"></a>
                                </div>
                                <img src="{{asset('assets/img/mobile_component/flashes_2.png') }}" class="d-xl-none"
                                    alt="flash">
                                <a class="font-size-14 font-weight-700" href="{{route('brand-profile',$city_brand->id)}}" >
                                    <img src="{{asset('brand_logo/'.$city_brand->brand_logo)}}" style="width: 80px; height: 80px" alt="flash"
                                    class="d-none d-xl-block titleImg">
                                </a>
                            </div>
                            <a href="#" class="btn signForClub d-xl-none">הירשמו בקליק למועדון <img
                                    src="{{asset('assets/img/star_2.png') }}" alt="star"></a>
                        </div>
                    </div>
                    @endforeach
                    
                    @endif
                    
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
                                    <a href="" data-toggle="modal" data-target="#enrollmentModal" class="btn btn_grey_out">הצטרפות לעסקים</a>
                                    <a  data-toggle="modal" data-target="#enrollmentModal2" href="#" class="btn btn_orange ml-2">הרשמה לדוסיז</a>
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
