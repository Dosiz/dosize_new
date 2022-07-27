@extends('layout.message')
@section('title')
Message
@endsection
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/mobile-style.css') }}">
<link rel="stylesheet" href="{{asset('assets/css/swiper.css') }}">
@endpush
@section('content')
<main>
    <div class="main-wrapper message_main_wrapper">
        <div class="messenger_announcment_main">
            <div class="messenger_main">
                <div class="inbox_header">
                    <div class="container-fluid">
                        <div class="row align-center">
                            <div class="col-4">
                                <span class="drop_down_icon"><i class="fa fa-ellipsis-v"
                                        aria-hidden="true"></i></span>
                                <div class="drop_down_menu box_shahdow">
                                    <ul>
                                        <li>
                                            <a href="" class="font-size-16">העברת הצ’אט לארכיון</a>
                                        </li>
                                        <li>
                                            <a href="" class="font-size-16">השתקת התראות</a>
                                        </li>
                                        <li>
                                            <a href="" class="font-size-16">מחיקת צ’אט</a>
                                        </li>
                                        <li>
                                            <a href="" class="font-size-16">הצמדת צ’אט</a>
                                        </li>
                                        <li>
                                            <a href="" class="font-size-16">חסימה</a>
                                        </li>
                                        <li>
                                            <a href="" class="font-size-16">עמוד העסק</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-8 text-right">
                                <div class="inbox_header_content">
                                    <a href=""><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                    <img src="{{ asset('assets/img/mobile_component/flashes_2.png') }}" alt=""
                                        class="img-fluid">
                                    <p class="font-size-16">
                                        בזאר שטראוס <i class="fa fa-check-circle" aria-hidden="true"></i>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="message_list">
                    <ul>
                        <li>
                            <div class="sending_message common_message">
                                <p class="text_message font-size-14">לורם איפסום דולור סיט אמט, לורם איפסום
                                    דולור סיט אמט, לורם איפסום דולור סיט, </p>
                                <p class="time font-size-12">11:30</p>
                            </div>
                        </li>
                        <li>
                            <div class="sending_message common_message">
                                <p class="text_message font-size-14">לורם איפסום דולור סיט אמט, לורם איפסום
                                    דולור סיט אמט, לורם איפסום דולור סיט, </p>
                                <p class="time font-size-12">11:30</p>
                            </div>
                        </li>
                        <li>
                            <div class="sending_message common_message">
                                <p class="text_message font-size-14">לורם איפסום דולור סיט אמט, לורם איפסום
                                    דולור סיט אמט, לורם איפסום דולור סיט, </p>
                                <p class="time font-size-12">11:30</p>
                            </div>
                        </li>
                        <li>
                            <div class="sending_message common_message">
                                <p class="text_message font-size-14">לורם איפסום דולור סיט אמט, לורם איפסום
                                    דולור סיט אמט, לורם איפסום דולור סיט, </p>
                                <p class="time font-size-12">11:30</p>
                            </div>
                        </li>
                        <li>
                            <div class="reciving_message common_message">
                                <p class="text_message font-size-14">לורם איפסום דולור סיט אמט, לורם איפסום
                                    דולור סיט אמט, לורם איפסום דולור סיט, </p>
                                <p class="time font-size-12">11:30</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="inbox_footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="message_form">
                                    <form action="">
                                        <div class="input_div_button">
                                            <button>
                                                <img src="{{ asset('assets/img/mobile_component/left_arrow.png') }}"
                                                    alt="" class="img-fluid">
                                            </button>
                                            <input type="text" name="type_message" id="type_message"
                                                placeholder="הקלדת הודעה ..." class="font-size-14">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="announcment_main">
                <div class="main_wallet_div announcment_updates">
                    <img src="{{ asset('assets/img/mobile_component/notifiction_main_img.png') }}" alt="" class="img-fluid">
                    <h3>הודעות ועידכונים</h3>
                    <p class="font-size-14">לורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית לורם שבצק גק
                        ליץ,
                        ושבעגט ליבם סולגק.</p>
                </div>
                <div class="announcement_list">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <ul>
                                    <li>
                                        <div class="announcement_detail">
                                            <img src="{{ asset('assets/img/mobile_component/flashes_2.png') }}" alt=""
                                                class="img-fluid">
                                            <div class="annoucment_content">
                                                <h5 class="font-size-16">בזאר שטראוס <i
                                                        class="fa fa-check-circle" aria-hidden="true"></i></h5>
                                                <p class="font-size-14">לורם איפסום דולור סיט אמט, </p>
                                            </div>
                                        </div>
                                        <div class="timing_coins_div">
                                            <p class="font-size-12">11:30</p>
                                            <span class="font-size-12">3</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="announcement_detail">
                                            <img src="{{ asset('assets/img/mobile_component/flashes_2.png') }}" alt=""
                                                class="img-fluid">
                                            <div class="annoucment_content">
                                                <h5 class="font-size-16">בזאר שטראוס <i
                                                        class="fa fa-check-circle" aria-hidden="true"></i></h5>
                                                <p class="font-size-14">לורם איפסום דולור סיט אמט, </p>
                                            </div>
                                        </div>
                                        <div class="timing_coins_div">
                                            <p class="font-size-12">11:30</p>
                                            <span class="font-size-12">3</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="announcement_detail">
                                            <img src="{{ asset('assets/img/mobile_component/flashes_2.png') }}" alt=""
                                                class="img-fluid">
                                            <div class="annoucment_content">
                                                <h5 class="font-size-16">בזאר שטראוס <i
                                                        class="fa fa-check-circle" aria-hidden="true"></i></h5>
                                                <p class="font-size-14">לורם איפסום דולור סיט אמט, </p>
                                            </div>
                                        </div>
                                        <div class="timing_coins_div">
                                            <p class="font-size-12">11:30</p>
                                            <span class="font-size-12">3</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="announcement_detail">
                                            <img src="{{ asset('assets/img/mobile_component/flashes_2.png') }}" alt=""
                                                class="img-fluid">
                                            <div class="annoucment_content">
                                                <h5 class="font-size-16">בזאר שטראוס <i
                                                        class="fa fa-check-circle" aria-hidden="true"></i></h5>
                                                <p class="font-size-14">לורם איפסום דולור סיט אמט, </p>
                                            </div>
                                        </div>
                                        <div class="timing_coins_div">
                                            <p class="font-size-12">11:30</p>
                                            <span class="font-size-12">3</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="announcement_detail">
                                            <img src="{{ asset('assets/img/mobile_component/flashes_2.png') }}" alt=""
                                                class="img-fluid">
                                            <div class="annoucment_content">
                                                <h5 class="font-size-16">בזאר שטראוס <i
                                                        class="fa fa-check-circle" aria-hidden="true"></i></h5>
                                                <p class="font-size-14">לורם איפסום דולור סיט אמט, </p>
                                            </div>
                                        </div>
                                        <div class="timing_coins_div">
                                            <p class="font-size-12">11:30</p>
                                            <span class="font-size-12">3</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="announcement_detail">
                                            <img src="{{ asset('assets/img/mobile_component/flashes_2.png') }}" alt=""
                                                class="img-fluid">
                                            <div class="annoucment_content">
                                                <h5 class="font-size-16">בזאר שטראוס <i
                                                        class="fa fa-check-circle" aria-hidden="true"></i></h5>
                                                <p class="font-size-14">לורם איפסום דולור סיט אמט, </p>
                                            </div>
                                        </div>
                                        <div class="timing_coins_div">
                                            <p class="font-size-12">11:30</p>
                                            <span class="font-size-12">3</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
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
@endsection
