<?php
use App\Helpers\Helpers; 
$city_id = Helpers::city_id();
?>
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

<style>
    @media (min-width: 1200px){
.multiple_afforable_consumption .affordable_consumption_box {
    width: 31% !important;
}
    }

    .affordable_consumption_box > a{
	display: flex;
    align-items: center;
    background: #dfdada;
}
.affordable_consumption_box > a > img{ 
   width: 150px;
}
@media (min-width: 1050px) and (max-width: 1250px){
    .affordable_consumption_box{
        min-width: 350px;
    }
}
@media ( min-width: 800px ){
.article_content > p{ height: 50px; overflow: hidden; }
}
@media (max-width: 990px){
    .affordable_consumption_box:nth-child(3),
     .affordable_consumption_box:nth-child(4){

        display: none !important;
    }
    .article_list {
            background: #fff;
            box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important;
            padding: 12px;
            margin-bottom: 10px;
            border-radius: 9px;
    }

    .mobileFlex{
        display: flex;
        flex-direction: row-reverse;
        align-items:center;
    }

    .mobileFlex > img{
        border-radius: 5px;
        margin-left: 8px;
    }

    .affordable_consumption .affordable_consumption_list .affordable_consumption_box img {
    border-radius: 5px !important;
}

.products_div .affordable_consumption .affordable_consumption_list .affordable_consumption_box{ display: block !important; } 
.products_div .affordable_consumption .affordable_consumption_list .affordable_consumption_box img { max-width: 100% !important;
    min-width: 100%;
    margin: 0; }

.products_div .affordable_consumption .affordable_consumption_list .affordable_consumption_box img{
    max-height: 120px;
    min-height: 120px;
}
}


