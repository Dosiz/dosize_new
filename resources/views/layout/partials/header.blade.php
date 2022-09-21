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
                            <a href="" data-toggle="modal" data-target="#enrollmentModal2"><img src="{{asset('assets/img/tag_icon.png') }}" alt=""
                                    class="img-fluid"></a>
                            @else
                            <a href="{{route('bookmarks')}}"> <img src="{{asset('assets/img/tag_icon.svg') }}" alt=""
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
    @include('layout.partials.desktop_menu')
</header>