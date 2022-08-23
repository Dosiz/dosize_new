<!DOCTYPE html>
<html lang="en">
<head>
  @include('layout.partials.head')
  @if(isset($blog))
    <meta property="og:title" content="{{$blog->title ?? ''}}">
    <link href="{{asset('blog/'.$blog->image ?? '') ?? '../assets_admin/img/logo.png'}}" rel="icon">
    <meta property="og:locale" content="he_IL" />
    <meta property="og:type" content="article" />
    <meta property="og:site_name" content="דוסיז צרכנות" />
    <meta property="og:url" content="http://arikliger.com/article/{{$blog->id ?? ''}}/%d7%91%d7%99%d7%aa-%d7%94%d7%90%d7%95%d7%a4%d7%a0%d7%94-golbary-%d7%9e%d7%a9%d7%99%d7%a7-%d7%a7%d7%95%d7%9c%d7%a7%d7%a6%d7%99%d7%99%d7%aa-%d7%91%d7%99%d7%a9%d7%95%d7%9d-%d7%9c%d7%a0%d7%a9%d7%99%d7%9d/" />
    <meta property="og:image:alt" content="{{$blog->title ?? ''}}" />
    <meta name="twitter:title" content="{{$blog->title ?? ''}}" />
    <meta property="og:image" content="{{asset('blog/'.$blog->image ?? '')}}" />
    <meta property="og:image:secure_url" content="{{asset('blog/'.$blog->image ?? '')}}" />
    <meta property="og:image:width" content="999" />
    <meta property="og:image:height" content="984" />
    <meta name="twitter:image" content="{{asset('blog/'.$blog->image ?? '')}}" />
    <meta name="twitter:description" content="{{$blog->description ?? ''}}" />
   @endif
    
</head>
<body>
    <div class="bg_color">
      @include('layout.partials.article_header')
      @yield('content')
      @include('layout.partials.footer')

    </div>
    <!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
          </div>
      <div class="modal-body">
                  <form action="{{route('search-product')}}" method="POST" class="form-inline">
                      @csrf
                      <div class="form-group searchInput mx-sm-3 mb-2">
                          <label for="search" class="sr-only">Search kmkm</label>
                          <input type="Search" class="form-control" id="search" name="search_product" placeholder="Search">
                      </div>
                      <button type="submit" class="btn btn-primary mb-2" style="background-color: #db1580; border-color:#db1580">Search</button>
                  </form>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade enrollmentModel" id="enrollmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document" style="top: 0; left: 0;">
          <div class="modal-content modelNonscroll">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">הרשמה</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="formDiv">
                      <form action="{{ route('register') }}" method="POST">
                          @csrf
                          <div class="inputDiv">
                              <label for="" class="font-size-16">שם</label>
                              <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                              <span class="text-danger name_valid"></span>
                          </div>
                          <div class="inputDiv">
                              <label for="" class="font-size-16">עיר</label>
                              <select name="city_id" id="city_id">
                                  <option selected disabled value="">בחר מתוך הרשימה</option>
                                  @foreach($cities as $city)
                                      <option value="{{$city->id}}"> {{$city->name}} </option>
                                  @endforeach
                              </select>
                              <span class="text-danger city_valid"></span>
                          </div>
                          <div class="inputDiv">
                              <label for="" class="font-size-16">דוא”ל</label>
                              <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                              <span class="text-danger email_valid"></span>
                          </div>
                          <div class="inputDiv">
                              <label for="" class="font-size-16">סיסמה</label>
                              <div class="password_div">
                                  <input id="password" type="password" name="password" required autocomplete="new-password">
                                  <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                  <span class="text-danger password_valid"></span>
                              </div>
                          </div>
                          <div class="checkBox_div">
                              <input type="checkbox" name="" id="approve" checked>
                              <label for="approve" class="font-size-16">אני מאשר קבלת תכנים מדוסיז צרכנות.</label>
                          </div>
                          <div class="checkBox_div">
                              <input type="checkbox" name="" id="policy" checked>
                              <label for="policy" class="font-size-16">אני מסכים <a href="">למדיניות</a>
                                  המערכת...</label>
                          </div>
                          <button type="submit" class="font-size-16" style="cursor: pointer;">הרשמה</button>
                          <div class="sign_up_with">
                              <h6 class="text-center">או הרשם עם</h6>
                              <div class="signup_btn">
                                <a href="{{route('auth.facebook')}}">
                                    <img src="{{ asset('assets/img/mobile_component/facebookIcon.png') }}" alt=""
                                        class="img-fluid">
                                </a>
                                <a href="{{route('auth.google')}}">
                                    <img src="{{ asset('assets/img/mobile_component/googleIcon.png') }}" alt=""
                                        class="img-fluid">
                                </a>
                              </div>
                          </div>
                          <!-- <div class="d-flex justify-content-center mt-4">
                              <a href="" id="signup_btn" class="text-dark">
                                  <b>אין לכם חשבון? לחצו כאן להרשמה > </b>
                              </a>
                          </div> -->
                      </form>
                  </div>
              </div>
          </div>
          
      </div>
  </div>
  <!-- 2nd -->
  <div class="modal fade enrollmentModel" id="enrollmentModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document" style="top: 0; left: 0;">
      <div class="modal-content" id="login-moda">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">התחברות</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="formDiv">
                      <form action="{{ route('login') }}" method="POST">
                          @csrf
                          <div class="inputDiv">
                              <label for="" class="font-size-16">דוא”ל</label>
                              <input id="email" type="email" name="email" required value="{{ old('email') }}" required autocomplete="email" autofocus>
                              <span class="text-danger email_valid"></span>
                          </div>
                          <div class="inputDiv">
                              <label for="" class="font-size-16">סיסמה</label>
                              <div class="password_div">
                                  <input id="password" type="password" name="password" required autocomplete="current-password">
                                  <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                  <span class="text-danger password_valid"></span>
                              </div>
                          </div>
                          <button type="submit" class="font-size-16" style="cursor: pointer;"> הרשמה </button>
                          <div class="sign_up_with">
                              <h6 class="text-center">התחברו עם </h6>
                              <div class="signup_btn">
                                  <a href="{{route('auth.facebook')}}">
                                      <img src="{{ asset('assets/img/mobile_component/facebookIcon.png') }}" alt=""
                                          class="img-fluid">
                                  </a>
                                  <a href="{{route('auth.google')}}">
                                      <img src="{{ asset('assets/img/mobile_component/googleIcon.png') }}" alt=""
                                          class="img-fluid">
                                  </a>
                              </div>
                          </div>
                          <!-- <div class="d-flex justify-content-center mt-4">
                              <a href="" id="login_btn" class="text-dark">
                              </b> אין לכם חשבון? לחצו כאן להרשמה > </b>
                              </a>
                          </div> -->
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
    <script src="https://cdn.enable.co.il/licenses/enable-L12268se734xbazj-0822-30217/init.js"></script>
</body>
@include('layout.partials.footer_scripts')
@toastr_js
@toastr_render

</html>