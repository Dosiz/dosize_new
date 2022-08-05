<div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span><i class="fe fe-home"></i> ראשי</span>
							</li>
								<?php if(Auth::user()->hasRole('Admin')): ?>
								<li class="<?php echo e(Request::is('dashboard/dashboard') ? 'active' : ''); ?>"> 
									<a href="<?php echo e(route('dashboard')); ?>"><span>דף ניהול</span></a>
								</li>
							<li class="menu-title"> 
								<span><i class="fe fe-document"></i> ג'נרל </span>
							</li>
								<li class="<?php echo e(Request::is('admin/city') ? 'active' : ''); ?>"> 
									<a href="<?php echo e(url('admin/city')); ?>"><span> ערים </span></a>
								</li>
								<li class="<?php echo e(Request::is('admin/category') ? 'active' : ''); ?>"> 
									<a href="<?php echo e(url('admin/category')); ?>"><span> קטגוריה </span></a>
								</li>
								<li class="<?php echo e(Request::is('admin/sub-category') ? 'active' : ''); ?>"> 
									<a href="<?php echo e(url('admin/sub-category')); ?>"><span> קטגוריית משנה </span></a>
								</li>

								<li class="<?php echo e(Request::is('admin/admin_product') ? 'active' : ''); ?>"> 
									<a href="<?php echo e(url('admin/admin_product')); ?>"><span> Product </span></a>
								</li>

								<li class="<?php echo e(Request::is('admin/admin_product_orders') ? 'active' : ''); ?>"> 
									<a href="<?php echo e(url('admin/admin_product_orders')); ?>"><span> Order </span></a>
								</li>

							<li class="menu-title"> 
								<span><i class="fe fe-user"></i> מִשׁתַמֵשׁ </span>
							</li>
								<li class="<?php echo e(Request::is('admin/brands') ? 'active' : ''); ?>"> 
									<a href="<?php echo e(url('admin/brands')); ?>"><span> מותג </span></a>
								</li>
								<li class="<?php echo e(Request::is('admin/users') ? 'active' : ''); ?>"> 
									<a href="<?php echo e(url('admin/users')); ?>"><span> משתמשים </span></a>
								</li>

								<?php endif; ?>
								<?php if(Auth::user()->hasRole('Manager')): ?>
								<li class="<?php echo e(Request::is('dashboard/dashboard') ? 'active' : ''); ?>"> 
								<a href="<?php echo e(route('dashboard')); ?>"><span>דף ניהול</span></a>
								</li>
								<?php endif; ?>
								<?php if(Auth::user()->hasRole('Brand')): ?>
								<li class="<?php echo e(Request::is('dashboard/dashboard') ? 'active' : ''); ?>"> 
									<a href="<?php echo e(route('dashboard')); ?>"><span>דף ניהול</span></a>
								</li>

								<li class="<?php echo e(Request::is('brand/blog') ? 'active' : ''); ?>"> 
									<a href="<?php echo e(route('blog.index')); ?>"><span> בלוגים </span></a>
								</li>

								<li class="<?php echo e(Request::is('brand/product') ? 'active' : ''); ?>"> 
									<a href="<?php echo e(route('product.index')); ?>"><span> מוצר </span></a>
								</li>

								<li class="<?php echo e(Request::is('brand/brand-message') ? 'active' : ''); ?>"> 
									<a href="<?php echo e(route('brand-message.index')); ?>"><span> הודעה למנוי	</span></a>
								</li>
                                <li class="<?php echo e(Request::is('brand/messages') ? 'active' : ''); ?>"> 
                                    <a href="<?php echo e(url('brand/messages?id='.Auth::user()->id.'')); ?>"><span>Chat</span></a>
                                </li>

								<li class="<?php echo e(Request::is('brand/brand_subscriber') ? 'active' : ''); ?>"> 
                                    <a href="<?php echo e(url('brand/brand_subscriber?id='.Auth::user()->id.'')); ?>"><span>Subscriber</span></a>
                                </li>

								<li class="<?php echo e(Request::is('brand/product_comments') ? 'active' : ''); ?>"> 
                                    <a href="<?php echo e(url('brand/product_comments?id='.Auth::user()->id.'')); ?>"><span>Product Comments</span></a>
                                </li>

								<li class="<?php echo e(Request::is('brand/blog_comments') ? 'active' : ''); ?>"> 
                                    <a href="<?php echo e(url('brand/blog_comments?id='.Auth::user()->id.'')); ?>"><span>Blog Comments</span></a>
                                </li>

								<?php endif; ?>

							
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar<?php /**PATH C:\wamp64\www\dosize_new\resources\views/layout/partials/admin_nav.blade.php ENDPATH**/ ?>