
<?php $__env->startSection('title'); ?>
Blog Detail
<?php $__env->stopSection(); ?>
<?php $__env->startPush('styles'); ?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" />
<style>
	.bootstrap-tagsinput
	{
		display: block !important;
	}
	.tag.label.label-info
	{
		color: #222 !important;
		background-color: rgb(207, 202, 202); 
		padding: 0px 4px
	}
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>		
<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">העלאת כתבה/מאמר חדש לאתר</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">דשבורד</a></li>
						<li class="breadcrumb-item active">הוספת כתבה</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">

						<!-- Add details -->
						<div class="row">
							<div class="col-md-6">
								<strong>כותרת ראשית</strong> <br>
								<?php echo e($blog->title); ?>

							</div>

							<div class="col-md-6">
								<strong>כותרת משנה</strong><br>
								<div>
									<?php echo e($blog->sub_title ?? ''); ?>

									
								</div>
							</div>

							<div class="col-md-12">
								<br>
								<strong>תמונת ראשית</strong><br>
									<img src="<?php echo e(asset('blog/'.$blog->image)); ?>" width="100px" height="100px">
							</div>

							<?php if($blog->images != null): ?>
							<div class="col-md-12"><br>
								<strong>Images</strong><br>
							<?php $__currentLoopData = json_decode($blog->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $all): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							
								
									<img src="<?php echo e(asset('blog/'.$all)); ?>" width="100px" height="100px">
							
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
							<?php endif; ?>

							<div class="col-md-12"><br>
								<strong>Select Sub-Category</strong>
								<select name="sub_category_id" class="form-control" >
										<option value="<?php echo e($blog->sub_category_id); ?>" disabled selected><?php echo e($blog->subcategory->name); ?></option>
								</select>
							</div>

							<div class="col-md-12"><br>
								<strong for="blog_category">Select Multiple Cities</strong>
								<select name="city_id[]" class="select2-multiple_ form-control" multiple="multiple" id="select2MultipleE">
									<?php if(count($blog_cities) > 0): ?>
									<?php $__currentLoopData = $blog_cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($city->city_id); ?>" disabled selected><?php echo e($city->city->name); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endif; ?>
								</select>
							</div><br>

							<div class="col-md-12"><br>
								<strong>תיאור המוצר</strong><br>
								<?php echo $blog->description; ?>

							</div>
							<div class="col-md-12"><br>
								<label> תגים </label>
								<input readonly class="form-control" data-role="tagsinput" type="text" name="tags" value="<?php echo e($blog->tags); ?>"
								placeholder="Tags" style="display: block; color:#111;">
							</div>
						</div>
						<!-- /Add details -->

					</div>
				</div>
			</div>			
		</div>
		
	</div>			
</div>
<!-- /Page Wrapper -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>
<script>
$(document).ready(function() {
	$('#select2MultipleE').select2({
		placeholder: "בחר תת-קטגוריה",
		allowClear: true
	});
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\dosize_new\resources\views/brand/blog/show.blade.php ENDPATH**/ ?>