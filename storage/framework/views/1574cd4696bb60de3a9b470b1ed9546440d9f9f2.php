
<?php $__env->startSection('title'); ?>
Dosize
<?php $__env->stopSection(); ?>
<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/css/mobile-style.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/css/desktop-css.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/css/swiper.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>

<main>
    <div class="main-wrapper">
        <div class="categories spacing">
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
        <div class="line spacing"></div>
        <div class="hot_flashes_div spacing">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <ul>
                            <?php if($brand_messages): ?>
                            <?php $__currentLoopData = $brand_messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand_message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php  
                                $current_date = \Carbon\Carbon::now();
                                $sale_time = \Carbon\Carbon::parse($brand_message->end_date);
                                $diff_in_days = $current_date->diffInDays( $sale_time,false) + 1;
                            ?>
                            <?php if($diff_in_days >= 0): ?>
                            <?php if($loop->first): ?>
                            <li class="active">
                                <a class="font-size-12" href=""> <?php echo $brand_message->message; ?> <img
                                        src="<?php echo e(asset('brand_image/'.$brand_message->brand_image)); ?>" alt=""
                                        class="img-fluid" style="width: 20px; height: 20px;"></a>
                            </li>
                            <?php else: ?>
                            <li>
                                <a class="font-size-12" href=""><?php echo e($brand_message->message); ?><img src="<?php echo e(asset('brand_image/'.$brand_message->brand_image)); ?>" alt=""
                                        class="img-fluid" style="width: 20px; height: 20px;"></a>
                            </li>
                            <?php endif; ?>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <?php if(count($discount_products) > 0): ?>
        <div class="line spacing"></div>
        <div class="promotion spacing">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 text-right">
                        <h3 class="common_title">המבצעים שלא תרצו לפספס <img
                                src="<?php echo e(asset('assets/img/mobile_component/percentage_icon.png')); ?>" alt=""
                                class="img-fluid">
                        </h3>
                    </div>
                </div>
            </div>
            <div class="slider_div">
                <div class="multiple_promotion swiper">
                    <div class="swiper-wrapper">    
                        <?php if(count($discount_products) > 0): ?>
                            <?php $__currentLoopData = $discount_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            
                                <div class="promotion_box box_shahdow swiper-slide">
                                    <div class="promotion_img_box">
                                        <a class="font-size-14 font-weight-700" href="<?php echo e(route('product',$product->id)); ?>">
                                        <img src="<?php echo e(asset('product/'.$product->image)); ?>" alt=""
                                            class="img-fluid" style="width: 209px; height:105px;">
                                        </a>
                                        <span class="font-size-14 font-weight-700"><?php echo e(number_format((( $product->discount_price / $product->price ) * 100),1)); ?> %</span>
                                    </div>
                                    <div class="promotion_content">
                                        <div class="time_category_text">
                                            <div class="time_div">
                                                
                                                <p class="example" discount-time="<?php echo e(\Carbon\Carbon::parse($product->sale_time)->format('m/d/Y H:i:s')); ?>">
                                                    <span class="font-size-12 font-weight-600 days" style="font-size:12px;" title="Days">00</span> : <span class="font-size-12 font-weight-600 hours" style="font-size:12px;" title="Hours">00</span> : <span class="font-size-12 font-weight-600 minutes" style="font-size:12px;" title="Minutes">00</span> : <span class="font-size-12 font-weight-600 seconds" style="font-size:12px;" title="Seconds">00</span>
                                                </p>
                                            </div>
                                            <a class="font-size-14 font-weight-700" href="<?php echo e(route('brand-profile',$product->brand_profile_id)); ?>" >
                                                <p class="promotion_category font-size-12 font-weight-400"> <?php echo e($product->brand_name); ?> </p>
                                            </a>
                                        </div>
                                        <a class="font-size-14 font-weight-700" href="<?php echo e(route('product',$product->id)); ?>">
                                            <p class="promotion_title font-size-14 font-weight-700 text-right"  style="color: #212529 !important;">
                                                <?php echo e($product->name); ?>

                                            </p>
                                        </a>
                                        <div class="price_learn_more">
                                            <a class="font-size-14 font-weight-700" href="<?php echo e(route('product',$product->id)); ?>">למידע נוסף ></a>
                                            
                                            <p class="font-size-14 font-weight-600"><?php echo e($product->discount_price); ?> ₪ <span
                                                    class="font-size-12 font-weight-400"><?php echo e($product->price ?? '00'); ?> ₪</span></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if(count($blogs) > 0 && $blogs['0']->id != null): ?>
        <div class="line spacing"></div>
        <div class="affordable_consumption spacing">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 text-right">
                        <h3 class="common_title">צרכנות משתלמת <img
                                src="<?php echo e(asset('assets/img/mobile_component/beg.png')); ?>" alt="" class="img-fluid"></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="affordable_consumption_list d-flex multiple_afforable_consumption">
                            <?php if(count($blogs) > 0): ?>
                            <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <div class="affordable_consumption_box box_shahdow">
                                <a href="<?php echo e(route('article',$blog->id)); ?>">
                                <img src="<?php echo e(asset('blog/'.$blog->image)); ?>" alt=""
                                    class="img-fluid" style="width: 131px; height: 160px">
                                </a>
                                <div class="content_div">
                                    <a href="<?php echo e(route('brand-profile',$blog->brand_profile_id)); ?>">
                                    <span class="category font-size-12 font-weight-400"> <?php echo e($blog->brand_name); ?> </span>
                                    </a>
                                    <a href="<?php echo e(route('article',$blog->id)); ?>" style="color: #212529 !important">
                                    <h4 class="font-size-12 font-weight-700">
                                        <?php echo e($blog->title); ?>

                                    </h4>
                                    <p class="discription font-size-10 font-weight-400">
                                        <?php echo substr($blog->description, 0,  30); ?>  
                                    </p>
                                    </a>
                                    <span class="font-size-12"><?php echo e($blog->totallikes); ?> <i class="fa fa-heart"
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
        <?php if(count($products) > 0 && $products[0]->id != null): ?>
        <div class="line spacing"></div>
        <div class="order_div spacing">
            <div class="deals deal_one">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <h3 class="common_title">דילים חמים מהתנור <img
                                    src="<?php echo e(asset('assets/img/mobile_component/deals.png')); ?>" alt="" class="img-fluid">
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="slider_div">
                    <div class="multiple_deals swiper">
                        <div class="swiper-wrapper">
                            <?php if(count($products) > 0 && $products[0]->id != null): ?>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="deals_box box_shahdow swiper-slide">
                                        <a class="font-size-14 font-weight-700" href="<?php echo e(route('product',$product->id ?? '')); ?>">
                                            <img src="<?php echo e(asset('product/'.$product->image)); ?>" alt="" class="img-fluid" style="width: 208px; height:163px">
                                        </a>
                                        <div class="content_div">
                                            <a href="<?php echo e(route('brand-profile',$product->brand_profile_id ?? '')); ?>">
                                            <span class="deal_category font-size-12 font-weight-400"> <?php echo e($product->brand_name); ?></span>
                                            </a>
                                            <a href="<?php echo e(route('product',$product->id ?? '')); ?>" style="color:#212529 !important;">
                                            <h4 class="title font-size-14 font-weight-700">  
                                                <?php echo e($product->name); ?>

                                            </h4>
                                            <div class="rating_price_div">
                                                <p class="font-size-14 font-weight-600"><?php echo e($product->price ?? ''); ?> ₪ <span
                                                        class="font-size-12 font-weight-400">80 ₪</span></p>
                                                <p class="rating_text"><?php echo e($product->avgrate ?? 'no rating'); ?> <i class="fa fa-star"></i></p>
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
            <div class="hot_flashes">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <span class="annoucment_text font-size-16 font-weight-600">מבזקים חמים <img
                                    src="<?php echo e(asset('assets/img/mobile_component/anaoucment.png')); ?>" alt=""
                                    class="img-fluid"></span>
                            <div class="hot_flashes_list">
                                <ul>
                                    <li>
                                        <div class="img_box">
                                            <img src="<?php echo e(asset('assets/img/mobile_component/flashes_2.png')); ?>" alt=""
                                                class="img-fluid">
                                        </div>
                                        <p class="flashes_comment font-size-14">שימו לב, חדש באתר! משלוח
                                            חינם בקנייה
                                            מעל
                                            300 ש”ח
                                        </p>
                                    </li>
                                    <li>
                                        <div class="img_box">
                                            <img src="<?php echo e(asset('assets/img/mobile_component/flashes_1.png')); ?>" alt=""
                                                class="img-fluid">
                                        </div>
                                        <p class="flashes_comment font-size-14">שימו לב, חדש באתר! משלוח
                                            חינם בקנייה
                                            מעל
                                            300 ש”ח
                                        </p>
                                    </li>
                                    <li>
                                        <div class="img_box">
                                            <img src="<?php echo e(asset('assets/img/mobile_component/flashes_2.png')); ?>" alt=""
                                                class="img-fluid">
                                        </div>
                                        <p class="flashes_comment font-size-14">שימו לב, חדש באתר! משלוח
                                            חינם בקנייה
                                            מעל
                                            300 ש”ח
                                        </p>
                                    </li>
                                </ul>
                                <p class="more_flashes text-center font-size-12">עוד מבזקים...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if(count($brands_recomanded_products) > 0): ?>
            <div class="deals deal_two">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <h3 class="common_title">הכי מומלצים <img
                                    src="<?php echo e(asset('assets/img/mobile_component/star.png')); ?>" alt="" class="img-fluid">
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="slider_div">
                    <div class="multiple_deals swiper">
                        <div class="swiper-wrapper">
                            <?php if(count($brands_recomanded_products) > 0): ?>
                            <?php $__currentLoopData = $brands_recomanded_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recomanded_products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = $recomanded_products->recommended_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="deals_box box_shahdow swiper-slide">
                                <a class="font-size-14 font-weight-700" href="<?php echo e(route('product',$product->id)); ?>">
                                    <img src="<?php echo e(asset('product/'.$product->image)); ?>" alt="" class="img-fluid" style="width: 208px; height: 165px;">
                                </a>
                                <div class="content_div">
                                    <a class="font-size-14 font-weight-700" href="<?php echo e(route('brand-profile',$recomanded_products->id)); ?>">
                                    <span class="deal_category font-size-12 font-weight-400"> <?php echo e($recomanded_products->brand_name); ?> </span>
                                    </a>
                                    <a class="font-size-14 font-weight-700" href="<?php echo e(route('product',$product->id)); ?>" style="color: #212529 !important;">
                                    <h4 class="title font-size-14 font-weight-700">
                                        <?php echo e($product->name); ?>

                                    </h4>
                                    <div class="rating_price_div">
                                        <p class="font-size-14 font-weight-600"><?php echo e($product->price); ?> ₪ <span
                                                class="font-size-12 font-weight-400">80 ₪</span></p>
                                        <p class="rating_text"><?php echo e($product->product_comment->avg('rating') ?? 'no rating'); ?> <i class="fa fa-star"></i></p>
                                    </div>
                                    </a>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        <?php $i = 1; ?>
        <?php if(count($products_by_categories) > 0 ): ?>
        <div class="row">
        <?php $__currentLoopData = $products_by_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if( count($product_category->product) > 0): ?>
            <?php if($i == 1 || $i == 2): ?>
            <div class="col-md-6">
                <div class="products_div spacing">
                    <div class="container-fluid">
                       
                            <div class="no_padding">
                                <div class="affordable_consumption">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-lg-12 text-right">
                                                <div class="header_cloth">
                                                    
                                                    <img src="<?php echo e(asset('category/'.$product_category->image ?? '')); ?>" width="60px" height="50px">
                                                    <h3 class="common_title"> <?php echo e($product_category->name ?? ''); ?><img
                                                            src="<?php echo e(asset('assets/img/mobile_component/Line.png')); ?>" alt=""
                                                            class="img-fluid">
                                                    </h3>
                                                    <span class="read_more">
                                                        <a href="<?php echo e(route('category_by_city',['category_id'=>$product_category->id,'city_id'=>5])); ?>" class="font-size-12 font-weight-400">
                                                            כתבות ביגוד והנעלה</a> </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="article_div">
                                            <div class="row">
                                                
                                                <div class="col-lg-6">
                                                    <div class="main_article">
                                                        <div class="article_box">
                                                            <a class="font-size-14 font-weight-700" href="<?php echo e(route('product',$product_category->product['0']->id ?? '')); ?>">
                                                                <img src="<?php echo e(asset('product/'.$product_category->product['0']->image ?? '' )); ?>" width="120px" height="111px">
                                                            </a>
                                                            <a style="color: #212529 !important" href="<?php echo e(route('product',$product_category->product['0']->id ?? '')); ?>">
                                                            <div class="article_content">
                                                                <h4 class="font-size-18"
                                                                    style="margin-bottom: 20px;">
                                                                    <?php echo e($product_category->product['0']->name ?? ''); ?>

                                                                </h4>
                                                                <p class="font-size-12">צפו
                                                                    <?php echo \Illuminate\Support\Str::limit($product_category->product['0']->description ?? '',60,'...'); ?>

                                                                </p>
                                                            </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="affordable_consumption_list">
                                                    <?php if( count($product_category->product) > 1): ?>
                                                    <div class="affordable_consumption_box box_shahdow">
                                                        <a class="font-size-14 font-weight-700" href="<?php echo e(route('product',$product_category->product['1']->id ?? '')); ?>">
                                                            <img src="<?php echo e(asset('product/'.$product_category->product['1']->image ?? '')); ?>" width="238px" height="120px">
                                                        </a>
                                                        <div class="content_div">
                                                            <a class="font-size-14 font-weight-700" href="<?php echo e(route('brand-profile',$product_category->product['1']->brandprofile->id ?? '')); ?>">
                                                            <span class="category font-size-12 font-weight-400"> <?php echo e($product_category->product['1']->brandprofile->brand_name ?? ''); ?> </span>
                                                            </a>
                                                            <a class="font-size-14 font-weight-700" href="<?php echo e(route('product',$product_category->product['1']->id ?? '')); ?>" style="color: #212529 !important;">
                                                            <h4 class="font-size-14 font-weight-700">
                                                                <?php echo e($product_category->product['1']->name ?? ''); ?>

                                                            </h4>
                                                            <p class="discription font-size-12 font-weight-400">
                                                                <?php echo \Illuminate\Support\Str::limit($product_category->product['1']->description ?? '',60,'...'); ?>

                                                            </p>
                                                            </a>
                                                            <span class="font-size-12 like_span">4 <i
                                                                    class="fa fa-heart"
                                                                    aria-hidden="true"></i></span>
                                                            <div class="rating_price_div">
                                                                <a class="font-size-14 font-weight-700" href="<?php echo e(route('product',$product_category->product['1']->id ?? '')); ?>" style="color: #212529 !important">
                                                                <p class="font-size-14 font-weight-600">
                                                                    <?php echo e($product_category->product['1']->price ?? ''); ?> ₪
                                                                </p>
                                                                </a>
                                                                <p class="rating_text" style="visibility: hidden;">4.8 <i
                                                                        class="fa fa-star"></i></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php endif; ?>
                                                    <?php if( count($product_category->product) > 2): ?>
                                                    <div class="affordable_consumption_box box_shahdow">
                                                        <a class="font-size-14 font-weight-700" href="<?php echo e(route('product',$product_category->product['2']->id ?? '')); ?>">
                                                            <img src="<?php echo e(asset('product/'.$product_category->product['2']->image ?? '')); ?>" width="238px" height="120px">
                                                        </a>
                                                        <div class="content_div">
                                                            <a class="font-size-14 font-weight-700" href="<?php echo e(route('brand-profile',$product_category->product['2']->brandprofile->id ?? '')); ?>">
                                                            <span class="category font-size-12 font-weight-400"> <?php echo e($product_category->product['2']->brandprofile->brand_name ?? ''); ?> </span>
                                                            </a>
                                                            <a class="font-size-14 font-weight-700" href="<?php echo e(route('product',$product_category->product['2']->id ?? '')); ?>" style="color: #212529 !important;">
                                                            <h4 class="font-size-14 font-weight-700">
                                                                <?php echo e($product_category->product['2']->name ?? ''); ?>

                                                            </h4>
                                                            <p class="discription font-size-12 font-weight-400">
                                                                <?php echo \Illuminate\Support\Str::limit($product_category->product['2']->description ?? '',60,'...'); ?>

                                                            </p>
                                                            </a>
                                                            <span class="font-size-12 like_span">5 <i
                                                                    class="fa fa-heart"
                                                                    aria-hidden="true"></i></span>
                                                            <div class="rating_price_div">
                                                                <a class="font-size-14 font-weight-700" href="<?php echo e(route('product',$product_category->product['2']->id ?? '')); ?>" style="color: #212529 !important;">
                                                                <p class="font-size-14 font-weight-600">
                                                                    <?php echo e($product_category->product['2']->price ?? ''); ?> ₪
                                                                </p>
                                                                </a>
                                                                <p class="rating_text" style="visibility: hidden;">4.8 <i
                                                                        class="fa fa-star"></i></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php endif; ?>
                                                    <div class="slider_div">
                                                        <img src="<?php echo e(asset('assets/img/mobile_component/slider_img.png')); ?>"
                                                            alt="" class="img-fluid">
                                                    </div>
                                                    <a href="" class="learn_more font-size-12 font-weight-400">לעוד
                                                        כתבות ביגוד
                                                        והנעלה
                                                        ></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                      
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php if($i == 3 || $i == 4): ?>
            <div class="col-md-6">
                <div class="home_medical_items spacing">
                    <div class="container-fluid">
                        
                                <div class="affordable_consumption">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-lg-12 text-right">
                                                <div class="header_cloth">
                                                    
                                                    <img src="<?php echo e(asset('category/'.$product_category->image)); ?>" width="60px" height="50px">
                                                    <h3 class="common_title">  <?php echo e($product_category->name); ?> <img
                                                            src="<?php echo e(asset('assets/img/mobile_component/Line.png')); ?>" alt=""
                                                            class="img-fluid">
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="affordable_consumption_list">
                                                    <?php if( count($product_category->product) > 3): ?>
                                                    <div class="affordable_consumption_box box_shahdow">
                                                        <a class="font-size-14 font-weight-700" href="<?php echo e(route('product',$product_category->product['0']->id ?? '')); ?>">
                                                            <img src="<?php echo e(asset('product/'.$product_category->product['0']->image ?? '')); ?>" width="131px" height="226px">
                                                        </a>
                                                        <div class="content_div">
                                                            
                                                            <span class="category font-size-12 font-weight-400"> <?php echo e($product_category->product['0']->brandprofile->brand_name ?? ''); ?> </span>
                                                            <h4 class="font-size-14 font-weight-700">
                                                                <?php echo e($product_category->product['0']->name ?? ''); ?>

                                                            </h4>
                                                            <p class="discription font-size-12 font-weight-400">
                                                                <?php echo \Illuminate\Support\Str::limit($product_category->product['0']->description ?? '',60,'...'); ?>

                                                            </p>
                                                            
                                                        </div>
                                                    </div>
                                                    <?php endif; ?>
                                                    <?php if( count($product_category->product) > 1): ?>
                                                    <div class="affordable_consumption_box box_shahdow">
                                                        <a class="font-size-14 font-weight-700" href="<?php echo e(route('product',$product_category->product['1']->id ?? '')); ?>">
                                                            <img src="<?php echo e(asset('product/'.$product_category->product['1']->image ?? '')); ?>" width="131px" height="137px">
                                                        </a>
                                                        <div class="content_div">
                                                            <span class="category font-size-12 font-weight-400">
                                                                <?php echo e($product_category->product['1']->brandprofile->brand_name ?? ''); ?>

                                                            </span>
                                                            <h4 class="font-size-14 font-weight-700">
                                                                <?php echo e($product_category->product['1']->name ?? ''); ?>

                                                            </h4>
                                                            <p class="discription font-size-12 font-weight-400">
                                                                <?php echo \Illuminate\Support\Str::limit($product_category->product['1']->description ?? '',60,'...'); ?>

                                                            </p>
                                                            <span class="font-size-12 like_span">4
                                                                <i class="fa fa-heart"
                                                                    aria-hidden="true"></i></span>
                                                            <div class="rating_price_div">
                                                                <p class="font-size-14 font-weight-600">
                                                                    ₪ <?php echo e($product_category->product['1']->price ?? ''); ?>

                                                                </p>
                                                                <p class="rating_text" style="visibility: hidden;"><i class="fa fa-star"></i>
                                                                    4.8
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php endif; ?>
                                                    <?php if( count($product_category->product) > 2): ?>
                                                    <div clas
                                                    <?php endif; ?>
                                                    <div class="slider_div">
                                                        <img src="<?php echo e(asset('assets/img/mobile_component/slider_img.png')); ?>"
                                                            alt="" class="img-fluid">
                                                    </div>
                                                    <a href="" class="learn_more font-size-12 font-weight-400">לעוד
                                                        כתבות ביגוד
                                                        והנעלה
                                                        ></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                           
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php $i++; ?>
            <?php if($i == 5): ?>
            <?php $i = 1; ?>
            <?php endif; ?>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
        <?php endif; ?>
        
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
        <!--  -->
    </div>
