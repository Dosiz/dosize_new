
<?php $__env->startSection('title'); ?>
Products 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>		
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Product</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
									<li class="breadcrumb-item active">Product</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<?php if(Auth::user()->hasRole('Admin')): ?>
									<a href="<?php echo e(route('admin_product.create')); ?>" class="btn btn-primary">Add New <i class="fa fa-plus"></i></a><br><br>
									<?php endif; ?>
									<?php if(session()->has('message')): ?>
					                	<div class="alert alert-success">
					                  		<?php echo e(session('message')); ?>

					                  	</div><br><br>
					              	<?php endif; ?>
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Name</th>
													<th>Image</th>
													<th>Price</th>
													<th>Description</th>
													<th class="text-right">Action</th>
												</tr>
											</thead>
											<tbody>
												<?php if(count($admin_products) > 0): ?>
												<tr>
													<?php $__currentLoopData = $admin_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<td>
														<?php echo e($admin_product->name); ?>

													</td>
													<td> 
														<img src="<?php echo e(asset('admin_product/'.$admin_product->image)); ?>" width="100px" height="100px">
													</td>
													<td>
														<?php echo e($admin_product->price); ?>

													</td>
													<td>
														<?php echo $admin_product->description; ?>

													</td>

													<td class="text-right">
														<div class="actions" style="display:flex;">
															<a href="<?php echo e(route('admin_product.edit',$admin_product->id)); ?>" style="height: 33px; margin-left: 10px" class="btn btn-sm bg-success-light edit-product"><i class="fe fe-pencil"></i> Edit</a>
															<form method="POST" action="<?php echo e(route('admin_product.destroy', $admin_product->id)); ?>"  id="form_<?php echo e($admin_product->id); ?>" >
							                                    <?php echo method_field('Delete'); ?>
							                                    <?php echo csrf_field(); ?>

							                                    <button type="submit" id="<?php echo e($admin_product->id); ?>" class="confirm btn btn-sm bg-danger-light btn-active-color-primary btn-sm">
							                                        <!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
							                                     <i class="fe fe-trash"></i> Delete
							                                        <!--end::Svg Icon-->
							                                    </button>
							                                </form>
															
														</div>
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
<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\dosize_new\resources\views/admin/admin_product/index.blade.php ENDPATH**/ ?>