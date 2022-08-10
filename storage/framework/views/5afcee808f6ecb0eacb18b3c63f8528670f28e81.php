
<?php $__env->startSection('title'); ?>
Product Orders
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>		
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Product Orders</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
									<li class="breadcrumb-item active">Product Orders</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<?php if(session()->has('message')): ?>
					                	<div class="alert alert-success">
					                  		<?php echo e(session('message')); ?>

					                  	</div><br><br>
					              	<?php endif; ?>
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Product Name</th>
													<th>User Name</th>
													<th>User Email</th>
													<th>Coins</th>
												</tr>
											</thead>
											<tbody>
												<?php if(count($admin_product_orders) > 0): ?>
												<tr>
													<?php $__currentLoopData = $admin_product_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin_product_order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<td>
														<?php echo e($admin_product_order->product->name); ?>

													</td>
													<td> 
														<?php echo e($admin_product_order->user->name); ?>

													</td>
													<td>
														<?php echo e($admin_product_order->user->email); ?>

													</td>
													<td>
														<?php echo e($admin_product_order->coins); ?>

													</td>

												</tr>
												 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												<?php else: ?>
												<tr>
						                        <td colspan="3" style="text-align: center;"><strong> No Product Added Yet </strong></td>
						                      </tr>
						                      <?php endif; ?>
						                    <tbody>
						                      
						                     
										</table>
									</div>
								</div>
							</div>
						</div>			
					</div>
					
				</div>			
			</div>
			<!-- /Page Wrapper -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\dosize_new\resources\views/admin/admin_product/orders.blade.php ENDPATH**/ ?>