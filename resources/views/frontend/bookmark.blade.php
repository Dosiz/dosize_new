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
        @if(count($bookmarks) > 0)
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
                        @if(count($bookmarks) > 0)
                            @foreach($bookmarks as $key => $bookmark)
                            <div class="container-fluid">
                                <table class="table text-center">
                                    <thead>
                                    <tr>
                                        <th scope="col" width="10%">#</th>
                                        <th scope="col" width="70%">Name</th>
                                        <th scope="col" width="20%">Type</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>
                                            @if($bookmark->name == 'Article')
                                                <a href="{{route('article',$bookmark->blog_id)}}" style="color:#212529"> {{$bookmark->blog->title}} </a>
                                            @else
                                                <a href="{{route('article',$bookmark->blog_id)}}" style="color:#212529"> {{$bookmark->blog->title}} </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($bookmark->name == 'Article')
                                            <a href="{{route('article',$bookmark->blog_id)}}" style="color:#212529"> {{$bookmark->name}}</a>
                                            @else
                                            <a href="{{route('article',$bookmark->blog_id)}}" style="color:#212529">{{$bookmark->name}}</a>
                                            @endif
                                        </td>
                                    </tr>
                                    </tbody>
                              </table>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if(count($likes) > 0)
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
                        @if(count($likes) > 0)
                        {{dd($likes)}}
                            @foreach($likes as $like)
                            <div class="container-fluid">
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col" width="10%">#</th>
                                            <th scope="col" width="70%">Name</th>
                                            <th scope="col" width="20%">Type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>
                                                @if($like->name == 'Article')
                                                    <a href="{{route('article',['blog_id' => $like->blog_id])}}" style="color:#212529"> {{$like->blog->title}} </a>
                                                @else
                                                    <a href="{{route('article',$like->blog_id)}}" style="color:#212529"> {{$like->blog->title}} </a>
                                                @endif
                                            </td>
                                            <td>
                                                @if($like->name == 'Article')
                                                <a href="{{route('article',$like->blog_id)}}" style="color:#212529"> {{$like->name}}</a>
                                                @else
                                                <a href="{{route('article',$like->blog_id)}}" style="color:#212529">{{$like->name}}</a>
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endif
        
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


</script>
@endsection