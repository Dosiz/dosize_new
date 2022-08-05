<div class="mobile_side_menu">
    <h4>צהריים טובים!</h4>
    <div class="auth_button">
        <a class="enrollemnt_button" data-toggle="modal" data-target="#enrollmentModal">הרשמה</a>
        <a href="">התחברות</a>
    </div>
    <div class="mobile_menu_list">
        <ul>
            <li>
                <a href="">איזור אישי <img src="<?php echo e(asset('assets/img/mobile_component/userIcon.png')); ?>" alt=""
                        class="img-fluid"></a>
            </li>
            <li>
                <a href="">כתבות צרכנות <img src="<?php echo e(asset('assets/img/mobile_component/cartIcon.png')); ?>" alt=""
                        class="img-fluid"></a>
            </li>
            <li>
                <a href="">הודעות <img src="<?php echo e(asset('assets/img/mobile_component/messageIcon.png')); ?>" alt=""
                        class="img-fluid"></a>
            </li>
            <li>
                <a href="">התראות <img src="<?php echo e(asset('assets/img/mobile_component/bellIcon.png')); ?>" alt=""
                        class="img-fluid"></a>
            </li>
            <li>
                <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><img src="<?php echo e(asset('assets/img/mobile_component/logout_icon.png')); ?>" alt=""
                    class="img-fluid"></a>

            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                <?php echo csrf_field(); ?>
            </form>
            </li>
        </ul>
    </div>
</div><?php /**PATH C:\wamp64\www\dosize_new\resources\views/layout/partials/mobile_side_menu.blade.php ENDPATH**/ ?>