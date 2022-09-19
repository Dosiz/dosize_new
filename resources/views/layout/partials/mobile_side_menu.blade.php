<div class="mobile_side_menu">
    <h4>צהריים טובים!</h4>
    <div class="auth_button">
        @if(! isset(Auth::user()->name))
            <a class="enrollemnt_button" data-toggle="modal" data-target="#enrollmentModal2">הרשמה</a>
            <a href="" data-toggle="modal" data-target="#enrollmentModal">התחברות</a>
        @else
            @if(Auth::user()->hasRole('User'))
                <p style="color:aliceblue"> ברוך הבא {{Auth::user()->name }} </p>
            @else
            <a class="enrollemnt_button" href="{{route('dashboard')}}"> לוּחַ מַחווָנִים </a>
            @endif
        @endif
    </div>
    <div class="mobile_menu_list">
        <ul>
            <li>
                <a href="{{route('user.personal_area')}}">איזור אישי <img src="{{asset('assets/img/mobile_component/userIcon.png') }}" alt=""
                        class="img-fluid"></a>
            </li>
            <li>
                @guest
                    <a href="" data-toggle="modal" data-target="#enrollmentModal2">כתבות צרכנות <img src="{{asset('assets/img/mobile_component/wallet_mobile.png') }}" alt="" class="img-fluid"></a>
                @else
                    <a href="{{route('user.wallet')}}">כתבות צרכנות <img src="{{asset('assets/img/mobile_component/wallet_mobile.png') }}" alt="" class="img-fluid"></a>
                @endguest
            </li>
            <li>
                
                @guest
                <a href="" data-toggle="modal" data-target="#enrollmentModal2">הודעות <img src="{{asset('assets/img/mobile_component/messageIcon.png') }}" alt="" class="img-fluid"></a>
                @else
                @if(Auth::user()->hasRole('User'))
                    <a href="{{route('user-message')}}">הודעות <img src="{{asset('assets/img/mobile_component/messageIcon.png') }}" alt="" class="img-fluid"></a>
                @elseif(Auth::user()->hasRole('Brand'))
                    <a href="{{url('brand/messages')}}">הודעות <img src="{{asset('assets/img/mobile_component/messageIcon.png') }}" alt="" class="img-fluid"></a>
                @endif
                @endguest
            </li>
            <li>
                <a href="{{route('archive_cat')}}">התראות <img src="{{asset('assets/img/mobile_component/cartIcon.png') }}" alt=""
                        class="img-fluid"></a>
            </li>
            @guest
            @else
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">התנתקות <img src="{{asset('assets/img/mobile_component/logoutIcon.png') }}" alt=""
                    class="img-fluid"></a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
                @csrf
            </form>
            </li>
            @endguest
        </ul>
    </div>
</div>