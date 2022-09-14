<?php
use App\Helpers\Helpers; 
$city_id = Helpers::city_id();
?>
@extends('layout.master')
@section('title')
Brand List
@endsection
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/mobile-style.css') }}">
    <link rel="stylesheet" href="{{asset('assets/css/desktop-css.css') }}">
    <link rel="stylesheet" href="{{asset('assets/css/swiper.css') }}">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
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
                              
                                <div onclick="open_category('{{route('category_by_city',['category_id'=>$category->id,'city_id'=>$city_id])}}')" class="category_box swiper-slide">
                                    {{-- <a href="{{route('category_by_city',['category_id'=>$category->id,'city_id'=>$city_id])}}" style="color:#212529"> --}}
                                        <div class="img_box box_shahdow">
                                            <img src="{{asset('category/'.$category->image)}}" alt="" class="img-fluid" style="width:28px;">
                                        </div>
                                        <p class="font-weight-600 font-size-12"> {{$category->name}}</p>
                                    {{-- </a> --}}
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
        {{-- @if(count($brand_messages) > 0)
        <div class="noteBox d-xl-flex position-relative d-none">
            @if($brand_messages)
            @foreach($brand_messages as $brand_message)
            @php  
                $current_date = \Carbon\Carbon::now();
                $sale_time = \Carbon\Carbon::parse($brand_message->end_date);
                $diff_in_days = $current_date->diffInDays( $sale_time,false) + 1;
            @endphp
            @if($diff_in_days >= 0)
            <div class="box mr-2 d-flex align-items-center">
                <p class="txt m-0 mr-1"> {{ $brand_message->message }}</p>
                <img src="{{asset('brand_image/'.$brand_message->brand_image)}}" alt="" class="img-fluid" style="width: 34px; height: 35px;"></a>
            </div>
            @endif
            @endforeach
            @endif
            <a href="#" class="btn hotFlashes">מבזקים חמים <img src="{{asset('assets/img/bell_right.png') }}" alt="bell" class="ml-1"></a>
        </div>
        @endif --}}
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
        @if(count($brand_messages) > 0)
        <div class="hot_flashes_div spacing">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <ul>
                            @if($brand_messages)
                            @foreach($brand_messages as $brand_message)
                            @php  
                                $current_date = \Carbon\Carbon::now();
                                $sale_time = \Carbon\Carbon::parse($brand_message->end_date);
                                $diff_in_days = $current_date->diffInDays( $sale_time,false) + 1;
                            @endphp
                            
                            <li class="active">
                                <a class="font-size-12" href="">מבזקים חמים <img
                                        src="{{asset('assets/img/mobile_component/anaoucment.png') }}"
                                        class="img-fluid"></a>
                            </li>
                            @if($diff_in_days >= 0)
                            <li>
                                <a class="font-size-12" href="">{{ $brand_message->message }}<img src="{{asset('brand_image/'.$brand_message->brand_image)}}" alt=""
                                        class="img-fluid" style="width: 20px; height: 20px;"></a>
                            </li>
                            @endif
                            @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!--  -->
        <div class="bazaar_cards mt-4" style="margin-bottom: 70px !important;">
            <div class="container-fluid">
                <div class="row">
                    @if(count($city_brands) > 0)
                    @foreach($city_brands as $city_brand)
                    <div class="col-6 col-xl-4 mb-3">
                        <div class="card">
                            <img src="{{asset('brand_image/'.$city_brand->brand_image)}}" class="main_img brand_main_image d-xl-none" style="width: 143px; height: 330px" alt="item">
                            <a href="https://{{$city_brand->short_name ?? ''}}.arikliger.com/brand">
                            <img src="{{asset('brand_image/'.$city_brand->brand_image)}}"  style="width: 330px !important; height: 340px !important" alt="carbazaar_cards mt-4d" class="d-xl-block d-none">
                            </a>
                            <div class="title d-flex justify-content-end align-items-center">
                                <div class="txt">
                                    <a href="https://{{$city_brand->short_name ?? ''}}.arikliger.com/brand" style="color: #212529 !important">
                                    <h3>{{$city_brand->brand_name}}</h3>
                                    </a>
                                    
                                </div>
                                <img src="{{asset('brand_logo/'.$city_brand->brand_logo)}}" class="d-xl-none" style="width:40px; height:40px" alt="flash">
                                <a class="font-size-14 font-weight-700" href="https://{{$city_brand->short_name ?? ''}}.arikliger.com/brand" >
                                    <img src="{{asset('brand_logo/'.$city_brand->brand_logo)}}" style="width: 40px; height: 40px;" alt="flash"
                                    class="d-none d-xl-block titleImg">
                                </a>
                                
                            </div>
                            @guest
                                        <a href="" class="btn signForClub d-xl-block enrollemnt_button" data-toggle="modal" data-target="#enrollmentModal2">הירשמו בקליק למועדון
                                            <img src="{{asset('assets/img/star_2.png') }}" alt="star">
                                        </a>
                                    @else
                                        @if($chk_subscriber == null)
                                    
                                        <form action="{{ route('store-subscribers') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="email" id="email" value="{{Auth::user()->email }}" />
                                        <input type="hidden" name="brand_page" id="brand_page" value="brand_page" />
                                        <input type="hidden" name="brand_profile_id" id="brand_profile_id" value="{{$city_brand->id }}" />
                                        <button type="submit" class="btn signForClub d-none d-xl-block">הירשמו בקליק למועדון
                                            <img src="{{asset('assets/img/star_2.png') }}" alt="star">
                                        </button>
                                        </form>
                                        @else
                                        @php
                                            $chk_sub = \App\Models\Subscriber::where('brand_profile_id',$city_brand->id)->first();
                                        @endphp
                                        @guest
                                            <button class="enrollemnt_button" data-toggle="modal" data-target="#enrollmentModal2">הירשמו בקליק למועדון
                                                <img src="{{asset('assets/img/star_2.png') }}" alt="star">
                                            </button>
                                        @endguest
                                        @if($chk_sub)
                                        <button class="btn signForClub"> הירשמו בקליק למועדון
                                            <img src="{{asset('assets/img/verfied.png') }}" alt="star">
                                        </button>
                                        @else
                                            <form action="{{ route('store-subscribers') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="email" id="email" value="{{Auth::user()->email }}" />
                                                <input type="hidden" name="brand_page" id="brand_page" value="brand_page" />
                                                <input type="hidden" name="brand_profile_id" id="brand_profile_id" value="{{$city_brand->id }}" />
                                                <button type="submit" class="btn signForClub">הירשמו בקליק למועדון
                                                    <img src="{{asset('assets/img/star_2.png') }}" alt="star">
                                                </button>
                                            </form>
                                        @endif
                                        @endif
                                    @endguest
                            {{-- @guest
                            <a href="" class="btn signForClub d-xl-block enrollemnt_button" data-toggle="modal" data-target="#enrollmentModal2">הירשמו בקליק למועדון
                                <img src="{{asset('assets/img/star_2.png') }}" alt="star"></a>
                            @else
                            @if($chk_subscriber == null)
                            <form action="{{ route('store-subscriber') }}" method="POST">
                            @csrf
                            <input type="hidden" name="email" id="email" value="{{Auth::user()->email }}" />
                            <input type="hidden" name="brand_page" id="brand_page" value="brand_page" />
                            <input type="hidden" name="brand_profile_id" id="brand_profile_id" value="{{$city_brand->id }}" />
                            <button type="submit" class="btn signForClub d-xl-block">הירשמו בקליק למועדון
                                <img src="{{asset('assets/img/star_2.png') }}" alt="star">
                            </button>
                            </form>
                            @else
                            <button class="btn signForClub d-xl-block"> הירשמו בקליק למועדון
                                <img src="{{asset('assets/img/verfied.png') }}" alt="star">
                            </button>
                            @endif
                            @endguest --}}
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
                                    הצטרפו למהפיכת הצרכנות המקומית של דוסיז צרכנות >>‎

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
                            <img src="{{asset('assets/img/mobile_component/footer_img.svg') }}" class="footer_Img" alt="footer">
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

    // $('#subscriber').click(function(e){
    //     e.preventDefault();
    //     // const postFormData = {
    //     //     brand_profile_id : $('#brand_profile_id').val(),
    //     //     email     : $('#email').val(),
    //     //     // _token: "{{ csrf_token() }}"
    //     // };
    //     let brand_profile_id = $('#brand_profile_id').val();
    //     let email = $('#email').val();
    //     let _token   = $('meta[name="csrf-token"]').attr('content');
    //     // console.log(postFormData);
    //     $.ajax({
    //         type: "POST",
    //         url: "{{ route('store-subscriber') }}",
    //         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    //         data: {
    //             email:email,
    //             brand_profile_id:brand_profile_id,
    //             _token: _token
    //         } ,
    //         datatype: "json",
    //         success: function (data) {
    //              console.table(data.success);
    //             toastr.success(data.success);
    //             // console.table(data.comment);
                
                 
    //         },
    //         error: function (data) {
    //             // toastr.warning(data);
    //             toastr.error("Already Subscribed");
                
    //         }
    //     });
    // });

</script>
@endsection
