<!DOCTYPE html>
<html lang="en">
  <head>
    <?php echo $__env->make('layout.partials.admin_head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <?php echo \Livewire\Livewire::styles(); ?>

  </head>
  <?php if(Route::is(['error-404','error-500'])): ?>
  <body class="error-page">
  <?php endif; ?>
  <body>
    <?php echo $__env->make('layout.partials.admin_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('layout.partials.admin_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->make('layout.partials.admin_footer_scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo \Livewire\Livewire::scripts(); ?>

    <?php echo $__env->yieldContent('js'); ?>
  </body>
</html><?php /**PATH C:\wamp64\www\dosize_new\resources\views/layout/admin.blade.php ENDPATH**/ ?>