<div class="desktop_menu">
    <div class="desktop_menu_body">
        <img src="{{asset('assets/img/dektopLogo.png') }}" alt="" class="img-fluid">
        <div class="auth_button">
            @if(! isset(Auth::user()->name))
            <a class="enrollemnt_button" data-toggle="modal" data-target="#enrollmentModal2">הרשמה</a>
            <a href="" data-toggle="modal" data-target="#enrollmentModal">התחברות</a>
            @else
            <a class="enrollemnt_button" href="{{route('dashboard')}}"> לוּחַ מַחווָנִים </a>
            @endif
            
        </div>
        <div class="desktop_menu_list">
            <ul>
                <li>
                    <a href="{{route('landing-page',5)}}">איזור אישי <img src="{{asset('assets/img/mobile_component/home.png') }}" alt=""
                            class="img-fluid"></a>
                </li>
                <li>
                    <a href="{{route('user.wallet')}}">כתבות צרכנות <img src="{{asset('assets/img/mobile_component/wallet.png') }}" alt=""
                            class="img-fluid"></a>
                </li>
                <li>
                    <a href="{{route('city-brands',5)}}">הודעות <img src="{{asset('assets/img/mobile_component/consumption.png') }}" alt=""
                            class="img-fluid"></a>
                </li>
                <li>
                    <a href="">התראות <img src="{{asset('assets/img/mobile_component/shopping_icon.png') }}" alt=""
                            class="img-fluid"></a>
                </li>
            </ul>
            <div class="line"></div>
            <ul>
                <li>
                    <a href="">איזור אישי <img src="{{asset('assets/img/mobile_component/user_icon.png') }}" alt=""
                            class="img-fluid"></a>
                </li>
                <li>
                    <a href="{{route('bookmarks')}}">שמורים <img src="{{asset('assets/img/tag_icon.png') }}" alt=""
                            class="img-fluid"></a>
                </li>
                <li>
                    <a href="{{route('user-message')}}">הודעות <img src="{{asset('assets/img/message_icon.png') }}" alt=""
                            class="img-fluid"></a>
                </li>
                <li>
                    <a href=""  data-toggle="modal" data-target="#searchModal">חיפוש<img src="{{asset('assets/img/mobile_search.png') }}" alt=""
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
        <img src="{{asset('assets/img/mobile_component/tablet_logo.png') }}" alt="" class="img-fluid">
        <div class="desktop_menu_list">
            <ul>
                <li>
                    <a href=""><img src="{{asset('assets/img/mobile_component/home.png') }}" alt=""
                            class="img-fluid"></a>
                </li>
                <li>
                    <a href=""><img src="{{asset('assets/img/mobile_component/wallet.png') }}" alt=""
                            class="img-fluid"></a>
                </li>
                <li>
                    <a href=""><img src="{{asset('assets/img/mobile_component/consumption.png') }}" alt=""
                            class="img-fluid"></a>
                </li>
                <li>
                    <a href=""><img src="{{asset('assets/img/mobile_component/shopping_icon.png') }}" alt=""
                            class="img-fluid"></a>
                </li>
            </ul>
            <div class="line"></div>
            <ul>
                <li>
                    <a href=""><img src="{{asset('assets/img/mobile_component/user_icon.png') }}" alt=""
                            class="img-fluid"></a>
                </li>
                <li>
                    <a href=""><img src="{{asset('assets/img/tag_icon.png') }}" alt="" class="img-fluid"></a>
                </li>
                <li>
                    <a href=""><img src="{{asset('assets/img/message_icon.png') }}" alt="" class="img-fluid"></a>
                </li>
                <li>
                    <a href=""><img src="{{asset('assets/img/mobile_search.png') }}" alt="" class="img-fluid"></a>
                </li>
            </ul>
            @guest
            @else
            <div class="logout_user">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><img src="{{asset('assets/img/mobile_component/logout_icon.png') }}" alt=""
                        class="img-fluid"></a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
            @endguest
        </div>
    </div>
</div>

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#searchModal">
  Launch demo modal
</button> -->

