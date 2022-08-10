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
                    <div class="col-md-4">
                        <div class="articleCard">
                            <div class="badgeDiv">
                                <img src="{{asset('assets/img/user/badge.png')}}" alt="">
                                <span class="whishlistText">
                                    @php $likes = App\Models\Like::where('blog_id', $article->id)->get(); @endphp
                                    <span>{{count($likes ?? '0')}}</span>
                                    <img src="{{asset('assets/img/user/heart.png')}}" alt="">
                                </span>
                            </div>
                            <a href="{{url('article',$article->id)}}"> <img src="{{asset('blog/'.$article->image ?? '')}}" alt="" style="width:396px; height:268px;" class="img-fluid"></a>
                            <div class="articleInfo">
                                <div class="dateInput">
                                <a href="{{url('article',$article->id)}}"> <img src="{{asset('assets_admin/img/calendar.png')}}" alt="" style="width:18px !important; height: 18px !important;"></a>
                                <span style="border: none;color: #747474;font-size: 12px;font-family: PloniRegular;">{{ date('Y/m/d', strtotime($article->created_at)) }}</span>
                                </div>
                                <a href="{{url('article',$article->id)}}"><h3>{{$article->title ?? '2022 ויתס םלוהקוטשב הנפואה עובשמ רתויב בוטה בוחרה ןונגס'}}</h3></a>
                                <p>{{$article->sub_title }} </p>
                                <div class="readMore">
                                    <p>
                                        <a href="{{url('article',$article->id)}}"> טען עוד<i class="fa fa-angle-double-left" aria-hidden="true"></i></a>
                                    </p>
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
