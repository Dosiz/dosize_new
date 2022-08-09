
<?php $__env->startSection('title'); ?>
הוסף הודעת מותג
<?php $__env->stopSection(); ?>
<?php $__env->startPush('styles'); ?>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>		
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title"> הוסף הודעת מותג</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">דשבורד</a></li>
									<li class="breadcrumb-item active"> הוסף הודעת מותג</li>
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
										<div class="col-12 blog-details">
											<form action="<?php echo e(route('brand-message.store')); ?>" enctype="multipart/form-data" method="post">
                								<?php echo csrf_field(); ?>
												<input type="hidden" name="profile_id" value="<?php echo e($brand_profile->id); ?>" />
					                            <div class="form-group">
					                                <label> Message</label>
					                                <textarea cols="30" rows="6" class="form-control summernote" name="message" placeholder="Enter Message" id="message" value="<?php echo e(old('message')); ?>"></textarea>
					                                <div style="color:red;"><?php echo e($errors->first('message')); ?></div> <br>
					                            </div>

												<div class="form-group">
					                                <label> End Date</label>
					                                <input type="date" class="form-control" id="end_date" name="end_date" value="<?php echo e(old('end_date')); ?>">
			                                        <div style="color:red;"><?php echo e($errors->first('end_date')); ?></div> <br>
					                            </div>
					                            
												<div class="form-group">
													<label for="product_category">Select Multiple Cities</label>
													<select name="city_id[]" class="select2-multiple_ form-control" multiple="multiple" id="select2MultipleE">
														<?php if(count($brand_cities) > 0): ?>
														<?php $__currentLoopData = $brand_cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<option value="<?php echo e($city->city_id); ?>" ><?php echo e($city->city->name); ?></option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
														<?php endif; ?>
													</select>
													<input type="checkbox" class="multi_city_checkbox"> Select All
													<div style="color:red;"><?php echo e($errors->first('city_id')); ?></div> <br>
												</div>

					                                <button class="btn btn-primary btn-lg">Save</button>
					                            </div>
					                        </form>
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
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {

    $('.summernote').summernote({
     });

	$(".multi_city_checkbox").click(function(){
		if($(".multi_city_checkbox").is(':checked') ){
			$(this).parent().find('option').prop("selected","selected");
			$(this).parent().find('option').trigger("change");
			$(this).parent().find('option').click();
			
		}else{
			$(this).parent().find('option').removeAttr("selected","selected");
			$(this).parent().find('option').trigger("change");
		}
		
	});

	$('#select2MultipleE').select2({
		placeholder: "בחר תת-קטגוריה",
		allowClear: true
	});
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\dosize_new\resources\views/brand/brand_message/add.blade.php ENDPATH**/ ?>