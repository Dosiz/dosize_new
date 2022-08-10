
<?php $__env->startSection('title'); ?>
פרופיל המותג
<?php $__env->stopSection(); ?>
<?php $__env->startPush('styles'); ?>
<style>
    

</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?> 
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-Q0VQ8NJD2C"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-Q0VQ8NJD2C');
</script>
<section id="brandBanner">
    <div class="container-fluid">
        <div class="row">
            
            <div class="col-md-6">
                <div class="brandMainIntro">
                    
                    
                    <h1><?php echo e($brand_profile->brand_name ?? ''); ?></h1>
                    <p><?php echo e($brand_profile->description); ?></p>
                </div>
            </div>
            <div class="col-md-6 text-left">
                <div class="brandMainImg">
                    <img src="<?php echo e(asset('brand_image/'.$brand_profile->brand_image ?? '')); ?>" style="width: 590px; height:561px;" alt="" class="img-fluid"> 
                </div>
            </div>
        </div>
    </div>
</section>
<?php if(count($brand_products) > 0): ?>
<section id="sliderSection">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>המוצרים שלנו </h2>
                <div class="brandSlider">
                    <?php if($brand_products): ?>
                        <?php $__currentLoopData = $brand_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="sliderCommonDiv" style="">
                            <a href="<?php echo e(url('product/' .$product->id)); ?>" > 
                                <img src="<?php echo e(asset('product/' .$product->image ?? '')); ?>" alt="" style="width:188.27px; height:205.69px;">
                            </a>
                            
                            <div class="brandInfo">
                                <h5 style="margin:6px 0px; font-family:ploniBold; text-align:right;">
                                   <a href="<?php echo e(url('product/' .$product->id)); ?>" > <?php echo e($product->name); ?> </a>
                                </h5>
                                <div class="rating_price_div" style="display:flex;align-items:center; justify-content:space-between; flex-direction:row-reverse;">
                                    <?php if($product->discount_price != null): ?>
                                    <div class="d-flex ">
                                        <p>₪ <?php echo e($product->price); ?></p>
                                        <p class="price mr-2">
                                            <a href="<?php echo e(url('product/' .$product->id)); ?>" >
                                                ₪ <?php echo e($product->discount_price); ?>

                                            </a>
                                        </p>        
                                    </div>
                                    <?php else: ?>
                                    <br>
                                    <p class="price">₪ <?php echo e($product->price); ?></p>
                                    <?php endif; ?>
                                <p style="text-decoration: none"><i class="fa fa-star" style="color: #ff9529;"></i> <?php echo e($product->product_comment->avg('rating') ?? 'no rating'); ?> </p>
                            </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php if(!empty($blog_1)): ?>
