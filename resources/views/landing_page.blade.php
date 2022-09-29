<?php
use App\Helpers\Helpers;
$city_id = Helpers::city_id();
?>
@extends('layout.master')
@section('title')
    Dosize
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/mobile-style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/desktop-css.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper.css') }}">
    <style>
        .affordable_consumption_box>a {
            display: flex;
            align-items: center;
            background: #dfdada;
        }

        .affordable_consumption_box>a>img {
            width: 150px;
        }

        @media (min-width: 1050px) and (max-width: 1250px) {
            .affordable_consumption_box {
                min-width: 350px;
            }
        }

        @media (min-width: 800px) {
            .article_content>p {
                height: 50px;
                overflow: hidden;
            }
        }

        @media (max-width: 990px) {

            .affordable_consumption_box:nth-child(3),
            .affordable_consumption_box:nth-child(4) {

                display: none !important;
            }

            .article_list {
                background: #fff;
                box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075) !important;
                padding: 12px;
                margin-bottom: 10px;
                border-radius: 9px;
            }

            .mobileFlex {
                display: flex;
                flex-direction: row-reverse;
                align-items: center;
            }

            .mobileFlex>img {
                border-radius: 5px;
                margin-left: 8px;
            }

            .products_div .affordable_consumption .affordable_consumption_list .affordable_consumption_box {
                display: block !important;
            }

            .products_div .affordable_consumption .affordable_consumption_list .affordable_consumption_box img {
                max-width: 100% !important;
                min-width: 100%;
                margin: 0;
            }

            .products_div .affordable_consumption .affordable_consumption_list .affordable_consumption_box .content_div {
                padding: 10px 16px;
            }

            .products_div .affordable_consumption .affordable_consumption_list .affordable_consumption_box img {
                max-height: 120px;
                min-height: 120px;
            }

            /* .article_list h4{
                                                    margin
                                                } */
            .affordable_consumption .affordable_consumption_list .affordable_consumption_box .content_div h4 {
                height: 32px;
            }



            .article_div .article_list ul li {
                margin-bottom: 0px;
            }
        }
    </style>
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
                                    @if (count($categories) > 0)
                                        @foreach ($categories as $key => $category)
                                            <div onclick="open_category('{{ route('category_by_city', ['category_id' => $category->id, 'city_id' => $city_id]) }}')"
                                                class="category_box swiper-slide">
                                                {{-- <a href="{{route('category_by_city',['category_id'=>$category->id,'city_id'=>$city_id])}}" style="color:#212529"> --}}
                                                <div class="img_box box_shahdow">
                                                    <img src="{{ asset('category/' . $category->image) }}" alt=""
                                                        class="img-fluid" style="width:28px;">
                                                </div>
                                                <p class="font-weight-600 font-size-12"> {{ $category->name }}</p>
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
            @if (count($discount_products) > 0)
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
                                @if (count($discount_products) > 0)
                                    @foreach ($discount_products as $product)
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
                                                <a class="font-size-14 font-weight-700"
                                                    href="{{ route('product', $product->id) }}">
                                                    <img src="{{ asset('product/' . $product->image) }}" alt=""
                                                        class="img-fluid" style="width: 209px;">
                                                </a>
                                                <span
                                                    class="font-size-14 font-weight-700">{{ (int) ((($product->price - $product->discount_price) / $product->price) * 100) }}
                                                    %</span>
                                            </div>
                                            <div class="promotion_content">
                                                <div class="time_category_text">
                                                    <div class="time_div">

                                                        <p class="example"
                                                            discount-time="{{ \Carbon\Carbon::parse($product->sale_time)->format('m/d/Y H:i:s') }}">
                                                            <span class="font-size-12 font-weight-600 days"
                                                                style="font-size:12px;" title="Days">00</span> : <span
                                                                class="font-size-12 font-weight-600 hours"
                                                                style="font-size:12px;" title="Hours">00</span> : <span
                                                                class="font-size-12 font-weight-600 minutes"
                                                                style="font-size:12px;" title="Minutes">00</span> : <span
                                                                class="font-size-12 font-weight-600 seconds"
                                                                style="font-size:12px;" title="Seconds">00</span>
                                                        </p>
                                                    </div>
                                                    <a class="font-size-14 font-weight-700"
                                                        href="https://{{ $product->short_name ?? '' }}.arikliger.com">
                                                        <p class="promotion_category font-size-12 font-weight-400">
                                                            {{ \Illuminate\Support\Str::limit($product->brandprofile->brand_name ?? '', 15) }}
                                                        </p>
                                                    </a>
                                                </div>
                                                <a class="font-size-14 font-weight-700"
                                                    href="{{ route('product', $product->id) }}">
                                                    <p class="promotion_title font-size-14 font-weight-700 text-right"
                                                        style="color: #212529 !important;">
                                                        {{-- {{ \Illuminate\Support\Str::limit($product->name ?? '',30,'...')}} --}}
                                                        {{ $product->name ?? '' }}
                                                    </p>
                                                </a>
                                                <div class="price_learn_more">
                                                    <a class="font-size-14 font-weight-700"
                                                        href="{{ route('product', $product->id) }}">למידע נוסף ></a>

                                                    <p class="font-size-14 font-weight-600">{{ $product->discount_price }}
                                                        ₪ <span
                                                            class="font-size-12 font-weight-400">{{ $product->price ?? '00' }}
                                                            ₪</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="swiper-button-next btn-swiper swiper-left removedDisable d-block">
                                <i class="fa fa-caret-left" aria-hidden="true"></i>
                            </div>
                            <div class="swiper-button-prev btn-swiper swiper-right d-block">
                                <i class="fa fa-caret-right" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="row rtl tw-ml-5 tw-mr-1">
                @if (count($blogs) > 0 && $blogs['0']->id != null)
                    <div class="affordable_consumption spacing col-7 tw-px-0">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12 text-right">
                                    <h3 class="common_title">צרכנות משתלמת <img
                                            src="{{ asset('assets/img/mobile_component/beg.png') }}" alt=""
                                            class="img-fluid"></h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="affordable_consumption_list d-flex multiple_afforable_consumption justify-content-start"
                                        style="direction: rtl">
                                        @if (count($blogs) > 0)
                                            @foreach ($blogs as $blog)
                                                <div class="affordable_consumption_box box_shahdow tw-rounded-xl tw-overflow-hidden"
                                                    style="flex-direction: initial !important; margin-left: 10px !important;">
                                                    <a href="{{ route('article', $blog->id) }}">
                                                        <img src="{{ asset('blog/' . $blog->image) }}" alt=""
                                                            class="img-flui tw-object-cover tw-h-full">
                                                    </a>
                                                    <div class="content_div">
                                                        <a href=" https://{{ $blog->short_name ?? '' }}.arikliger.com">
                                                            <span class="category font-size-12 font-weight-400">
                                                                {{ \Illuminate\Support\Str::limit($blog->brand_name ?? '', 15) }}
                                                            </span>
                                                        </a>
                                                        <a href="{{ route('article', $blog->id) }}"
                                                            style="color: #212529 !important">
                                                            <h4 class="font-size-12 font-weight-700">
                                                                {{ $blog->title ?? '' }}
                                                            </h4>
                                                            <p class="discription font-size-10 font-weight-400">
                                                                {{ $blog->sub_title ?? '' }}
                                                            </p>
                                                        </a>
                                                        @php
                                                            $like = \App\Models\Like::where('blog_id', $blog->id)->count();
                                                            // dd($like);
                                                        @endphp
                                                        <span class="font-size-12">{{ $like }}<i
                                                                class="fa fa-heart" aria-hidden="true"></i></span>
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

                @if (count($brand_messages) > 0)
                    <div class="col-5 tw-bg-[#dfdada] tw-py-12 tw-pb-5 tw-mt-16 tw-rounded tw-relative rtl">

                        <a class="tw-flex tw-items-center tw-gap-2 tw-absolute tw-top-0 tw-right-0 tw-bg-gradient-to-r tw-from-orange-400 tw-to-pink tw-py-3 tw-pr-5 tw-pl-12 tw-rounded-l-2xl"
                            style="transform: translateY(-50%)" href=""><img
                                src="{{ asset('assets/img/mobile_component/anaoucment.png') }}" class="img-fluid">
                            <h3 class="tw-text-white hover:tw-text-white tw-text-lg">מבזקים
                                חמים</h3>
                        </a>
                        @foreach ($brand_messages as $brand_message)
                            <div class="tw-flex tw-flex-col">
                                @php
                                    $current_date = \Carbon\Carbon::now();
                                    $sale_time = \Carbon\Carbon::parse($brand_message->end_date);
                                    $diff_in_days = $current_date->diffInDays($sale_time, false) + 1;
                                @endphp

                                @if ($diff_in_days >= 0)
                                    <a class="tw-flex tw-gap-2 tw-mb-5" href="">
                                        <img src="{{ asset('brand_image/' . $brand_message->brand_image) }}"
                                            alt="" class="img-fluid tw-w-12 tw-h-12 tw-rounded-full" />
                                        <div class="tw-bg-white tw-p-3 tw-rounded-lg tw-rounded-tr-none">
                                            <span class="tw-text-black">{{ $brand_message->message }}</span>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            @if (count($products) > 0 && $products[0]->id != null)
                <div class="line spacing"></div>
                <hr>
                <div class="order_div spacing">
                    <div class="deals deal_one">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12 text-right">
                                    <h3 class="common_title">דילים חמים מהתנור <img
                                            src="{{ asset('assets/img/mobile_component/deals.svg') }}" alt=""
                                            class="img-fluid">
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="slider_div">
                            <div class="multiple_deals swiper">
                                <div class="swiper-wrapper">
                                    @if (count($products) > 0 && $products[0]->id != null)
                                        @foreach ($products as $product)
                                            <div class="deals_box box_shahdow swiper-slide recommended_product">
                                                {{-- <a class="font-size-14 font-weight-700" href="{{route('product',$product->id ?? '')}}"> --}}
                                                <img onclick="recommended_product('{{ route('product', $product->id ?? '') }}')"
                                                    src="{{ asset('product/' . $product->image) }}" alt=""
                                                    class="img-fluid" style=" height:163px">
                                                {{-- </a> --}}
                                                <div class="content_div">
                                                    {{-- <a href="https://{{$product->short_name ?? ''}}.arikliger.com"> --}}
                                                    <span onclick="https://{{ $product->short_name ?? '' }}.arikliger.com"
                                                        class="deal_category font-size-12 font-weight-400">
                                                        {{ \Illuminate\Support\Str::limit($product->brand_name ?? '', 15) }}
                                                    </span>
                                                    {{-- </a> --}}
                                                    {{-- <a href="{{route('product',$product->id ?? '')}}" style="color:#212529 !important;"> --}}
                                                    <h4 onclick="recommended_product('{{ route('product', $product->id ?? '') }}')"
                                                        class="title font-size-14 font-weight-700">
                                                        {{-- {{ \Illuminate\Support\Str::limit($product->name ?? '',30,'...')}} --}}
                                                        {{ $product->name ?? '' }}
                                                    </h4>

                                                    <div onclick="recommended_product('{{ route('product', $product->id ?? '') }}')"
                                                        class="rating_price_div">
                                                        @if ($product->price)
                                                            <p class="font-size-14 font-weight-600">
                                                                {{ $product->price ?? '' }} ₪ <span
                                                                    class="font-size-12 font-weight-400">{{ $product->discount_price ?? '' }}
                                                                    ₪</span></p>
                                                        @else
                                                            <p class="font-size-14 font-weight-600"><span
                                                                    class="font-size-12 font-weight-400">{{ $product->discount_price ?? '' }}
                                                                    ₪</span></p>
                                                        @endif
                                                        @php
                                                            $rating = \App\Models\ProductComment::where('product_id', $product->id)->avg('rating');
                                                            // dd($rating);
                                                        @endphp
                                                        <p class="rating_text">{{ $rating ?? 'no rating' }} <i
                                                                class="fa fa-star"></i></p>
                                                    </div>
                                                    {{-- </a> --}}
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="swiper-button-next btn-swiper swiper-left removedDisable d-block">
                                    <i class="fa fa-caret-left" aria-hidden="true"></i>
                                </div>
                                <div class="swiper-button-prev btn-swiper swiper-right d-block">
                                    <i class="fa fa-caret-right" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (count($brand_messages) > 0)
                        <div class="hot_flashes">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <span class="annoucment_text font-size-16 font-weight-600">מבזקים חמים <img
                                                src="{{ asset('assets/img/mobile_component/anaoucment.png') }}"
                                                alt="" class="img-fluid"></span>
                                        <div class="hot_flashes_list">
                                            <ul>
                                                @foreach ($brand_messages as $brand_message)
                                                    @php
                                                        $current_date = \Carbon\Carbon::now();
                                                        $sale_time = \Carbon\Carbon::parse($brand_message->end_date);
                                                        $diff_in_days = $current_date->diffInDays($sale_time, false) + 1;
                                                    @endphp
                                                    @if ($diff_in_days >= 0)
                                                        <li>
                                                            <div class="img_box">
                                                                <img src="{{ asset('brand_image/' . $brand_message->brand_image) }}"
                                                                    alt="" class="img-fluid"
                                                                    style="width: 20px; height: 20px;">
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
                    @if (count($brands_recomanded_products) > 0 && $brands_recomanded_products[0]->id != null)
                        <div class="deals deal_two">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-12 text-right">
                                        <h3 class="common_title">הכי מומלצים <img
                                                src="{{ asset('assets/img/mobile_component/star.svg') }}" alt=""
                                                class="img-fluid">
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="slider_div border-bottom pb-4">
                                <div class="multiple_deals swiper">
                                    <div class="swiper-wrapper">
                                        @if (count($brands_recomanded_products) > 0 && $brands_recomanded_products[0]->id != null)
                                            @foreach ($brands_recomanded_products as $product)
                                                <div class="deals_box box_shahdow swiper-slide recommended_product">
                                                    {{-- <a class="font-size-14 font-weight-700" href="{{route('product',$product->id)}}"> --}}
                                                    <img onclick="recommended_product('{{ route('product', $product->id) }}')"
                                                        src="{{ asset('product/' . $product->image) }}" alt=""
                                                        class="img-fluid" style="max-height: 160px">
                                                    {{-- </a> --}}
                                                    <div class="content_div">
                                                        {{-- <a class="font-size-14 font-weight-700" href="https://{{$product->short_name ?? ''}}.arikliger.com"> --}}
                                                        <span
                                                            onclick="recommended_product('https://{{ $product->short_name ?? '' }}.arikliger.com')"
                                                            class="deal_category font-size-12 font-weight-400">
                                                            {{ \Illuminate\Support\Str::limit($product->brand_name ?? '', 15) }}
                                                        </span>
                                                        </a>
                                                        {{-- <a class="font-size-14 font-weight-700" href="{{route('product',$product->id)}}" style="color: #212529 !important;"> --}}
                                                        <h4 onclick="recommended_product('{{ route('product', $product->id) }}')"
                                                            class="title font-size-14 font-weight-700">
                                                            {{-- {{$product->name}} --}}
                                                            {{ $product->name ?? '' }}
                                                        </h4>
                                                        <div class="rating_price_div"
                                                            onclick="recommended_product('{{ route('product', $product->id) }}')">
                                                            @if ($product->price)
                                                                <p class="font-size-14 font-weight-600">
                                                                    {{ $product->price }} ₪ <span
                                                                        class="font-size-12 font-weight-400"
                                                                        style="text-decoration: line-through !important;">
                                                                        @if ($product->discount_price != null)
                                                                            {{ $product->discount_price ?? '' }} ₪
                                                                        @endif
                                                                    </span></p>
                                                            @else
                                                                <p class="font-size-14 font-weight-600"><span
                                                                        class="font-size-12 font-weight-400"
                                                                        style="text-decoration: line-through !important;">{{ $product->discount_price ?? '' }}
                                                                        ₪</span></p>
                                                            @endif
                                                            @php
                                                                $rating = \App\Models\ProductComment::where('product_id', $product->id)->avg('rating');
                                                                // dd($rating);
                                                            @endphp
                                                            <p class="rating_text">{{ $rating ?? 'no rating' }} <i
                                                                    class="fa fa-star"></i></p>
                                                        </div>
                                                        {{-- </a> --}}
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="swiper-button-next btn-swiper swiper-left d-block">
                                        <i class="fa fa-caret-left" aria-hidden="true"></i>
                                    </div>
                                    <div class="swiper-button-prev btn-swiper swiper-right d-block">
                                        <i class="fa fa-caret-right" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            @endif
            <?php $i = 1; ?>
            <?php $a = 1; ?>
            @if ($p_city)
                @if (count($p_city->products->groupBy('category_id')) > 0 || count($p_city->products->groupBy('category_id')) > 0)
                    <div class="row flex-row-reverse" style="min-height:600px; position: relative; display:flex;">
                        @foreach ($p_city->products->groupBy('category_id') as $key => $product_categories)
                            @php
                                $category = \App\Models\Category::find($key);
                                if ($category == null) {
                                    continue;
                                }
                            @endphp
                            {{-- @dd($product_categories) --}}
                            @if ($i == 1 || $i == 2)
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
                                                                    @if (isset($category->image))
                                                                        <img src="{{ asset('category/' . $category->image ?? '') }}"
                                                                            width="60px" height="50px">
                                                                    @endif
                                                                    <h3 class="common_title">
                                                                        {{ $category->name ?? 'hello' }}<img
                                                                            src="{{ asset('assets/img/mobile_component/Line.png') }}"
                                                                            alt="" class="img-fluid">
                                                                    </h3>
                                                                    <span class="read_more">
                                                                        {{-- {{route('category_by_city',['category_id'=>$category->id,'city_id'=>$city_id])}} --}}
                                                                        <a href="{{ route('category_by_city', ['category_id' => $category->id ?? '5', 'city_id' => $city_id]) }}"
                                                                            class="font-size-12 font-weight-400"
                                                                            style="direction:rtl;">
                                                                            {{ $category->name }} לקטגורית </a> </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- @dd($p_city->blogs->groupBy('category_id')->reverse()) --}}
                                                        <div class="article_div" style="display: block !important;">
                                                            @foreach ($p_city->blogs->groupBy('category_id')->reverse() as $blog_key => $article_categories)
                                                                @if ($blog_key == $key)
                                                                    {{-- $article_categories = $article_categories->reverse();
                                            dd($article_categories); --}}
                                                                    <div class="row"
                                                                        style="flex-direction: row-reverse;">

                                                                        @php $blog_count = 0 @endphp
                                                                        @foreach ($article_categories->reverse()->take(4) as $blog)
                                                                            @php $blog_count++ @endphp
                                                                            @if ($blog_count == 1)
                                                                                <div class="col-lg-6">
                                                                                    <div class="main_article">
                                                                                        <div class="article_box"
                                                                                            style="margin-bottom: 8px">
                                                                                            <a class="font-size-14 font-weight-700"
                                                                                                href="{{ route('article', $blog->id ?? '') }}">
                                                                                                <img src="{{ asset('blog/' . $blog->image ?? '') }}"
                                                                                                    width="120px"
                                                                                                    height="100%">
                                                                                            </a>
                                                                                            <a style="color: #212529 !important"
                                                                                                href="{{ route('article', $blog->id ?? '') }}">
                                                                                                <div
                                                                                                    class="article_content">
                                                                                                    <h4 class="font-size-18"
                                                                                                        style="margin-bottom: 20px; direction:rtl !important;">
                                                                                                        {{ $blog->title ?? '' }}
                                                                                                    </h4>
                                                                                                    <p
                                                                                                        class="font-size-12">
                                                                                                        {{ $blog->sub_title ?? '' }}
                                                                                                    </p>
                                                                                                </div>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-12 d-lg-none">
                                                                                    <div class="article_list">
                                                                                        <ul>
                                                                                            <li class="text-right">
                                                                                                <a href="{{ route('article', $blog->id ?? '') }}"
                                                                                                    class="mobileFlex">
                                                                                                    <img class="d-lg-none"
                                                                                                        src="{{ asset('blog/' . $blog->image ?? '') }}"
                                                                                                        width="120px"
                                                                                                        height="100%">
                                                                                                    <div>
                                                                                                        <h4 class="font-size-14"
                                                                                                            style="direction:rtl !important;">
                                                                                                            {{ $blog->title ?? '' }}
                                                                                                        </h4>
                                                                                                        <p
                                                                                                            class="font-size-12">
                                                                                                            {{ $blog->sub_title ?? '' }}
                                                                                                        </p>
                                                                                                    </div>
                                                                                                </a>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            @endif
                                                                            @if ($blog_count == 2)
                                                                                <div class="col-lg-6 col-sm-12">
                                                                                    <div class="row">
                                                                            @endif
                                                                            @if ($blog_count == 2 || $blog_count == 3 || $blog_count == 4)
                                                                                <div class="col-lg-12">
                                                                                    <div class="article_list">
                                                                                        <ul>
                                                                                            <li class="text-right">
                                                                                                <a href="{{ route('article', $blog->id ?? '') }}"
                                                                                                    class="mobileFlex">
                                                                                                    <img class="d-lg-none"
                                                                                                        src="{{ asset('blog/' . $blog->image ?? '') }}"
                                                                                                        width="120px"
                                                                                                        height="100%">
                                                                                                    <div>
                                                                                                        <h4 class="font-size-14"
                                                                                                            style="direction:rtl !important;">
                                                                                                            {{ $blog->title ?? '' }}
                                                                                                        </h4>
                                                                                                        <p
                                                                                                            class="font-size-12">
                                                                                                            {{ $blog->sub_title ?? '' }}
                                                                                                        </p>
                                                                                                    </div>

                                                                                                </a>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                                @if ($loop->last)
                                                                    </div>
                                                        </div>
                            @endif
                        @endif
                @endforeach
        </div>
        @endif
        @endforeach

        <div class="row">

            <div class="col-lg-12 d-none d-lg-block">
                <div class="affordable_consumption_list">
                    @foreach ($product_categories->take(3) as $product)
                        <div class="affordable_consumption_box box_shahdow">
                            <a class="font-size-14 font-weight-700" href="{{ route('product', $product->id ?? '') }}">
                                <img src="{{ asset('product/' . $product->image ?? '') }}" width="238px"
                                    height="100%">
                            </a>
                            <div class="content_div">
                                <a class="font-size-14 font-weight-700"
                                    href="https://{{ $product->brandprofile->short_name ?? '' }}.arikliger.com">
                                    <span class="category font-size-12 font-weight-400">
                                        {{ \Illuminate\Support\Str::limit($product->brandprofile->brand_name ?? '', 15) }}
                                    </span>
                                </a>
                                <a class="font-size-14 font-weight-700" href="{{ route('product', $product->id ?? '') }}"
                                    style="color: #212529 !important;">
                                    <h4 class="font-size-14 font-weight-700" style="direction: rtl !important;">
                                        {{ $product->name ?? '' }}
                                    </h4>
                                    <p class="discription font-size-12 font-weight-400">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($product->description) ?? '', 30, '...') }}
                                    </p>
                                </a>
                                <span class="font-size-12 like_span" style="display: none !important;">4 <i
                                        class="fa fa-heart" aria-hidden="true"></i></span>
                                <div class="rating_price_div" style="display: flex !important;">
                                    <a class="font-size-14 font-weight-700"
                                        href="{{ route('product', $product->id ?? '') }}"
                                        style="color: #212529 !important">
                                        @if ($product->price)
                                            <p class="font-size-14 font-weight-600">
                                                {{ $product->price ?? '' }}
                                                ₪
                                            </p>
                                        @else
                                            <p class="font-size-14 font-weight-600">

                                            </p>
                                        @endif
                                    </a>
                                    <p class="rating_text" style="visibility: hidden;">
                                        4.8 <i class="fa fa-star"></i>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-lg-12 d-lg-none">
                <div class="affordable_consumption_list">
                    <div class="swiper product1 mySwiper">
                        <div class="swiper-wrapper">
                            @foreach ($product_categories->take(3) as $product)
                                <div class="swiper-slide">
                                    <div class="affordable_consumption_box box_shahdow">
                                        <a class="font-size-14 font-weight-700"
                                            href="{{ route('product', $product->id ?? '') }}">
                                            <img src="{{ asset('product/' . $product->image ?? '') }}" width="238px"
                                                height="100%">
                                        </a>
                                        <div class="content_div">
                                            <a class="font-size-14 font-weight-700"
                                                href="https://{{ $product->brandprofile->short_name ?? '' }}.arikliger.com">
                                                <span class="category font-size-12 font-weight-400">
                                                    {{ \Illuminate\Support\Str::limit($product->brandprofile->brand_name ?? '', 15) }}
                                                </span>
                                            </a>
                                            <a class="font-size-14 font-weight-700"
                                                href="{{ route('product', $product->id ?? '') }}"
                                                style="color: #212529 !important;">
                                                <h4 class="font-size-14 font-weight-700"
                                                    style="direction: rtl !important;">
                                                    {{ $product->name ?? '' }}
                                                </h4>
                                                <p class="discription font-size-12 font-weight-400">
                                                    {{ \Illuminate\Support\Str::limit(strip_tags($product->description) ?? '', 30, '...') }}
                                                </p>
                                            </a>
                                            <span class="font-size-12 like_span " style="display: none !important;">4 <i
                                                    class="fa fa-heart" aria-hidden="true"></i></span>
                                            <div class="rating_price_div" style="display: flex !important;">
                                                <a class="font-size-14 font-weight-700"
                                                    href="{{ route('product', $product->id ?? '') }}"
                                                    style="color: #212529 !important">
                                                    @if ($product->price)
                                                        <p class="font-size-14 font-weight-600">
                                                            {{ $product->price ?? '' }}

                                                            ₪

                                                        </p>
                                                    @else
                                                        <p class="font-size-14 font-weight-600">

                                                        </p>
                                                    @endif
                                                </a>
                                                <p class="rating_text" style="visibility: hidden;">
                                                    4.8 <i class="fa fa-star"></i>
                                                </p>
                                            </div>
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
        </div>
        </div>
        @endif
        @if ($i == 3 || $i == 4)
            <div class="col-md-6">
                <div class="home_medical_items spacing p-0">
                    <div class="container-fluid">
                        <div class="affordable_consumption">
                            <div class="row">
                                <div class="col-lg-12 text-right" style="padding-right: 15px; padding-left: 15px;">
                                    <div class="header_cloth">
                                        @if (isset($category->image))
                                            <img src="{{ asset('category/' . $category->image ?? '') }}" width="60px"
                                                height="100%">
                                        @endif
                                        <h3 class="common_title"> {{ $category->name ?? 'Haroon' }}<img
                                                src="{{ asset('assets/img/mobile_component/Line.png') }}" alt=""
                                                class="img-fluid">
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="article_div" style="display: block !important;">
                                @foreach ($p_city->blogs->groupBy('category_id')->reverse() as $blog_key => $article_categories)
                                    @if ($blog_key == $key)
                                        {{-- $article_categories = $article_categories->reverse();
                                            dd($article_categories); --}}
                                        <div class="row" style="flex-direction: row-reverse;">

                                            @php $blog_count = 0 @endphp
                                            @foreach ($article_categories->reverse()->take(4) as $blog)
                                                @php $blog_count++ @endphp
                                                @if ($blog_count == 1)
                                                    <div class="col-lg-6">
                                                        <div class="main_article">
                                                            <div class="article_box" style="margin-bottom: 8px">
                                                                <a class="font-size-14 font-weight-700"
                                                                    href="{{ route('article', $blog->id ?? '') }}">
                                                                    <img src="{{ asset('blog/' . $blog->image ?? '') }}"
                                                                        width="120px" height="100%">
                                                                </a>
                                                                <a style="color: #212529 !important"
                                                                    href="{{ route('article', $blog->id ?? '') }}">
                                                                    <div class="article_content">
                                                                        <h4 class="font-size-18"
                                                                            style="margin-bottom: 20px; direction:rtl !important;">
                                                                            {{ $blog->title ?? '' }}
                                                                        </h4>
                                                                        <p class="font-size-12">
                                                                            {{ $blog->sub_title ?? '' }}
                                                                        </p>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 d-lg-none">
                                                        <div class="article_list">
                                                            <ul>
                                                                <li class="text-right">
                                                                    <a href="{{ route('article', $blog->id ?? '') }}"
                                                                        class="mobileFlex">
                                                                        <img class="d-lg-none"
                                                                            src="{{ asset('blog/' . $blog->image ?? '') }}"
                                                                            width="120px" height="100%">
                                                                        <div>
                                                                            <h4 class="font-size-14"
                                                                                style="direction:rtl !important;">
                                                                                {{ $blog->title ?? '' }}
                                                                            </h4>
                                                                            <p class="font-size-12">
                                                                                {{ $blog->sub_title ?? '' }}
                                                                            </p>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if ($blog_count == 2)
                                                    <div class="col-lg-6 col-sm-12">
                                                        <div class="row">
                                                @endif
                                                @if ($blog_count == 2 || $blog_count == 3 || $blog_count == 4)
                                                    <div class="col-lg-12">
                                                        <div class="article_list">
                                                            <ul>
                                                                <li class="text-right">
                                                                    <a href="{{ route('article', $blog->id ?? '') }}"
                                                                        class="mobileFlex">
                                                                        <img class="d-lg-none"
                                                                            src="{{ asset('blog/' . $blog->image ?? '') }}"
                                                                            width="120px" height="100%">
                                                                        <div>
                                                                            <h4 class="font-size-14"
                                                                                style="direction:rtl !important;">
                                                                                {{ $blog->title ?? '' }}
                                                                            </h4>
                                                                            <p class="font-size-12">
                                                                                {{ $blog->sub_title ?? '' }}
                                                                            </p>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    @if ($loop->last)
                                        </div>
                            </div>
        @endif
        @endif
        @endforeach
        </div>
        @endif
        @endforeach

        <div class="row">

            <div class="col-lg-12">
                <div class="affordable_consumption_list">
                    @foreach ($product_categories->take(3) as $product)
                        <div class="affordable_consumption_box box_shahdow">
                            <a class="font-size-14 font-weight-700" href="{{ route('product', $product->id ?? '') }}">
                                <img src="{{ asset('product/' . $product->image ?? '') }}" width="238px"
                                    height="100%">
                            </a>
                            <div class="content_div">
                                <a class="font-size-14 font-weight-700"
                                    href="https://{{ $product->brandprofile->short_name ?? '' }}.arikliger.com">
                                    <span class="category font-size-12 font-weight-400">
                                        {{ \Illuminate\Support\Str::limit($product->brandprofile->brand_name ?? '', 15) }}
                                    </span>
                                </a>
                                <a class="font-size-14 font-weight-700"
                                    href="{{ route('product', $product->id ?? '') }}"
                                    style="color: #212529 !important;">
                                    <h4 class="font-size-14 font-weight-700">
                                        {{ $product->name ?? '' }}
                                    </h4>
                                    <p class="discription font-size-12 font-weight-400">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($product->description) ?? '', 30, '...') }}
                                    </p>
                                </a>
                                {{-- <span
                                                                    class="font-size-12 like_span">4 <i
                                                                        class="fa fa-heart"
                                                                        aria-hidden="true"></i></span> --}}
                                <div class="rating_price_div">
                                    <a class="font-size-14 font-weight-700"
                                        href="{{ route('product', $product->id ?? '') }}"
                                        style="color: #212529 !important">
                                        @if ($product->price)
                                            <p class="font-size-14 font-weight-600">
                                                {{ $product->price ?? '' }}
                                                ₪
                                            </p>
                                        @else
                                            <p class="font-size-14 font-weight-600">

                                            </p>
                                        @endif
                                    </a>
                                    <p class="rating_text" style="visibility: hidden;">
                                        4.8 <i class="fa fa-star"></i>
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
        @endif
        @php
            $i++;
            $a++;
        @endphp
        @if ($i == 5)
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
                                <h3 class="common_title">×‘×¨×™××•×ª ×•×¨×¤×•××” <img
                                        src="{{ asset('assets/img/mobile_component/Line.png') }}" alt=""
                                        class="img-fluid">
                                </h3>
                                <span class="read_more">
                                    <a href="" class="font-size-12 font-weight-400">×œ×¢×•×“
                                        ×›×ª×‘×•×ª ×‘×™×’×•×“
                                        ×•×”× ×¢×œ×”
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
                                                    <span class="category font-size-12 font-weight-400">× ×¢×œ×™
                                                        ×”×¢×™×¨</span>
                                                    <h4 class="font-size-14 font-weight-700">
                                                        ×§×•×œ×§×¦×™×™×ª ×§×™×¥
                                                        ×”×•×©×§×” ×‘×œ×™×“×¨ ××ª×ž×•×œ
                                                        ××—×¨×™
                                                        ×”×¦×”×¨×™×™×
                                                    </h4>
                                                    <p class="discription font-size-12 font-weight-400">
                                                        ×¦×¤×•
                                                        ×‘×’×œ×¨×™×™×ª ×”×ª×ž×•× ×•×ª
                                                        ×©×œ
                                                        ×”×§×•×œ×§×¦×™×™×” ×”×ž×“×”×™×ž×” ×”×–××ª ×›××Ÿ ×‘×›×ª×‘×”
                                                    </p>
                                                    <span class="font-size-12 like_span">4
                                                        <i class="fa fa-heart"
                                                            aria-hidden="true"></i></span>
                                                    <div class="rating_price_div">
                                                        <p class="font-size-14 font-weight-600">
                                                            2,100 â‚ª
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
                                                    <span class="category font-size-12 font-weight-400">× ×¢×œ×™
                                                        ×”×¢×™×¨</span>
                                                    <h4 class="font-size-14 font-weight-700">
                                                        ×§×•×œ×§×¦×™×™×ª ×§×™×¥
                                                        ×”×•×©×§×” ×‘×œ×™×“×¨ ××ª×ž×•×œ
                                                        ××—×¨×™
                                                        ×”×¦×”×¨×™×™×
                                                    </h4>
                                                    <p class="discription font-size-12 font-weight-400">
                                                        ×¦×¤×•
                                                        ×‘×’×œ×¨×™×™×ª ×”×ª×ž×•× ×•×ª
                                                        ×©×œ
                                                        ×”×§×•×œ×§×¦×™×™×” ×”×ž×“×”×™×ž×” ×”×–××ª ×›××Ÿ ×‘×›×ª×‘×”
                                                    </p>
                                                    <span class="font-size-12 like_span">4
                                                        <i class="fa fa-heart"
                                                            aria-hidden="true"></i></span>
                                                    <div class="rating_price_div">
                                                        <p class="font-size-14 font-weight-600">
                                                            2,100 â‚ª
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
                                                    <span class="category font-size-12 font-weight-400">× ×¢×œ×™
                                                        ×”×¢×™×¨</span>
                                                    <h4 class="font-size-14 font-weight-700">
                                                        ×§×•×œ×§×¦×™×™×ª ×§×™×¥
                                                        ×”×•×©×§×” ×‘×œ×™×“×¨ ××ª×ž×•×œ
                                                        ××—×¨×™
                                                        ×”×¦×”×¨×™×™×
                                                    </h4>
                                                    <p class="discription font-size-12 font-weight-400">
                                                        ×¦×¤×•
                                                        ×‘×’×œ×¨×™×™×ª ×”×ª×ž×•× ×•×ª
                                                        ×©×œ
                                                        ×”×§×•×œ×§×¦×™×™×” ×”×ž×“×”×™×ž×” ×”×–××ª ×›××Ÿ ×‘×›×ª×‘×”
                                                    </p>
                                                    <span class="font-size-12 like_span">4
                                                        <i class="fa fa-heart"
                                                            aria-hidden="true"></i></span>
                                                    <div class="rating_price_div">
                                                        <p class="font-size-14 font-weight-600">
                                                            2,100 â‚ª
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
                                            <a href="" class="learn_more font-size-12 font-weight-400">×œ×¢×•×“
                                                ×›×ª×‘×•×ª ×‘×™×’×•×“
                                                ×•×”× ×¢×œ×”
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
                                                        ×§×•×œ×§×¦×™×™×ª ×§×™×¥ ×”×•×©×§×” ×‘×œ×™×“×¨
                                                        ××ª×ž×•×œ ××—×¨×™ ×”×¦×”×¨×™×™×
                                                    </h4>
                                                    <p class="font-size-12">×¦×¤×•
                                                        ×‘×’×œ×¨×™×™×ª ×”×ª×ž×•× ×•×ª ×©×œ
                                                        ×”×§×•×œ×§×¦×™×™×” ×”×ž×“×”×™×ž×” ×”×–××ª
                                                        ×›××Ÿ
                                                    </p>
                                                </a>
                                            </li>
                                            <li class="text-right">
                                                <a href="">
                                                    <h4 class="font-size-14">
                                                        ×§×•×œ×§×¦×™×™×ª ×§×™×¥ ×”×•×©×§×” ×‘×œ×™×“×¨
                                                        ××ª×ž×•×œ ××—×¨×™ ×”×¦×”×¨×™×™×
                                                    </h4>
                                                    <p class="font-size-12">×¦×¤×•
                                                        ×‘×’×œ×¨×™×™×ª ×”×ª×ž×•× ×•×ª ×©×œ
                                                        ×”×§×•×œ×§×¦×™×™×” ×”×ž×“×”×™×ž×” ×”×–××ª
                                                        ×›××Ÿ
                                                    </p>
                                                </a>
                                            </li>
                                            <li class="text-right">
                                                <a href="">
                                                    <h4 class="font-size-14">
                                                        ×§×•×œ×§×¦×™×™×ª ×§×™×¥ ×”×•×©×§×” ×‘×œ×™×“×¨
                                                        ××ª×ž×•×œ ××—×¨×™ ×”×¦×”×¨×™×™×
                                                    </h4>
                                                    <p class="font-size-12">×¦×¤×•
                                                        ×‘×’×œ×¨×™×™×ª ×”×ª×ž×•× ×•×ª ×©×œ
                                                        ×”×§×•×œ×§×¦×™×™×” ×”×ž×“×”×™×ž×” ×”×–××ª
                                                        ×›××Ÿ
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
                                                    ×§×•×œ×§×¦×™×™×ª ×§×™×¥ ×”×•×©×§×” ×‘×œ×™×“×¨
                                                    ××ª×ž×•×œ ××—×¨×™ ×”×¦×”×¨×™×™×
                                                </h4>
                                                <p class="font-size-12">×¦×¤×•
                                                    ×‘×’×œ×¨×™×™×ª ×”×ª×ž×•× ×•×ª ×©×œ ×”×§×•×œ×§×¦×™×™×”
                                                    ×”×ž×“×”×™×ž×” ×”×–××ª ×›××Ÿ ×‘×›×ª×‘×”
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
                                    הצטרפו למהפיכת הצרכנות המקומית של דוסיז צרכנות >>
                                </p>
                                <div class="btns d-flex mt-4">
                                    <a href="https://dosiz.co.il/landing-page/" class="btn btn_grey_out">הצטרפות
                                        לעסקים</a>
                                    <!-- data-toggle="modal" data-target="#enrollmentModal" -->
                                    <a data-toggle="modal" data-target="#enrollmentModal2" href="#"
                                        class="btn btn_orange ml-2">הרשמה לדוסיז</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="box px-3 d-flex align-items-center justify-content-center">
                            <img src="{{ asset('assets/img/mobile_component/footer_img.svg') }}" class="footer_Img"
                                alt="footer">
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
        var swiper1 = new Swiper(".product1", {
            slidesPerView: 2,
            loop: true,
            spaceBetween: 10,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });


        var swiper2 = new Swiper(".product2", {
            slidesPerView: 2,
            loop: true,
            spaceBetween: 10,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });


        var swiper3 = new Swiper(".product3", {
            slidesPerView: 2,
            loop: true,
            spaceBetween: 10,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });

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

        $('.removedDisable').removeClass('swiper-button-disabled');



        // console.log($('.example'))
        [...document.querySelectorAll('.example')].forEach(elem => {
            $(elem).countdown({
                date: elem.getAttribute('discount-time')
            }, function() {
                $(elem).parent().parent().parent().parent().addClass('d-none');
            });
        })
    </script>
@endsection
