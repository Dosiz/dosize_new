
<?php $__env->startSection('title'); ?>
Products
<?php $__env->stopSection(); ?>
<?php $__env->startPush('styles'); ?>

<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>		
<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">Products</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
						<li class="breadcrumb-item active">Products</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">
						<a href="<?php echo e(route('product.create')); ?>" class="btn btn-primary">Add New <i class="fa fa-plus"></i></a><br><br>
						<div class="table-responsive">
							<table class="datatable table table-hover table-center mb-0">
								<thead>
									<tr>
										<th>Product Name</th>
										<th>Price</th>
										<th>Discount Price</th>
										<th>Image</th>
										<th>Category</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php if(count($products) > 0): ?>
									<tr>
										<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<td>
											<?php echo e($product->name); ?>

										</td>
										<td>
											<?php echo e($product->price); ?>

										</td>
										<td>
											<?php echo e($product->discount_price ?? ''); ?>

										</td>
										<td>
											<img src="<?php echo e(asset('product/'.$product->image)); ?>" width="100px" height="100px">
										</td>
										<td>
											<?php echo e($product->category->name); ?>

										</td>
										<td>
											<?php if($product->status == 1): ?>
												active
											<?php else: ?>
												InActive
											<?php endif; ?>
										</td>
										
										<td class="d-flex">  
											<a href="<?php echo e(route('product.show',$product->id)); ?>" target="_blank" style="height: 33px; margin-left: 10px" class="btn btn-sm bg-primary-light edit-product"><i class="fe fe-eye"></i> צפייה בפרטי המוצר</a>
											<a href="<?php echo e(route('product.edit',$product->id)); ?>" style="height: 33px; margin-left: 10px" class="btn btn-sm bg-success-light edit-sub-category"><i class="fe fe-pencil"></i> Edit</a>
											<form method="POST" action="<?php echo e(route('product.destroy', $product->id)); ?>"  id="form_<?php echo e($product->id); ?>" >
												<?php echo method_field('Delete'); ?>
												<?php echo csrf_field(); ?>

												<button type="submit" id="<?php echo e($product->id); ?>" class="confirm btn btn-sm bg-danger-light btn-active-color-primary btn-sm">
													<!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
												 <i class="fe fe-trash"></i> Delete
													<!--end::Svg Icon-->
												</button>
											</form>
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
<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\dosize_new\resources\views/brand/product/index.blade.php ENDPATH**/ ?>