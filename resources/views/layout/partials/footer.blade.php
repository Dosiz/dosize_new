<footer>
    <div class="footer_list box_shahdow">
        <ul>
            <li>
                <a class="open_mobile_menu">
                    <div class="footer_item">
                        <img src="{{asset('assets/img/mobile_component/menu.png') }}" alt="" class="img-fluid">
                        <p class="font-size-12 font-weight-400">תפריט</p>
                    </div>
                </a>
            </li>
            <li>
                <a href="{{route('city-brands',2)}}">
                    <div class="footer_item">
                        <img src="{{asset('assets/img/mobile_component/consumption.png') }}" alt="" class="img-fluid">
                        <p class="font-size-12 font-weight-400">הודעות </p>
                    </div>
                </a>
            </li>
            <li>
                @if(! isset(Auth::user()->name))
                <a href="" data-toggle="modal" data-target="#enrollmentModal2">
                    <div class="footer_item">
                        <img src="{{asset('assets/img/mobile_component/wallet.png') }}" alt="" class="img-fluid">
                        <p class="font-size-12 font-weight-400">תפריט</p>
                    </div>
                </a>
                @else
                <a href="{{route('user.wallet')}}">
                    <div class="footer_item">
                        <img src="{{asset('assets/img/mobile_component/wallet.png') }}" alt="" class="img-fluid">
                        <p class="font-size-12 font-weight-400">כתבות צרכנות </p>
                    </div>
                </a>
                @endif
            </li>
            <li class="active">
                <a href="{{route('landing-page',5)}}">
                    <div class="footer_item">
                        <img src="{{asset('assets/img/mobile_component/home.png') }}" alt="" class="img-fluid">
                        <p class="font-size-12 font-weight-400">איזור אישי </p>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</footer>