<header>
    <div class="top_header article_header">
        <div class="desktop_article_header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <ul>
                            <li>
                                <img src="{{ asset('assets/img/mobile_search.png') }}" alt="" class="img-fluid">
                            </li>
                            <li>
                                <img src="{{ asset('assets/img/tag_icon.png') }}" alt="" class="img-fluid">
                            </li>
                        </ul>
                    </div>
                    <div class="col-6 text-right">
                        <a class="logo">
                            <img src="{{ asset('assets/img/mobileLogo.png') }}" alt="" class="img-fluid">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="mobile_header box_shahdow">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <button class="share_button" id="shareButton">
                            <img src="{{ asset('assets/img/mobile_component/shareBtn.png') }}" alt=""
                                class="img-fluid desktop_hide">
                            <img src="{{ asset('assets/img/mobile_component/white_share_btn.png') }}" alt=""
                                class="img-fluid mobile_hide">
                            <span class="font-size-14">שתפו</span>
                        </button>
                    </div>
                    <div class="col-6 text-right"
                        style="display: flex; justify-content: flex-end; align-items: center;">
                        <div class="heart_tag_message_list">
                            <ul>
                                <li>
                                    @if(count($blog_comments) > 0)
                                    <span class="comment_count"> {{count($blog_comments)}} </span>
                                    @else
                                    <span class="comment_count"> 0 </span>
                                    @endif
                                    <img src="{{ asset('assets/img/mobile_component/notificationIcon.png') }}" alt=""
                                        class="img-fluid desktop_hide">
                                    <img src="{{ asset('assets/img/mobile_component/white_notification.png') }}" alt=""
                                        class="img-fluid mobile_hide">
                                </li>
                                <li>
                                    <form id="">
                                        @csrf
                                        @if(count($blog_likes) > 0)
                                        <span class="like_count"> {{count($blog_likes)}} </span>
                                        @else
                                        <span class="like_count"> 0 </span>
                                        @endif
                                        {{-- <img src="{{ asset('assets/img/mobile_component/fillHeart.png') }}" alt="" --}}
                                            {{-- class="img-fluid"> --}}
                                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                        @if($blog_like)
                                        <span id="heart" class="nav_ftn_icon cursor-pointer blog_like active"><i class="fa fa-heart" aria-hidden="true"></i></span>
                                        @else
                                        <span id="heart" class="nav_ftn_icon cursor-pointer blog_like"><i class="fa fa-heart" aria-hidden="true"></i></span>
                                        @endif
                                    </form>
                                </li>
                                <li>
                                    <form id="">
                                        @csrf
                                        @if(count($blog_bookmarks) > 0)
                                        <span class="bookmark_count"> {{count($blog_bookmarks)}} </span>
                                        @else
                                        <span class="bookmark_count"> 0 </span>
                                        @endif
                                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                        @if($blog_bookmark)
                                        <span id="save" class="nav_ftn_icon active"><i class="fa fa-bookmark blog_bookmark " aria-hidden="true"></i></span>
                                        @else
                                        <span id="save" class="nav_ftn_icon"><i class="fa fa-bookmark blog_bookmark" aria-hidden="true"></i></span>
                                        @endif
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
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