</main>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<script src="<?php echo e(asset('assets/js/swiper.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/script.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/Minimal-jQuery-Countdown/jquery.countdown.min.js')); ?>"></script>
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
        // e.preventDefault();
        // $('.main-wrapper').addClass('active');
        // $.ajax({
        //     type: "POST",
        //     url: "<?php echo e(route('register')); ?>",
        //     data: new FormData(this),
        //     datatype: "json",
        //     processData: false,
        //     contentType: false,
        //     cache: false,
        //     success: function (data) {
        //         console.log("Success");
        //         $('.close').click();
        //         window.location.href="/";
                 
        //     },
        //     error: function (data) {
        //             $('.name_valid').text(data?.responseJSON?.errors?.name);
        //             $('.email_valid').text(data?.responseJSON?.errors?.email);
        //             $('.city_valid').text(data?.responseJSON?.errors?.city_id);
        //             $('.password_valid').text(data?.responseJSON?.errors?.password);
        //     }
        // });
    });

    $('#login_form').submit(function(e){
        // e.preventDefault();
        // $('.main-wrapper').addClass('active');
        // $.ajax({
        //     type: "POST",
        //     url: "<?php echo e(route('login')); ?>",
        //     data: new FormData(this),
        //     datatype: "json",
        //     processData: false,
        //     contentType: false,
        //     cache: false,
        //     success: function (data) {
        //         console.log(data);
        //         $('.close').click();
        //         // window.location.href="/dashboard/dashboard";
                 
        //     },
        //     error: function (data) {
        //         console.log('Error:', data.responseJSON);
        //         if($('#email').val() == ''){
        //             $('.email_valid').text(data.responseJSON.errors.email);
        //         }
        //         else{
        //             $('.email_valid').text('');
        //         }
        //         if($('#password').val() == ''){
        //             $('.password_valid').text(data.responseJSON.errors.password);
        //         }
        //         else{
        //             $('.password_valid').text('');
        //         }
                
                
        //     }
        // });
    });

    // console.log($('.example'))
    [...document.querySelectorAll('.example')].forEach(elem => {
        $(elem).countdown({
        date: elem.getAttribute('discount-time')
        }, function () {
            $(elem).parent().parent().parent().parent().addClass('d-none');
    });
    })

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\dosize_new\resources\views/landing_page.blade.php ENDPATH**/ ?>