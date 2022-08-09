
<?php $__env->startSection('title'); ?>
Articles
<?php $__env->stopSection(); ?>
<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/css/mobile-style.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/css/desktop-css.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/css/swiper.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/css/thumb-slider.css')); ?>">
<style>
    .mobile_header {
        display: none;
        padding: 18px 14px;
        background-color: var(--whiteColor);
        position: fixed;
        top: 0px;
        width: 100%;
        z-index: 999;
        left: 0px;
    }
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>

<?php $__env->startSection('content'); ?>
<main>
    <div class="main-wrapper article_main_wrapper">
        <div class="article_category_slider categories spacing">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="swiper myCategorySlider">
                            <div class="swiper-wrapper">
                                <?php if(count($categories) > 0): ?>
                                
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              
                                <div class="category_box swiper-slide">
                                    <a href="<?php echo e(route('category_by_city',['category_id'=>$category->id,'city_id'=>5])); ?>" style="color:#212529">
                                        <div class="img_box box_shahdow">
                                            <img src="<?php echo e(asset('category/'.$category->image)); ?>" alt="" class="img-fluid" style="width:28px width:28px;">
                                        </div>
                                        <p class="font-weight-600 font-size-12"> <?php echo e($category->name); ?></p>
                                    </a>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="article_banner">
            <div class="article_slider">
                <div class="slider_div">
                    <div class="multiple_articles swiper_article">
                        <div class="swiper-wrapper">
                            <?php if($blog->images != null): ?>
                            <?php $__currentLoopData = json_decode($blog->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $all): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="swiper-slide">
                                <img src="<?php echo e(asset('blog/'.$all)); ?>" alt=""
                                    class="img-fluid"style="width:580px; height:298px;">
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            <div class="swiper-slide">
                                <img src="<?php echo e(asset('blog/'.$blog->image)); ?>" alt=""
                                    class="img-fluid"style="width:580px; height:298px;">
                            </div>
                            <div class="swiper-slide">
                                <img src="<?php echo e(asset('blog/'.$blog->image)); ?>" alt=""
                                    class="img-fluid"style="width:580px; height:298px;">
                            </div>
                            <div class="swiper-slide">
                                <img src="<?php echo e(asset('blog/'.$blog->image)); ?>" alt=""
                                    class="img-fluid"style="width:580px; height:298px;">
                            </div>
                            <?php endif; ?>

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
            <div class="aricle_detail">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <h5 class="article_category font-size-14"> <?php echo e($blog->category->name); ?> </h5>
                            <h2 class="article_title">הולך מעולה: מבצע חם בנעלי העיר על 2 זוגות סנדלים</h2>
                            <p class="article_description font-size-16">הילד שלכם רוצה סנדלים? רוצים לקנות
                                סנדלים לכל המשפחה ולצאת בזול? • מבצע חם במיוחד לקיץ: זוג סנדלים ב-99 ₪ ו-2 ב-159
                                ₪ בלבד • אל תחמיצו את ההזדמנות</p>
                        </div>
                        <div class="col-lg-12">
                            <div class="city_shoe">
                                <img src="<?php echo e(asset('brand_image/'.$blog->brandprofile->brand_image)); ?>" style="width: 39px;" alt=""
                                    class="img-fluid">
                                <p class="font-size-18">
                                    <a href="<?php echo e(route('brand-profile',$blog->brandprofile->id ?? '')); ?>" >
                                        <span class="category" > <?php echo e($blog->brandprofile->brand_name); ?> </span>
                                    </a>
                                    <span>24.05.22</span> <span>| כ”ג אייר פ”ב</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="article_content_main">
            <div class="article_detail">
                <div class="container-fluid article_mobile_bg_color">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="article_title"> <?php echo e($blog->title); ?> </h4>
                            <div class="line"></div>
                            <div class="article_detail_para">
                                <?php echo $blog->description; ?>

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="article_like">
                                <h4 class="font-size-18 font-weight-600">אהבתם את הכתבה? רוצים לא לפספס את
                                    התכנים שלנו? הרשמו כאן ווקבלו ישירות למייל את התוכן האיכותתי של דוסיז >>>
                                </h4>
                            </div>
                        </div>
                        
                        <img src="<?php echo e(asset('blog/'.$blog->image)); ?>" alt=""
                                    class="img-fluid"style="width:580px; height:298px;">
                                    
                        <div class="col-lg-12">
                            <div class="multiple_shoe">
                                <ul>
                                    <?php $tags = explode(",", $blog->tags); ?>
                                    <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="font-size-12"><?php echo e($tag); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <?php if(count($recomanded_blogs) > 0): ?>
            <div class="deals deal_two">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <h3 class="common_title">הכי מומלצים <img
                                    src="<?php echo e(asset('assets/img/mobile_component/star.png')); ?>" alt=""
                                    class="img-fluid">
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="slider_div">
                    <div class="multiple_deals swiper">
                        <div class="swiper-wrapper">
                            <?php if(count($recomanded_blogs) > 0): ?>
                            <?php $__currentLoopData = $recomanded_blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recomanded_blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="deals_box box_shahdow swiper-slide">
                                <a class="font-size-14 font-weight-700" href="<?php echo e(route('article',$recomanded_blog->recomended_blog->id ?? '')); ?>">
                                    <img src="<?php echo e(asset('blog/'.$recomanded_blog->recomended_blog->image)); ?>" alt="" class="img-fluid"style="width:135px; height:107px;">
                                </a>

                                <div class="content_div">
                                    <a href="<?php echo e(route('article',$recomanded_blog->recomended_blog->id ?? '')); ?>" style="color: #212529 !important">
                                        <h4 class="title font-size-14 font-weight-700">
                                            <?php echo e($recomanded_blog->recomended_blog->title); ?>

                                        </h4>
                                        <div class="rating_price_div">
                                            <p class="font-size-14 font-weight-300"><?php echo \Illuminate\Support\Str::limit($recomanded_blog->recomended_blog->description ?? '',40,'...'); ?></p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="stand_brand_sign_up_div">
                            <div class="stand_brand_message">
                                <img src="<?php echo e(asset('brand_image/'.$blog->brandprofile->brand_image)); ?>" alt=""
                                    class="img-fluid" style="width:39px ; height: 38px;">

                                <a class="font-size-16" href="">לעמוד המותג</a>
                                <a class="font-size-16" href="<?php echo e(url('brand/messages?id='.$blog->brandprofile->user_id.'')); ?>">שליחת הודעה</a>
                      

                            </div>
                            <div class="sign_up_div">
                                <img src="<?php echo e(asset('assets/img/mobile_component/sign_up_icon.png')); ?>" alt=""
                                    class="img-fluid">
                                <p class="font-size-16">הירשמו בקליק למועדון הצרכנות של <br>
                                    <?php if(auth()->guard()->guest()): ?>
                                    <a href="" id="class="enrollemnt_button" data-toggle="modal" data-target="#enrollmentModal2"><?php echo e($blog->brandprofile->brand_name); ?></a>
                                    <?php else: ?>
                                        <input type="hidden" name="token" id="token" value="<?php echo e(csrf_token()); ?>"/>
                                        <input type="hidden" name="email" id="email" value="<?php echo e(Auth::user()->email); ?>" />
                                        <a href="" id="subscriber"><?php echo e($blog->brandprofile->brand_name); ?></a>
                                    <?php endif; ?>
                                        
                                        ולא תפספסו שום דיל!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="post_comment">
                            <form action="<?php echo e(route('store-blog-comment')); ?>" method="post" enctype="multipart/form-data" >
                                <?php echo csrf_field(); ?>
                            <div class="total_comment">
                                <!-- <p>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </p> -->
                               
                                <ul style="visibility: hidden">
                                                           
                                </ul>
                                <p class="font-size-16">תגובות(<span class="blog_comment_count"><?php echo e(count($blog_comments)); ?></span> )<img
                                    src="<?php echo e(asset('assets/img/mobile_component/comment.png')); ?>" alt=""
                                    class="img-fluid"></p>
                                </p>
                            </div>

                            <div class="formDiv">
                                
                                    <input type="hidden" name="blog_id" class="blog_id_like" value="<?php echo e($blog->id); ?>" />
                                    <input type="text" name="comment" id="comment" placeholder="התגובה שלך"
                                        class="text-right font-size-16 comment_input">
                                    <div class="comment_hearder">
                                        <button type="submit" class="font-size-16 cursor-pointer">פירסום תגובה</button>
                                        <div class="anonymous_text font-size-16">אנונימי <span
                                                class="checkBox">
                                                <input type="checkbox" name="name" id="approve">
                                                </span></div>
                                    </div>
                                    <span class="text-danger comment_valid" style="position:absolute; bottom:0px;"></span>
                                </form>
                            </div>
                            <div class="comment_list">
                                <ul class="new_comment_list">
                                    <?php if(count($blog_comments) > 0): ?>
                                    <?php $__currentLoopData = $blog_comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($comment->parent_id == null): ?>
                                    <div>
                                        <li  class="align-items-center">
                                            <?php if(auth()->guard()->guest()): ?>
                                            <a href="#" class="add_comment font-size-12 text-dark" style="visibility: hidden">הוספת תגובה</a>
                                            
                                            <?php else: ?>
                                            <?php if(Auth::user()->hasRole('Brand') == 1): ?>
                                            <a href="#" class="add_comment font-size-12 text-dark">הוספת תגובה</a>
                                            <?php else: ?>
                                            <a href="#" class="add_comment font-size-12 text-dark" style="visibility: hidden">הוספת תגובה</a>
                                            <?php endif; ?>
                                            <?php endif; ?>
                                            <div class="user_detail">
                                                <h4 class="font-size-14"> <?php echo e($comment->name ?? $comment->user->name); ?></h4>
                                                
                                                <p class="font-size-14"><?php echo e($comment->comment); ?></p>
                                            </div>
                                        </li>
                                        <div class="formDiv replyForm">
                                            <form action="<?php echo e(route('store-blog-comment')); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="blog_id" value="<?php echo e($blog->id); ?>" />
                                                <input type="hidden" value="<?php echo e($blog->brand_profile_id); ?>" id="brand_profile_id" />
                                                <input type="hidden" name="parent_id" value="<?php echo e($comment->id); ?>" />
                                                <input type="text" name="comment" id="comment" placeholder="התגובה שלך"
                                                    class="text-right font-size-16">
                                                
                                                <div class="comment_hearder">
                                                    <?php if(auth()->guard()->guest()): ?>
                                                    <button type="submit" class="font-size-16 enrollemnt_button cursor-pointer" data-toggle="modal" data-target="#enrollmentModal">פירסום תגובה</button>
                                                    <?php else: ?>
                                                    <button type="submit" class="font-size-16 cursor-pointer">פירסום תגובה</button>
                                                    <?php endif; ?>
                                                    <div class="anonymous_text font-size-16">אנונימי <span
                                                            class="checkBox">
                                                            <input type="checkbox" name="name" id="approve">
                                                            </span></div>
                                                </div>
                                                <span class="text-danger comment_valid" style="position:absolute; bottom:0px;"></span>
                                            </form>
                                        </div>
                                             
                                    </div>
                                    <?php $replies = App\Models\BlogComment::where('parent_id', $comment->id)->orderBy('id', 'DESC')->get(); ?>
                                    <?php if(count($replies) > 0): ?>
                                    <?php $__currentLoopData = $replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div style="width:490px; margin-left:20px;">
                                        <li>
                                            <a href="#" class="add_comment font-size-12 text-dark" style="visibility: hidden">הוספת תגובה</a>
                                            
                                            <div class="user_detail" style="margin: 10px">
                                                <h4 class="font-size-14"> <?php echo e($reply->name ?? $reply->user->name); ?> </h4>
                                                <p class="font-size-14"><?php echo e($reply->comment); ?></p>
                                            </div>
                                        </li>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if(count($recomanded_blogs) > 0): ?>
        <div class="affordable_consumption spacing article_affordable_consumption">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 text-right">
                        <div
                            class="col-lg-12 d-flex flex-xl-row-reverse justify-content-between align-items-center text-right">
                            <h3 class="common_title">צרכנות משתלמת <img
                                    src="<?php echo e(asset('assets/img/mobile_component/beg.png')); ?>" alt=""
                                    class="img-fluid"></h3>
                            <p class="d-none d-xl-block"><a href="#" class="text-dark">לכל הכתבות ></a></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="affordable_consumption_list d-flex multiple_afforable_consumption">
                            <?php if(count($recomanded_blogs) > 0): ?>
                            <?php $__currentLoopData = $recomanded_blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recomended_blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="affordable_consumption_box box_shahdow">
                                <a class="font-size-14 font-weight-700" href="<?php echo e(route('article',$recomended_blog->recomended_blog->id ?? '')); ?>">
                                    <img src="<?php echo e(asset('blog/'.$recomended_blog->recomended_blog->image)); ?>" alt="" class="img-fluid" style="width:131px; height:181px;">
                                </a>
                                <div class="content_div">
                                    <span class="category font-size-12 font-weight-400"> <?php echo e($blog->brandprofile->brand_name); ?> </span>
                                    <a class="font-size-14 font-weight-700" href="<?php echo e(route('article',$recomended_blog->recomended_blog->id ?? '')); ?>" style="color: #212529 !important">
                                    <h4 class="font-size-12 font-weight-700">
                                        <?php echo e($recomended_blog->recomended_blog->title); ?>

                                    </h4>
                                    <p class="discription font-size-10 font-weight-400">
                                        <?php echo $recomended_blog->recomended_blog->description ?? ''; ?>

                                    </p>
                                    </a>
                                    <span class="font-size-12">4 <i class="fa fa-heart"
                                            aria-hidden="true"></i></span>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            <a href="" class="desktop_hide learn_more font-size-12 font-weight-400">לכל
                                הכתבות ></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <!-- main footer -->
        <!-- main footer start from here -->
        <div class="main_footer mt-5 d-none d-xl-block">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-4">
                        <div class="box text-right px-3">
                            <p class="txt">בואו לעקוב אחרנו :)</p>
                            <div class="socials_icons mt-4">
                                <a href="#" class="social_link mx-2">
                                    <img src="<?php echo e(asset('assets/img/fb.png')); ?>" alt="fb">
                                </a>
                                <a href="#" class="social_link mx-2">
                                    <img src="<?php echo e(asset('assets/img/inst.png')); ?>" alt="">
                                </a>
                                <a href="#" class="social_link mx-2">
                                    <img src="<?php echo e(asset('assets/img/twitter.png')); ?>" alt="">
                                </a>
                                <a href="#" class="social_link mx-2">
                                    <img src="<?php echo e(asset('assets/img/whatsapp.png')); ?>" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="box px-3 border_Side">
                            <div class="statments_links d-flex flex-column align-items-end">
                                <p class="txt">
                                    דוסיז משפט הנעה על דוסיז >>
                                </p>
                                <div class="btns d-flex mt-4">
                                    <a href="" data-toggle="modal" data-target="#enrollmentModal" class="btn btn_grey_out">הצטרפות לעסקים</a>
                                    <a  data-toggle="modal" data-target="#enrollmentModal2" href="#" class="btn btn_orange ml-2">הרשמה לדוסיז</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="box px-3 d-flex align-items-center justify-content-center">
                            <img src="<?php echo e(asset('assets/img/footer_img.png')); ?>" class="footer_Img" alt="footer">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main footer start end here -->
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul>
                        <li>
                            <a href="">
                                <img src="<?php echo e(asset('assets/img/mobile_component/email_icon.png')); ?>" alt=""
                                    class="img-fluid">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="<?php echo e(asset('assets/img/mobile_component/whtsapp_icon.png')); ?>" alt=""
                                    class="img-fluid">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="<?php echo e(asset('assets/img/mobile_component/twitter_icon.png')); ?>" alt=""
                                    class="img-fluid">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="<?php echo e(asset('assets/img/mobile_component/facebook_icon.png')); ?>" alt=""
                                    class="img-fluid">
                            </a>
                        </li>
                    </ul>
                    <div class="copy_input">
                        <i class="fa fa-clone" aria-hidden="true"></i>
                        <input type="text" name="copy_text" id="copy_text"
                            value="https://dossiz-vmnlvb/dfv.co.il" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.8.4/swiper-bundle.min.js"></script>
