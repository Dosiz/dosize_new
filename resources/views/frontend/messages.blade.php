@extends('layout.message')
@section('title')
Message
@endsection
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/mobile-style.css') }}">
<link rel="stylesheet" href="{{asset('assets/css/swiper.css') }}">
@endpush
@section('content')
@php 
if($id=="")
{
    $id=Auth::user()->id;
}
@endphp
@livewire('chat.chat',['receiver'=>$id])
@endsection
@section('script')
<script src="{{asset('assets/js/swiper.min.js') }}"></script>
<script src="{{asset('assets/js/script.js') }}"></script>
@endsection
