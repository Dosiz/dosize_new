@extends('layout.brand_signup')
@section('title')
{{$brand_profile->brand_name ?? '' }}
@endsection
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/mobile-style.css') }}">
<link rel="stylesheet" href="{{asset('assets/css/desktop-css.css') }}">
<link rel="stylesheet" href="{{asset('assets/css/swiper.css') }}">
<link rel="stylesheet" href="{{asset('assets/css/thumb-slider.css') }}">
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
    .swiper-pagination.swiper-pagination-clickable{
        transform: translateY(-39px);
        right: 20px;
    }
    .swiper-pagination-bullet{
        margin: 0 4px;
    }

    #subscriber{
        display: flex;
        flex-direction: row-reverse;
        align-items: center;
        color: #212529
    }
    #subscriber span{
        color: #db1580
    } 

</style>
@endpush
@section('content') 
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-Q0VQ8NJD2C"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-Q0VQ8NJD2C');
</script>
<main>
    <div class="main-wrapper article_main_wrapper">
        
        <div class="article_banner">
            <div class="article_slider">
                <div class="slider_div">
                    <div class="multiple_articles swiper_article">
                        <div class="swiper-wrapper">
                            @if($blog->images != null)
                                <div class="swiper-slide">
                                    <img src="{{asset('blog/'.$blog->image)}}" alt=""
                                         class="img-fluid"style="width:580px;">
                                </div>
                            @foreach(json_decode($blog->images) as $all)
                            <div class="swiper-slide">
                                <img src="{{asset('blog/'.$all)}}" alt=""
                                    class="img-fluid"style="width:580px;">
                            </div>
                            @endforeach
                            @else
                            <div class="swiper-slide">
                                <img src="{{asset('blog/'.$blog->image)}}" alt=""
                                    class="img-fluid"style="width:580px;">
                            </div>
                            <div class="swiper-slide">
                                <img src="{{asset('blog/'.$blog->image)}}" alt=""
                                    class="img-fluid"style="width:580px;">
                            </div>
                            <div class="swiper-slide">
                                <img src="{{asset('blog/'.$blog->image)}}" alt=""
                                    class="img-fluid"style="width:580px;">
                            </div>
                            @endif

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
            <div class="aricle_detail">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <h5 class="article_category font-size-14"> {{$blog->category->name}} </h5>
                            <h2 class="article_title">{{$blog->title}}</h2>
                            {{-- <p class="article_description font-size-16">הילד שלכם רוצה סנדלים? רוצים לקנות
                                סנדלים לכל המשפחה ולצאת בזול? • מבצע חם במיוחד לקיץ: זוג סנדלים ב-99 ₪ ו-2 ב-159
                                ₪ בלבד • אל תחמיצו את ההזדמנות</p> --}}
                        </div>
                        <div class="col-lg-12" style="direction: ltr;">
                            <div class="city_shoe">
                                <img src="{{asset('brand_image/'.$blog->brandprofile->brand_image)}}" style="width: 39px;" alt=""
                                    class="img-fluid">
                                <p class="font-size-18">
                                    <a href="https://{{$blog->brandprofile->short_name ?? ''}}.arikliger.com/brand" >
                                        @php
                                            $user_name = \App\Models\User::where('id',$blog->brandprofile->id ?? '')->first();
                                        @endphp
                                        <span class="category" > {{\Illuminate\Support\Str::limit($user_name->name?? '',15)}} </span>
                                    </a>
                                    <span>{{ date('Y/m/d', strtotime($blog->created_at)) }}</span>
                                    {{-- <span>| כ”ג אייר פ”ב</span> --}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="article_content_main">
            <div class="article_detail">
                <div class="container-fluid article_mobile_bg_color">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="article_title" style="font-family: Ploni DL 1.1 AAA;"> {{$blog->sub_title}} </h4>
                            <div class="line"></div>
                            <div class="article_detail_para">
                                {!! $blog->description !!}
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="article_like">
                                <h4 class="font-size-18 font-weight-600">אהבתם את הכתבה? רוצים לא לפספס את
                                    התכנים שלנו? הרשמו כאן ווקבלו ישירות למייל את התוכן האיכותי של {{\Illuminate\Support\Str::limit($blog->brandprofile->brand_name?? '',15)}} >>>
                                </h4>
                            </div>
                        </div>
                       {{-- <img src="{{asset('blog/'.$blog->image)}}" alt="" class="img-fluid"style="width:580px; height:298px;"> --}}

                        <div class="col-lg-12">
                            <div class="multiple_shoe">
                                <ul>
                                    @php $tags = explode(",", $blog->tags); @endphp
                                    @foreach($tags as $tag)
                                    <li class="font-size-12">{{$tag}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @if(count($recommended_products) > 0)
            <div class="deals deal_two">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <h3 class="common_title">הכי מומלצים <img
                                    src="{{asset('assets/img/mobile_component/star.png') }}" alt=""
                                    class="img-fluid">
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="slider_div">
                    <div class="multiple_deals swiper">
                        <div class="swiper-wrapper">
                            @if(count($recommended_products) > 0)
                            @foreach($recommended_products as $recommended_product)
                            <div class="deals_box box_shahdow swiper-slide">
                                <a class="font-size-14 font-weight-700" href="{{route('article',$recommended_product->recommended_product->id ?? '')}}">
                                    <img src="{{asset('product/'.$recommended_product->recommended_product->image)}}" alt="" class="img-fluid"style="width:135px; height:107px;">
                                </a>

                                <div class="content_div">
                                    <a href="{{route('article',$recommended_product->recommended_product->id ?? '')}}" style="color: #212529 !important">
                                        <h4 class="title font-size-14 font-weight-700">
                                            {{$recommended_product->recommended_product->name}}
                                        </h4>
                                        <div class="rating_price_div">
                                            {{-- <p class="font-size-14 font-weight-300">{!! \Illuminate\Support\Str::limit($recomanded_blog->recomended_blog->description ?? '',40,'...') !!}</p> --}}

                                            <p class="font-size-14 font-weight-300">{!! substr($recommended_product->recommended_product->description ?? '', 0,  20) !!}</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
            @endif
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="stand_brand_sign_up_div">
                            <div class="stand_brand_message">
                                <img src="{{asset('brand_image/'.$blog->brandprofile->brand_image)}}" alt=""
                                    class="img-fluid" style="width:39px ; height: 38px;">

                                <a class="font-size-16" href="https://{{$blog->brandprofile->short_name ?? ''}}.arikliger.com/brand">לעמוד המותג</a>
                                @guest
                                <a class="font-size-16 enrollemnt_button" data-toggle="modal" data-target="#enrollmentModal2" href="" >שליחת הודעה</a>
                                @else
                                <a class="font-size-16" href="{{url('brand/messages?id='.$blog->brandprofile->user_id.'')}}">שליחת הודעה</a>
                                @endguest


                            </div>
                            <div class="sign_up_div">

                                @guest
                                    <a href="" id="" class="enrollemnt_button" data-toggle="modal" data-target="#enrollmentModal2" style="color: #212529 !important; display:flex; flex-direction:row-reverse;align-items:center">
                                    @if($chk_subscriber == null)
                                    <img src="{{asset('assets/img/mobile_component/sign_up_icon.png') }}" alt="" class="img-fluid new_subscriber">
                                    <img src="{{asset('assets/img/verfied.png') }}" alt="" class="img-fluid d-none subscribed">
                                    @else
                                    @php
                                        $chk_sub = \App\Models\Subscriber::where('brand_profile_id',$blog->brand_profile_id)->first();
                                    @endphp
                                    @if($chk_sub)
                                    <img src="{{asset('assets/img/verfied.png') }}" alt="" class="img-fluid">
                                    @else
                                    <img src="{{asset('assets/img/mobile_component/sign_up_icon.png') }}" alt="" class="img-fluid new_subscriber">
                                    <img src="{{asset('assets/img/verfied.png') }}" alt="" class="img-fluid d-none subscribed">
                                    @endif
                                    @endif
                                    <p class="font-size-16">הירשמו בקליק למועדון הצרכנות של <br>
                                    <span style="color: #db1580">{{\Illuminate\Support\Str::limit($blog->brandprofile->brand_name?? '',15)}}</span>
                                    ולא תפספסו שום דיל!</p>
                                    </a>
                                @else
                                    <a href="" id="subscriber">
                                    @if($chk_subscriber == null)
                                    <img src="{{asset('assets/img/mobile_component/sign_up_icon.png') }}" alt="" class="img-fluid new_subscriber">
                                    <img src="{{asset('assets/img/verfied.png') }}" alt="" class="img-fluid subscribed" style="display: none !important;">
                                    @else
                                    @php
                                        $chk_sub = \App\Models\Subscriber::where('brand_profile_id',$blog->brand_profile_id)->first();
                                    @endphp
                                    @if($chk_sub)
                                    <img src="{{asset('assets/img/verfied.png') }}" alt="" class="img-fluid">
                                    @else
                                    <img src="{{asset('assets/img/mobile_component/sign_up_icon.png') }}" alt="" class="img-fluid new_subscriber">
                                    <img src="{{asset('assets/img/verfied.png') }}" alt="" class="img-fluid d-none subscribed">
                                    @endif
                                    @endif
                                    <p class="font-size-16">הירשמו בקליק למועדון הצרכנות של <br>

                                    <input type="hidden" name="token" id="token" value="{{csrf_token() }}"/>
                                    <input type="hidden" name="email" id="email" value="{{Auth::user()->email }}" />
                                    <input type="hidden" id="brand_profile_id" value="{{$blog->brand_profile_id }}" />
                                    <span>{{\Illuminate\Support\Str::limit($blog->brandprofile->brand_name?? '',15)}}</span>
                                    ולא תפספסו שום דיל!</p>
                                    </a>
                                @endguest
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12" style="min-height: 300px; position: relative; display:flex;">
                        <div class="post_comment">
                            <form action="{{ route('store-blog-comment') }}" method="post" enctype="multipart/form-data" >
                                @csrf
                            <div class="total_comment">
                                <!-- <p>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </p> -->

                                <ul style="visibility: hidden">

                                </ul>
                                <p class="font-size-16">תגובות(<span class="blog_comment_count">{{count($blog_comments)}}</span> )<img
                                    src="{{asset('assets/img/mobile_component/comment.png') }}" alt=""
                                    class="img-fluid"></p>
                                </p>
                            </div>

                            <div class="formDiv">

                                    <input type="hidden" name="blog_id" class="blog_id_like" value="{{ $blog->id }}" />
                                    <input type="text" name="comment" id="comment" placeholder="התגובה שלך"
                                        class="text-right font-size-16 comment_input">
                                    <div class="comment_hearder" style="direction: initial">
                                        <button type="submit" class="font-size-16 cursor-pointer">פירסום תגובה</button>
                                        <div class="anonymous_text font-size-16">אנונימי <span
                                                class="checkBox">
                                                <input type="checkbox" name="name" id="approve">
                                                </span></div>
                                    </div>
                                    <span class="text-danger comment_valid" style="position:absolute; bottom:0px;"></span>
                                </form>
                            </div>
                            <div class="comment_list">
                                <ul class="new_comment_list">
                                    @if(count($blog_comments) > 0)
                                    @foreach($blog_comments as $comment)
                                    @if($comment->parent_id == null)
                                    <div>
                                        <li  class="align-items-center">
                                            @guest
                                            <a href="#" class="add_comment font-size-12 text-dark" style="visibility: hidden">הוספת תגובה</a>
                                            {{-- {{Auth::user()->hasRole('Brand')}} --}}
                                            @else
                                            @if(Auth::user()->hasRole('Brand') == 1)
                                            <a href="#" class="add_comment font-size-12 text-dark">הוספת תגובה</a>
                                            @else
                                            <a href="#" class="add_comment font-size-12 text-dark" style="visibility: hidden">הוספת תגובה</a>
                                            @endif
                                            @endguest
                                            <div class="user_detail">
                                                <h4 class="font-size-14"> {{$comment->name ?? $comment->user->name}}</h4>

                                                <p class="font-size-14">{{$comment->comment}}</p>
                                            </div>
                                        </li>
                                        <div class="formDiv replyForm">
                                            <form action="{{ route('store-blog-comment') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="blog_id" value="{{ $blog->id }}" />
                                                <input type="hidden" value="{{$blog->brand_profile_id }}" id="brand_profile_id" />
                                                <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
                                                <input type="text" name="comment" id="comment" placeholder="התגובה שלך"
                                                    class="text-right font-size-16">

                                                <div class="comment_hearder">
                                                    @guest
                                                    <button type="submit" class="font-size-16 enrollemnt_button cursor-pointer" data-toggle="modal" data-target="#enrollmentModal">פירסום תגובה</button>
                                                    @else
                                                    <button type="submit" class="font-size-16 cursor-pointer">פירסום תגובה</button>
                                                    @endguest
                                                    <div class="anonymous_text font-size-16">אנונימי <span
                                                            class="checkBox">
                                                            <input type="checkbox" name="name" id="approve">
                                                            </span></div>
                                                </div>
                                                <span class="text-danger comment_valid" style="position:absolute; bottom:0px;"></span>
                                            </form>
                                        </div>

                                    </div>
                                    @php $replies = App\Models\BlogComment::where('parent_id', $comment->id)->orderBy('id', 'DESC')->get(); @endphp
                                    @if(count($replies) > 0)
                                    @foreach($replies as $reply)
                                    <div style="width:490px; margin-left:20px;">
                                        <li>
                                            <a href="#" class="add_comment font-size-12 text-dark" style="visibility: hidden">הוספת תגובה</a>
                                            {{-- {{Auth::user()->hasRole('Brand')}} --}}
                                            <div class="user_detail" style="margin: 10px">
                                                <h4 class="font-size-14"> {{$reply->name ?? $reply->user->name}} </h4>
                                                <p class="font-size-14">{{$reply->comment}}</p>
                                            </div>
                                        </li>
                                    </div>
                                    @endforeach
                                    @endif
                                    @endif
                                    @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(count($recomanded_blogs) > 0)
        <div class="affordable_consumption spacing article_affordable_consumption">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 text-right">
                        <div
                            class="col-lg-12 d-flex flex-xl-row-reverse justify-content-between align-items-center text-right">
                            <h3 class="common_title">צרכנות משתלמת <img
                                    src="{{asset('assets/img/mobile_component/beg.png') }}" alt=""
                                    class="img-fluid"></h3>
                            <p class="d-none d-xl-block"><a href="#" class="text-dark">לכל הכתבות ></a></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="affordable_consumption_list d-flex multiple_afforable_consumption">
                            @if(count($recomanded_blogs) > 0)
                            @foreach($recomanded_blogs as $recomanded_blog)
                            <div class="affordable_consumption_box box_shahdow">
                                <a class="font-size-14 font-weight-700" href="{{route('article',$recomanded_blog->recomended_blog->id ?? '')}}">
                                    <img src="{{asset('blog/'.$recomanded_blog->recomended_blog->image)}}" alt="" class="img-fluid" style="width:131px; height:181px;">
                                </a>
                                <div class="content_div">
                                    <span class="category font-size-12 font-weight-400">{{\Illuminate\Support\Str::limit($blog->brandprofile->brand_name?? '',15)}} </span>
                                    <a class="font-size-14 font-weight-700" href="{{route('article',$recomanded_blog->recomended_blog->id ?? '')}}" style="color: #212529 !important">
                                    <h4 class="font-size-12 font-weight-700">
                                        {{$recomanded_blog->recomended_blog->title}}
                                    </h4>
                                    <p class="discription font-size-10 font-weight-400">
                                        {!! $recomanded_blog->recomended_blog->description ?? '' !!}
                                    </p>
                                    </a>
                                    {{-- <span class="font-size-12">4 <i class="fa fa-heart"
                                            aria-hidden="true"></i></span> --}}
                                </div>
                            </div>
                            @endforeach
                            @endif
                            <a href="{{route('all-blogs',['category_id'=>$category->id,'city_id'=>$blog->cities['0']->id]) }}" class="desktop_hide learn_more font-size-12 font-weight-400">לכל
                                הכתבות ></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- main footer -->
        <!-- main footer start from here -->
        
        <!-- main footer start end here -->
    </div>
    <div class="modal fade" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul>
                        @php
                            $shareable_links = Share::page( 'article_link')->facebook()->whatsapp()->twitter()->getRawLinks();
                        @endphp
                        <li>
                            <a target="_blank" class="productLink" href="mailto:">
                                <img src="{{asset('assets/img/mobile_component/email_icon.png') }}" alt=""
                                     class="img-fluid">
                            </a>
                        </li>
                        <li>
                            <a target="_blank" class="productLink" href="{{ $shareable_links['whatsapp'] }}">
                                <img src="{{asset('assets/img/mobile_component/whtsapp_icon.png') }}" alt=""
                                     class="img-fluid">
                            </a>
                        </li>
                        <li>
                            <a target="_blank" class="productLink" href="{{ $shareable_links['twitter'] }}">
                                <img src="{{asset('assets/img/mobile_component/twitter_icon.png') }}" alt=""
                                     class="img-fluid">
                            </a>
                        </li>
                        <li>
                            <a target="_blank" class="productLink" href="{{ $shareable_links['facebook'] }}">
                                <img src="{{asset('assets/img/mobile_component/facebook_icon.png') }}" alt=""
                                     class="img-fluid">
                            </a>
                        </li>
                    </ul>
                    <div class="copy_input">
                        <i class="fa fa-clone copy" aria-hidden="true" onclick="copyToClipboard()"></i>
                        <i class="fa fa-check checked d-none" aria-hidden="true" style="color:green;border:1px solid green; padding:4px; margin-top:-5px;margin-left:-5px;"></i>
                        <input type="text" name="copy_text" id="copy_text"
                            value="https://dossiz-vmnlvb/dfv.co.il" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
<!-- The Modal -->
  
@section('js')
{{-- <script src="{{asset('assets/js/swiper.min.js') }}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.8.4/swiper-bundle.min.js"></script>
<script src="{{asset('assets/js/script.js') }}"></script>
<script type="text/javascript">
    $("label").click(function(){
    // $(this).parent().find("label").css({"background-color": "#D8D8D8"});
    // $(this).css({"background-color": "#7ED321"});
    // $(this).nextAll().css({"background-color": "#7ED321"});
    $(this).prev().attr('checked','checked');
    $(this).parent().find("label").css({"color": "#D8D8D8"});
    $(this).css({"color": "#FEA73A"});
    $(this).nextAll().css({"color": "#FEA73A"});
  });

  function copyToClipboard() {
        document.getElementById("copy_text").select();
        document.execCommand('copy');
        $('.copy').toggleClass('d-none');
        $('.checked').toggleClass('d-none');
        // $('.checked').css({'color':'green','border':'1px solid green','padding':'4px'});
        // $('.checked').css('border', '1px solid green');
        setTimeout(() => {
            $('.copy').toggleClass('d-none');
            $('.checked').toggleClass('d-none');
        }, 5000);

    }

</script>
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

    // reply functionality
    $('.replyForm').fadeOut();
    $('.add_comment').click(function(e){
        e.preventDefault();
        $(this).parent().parent().children('.replyForm').fadeToggle();
    })

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

    $('.blog_like').click(function(e){
        e.preventDefault();
        var blog_id = $('.blog_id_like').val();
        $.ajax({
            type: "POST",
            url: "{{ route('store-blog-comment-like') }}",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                "_token": "{{ csrf_token() }}",
                blog_id:blog_id} ,
            cache: false,
            success: function (data) {
                console.table(data);
                if(data.success == 'Blog Like Removed')
                {
                let likeNum = Number($('.like_count').text())
                $('.like_count').text(likeNum-=1)
                }
                else if(data.success == 'Blog Like successfully')
                {
                let likeNum = Number($('.like_count').text())
                $('.like_count').text(likeNum+=1)
                }

            },
            error: function (data) {
                console.log(data);
            }
        });
    });

    $('.blog_bookmark').click(function(e){
        e.preventDefault();
        var blog_id = $('.blog_id_like').val();
        $.ajax({
            type: "POST",
            url: "{{ route('store-blog-bookmark') }}",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                "_token": "{{ csrf_token() }}",
                blog_id:blog_id} ,
            cache: false,
            success: function (data) {
                console.table(data);
                if(data.success == 'Blog Bookmark Removed')
                {
                let bookmarkNum = Number($('.bookmark_count').text())
                $('.bookmark_count').text(bookmarkNum-=1)
                }
                else if(data.success == 'Blog Bookmark Successfully')
                {
                let bookmarkNum = Number($('.bookmark_count').text())
                $('.bookmark_count').text(bookmarkNum+=1)
                }

            },
            error: function (data) {
                console.log(data);
            }
        });
    });

    $('#blog_comment').submit(function(e){
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "{{ route('store-blog-comment') }}",
            data: new FormData(this),
            datatype: "json",
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
                 console.table(data.success);
                // console.table(data.comment);
                if(data.success == 'Refesh') {
                    location.reload();
                }
                $('.new_comment_list').prepend(`<li>
                                        <a href="#" class="add_comment font-size-12 text-dark">הוספת תגובה</a>
                                        <div class="user_detail">
                                            <h4 class="font-size-14">${data.name} </h4>
                                            <p class="font-size-14">${data.comment}</p>
                                        </div>
                                    </li>`);

                $('.comment_input').val('');
                let commentNum = Number($('.blog_comment_count').text())
                $('.blog_comment_count').text(commentNum+=1)

                let commentsNum = Number($('.comment_count').text())
                $('.comment_count').text(commentsNum+=1)

                $('.close').click();

            },
            error: function (data) {
                if($('#comment').val() == ''){
                    $('.comment_valid').text(data.responseJSON.errors.comment);
                }
                else{
                    $('.comment_valid').text('');
                }
            }
        });
    });

    $('#subscriber').click(function(e){
        e.preventDefault();
        // const postFormData = {
        //     brand_profile_id : $('#brand_profile_id').val(),
        //     email     : $('#email').val(),
        //     // _token: "{{ csrf_token() }}"
        // };
        let brand_profile_id = $('#brand_profile_id').val();
        let email = $('#email').val();
        let _token   = $('meta[name="csrf-token"]').attr('content');
        // console.log(postFormData);
        $.ajax({
            type: "POST",
            url: "{{ route('store-subscriber') }}",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                email:email,
                brand_profile_id:brand_profile_id,
                _token: _token
            } ,
            datatype: "json",
            success: function (data) {
                 console.table(data.success);
                toastr.success(data.success);
                $('.new_subscriber').toggleClass('d-none');
                $('.subscribed').toggleClass('d-none');
                // console.table(data.comment);


            },
            error: function (data) {
                // toastr.warning(data);
                toastr.error("Already Subscribed");

            }
        });
    });

    //Generating short urls for social media sharing
    //By Assad Yaqoob
    $('#shareButton').click(function () {
        let url = "{{ url()->current() }}";
        let source = "{{ \App\Helpers\PointsHelper::Article }}";
        let _token   = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: "POST",
            url: "{{ url('getShortUrl') }}",
            data: {
                url:url,
                source:source,
                _token: _token
            } ,
            datatype: "json",
            success: function (shortUrl) {
                $(".productLink").each(function() {
                    var shareUrl = $( this ).attr('href');
                    let newUrl = shareUrl.replace('article_link',shortUrl);
                    $( this ).attr('href', newUrl);
                });

                $("#copy_text").val(shortUrl);
                $("#shareModal").modal();
            },
            error: function (data) {
                window.location.href;
            }
        });
    });
</script>
@endsection
