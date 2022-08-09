	<!-- jQuery -->
	<script src="<?php echo e(asset('assets_admin/js/jquery-3.2.1.min.js')); ?>"></script>
		
		
		<!-- Bootstrap Core JS -->
        <script src="<?php echo e(asset('assets_admin/js/popper.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets_admin/js/bootstrap.min.js')); ?>"></script>
		
		<!-- Slimscroll JS -->
        <script src="<?php echo e(asset('assets_admin/plugins/slimscroll/jquery.slimscroll.min.js')); ?>"></script>
		<!-- Form Validation JS -->
        <script src="<?php echo e(asset('assets_admin/js/form-validation.js')); ?>"></script>
		
		<!-- Mask JS -->
		<script src="<?php echo e(asset('assets_admin/js/jquery.maskedinput.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets_admin/js/mask.js')); ?>"></script>
		
		<!-- Select2 JS -->
		<script src="<?php echo e(asset('assets_admin/plugins/select2/js/select2.min.js')); ?>"></script>
		<?php if(Route::is(['page'])): ?>
		<script src="<?php echo e(asset('assets_admin/plugins/raphael/raphael.min.js')); ?>"></script>    
		<script src="<?php echo e(asset('assets_admin/plugins/morris/morris.min.js')); ?>"></script>  
		<script src="<?php echo e(asset('assets_admin/js/chart.morris.js')); ?>"></script>
		<?php endif; ?>
				<!-- Datatables JS -->
				<script src="<?php echo e(asset('assets_admin/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
		<script src="<?php echo e(asset('assets_admin/plugins/datatables/datatables.min.js')); ?>"></script>
		<!-- Custom JS -->
		<script  src="<?php echo e(asset('assets_admin/js/script.js')); ?>"></script>

		<!-- multple image js -->

		<script  src="<?php echo e(asset('assets_admin/js/image-uploader.js')); ?>"></script>
		<script  src="<?php echo e(asset('assets_admin/js/jquery-ui.min.js')); ?>"></script>

        <script type="text/javascript">
        	$('.input-images').imageUploader();

		
        </script><?php /**PATH C:\wamp64\www\dosize_new\resources\views/layout/partials/admin_footer_scripts.blade.php ENDPATH**/ ?>