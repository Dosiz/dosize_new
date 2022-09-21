@extends('layout.brand_signup')
@section('title')
פרופיל המותג
@endsection
@push('styles')
@endpush
@section('content') 
<section id="articleBanner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <h2> המוצרים שלנו </h2>
            </div>
        </div>
    </div>
</section>
<div class="lineDiv">
    <img src="{{asset('assets/img/user/line 2.png')}}" alt="">
</div>
<section id="multiArticle" style="padding-bottom: 50px;">
    <div class="d-lg-flex justify-content-start container-fluid" style="direction: rtl !important">
        <form action="{{ route('filter-brand-product') }}" method="post">
            <input type="hidden" name="brand_profile_id" value="{{$brand_profile->id}}" />
            @csrf
            <div class="d-lg-flex" style="text-align:right;">
                <strong style="margin-top: 10px;">סנן לפי קטגוריה:</strong>
                <div class="inputDiv d-flex flex-column mb-4 mr-2">
                    {{-- <input type="text" class="form-control" placeholder="Sub Category" name="sub_category" id="sub_category" > --}}
                    
                    <select class="form-control" name="sub_category" id="sub_category">
                        <option value="">Select Sub Category</option>
                        @foreach($sub_categories as $sub_category)
                        <option value="{{$sub_category->id}}" @if(isset($sub_category_id)){{ $sub_category_id ?? '' == $sub_category->id ? 'selected' : '' }} @endif>{{$sub_category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="inputDiv d-flex flex-column mb-4 mr-2">
                    <button type="submit" class="btn" style="background-color: #db1580 !important; color:#fff !important;">סנן</button>
                </div>
            </div>
        </form>
        <form action="{{ route('filter-brand-product') }}" method="post">
            <input type="hidden" name="brand_profile_id" value="{{$brand_profile->id}}" />
            @csrf
            <div class="container-fluid">
                <div class="d-lg-flex" >
                    <div class="inputDiv d-flex flex-column mb-4">
                        <input type="number" class="form-control" placeholder="סנן לפי מחיר" value="{{$price ?? ''}}" name="price" id="price" >
                    </div>
                    <div class="inputDiv d-flex flex-column mb-4 mr-2">
                        <button type="submit" class="btn" style="background-color: #db1580 !important; color:#fff !important;">סנן</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="articleCommon">
        <div class="container-fluid">
            <div class="multiDiv">
                <div class="row">
                    @if($products)
                    @foreach($products as $product)
                    <div class="col-md-3">
                        <div class="articleCard">
                            {{-- <div class="badgeDiv">
                                <img src="{{asset('assets/img/user/badge.png')}}" alt="">
                                <span class="whishlistText">
                                    @php $likes = App\Models\Like::where('product_id', $product->id)->get(); @endphp
                                    <span>{{count($likes ?? '0')}}</span>
                                    <img src="{{asset('assets/img/user/heart.png')}}" alt="">
                                </span>
                            </div> --}}
                            <a href="{{url('brand_product/' .$product->id)}}" >
                        <img src="{{asset('product/'.$product->image ?? '')}}" style="height:165px;" alt="" class="img-fluid">
                            </a>
                            <div class="articleInfo">
                                {{-- <div class="dateInput">
                                    <span style="border: none;color: #747474;font-size: 12px;font-family: PloniRegular;">{{ date('Y/m/d', strtotime($product->created_at)) }}</span>
                                </div> --}}
                                <a href="{{url('brand_product/'.$product->id)}}" ><h3> {{$product->name}} </h3></a>
                                {{-- <p>{!! \Illuminate\Support\Str::limit($product->description, 130, $end='...') !!} </p> --}}
                                <div class="rating_price_div" style="display:flex;align-items:center; justify-content:space-between; flex-direction:row-reverse;">
                                    @if($product->discount_price != null)
                                    <div class="d-flex ">
                                        <p style="text-decoration: line-through">₪ {{$product->price}}</p>
                                        <p class="price mr-2">
                                            <a href="{{url('brand_product/' .$product->id)}}">
                                                ₪ {{$product->discount_price}}
                                            </a>
                                        </p>        
                                    </div>
                                    @else
                                    <br>
                                    <a href="{{url('brand_product/'.$product->id)}}" style="color:#212529">
                                    <p class="price">₪ {{$product->price}}</p>
                                    </a>
                                    @endif
                                    <a href="{{url('brand_product/'.$product->id)}}" style="color:#212529">
                                        <p style="text-decoration: none"><i class="fa fa-star" style="color: #ff9529;"></i> {{$product->product_comment->avg('rating') ?? 'no rating'}} </p>
                                    </a>
                            </div>
                                <div class="readMore">
                                    <p style="text-align: left">
                                        <a class="btn btn-success" style="background-color: #db1580 !important; color: #fff !important; border: 1px solid #db1580 !important" href="{{url('brand_product/'.$product->id)}}">דקרא עוד<i class="fa fa-angle-double-left" aria-hidden="true"></i></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <p>No Product Created Yet</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="row mt-80">
        <div class="col-12 text-center">
            <button class="commonBtn"> טען עוד </button>
        </div>
    </div> --}}
</section>

@endsection
<!-- The Modal -->
  
@section('js')
<script>


</script>
@endsection
