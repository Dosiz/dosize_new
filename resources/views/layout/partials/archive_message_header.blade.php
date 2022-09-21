<header>
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
                <a href="">
                    <img src="{{asset('assets/img/mobile_component/mobileLogo.svg') }}" alt="" class="img-fluid">
                </a>
            </div>
        </div>
    </div>
</header>