<section id="articleSection">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2><a href="<?php echo e(route('brand-articles',$brandprofile->id ?? '')); ?>" >הכתבות האחרונות שלנו: </a></h2>
            </div>
            <?php if($blog_1 != null): ?>
            <div class="col-md-4">
                <div class="articleRightDiv">
                    <div class="articleCard">
                        <a href="<?php echo e(url('article',$blog_1->id)); ?>"><img src="<?php echo e(asset('blog/'.$blog_1->image ?? '')); ?>" alt="" style="width:446.59px; height:301.78px;" class="img-fluid"></a>
                        <div class="articleInfo">
                            <div class="dateInput">
                            <a href="<?php echo e(url('article',$blog_1->id)); ?>"> <img src="<?php echo e(asset('assets_admin/img/calendar.png')); ?>" alt="" style="width:18px !important; height: 18px !important;"></a>
                                <span style="border: none;color: #747474;font-size: 12px;font-family: PloniRegular;"><?php echo e(date('Y/m/d', strtotime($blog_1->created_at))); ?></span>
                            </div>
                            <a href="<?php echo e(url('article',$blog_1->id)); ?>"><h3><?php echo e($blog_1->title ?? '2022 ויתס םלוהקוטשב הנפואה עובשמ רתויב בוטה בוחרה ןונגס'); ?> </h3></a>
                            <p> <?php echo e($blog_1->sub_title); ?> </p>
                            <div class="readMore">
                                <p>
                                    <a href="<?php echo e(url('article',$blog_1->id)); ?>">קרא עוד <i class="fa fa-angle-double-left" aria-hidden="true"></i></a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <div class="col-md-8">
                <div class="articleLeftDiv">
                    <?php if($blog_2 != null): ?>
                    <div class="articleCard">
                        <div class="row">
                            <div class="col-md-6 desktopHide">
                            <a href="<?php echo e(url('article',$blog_2->id)); ?>"><img src="<?php echo e(asset('blog/'.$blog_2->image ?? '')); ?>" alt="" style="width:378.96px; height:287.03px;" class="img-fluid"></a>
                            </div>
                            <div class="col-md-6">
                                <div class="articleInfo">
                                    <div class="dateInput">
                                    <a href="<?php echo e(url('article',$blog_2->id)); ?>"><img src="<?php echo e(asset('assets_admin/img/calendar.png')); ?>" alt="" style="width:18px !important; height: 18px !important;"></a>
                                        <span style="border: none;color: #747474;font-size: 12px;font-family: PloniRegular;"><?php echo e(date('Y/m/d', strtotime($blog_2->created_at))); ?></span>
                                    </div>
                                    <a href="<?php echo e(url('article',$blog_2->id)); ?>"><h3><?php echo e($blog_2->title ?? '2022 ויתס םלוהקוטשב הנפואה עובשמ רתויב בוטה בוחרה ןונגס'); ?></h3></a>
                                    <p> <?php echo e($blog_2->sub_title); ?> </p>

                                    <div class="readMore">
                                        <p>
                                            <a href="<?php echo e(url('article',$blog_2->id)); ?>">קרא עוד <i class="fa fa-angle-double-left" aria-hidden="true"></i></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mobileHide">
                                <img src="<?php echo e(asset('blog/'.$blog_2->image ?? '')); ?>" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if($blog_3 != null): ?>
                    <div class="articleCard">
                        <div class="row">
                            <div class="col-md-6 desktopHide">
                            <a href="<?php echo e(url('article',$blog_3->id)); ?>"> <img src="<?php echo e(asset('blog/'.$blog_3->image ?? '')); ?>" alt="" style="width:378.96px; height:287.03px;" class="img-fluid"></a>
                            </div>
                            <div class="col-md-6">
                                <div class="articleInfo">
                                    <div class="dateInput">
                                    <a href="<?php echo e(url('article',$blog_3->id)); ?>"><img src="<?php echo e(asset('assets_admin/img/calendar.png')); ?>" alt="" style="width:18px !important; height: 18px !important;"> <span style="border: none;color: #747474;font-size: 12px;font-family: PloniRegular;"><?php echo e(date('Y/m/d', strtotime($blog_3->created_at))); ?></span></a>
                                    </div>
                                    <a href="<?php echo e(url('article',$blog_3->id)); ?>"><h3><?php echo e($blog_3->title ?? '2022 ויתס םלוהקוטשב הנפואה עובשמ רתויב בוטה בוחרה ןונגס'); ?></h3></a>
                                    <p><?php echo e($blog_3->sub_title); ?> </p>
                                    <div class="readMore">
                                        <p>
                                            <a href="<?php echo e(url('article',$blog_3->id)); ?>">קרא עוד <i class="fa fa-angle-double-left" aria-hidden="true"></i></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mobileHide">
                                <img src="<?php echo e(asset('blog/'.$blog_3->image ?? '')); ?>" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-12 text-center mt-60">
                <button class="loadMore">
                <a href="<?php echo e(route('brand-articles',$brand_profile->id)); ?>">כל הכתבות</a>
                </button>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<section id="contactSection">
    <div class="container-fluid">
        <!-- <div class="row">
            <div class="col-12">
                <h2>מחכים לשמוע ממך </h2>
            </div>
        </div> -->
        <div class="contactInfoDiv">
            <div class="row">
                <div class="col-md-4">
                    <div class="commonContactDiv">
                        <div class="iconDiv">
                            <img src="<?php echo e(asset('assets/img/user/map.svg')); ?>" alt="" class="img-fluid">
                        </div>
                        <div class="infoDiv">
                            <h5>כתובתינו: </h5>
                            <p><?php echo e($brand_profile->city->name ?? ''); ?></p>
                            <span>בקר אותנו</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="commonContactDiv">
                        <div class="iconDiv">
                            <a href='tel:<?php echo e($brand_profile->whatsapp_no); ?>'><img src="<?php echo e(asset('assets/img/user/call.svg')); ?>" alt="" id="for_phone" class="img-fluid"></a>
                        </div>
                        <div class="infoDiv">
                            <h5>תתקשרו אלינו: </h5>
                            <a href='tel:<?php echo e($brand_profile->whatsapp_no); ?>'><p><?php echo e($brand_profile->whatsapp_no ?? ''); ?></p></a>
                            <span>זמינים לכל שאלה </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="commonContactDiv">
                        <div class="iconDiv">
                            <a href='mailto:<?php echo e($brand_profile->user->email); ?>'><img src="<?php echo e(asset('assets/img/user/message.svg')); ?>" alt="" id="for_email" class="img-fluid"></a>
                        </div>
                        <div class="infoDiv">
                            <h5>שלח לנו הודעה:</h5>
                            <a href='mailto:<?php echo e($brand_profile->user->email); ?>'><p><?php echo e($brand_profile->user->email ?? ''); ?></p></a>
                            <span>מחכים לשמוע ממך </span>
                        </div>
                    </div>
                </div>
            </div>
        </div><br>
        <?php if(isset($brand_timming)): ?>
        <div class="col-12">
            <h2><?php echo e($brand_profile->name); ?> שעת פתיחה וסגירה: </h2>
        </div>
        <div class="contactInfoDiv">
            <div class="row">
                <div class="col-12">
                    <div class="commonContactDiv">
                        <div class="iconDiv">
                        </div>
                        <div class="infoDiv">
                            <div class="infoDetail">
                                <h5>יום ראשון: </h5>
                                <p style="font-size:15px;">שעת פתיחה: <?php echo e(date("g:i a", strtotime($brand_timming->sat_thu_mor_open['sun_mor_open'] ))); ?>

                                <?php if(isset($time->sat_thu_noon_open['sun_mor_close'])): ?>
                                 שעת סגירה לפנה''צ:<?php echo e(date("g:i a", strtotime( $brand_timming->sat_thu_mor_close['sun_mor_close'] ))); ?>

                                <?php endif; ?>
                                <?php if(isset($time->sat_thu_noon_open['sun_noon_open'])): ?>
                                שעת פתיחה אחה''צ:<?php echo e(date("g:i a", strtotime($brand_timming->sat_thu_noon_open['sun_noon_open']))); ?>

                                <?php endif; ?>
                                שעת סגירה: <?php echo e(date("g:i a", strtotime($brand_timming->sat_thu_noon_close['sun_noon_close'] ))); ?></p>
                            </div>
                            <div class="infoDetail">
                                <h5>יום שני: </h5>
                                <p style="font-size:15px;">שעת פתיחה:  : <?php echo e(date("g:i a", strtotime($brand_timming->sat_thu_mor_open['mon_mor_open'] ))); ?>

                                <?php if(isset($time->sat_thu_noon_open['mon_mor_close'])): ?>
                                שת סגירה לפנה''צ: <?php echo e(date("g:i a", strtotime( $brand_timming->sat_thu_mor_close['mon_mor_close'] ))); ?>

                                <?php endif; ?>
                                <?php if(isset($time->sat_thu_noon_open['mon_noon_open'])): ?>
                                שעת פתיחה אחה''צ: <?php echo e(date("g:i a", strtotime($brand_timming->sat_thu_noon_open['mon_noon_open']))); ?>

                                <?php endif; ?>
                                שעת סגירה: <?php echo e(date("g:i a", strtotime($brand_timming->sat_thu_noon_close['mon_noon_close'] ))); ?></p>
                            </div>
                            <div class="infoDetail">
                                <h5>יום שלישי: </h5>
                                <p style="font-size:15px;">שעת פתיחה: <?php echo e(date("g:i a", strtotime($brand_timming->sat_thu_mor_open['wed_mor_open'] ))); ?>

                                <?php if(isset($time->sat_thu_noon_open['tue_mor_close'])): ?>
                                שעת סגירה לפנה''צ: <?php echo e(date("g:i a", strtotime( $brand_timming->sat_thu_mor_close['tue_mor_close'] ))); ?>

                                <?php endif; ?>
                                <?php if(isset($time->sat_thu_noon_open['tue_noon_open'])): ?>
                                שעת פתיחה אחה''צ: <?php echo e(date("g:i a", strtotime($brand_timming->sat_thu_noon_open['tue_noon_open']))); ?>

                                <?php endif; ?>
                                שעת סגירה: <?php echo e(date("g:i a", strtotime($brand_timming->sat_thu_noon_close['wed_noon_close'] ))); ?></p>
                            </div>
                            <div class="infoDetail">
                                <h5>יום רביעי: </h5>
                                <p style="font-size:15px;">שעת פתיחה: <?php echo e(date("g:i a", strtotime($brand_timming->sat_thu_mor_open['wed_mor_open'] ))); ?>

                                <?php if(isset($time->sat_thu_noon_open['wed_mor_close'])): ?>
                                שעת סגירה לפנה''צ: <?php echo e(date("g:i a", strtotime( $brand_timming->sat_thu_mor_close['wed_mor_close'] ))); ?>

                                <?php endif; ?>
                                <?php if(isset($time->sat_thu_noon_open['wed_noon_open'])): ?>
                                שעת פתיחה אחה''צ: <?php echo e(date("g:i a", strtotime($brand_timming->sat_thu_noon_open['wed_noon_open']))); ?>

                                <?php endif; ?>
                                שעת סגירה: <?php echo e(date("g:i a", strtotime($brand_timming->sat_thu_noon_close['wed_noon_close'] ))); ?></p>
                            </div>
                            <div class="infoDetail">
                                <h5>יום חמישי: </h5>
                                <p style="font-size:15px;">שעת פתיחה: <?php echo e(date("g:i a", strtotime($brand_timming->sat_thu_mor_open['thu_mor_open'] ))); ?>

                                <?php if(isset($time->sat_thu_noon_open['thu_mor_close'])): ?>
                                שעת סגירה לפנה''צ: <?php echo e(date("g:i a", strtotime( $brand_timming->sat_thu_mor_close['thu_mor_close'] ))); ?>

                                <?php endif; ?>
                                <?php if(isset($time->sat_thu_noon_open['thu_noon_open'])): ?>
                                שעת פתיחה אחה''צ: <?php echo e(date("g:i a", strtotime($brand_timming->sat_thu_noon_open['thu_noon_open']))); ?>

                                <?php endif; ?>
                                שעת סגירה: <?php echo e(date("g:i a", strtotime($brand_timming->sat_thu_noon_close['thu_noon_close'] ))); ?></p>
                            </div>
                            <div class="infoDetail">
                                <h5>יום שישי: </h5>
                                <p style="font-size:15px;">שעת פתיחה: <?php echo e(date("g:i a", strtotime($brand_timming->friday_open))); ?>

                                 שעת סגירה: <?php echo e(date("g:i a", strtotime($brand_timming->friday_close))); ?></p>
                             </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="contactFormDiv">
            <div class="row">
                <div class="col-md-7">
                    <div class="formDiv">
                        <h3>צור איתנו קשר </h3>
                        <form action="<?php echo e(route('contact_us.store')); ?>" method="post" >
                            <?php echo csrf_field(); ?>
                            <div class="d-flex">
                                <div class="inputdiv">
                                    <input type="text" name="f_name" id="f_name" value="" placeholder="שם">
                                    <input type="hidden" name="id" id="id" value="<?php echo e($brand_profile->id); ?>" placeholder="שם">
                                    <div style="color:red;"><?php echo e($errors->first('f_name')); ?></div> <br>
                                </div>
                                <div class="inputdiv">
                                    <input type="text" name="l_name" id="l_name" value="" placeholder="נושא">
                                    <div style="color:red;"><?php echo e($errors->first('l_name')); ?></div> <br>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="inputdiv">
                                    <input type="email" name="email" id="email" value="" placeholder="אימייל">
                                    <div style="color:red;"><?php echo e($errors->first('email')); ?></div> <br>
                                </div>
                                <div class="inputdiv">
                                    <input type="number" name="phone" id="phone" value="" placeholder="מספר טלפון">
                                    <div style="color:red;"><?php echo e($errors->first('phone')); ?></div> <br>
                                </div>
                            </div>
                            <div class="inputdiv" style="width: 100%; margin: 18px 0px 0px;">
                                    <textarea name="subject" id="subject" cols="30" rows="10" placeholder="תוכן ההודעה "></textarea>
                                </div>
                                <button style="submit" class="commonBtn">שלח</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="imgDiv">
                        <img src="<?php echo e(asset('assets/img/user/contactUs.svg')); ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</section>


<?php $__env->stopSection(); ?>
<!-- The Modal -->
  
<?php $__env->startSection('js'); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.brand_signup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\dosize_new\resources\views/frontend/brand_profile.blade.php ENDPATH**/ ?>