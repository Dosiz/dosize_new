
<?php $__env->startSection('title'); ?>
Add Product
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
					<h3 class="page-title">העלאת מוצר לאתר</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
						<li class="breadcrumb-item active">העלאת מוצר</li>
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
								<form id="product_form" action="<?php echo e(route('product.store')); ?>" enctype="multipart/form-data" method="post">
									<?php echo csrf_field(); ?>
									<input type="hidden" name="category_id" value="<?php echo e($brand_profile->category_id); ?>" />
									<input type="hidden" name="profile_id" value="<?php echo e($brand_profile->id); ?>" />
									<div class="form-group">
										<label>שם המוצר</label>
										<input class="form-control" type="text" name="name" id="name" value="<?php echo e(old('name')); ?>" placeholder="הכנס שם מוצר">
										<div style="color:red;"><?php echo e($errors->first('name')); ?></div> <br>
									</div>
									<div class="form-group">
										<label>תמונת ראשית</label>
										<div>
											<input class="form-control" type="file" name="image" id="image">
											<div style="color:red;"><?php echo e($errors->first('image')); ?></div> <br>
											
										</div>
									</div>

									<div class="uploadDiv" style="padding-left: 10px;">
										<label>גלריית תמונות לכתבה</label>
										<div class="input-images"></div>
										<div style="color:red;"><?php echo e($errors->first('images')); ?></div> <br>
									</div>

									<div class="form-group">
										<label>מחיר רגיל</label>
										<div>
											<input class="form-control" type="number" name="price" id="price" value="<?php echo e(old('price')); ?>" placeholder="הכנס מחיר רגיל">
											<div style="color:red;"><?php echo e($errors->first('price')); ?></div> <br>
											
										</div>
									</div>
									
									<div class="form-group">
										<label>(אופציונלי) מחיר מבצע</label>
										<div>
											<input class="form-control" type="number" name="discount_price" id="discount_price" value="<?php echo e(old('discount_price')); ?>" placeholder="הכנס מחיר מבצע">
											<div style="color:red;"><?php echo e($errors->first('discount_price')); ?></div> 
											<span class="text-danger discount_price_valid"></span><br>
										</div>
									</div>

									<div class="form-group">
										<label> הזן זמן מכירה (אופציונלי) </label>
										<div>
											<input class="form-control" type="datetime-local" name="sale_time" id="sale_time" value="<?php echo e(old('sale_time')); ?>" placeholder="הכנס מחיר מבצע">
											<div style="color:red;"><?php echo e($errors->first('sale_time')); ?></div> 
											<span class="text-danger sale_time_valid"></span><br>
										</div>
									</div>

									<div class="form-group">
										<label>Select Recomended Product</label>
										<select name="product_id[]" class="select2-multiple_ form-control" multiple="multiple" id="select2MultipleEe">
											<?php if(count($products) > 0): ?>
											<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recomended_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($recomended_product->id); ?>" ><?php echo e($recomended_product->name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
										</select>
									</div>

									<div class="form-group">
										<label>Select Sub-Category</label>
										<select name="sub_category_id" class="form-control" >
											<?php if(count($sub_categories) > 0): ?>
											<?php $__currentLoopData = $sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($sub_category->sub_category_id); ?>" ><?php echo e($sub_category->subcategory->name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
										</select>
										<div style="color:red;"><?php echo e($errors->first('sub_category_id')); ?></div> <br>
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

									<div class="form-group">
										<label>תיאור המוצר</label>
										<textarea cols="30" rows="6" class="form-control summernote" name="description" id="description" ></textarea>
										<div style="color:red;"><?php echo e($errors->first('description')); ?></div> <br>
									</div>
									<div class="m-t-20 text-center">
										<button class="btn btn-primary btn-lg check_price" type="button">פרסם מוצר באתר</button>
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

	$('.check_price').click(function() {
		if($('#price').val() < $('#discount_price').val()){
			$('.discount_price_valid').text('Kindly Enter Discount price less then actual price');
			return false;
		}
		else if($('#discount_price').val()){
			if(!($('#sale_time').val())){
				$('.sale_time_valid').text('Sale Time is manadetory When discount price entered');
				return false;
			}
			else{
				$('#product_form').submit();
				
			}
		}
		else{
			$('#product_form').submit();
			
		}
	});

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

	$('#select2MultipleEe').select2({
		placeholder: "בחר תת-קטגוריה",
		allowClear: true
	});
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\dosize_new\resources\views/brand/product/add.blade.php ENDPATH**/ ?>