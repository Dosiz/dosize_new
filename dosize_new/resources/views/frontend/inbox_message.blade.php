@extends('layout.inbox_message')
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
        <div class="message_list">
            <ul>
                <li>
                    <div class="sending_message common_message">
                        <p class="text_message font-size-14">לורם איפסום דולור סיט אמט, לורם איפסום דולור סיט אמט, לורם איפסום דולור סיט, </p>
                        <p class="time font-size-12">11:30</p>
                    </div>
                </li>
                <li>
                    <div class="sending_message common_message">
                        <p class="text_message font-size-14">לורם איפסום דולור סיט אמט, לורם איפסום דולור סיט אמט, לורם איפסום דולור סיט, </p>
                        <p class="time font-size-12">11:30</p>
                    </div>
                </li>
                <li>
                    <div class="sending_message common_message">
                        <p class="text_message font-size-14">לורם איפסום דולור סיט אמט, לורם איפסום דולור סיט אמט, לורם איפסום דולור סיט, </p>
                        <p class="time font-size-12">11:30</p>
                    </div>
                </li>
                <li>
                    <div class="sending_message common_message">
                        <p class="text_message font-size-14">לורם איפסום דולור סיט אמט, לורם איפסום דולור סיט אמט, לורם איפסום דולור סיט, </p>
                        <p class="time font-size-12">11:30</p>
                    </div>
                </li>
                <li>
                    <div class="reciving_message common_message">
                        <p class="text_message font-size-14">לורם איפסום דולור סיט אמט, לורם איפסום דולור סיט אמט, לורם איפסום דולור סיט, </p>
                        <p class="time font-size-12">11:30</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</main>
@endsection
@section('script')
<script src="{{asset('assets/js/swiper.min.js') }}"></script>
<script src="{{asset('assets/js/script.js') }}"></script>
@endsection
