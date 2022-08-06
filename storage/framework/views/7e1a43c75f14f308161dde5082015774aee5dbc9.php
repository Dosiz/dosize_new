
<?php $__env->startSection('title'); ?>
Product Comments
<?php $__env->stopSection(); ?>
<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>		
<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">Product Comments</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
						<li class="breadcrumb-item active">Product Comments</li>
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
										<th> Name</th>
										<th>Comment</th>
										<th>Product Name</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									<?php if(count($product_comments) > 0): ?>
									<tr>
										<?php $__currentLoopData = $product_comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<td>
											<?php echo e($comment->name ?? $comment->user->name); ?>

										</td>
										<td>
											<?php echo e($comment->comment); ?>

										</td>
										<td>
											<?php echo e($comment->product->name ?? ''); ?>

										</td>
										<td>
											<?php if($comment->status == 1): ?> 
											<form action="<?php echo e(route('update-product-comment', $comment->id)); ?>" method="POST">
												<?php echo csrf_field(); ?>                         
												<button type="submit" class="btn btn-success" name="status" value="0">Inactive</button>
											</form>                    
											<?php else: ?>
												<form action="<?php echo e(route('update-product-comment', $comment->id)); ?>" method="POST">
													<?php echo csrf_field(); ?>                             
													<button type="submit" class="btn btn-danger" name="status" value="1">Active</button>
												</form>
											<?php endif; ?>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\dosize_new\resources\views/brand/comment/product_comments.blade.php ENDPATH**/ ?>