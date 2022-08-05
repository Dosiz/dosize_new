<div class="desktop_menu">
    <div class="desktop_menu_body">
        <img src="<?php echo e(asset('assets/img/dektopLogo.png')); ?>" alt="" class="img-fluid">
        <div class="auth_button">
            <?php if(! isset(Auth::user()->name)): ?>
            <a class="enrollemnt_button" data-toggle="modal" data-target="#enrollmentModal2">הרשמה</a>
            <a href="" data-toggle="modal" data-target="#enrollmentModal">התחברות</a>
            <?php else: ?>
                <?php if(Auth::user()->hasRole('User')): ?>
                    <p> ברוך הבא <?php echo e(Auth::user()->name); ?> </p>
                <?php else: ?>
                <a class="enrollemnt_button" href="<?php echo e(route('dashboard')); ?>"> לוּחַ מַחווָנִים </a>
                <?php endif; ?>
            <?php endif; ?>
            
        </div>
        <div class="desktop_menu_list">
            <ul>
                <li>
                    <a href="<?php echo e(route('landing-page',5)); ?>">איזור אישי <img src="<?php echo e(asset('assets/img/mobile_component/home.png')); ?>" alt=""
                            class="img-fluid"></a>
                </li>
                <?php if(! isset(Auth::user()->name)): ?>
                    <li>
                        <a href="" data-toggle="modal" data-target="#enrollmentModal2">כתבות צרכנות <img src="<?php echo e(asset('assets/img/mobile_component/wallet.png')); ?>" alt=""
                                class="img-fluid"></a>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="<?php echo e(route('user.wallet')); ?>">כתבות צרכנות <img src="<?php echo e(asset('assets/img/mobile_component/wallet.png')); ?>" alt=""
                                class="img-fluid"></a>
                    </li>
                <?php endif; ?>
                <li>
                    <a href="<?php echo e(route('city-brands',2)); ?>">הודעות <img src="<?php echo e(asset('assets/img/mobile_component/consumption.png')); ?>" alt=""
                            class="img-fluid"></a>
                </li>
                <!-- Need to add all archived categoies heref for the city -->
                <li>
                    <a href="<?php echo e(route('archive_cat')); ?>">התראות <img src="<?php echo e(asset('assets/img/mobile_component/shopping_icon.png')); ?>" alt=""
                            class="img-fluid"></a>
                </li>
            </ul>
            <div class="line"></div>
            <ul>
                 <!-- Need to add  profile link here -->
                <li>
                    <?php if(auth()->guard()->guest()): ?>
                    <a href="" data-toggle="modal" data-target="#enrollmentModal2">איזור אישי <img src="<?php echo e(asset('assets/img/mobile_component/user_icon.png')); ?>" alt=""
                            class="img-fluid"></a>
                    <?php else: ?>
                    <a href="">איזור אישי <img src="<?php echo e(asset('assets/img/mobile_component/user_icon.png')); ?>" alt=""
                        class="img-fluid"></a>
                    <?php endif; ?>
                </li>
                <li>
                    <?php if(auth()->guard()->guest()): ?>
                    <a href="" data-toggle="modal" data-target="#enrollmentModal2">שמורים <img src="<?php echo e(asset('assets/img/tag_icon.png')); ?>" alt=""
                            class="img-fluid"></a>
                    <?php else: ?>
                    <a href="<?php echo e(route('bookmarks')); ?>">שמורים <img src="<?php echo e(asset('assets/img/tag_icon.png')); ?>" alt=""
                        class="img-fluid"></a>
                    <?php endif; ?>
                </li>
                <li>
                    <?php if(auth()->guard()->guest()): ?>
                    <a href="" data-toggle="modal" data-target="#enrollmentModal2">הודעות <img src="<?php echo e(asset('assets/img/message_icon.png')); ?>" alt=""
                            class="img-fluid"></a>
                    <?php else: ?>
                    <a href="<?php echo e(route('user-message')); ?>">הודעות <img src="<?php echo e(asset('assets/img/message_icon.png')); ?>" alt=""
                        class="img-fluid"></a>
                    <?php endif; ?>
                </li>
                <li>
                    <a href=""  data-toggle="modal" data-target="#searchModal">חיפוש<img src="<?php echo e(asset('assets/img/mobile_search.png')); ?>" alt=""
                            class="img-fluid"></a>
                </li>
            </ul>
            <?php if(auth()->guard()->guest()): ?>
            <?php else: ?>
            <div class="logout_user">
                <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >התנתקות <img src="<?php echo e(asset('assets/img/mobile_component/logout_icon.png')); ?>" alt=""
                        class="img-fluid">
                </a>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                    <?php echo csrf_field(); ?>
                </form>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="dektop_mobile_menu_body">
        <img src="<?php echo e(asset('assets/img/mobile_component/tablet_logo.png')); ?>" alt="" class="img-fluid">
        <div class="desktop_menu_list">
            <ul>
                <li>
                    <a href=""><img src="<?php echo e(asset('assets/img/mobile_component/home.png')); ?>" alt=""
                            class="img-fluid"></a>
                </li>
                <li>
                    <a href=""><img src="<?php echo e(asset('assets/img/mobile_component/wallet.png')); ?>" alt=""
                            class="img-fluid"></a>
                </li>
                <li>
                    <a href=""><img src="<?php echo e(asset('assets/img/mobile_component/consumption.png')); ?>" alt=""
                            class="img-fluid"></a>
                </li>
                <li>
                    <a href=""><img src="<?php echo e(asset('assets/img/mobile_component/shopping_icon.png')); ?>" alt=""
                            class="img-fluid"></a>
                </li>
            </ul>
            <div class="line"></div>
            <ul>
                <li>
                    <a href=""><img src="<?php echo e(asset('assets/img/mobile_component/user_icon.png')); ?>" alt=""
                            class="img-fluid"></a>
                </li>
                <li>
                    <a href=""><img src="<?php echo e(asset('assets/img/tag_icon.png')); ?>" alt="" class="img-fluid"></a>
                </li>
                <li>
                    <a href=""><img src="<?php echo e(asset('assets/img/message_icon.png')); ?>" alt="" class="img-fluid"></a>
                </li>
                <li>
                    <a href=""><img src="<?php echo e(asset('assets/img/mobile_search.png')); ?>" alt="" class="img-fluid"></a>
                </li>
            </ul>
            <?php if(auth()->guard()->guest()): ?>
            <?php else: ?>
            <div class="logout_user">
                <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><img src="<?php echo e(asset('assets/img/mobile_component/logout_icon.png')); ?>" alt=""
                        class="img-fluid"></a>

                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                    <?php echo csrf_field(); ?>
                </form>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#searchModal">
  Launch demo modal
</button> -->

<?php /**PATH C:\wamp64\www\dosize_new\resources\views/layout/partials/desktop_menu.blade.php ENDPATH**/ ?>