<div class="desktop_menu">
    <div class="desktop_menu_body">
        <img src="{{asset('assets/img/mobile_component/dektopLogo.svg') }}" alt="" class="img-fluid">
        <div class="auth_button">
            @if(! isset(Auth::user()->name))
            <a class="enrollemnt_button" data-toggle="modal" data-target="#enrollmentModal2">התחברות</a>
            <a href="" data-toggle="modal" data-target="#enrollmentModal">הרשמה</a> 
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
                    <a href="{{url('/')}}">אזור אישי‎‎ <img src="{{asset('assets/img/mobile_component/home.svg') }}" alt=""
                            class="img-fluid"></a>
                </li>
                @if(! isset(Auth::user()->name))
                    <li>
                        <a href="" data-toggle="modal" data-target="#enrollmentModal2">הארנק‎ <img src="{{asset('assets/img/mobile_component/wallet.svg') }}" alt=""
                                class="img-fluid"></a>
                    </li>
                @else
                    <li>
                        <a href="{{route('user.wallet')}}">הארנק‎ <img src="{{asset('assets/img/mobile_component/wallet.svg') }}" alt=""
                                class="img-fluid"></a>
                    </li>
                @endif
                @php 
                    $check_user = \App\Models\User::where('id',Auth::id())->whereHas('roles', function($q){ $q->where('name', 'User'); })->first();
                    // dd($check_user);
                @endphp
                @if(isset($check_user))
                    <li>
                        <a href="{{route('user-order')}}"> המתנות שלי‎ <img src="{{asset('assets/img/mobile_component/gift-box.png') }}" alt=""
                                class="img-fluid"></a>
                    </li>
                @endif

                <li>
                    <a href="{{route('city-brands')}}">מועדוני צרכנות‎‎ <img src="{{asset('assets/img/mobile_component/consumption.svg') }}" alt=""
                            class="img-fluid"></a>
                </li>
                <!-- Need to add all archived categoies heref for the city -->
                <li>
                    <a href="{{route('archive_cat')}}">קטגוריות‎ <img src="{{asset('assets/img/mobile_component/shopping_icon.svg') }}" alt=""
                            class="img-fluid"></a>
                </li>
            </ul>
            <div class="line"></div>
            <ul>
                 <!-- Need to add  profile link here -->
                <li>
                    @guest
                    <a href="" data-toggle="modal" data-target="#enrollmentModal2">איזור אישי <img src="{{asset('assets/img/mobile_component/user_icon.svg') }}" alt=""
                            class="img-fluid"></a>
                    @else
                    <a href="">אזור אישי‎‎ <img src="{{asset('assets/img/mobile_component/user_icon.svg') }}" alt=""
                        class="img-fluid"></a>
                    @endif
                </li>
                <li>
                    @guest
                    <a href="" data-toggle="modal" data-target="#enrollmentModal2">שמורים <img src="{{asset('assets/img/mobile_component/tag_icon.svg') }}" alt=""
                            class="img-fluid"></a>
                    @else
                    <a href="{{route('bookmarks')}}">שמורים <img src="{{asset('assets/img/mobile_component/tag_icon.svg') }}" alt=""
                        class="img-fluid"></a>
                    @endguest
                </li>
                <li>
                    @guest
                    <a href="" data-toggle="modal" data-target="#enrollmentModal2">המתנות שלי‎ <img src="{{asset('assets/img/mobile_component/message_icon.svg') }}" alt=""
                            class="img-fluid"></a>
                    @else
                    @if(Auth::user()->hasRole('User'))
                        <a href="{{route('user-message','id='.Auth::user()->id)}}">צ'אט ועידכונים‎ <img src="{{asset('assets/img/mobile_component/message_icon.svg') }}" alt=""
                        class="img-fluid"></a>
                    @elseif(Auth::user()->hasRole('Brand'))
                        <a href="{{url('brand/messages')}}">צ'אט ועידכונים‎ <img src="{{asset('assets/img/mobile_component/message_icon.svg') }}" alt=""
                        class="img-fluid"></a>
                    @endif
                    @endguest
                </li>
                <li>
                    <a href=""  data-toggle="modal" data-target="#searchModal">חיפוש<img src="{{asset('assets/img/mobile_component/mobile_search.svg') }}" alt=""
                            class="img-fluid"></a>
                </li>
            </ul>
            @guest
            @else
            <div class="logout_user">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >התנתקות <img src="{{asset('assets/img/mobile_component/logout_icon.svg') }}" alt=""
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
        <img src="{{asset('assets/img/mobile_component/tablet_logo.svg') }}" alt="" class="img-fluid">
        <div class="desktop_menu_list">
            <ul>
                <li >
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
            @guest
            @else
            <div class="logout_user">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><img src="{{asset('assets/img/mobile_component/logout_icon.svg') }}" alt=""
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

