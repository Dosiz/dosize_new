
<?php $__env->startSection('title'); ?>
Message
<?php $__env->stopSection(); ?>
<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/css/mobile-style.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/css/swiper.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('chat.chat',['receiver'=>$id])->html();
} elseif ($_instance->childHasBeenRendered('KUVB5AX')) {
    $componentId = $_instance->getRenderedChildComponentId('KUVB5AX');
    $componentTag = $_instance->getRenderedChildComponentTagName('KUVB5AX');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('KUVB5AX');
} else {
    $response = \Livewire\Livewire::mount('chat.chat',['receiver'=>$id]);
    $html = $response->html();
    $_instance->logRenderedChild('KUVB5AX', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/js/swiper.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/script.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\dosize_new\resources\views/frontend/messages.blade.php ENDPATH**/ ?>