<script src="<?php echo e(asset('assets/js/script.js')); ?>"></script>
<script type="text/javascript">
    $("label").click(function(){
    // $(this).parent().find("label").css({"background-color": "#D8D8D8"});
    // $(this).css({"background-color": "#7ED321"});
    // $(this).nextAll().css({"background-color": "#7ED321"});
    $(this).prev().attr('checked','checked');
    $(this).parent().find("label").css({"color": "#D8D8D8"});
    $(this).css({"color": "#FEA73A"});
    $(this).nextAll().css({"color": "#FEA73A"});
  });
</script>
<script>

$(document).ready(function() {
        $('#login-modal').fadeOut()
        $("#signup_btn").click(function(e) {
            e.preventDefault();
            $('#sign_up_modal').fadeOut()
            $('#login-modal').fadeIn()
        });
        $("#login_btn").click(function(e) {
            e.preventDefault();
            $('#sign_up_modal').fadeIn()
            $('#login-modal').fadeOut()
        });
    });

    

    $('#sign_up_form').submit(function(e){
        e.preventDefault();
        $('.main-wrapper').addClass('active');
        $.ajax({
            type: "POST",
            url: "<?php echo e(route('register')); ?>",
            data: new FormData(this),
            datatype: "json",
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
                console.log("Success");
                $('.close').click();
                window.location.href="/";
                 
            },
            error: function (data) {
                    $('.name_valid').text(data?.responseJSON?.errors?.name);
                    $('.email_valid').text(data?.responseJSON?.errors?.email);
                    $('.city_valid').text(data?.responseJSON?.errors?.city_id);
                    $('.password_valid').text(data?.responseJSON?.errors?.password);
            }
        });
    });

    $('#login_form').submit(function(e){
        e.preventDefault();
        $('.main-wrapper').addClass('active');
        $.ajax({
            type: "POST",
            url: "<?php echo e(route('login')); ?>",
            data: new FormData(this),
            datatype: "json",
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
                // console.log(data);
                $('.close').click();
                window.location.href="/dashboard/dashboard";
                 
            },
            error: function (data) {
                console.log('Error:', data.responseJSON);
                if($('#email').val() == ''){
                    $('.email_valid').text(data.responseJSON.errors.email);
                }
                else{
                    $('.email_valid').text('');
                }
                if($('#password').val() == ''){
                    $('.password_valid').text(data.responseJSON.errors.password);
                }
                else{
                    $('.password_valid').text('');
                }
                
                
            }
        });
    });

    // reply functionality
    $('.replyForm').fadeOut();
    $('.add_comment').click(function(e){
        e.preventDefault();
        $(this).parent().parent().children('.replyForm').fadeToggle();
    })

    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        if (scroll >= 10) {
            $("header .desktop_header").css("display", "none");
            $("header .mobile_header").css("display", "block");
        } else {
            $("header .desktop_header").css("display", "block");
            $("header .mobile_header").css("display", "none");
        }
    });

    $('.blog_like').click(function(e){
        e.preventDefault();
        var blog_id = $('.blog_id_like').val();
        $.ajax({
            type: "POST",
            url: "<?php echo e(route('store-blog-comment-like')); ?>",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                "_token": "<?php echo e(csrf_token()); ?>",
                blog_id:blog_id} ,
            cache: false,
            success: function (data) {
                console.table(data);
                if(data.success == 'Blog Like Removed')
                {
                let likeNum = Number($('.like_count').text())
                $('.like_count').text(likeNum-=1)
                }
                else if(data.success == 'Blog Like successfully')
                {
                let likeNum = Number($('.like_count').text())
                $('.like_count').text(likeNum+=1)
                }
                 
            },
            error: function (data) {
                console.log(data);
            }
        });
    });   

    $('.blog_bookmark').click(function(e){
        e.preventDefault();
        var blog_id = $('.blog_id_like').val();
        $.ajax({
            type: "POST",
            url: "<?php echo e(route('store-blog-bookmark')); ?>",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                "_token": "<?php echo e(csrf_token()); ?>",
                blog_id:blog_id} ,
            cache: false,
            success: function (data) {
                console.table(data);
                if(data.success == 'Blog Bookmark Removed')
                {
                let bookmarkNum = Number($('.bookmark_count').text())
                $('.bookmark_count').text(bookmarkNum-=1)
                }
                else if(data.success == 'Blog Bookmark Successfully')
                {
                let bookmarkNum = Number($('.bookmark_count').text())
                $('.bookmark_count').text(bookmarkNum+=1)
                }
                 
            },
            error: function (data) {
                console.log(data);
            }
        });
    }); 

    $('#blog_comment').submit(function(e){
        e.preventDefault();
        
        $.ajax({
            type: "POST",
            url: "<?php echo e(route('store-blog-comment')); ?>",
            data: new FormData(this),
            datatype: "json",
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
                 console.table(data.success);
                // console.table(data.comment);
                if(data.success == 'Refesh') {
                    location.reload();
                }
                $('.new_comment_list').prepend(`<li>
                                        <a href="#" class="add_comment font-size-12 text-dark">הוספת תגובה</a>
                                        <div class="user_detail">
                                            <h4 class="font-size-14">${data.name} </h4>
                                            <p class="font-size-14">${data.comment}</p>
                                        </div>
                                    </li>`);
                
                $('.comment_input').val('');
                let commentNum = Number($('.blog_comment_count').text())
                $('.blog_comment_count').text(commentNum+=1)

                let commentsNum = Number($('.comment_count').text())
                $('.comment_count').text(commentsNum+=1)

                $('.close').click();
                 
            },
            error: function (data) {
                if($('#comment').val() == ''){
                    $('.comment_valid').text(data.responseJSON.errors.comment);
                }
                else{
                    $('.comment_valid').text('');
                }
            }
        });
    });

    $('#subscriber').click(function(e){
        e.preventDefault();
        // const postFormData = {
        //     brand_profile_id : $('#brand_profile_id').val(),
        //     email     : $('#email').val(),
        //     // _token: "<?php echo e(csrf_token()); ?>"
        // };
        let brand_profile_id = $('#brand_profile_id').val();
        let email = $('#email').val();
        let _token   = $('meta[name="csrf-token"]').attr('content');
        // console.log(postFormData);
        $.ajax({
            type: "POST",
            url: "<?php echo e(route('store-subscriber')); ?>",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                email:email,
                brand_profile_id:brand_profile_id,
                _token: _token
            } ,
            datatype: "json",
            success: function (data) {
                 console.table(data.success);
                toastr.success(data.success);
                // console.table(data.comment);
                
                 
            },
            error: function (data) {
                // toastr.warning(data);
                toastr.error("Already Subscribed");
                
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.article', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\dosize_new\resources\views/frontend/article.blade.php ENDPATH**/ ?>