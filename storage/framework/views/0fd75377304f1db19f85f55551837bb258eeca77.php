
<?php $__env->startSection('title'); ?>
Archive - Catagorey
<?php $__env->stopSection(); ?>
<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/css/mobile-style.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/css/desktop-css.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/css/swiper.css')); ?>">
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
<main style="height: auto;">
    <div class="main-wrapper" style="height: auto;">
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
        <div class="search_clothFoot d-flex justify-content-xl-between justify-content-end">
            <div class="d-none d-xl-block">
                <div class="input_search position-relative">
                    <span class="icon"><i class="fa fa-search" aria-hidden="true"></i></span>
                    <input type="text">
                    <a href="#" class="link">חיפוש ...</a>
                </div>
            </div>
            <div class="cloth_footwear d-flex align-items-center">
                <p class="mr-2 font-bold"><b>ביגוד והנעלה</b></p>
                <img src="<?php echo e(asset('assets/img/clothFoot.png')); ?>" alt="clothFootWear">
            </div>
        </div>
        <!--  -->
        <div class="arch_products mt-5">
            <div class="container-fluid">
                <div class="row justify-content-end">
                    <?php if(count($product_categories) > 0): ?>
                    <?php $__currentLoopData = $product_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-6 col-xxl-4 col-xl-3">
                        <div class="arch_product d-flex flex-column align-items-center">
                            <a href="<?php echo e(route('category_by_city',['category_id'=>$category->id,'city_id'=>5])); ?>" style="color:#212529">
                                <div class="img">
                                    <img src="<?php echo e(asset('category/'.$p_category->image)); ?>" alt="arch_product" style="width: 75px; height:54px;">
                                </div>
                                <p class="txt"><?php echo e($p_category->name); ?></p>
                            </a>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!--  -->
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
<script src="<?php echo e(asset('assets/js/swiper.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/script.js')); ?>"></script>
<script>
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
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\dosize_new\resources\views/frontend/archive/archive_category.blade.php ENDPATH**/ ?>