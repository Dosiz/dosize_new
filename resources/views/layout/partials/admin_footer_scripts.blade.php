	<!-- jQuery -->
	<script src="{{ asset('assets_admin/js/jquery-3.2.1.min.js') }}"></script>
		
		
		<!-- Bootstrap Core JS -->
        <script src="{{ asset('assets_admin/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets_admin/js/bootstrap.min.js') }}"></script>
		
		<!-- Slimscroll JS -->
        <script src="{{ asset('assets_admin/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
		<!-- Form Validation JS -->
        <script src="{{ asset('assets_admin/js/form-validation.js') }}"></script>
		
		<!-- Mask JS -->
		<script src="{{ asset('assets_admin/js/jquery.maskedinput.min.js') }}"></script>
        <script src="{{ asset('assets_admin/js/mask.js') }}"></script>
		
		<!-- Select2 JS -->
		<script src="{{ asset('assets_admin/plugins/select2/js/select2.min.js') }}"></script>
		@if(Route::is(['page']))
		<script src="{{ asset('assets_admin/plugins/raphael/raphael.min.js') }}"></script>    
		<script src="{{ asset('assets_admin/plugins/morris/morris.min.js') }}"></script>  
		<script src="{{ asset('assets_admin/js/chart.morris.js') }}"></script>
		@endif
				<!-- Datatables JS -->
				<script src="{{ asset('assets_admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
		<script src="{{ asset('assets_admin/plugins/datatables/datatables.min.js') }}"></script>
		<!-- Custom JS -->
		<script  src="{{ asset('assets_admin/js/script.js') }}"></script>

		<!-- multple image js -->

		<script  src="{{ asset('assets_admin/js/image-uploader.min.js') }}"></script>
		<script  src="{{ asset('assets_admin/js/jquery-ui.min.js') }}"></script>

        <script type="text/javascript">
        	$('.input-images').imageUploader();

		
        </script>
		@toastr_js
		@toastr_render