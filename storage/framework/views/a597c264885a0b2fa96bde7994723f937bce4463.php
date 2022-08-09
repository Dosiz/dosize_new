
<?php $__env->startSection('title'); ?>
Products
<?php $__env->stopSection(); ?>
<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/css/mobile-style.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/css/desktop-css.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/css/swiper.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/css/thumb-slider.css')); ?>">

<!-- <link rel="stylesheet" href="<?php echo e(asset('assets/star-rating-svg-master/thumb-slider.css')); ?>"> -->
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
    <div class="main-wrapper">
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
        <div class="product_div">
            <div class="article_slider">
                <div class="slider_div">
                    <div class="multiple_articles swiper_article thumb_swiper">
                        <div class="swiper-container-wrapper">
                            <!-- Slider main container -->
                            <div class="swiper-container gallery-top">
                                <div class="swiper-wrapper">
                                    <?php if($product->images != null): ?>
                                    <?php $__currentLoopData = json_decode($product->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $all): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="swiper-slide">
                                        <img src="<?php echo e(asset('product/'.$all)); ?>" alt="" class="img-fluid"style="width:360px; height:353px;">
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                    <div class="swiper-slide">
                                        <img src="<?php echo e(asset('product/'.$product->image)); ?>" alt="" class="img-fluid"style="width:360px; height:353px;">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="<?php echo e(asset('product/'.$product->image)); ?>" alt="" class="img-fluid"style="width:360px; height:353px;">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="<?php echo e(asset('product/'.$product->image)); ?>" alt="" class="img-fluid"style="width:360px; height:353px;">
                                    </div>
                                    <?php endif; ?>

                                </div>

                                <div class="swiper-pagination"></div>
                            </div>
                            <!-- Slider thumbnail container -->
                            <div class="swiper-container gallery-thumbs d-none d-xl-block">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    <!-- Slides -->
                                    <div class="swiper-slide swiperThumbImg">
                                        <img src="<?php echo e(asset('product/'.$product->image)); ?>" alt="" class="img-fluid"style="width:131px; height:129px;">
                                    </div>
                                    <div class="swiper-slide swiperThumbImg">
                                        <img src="<?php echo e(asset('product/'.$product->image)); ?>" alt="" class="img-fluid"style="width:131px; height:129px;">
                                    </div>
                                    <div class="swiper-slide swiperThumbImg">
                                        <img src="<?php echo e(asset('product/'.$product->image)); ?>" alt="" class="img-fluid"style="width:131px; height:129px;">
                                    </div>
                                </div>
                            </div>
                            <!-- container end -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="product_detail">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6 col-xl-12 text-left d-xl-none">
                            <div class="product_price">
                                <p>50 ₪ <span class="font-size-14">80 ₪</span></p>
                            </div>
                        </div>
                        <div class="col-6 col-xl-12 text-right">
                            <div class="product_category">
                                <a href="<?php echo e(route('brand-profile',$product->brand_profile_id)); ?>" >
                                <span> <?php echo e($product->brandprofile->brand_name); ?></span>
                                </a>
                            </div>
                        </div>
                        <div class="col-12 d-none d-xl-flex my-4 justify-content-end">
                            <?php if(count($product_ratings) > 0): ?>
                            <?php $__currentLoopData = $product_ratings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_rating): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($product_rating->avgrate): ?>

                                <?php echo str_repeat('<span><i class="fa fa-star" style="color:#ff9529;"></i></span>', $product_rating->avgrate); ?>

                                <?php echo str_repeat('<span><i class="fa fa-star"  style="color:#d3cbc2;"></i></span>', 5 - $product_rating->avgrate); ?>

                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                        <div class="col-6 col-xl-12 text-left d-xl-block d-none mb-4">
                            <div class="product_price d-flex justify-content-end">
                                <p><b><?php echo e($product->name); ?></b></p>
                            </div>
                        </div>
                        <div class="col-6 col-xl-12 text-left d-xl-block d-none mb-4">
                            <div class="product_price d-flex justify-content-end">
                                <p><?php echo e($product->discount_price ?? $product->price); ?> ₪ <span class=" font-size-14"><?php if($product->discount_price): ?><?php echo e($product->price); ?> ₪ <?php endif; ?></span></p>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="product_category_div d-xl-flex justify-content-end">
                    <div class="more_detail_for_purchase">
                        <a href="" class="font-size-16">לפרטים נוספים ולרכישה</a>
                    </div>
                    <div class="choose_size d-xl-none">
                        <a href="" class="font-size-16">בחר מידה ></a>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="product_description">
                                <p class="font-size-16"><b>פרטים:</b></p>
                                <p class="font-size-16"> <?php echo $product->description; ?> </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="deals sliderDivDes">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 text-right">
                        <h3 class="common_title px-xl-2">מוצרים שאולי יעניינו אתכם גם <img
                                src="<?php echo e(asset('assets/img/mobile_component/deals.png')); ?>" alt="" class="img-fluid"></h3>
                    </div>
                </div>
            </div>
            <div class="slider_div">
                <div class="multiple_deals swiper">
                    <div class="swiper-wrapper">
                        <?php if(count($products)>0): ?>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="deals_box box_shahdow swiper-slide">
                            <a class="font-size-14 font-weight-700" href="<?php echo e(route('product',$product_value->id ?? '')); ?>">
                                <img src="<?php echo e(asset('product/'.$product_value->image)); ?>" alt="" class="img-fluid"style="width:100%;">
                            </a>
                            <div class="content_div">
                                <a  href="<?php echo e(route('brand-profile',$product->brand_profile_id)); ?>" >
                                <span class="deal_category font-size-12 font-weight-400"> <?php echo e($product_value->brandprofile->brand_name); ?> </span>
                                </a>
                                <a href="<?php echo e(route('product',$product_value->id ?? '')); ?>" style="color: #212529 !important;">
                                    <h4 class="title font-size-14 font-weight-700"><?php echo e($product_value->name); ?></h4>
                                    <div class="rating_price_div">
                                        <p class="font-size-14 font-weight-600"><?php echo e($product_value->discount_price ?? $product_value->price); ?> ₪ <span
                                                class="font-size-12 font-weight-400"><?php if($product_value->discount_price): ?><?php echo e($product_value->price); ?> ₪ <?php endif; ?></span></p>
                                        <p class="rating_text"><?php echo e($product_value->product_comment->avg('rating') ?? 'no rating'); ?> <i class="fa fa-star"></i></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        <div class="swiper-button-next btn-swiper">
                            <i class="fa fa-caret-right" aria-hidden="true"></i>
                        </div>
                        <div class="swiper-button-prev btn-swiper">
                            <i class="fa fa-caret-left" aria-hidden="true"></i>
                        </div>
                    </div>
                    <!-- pagination -->
                </div>
            </div>

        </div>
        <div class="container-fluid container_desk">
            <div class="row flex-xl-row-reverse">

                <div class="col-lg-12 col-xl-6">
                    <div class="stand_brand_message">
                        <img src="<?php echo e(asset('brand_image/'.$product->brandprofile->brand_image)); ?>" alt="" class="img-fluid" style="width:39px ; height: 38px;">
                        <a class="font-size-16" href="<?php echo e(route('brand-profile',$product->brand_profile_id)); ?>">לעמוד המותג</a>
                        <a class="font-size-16" href="">שליחת הודעה</a>
                    </div>
                </div>
                <div class="col-lg-12 col-xl-6">
                    <div class="sign_up_div">
                        <img src="<?php echo e(asset('assets/img/mobile_component/sign_up_icon.png')); ?>" alt="" class="img-fluid">
                        <p class="font-size-16">הירשמו בקליק למועדון הצרכנות של <br>
                            <?php if(auth()->guard()->guest()): ?>
                            <a href="" id="class="enrollemnt_button" data-toggle="modal" data-target="#enrollmentModal2"><?php echo e($product->brandprofile->brand_name); ?></a>
                            <?php else: ?>
                                <input type="hidden" name="token" id="token" value="<?php echo e(csrf_token()); ?>"/>
                                <input type="hidden" name="email" id="email" value="<?php echo e(Auth::user()->email); ?>" />
                                <input type="hidden" id="brand_profile_id" value="<?php echo e($product->brand_profile_id); ?>" />
                                <a href="" id="subscriber"><?php echo e($product->brandprofile->brand_name); ?></a>
                            <?php endif; ?>
                            ולא תפספסו שום דיל!</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-xl-center">
                <div class="col-xl-8">
                    <div class="post_comment">
                        <div class="total_comment">
                            <!-- <p>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </p> -->
                            <?php if(auth()->guard()->guest()): ?>
                                <ul style="visibility: hidden">
                                </ul>
                            <?php else: ?>

                            <?php endif; ?>
                            <p></p>
                            <p class="font-size-16">תגובות (<span class="product_comment_count"><?php echo e(count($product_comments)); ?></span>) <img
                                    src="<?php echo e(asset('assets/img/mobile_component/comment.png')); ?>" alt=""
                                    class="img-fluid">
                            </p>
                        </div>
                        <form action="<?php echo e(route('store-product-comment')); ?>" method="POST" class="d-flex flex-column align-items-cente">
                            <?php echo csrf_field(); ?>

                            <ul>
                                <li>
                                    <span>
                                        <div class="rating">
                                            <input type="radio" id="field1_star5" name="bedside_manner_rating" value="5" /><label class = "full" for="field1_star5"></label>
                                            <input type="radio" id="field1_star4" name="bedside_manner_rating" value="4" /><label class = "full" for="field1_star4"></label>
                                            <input type="radio" id="field1_star3" name="bedside_manner_rating" value="3" /><label class = "full" for="field1_star3"></label>
                                            <input type="radio" id="field1_star2" name="bedside_manner_rating" value="2" /><label class = "full" for="field1_star2"></label>
                                            <input type="radio" id="field1_star1" name="bedside_manner_rating" value="1" /><label class = "full" for="field1_star1"></label>
                                        </div>
                                    </span>
                                </li>
                            </ul>
                            <div class="d-flex w-100 flex-row-reverse align-items-center">
                                <input type="hidden" name="product_id" class="product_id_like" value="<?php echo e($product->id); ?>" />
                                <input type="text" name="comment" id="comment" placeholder="התגובה שלך"
                                    class="text-right font-size-16 comment_input" style="width:">
                                    <span class="text-danger comment_valid" style=""></span>
                                <div class="comment_hearder mr-4">
                                   
                                    <button type="submit" class="font-size-16 cursor-pointer" style="white-space: pre">פירסום תגובה</button>
                                    <div class="anonymous_text font-size-16 ml-2 d-flex flex-column">אנונימי
                                        <span class="checkBox">
                                            <input type="checkbox" name="name" id="approve">
                                        </span></div>
                                </div>
                            </div>

                        </form>

                        <div class="comment_list">
                            <ul class="new_comment_list">
                                <?php if(count($product_comments) > 0): ?>
                                <?php $__currentLoopData = $product_comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <?php if(auth()->guard()->guest()): ?>
                                    <p class="add_comment font-size-12" style="visibility: hidden">הוספת תגובה</p>
                                    <?php else: ?>
                                    <?php if(Auth::user()->hasRole('Brand')): ?>
                                    <a href="#" class="add_comment font-size-12 text-dark">הוספת תגובה</a>
                                    <?php else: ?>
                                    <p class="add_comment font-size-12" style="visibility: hidden">הוספת תגובה</p>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    <div class="user_detail d-flex justify-content-between align-items-baseline">
                                        <div class="mr-2">
                                            <?php if($comment->rating): ?>
                                                <?php for($i= 1;$i<=$comment->rating;$i++): ?>
                                                    <?php if($i>5): ?>
                                                        <?php break 1; ?>;
                                                    <?php endif; ?>
                                                        <i class="fa fa-star" style="color: <?php if($comment->rating<3): ?> #FDCC0D; <?php else: ?> #ff9529; <?php endif; ?>"></i>
                                                <?php endfor; ?>
                                            <?php endif; ?>
                                        </div>
                                        <div>
                                            <h4 class="font-size-14"> <?php echo e($comment->name ?? $comment->user->name); ?> </h4>
                                            <p class="font-size-14"><?php echo e($comment->comment); ?></p>
                                        </div>
                                    </div>
                                </li>

                                <div class="formDiv replyForm">
                                    <form action="<?php echo e(route('store-product-comment')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>" />
                                        <input type="hidden" value="<?php echo e($product->brand_profile_id); ?>" id="brand_profile_id" />
                                        <input type="hidden" name="parent_id" value="<?php echo e($comment->id); ?>" />
                                        <input type="text" name="comment" id="comment" placeholder="התגובה שלך"
                                            class="text-right font-size-16">

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
                                <?php $replies = App\Models\ProductComment::where('parent_id', $comment->id)->orderBy('id', 'DESC')->get(); ?>
                                    <?php if(count($replies) > 0): ?>
                                    <?php $__currentLoopData = $replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div style="width:710px; margin-left:44px;">
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
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

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
                                <?php if(count($recomanded_products) > 0): ?>
                                <?php $__currentLoopData = $recomanded_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recomanded_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="affordable_consumption_box box_shahdow">
                                    <a class="font-size-14 font-weight-700" href="<?php echo e(route('product',$recomanded_product->recomended_product->id ?? '')); ?>">
                                        <img src="<?php echo e(asset('product/'.$recomanded_product->recomended_product->image)); ?>" alt="" class="img-fluid" style="width:131px; height:181px;">
                                    </a>
                                    <div class="content_div">
                                        <a href="<?php echo e(route('brand-profile',$product->brandprofile->id ?? '')); ?>">
                                            <span class="category font-size-12 font-weight-400"> <?php echo e($product->brandprofile->brand_name); ?> </span>
                                        </a>
                                        <a class="font-size-14 font-weight-700" href="<?php echo e(route('product',$recomanded_product->recomended_product->id ?? '')); ?>" style="color: #212529 !important">
                                        <h4 class="font-size-12 font-weight-700">
                                            <?php echo e($recomanded_product->recomended_product->name); ?>

                                        </h4>
                                        <p class="discription font-size-10 font-weight-400">
                                            <?php echo $recomanded_product->recomended_product->description ?? ''; ?>

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

        </div>

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

    <div class="modal fade" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                        <?php
                            $shareable_links = Share::page( 'product_link', $product->name)->facebook()->whatsapp()->twitter()->getRawLinks();
                        ?>
                        <li>
                            <a target="_blank" class="productLink" href="#">
                                <img src="<?php echo e(asset('assets/img/mobile_component/email_icon.png')); ?>" alt=""
                                    class="img-fluid">
                            </a>
                        </li>
                        <li>
                            <a target="_blank" class="productLink" href="<?php echo e($shareable_links['whatsapp']); ?>">
                                <img src="<?php echo e(asset('assets/img/mobile_component/whtsapp_icon.png')); ?>" alt=""
                                    class="img-fluid">
                            </a>
                        </li>
                        <li>
                            <a target="_blank" class="productLink" href="<?php echo e($shareable_links['twitter']); ?>">
                                <img src="<?php echo e(asset('assets/img/mobile_component/twitter_icon.png')); ?>" alt=""
                                    class="img-fluid">
                            </a>
                        </li>
                        <li>
                            <a target="_blank" class="productLink" href="<?php echo e($shareable_links['facebook']); ?>">
                                <img src="<?php echo e(asset('assets/img/mobile_component/facebook_icon.png')); ?>" alt=""
                                    class="img-fluid">
                            </a>
                        </li>
                    </ul>
                    <div class="copy_input">
                        <i class="fa fa-clone" aria-hidden="true"></i>
                        <input type="text" name="copy_text" id="copy_text"
                            value="" readonly>
                    </div>
                </div>
            </div>
        </div>
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
<script type="text/javascript">

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

    $('.product_like').click(function(e){
        e.preventDefault();
        var product_id = $('.product_id_like').val();
        $.ajax({
            type: "POST",
            url: "<?php echo e(route('store-product-comment-like')); ?>",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                "_token": "<?php echo e(csrf_token()); ?>",
                product_id:product_id} ,
            cache: false,
            success: function (data) {
                console.table(data);
                if(data.success == 'Product Like Removed')
                {
                let likeNum = Number($('.like_count').text())
                $('.like_count').text(likeNum-=1)
                }
                else if(data.success == 'Product Like successfully')
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

    $('.product_bookmark').click(function(e){
        e.preventDefault();
        var product_id = $('.product_id_like').val();
        $.ajax({
            type: "POST",
            url: "<?php echo e(route('store-product-bookmark')); ?>",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                "_token": "<?php echo e(csrf_token()); ?>",
                product_id:product_id} ,
            cache: false,
            success: function (data) {
                console.table(data);
                if(data.success == 'Product Bookmark Removed')
                {
                let bookmarkNum = Number($('.bookmark_count').text())
                $('.bookmark_count').text(bookmarkNum-=1)
                }
                else if(data.success == 'Product Bookmark Successfully')
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

    $('#product_comment').submit(function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "<?php echo e(route('store-product-comment')); ?>",
            data: new FormData(this),
            datatype: "json",
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
                console.log("Success");
                $('.new_comment_list').prepend(`<li>
                                        <a href="#" class="add_comment font-size-12 text-dark">הוספת תגובה</a>
                                        <div class="user_detail">
                                            <h4 class="font-size-14">${data.name} </h4>
                                            <p class="font-size-14">${data.comment}</p>
                                        </div>
                                    </li>`);

                $('.comment_input').val('');
                let commentNum = Number($('.product_comment_count').text())
                $('.product_comment_count').text(commentNum+=1)
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

    // for swiper
    $(function () {
        console.log($(window).width())
        if ($(window).width() > 440) {
            var galleryThumbs = new Swiper(".gallery-thumbs", {
                centeredSlides: true,
                centeredSlidesBounds: true,
                direction: "horizontal",
                spaceBetween: 10,
                slidesPerView: 3,
                freeMode: false,
                watchSlidesVisibility: true,
                watchSlidesProgress: true,
                watchOverflow: true,
                breakpoints: {
                    480: {
                        direction: "vertical",
                        slidesPerView: 3
                    }
                }
            });
            var galleryTop = new Swiper(".gallery-top", {
                autoHeight: true,
                direction: "horizontal",
                spaceBetween: 10,
                // navigation: {
                //     nextEl: ".swiper-button-next",
                //     prevEl: ".swiper-button-prev"
                // },
                thumbs: {
                    swiper: galleryThumbs
                }
            });
            galleryTop.on("slideChangeTransitionStart", function () {
                galleryThumbs.slideTo(galleryTop.activeIndex);
            });
            galleryThumbs.on("transitionStart", function () {
                galleryTop.slideTo(galleryThumbs.activeIndex);
            });

        }
    });

    $('#subscriber').click(function(e){
        e.preventDefault();
        // const postFormData = {
        //     'brand_profile_id' : $('#brand_profile_id').val(),
        //     'email'     : $('#email').val(),
        //     "_token": "<?php echo e(csrf_token()); ?>"
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



    $('#shareButton').click(function () {
        console.log('here share btn is clicked');
        let url = "<?php echo e(url()->current()); ?>";
        let _token   = $('meta[name="csrf-token"]').attr('content');
        // $('#login-modal').fadeIn()

        $.ajax({
            type: "POST",
            url: "<?php echo e(url('getShortUrl')); ?>",
            data: {
                url:url,
                _token: _token
            } ,
            datatype: "json",
            success: function (shortUrl) {
                $(".productLink").each(function() {
                    var shareUrl = $( this ).attr('href');
                    let newUrl = shareUrl.replace('product_link',shortUrl);
                    $( this ).attr('href', newUrl);
                });

                $("#copy_text").val(shortUrl);
                $("#shareModal").modal();
            },
            error: function (data) {
                window.location.href;
            }
        });
    });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\dosize_new\resources\views/frontend/product.blade.php ENDPATH**/ ?>