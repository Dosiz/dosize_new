<header>
    <div class="top_header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <ul>
                        <li>
                            <img src="{{asset('assets/img/mobile_search.png') }}" alt="" class="img-fluid">
                        </li>
                        <li>
                            <img src="{{asset('assets/img/tag_icon.png') }}" alt="" class="img-fluid">
                        </li>
                    </ul>
                </div>
                <div class="col-6 text-right">
                    <a class="logo">
                        <img src="{{asset('assets/img/mobileLogo.png') }}" alt="" class="img-fluid">
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