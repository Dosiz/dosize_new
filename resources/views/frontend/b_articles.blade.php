@extends('layout.brand_signup')
@section('title')
פרופיל המותג
@endsection
@push('styles')
@endpush
@section('content') 
<section id="articleBanner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <h2>הכתבות והמאמרים שלנו</h2>
            </div>
        </div>
    </div>
</section>
<div class="lineDiv">
    <img src="{{asset('assets/img/user/line 2.png')}}" alt="">
</div>
<section id="multiArticle" style="padding-bottom: 50px;">
    <div class="articleCommon">
        <div class="container-fluid">
            <div class="multiDiv">
                <div class="row">
                    @foreach($articles as $article)
                    <div class="col-md-4 mb-3">
                        <div class="articleCard">
                            {{-- <div class="badgeDiv">
                                <img src="{{asset('assets/img/user/badge.png')}}" alt="">
                                <span class="whishlistText">
                                    @php $likes = App\Models\Like::where('blog_id', $article->id)->get(); @endphp
                                    <span>{{count($likes ?? '0')}}</span>
                                    <img src="{{asset('assets/img/user/heart.png')}}" alt="">
                                </span>
                            </div> --}}
                            <div class="d-flex" style="height: 100%">
                                <a href="{{url('brand_article',$article->id)}}"> 
                                    <img src="{{asset('blog/'.$article->image ?? '')}}" alt="" style="width:131px; height:100%;" class="img-flui">
                                </a>

                                <div class="articleInfo">
                                    {{-- <div class="dateInput">
                                    <a href="{{url('article',$article->id)}}"> <img src="{{asset('assets_admin/img/calendar.png')}}" alt="" style="width:18px !important; height: 18px !important;"></a>
                                    <span style="border: none;color: #747474;font-size: 12px;font-family: PloniRegular;">{{ date('Y/m/d', strtotime($article->created_at)) }}</span>
                                    </div> --}}
                                    <a href="{{url('brand_article',$article->id)}}"><h3>{{$article->title ?? '2022 ויתס םלוהקוטשב הנפואה עובשמ רתויב בוטה בוחרה ןונגס'}}</h3>
                                    <p> {!! \Illuminate\Support\Str::limit(str_replace('&nbsp;', ' ', $article->sub_title ?? ''),20) !!} </p></a>
                                    <p>
                                        <i class="fa fa-heart" aria-hidden="true" style="color: #db1580 !important;"></i>
                                        @php $likes = App\Models\Like::where('blog_id', $article->id)->get(); @endphp
                                        <span>{{count($likes ?? '0')}}</span>
                                        
                                    </p>
                                    {{-- <div class="readMore">
                                        <p>
                                            <a href="{{url('article',$article->id)}}"> טען עוד<i class="fa fa-angle-double-left" aria-hidden="true"></i></a>
                                        </p>
                                    </div> --}}
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="row mt-80">
        <div class="col-12 text-center">
            <button class="commonBtn"> קרא עוד </button>
        </div>
    </div> --}}
</section>

@endsection
<!-- The Modal -->
  
@section('js')
<script>


</script>
@endsection
