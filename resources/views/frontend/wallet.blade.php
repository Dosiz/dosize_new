@extends('layout.wallet')
@section('title')
Message
@endsection
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/mobile-style.css') }}">
<link rel="stylesheet" href="{{asset('assets/css/swiper.css') }}">
@endpush
@section('content')
<main>
    <div class="main-wrapper">
        <div class="main_wallet_div">
            <img src="{{asset('assets/img/mobile_component/wallet_main.png') }}" alt="" class="img-fluid">
            <h3>הארנק שלי</h3>
            <p class="font-size-14">על כל פעילות באתר שמצוינת כאן, תזכו 'במטבעות דוסיז' הניתנות למימוש במגוון הצעות מהעסקים שאתם אוהבים, צאו לדרך!‎
</p>
        </div>
        <div class="container-fluid">
            <div class="points_div">
                <div class="row">
                    <div class="col-lg-5 text-center">
                        <img src="{{asset('assets/img/mobile_component/points_icon.svg') }}" alt="" class="img-fluid">
                        <h3 class="total_points">460 נקודות</h3>
                    </div>
                    <div class="col-lg-7">
                        <ul>
                            <li class="font-size-12">לייק (50) <i class="fa fa-heart-o"></i></li>
                            <li class="font-size-12">תגובות (10) <i class="fa fa-comment-o"></i></li>
                            <li class="font-size-12">שיתופים (35) <i class="fa fa-share-square-o"></i></li>
                            <li class="font-size-12">דירוגים (30) <i class="fa fa-star-o"></i></li>
                            <li class="font-size-12">קבלות (2) <i class="fa fa-file-text-o"></i></li>
                            <li class="font-size-12">הרשמות למועדונים <i class="fa fa-file-text-o"></i></li>
                        </ul>
                    </div>
                </div>
            </div>


        </div>
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
                                <p class="promotion_title font-size-14 font-weight-700 text-right">30% הנחה
                                    ברשת...</p>
                                <div class="price_learn_more">
                                    <a class="font-size-14 font-weight-700" href="">קבל ></a>
                                    <p class="font-size-14 font-weight-600">300 <img
                                            src="{{asset('assets/img/mobile_component/points_icon.svg') }}" alt=""
                                            class="img-fluid"></p>
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
                                <p class="promotion_title font-size-14 font-weight-700 text-right">30% הנחה
                                    ברשת...</p>
                                <div class="price_learn_more">
                                    <a class="font-size-14 font-weight-700" href="">קבל ></a>
                                    <p class="font-size-14 font-weight-600">300 <img
                                            src="{{asset('assets/img/mobile_component/points_icon.svg') }}" alt=""
                                            class="img-fluid"></p>
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
                                <p class="promotion_title font-size-14 font-weight-700 text-right">30% הנחה
                                    ברשת...</p>
                                <div class="price_learn_more">
                                    <a class="font-size-14 font-weight-700" href="">קבל ></a>
                                    <p class="font-size-14 font-weight-600">300 <img
                                            src="{{asset('assets/img/mobile_component/points_icon.svg') }}" alt=""
                                            class="img-fluid"></p>
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
                                <p class="promotion_title font-size-14 font-weight-700 text-right">30% הנחה
                                    ברשת...</p>
                                <div class="price_learn_more">
                                    <a class="font-size-14 font-weight-700" href="">קבל ></a>
                                    <p class="font-size-14 font-weight-600">300 <img
                                            src="{{asset('assets/img/mobile_component/points_icon.svg') }}" alt=""
                                            class="img-fluid"></p>
                                </div>
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
                                     <a href="https://dosiz.co.il/landing-page/"  class="btn btn_grey_out">הצטרפות לעסקים</a>
									<!-- data-toggle="modal" data-target="#enrollmentModal" -->
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
<script src="{{asset('assets/js/swiper.min.js') }}"></script>
<script src="{{asset('assets/js/script.js') }}"></script>
@endsection
