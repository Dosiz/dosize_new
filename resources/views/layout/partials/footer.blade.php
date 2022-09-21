<footer>
    <div class="footer_list box_shahdow">
        <ul>
            <li>
                <a class="open_mobile_menu">
                    <div class="footer_item">
                        <img src="{{asset('assets/img/mobile_component/menu.svg') }}" alt="" class="img-fluid">
                        <p class="font-size-12 font-weight-400">תפריט</p>
                    </div>
                </a>
            </li>
            <li>
                <a href="{{route('city-brands')}}">
                    <div class="footer_item">
                        <img src="{{asset('assets/img/mobile_component/consumption.svg') }}" alt="" class="img-fluid">
                        <p class="font-size-12 font-weight-400">הודעות </p>
                    </div>
                </a>
            </li>
            <li>
                @if(! isset(Auth::user()->name))
                <a href="" data-toggle="modal" data-target="#enrollmentModal2">
                    <div class="footer_item">
                        <img src="{{asset('assets/img/mobile_component/wallet.svg') }}" alt="" class="img-fluid">
                        <p class="font-size-12 font-weight-400">תפריט</p>
                    </div>
                </a>
                @else
                <a href="{{route('user.wallet')}}">
                    <div class="footer_item">
                        <img src="{{asset('assets/img/mobile_component/wallet.svg') }}" alt="" class="img-fluid">
                        <p class="font-size-12 font-weight-400">הארנק</p>
                    </div>
                </a>
                @endif
            </li>
            <li class="active" style="margin:0px 31px 0px 0px !important;">
                <a href="https://beitar-illit.arikliger.com">
                    <div class="footer_item">
                        <img src="{{asset('assets/img/mobile_component/home.svg') }}" alt="" class="img-fluid">
                        <p class="font-size-12 font-weight-400">דף הבית</p>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</footer>