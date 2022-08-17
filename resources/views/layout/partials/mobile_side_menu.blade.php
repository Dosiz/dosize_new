<div class="mobile_side_menu">
    <h4>צהריים טובים!</h4>
    <div class="auth_button">
        <a class="enrollemnt_button" data-toggle="modal" data-target="#enrollmentModal">הרשמה</a>
        <a href="">התחברות</a>
    </div>
    <div class="mobile_menu_list">
        <ul>
            <li>
                <a href="">איזור אישי <img src="{{asset('assets/img/mobile_component/userIcon.png') }}" alt=""
                        class="img-fluid"></a>
            </li>
            <li>
                <a href="{{route('user.wallet')}}">כתבות צרכנות <img src="{{asset('assets/img/mobile_component/cartIcon.png') }}" alt=""
                        class="img-fluid"></a>
            </li>
            <li>
                
                @guest
                <a href="" data-toggle="modal" data-target="#enrollmentModal2">הודעות <img src="{{asset('assets/img/mobile_component/messageIcon.png') }}" alt="" class="img-fluid"></a>
                @else
                <a href="{{route('user-message')}}">הודעות <img src="{{asset('assets/img/mobile_component/messageIcon.png') }}" alt="" class="img-fluid"></a>
                @endguest
            </li>
            <li>
                <a href="{{route('archive_cat')}}">התראות <img src="{{asset('assets/img/mobile_component/bellIcon.png') }}" alt=""
                        class="img-fluid"></a>
            </li>
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><img src="{{asset('assets/img/mobile_component/logout_icon.png') }}" alt=""
                    class="img-fluid"></a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            </li>
        </ul>
    </div>
</div>