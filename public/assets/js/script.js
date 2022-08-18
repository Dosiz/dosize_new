function get_input_value(coin,product_id)
    {
        $('[name="coins"]').val(coin)
        $('[name="product_id"]').val(product_id)
    }
const swiper = new Swiper('.swiper', {
    direction: 'horizontal',
    // slidesPerView: "auto",
    breakpoints: {
      // when window width is >= 320px
      1500: {
        slidesPerView: 4,
        spaceBetween: 20
      },
      // when window width is >= 640px
      1024: {
        slidesPerView: 4,
        spaceBetween: 20
      },
      768:{
        slidesPerView: 3,
        spaceBetween: 10
      },
      500:{
        slidesPerView: 2,
        spaceBetween: 10
      },
      300:{
        slidesPerView: 1,
        spaceBetween: 10
      },
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    
  });
  const swiper_article = new Swiper('.swiper_article', {
    direction: 'horizontal',
    slidesPerView: "auto",
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });
  const swiper_category = new Swiper('.myCategorySlider', {
    direction: 'horizontal',
    slidesPerView: 5,
    // slidesPerView: "auto",
    loop: true,
    
    breakpoints: {
      // when window width is >= 320px
      320: {
        slidesPerView: 5,
        spaceBetween: 0
      },
      // when window width is >= 640px
      1024: {
        slidesPerView: 5,
        spaceBetween: 40
      },
      768: {
        slidesPerView: 6,
        spaceBetween: 20
      },
      1600: {
        slidesPerView: 10,
        spaceBetween: 20
      }
    }
  });
  $(".inbox_header .drop_down_icon").click(function(){
    $(this).addClass("active")
    $(".inbox_header .drop_down_menu").addClass("show")
  })
  $(document).click(function(e) {
    e.stopPropagation();
    if (!$(event.target).closest('.drop_down_icon ').length && !$(event.target).closest('.inbox_header .drop_down_menu').length) {
        console.log("hello")
        $(".inbox_header .drop_down_menu").removeClass("show")
        $(".inbox_header .drop_down_icon").removeClass("active")
    }
});
$(window).scroll(function() {    
  var scroll = $(window).scrollTop();    
  if (scroll >= 10) {
      $("header").addClass("header_active");
  } else{
    $("header").removeClass("header_active");
  }
});
$(".open_mobile_menu").click(function(){
  if($("header .mobile_menu").css("left")=="-500px"){
    $("header .mobile_menu").css("left","0px");
    $("header").css("overflow","initial")
  } else{
    $("header .mobile_menu").css("left","-500px");
    $("header").css("overflow","hidden")
  }
})
$(".logo").click(function(){
  $(".main_page").toggleClass("changed_position");
})
$(".enrollemnt_button").click(function(){
  $(".main_page").removeClass("changed_position");
  $("footer").css("z-index","0")
})
$(".password_div i").click(function(){
  if($(".password_div input").attr("type")=="password"){
    $(".password_div input").attr("type","text")
  } else{
    $(".password_div input").attr("type","password")
  }
})
