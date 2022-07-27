<div class="desktop_menu">
    <div class="desktop_menu_body">
        <img src="{{asset('assets/img/dektopLogo.png') }}" alt="" class="img-fluid">
        <div class="auth_button">
            @if(! isset(Auth::user()->name))
            <a class="enrollemnt_button" data-toggle="modal" data-target="#enrollmentModal">הרשמה</a>
            @else
            <a class="enrollemnt_button" href="{{route('dashboard')}}"> לוּחַ מַחווָנִים </a>
            @endif
            <a href="">התחברות</a>
            
        </div>
        <div class="desktop_menu_list">
            <ul>
                <li>
                    <a href="">איזור אישי <img src="{{asset('assets/img/mobile_component/home.png') }}" alt=""
                            class="img-fluid"></a>
                </li>
                <li>
                    <a href="">כתבות צרכנות <img src="{{asset('assets/img/mobile_component/wallet.png') }}" alt=""
                            class="img-fluid"></a>
                </li>
                <li>
                    <a href="">הודעות <img src="{{asset('assets/img/mobile_component/consumption.png') }}" alt=""
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
                    <a href="">הודעות <img src="{{asset('assets/img/message_icon.png') }}" alt=""
                            class="img-fluid"></a>
                </li>
                <li>
                    <a href="">חיפוש <img src="{{asset('assets/img/mobile_search.png') }}" alt=""
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
            <div class="logout_user">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><img src="{{asset('assets/img/mobile_component/logout_icon.png') }}" alt=""
                        class="img-fluid"></a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>