</style>

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
                                        {{-- <a class="font-size-14 font-weight-700" onclick="recommended_product('{{route('product',$product->id ?? '')}}')"> --}}
                                        <img onclick="recommended_product('{{route('product',$product->id ?? '')}}')" src="{{asset('product/'.$product->image)}}" alt=""
                                            class="img-fluid" style="width: 209px; height:105px;">
                                        {{-- </a> --}}
                                        <span class="font-size-14 font-weight-700">{{ number_format((( $product->discount_price / $product->price ) * 100),1) }} %</span>
                                    </div>
                                    <div class="promotion_content">
                                        <div class="time_category_text">
                                            <div class="time_div">
                                                
                                                <p class="example" discount-time="{{ \Carbon\Carbon::parse($product->sale_time)->format('m/d/Y H:i:s')}}">
                                                    <span class="font-size-12 font-weight-600 days" style="font-size:12px;" title="Days">00</span> : <span class="font-size-12 font-weight-600 hours" style="font-size:12px;" title="Hours">00</span> : <span class="font-size-12 font-weight-600 minutes" style="font-size:12px;" title="Minutes">00</span> : <span class="font-size-12 font-weight-600 seconds" style="font-size:12px;" title="Seconds">00</span>
                                                </p>
                                            </div>
                                            {{-- <a class="font-size-14 font-weight-700"  href="" > --}}
                                                <p onclick="https://{{$product->short_name ?? ''}}.arikliger.com" class="promotion_category font-size-12 font-weight-400"> {{$product->brand_name}} </p>
                                            {{-- </a> --}}
                                        </div>
                                        {{-- <a class="font-size-14 font-weight-700" href="{{route('product',$product->id)}}"> --}}
                                            <p onclick="recommended_product('{{route('product',$product->id ?? '')}}')" class="promotion_title font-size-14 font-weight-700 text-right"  style="color: #212529 !important;">
                                                {{$product->name}}
                                            </p>
                                        {{-- </a> --}}
                                        <div class="price_learn_more">
                                            <a class="font-size-14 font-weight-700" onclick="recommended_product('{{route('product',$product->id ?? '')}}')" href="#">למידע נוסף ></a>
                                            
                                            <p  onclick="recommended_product('{{route('product',$product->id ?? '')}}')" class="font-size-14 font-weight-600">{{$product->discount_price}} ₪ <span
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
            <div class="d-lg-flex justify-content-start" style="direction: rtl !important">
            <form action="{{ route('filter-city-category') }}" method="post">
                @csrf
                <input type="hidden" name="category_id" value="{{$category_id}}" />
                <input type="hidden" name="city_id" value="{{$city_id}}" />
                <div class="container-fluid">
                    <div class="d-lg-flex" style="text-align:right;" >
                        <strong>סנן לפי קטגוריה:</strong>
                        <div class="inputDiv d-flex flex-column mb-4 mr-2">
                            {{-- <input type="text" class="form-control" placeholder="Sub Category" name="sub_category" id="sub_category" > --}}
                            @php
                            $sub_categories = \App\Models\SubCategory::where('category_id', $category_id)->get();
                            @endphp
                            <select class="form-control" name="sub_category" id="sub_category">
                                <option value="">Select Sub Category</option>
                                @foreach($sub_categories as $sub_category)
                                <option value="{{$sub_category->id}}">{{$sub_category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="inputDiv d-flex flex-column mb-4 mr-2">
                            <button type="submit" class="btn" style="background-color: #db1580 !important; color:#fff !important;">Filter</button>
                        </div>
                    </div>
                </div>
            </form>
            <form action="{{ route('filter-city-category') }}" method="post">
                @csrf
                <input type="hidden" name="category_id" value="{{$category_id}}" />
                <input type="hidden" name="city_id" value="{{$city_id}}" />
                <div class="container-fluid">
                    <div class="d-lg-flex">
                        <div class=" ">
                            <div class="inputDiv d-flex flex-column mb-4">
                                <input type="number" class="form-control" placeholder="Price" name="price" id="price" >
                            </div>
                        </div>
                        <div class=" ">
                            <div class="inputDiv d-flex flex-column mb-4 mr-2">
                                <button type="submit" class="btn" style="background-color: #db1580 !important; color:#fff !important;">Filter</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
            <div class="container-fluid">
                <div class="row">
                    
                    <div class="col-lg-12 text-right">
                        <h3 class="common_title">צרכנות משתלמת <img
                                src="{{asset('assets/img/mobile_component/beg.png') }}" alt="" class="img-fluid"></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="affordable_consumption_list d-flex multiple_afforable_consumption justify-content-start" style="direction: rtl; ">
                            @if(count($blogs) > 0)
                            @foreach($blogs as $blog)
                            <div class="affordable_consumption_box box_shahdow" style="margin-right:5px !important; flex-direction:inherit !important;">
                                <a href="{{route('article',$blog->id)}}">
                                    <img src="{{asset('blog/'.$blog->image)}}" alt="" class="img-flui">
                                </a>
                                <div class="content_div">
                                    <a href=" https://{{$blog->short_name ?? ''}}.arikliger.com">
                                        <span class="category font-size-12 font-weight-400"> {{$blog->brand_name}} </span>
                                    </a>
                                    <a href="{{route('article',$blog->id)}}" style="color: #212529 !important">
                                        <h4 class="font-size-12 font-weight-700">
                                            {{ $blog->title ?? '' }}
                                        </h4>
                                        <p class="discription font-size-10 font-weight-400">
                                            {{ $blog->sub_title ?? '' }}
                                        </p>
                                    </a>
                                        {{-- <span class="font-size-12">{{$blog->totallikes}} <i class="fa fa-heart"
                                                aria-hidden="true"></i></span> --}}
                                </div>
                            </div>
                            @endforeach
                            @endif
                            <!-- <a href="" class="desktop_hide d-none learn_more font-size-12 font-weight-400">לכל
                                הכתבות ></a> -->
                        </div>
                        <div class="more_btn mt-4 d-flex justify-content-center">
                            <a href="{{route('all-blogs',['category_id'=>$category_id ?? '5','city_id'=>$city_id]) }}" class="btn btn_outline_grey">עוד כתבות</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        @endif


        <div class="line spacing"></div>
        <div class="order_div spacing">
            @if(count($products) > 0 && $products['0']->id != null)
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
                            @if(count($products) > 0 && $products['0']->id != null)
                                @foreach($products as $product)
                                    <div class="deals_box box_shahdow swiper-slide">
                                        {{-- <a class="font-size-14 font-weight-700" href="{{route('product',$product->id ?? '')}}"> --}}
                                            <img onclick="recommended_product('{{route('product',$product->id ?? '')}}')" src="{{asset('product/'.$product->image)}}" alt="" class="img-fluid" style="width: 208px; height:163px">
                                        {{-- </a> --}}
                                        <div  class="content_div">
                                            {{-- <a href=""> --}}
                                            <span onclick="https://{{$product->short_name ?? ''}}.arikliger.com" class="deal_category font-size-12 font-weight-400"> {{$product->brand_name}}</span>
                                            {{-- </a> --}}
                                            {{-- <a href="{{route('product',$product->id)}}" style="color:#212529 !important;"> --}}
                                            <h4 onclick="recommended_product('{{route('product',$product->id ?? '')}}')" class="title font-size-14 font-weight-700">  
                                                {{$product->name}}
                                            </h4>
                                            <div onclick="recommended_product('{{route('product',$product->id ?? '')}}')" class="rating_price_div">
                                                <p class="font-size-14 font-weight-600">{{$product->price}} ₪ <span
                                                        class="font-size-12 font-weight-400">@if($product->discount_price != null) {{$product->price}} ₪ @endif</span></p>
                                                {{-- <p class="rating_text">{{$product->avgrate ?? 'no rating'}} <i class="fa fa-star"></i></p> --}}
                                            </div>
                                            {{-- </a> --}}
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if(count($brand_messages) > 0)
            <div class="hot_flashes">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <span class="annoucment_text font-size-16 font-weight-600">מבזקים חמים <img
                                    src="{{ asset('assets/img/mobile_component/anaoucment.png') }}" alt=""
                                    class="img-fluid"></span>
                            <div class="hot_flashes_list">
                                <ul>
                                    @foreach($brand_messages as $brand_message)
                                    @php  
                                        $current_date = \Carbon\Carbon::now();
                                        $sale_time = \Carbon\Carbon::parse($brand_message->end_date);
                                        $diff_in_days = $current_date->diffInDays( $sale_time,false) + 1;
                                    @endphp
                                    @if($diff_in_days >= 0)
                                    <li>
                                        <div class="img_box">
                                            <img src="{{asset('brand_image/'.$brand_message->brand_image)}}" alt="" class="img-fluid" style="width: 20px; height: 20px;">
                                        </div>
                                        <p class="flashes_comment font-size-14">{{ $brand_message->message }}
                                        </p>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                                <p class="more_flashes text-center font-size-12">עוד מבזקים...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
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
                                                class="font-size-12 font-weight-400">@if($product->discount_price != null) {{$product->discount_price}} ₪ @endif</span></p>
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
                                   הצטרפו למהפיכת הצרכנות המקומית של דוסיז צרכנות >>‎

                                </p>
                                <div class="btns d-flex mt-4">
                                     <a href="https://dosiz.co.il/landing-page/"  class="btn btn_grey_out">הצטרפות לעסקים</a>
									<!-- data-toggle="modal" data-target="#enrollmentModal" -->
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