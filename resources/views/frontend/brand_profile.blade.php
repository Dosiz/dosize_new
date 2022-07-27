@extends('layout.master')
@section('title')
Dosize
@endsection
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/mobile-style.css') }}">
<link rel="stylesheet" href="{{asset('assets/css/desktop-css.css') }}">
<link rel="stylesheet" href="{{asset('assets/css/swiper.css') }}">
<link rel="stylesheet" href="{{asset('assets/css/impact/style.css') }}">
<style>
.contactFormDiv .inputdiv input, .contactFormDiv .inputdiv textarea {
    width: 100%;
    color: #7B7B7B;
    background-color: #fff;
    padding: 18px;
    box-shadow: 0px 1px 10px rgb(0 0 0 / 10%);
    border: none;
    text-align: right;
    font-size: 16px;
    font-family: PloniRegular;
}
</style>
@endpush
@section('content')

<main>
    <div class="main-wrapper mr-auto">
        <div class="categories spacing">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="swiper myCategorySlider">
                            <div class="swiper-wrapper">
                                
                                @if(count($categories) > 0)
                                
                                @foreach($categories as $key=>$category)
                              
                                <div class="category_box swiper-slide">
                       
                                    <div class="img_box box_shahdow">
                                        <img src="{{asset('category/'.$category->image)}}" alt="" class="img-fluid" style="width:28px width:28px;">
                                    </div>
                                    <p class="font-weight-600 font-size-12"> {{$category->name}}</p>
                                </div>
                                @endforeach
                                @endif


                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="line spacing" style="display: none;"></div>
        <div class="affordable_consumption spacing">
            <div class="container-fluid">
                <div class="row">
                    
                    <div class="col-md-7">
                        <div class="brandMainIntro">
                            {{-- <h4 class="commonTitleText">{{$brand_profile->category->name ?? 'יתיללכ הריקס  '}} </h4> --}}
                             <h1>{{$brand_profile->brand_name ?? ''}}</h1>
                            {{-- <h1>{{$brand_profile->title ?? ''}}</h1> --}}
                            <p>{{ $brand_profile->description ?? '' }}</p>
                        </div>
                    </div>
                    <div class="col-md-5 text-left">
                        <div class="brandMainImg">
                            <img src="{{asset('brand_image/'.$brand_profile->brand_image)}}" alt="" class="img-fluid"> 
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="line spacing" style="display: none;"></div>
        <div class="promotion spacing">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 text-right">
                        <h3 class="common_title">המוצרים שלנו <img
                                src="{{ asset('assets/img/mobile_component/percentage_icon.png') }}" alt=""
                                class="img-fluid">
                        </h3>
                    </div>
                </div>
            </div>
            <div class="slider_div">
                <div class="multiple_promotion swiper">
                    <div class="swiper-wrapper">    
                        @if(count($brand_products) > 0)
                            @foreach($brand_products as $product)
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
                                        @if($product->discount_price)
                                        <span class="font-size-14 font-weight-700">{{ number_format((( $product->discount_price / $product->price ) * 100),1) }} %</span>
                                        @endif
                                    </div>
                                    <div class="promotion_content">
                                        
                                        <a class="font-size-14 font-weight-700" href="{{route('product',$product->id)}}">
                                            <p class="promotion_title font-size-14 font-weight-700 text-right"  style="color: #212529 !important;">
                                                {{$product->name}}
                                            </p>
                                        </a>
                                        <div class="rating_price_div">
                                            <a href="{{route('product',$product->id)}}">
                                            
                                            @if($product->discount_price)
                                            <p class="font-size-14 font-weight-600 text-dark">{{$product->discount_price}} ₪ <span
                                                    class="font-size-12 font-weight-400 text-dark"><del>{{$product->price ?? '00'}} ₪ </del></span>
                                            </p>
                                            @else
                                            <p class="font-size-14 font-weight-600 text-dark">{{$product->price}} ₪ 
                                            </p>
                                            @endif
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="line spacing" style="display: none;"></div>
            <div class="container-flui">
                <!-- <div class="row">
                    <div class="col-12">
                        <h2>מחכים לשמוע ממך </h2>
                    </div>
                </div> -->
                <div class="contactInfoDiv container">
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <div class="commonContactDiv bg-white p-2 d-flex align-items-center text-right">
                                <div class="iconDiv ml-2">
                                    <img src="{{asset('assets/img/user/map.svg')}}" alt="" class="img-fluid">
                                </div>
                                <div class="infoDiv">
                                    <h5>כתובתינו: </h5>
                                    <p>{{$brand_profile->address ?? ''}}</p>
                                    <span>בקר אותנו</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 mb-3">
                            <div class="commonContactDiv bg-white p-2 d-flex align-items-center text-right">
                                <div class="iconDiv ml-2">
                                    <a href='tel:{{$brand_profile->phone}}'><img src="{{asset('assets/img/user/call.svg')}}" alt="" id="for_phone" class="img-fluid"></a>
                                </div>
                                <div class="infoDiv">
                                    <h5>תתקשרו אלינו: </h5>
                                    <a href='tel:{{$brand_profile->phone}}'><p>{{$brand_profile->phone ?? ''}}</p></a>
                                    <span>זמינים לכל שאלה </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 mb-2">
                            <div class="commonContactDiv p-2 bg-white d-flex align-items-center text-right">
                                <div class="iconDiv ml-2">
                                    <a href='mailto:{{$brand_profile->business_email}}'><img src="{{asset('assets/img/user/message.svg')}}" alt="" id="for_email" class="img-fluid"></a>
                                </div>
                                <div class="infoDiv">
                                    <h5>שלח לנו הודעה:</h5>
                                    <a href='mailto:{{$brand_profile->business_email}}'><p>{{$brand_profile->user->email ?? ''}}</p></a>
                                    <span>מחכים לשמוע ממך </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5 mb-3">
                            <div class="commonContactDiv bg-white p-2 d-flex align-items-center text-right">
                                <div class="iconDiv ml-2">
                                    <img src="{{asset('assets/img/user/message.svg')}}" alt="" class="img-fluid">
                                </div>
                                <div class="infoDiv">
                                    <h5>אתר האינטרנט: </h5>
                                    <p><a target="_blank" href="Https://Dosizlocal.com">דוסיז צרכנת ויזמות</a></p>
                                    <span>בקר אותנו</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><br>
                @if(isset($brand_timming))
                <div class="col-12">
                    <h2>{{$brand_profile->name}} שעת פתיחה וסגירה: </h2>
                </div>
                <div class="contactInfoDiv">
                    <div class="row">
                        <div class="col-12">
                            <div class="commonContactDiv">
                                <div class="iconDiv">
                                </div>
                                <div class="infoDiv">
                                    <div class="infoDetail">
                                        <h5>יום ראשון: </h5>
                                        <p style="font-size:15px;">שעת פתיחה: {{ date("g:i a", strtotime($brand_timming->sat_thu_mor_open['sun_mor_open'] ))}}
                                        @if(isset($time->sat_thu_noon_open['sun_mor_close']))
                                         שעת סגירה לפנה''צ:{{ date("g:i a", strtotime( $brand_timming->sat_thu_mor_close['sun_mor_close'] ))}}
                                        @endif
                                        @if(isset($time->sat_thu_noon_open['sun_noon_open']))
                                        שעת פתיחה אחה''צ:{{ date("g:i a", strtotime($brand_timming->sat_thu_noon_open['sun_noon_open']))}}
                                        @endif
                                        שעת סגירה: {{ date("g:i a", strtotime($brand_timming->sat_thu_noon_close['sun_noon_close'] ))}}</p>
                                    </div>
                                    <div class="infoDetail">
                                        <h5>יום שני: </h5>
                                        <p style="font-size:15px;">שעת פתיחה:  : {{ date("g:i a", strtotime($brand_timming->sat_thu_mor_open['mon_mor_open'] ))}}
                                        @if(isset($time->sat_thu_noon_open['mon_mor_close']))
                                        שת סגירה לפנה''צ: {{ date("g:i a", strtotime( $brand_timming->sat_thu_mor_close['mon_mor_close'] ))}}
                                        @endif
                                        @if(isset($time->sat_thu_noon_open['mon_noon_open']))
                                        שעת פתיחה אחה''צ: {{ date("g:i a", strtotime($brand_timming->sat_thu_noon_open['mon_noon_open']))}}
                                        @endif
                                        שעת סגירה: {{ date("g:i a", strtotime($brand_timming->sat_thu_noon_close['mon_noon_close'] ))}}</p>
                                    </div>
                                    <div class="infoDetail">
                                        <h5>יום שלישי: </h5>
                                        <p style="font-size:15px;">שעת פתיחה: {{ date("g:i a", strtotime($brand_timming->sat_thu_mor_open['wed_mor_open'] ))}}
                                        @if(isset($time->sat_thu_noon_open['tue_mor_close']))
                                        שעת סגירה לפנה''צ: {{ date("g:i a", strtotime( $brand_timming->sat_thu_mor_close['tue_mor_close'] ))}}
                                        @endif
                                        @if(isset($time->sat_thu_noon_open['tue_noon_open']))
                                        שעת פתיחה אחה''צ: {{ date("g:i a", strtotime($brand_timming->sat_thu_noon_open['tue_noon_open']))}}
                                        @endif
                                        שעת סגירה: {{ date("g:i a", strtotime($brand_timming->sat_thu_noon_close['wed_noon_close'] ))}}</p>
                                    </div>
                                    <div class="infoDetail">
                                        <h5>יום רביעי: </h5>
                                        <p style="font-size:15px;">שעת פתיחה: {{ date("g:i a", strtotime($brand_timming->sat_thu_mor_open['wed_mor_open'] ))}}
                                        @if(isset($time->sat_thu_noon_open['wed_mor_close']))
                                        שעת סגירה לפנה''צ: {{ date("g:i a", strtotime( $brand_timming->sat_thu_mor_close['wed_mor_close'] ))}}
                                        @endif
                                        @if(isset($time->sat_thu_noon_open['wed_noon_open']))
                                        שעת פתיחה אחה''צ: {{ date("g:i a", strtotime($brand_timming->sat_thu_noon_open['wed_noon_open']))}}
                                        @endif
                                        שעת סגירה: {{ date("g:i a", strtotime($brand_timming->sat_thu_noon_close['wed_noon_close'] ))}}</p>
                                    </div>
                                    <div class="infoDetail">
                                        <h5>יום חמישי: </h5>
                                        <p style="font-size:15px;">שעת פתיחה: {{ date("g:i a", strtotime($brand_timming->sat_thu_mor_open['thu_mor_open'] ))}}
                                        @if(isset($time->sat_thu_noon_open['thu_mor_close']))
                                        שעת סגירה לפנה''צ: {{ date("g:i a", strtotime( $brand_timming->sat_thu_mor_close['thu_mor_close'] ))}}
                                        @endif
                                        @if(isset($time->sat_thu_noon_open['thu_noon_open']))
                                        שעת פתיחה אחה''צ: {{ date("g:i a", strtotime($brand_timming->sat_thu_noon_open['thu_noon_open']))}}
                                        @endif
                                        שעת סגירה: {{ date("g:i a", strtotime($brand_timming->sat_thu_noon_close['thu_noon_close'] ))}}</p>
                                    </div>
                                    <div class="infoDetail">
                                        <h5>יום שישי: </h5>
                                        <p style="font-size:15px;">שעת פתיחה: {{ date("g:i a", strtotime($brand_timming->friday_open)) }}
                                         שעת סגירה: {{ date("g:i a", strtotime($brand_timming->friday_close)) }}</p>
                                     </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <div class="container-flui">
                    <div class="contactFormDiv">
                        <div class="row mx-0 align-items-center">
                            <div class="col-md-7">
                                <div class="formDiv">
                                    <h3 class="text-right mb-2">צור איתנו קשר </h3>
                                    <form action="{{ route('contact_us.store') }}" method="post" >
                                        @csrf
                                        <div class="d-flex">
                                            <div class="inputdiv ml-3">
                                                <input type="text" name="f_name" id="f_name" value="" placeholder="שם">
                                                <input type="hidden" name="id" id="id" value="{{$brand_profile->id}}" placeholder="שם">
                                                <div style="color:red;">{{$errors->first('f_name')}}</div> <br>
                                            </div>
                                            <div class="inputdiv ml-3">
                                                <input type="text" name="l_name" id="l_name" value="" placeholder="נושא">
                                                <div style="color:red;">{{$errors->first('l_name')}}</div> <br>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="inputdiv ml-3">
                                                <input type="email" name="email" id="email" value="" placeholder="אימייל">
                                                <div style="color:red;">{{$errors->first('email')}}</div> <br>
                                            </div>
                                            <div class="inputdiv ml-3">
                                                <input type="number" name="phone" id="phone" value="" placeholder="מספר טלפון">
                                                <div style="color:red;">{{$errors->first('phone')}}</div> <br>
                                            </div>
                                        </div>
                                        <div class="inputdiv" style="width: 100%; margin: 18px 0px 0px;">
                                                <textarea name="subject" id="subject" cols="30" rows="10" placeholder="תוכן ההודעה "></textarea>
                                            </div>
                                            <div class="d-flex jutify-content-end mt-2">
                                                <button style="submit" class="commonBtn" style="background-color:#30e84f !important;">שלח</button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="imgDiv">
                                    <img src="{{asset('assets/img/user/contactUs.svg')}}" alt="">
                                </div>
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
                                    דוסיז משפט הנעה על דוסיז >>
                                </p>
                                <div class="btns d-flex mt-4">
                                    <a href="#" class="btn btn_grey_out">הצטרפות לעסקים</a>
                                    <a href="#" class="btn btn_orange ml-2">הרשמה לדוסיז</a>
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
                window.location.href="/dosiz/public";
                 
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
                window.location.href="/dosiz/public/dashboard/dashboard";
                 
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


</script>
@endsection