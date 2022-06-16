const swiper = new Swiper('.swiper', {
    direction: 'horizontal',
    slidesPerView: "auto",
  });
  const swiper_article = new Swiper('.swiper_article', {
    direction: 'horizontal',
    slidesPerView: "auto",
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });
  $("header.inbox_header .drop_down_icon").click(function(){
    $(this).addClass("active")
    $("header .drop_down_menu").addClass("show")
  })
  $(document).click(function(e) {
    e.stopPropagation();
    if (!$(event.target).closest('.drop_down_icon ').length && !$(event.target).closest('header .drop_down_menu').length) {
        console.log("hello")
        $("header .drop_down_menu").removeClass("show")
        $("header.inbox_header .drop_down_icon").removeClass("active")
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
  $(".main_page").addClass("changed_position");
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