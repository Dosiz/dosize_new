@extends('layout.brand_signup')
@section('title')
{{$brand_profile->brand_name ?? '' }}
@endsection
@push('styles')
<style>
    

</style>
@endpush
@section('content') 
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-Q0VQ8NJD2C"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-Q0VQ8NJD2C');
</script>



@endsection
<!-- The Modal -->
  
@section('js')
<script>
    $('.brandSlider').slick({
    infinite: true,
    slidesToShow: 5,
    slidesToScroll: 1,
    rtl: true,
    arrows: true,
    responsive: [
            {
            breakpoint: 1200,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 1,
            }
            },
            {
            breakpoint: 768,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1
            }
            },
            {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
});
$('.productSlider').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    rtl: true,
    arrows: true,
    responsive: [
            {
            breakpoint: 992,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
            }
            },
            {
            breakpoint: 768,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1
            }
            },
            {
            breakpoint: 480,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1
            }
            }
        ]
});
$(".productSlider .sliderImg img").click(function(){
    console.log("here")
    var src=$(this).attr("src");
    $(".sliderDiv .mainImg img").attr("src", src)
});

$('.articleSlider').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    rtl: true,
    arrows: true,
    responsive: [
            {
            breakpoint: 992,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
            }
            },
            {
            breakpoint: 768,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1
            }
            },
            {
            breakpoint: 480,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1
            }
            }
        ]
});
$(".articleSlider .sliderImg img").click(function(){
    console.log("here")
    var src=$(this).attr("src");
    $(".sliderDiv .detailImg img").attr("src", src)
});

</script>
@endsection
