
<?php $__env->startSection('title'); ?>
Brands 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>		
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Brand</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
									<li class="breadcrumb-item active">Brand</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Name</th>
													<th>Email</th>
													<th>Description</th>
													<th>Category</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php if(count($brands) > 0): ?>
												<tr>
													<?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<td>
														<?php echo e($brand->name); ?>

													</td>
													<td>
														<?php echo e($brand->email); ?>

													</td>
													<td> 
														<?php
														  $brand_profile = App\Models\BrandProfile::with('category')->where('user_id', $brand->id)->first();	
														?>
														<?php if($brand_profile): ?>
														<?php echo e($brand_profile->description); ?>

														<?php else: ?>
														<p> Brand Not Created yet </p>
														<?php endif; ?>
													</td>
													<td> 
														<?php if($brand_profile): ?>
															<?php echo e($brand_profile->category->name); ?>

														<?php else: ?>
														<p> Brand Not Created yet </p>
														<?php endif; ?>
													</td>
													<td>
														<?php
														  $brand_profile = App\Models\BrandProfile::where('user_id', $brand->id)->first();	
														?>
														<?php if($brand_profile): ?>
														<?php if($brand_profile->status == 1): ?> 
														<form action="<?php echo e(route('update-brand', $brand_profile->id)); ?>" method="POST">
															<?php echo csrf_field(); ?>                         
															<button type="submit" class="btn btn-success" name="status" value="0">Active</button>
														</form>                    
														<?php else: ?>
															<form action="<?php echo e(route('update-brand', $brand_profile->id)); ?>" method="POST">
																<?php echo csrf_field(); ?>                             
																<button type="submit" class="btn btn-danger" name="status" value="1">Inactive</button>
															</form>
														<?php endif; ?>
														<?php else: ?>
														<p> Brand Not Created yet </p>
														<?php endif; ?>
					
					
													</td>
													<td class="d-flex">  
														<form class="ml-1" action="<?php echo e(route('update-brand-status', $brand->id)); ?>" method="POST">
															<?php echo csrf_field(); ?>                         
															<button type="submit" class="confirm btn btn-sm bg-danger-light btn-active-color-primary btn-sm" name="status" value="0">Down To User</button>
														</form> 
														<?php
														  $brand_profile = App\Models\BrandProfile::where('user_id', $brand->id)->first();	
														?>
														<?php if($brand_profile): ?>
														<a href="<?php echo e(route('admin.view-brand',$brand_profile->id)); ?>" style="height: 33px; margin-left: 10px" class="btn btn-sm bg-success-light edit-sub-category"><i class="fe fe-pencil"></i> Edit</a>
														<?php else: ?>
														<p> Brand Created yet </p>
														<?php endif; ?>
													</td>
												</tr>
												 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												<?php else: ?>
												<tr>
						                        <td colspan="3" style="text-align: center;"><strong> No Brand Added Yet </strong></td>
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
<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\dosize_new\resources\views/admin/brand/index.blade.php ENDPATH**/ ?>