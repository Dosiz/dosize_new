<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dosize | Home</title>
    <!-- bootstrap 5 CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- font awesome 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

    <!-- custom stylesheet -->
    <link rel="stylesheet" href="{{asset('static/css/main.css') }}">
    <link rel="stylesheet" href="{{asset('static/css/media.css') }}">

</head>
<style>
    
    /************* Enrollemnt - Modal - Css styling ************/
    
    /* .enrollmentModel .modal-dialog {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        width: 100%;
        max-width: 90%;
        height: 80%;
        overflow: auto;
    } */
    .enrollmentModel .formDiv button {
        width: 100%;
        background-color: #db1580;
        color: #fff;
        font-family: ploniBold;
        padding: 15px 0px;
        border-radius: 10px;
        border: none;
    }
    .enrollmentModel .modal-content {
        border-radius: 20px;
        height: 100%;
        overflow: auto;
    }
    
    .enrollmentModel .modal-title {
        text-align: center;
        width: 100%;
        font-size: 30px;
        font-family: ploniBold;
        background: linear-gradient(267.72deg, #DB1580 16.93%, #F5A41A 87.34%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    
    .enrollmentModel .modal-header button {
        position: absolute;
        right: 25px;
        top: 25px;
        padding: 6px 9px;
        border-radius: 100%;
        background: #353039;
        opacity: 1;
        color: #fff;
        font-size: 14px;
    }
    
    .enrollmentModel .formDiv .inputDiv {
        text-align: right;
        margin-bottom: 20px;
    }
    
    .enrollmentModel .formDiv .inputDiv label {
        font-family: ploniBold;
    }
    
    .enrollmentModel .formDiv .inputDiv input,
    .enrollmentModel .formDiv .inputDiv select {
        width: 100%;
        background: #e7e7e7;
        border: none;
        padding: 10px;
        text-align: right;
        font-family: ploniRegular;
        font-size: 14px;
    }
    
    .enrollmentModel .formDiv .inputDiv .password_div {
        position: relative;
    }
    
    .enrollmentModel .formDiv .inputDiv .password_div i {
        position: absolute;
        left: 10px;
        top: 10px;
    }
    
    .enrollmentModel .formDiv .checkBox_div {
        direction: rtl;
        text-align: right;
        margin-bottom: 15px;
    }
    
    .enrollmentModel .formDiv .checkBox_div label {
        font-family: ploniRegular;
    }
    
    .enrollmentModel .formDiv .checkBox_div label a {
        color: var(--categoryTextColor);
        text-decoration: underline;
    }
    
    .enrollmentModel .formDiv button {
        width: 100%;
        background-color: #db1580;
        color: #fff;
        font-family: ploniBold;
        padding: 15px 0px;
        border-radius: 10px;
        border: none;
    }

    .btn-link {
        font-weight: 400;
        color: #007bff;
        background-color: transparent;
    }
    
    .enrollmentModel .signup_btn {
        display: flex;
        justify-content: center;
    }
    
    .enrollmentModel .signup_btn a {
        display: block;
        border: 1px solid #C4C4C4;
        border-radius: 10px;
        padding: 10px;
        margin: 0px 6px;
    }
    
    .enrollmentModel .sign_up_with {
        margin-top: 30px;
    }
    
    .enrollmentModel .sign_up_with h6 {
        margin-bottom: 15px;
    }
    
    .enrollmentModel .formDiv .checkBox_div input[type="checkbox"]:checked+label::after {
        content: '';
        position: absolute;
        width: 10px;
        height: 6px;
        background: rgba(0, 0, 0, 0);
        top: 9px;
        right: 3px;
        border: 2px solid var(--categoryTextColor);
        border-top: none;
        border-right: none;
        -webkit-transform: rotate(-45deg);
        -moz-transform: rotate(-45deg);
        -o-transform: rotate(-45deg);
        -ms-transform: rotate(-45deg);
        transform: rotate(-45deg);
    }
    
    .enrollmentModel .formDiv .checkBox_div input[type="checkbox"] {
        line-height: 2.1ex;
    }
    
    .enrollmentModel .formDiv .checkBox_div input[type="radio"],
    .enrollmentModel .formDiv .checkBox_div input[type="checkbox"] {
        accent-color: #DB1580;
    }
    
    .enrollmentModel .formDiv .checkBox_div input[type="checkbox"]+label {
        position: relative;
        overflow: hidden;
        cursor: pointer;
    }
    
    .enrollmentModel .formDiv .checkBox_div input[type="checkbox"]+label::before {
        content: "";
        display: inline-block;
        vertical-align: -25%;
        height: 2ex;
        width: 2ex;
        background-color: #F6F6F6;
        border-radius: 4px;
        margin-left: 0.5em;
        top: -2px;
        position: relative;
    }
    </style>
<body>

    <nav class="d-flex justify-content-between">
        <a href="#" class="logo">
            <img src="{{asset('static/img/logo.png') }}" alt="logo">
        </a>
        <div class="btns">
            @if(! isset(Auth::user()->name))
            <a href="#" class="btn btn_outline me-2" data-bs-toggle="modal" data-bs-target="#model1">
                הרשמה
            </a>
            <a href="#" class="btn btn_orange me-2"  data-bs-toggle="modal" data-bs-target="#modal2">
                התחברות
            </a>
            @else
                @if(Auth::user()->hasRole('User'))
                    {{-- <p>{{Auth::user()->name }} </p> --}}
                    @php
                        $user = \App\Models\User::with('city')->where('id',Auth::user()->id)->first();
                    @endphp
                    <a href="https://{{$user->city->short_name}}.arikliger.com" class="btn btn_orange me-2" style="width: 200px !important">
                        {{Auth::user()->name }}  לעבור לדף העיר
                    </a>
                @else
                <a class="enrollemnt_button" href="{{route('dashboard')}}"> לוּחַ מַחווָנִים </a>
                @endif
            @endif
            
    </nav>

    <div class="main_content">
        <div class="row">
            <div class="col-md-4 col-lg-3">
                <div class="side_menu">
                    <a href="#" class="menu_item item1 active d-flex align-items-center">
                        <div class="icon">
                            <svg width="24" height="26" viewBox="0 0 24 26" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.9451 1.31541L1.75464 12.2898V24.8319H9.59346V18.5608H14.2968V24.8319H22.1356V12.2898L11.9451 1.31541Z"
                                    stroke="#353039" stroke-width="1.76374" stroke-miterlimit="10"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <span>ראשי</span>
                    </a>
                    <a href="#" class="menu_item item2 d-flex align-items-center">
                        <div class="icon">
                            <svg width="27" height="26" viewBox="0 0 27 26" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M18.0807 18.2023C19.3794 18.2023 20.4323 17.1494 20.4323 15.8507C20.4323 14.5519 19.3794 13.499 18.0807 13.499C16.7819 13.499 15.729 14.5519 15.729 15.8507C15.729 17.1494 16.7819 18.2023 18.0807 18.2023Z"
                                    stroke="#353039" stroke-width="1.76374" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M1.61914 4.09232V21.3377C1.61914 22.1693 1.94949 22.9669 2.53752 23.5549C3.12554 24.1429 3.92308 24.4733 4.75467 24.4733H25.1356V7.22785H4.75467C3.92308 7.22785 3.12554 6.8975 2.53752 6.30947C1.94949 5.72145 1.61914 4.92391 1.61914 4.09232V4.09232ZM1.61914 4.09232C1.61914 3.26072 1.94949 2.46319 2.53752 1.87516C3.12554 1.28714 3.92308 0.956787 4.75467 0.956787H18.8646V4.09232"
                                    stroke="#353039" stroke-width="1.76374" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>

                        </div>
                        <span>הארנק</span>
                    </a>
                    <a href="#" class="menu_item item3 d-flex align-items-center">
                        <div class="icon">
                            <svg width="27" height="26" viewBox="0 0 27 26" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M21.2163 1.59807H5.53861L1.6192 8.65301C1.6192 10.8181 3.37353 12.5724 5.53861 12.5724C7.7037 12.5724 9.45803 10.8181 9.45803 8.65301C9.45803 10.8181 11.2124 12.5724 13.3774 12.5724C15.5425 12.5724 17.2969 10.8181 17.2969 8.65301C17.2969 10.8181 19.0512 12.5724 21.2163 12.5724C23.3813 12.5724 25.1357 10.8181 25.1357 8.65301L21.2163 1.59807Z"
                                    stroke="#353039" stroke-width="1.76374" stroke-miterlimit="10"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M22.0001 15.708V25.1145H4.7547V15.708" stroke="#353039" stroke-width="1.76374"
                                    stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M11.0258 25.1145V18.8434H15.7291V25.1145" stroke="#353039"
                                    stroke-width="1.76374" stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>

                        </div>
                        <span>צרכנות</span>
                    </a>
                    <a href="#" class="menu_item item4 d-flex align-items-center">
                        <div class="icon">
                            <svg width="27" height="30" viewBox="0 0 27 30" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M17.9636 10.2045V5.7219C17.9636 3.24574 15.9572 1.23935 13.481 1.23935C11.0049 1.23935 8.99847 3.24574 8.99847 5.7219V10.2045"
                                    stroke="#353039" stroke-width="1.76374" stroke-miterlimit="10"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M25.1357 28.1346H1.82642L3.61944 10.2044H23.3427L25.1357 28.1346Z"
                                    stroke="#353039" stroke-width="1.76374" stroke-miterlimit="10"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                        </div>
                        <span>כל הכתבות</span>
                    </a>
                    <hr class="my-5 hidemobile">
                    <div class="d-none d-lg-block hidemobile">
                        <a href="#" class="menu_item item5 d-flex align-items-center">
                            <div class="icon">
                                <svg width="23" height="26" viewBox="0 0 23 26" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5.88858 6.78913C5.88858 3.79189 8.3273 1.35317 11.3245 1.35317C14.3218 1.35317 16.7605 3.79189 16.7605 6.78913V8.36859C16.7605 11.3658 14.3218 13.8046 11.3245 13.8046C8.3273 13.8046 5.88858 11.3658 5.88858 8.36859V6.78913Z"
                                        stroke="#353039" stroke-width="1.76374" />
                                    <path
                                        d="M11.3245 18.7272C13.8189 18.7272 16.1019 17.8332 17.8872 16.3631C20.1442 17.2491 21.4988 18.9615 21.4988 21.0043V24.8608H1.15012V21.0043C1.15012 18.9615 2.50473 17.2491 4.76174 16.3631C6.547 17.8332 8.83 18.7272 11.3245 18.7272Z"
                                        stroke="#353039" stroke-width="1.76374" />
                                </svg>

                            </div>
                            <span>איזור אישי</span>
                        </a>
                        <a href="#" class="menu_item item6 d-flex align-items-center">
                            <div class="icon">
                                <svg width="20" height="27" viewBox="0 0 20 27" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1.13519 25.1205L9.7579 18.8494L18.3806 25.1205V3.95568C18.3806 3.33199 18.1328 2.73384 17.6918 2.29282C17.2508 1.8518 16.6527 1.60403 16.029 1.60403H3.48684C2.86314 1.60403 2.26499 1.8518 1.82397 2.29282C1.38296 2.73384 1.13519 3.33199 1.13519 3.95568V25.1205Z"
                                        stroke="#212121" stroke-width="1.76374" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>

                            </div>
                            <span>שמורים</span>
                        </a>
                        <a href="#" class="menu_item item7 d-flex align-items-center">
                            <div class="icon">
                                <svg width="26" height="27" viewBox="0 0 26 27" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.121 19.0253H15.8436L15.6161 19.1842L7.7433 24.6827V19.9072V19.0253H6.86143H2.23162C1.90499 19.0253 1.57022 18.735 1.57022 18.2905V2.12288C1.57022 1.67836 1.90499 1.38799 2.23162 1.38799H23.8374C24.164 1.38799 24.4988 1.67836 24.4988 2.12288V18.2905C24.4988 18.735 24.164 19.0253 23.8374 19.0253H16.121Z"
                                        stroke="#353039" stroke-width="1.76374" />
                                </svg>

                            </div>
                            <span>הודעות</span>
                        </a>
                        <a href="#" class="menu_item item8 d-flex align-items-center">
                            <div class="icon">
                                <svg width="27" height="26" viewBox="0 0 27 26" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.9426 21.3655C17.5088 21.3655 22.0211 16.8532 22.0211 11.287C22.0211 5.72085 17.5088 1.20856 11.9426 1.20856C6.37643 1.20856 1.86414 5.72085 1.86414 11.287C1.86414 16.8532 6.37643 21.3655 11.9426 21.3655Z"
                                        stroke="#353039" stroke-width="1.76374" stroke-miterlimit="10"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M25.3806 24.7252L19.0681 18.4127" stroke="#353039" stroke-width="1.76374"
                                        stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>

                            </div>
                            <span>חיפוש</span>
                        </a>
                    </div>
                    <div class="blackitem d-lg-none">
                        <a href="#" class="menu_item item5 d-flex align-items-center">
                            <div class="icon">
                                <svg width="23" height="26" viewBox="0 0 23 26" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5.88858 6.78913C5.88858 3.79189 8.3273 1.35317 11.3245 1.35317C14.3218 1.35317 16.7605 3.79189 16.7605 6.78913V8.36859C16.7605 11.3658 14.3218 13.8046 11.3245 13.8046C8.3273 13.8046 5.88858 11.3658 5.88858 8.36859V6.78913Z"
                                        stroke="#353039" stroke-width="1.76374" />
                                    <path
                                        d="M11.3245 18.7272C13.8189 18.7272 16.1019 17.8332 17.8872 16.3631C20.1442 17.2491 21.4988 18.9615 21.4988 21.0043V24.8608H1.15012V21.0043C1.15012 18.9615 2.50473 17.2491 4.76174 16.3631C6.547 17.8332 8.83 18.7272 11.3245 18.7272Z"
                                        stroke="#353039" stroke-width="1.76374" />
                                </svg>

                            </div>
                            <span>איזור אישי</span>
                        </a>
                        <a href="#" class="menu_item item6 d-flex align-items-center">
                            <div class="icon">
                                <svg width="20" height="27" viewBox="0 0 20 27" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1.13519 25.1205L9.7579 18.8494L18.3806 25.1205V3.95568C18.3806 3.33199 18.1328 2.73384 17.6918 2.29282C17.2508 1.8518 16.6527 1.60403 16.029 1.60403H3.48684C2.86314 1.60403 2.26499 1.8518 1.82397 2.29282C1.38296 2.73384 1.13519 3.33199 1.13519 3.95568V25.1205Z"
                                        stroke="#212121" stroke-width="1.76374" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>

                            </div>
                            <span>שמורים</span>
                        </a>
                        <a href="#" class="menu_item item7 d-flex align-items-center">
                            <div class="icon">
                                <svg width="26" height="27" viewBox="0 0 26 27" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.121 19.0253H15.8436L15.6161 19.1842L7.7433 24.6827V19.9072V19.0253H6.86143H2.23162C1.90499 19.0253 1.57022 18.735 1.57022 18.2905V2.12288C1.57022 1.67836 1.90499 1.38799 2.23162 1.38799H23.8374C24.164 1.38799 24.4988 1.67836 24.4988 2.12288V18.2905C24.4988 18.735 24.164 19.0253 23.8374 19.0253H16.121Z"
                                        stroke="#353039" stroke-width="1.76374" />
                                </svg>

                            </div>
                            <span>הודעות</span>
                        </a>
                        <a href="#" class="menu_item item8 d-flex align-items-center">
                            <div class="icon">
                                <svg width="27" height="26" viewBox="0 0 27 26" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.9426 21.3655C17.5088 21.3655 22.0211 16.8532 22.0211 11.287C22.0211 5.72085 17.5088 1.20856 11.9426 1.20856C6.37643 1.20856 1.86414 5.72085 1.86414 11.287C1.86414 16.8532 6.37643 21.3655 11.9426 21.3655Z"
                                        stroke="#353039" stroke-width="1.76374" stroke-miterlimit="10"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M25.3806 24.7252L19.0681 18.4127" stroke="#353039" stroke-width="1.76374"
                                        stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>

                            </div>
                            <span>חיפוש</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-lg-9">
                <div class="top_hang_img icon1">
                    <img src="{{asset('static/img/home_hang.png') }}" alt="home">
                </div>
                <div class="top_hang_img icon2">
                    <img src="{{asset('static/img/wallet_hang.png') }}" alt="home">
                </div>
                <div class="top_hang_img icon3">
                    <img src="{{asset('static/img/shop_hang.png') }}" alt="home">
                </div>
                <div class="top_hang_img icon4">
                    <img src="{{asset('static/img/bag_hang.png') }}" alt="home">
                </div>
                <div class="top_hang_img icon5">
                    <img src="{{asset('static/img/user_hang.png') }}" alt="home">
                </div>
                <div class="top_hang_img icon6">
                    <img src="{{asset('static/img/bookmark_hang.png') }}" alt="home">
                </div>
                <div class="top_hang_img icon7">
                    <img src="{{asset('static/img/message_hang.png') }}" alt="home">
                </div>
                <div class="top_hang_img icon8">
                    <img src="{{asset('static/img/search_hang.png') }}" alt="home">
                </div>
                <!-- Swiper -->
                <div class="swiper_parent">
                    <div class="swiper mySwiper" style="height: 100%;">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="swiper_main">
                                    <div class="text col-md-8">
                                        <h2 class="head text-orange"> דוסיז צרכנות מקומית עושה מהפכה בכל מה שקשור
                                            לצרכנות
                                            העירונית!</h2>
                                        <p class="para">באמצעות פלטפורמה דיגיטלית המנגישה לכך את כל מה שחדש בתחום
                                            הצרכנות
                                            בעיר שלך, מבצעים
                                            מיוחדים, כתבות תוכן בתחומים רלוונטיים ועוד<br>
                                            <b>תעקבו באתר ולא תפספסו שום התרחשות!</b>
                                        </p>
                                    </div>
                                    <div class="d-flex mt-5">
                                        <div class="blog_cards">
                                            <div class="blog_card d-flex shadow">
                                                <div class="img overflow-hidden">
                                                    <img src="{{asset('static/img/blog_img.png') }}" height="100%" alt="blog_img">
                                                </div>
                                                <div class="text">
                                                    <span class="label">הום סטייל</span>
                                                    <h3 class="heading">ריצוף חוץ: ככה תבחרו ריצוף לחצר והמרפסת
                                                    </h3>
                                                    <p class="card_para">מחפשים איך לרצף את החצר בצורה הכי יפה וחכמה?
                                                        מומחי
                                                        פורצלן
                                                        סנטר</p>
                                                    <a href="#" class="likes"><i class="fas fa-heart"></i> 100</a>
                                                </div>
                                            </div>
                                            <div class="main_links mt-5">
                                                <a href="#" class="link me-5"><svg width="27" height="35"
                                                        viewBox="0 0 27 35" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M1.3999 34L13.4999 25.2L25.5999 34V4.3C25.5999 3.42479 25.2522 2.58542 24.6334 1.96655C24.0145 1.34768 23.1751 1 22.2999 1H4.6999C3.82469 1 2.98532 1.34768 2.36645 1.96655C1.74758 2.58542 1.3999 3.42479 1.3999 4.3V34Z"
                                                            stroke="#353039" stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </a>
                                                <a href="#" class="link me-5">
                                                    <svg width="35" height="31" viewBox="0 0 35 31" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M31.4227 3.77945C27.9863 0.343051 22.4137 0.343051 18.9773 3.77945C18.3613 4.39545 17.8971 5.09505 17.5011 5.82325C17.1051 5.09505 16.6409 4.39325 16.0227 3.77725C12.5863 0.340851 7.0137 0.340851 3.5773 3.77725C0.1409 7.21365 0.1409 12.7863 3.5773 16.2227L17.5011 29.8011L31.4227 16.2227C34.8613 12.7863 34.8613 7.21585 31.4227 3.77945Z"
                                                            stroke="#353039" stroke-width="1.5" stroke-miterlimit="10"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>

                                                </a>
                                                <a href="#" class="link me-5">
                                                    <svg width="35" height="33" viewBox="0 0 35 33" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M32.0002 1.19995H3.4002C2.1858 1.19995 1.2002 2.18555 1.2002 3.39995V21C1.2002 22.2144 2.1858 23.2 3.4002 23.2H10.0002V32L20.2676 23.2H32.0002C33.2146 23.2 34.2002 22.2144 34.2002 21V3.39995C34.2002 2.18555 33.2146 1.19995 32.0002 1.19995Z"
                                                            stroke="#212121" stroke-width="1.5" stroke-miterlimit="10"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>

                                                </a>
                                                <a href="#" class="link me-5">
                                                    <svg width="35" height="35" viewBox="0 0 35 35" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M7.6 7.59998H3.2C1.9856 7.59998 1 8.58558 1 9.79998V31.8C1 33.0144 1.9856 34 3.2 34H27.4C28.6144 34 29.6 33.0144 29.6 31.8V25.2"
                                                            stroke="#212121" stroke-width="1.5" stroke-miterlimit="10"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M25.2002 1L34.0002 9.8L25.2002 18.6" stroke="#212121"
                                                            stroke-width="1.5" stroke-miterlimit="10"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path
                                                            d="M34.0002 9.80005H23.0002C18.1404 9.80005 14.2002 13.7402 14.2002 18.6V23"
                                                            stroke="#212121" stroke-width="1.5" stroke-miterlimit="10"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>

                                                </a>
                                            </div>
                                        </div>
                                        <div class="products_cards me-lg-5">
                                            <div class="d-flex justify-content-end timer_top">
                                                <svg width="174" height="39" viewBox="0 0 174 39" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect x="127.136" width="45.8824" height="39" rx="5.79786"
                                                        fill="#353039" />
                                                    <rect x="65.1948" width="45.8824" height="39" rx="5.79786"
                                                        fill="#353039" />
                                                    <rect x="0.959473" width="48.1765" height="39" rx="5.79786"
                                                        fill="#353039" />
                                                    <path
                                                        d="M15.6673 29.5456C20.9845 29.5456 24.289 25.4 24.289 18.731C24.289 12.0619 20.9845 7.91632 15.6673 7.91632C10.3201 7.91632 6.95552 12.0619 6.95552 18.731C6.95552 25.4 10.3201 29.5456 15.6673 29.5456ZM15.6673 26.4214C12.453 26.4214 10.4402 23.4474 10.4402 18.731C10.4402 14.0146 12.453 11.0406 15.6673 11.0406C18.8216 11.0406 20.8043 14.0146 20.8043 18.731C20.8043 23.4474 18.8216 26.4214 15.6673 26.4214ZM26.8003 14.7956L30.2249 15.3063C30.5854 12.1821 32.3578 10.9805 34.4607 10.9805C36.8339 10.9805 38.0956 12.2422 38.0956 14.0747C38.0956 16.0574 36.8639 17.7396 32.8986 22.0355L26.9204 28.7045V29.2452H41.9408V26.2712H33.2891L36.4133 23.0568C40.0482 19.0614 41.6404 16.5981 41.6404 14.1348C41.6404 10.2595 38.9067 7.91632 34.5208 7.91632C30.7957 7.91632 27.6114 9.62864 26.8003 14.7956ZM83.7908 17.9499C85.2929 17.1689 86.4044 15.6969 86.4044 13.4739C86.4044 10.2595 83.8509 7.91632 79.465 7.91632C76.1305 7.91632 73.6671 9.38832 72.3754 11.4611L74.5083 13.2936C75.8901 11.5212 77.5724 10.8904 79.2247 10.8904C81.5378 10.8904 82.9197 11.9117 82.9197 13.7743C82.9197 15.5467 81.5378 16.6882 79.1045 16.6882H76.6412V19.512H79.495C82.2888 19.512 84.1513 20.6235 84.1513 22.9367C84.1513 25.2799 82.3489 26.5716 79.5551 26.5716C77.3321 26.5716 75.4395 25.5202 74.2379 24.0182L71.7746 25.8506C72.826 27.623 75.5296 29.5456 79.7053 29.5456C84.7221 29.5456 87.6361 26.9321 87.6361 23.2671C87.6361 20.3532 85.9237 18.4606 83.7908 17.9499ZM96.6378 15.3965C95.9468 15.3965 95.2259 15.4565 94.4148 15.5767L94.8353 11.1908H103.157V8.21673H91.5609L90.7798 18.5808L90.9 18.6108C92.4921 18.2503 93.874 18.0701 95.1357 18.0701C98.5003 18.0701 100.243 19.8124 100.243 22.3659C100.243 24.9494 98.26 26.4815 95.6164 26.4815C93.874 26.4815 92.5222 26.091 91.1704 25.37L90.1189 28.2539C91.7111 29.095 93.4835 29.5456 96.037 29.5456C100.573 29.5456 103.878 26.5416 103.878 22.5161C103.878 18.5808 101.655 15.3965 96.6378 15.3965ZM134.314 14.7956L137.739 15.3063C138.1 12.1821 139.872 10.9805 141.975 10.9805C144.348 10.9805 145.61 12.2422 145.61 14.0747C145.61 16.0574 144.378 17.7396 140.413 22.0355L134.435 28.7045V29.2452H149.455V26.2712H140.803L143.927 23.0568C147.562 19.0614 149.154 16.5981 149.154 14.1348C149.154 10.2595 146.421 7.91632 142.035 7.91632C138.31 7.91632 135.125 9.62864 134.314 14.7956ZM151.964 14.7956L155.389 15.3063C155.749 12.1821 157.521 10.9805 159.624 10.9805C161.997 10.9805 163.259 12.2422 163.259 14.0747C163.259 16.0574 162.028 17.7396 158.062 22.0355L152.084 28.7045V29.2452H167.104V26.2712H158.453L161.577 23.0568C165.212 19.0614 166.804 16.5981 166.804 14.1348C166.804 10.2595 164.07 7.91632 159.684 7.91632C155.959 7.91632 152.775 9.62864 151.964 14.7956Z"
                                                        fill="white" />
                                                    <path
                                                        d="M57.2269 17.3191C58.5788 17.3191 59.6302 16.2676 59.6302 14.9158C59.6302 13.564 58.5788 12.5126 57.2269 12.5126C55.9052 12.5126 54.8237 13.564 54.8237 14.9158C54.8237 16.2676 55.9052 17.3191 57.2269 17.3191ZM57.2269 29.4255C58.5788 29.4255 59.6302 28.344 59.6302 27.0222C59.6302 25.6704 58.5788 24.5889 57.2269 24.5889C55.9052 24.5889 54.8237 25.6704 54.8237 27.0222C54.8237 28.344 55.9052 29.4255 57.2269 29.4255ZM119.316 17.3191C120.668 17.3191 121.719 16.2676 121.719 14.9158C121.719 13.564 120.668 12.5126 119.316 12.5126C117.994 12.5126 116.913 13.564 116.913 14.9158C116.913 16.2676 117.994 17.3191 119.316 17.3191ZM119.316 29.4255C120.668 29.4255 121.719 28.344 121.719 27.0222C121.719 25.6704 120.668 24.5889 119.316 24.5889C117.994 24.5889 116.913 25.6704 116.913 27.0222C116.913 28.344 117.994 29.4255 119.316 29.4255Z"
                                                        fill="#353039" />
                                                </svg>

                                            </div>
                                            <div class="product_card shadow mt-4">
                                                <div class="img">
                                                    <img src="{{asset('static/img/product_img.png') }}" class="w-100" alt="img">
                                                </div>
                                                <div class="product_info">
                                                    <div
                                                        class="d-flex mt-2 justify-content-between align-items-center productLables">
                                                        <!-- <span class="label">ריהוט אב</span> -->
                                                        <img src="{{asset('static/img/label2.png') }}" alt="lable">
                                                        <img src="{{asset('static/img/timer.png') }}" alt="timer">
                                                    </div>
                                                    <div class="product_heading my-2">
                                                        <h3>רהיטי אב במצבע בלעדי ספה 3 מושבים במחיר מפתיע לחופש...</h3>
                                                    </div>
                                                    <div
                                                        class="btns_price d-flex justify-content-between align-items-end">
                                                        <!-- actual price and discount price -->
                                                        <div class="d-flex price">
                                                            <div class="actual_price me-2">
                                                                <del>
                                                                    <span>₪</span>
                                                                    <span>1,000</span>
                                                                </del>
                                                            </div>
                                                            <div class="discount_price">
                                                                <span>₪</span>
                                                                <span>500</span>
                                                            </div>
                                                        </div>
                                                        <div class="btns">
                                                            <a href="#" class="btn btn_orange">למידע נוסף ></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="swiper_main">
                                    <div class="row">
                                        <div class="text col-md-7 col-lg-6 mt-5">
                                            <h2 class="head text-orange">המהפכה נמצאת בכף ידך!</h2>
                                            <p class="para">על כל פעילות באתר ועל כל קנייה בחנויות הרווחת!
                                                מהיום אתם יכולים להרוויח יותר על כל שקל שאתם מוציאים באמצעות מערכת חכמה
                                                שתתגמל אתכם במטבעות ייחודיים לשימוש בחנויות שאתם אוהבים, זה קל פשוט
                                                ובעיקר
                                                שווה!</b>
                                            </p>
                                            <div class="mt-5">
                                                <div class="imgs d-flex align-items-start">
                                                    <img src="{{asset('static/img/rating.png') }}" class="rating_img" alt="rating">
                                                    <img src="{{asset('static/img/likes_img.png') }}" class="mt-5 d-block likes_img"
                                                        alt="likes_img">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 mt-3">
                                            <div class="coin_card mt-lg-5 shadow">
                                                <div class="head">
                                                    <img src="{{asset('static/img/coin.png') }}" class="coinImg" alt="coin" class="">
                                                    460 נקודות
                                                </div>
                                                <div class="new_links">
                                                    <a href="#" class="link d-flex align-items-center mb-3">
                                                        <svg width="18" height="15" viewBox="0 0 18 15" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M15.3892 2.18377C13.8122 0.606755 11.2548 0.606755 9.6778 2.18377C9.3951 2.46646 9.18208 2.78752 9.00035 3.1217C8.81862 2.78752 8.60559 2.46546 8.32189 2.18276C6.74487 0.605746 4.18751 0.605746 2.6105 2.18276C1.03348 3.75978 1.03348 6.31713 2.6105 7.89415L9.00035 14.1255L15.3892 7.89415C16.9672 6.31713 16.9672 3.76079 15.3892 2.18377Z"
                                                                stroke="#353039" stroke-width="1.5"
                                                                stroke-miterlimit="10" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        <span class="mx-4"> לייק (50)</span>
                                                        <svg width="150" height="6" viewBox="0 0 150 6" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="150" height="6" rx="3" fill="#503E9D"
                                                                fill-opacity="0.15" />
                                                        </svg>

                                                    </a>
                                                    <a href="#" class="link d-flex align-items-center mb-3">
                                                        <svg width="18" height="15" viewBox="0 0 18 15" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M15.3892 2.18377C13.8122 0.606755 11.2548 0.606755 9.6778 2.18377C9.3951 2.46646 9.18208 2.78752 9.00035 3.1217C8.81862 2.78752 8.60559 2.46546 8.32189 2.18276C6.74487 0.605746 4.18751 0.605746 2.6105 2.18276C1.03348 3.75978 1.03348 6.31713 2.6105 7.89415L9.00035 14.1255L15.3892 7.89415C16.9672 6.31713 16.9672 3.76079 15.3892 2.18377Z"
                                                                stroke="#353039" stroke-width="1.5"
                                                                stroke-miterlimit="10" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        <span class="mx-4">לייק (50)</span>
                                                        <svg width="150" height="6" viewBox="0 0 150 6" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="150" height="6" rx="3" fill="#503E9D"
                                                                fill-opacity="0.15" />
                                                        </svg>

                                                    </a>
                                                    </a>
                                                    <a href="#" class="link d-flex align-items-center mb-3">
                                                        <svg width="18" height="15" viewBox="0 0 18 15" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M15.3892 2.18377C13.8122 0.606755 11.2548 0.606755 9.6778 2.18377C9.3951 2.46646 9.18208 2.78752 9.00035 3.1217C8.81862 2.78752 8.60559 2.46546 8.32189 2.18276C6.74487 0.605746 4.18751 0.605746 2.6105 2.18276C1.03348 3.75978 1.03348 6.31713 2.6105 7.89415L9.00035 14.1255L15.3892 7.89415C16.9672 6.31713 16.9672 3.76079 15.3892 2.18377Z"
                                                                stroke="#353039" stroke-width="1.5"
                                                                stroke-miterlimit="10" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        <span class="mx-4">לייק (50)</span>
                                                        <svg width="150" height="6" viewBox="0 0 150 6" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="150" height="6" rx="3" fill="#503E9D"
                                                                fill-opacity="0.15" />
                                                        </svg>

                                                    </a>
                                                    </a>
                                                    <a href="#" class="link d-flex align-items-center mb-3">
                                                        <svg width="18" height="15" viewBox="0 0 18 15" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M15.3892 2.18377C13.8122 0.606755 11.2548 0.606755 9.6778 2.18377C9.3951 2.46646 9.18208 2.78752 9.00035 3.1217C8.81862 2.78752 8.60559 2.46546 8.32189 2.18276C6.74487 0.605746 4.18751 0.605746 2.6105 2.18276C1.03348 3.75978 1.03348 6.31713 2.6105 7.89415L9.00035 14.1255L15.3892 7.89415C16.9672 6.31713 16.9672 3.76079 15.3892 2.18377Z"
                                                                stroke="#353039" stroke-width="1.5"
                                                                stroke-miterlimit="10" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        <span class="mx-4">לייק (50)</span>
                                                        <svg width="50" height="6" viewBox="0 0 150 6" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="150" height="6" rx="3" fill="#503E9D"
                                                                fill-opacity="0.15" />
                                                        </svg>

                                                    </a>
                                                    </a>
                                                    <a href="#" class="link d-flex align-items-center mb-3">
                                                        <svg width="18" height="15" viewBox="0 0 18 15" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M15.3892 2.18377C13.8122 0.606755 11.2548 0.606755 9.6778 2.18377C9.3951 2.46646 9.18208 2.78752 9.00035 3.1217C8.81862 2.78752 8.60559 2.46546 8.32189 2.18276C6.74487 0.605746 4.18751 0.605746 2.6105 2.18276C1.03348 3.75978 1.03348 6.31713 2.6105 7.89415L9.00035 14.1255L15.3892 7.89415C16.9672 6.31713 16.9672 3.76079 15.3892 2.18377Z"
                                                                stroke="#353039" stroke-width="1.5"
                                                                stroke-miterlimit="10" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        <span class="mx-4">לייק (50)</span>
                                                        <svg width="80" height="6" viewBox="0 0 150 6" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="150" height="6" rx="3" fill="#503E9D"
                                                                fill-opacity="0.15" />
                                                        </svg>

                                                    </a>
                                                    </a>
                                                    <a href="#" class="link d-flex align-items-center mb-3">
                                                        <svg width="18" height="15" viewBox="0 0 18 15" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M15.3892 2.18377C13.8122 0.606755 11.2548 0.606755 9.6778 2.18377C9.3951 2.46646 9.18208 2.78752 9.00035 3.1217C8.81862 2.78752 8.60559 2.46546 8.32189 2.18276C6.74487 0.605746 4.18751 0.605746 2.6105 2.18276C1.03348 3.75978 1.03348 6.31713 2.6105 7.89415L9.00035 14.1255L15.3892 7.89415C16.9672 6.31713 16.9672 3.76079 15.3892 2.18377Z"
                                                                stroke="#353039" stroke-width="1.5"
                                                                stroke-miterlimit="10" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        <span class="mx-4">לייק (50)</span>
                                                        <svg width="100" height="6" viewBox="0 0 150 6" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="150" height="6" rx="3" fill="#503E9D"
                                                                fill-opacity="0.15" />
                                                        </svg>

                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="swiper_main">
                                    <div class="row">
                                        <div class="text col-md-7 mt-5">
                                            <h2 class="head text-orange"> איך אתם עוזרים לקסם לקרות?</h2>
                                            <p class="para">אתם מחליטים איזה תחומים ואיזה עסקים מעניינים אתכם, וממי אתם
                                                תרצו לקבל מבצעים
                                                ועידכונים חשובים, נרשמים בקליק לכל מועדוני הצרכנות שאתם אוהבים ותתחילו
                                                להתעדכן אונליין!</b>
                                            </p>

                                            <div class="mt-5">
                                                <div class="imgs checkImg d-flex align-items-start ms-lg-5 ps-lg-5">
                                                    <img src="{{asset('static/img/text_lable.png') }}" alt="rating">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="swiper-slide">
                                <div class="swiper_main">
                                    <div class="row">
                                        <div class="text textTOp col-md-5 mt-5">
                                            <h2 class="head text-orange"> גישה מהירה לכל הכתבות באתר
                                            </h2>
                                            <p class="para">בלי חיפושים ובלי להתבלבל!</b>




                                            </p>
                                            <!-- <div class="mt-5">
                                                <div class="imgs d-flex align-items-start">
                                                    <img src="img/rating.png" alt="rating">
                                                    <img src="img/likes_img.png" class="mt-5 d-block" alt="likes_img">
                                                </div>
                                            </div> -->
                                        </div>
                                        <div class="col-md-5 mt-3">
                                            <div class="blog_card mb-3 d-flex shadow">
                                                <div class="img overflow-hidden">
                                                    <img src="{{asset('static/img/blog_img.png') }}" height="100%" alt="blog_img">
                                                </div>
                                                <div class="text">
                                                    <span class="label">הום סטייל</span>
                                                    <h3 class="heading">ריצוף חוץ: ככה תבחרו ריצוף לחצר והמרפסת
                                                    </h3>
                                                    <p class="card_para">מחפשים איך לרצף את החצר בצורה הכי יפה
                                                        וחכמה?
                                                        מומחי
                                                        פורצלן
                                                        סנטר</p>
                                                    <a href="#" class="likes"><i class="fas fa-heart"></i> 100</a>
                                                </div>
                                            </div>
                                            <div class="blog_card mb-3 d-flex shadow">
                                                <div class="img overflow-hidden">
                                                    <img src="{{asset('static/img/blog_img.png') }}" height="100%" alt="blog_img">
                                                </div>
                                                <div class="text">
                                                    <span class="label">הום סטייל</span>
                                                    <h3 class="heading">ריצוף חוץ: ככה תבחרו ריצוף לחצר והמרפסת
                                                    </h3>
                                                    <p class="card_para">מחפשים איך לרצף את החצר בצורה הכי יפה
                                                        וחכמה?
                                                        מומחי
                                                        פורצלן
                                                        סנטר</p>
                                                    <a href="#" class="likes"><i class="fas fa-heart"></i> 100</a>
                                                </div>
                                            </div>
                                            <div class="blog_card mb-3 d-flex shadow">
                                                <div class="img overflow-hidden">
                                                    <img src="{{asset('static/img/blog_img.png') }}" height="100%" alt="blog_img">
                                                </div>
                                                <div class="text">
                                                    <span class="label">הום סטייל</span>
                                                    <h3 class="heading">ריצוף חוץ: ככה תבחרו ריצוף לחצר והמרפסת
                                                    </h3>
                                                    <p class="card_para">מחפשים איך לרצף את החצר בצורה הכי יפה
                                                        וחכמה?
                                                        מומחי
                                                        פורצלן
                                                        סנטר</p>
                                                    <a href="#" class="likes"><i class="fas fa-heart"></i> 100</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="swiper_main">
                                    <div class="row align-items-lg-end">
                                        <div class="text col-md-6 mt-5">
                                            <h2 class="head text-orange">אתם יכולים להוסיף מידע על עצמכם והמערכת תדאג
                                                לכם לפינוקים והטבות!
                                            </h2>
                                            <p class="para">ביום הולדת או סתם פינוק בערב חג, כמובן שהשליטה בידיים שלכם
                                                תמיד תוכלו להסיר את המידע שהוספתם
                                            </p>
                                        </div>
                                        <div class="col-md-5 mt-5 pt-5">
                                            <img src="{{asset('static/img/ballons.png') }}" alt="ballons">
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="swiper_main">
                                    <div class="row align-items-center">
                                        <div class="text col-md-6 mt-5">
                                            <div class="input srchInput mb-5">
                                                <img src="{{asset('static/img/shortLogo.png') }}" class="input_logo" alt="logo">
                                                <input type="text">
                                                <div class="icon icon1">
                                                    <svg width="19" height="18" viewBox="0 0 19 18" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M8.43838 14.7737C12.2906 14.7737 15.4134 11.6509 15.4134 7.79873C15.4134 3.94654 12.2906 0.82373 8.43838 0.82373C4.58619 0.82373 1.46338 3.94654 1.46338 7.79873C1.46338 11.6509 4.58619 14.7737 8.43838 14.7737Z"
                                                            stroke="#353039" stroke-width="1.24" stroke-miterlimit="10"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M17.7383 17.0988L13.3696 12.7301" stroke="#353039"
                                                            stroke-width="1.24" stroke-miterlimit="10"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>

                                                </div>
                                                <div class="icon icon2">
                                                    <svg width="16" height="21" viewBox="0 0 16 21" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M1.31958 19.9199L8.13958 14.9599L14.9596 19.9199V3.17995C14.9596 2.68664 14.7636 2.21355 14.4148 1.86473C14.066 1.51591 13.5929 1.31995 13.0996 1.31995H3.17958C2.68628 1.31995 2.21318 1.51591 1.86436 1.86473C1.51554 2.21355 1.31958 2.68664 1.31958 3.17995V19.9199Z"
                                                            stroke="#212121" stroke-width="1.24" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>


                                                </div>
                                            </div>
                                            <h2 class="head text-orange mt-5">מכירים את זה שראיתם מוצר שאתם אוהבים ואין
                                                לכם
                                                מושג איפה הוא היום?
                                            </h2>
                                            <p class="para">בדיוק בשביל זה יש לנו דף שיעזור לכם לשמור בו את מוצר שאהבתם
                                                או כתבה שבאמת עזרה לכם ואתם לא רוצים לאבד אותה בדף זה תוכלו לשמור כל מה
                                                שחשוב לכם!
                                            </p>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="swiper-slide">
                                <div class="swiper_main">
                                    <div class="row align-items-center">
                                        <div class="text col-md-6 mt-5">
                                            <h1>chat integrated</h1>
                                            <h2 class="head text-orange mt-5"> יש לכם שאלה?
                                            </h2>
                                            <p class="para">במעוניינים לברר על מוצר או על שירות?
                                                תוכלו לתקשר ישירות עם בית העסק דרך המערכת, ולקבל במהירות ובקלילות את כל
                                                המידע שאתם צריכים!
                                            </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="swiper_main">
                                    <div class="row align-items-center">
                                        <div class="text col-md-6 mt-5">
                                            <div class="srch2">
                                                <input type="text" placeholder="חיפוש ...">
                                                <a href="#" class="btn btn_search">
                                                    <img src="{{asset('static/img/search_icon.png') }}" alt="search_icon">
                                                </a>
                                            </div>
                                            <h2 class="head text-orange mt-5"> עמוס לכם?
                                            </h2>
                                            <p class="para">פשוט חפשו מה שאתם צריכים ותראו רק את מה שרלוונטי אליכם!
                                            </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modals --}}

    <!-- Modal -->
    <div class="modal fade enrollmentModel " id="model1" tabindex="-1" aria-labelledby="model1Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="login-moda">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">התחברות</h5>
                    <button type="button" class="close"  data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="formDiv">
                        <form action="{{ url('user_login') }}" method="POST">
                            @csrf
                            <input type="hidden" name="static_page" value="static_page" />
                            <div class="inputDiv">
                                <label for="" class="font-size-16">דוא”ל</label>
                                <input id="email" type="email" name="email" required value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <span class="text-danger email_valid"></span>
                            </div>
                            <div class="inputDiv">
                                <label for="" class="font-size-16">סיסמה</label>
                                <div class="password_div">
                                    <input id="password" type="password" name="password" required autocomplete="current-password">
                                    <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                    <span class="text-danger password_valid"></span>
                                </div>
                            </div>
                            <button type="submit" class="font-size-16" style="cursor: pointer;"> התחבר‎‎ </button>
                            @if (Route::has('password.request'))
                                <div class="text-center forgotpass">
                                    <a class="btn btn-link" target="_blank" href="{{ route('password.request') }}">
                                    {{ __('שכחת את הסיסמה? לחץ כאן לשיחזור!') }}
                                    </a>
                                </div>
                            @endif

                            <div class="sign_up_with">
                                <h6 class="text-center">התחברו עם </h6>
                                <div class="signup_btn">
                                    <a href="{{route('auth.facebook')}}">
                                        <img src="{{ asset('assets/img/mobile_component/facebookIcon.png') }}" alt=""
                                            class="img-fluid">
                                    </a>
                                    <a href="{{route('auth.google')}}">
                                        <img src="{{ asset('assets/img/mobile_component/googleIcon.png') }}" alt=""
                                            class="img-fluid">
                                    </a>
                                </div>
                            </div>
                            <!-- <div class="d-flex justify-content-center mt-4">
                                <a href="" id="login_btn" class="text-dark">
                                </b> אין לכם חשבון? לחצו כאן להרשמה > </b>
                                </a>
                            </div> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade enrollmentModel " id="modal2" tabindex="-1" aria-labelledby="modal2Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="login-moda">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">הַרשָׁמָה</h5>
                    <button type="button" class="close"  data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="formDiv">
                        <form action="{{ url('register_user') }}" method="POST">
                            @csrf
                            <div class="inputDiv">
                                <label for="" class="font-size-16">שם</label>
                                <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                <span class="text-danger name_valid"></span>
                            </div>
                            <div class="inputDiv">
                                <label for="" class="font-size-16">עיר</label>
                                <select name="city_id" id="city_id">
                                    <option selected disabled value="">בחר מתוך הרשימה</option>
                                    @foreach($cities as $city)
                                        <option value="{{$city->id}}"> {{$city->hebrew_name}} </option>
                                    @endforeach
                                </select>
                                <span class="text-danger city_valid"></span>
                            </div>
                            <div class="inputDiv">
                                <label for="" class="font-size-16">דוא”ל</label>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                                <span class="text-danger email_valid"></span>
                            </div>
                            <div class="inputDiv">
                                <label for="" class="font-size-16">סיסמה</label>
                                <div class="password_div">
                                    <input id="password" type="password" name="password" required autocomplete="new-password">
                                    <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                    <span class="text-danger password_valid"></span>
                                </div>
                            </div>
                            <div class="checkBox_div">
                                <input type="checkbox" name="" id="approve" checked>
                                <label for="approve" class="font-size-16">אני מאשר קבלת תכנים מדוסיז צרכנות.</label>
                            </div>
                            <div class="checkBox_div">
                                <input type="checkbox" name="" id="policy" checked>
                                <label for="policy" class="font-size-16">אני מסכים <a href="">למדיניות</a>
                                    המערכת...</label>
                            </div>
                            <button type="submit" class="font-size-16" style="cursor: pointer;">התחבר‎</button>
                            <div class="sign_up_with">
                                <h6 class="text-center">או הרשם עם</h6>
                                <div class="signup_btn">
                                    <a href="{{route('auth.facebook')}}">
                                        <img src="{{ asset('assets/img/mobile_component/facebookIcon.png') }}" alt=""
                                            class="img-fluid">
                                    </a>
                                    <a href="{{route('auth.google')}}">
                                        <img src="{{ asset('assets/img/mobile_component/googleIcon.png') }}" alt=""
                                            class="img-fluid">
                                    </a>
                                </div>
                            </div>
                            <!-- <div class="d-flex justify-content-center mt-4">
                                <a href="" id="signup_btn" class="text-dark">
                                    <b>אין לכם חשבון? לחצו כאן להרשמה > </b>
                                </a>
                            </div> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- bootstrap 5 script -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Initialize Swiper -->
    <script>
        $('.top_hang_img').hide();
        $('.top_hang_img.icon1').show();
        var swiper = new Swiper(".mySwiper", {
            breakpoints: {
                // when window width is >= 320px
                600: {
                    direction: "vertical",
                },
            },
            autoHeight: true,
            slidesPerView: 1,
            clickable: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            // height auto 
            autoHeight: true,
            mousewheel: {
                releaseOnEdges: true,
            },
        });
        swiper.on('slideChange', function () {
            console.log($('.swiper-pagination-bullet-active').attr('aria-label'));
            let active = $('.swiper-pagination-bullet-active').attr('aria-label');
            if (active == 'Go to slide 1') {
                $('.menu_item').removeClass('active');
                $('.menu_item.item1').addClass('active');
                $('.top_hang_img').hide();
                $('.top_hang_img.icon1').show();
            } else if (active == 'Go to slide 2') {
                $('.menu_item').removeClass('active');
                $('.menu_item.item2').addClass('active');
                $('.top_hang_img').hide();
                $('.top_hang_img.icon2').show();
            } else if (active == 'Go to slide 3') {
                $('.menu_item').removeClass('active');
                $('.menu_item.item3').addClass('active');
                $('.top_hang_img').hide();
                $('.top_hang_img.icon3').show();
            } else if (active == 'Go to slide 4') {
                $('.menu_item').removeClass('active');
                $('.menu_item.item4').addClass('active');
                $('.top_hang_img').hide();
                $('.top_hang_img.icon4').show();
            } else if (active == 'Go to slide 5') {
                $('.menu_item').removeClass('active');
                $('.menu_item.item5').addClass('active');
                $('.top_hang_img').hide();
                $('.top_hang_img.icon5').show();
            } else if (active == 'Go to slide 6') {
                $('.menu_item').removeClass('active');
                $('.menu_item.item6').addClass('active');
                $('.top_hang_img').hide();
                $('.top_hang_img.icon6').show();
            } else if (active == 'Go to slide 7') {
                $('.menu_item').removeClass('active');
                $('.menu_item.item7').addClass('active');
                $('.top_hang_img').hide();
                $('.top_hang_img.icon7').show();
            } else if (active == 'Go to slide 8') {
                $('.menu_item').removeClass('active');
                $('.menu_item.item8').addClass('active');
                $('.top_hang_img').hide();
                $('.top_hang_img.icon8').show();
            } else {
                $('.menu_item').removeClass('active');
                $('.menu_item.item1').addClass('active');
            }
        });
    </script>

    <!-- main js -->
    <script src="{{asset('static/js/main.js') }}"></script>
</body>

</html>