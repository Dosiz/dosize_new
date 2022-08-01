@extends('layout.master')
@section('title')
Category By city
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
        @if(count($discount_products) > 0)
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
                        @if(count($discount_products) > 0)
                            @foreach($discount_products as $product)
                            {{-- @php  
                                $current_date = \Carbon\Carbon::now();
                                echo $current_date;echo"<br>";
                                $sale_time = \Carbon\Carbon::parse($product->sale_time);
                                echo $sale_time;echo"<br>";
                                $diff_in_days = $current_date->diffInDays( $sale_time,false) + 0;
                                echo $diff_in_days;
                            @endphp --}}
                            
                                <div class="promotion_box box_shahdow swiper-slide">
                                    <div class="promotion_img_box">
                                        <a class="font-size-14 font-weight-700" href="{{route('product',$product->id)}}">
                                        <img src="{{asset('product/'.$product->image)}}" alt=""
                                            class="img-fluid" style="width: 209px; height:105px;">
                                        </a>
                                        <span class="font-size-14 font-weight-700">{{ number_format((( $product->discount_price / $product->price ) * 100),1) }} %</span>
                                    </div>
                                    <div class="promotion_content">
                                        <div class="time_category_text">
                                            <div class="time_div">
                                                
                                                <p class="example" discount-time="{{ \Carbon\Carbon::parse($product->sale_time)->format('m/d/Y H:i:s')}}">
                                                    <span class="font-size-12 font-weight-600 days" style="font-size:12px;" title="Days">00</span> : <span class="font-size-12 font-weight-600 hours" style="font-size:12px;" title="Hours">00</span> : <span class="font-size-12 font-weight-600 minutes" style="font-size:12px;" title="Minutes">00</span> : <span class="font-size-12 font-weight-600 seconds" style="font-size:12px;" title="Seconds">00</span>
                                                </p>
                                            </div>
                                            <a class="font-size-14 font-weight-700" href="" >
                                                <p class="promotion_category font-size-12 font-weight-400"> {{$product->brand_name}} </p>
                                            </a>
                                        </div>
                                        <a class="font-size-14 font-weight-700" href="{{route('product',$product->id)}}">
                                            <p class="promotion_title font-size-14 font-weight-700 text-right"  style="color: #212529 !important;">
                                                {{$product->name}}
                                            </p>
                                        </a>
                                        <div class="price_learn_more">
                                            <a class="font-size-14 font-weight-700" href="{{route('product',$product->id)}}">למידע נוסף ></a>
                                            
                                            <p class="font-size-14 font-weight-600">{{$product->discount_price}} ₪ <span
                                                    class="font-size-12 font-weight-400">{{$product->price ?? '00'}} ₪</span></p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if(count($blogs) > 0 && $blogs['0']->id != null)
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
                            @if(count($blogs) > 0)
                            @foreach($blogs as $blog)
                            <div class="affordable_consumption_box box_shahdow">
                                <img src="{{asset('blog/'.$blog->image)}}" alt="" class="img-fluid">
                                <div class="content_div">
                                    <span class="category font-size-12 font-weight-400"> {{$blog->brand_name}} </span>
                                    <h4 class="font-size-12 font-weight-700">
                                        {{$blog->title}}
                                    </h4>
                                    <p class="discription font-size-10 font-weight-400">
                                        {!! $blog->description !!}
                                    </p>
                                    <span class="font-size-12">{{$blog->totallikes}} <i class="fa fa-heart"
                                            aria-hidden="true"></i></span>
                                </div>
                            </div>
                            @endforeach
                            @endif
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
        @endif


        <div class="line spacing"></div>
        <div class="order_div spacing">
            @if(count($products) > 0)
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
                                        <a class="font-size-14 font-weight-700" href="{{route('product',$product->id)}}">
                                            <img src="{{asset('product/'.$product->image)}}" alt="" class="img-fluid" style="width: 208px; height:163px">
                                        </a>
                                        <div class="content_div">
                                            <a href="">
                                            <span class="deal_category font-size-12 font-weight-400"> {{$product->brand_name}}</span>
                                            </a>
                                            <a href="{{route('product',$product->id)}}" style="color:#212529 !important;">
                                            <h4 class="title font-size-14 font-weight-700">  
                                                {{$product->name}}
                                            </h4>
                                            <div class="rating_price_div">
                                                <p class="font-size-14 font-weight-600">50 ₪ <span
                                                        class="font-size-12 font-weight-400">80 ₪</span></p>
                                                <p class="rating_text">4.8 <i class="fa fa-star"></i></p>
                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endif
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
            @if(count($brands_recomanded_products) > 0) 
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
                            @if(count($brands_recomanded_products) > 0)
                            @foreach($brands_recomanded_products as $recomanded_products)
                            @foreach($recomanded_products->recommended_product as $product)
                            <div class="deals_box box_shahdow swiper-slide">
                                <a class="font-size-14 font-weight-700" href="{{route('product',$product->id)}}">
                                    <img src="{{asset('product/'.$product->image)}}" alt="" class="img-fluid" style="width: 208px; height: 165px;">
                                </a>
                                <div class="content_div">
                                    <a class="font-size-14 font-weight-700" href="">
                                    <span class="deal_category font-size-12 font-weight-400"> {{$recomanded_products->brand_name}} </span>
                                    </a>
                                    <a class="font-size-14 font-weight-700" href="{{route('product',$product->id)}}" style="color: #212529 !important;">
                                    <h4 class="title font-size-14 font-weight-700">
                                        {{$product->name}}
                                    </h4>
                                    <div class="rating_price_div">
                                        <p class="font-size-14 font-weight-600">{{$product->price}} ₪ <span
                                                class="font-size-12 font-weight-400">80 ₪</span></p>
                                        <p class="rating_text">4.8 <i class="fa fa-star"></i></p>
                                    </div>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endif
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
<script src="{{ asset('assets/js/swiper.min.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>
<script src="{{ asset('assets/js/Minimal-jQuery-Countdown/jquery.countdown.min.js') }}"></script>
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
                window.location.href="/";
                 
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
                window.location.href="/dashboard/dashboard";
                 
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

    // console.log($('.example'))
    [...document.querySelectorAll('.example')].forEach(elem => {
        $(elem).countdown({
        date: elem.getAttribute('discount-time')
        }, function () {
            $(elem).parent().parent().parent().parent().addClass('d-none');
    });
    })


</script>
@endsection