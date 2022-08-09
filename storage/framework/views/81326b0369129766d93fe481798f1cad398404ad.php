	<!-- Main Wrapper -->
	<div class="main-wrapper">
		
		<!-- Header -->
		<div class="header">


		<nav class="navbar navbar-expand-lg navbar-light">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
			</button>
			<?php if(isset($brand_profile)): ?>
				<a href="<?php echo e(url('brand')); ?>" class="logo logo-small">
					<img src="<?php echo e(asset('brand_logo/'.$brand_profile->brand_logo) ?? '../assets_admin/img/logo.png'); ?> " style="width:50px; height:50px;" alt="Logo">
					
				</a>
			<?php else: ?>
				<a href="<?php echo e(url('/')); ?>" class="logo logo-small">
					<img src="../assets_admin/img/logo.png" alt="Logo">
					
				</a>
			<?php endif; ?>
			<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
				<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
					<!-- User Menu -->
				<?php if(isset(Auth::user()->name)): ?>
				<li class="nav-item dropdown has-arrow">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
						<span class="user-img" style="color:#fff;"><?php echo e(Auth::user()->name); ?></span>
						
					</a>
					<div class="dropdown-menu">
						<div class="user-header">
							<div class="user-text">
								<h6><?php echo e(Auth::user()->name ?? 'User Name'); ?></h6>
								<p class="text-muted mb-0"><?php echo e(Auth::user()->email ?? 'USer Email'); ?></p>
								
							</div>
						</div>
						
						<a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
						<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                            <?php echo csrf_field(); ?>
                        </form>
					</div>
				</li>
				<?php endif; ?>
				<!-- /User Menu -->
				</ul>
			</div>
			</nav>
</div>
		<!-- </div> -->
		<!-- /Header --><?php /**PATH C:\wamp64\www\dosize_new\resources\views/layout/partials/brand_signup_header.blade.php ENDPATH**/ ?>