<?php
use App\Helpers\Helpers; 
$city_id = Helpers::city_id();
?>
@extends('layout.master')
@section('title')
Dosize
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
                                    <a href="{{route('category_by_city',['category_id'=>$category->id,'city_id'=>$city_id])}}" style="color:#212529">
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
        @if(count($brand_messages) > 0)
        <div class="line spacing"></div>
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
        @if(count($discount_products) > 0)
        <div class="line spacing"></div>
        <div class="promotion spacing">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 text-right">
                        <h3 class="common_title">המבצעים שלא תרצו לפספס <img
                                src="{{ asset('assets/img/mobile_component/percentage_icon.svg') }}" alt=""
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
                                        <span class="font-size-14 font-weight-700">{{ (int)(( ($product->price - $product->discount_price) / $product->price ) * 100) }} %</span>
                                    </div>
                                    <div class="promotion_content">
                                        <div class="time_category_text">
                                            <div class="time_div">
                                                
                                                <p class="example" discount-time="{{ \Carbon\Carbon::parse($product->sale_time)->format('m/d/Y H:i:s')}}">
                                                    <span class="font-size-12 font-weight-600 days" style="font-size:12px;" title="Days">00</span> : <span class="font-size-12 font-weight-600 hours" style="font-size:12px;" title="Hours">00</span> : <span class="font-size-12 font-weight-600 minutes" style="font-size:12px;" title="Minutes">00</span> : <span class="font-size-12 font-weight-600 seconds" style="font-size:12px;" title="Seconds">00</span>
                                                </p>
                                            </div>
                                            <a class="font-size-14 font-weight-700" href="{{route('brand-profile',$product->brand_profile_id)}}" >
                                                <p class="promotion_category font-size-12 font-weight-400"> {{$product->brand_name}} </p>
                                            </a>
                                        </div>
                                        <a class="font-size-14 font-weight-700" href="{{route('product',$product->id)}}">
                                            <p class="promotion_title font-size-14 font-weight-700 text-right"  style="color: #212529 !important;">
                                                {{ \Illuminate\Support\Str::limit($product->name ?? '',30,'...')}}
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
        <div class="line spacing"></div>
        <div class="affordable_consumption spacing">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 text-right">
                        <h3 class="common_title">צרכנות משתלמת <img
                                src="{{ asset('assets/img/mobile_component/beg.png') }}" alt="" class="img-fluid"></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="affordable_consumption_list d-flex multiple_afforable_consumption">
                            @if(count($blogs) > 0)
                            @foreach($blogs as $blog)
                            
                            <div class="affordable_consumption_box box_shahdow">
                                <a href="{{route('article',$blog->id)}}">
                                <img src="{{asset('blog/'.$blog->image)}}" alt=""
                                    class="img-fluid" style="width: 300px; height: 205px">
                                </a>
                                <div class="content_div">
                                    <a href="{{route('brand-profile',$blog->brand_profile_id)}}">
                                    <span class="category font-size-12 font-weight-400"> {{$blog->brand_name}} </span>
                                    </a>
                                    <a href="{{route('article',$blog->id)}}" style="color: #212529 !important">
                                    <h4 class="font-size-12 font-weight-700">
                                        {{ \Illuminate\Support\Str::limit($blog->title ?? '',30,'...')}}
                                    </h4>
                                    <p class="discription font-size-10 font-weight-400">
                                        {!! substr($blog->description, 0,  30) !!}  
                                    </p>
                                    </a>
                                    <span class="font-size-12">{{$blog->totallikes}} <i class="fa fa-heart"
                                            aria-hidden="true"></i></span>
                                </div>
                            </div>
                            @endforeach
                            @endif
                            <a href="" class="desktop_hide learn_more font-size-12 font-weight-400">לכל
                                הכתבות ></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if(count($products) > 0 && $products[0]->id != null)
        <div class="line spacing"></div>
        <div class="order_div spacing">
            <div class="deals deal_one">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <h3 class="common_title">דילים חמים מהתנור <img
                                    src="{{ asset('assets/img/mobile_component/deals.svg') }}" alt="" class="img-fluid">
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="slider_div">
                    <div class="multiple_deals swiper">
                        <div class="swiper-wrapper">
                            @if(count($products) > 0 && $products[0]->id != null)
                                @foreach($products as $product)
                                    <div class="deals_box box_shahdow swiper-slide">
                                        <a class="font-size-14 font-weight-700" href="{{route('product',$product->id ?? '')}}">
                                            <img src="{{asset('product/'.$product->image)}}" alt="" class="img-fluid" style="width: 208px; height:163px">
                                        </a>
                                        <div class="content_div">
                                            <a href="{{route('brand-profile',$product->brand_profile_id ?? '')}}">
                                            <span class="deal_category font-size-12 font-weight-400"> {{$product->brand_name}}</span>
                                            </a>
                                            <a href="{{route('product',$product->id ?? '')}}" style="color:#212529 !important;">
                                            <h4 class="title font-size-14 font-weight-700">  
                                                {{ \Illuminate\Support\Str::limit($product->name ?? '',30,'...')}}
                                            </h4>
                                            <div class="rating_price_div">
                                                @if($product->price)
                                                <p class="font-size-14 font-weight-600" {{$product->price ?? ''}}> ₪ <span class="font-size-12 font-weight-400">80 ₪</span></p>
                                                @else
                                                <p class="font-size-14 font-weight-600"><span class="font-size-12 font-weight-400">80 ₪</span></p>
                                                @endif
                                                <p class="rating_text">{{$product->avgrate ?? 'no rating'}} <i class="fa fa-star"></i></p>
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
                                        <p class="flashes_comment font-size-14">
                                            {{ $brand_message->message }}
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
                                    src="{{ asset('assets/img/mobile_component/star.svg') }}" alt="" class="img-fluid">
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
                                    <a class="font-size-14 font-weight-700" href="{{route('brand-profile',$recomanded_products->id)}}">
                                    <span class="deal_category font-size-12 font-weight-400"> {{$recomanded_products->brand_name}} </span>
                                    </a>
                                    <a class="font-size-14 font-weight-700" href="{{route('product',$product->id)}}" style="color: #212529 !important;">
                                    <h4 class="title font-size-14 font-weight-700">
                                        {{$product->name}}
                                    </h4>
                                    <div class="rating_price_div">
                                        @if($product->price)
                                        <p class="font-size-14 font-weight-600">{{$product->price}} ₪ <span class="font-size-12 font-weight-400">80 ₪</span></p>
                                        @else
                                        <p class="font-size-14 font-weight-600"><span class="font-size-12 font-weight-400">80 ₪</span></p>
                                        @endif
                                        <p class="rating_text">{{$product->product_comment->avg('rating') ?? 'no rating'}} <i class="fa fa-star"></i></p>
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
        @endif
        <?php $i = 1; ?>
        @if ($p_city )
        @if (count($p_city->products->groupBy('category_id')) > 0 )
            <div class="row flex-row-reverse" style="min-height:600px; position: relative; display:flex;">
            @foreach ($p_city->products->groupBy('category_id') as $key=>$product_categories)
            <?php $a =1; ?>
            @php $category =  \App\Models\Category::where('id',$i)->first(); @endphp
            {{-- @dd($category) --}}
                @if($i == 1 || $i == 2)
                
                {{-- @dd($p_city->products->groupBy('category_id'),$key) --}}
                <div class="col-md-6">
                    <div class="products_div spacing p-0">
                        <div class="container-fluid p-0">
                            <div class="no_padding">
                                <div class="affordable_consumption">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-lg-12 text-right">
                                                <div class="header_cloth">
                                                    @if(isset($category->image))
                                                    <img src="{{asset('category/'.$category->image ?? '')}}" width="60px" height="50px">
                                                    @endif
                                                    <h3 class="common_title"> {{ $category->name ?? ''}}<img
                                                            src="{{ asset('assets/img/mobile_component/Line.png') }}" alt=""
                                                            class="img-fluid">
                                                    </h3>
                                                    <span class="read_more">
                                                        {{-- {{route('category_by_city',['category_id'=>$category->id,'city_id'=>$city_id])}} --}}
                                                        <a href="{{route('category_by_city',['category_id'=>$category->id ?? '5','city_id'=>$city_id])}}" class="font-size-12 font-weight-400">
                                                            כתבות ביגוד והנעלה</a> </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="article_div">
                                            @foreach ($p_city->blogs->groupBy('category_id') as $blog_key=>$article_categories)
                                                @if($blog_key == $key)
                                                    @foreach($article_categories->take(1) as $blog)
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="main_article">
                                                                    <div class="article_box" style="margin-bottom: 8px">
                                                                        <a class="font-size-14 font-weight-700"
                                                                           href="{{route('article',$blog->id ?? '')}}">
                                                                            <img
                                                                                src="{{asset('blog/'.$blog->image ?? '' )}}"
                                                                                width="120px" height="100%">
                                                                        </a>
                                                                        <a style="color: #212529 !important"
                                                                           href="{{route('article',$blog->id ?? '')}}">
                                                                            <div class="article_content">
                                                                                <h4 class="font-size-18"
                                                                                    style="margin-bottom: 20px;">
                                                                                    {{\Illuminate\Support\Str::limit($blog->title ?? '',30,'...')}}
                                                                                </h4>
                                                                                <p class="font-size-12">
                                                                                    {!! \Illuminate\Support\Str::limit($blog->description ?? '',60,'...') !!}
                                                                                </p>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            @endforeach

                                            {{-- @foreach($product_categories as $product)
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="main_article">
                                                        <div class="article_box">
                                                            <a class="font-size-14 font-weight-700" href="{{route('product',$product->id ?? '')}}">
                                                                <img src="{{asset('product/'.$product->image ?? '' )}}" width="120px" height="100%">
                                                            </a>
                                                            <a style="color: #212529 !important" href="{{route('product',$product->id ?? '')}}">
                                                            <div class="article_content">
                                                                <h4 class="font-size-18"
                                                                    style="margin-bottom: 20px;">
                                                                    {{$p_city->blogs->groupBy('category_id')['0']->title ?? ''}}
                                                                </h4>
                                                                <p class="font-size-12">
                                                                    {!! \Illuminate\Support\Str::limit($product->description ?? '',60,'...') !!}
                                                                </p>
                                                            </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach --}}

                                            <div class="row">

                                                <div class="col-lg-12">
                                                    <div class="affordable_consumption_list">
                                                        @foreach($product_categories->take(3)  as $product)
                                                            <div
                                                                class="affordable_consumption_box box_shahdow">
                                                                <a class="font-size-14 font-weight-700"
                                                                   href="{{route('product',$product->id ?? '')}}">
                                                                    <img
                                                                        src="{{asset('product/'.$product->image ?? '')}}"
                                                                        width="238px"
                                                                        height="120px">
                                                                </a>
                                                                <div class="content_div">
                                                                    <a class="font-size-14 font-weight-700"
                                                                       href="{{route('brand-profile',$product->brandprofile->id ?? '')}}">
                                                                                <span
                                                                                    class="category font-size-12 font-weight-400"> {{$product->brandprofile->brand_name ?? ''}} </span>
                                                                    </a>
                                                                    <a class="font-size-14 font-weight-700"
                                                                       href="{{route('product',$product->id ?? '')}}"
                                                                       style="color: #212529 !important;">
                                                                        <h4 class="font-size-14 font-weight-700">
                                                                            {{\Illuminate\Support\Str::limit($product->name ?? '',30,'...') }}
                                                                        </h4>
                                                                        <p class="discription font-size-12 font-weight-400">
                                                                            {!! \Illuminate\Support\Str::limit($product->description ?? '',60,'...') !!}
                                                                        </p>
                                                                    </a>
                                                                    <span
                                                                        class="font-size-12 like_span">4 <i
                                                                            class="fa fa-heart"
                                                                            aria-hidden="true"></i></span>
                                                                    <div class="rating_price_div">
                                                                        <a class="font-size-14 font-weight-700"
                                                                           href="{{route('product',$product->id ?? '')}}"
                                                                           style="color: #212529 !important">
                                                                           @if($product->price)
                                                                            <p class="font-size-14 font-weight-600">
                                                                                {{$product->price ?? ''}}
                                                                                ₪
                                                                            </p>
                                                                            @else
                                                                            <p class="font-size-14 font-weight-600">
                                                                                
                                                                            </p>
                                                                            @endif
                                                                        </a>
                                                                        <p class="rating_text"
                                                                           style="visibility: hidden;">
                                                                            4.8 <i
                                                                                class="fa fa-star"></i>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if($i == 3 || $i == 4)
                <div class="col-md-6">
                    <div class="home_medical_items spacing p-0">
                        <div class="container-fluid">
                            <div class="affordable_consumption">
                                    <div class="row">
                                        <div class="col-lg-12 text-right" style="padding-right: 15px; padding-left: 15px;">
                                            <div class="header_cloth">
                                                @if(isset($category->image))
                                                <img src="{{asset('category/'.$category->image ?? '')}}" width="60px" height="50px">
                                                @endif
                                                <h3 class="common_title">  {{ $category->name ?? ''}}<img
                                                        src="{{ asset('assets/img/mobile_component/Line.png') }}" alt=""
                                                        class="img-fluid">
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="affordable_consumption_list">
                                                @foreach ($p_city->blogs->groupBy('category_id') as $blog_key=>$article_categories)
                                                @if($blog_key == $key)
                                                    @foreach($article_categories->take(1) as $blog)
                                                    <div class="affordable_consumption_box box_shahdow">
                                                        <a class="font-size-14 font-weight-700" href="{{route('article',$blog->id ?? '')}}">
                                                            <img src="{{asset('blog/'.$blog->image ?? '')}}" style="width:131px; height:226px;">
                                                        </a>
                                                        <div class="content_div">
                                                            
                                                            
                                                            <h4 class="font-size-14 font-weight-700">
                                                                {{\Illuminate\Support\Str::limit($blog->title ?? '',30,'...')}}
                                                            </h4>
                                                            <p class="discription font-size-12 font-weight-400">
                                                                {{$blog->description}}
                                                            </p>
                                                            
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    @endif
                                                @endforeach

                                                @foreach($product_categories->take(3) as $product)
                                                <div class="affordable_consumption_box box_shahdow">
                                                    <a class="font-size-14 font-weight-700" href="{{route('product',$product->id ?? '')}}">
                                                        <img src="{{asset('product/'.$product->image ?? '')}}" width="131px" height="137px">
                                                    </a>
                                                    <div class="content_div">
                                                        <span class="category font-size-12 font-weight-400">
                                                            {{$product->brand_name ?? ''}}
                                                        </span>
                                                        <h4 class="font-size-14 font-weight-700">
                                                            {{ \Illuminate\Support\Str::limit($product->name ?? '',30,'...') }}
                                                        </h4>
                                                        <p class="discription font-size-12 font-weight-400">
                                                            {!! \Illuminate\Support\Str::limit($product->description ?? '',60,'...') !!}
                                                        </p>
                                                        <span class="font-size-12 like_span">4
                                                            <i class="fa fa-heart"
                                                                aria-hidden="true"></i></span>
                                                        <div class="rating_price_div">
                                                            @if($product->price)
                                                            <p class="font-size-14 font-weight-600">
                                                                ₪ {{$product->price ?? ''}}
                                                            </p>
                                                            @else
                                                            <p class="font-size-14 font-weight-600">
                                                            </p>
                                                            @endif
                                                            <p class="rating_text" style="visibility: hidden;"><i class="fa fa-star"></i>
                                                                4.8
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                                <div class="slider_div">
                                                    <img src="{{ asset('assets/img/mobile_component/slider_img.png') }}"
                                                        alt="" class="img-fluid">
                                                </div>
                                                {{-- {{ $category->id , $city_id)}} --}}
                                                <a href="{{route('category_by_city',['category_id'=>$category->id ?? '5','city_id'=>$city_id])}}" class="learn_more font-size-12 font-weight-400">לעוד
                                                    כתבות ביגוד
                                                    והנעלה
                                                    ></a>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @php $i++; $a++; @endphp
                @if($i == 5)
                @php $i = 1; @endphp
                @endif
            @endforeach
            </div>
        @endif
        @endif
        {{-- <div class="gifts_event_div spacing">
            <div class="affordable_consumption">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <div class="header_cloth">
                                <img src="{{ asset('assets/img/mobile_component/health_medicine.png') }}" alt=""
                                    class="img-fluid">
                                <h3 class="common_title">בריאות ורפואה <img
                                        src="{{ asset('assets/img/mobile_component/Line.png') }}" alt=""
                                        class="img-fluid">
                                </h3>
                                <span class="read_more">
                                    <a href="" class="font-size-12 font-weight-400">לעוד
                                        כתבות ביגוד
                                        והנעלה
                                        ></a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-6 column_width_change">
                        <div class="affordable_consumption">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="affordable_consumption_list">
                                            <div class="affordable_consumption_box box_shahdow">
                                                <img src="{{ asset('assets/img/mobile_component/affordable_iten.png') }}"
                                                    alt="" class="img-fluid">
                                                <div class="content_div">
                                                    <span class="category font-size-12 font-weight-400">נעלי
                                                        העיר</span>
                                                    <h4 class="font-size-14 font-weight-700">
                                                        קולקציית קיץ
                                                        הושקה בלידר אתמול
                                                        אחרי
                                                        הצהריים
                                                    </h4>
                                                    <p class="discription font-size-12 font-weight-400">
                                                        צפו
                                                        בגלריית התמונות
                                                        של
                                                        הקולקצייה המדהימה הזאת כאן בכתבה
                                                    </p>
                                                    <span class="font-size-12 like_span">4
                                                        <i class="fa fa-heart"
                                                            aria-hidden="true"></i></span>
                                                    <div class="rating_price_div">
                                                        <p class="font-size-14 font-weight-600">
                                                            2,100 ₪
                                                        </p>
                                                        <p class="rating_text">4.8 <i
                                                                class="fa fa-star"></i></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="affordable_consumption_box box_shahdow d-none">
                                                <img src="{{ asset('assets/img/mobile_component/affordable_iten.png') }}"
                                                    alt="" class="img-fluid">
                                                <div class="content_div">
                                                    <span class="category font-size-12 font-weight-400">נעלי
                                                        העיר</span>
                                                    <h4 class="font-size-14 font-weight-700">
                                                        קולקציית קיץ
                                                        הושקה בלידר אתמול
                                                        אחרי
                                                        הצהריים
                                                    </h4>
                                                    <p class="discription font-size-12 font-weight-400">
                                                        צפו
                                                        בגלריית התמונות
                                                        של
                                                        הקולקצייה המדהימה הזאת כאן בכתבה
                                                    </p>
                                                    <span class="font-size-12 like_span">4
                                                        <i class="fa fa-heart"
                                                            aria-hidden="true"></i></span>
                                                    <div class="rating_price_div">
                                                        <p class="font-size-14 font-weight-600">
                                                            2,100 ₪
                                                        </p>
                                                        <p class="rating_text">4.8 <i
                                                                class="fa fa-star"></i></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="affordable_consumption_box box_shahdow d-none">
                                                <img src="{{ asset('assets/img/mobile_component/affordable_iten.png') }}"
                                                    alt="" class="img-fluid">
                                                <div class="content_div">
                                                    <span class="category font-size-12 font-weight-400">נעלי
                                                        העיר</span>
                                                    <h4 class="font-size-14 font-weight-700">
                                                        קולקציית קיץ
                                                        הושקה בלידר אתמול
                                                        אחרי
                                                        הצהריים
                                                    </h4>
                                                    <p class="discription font-size-12 font-weight-400">
                                                        צפו
                                                        בגלריית התמונות
                                                        של
                                                        הקולקצייה המדהימה הזאת כאן בכתבה
                                                    </p>
                                                    <span class="font-size-12 like_span">4
                                                        <i class="fa fa-heart"
                                                            aria-hidden="true"></i></span>
                                                    <div class="rating_price_div">
                                                        <p class="font-size-14 font-weight-600">
                                                            2,100 ₪
                                                        </p>
                                                        <p class="rating_text">4.8 <i
                                                                class="fa fa-star"></i></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slider_div">
                                                <img src="{{ asset('assets/img/mobile_component/slider_img.png') }}"
                                                    alt="" class="img-fluid">
                                            </div>
                                            <a href="" class="learn_more font-size-12 font-weight-400">לעוד
                                                כתבות ביגוד
                                                והנעלה
                                                ></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 column_flex_width_change">
                        <div class="article_div">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="article_list">
                                        <ul>
                                            <li class="text-right">
                                                <a href="">
                                                    <h4 class="font-size-14">
                                                        קולקציית קיץ הושקה בלידר
                                                        אתמול אחרי הצהריים
                                                    </h4>
                                                    <p class="font-size-12">צפו
                                                        בגלריית התמונות של
                                                        הקולקצייה המדהימה הזאת
                                                        כאן
                                                    </p>
                                                </a>
                                            </li>
                                            <li class="text-right">
                                                <a href="">
                                                    <h4 class="font-size-14">
                                                        קולקציית קיץ הושקה בלידר
                                                        אתמול אחרי הצהריים
                                                    </h4>
                                                    <p class="font-size-12">צפו
                                                        בגלריית התמונות של
                                                        הקולקצייה המדהימה הזאת
                                                        כאן
                                                    </p>
                                                </a>
                                            </li>
                                            <li class="text-right">
                                                <a href="">
                                                    <h4 class="font-size-14">
                                                        קולקציית קיץ הושקה בלידר
                                                        אתמול אחרי הצהריים
                                                    </h4>
                                                    <p class="font-size-12">צפו
                                                        בגלריית התמונות של
                                                        הקולקצייה המדהימה הזאת
                                                        כאן
                                                    </p>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="main_article">
                                        <div class="article_box">
                                            <img src="{{ asset('assets/img/mobile_component/recommendedItem.png') }}"
                                                alt="" class="img-fluid">
                                            <div class="article_content">
                                                <h4 class="font-size-18" style="margin-bottom: 20px;">
                                                    קולקציית קיץ הושקה בלידר
                                                    אתמול אחרי הצהריים
                                                </h4>
                                                <p class="font-size-12">צפו
                                                    בגלריית התמונות של הקולקצייה
                                                    המדהימה הזאת כאן בכתבה
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!--  -->
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