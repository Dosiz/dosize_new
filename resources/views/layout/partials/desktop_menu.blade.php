<div class="desktop_menu">
    <div class="desktop_menu_body">
        <img src="{{asset('assets/img/dektopLogo.png') }}" alt="" class="img-fluid">
        <div class="auth_button">
            @if(! isset(Auth::user()->name))
            <a class="enrollemnt_button" data-toggle="modal" data-target="#enrollmentModal2">הרשמה</a>
            <a href="" data-toggle="modal" data-target="#enrollmentModal">התחברות</a>
            @else
                @if(Auth::user()->hasRole('User'))
                    <p> ברוך הבא {{Auth::user()->name }} </p>
                @else
                <a class="enrollemnt_button" href="{{route('dashboard')}}"> לוּחַ מַחווָנִים </a>
                @endif
            @endif
            
        </div>
        <div class="desktop_menu_list">
            <ul>
                <li>
                    <a href="{{url('/')}}">איזור אישי <img src="{{asset('assets/img/mobile_component/home.png') }}" alt=""
                            class="img-fluid"></a>
                </li>
                @if(! isset(Auth::user()->name))
                    <li>
                        <a href="" data-toggle="modal" data-target="#enrollmentModal2">כתבות צרכנות <img src="{{asset('assets/img/mobile_component/wallet.png') }}" alt=""
                                class="img-fluid"></a>
                    </li>
                @else
                    <li>
                        <a href="{{route('user.wallet')}}">כתבות צרכנות <img src="{{asset('assets/img/mobile_component/wallet.png') }}" alt=""
                                class="img-fluid"></a>
                    </li>
                @endif
                @php 
                    $check_user = \App\Models\User::where('id',Auth::id())->whereHas('roles', function($q){ $q->where('name', 'User'); })->first();
                    // dd($check_user);
                @endphp
                @if(isset($check_user))
                    <li>
                        <a href="{{route('user-order')}}"> הזמנות <img src="{{asset('assets/img/mobile_component/wallet.png') }}" alt=""
                                class="img-fluid"></a>
                    </li>
                @endif

                <li>
                    <a href="{{route('city-brands')}}">הודעות <img src="{{asset('assets/img/mobile_component/consumption.png') }}" alt=""
                            class="img-fluid"></a>
                </li>
                <!-- Need to add all archived categoies heref for the city -->
                <li>
                    <a href="{{route('archive_cat')}}">התראות <img src="{{asset('assets/img/mobile_component/shopping_icon.png') }}" alt=""
                            class="img-fluid"></a>
                </li>
            </ul>
            <div class="line"></div>
            <ul>
                 <!-- Need to add  profile link here -->
                <li>
                    @guest
                    <a href="" data-toggle="modal" data-target="#enrollmentModal2">איזור אישי <img src="{{asset('assets/img/mobile_component/user_icon.png') }}" alt=""
                            class="img-fluid"></a>
                    @else
                    <a href="">איזור אישי <img src="{{asset('assets/img/mobile_component/user_icon.png') }}" alt=""
                        class="img-fluid"></a>
                    @endif
                </li>
                <li>
                    @guest
                    <a href="" data-toggle="modal" data-target="#enrollmentModal2">שמורים <img src="{{asset('assets/img/tag_icon.png') }}" alt=""
                            class="img-fluid"></a>
                    @else
                    <a href="{{route('bookmarks')}}">שמורים <img src="{{asset('assets/img/tag_icon.png') }}" alt=""
                        class="img-fluid"></a>
                    @endguest
                </li>
                <li>
                    @guest
                    <a href="" data-toggle="modal" data-target="#enrollmentModal2">הודעות <img src="{{asset('assets/img/message_icon.png') }}" alt=""
                            class="img-fluid"></a>
                    @else
                    <a href="{{route('user-message','id='.Auth::user()->id)}}">הודעות <img src="{{asset('assets/img/message_icon.png') }}" alt=""
                        class="img-fluid"></a>
                    @endguest
                </li>
                <li>
                    <a href=""  data-toggle="modal" data-target="#searchModal">חיפוש<img src="{{asset('assets/img/mobile_search.png') }}" alt=""
                            class="img-fluid"></a>
                </li>
            </ul>
            @guest
            @else
            <div class="logout_user">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >התנתקות <img src="{{asset('assets/img/mobile_component/logout_icon.png') }}" alt=""
                        class="img-fluid">
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
            @endguest
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

