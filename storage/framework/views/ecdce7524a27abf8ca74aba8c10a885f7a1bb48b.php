
<?php $__env->startSection('title'); ?>
הודעת מותג
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
					<h3 class="page-title">הודעת מותג</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
						<li class="breadcrumb-item active">הודעת מותג</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">
						<?php if(! $brand_message): ?>
						<a href="<?php echo e(route('brand-message.create')); ?>" class="btn btn-primary">Add New <i class="fa fa-plus"></i></a><br><br>
						<?php endif; ?>
						<div class="table-responsive">
							<table class="datatable table table-hover table-center mb-0">
								<thead>
									<tr>
										<th>Message</th>
										<th>End Date</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php if($brand_message): ?>
									<tr>
										<td>
											<?php echo e(\Illuminate\Support\Str::limit($brand_message->message,40,'...')); ?> 
										</td>
										<td>
											<?php echo e(\Carbon\Carbon::parse($brand_message->end_date)->format('m/d/Y')); ?>

										</td>
										
										<td class="d-flex">  
											<a href="<?php echo e(route('brand-message.edit',$brand_message->id)); ?>" style="height: 33px; margin-left: 10px" class="btn btn-sm bg-success-light edit-sub-category"><i class="fe fe-pencil"></i> Edit</a>
											
										</td>
									</tr>
									<?php else: ?>
									<tr>
									<td colspan="3" style="text-align: center;"><strong> No Brand Message Added Yet </strong></td>
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
<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\dosize_new\resources\views/brand/brand_message/index.blade.php ENDPATH**/ ?>