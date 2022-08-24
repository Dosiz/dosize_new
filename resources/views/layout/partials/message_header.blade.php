<header>
    <div class="top_header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <ul>
                        <li>
                            <a href=""  data-toggle="modal" data-target="#searchModal"> <img src="{{asset('assets/img/mobile_search.svg') }}" alt="" class="img-fluid"></a>
                        </li>
                        <li>
                            {{-- <img src="{{asset('assets/img/tag_icon.png') }}" alt="" class="img-fluid"> --}}
                            @guest
                            <a href="" data-toggle="modal" data-target="#enrollmentModal2"><img src="{{asset('assets/img/tag_icon.svg') }}" alt=""
                                    class="img-fluid"></a>
                            @else
                            <a href="{{route('bookmarks')}}"> <img src="{{asset('assets/img/tag_icon.png') }}" alt=""
                                class="img-fluid"></a>
                            @endguest
                        </li>
                    </ul>
                </div>
                <div class="col-6 text-right">
                    <a class="logo">
                        <img src="{{asset('assets/img/mobile_component/mobileLogo.svg') }}" alt="" class="img-fluid">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="mobile_menu">
        <div class="mobile_body">
            <div class="mobile_list">
                <h4>איזור אישי</h4>
                <ul>
                    <li>
                        <a href="">כתבות צרכנות</a>
                    </li>
                    <li>
                        <a href="">כתבות צרכנות</a>
                    </li>
                    <li>
                        <a href="">הודעות</a>
                    </li>
                    <li>
                        <a href="">הגדרות </a>
                    </li>
                </ul>
                <ul>
                    <li>
                        <a href="">המוצרים שאהבתי</a>
                    </li>
                    <li>
                        <a href="">כתבות שמורות</a>
                    </li>
                    <li>
                        <a href="">הודעות</a>
                    </li>
                    <li>
                        <a href="">הגדרות משתמש</a>
                    </li>
                    <li>
                        <a href="">נוטיפיקציות</a>
                    </li>
                    <li>
                        <a href="">התנתקות</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="desktop_menu">
        <div class="desktop_menu_body">
            <img src="{{asset('assets/img/dektopLogo.png') }}" alt="" class="img-fluid">
            <div class="auth_button">
                <a class="enrollemnt_button" data-toggle="modal" data-target="#enrollmentModal">הרשמה</a>
                <a href="">התחברות</a>
            </div>
            <div class="desktop_menu_list">
                <ul>
                    <li>
                        <a href="">איזור אישי <img src="{{asset('assets/img/mobile_component/home.svg') }}" alt=""
                                class="img-fluid"></a>
                    </li>
                    <li>
                        <a href="">כתבות צרכנות <img src="{{asset('assets/img/mobile_component/wallet.svg') }}" alt=""
                                class="img-fluid"></a>
                    </li>
                    <li>
                        <a href="">הודעות <img src="{{asset('assets/img/mobile_component/consumption.svg') }}" alt=""
                                class="img-fluid"></a>
                    </li>
                    <li>
                        <a href="">התראות <img src="{{asset('assets/img/mobile_component/shopping_icon.svg') }}" alt=""
                                class="img-fluid"></a>
                    </li>
                </ul>
                <div class="line"></div>
                <ul>
                    <li>
                        <a href="">איזור אישי <img src="{{asset('assets/img/mobile_component/user_icon.svg') }}" alt=""
                                class="img-fluid"></a>
                    </li>
                    <li>
                        <a href="">שמורים <img src="{{asset('assets/img/mobile_component/tag_icon.svg') }}" alt="" class="img-fluid"></a>
                    </li>
                    <li>
                        <a href="">הודעות <img src="{{asset('assets/img/mobile_component/message_icon.svg') }}" alt=""
                                class="img-fluid"></a>
                    </li>
                    <li>
                        <a href="">חיפוש <img src="{{asset('assets/img/mobile_component/mobile_search.svg') }}" alt=""
                                class="img-fluid"></a>
                    </li>
                </ul>
                <div class="logout_user">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >התנתקות <img src="{{asset('assets/img/mobile_component/logout_icon.png') }}" alt=""
                        class="img-fluid">
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
        <div class="dektop_mobile_menu_body">
            <img src="{{asset('assets/img/mobile_component/tablet_logo.svg') }}" alt="" class="img-fluid">
            <div class="desktop_menu_list">
                <ul>
                    <li>
                        <a href=""><img src="{{asset('assets/img/mobile_component/home.svg') }}" alt=""
                                class="img-fluid"></a>
                    </li>
                    <li>
                        <a href=""><img src="{{asset('assets/img/mobile_component/wallet.svg') }}" alt=""
                                class="img-fluid"></a>
                    </li>
                    <li>
                        <a href=""><img src="{{asset('assets/img/mobile_component/consumption.svg') }}" alt=""
                                class="img-fluid"></a>
                    </li>
                    <li>
                        <a href=""><img src="{{asset('assets/img/mobile_component/shopping_icon.svg') }}" alt=""
                                class="img-fluid"></a>
                    </li>
                </ul>
                <div class="line"></div>
                <ul>
                    <li>
                        <a href=""><img src="{{asset('assets/img/mobile_component/user_icon.svg') }}" alt=""
                                class="img-fluid"></a>
                    </li>
                    <li>
                        <a href=""><img src="{{asset('assets/img/mobile_component/tag_icon.svg') }}" alt="" class="img-fluid"></a>
                    </li>
                    <li>
                        <a href=""><img src="{{asset('assets/img/mobile_component/message_icon.svg') }}" alt="" class="img-fluid"></a>
                    </li>
                    <li>
                        <a href=""><img src="{{asset('assets/img/mobile_component/mobile_search.svg') }}" alt="" class="img-fluid"></a>
                    </li>
                </ul>
                <div class="logout_user">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><img src="{{asset('assets/img/mobile_component/logout_icon.svg') }}" alt=""
                        class="img-fluid"></a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>