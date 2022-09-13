@extends('layout.archive_message')
@section('title')
Archive - Message
@endsection
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/mobile-style.css') }}">
<link rel="stylesheet" href="{{asset('assets/css/swiper.css') }}">
@endpush
@section('content')
<main>
    <div class="main-wrapper">
        <div class="main_wallet_div announcment_updates">
            <img src="{{asset('assets/img/mobile_component/wallet_main.png') }}" alt="" class="img-fluid">
            <h3>הודעות ועידכונים</h3>
            <p class="font-size-14">תקשורת זה מפתח להצלחה, מוזמנים ליצור קשר עם העסקים האהובים עליכם, לשאול ולהתייעץ על כל נושא!‎</p>
        </div>
        <div class="announcement_list">
            <div class="container-fluid">
                <div class="archive_div">
                    <div class="row align-center">
                        <div class="col-6">
                            <span class="total_archive font-size-12">10</span>
                        </div>
                        <div class="col-6 text-right">
                            <h3 class="font-size-16">בארכיון <img src="{{asset('assets/img/mobile_component/archive_icon.png') }}" alt="" class="img-fluid"></h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="archive_list">
                            <ul>
                                <li class="pin_item">
                                    <div class="announcement_detail">
                                        <img src="{{asset('assets/img/mobile_component/flashes_2.png') }}" alt="" class="img-fluid">
                                        <div class="annoucment_content">
                                            <h5 class="font-size-16">בזאר שטראוס <i class="fa fa-check-circle" aria-hidden="true"></i></h5>
                                            <p class="font-size-14">לורם איפסום דולור סיט אמט, </p>
                                        </div>
                                    </div>
                                    <div class="timing_coins_div">
                                        <p class="font-size-12">11:30</p>
                                        <div class="pin_coins_div">
                                            <span class="font-size-12">3</span>
                                            <span class="pin_disable"><img src="{{asset('assets/img//mobile_component/PushpinFilled.png') }}" alt="" class="img-fluid"></span>
                                        </div>
                                    </div>
                                </li>
                                <li class="alram_item">
                                    <div class="announcement_detail">
                                        <img src="{{asset('assets/img/mobile_component/flashes_2.png') }}" alt="" class="img-fluid">
                                        <div class="annoucment_content">
                                            <h5 class="font-size-16">בזאר שטראוס <i class="fa fa-check-circle" aria-hidden="true"></i></h5>
                                            <p class="font-size-14">לורם איפסום דולור סיט אמט, </p>
                                        </div>
                                    </div>
                                    <div class="timing_coins_div">
                                        <p class="font-size-12">11:30</p>
                                        <div class="alarm_coins_div">
                                            <span class="font-size-12">3</span>
                                            <span class="alarm_disable"><img src="{{asset('assets/img//mobile_component/alarm_disable.png') }}" alt="" class="img-fluid"></span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <ul>
                            <li>
                                <div class="announcement_detail">
                                    <img src="{{asset('assets/img/mobile_component/flashes_2.png') }}" alt="" class="img-fluid">
                                    <div class="annoucment_content">
                                        <h5 class="font-size-16">בזאר שטראוס <i class="fa fa-check-circle" aria-hidden="true"></i></h5>
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
                                    <img src="{{asset('assets/img/mobile_component/flashes_2.png') }}" alt="" class="img-fluid">
                                    <div class="annoucment_content">
                                        <h5 class="font-size-16">בזאר שטראוס <i class="fa fa-check-circle" aria-hidden="true"></i></h5>
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
                                    <img src="{{asset('assets/img/mobile_component/flashes_2.png') }}" alt="" class="img-fluid">
                                    <div class="annoucment_content">
                                        <h5 class="font-size-16">בזאר שטראוס <i class="fa fa-check-circle" aria-hidden="true"></i></h5>
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
                                    <img src="{{asset('assets/img/mobile_component/flashes_2.png') }}" alt="" class="img-fluid">
                                    <div class="annoucment_content">
                                        <h5 class="font-size-16">בזאר שטראוס <i class="fa fa-check-circle" aria-hidden="true"></i></h5>
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
                                    <img src="{{asset('assets/img/mobile_component/flashes_2.png') }}" alt="" class="img-fluid">
                                    <div class="annoucment_content">
                                        <h5 class="font-size-16">בזאר שטראוס <i class="fa fa-check-circle" aria-hidden="true"></i></h5>
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
                                    <img src="{{asset('assets/img/mobile_component/flashes_2.png') }}" alt="" class="img-fluid">
                                    <div class="annoucment_content">
                                        <h5 class="font-size-16">בזאר שטראוס <i class="fa fa-check-circle" aria-hidden="true"></i></h5>
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
</main>
@endsection
@section('script')
<script src="{{asset('assets/js/swiper.min.js') }}"></script>
<script src="{{asset('assets/js/script.js') }}"></script>
@endsection
