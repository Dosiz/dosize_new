<!DOCTYPE html>
<html lang="en">
  <head>
    <?php echo $__env->make('layout.partials.brand_signup_head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <title><?php echo $__env->yieldContent('title'); ?></title>
  </head>
  
  <body class="account-page">
  
<?php echo $__env->make('layout.partials.brand_signup_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->yieldContent('content'); ?>
<!-- <?php if(!Route::is(['chat','chat-mentee','voice-call','video-call','login','register','forgot-password'])): ?><?php endif; ?> -->

<?php echo $__env->make('layout.partials.brand_signup_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layout.partials.brand_signup_footer_scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 <?php echo $__env->yieldContent('js'); ?>
  </body>
</html><?php /**PATH C:\wamp64\www\dosize_new\resources\views/layout/brand_signup.blade.php ENDPATH**/ ?>