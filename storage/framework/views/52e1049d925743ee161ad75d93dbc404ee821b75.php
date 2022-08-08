
<?php $__env->startSection('title'); ?>
Edit Blog
<?php $__env->stopSection(); ?>
<?php $__env->startPush('styles'); ?>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
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
								<h3 class="page-title">Edit Blog</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
									<li class="breadcrumb-item active">Edit Blog</li>
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
											<form action="<?php echo e(route('blog.update',$blog->id)); ?>" enctype="multipart/form-data" method="post">
												<?php echo method_field('PUT'); ?>
                								<?php echo csrf_field(); ?>
												<input type="hidden" name="category_id" value="<?php echo e($blog->category_id); ?>" >
												<input type="hidden" name="profile_id" value="<?php echo e($blog->brand_profile_id); ?>">
					                            <div class="form-group">
					                                <label>Blog Title</label>
					                                <input class="form-control" type="text" name="title" id="title" value="<?php echo e($blog->title); ?>" placeholder="Enter Title">
					                                <div style="color:red;"><?php echo e($errors->first('title')); ?></div> <br>
					                            </div>
					                            <div class="form-group">
					                                <label>Blog Sub Title</label>
					                                <input class="form-control" type="text" name="sub_title" id="sub_title" value="<?php echo e($blog->sub_title); ?>" placeholder="Enter Sub Title">
					                                <div style="color:red;"><?php echo e($errors->first('sub_title')); ?></div> <br>
					                            </div>
					                            <div class="form-group">
					                                <label>Blog Image</label>
					                                <div>
					                                    <input class="form-control" type="file" name="image" id="image" value="<?php echo e($blog->image); ?>"><br>
					                                    <img src="<?php echo e(asset('blog/'.$blog->image)); ?>" width="100px" height="100px">
														<div style="color:red;"><?php echo e($errors->first('image')); ?></div> <br>
					                                </div>
					                            </div>

												<div class="uploadDiv" style="padding-left: 10px;">
					                            	<label class="active">Blog Images</label>
					                                <div class="input-images-2"></div>
					                                <div style="color:red;"><?php echo e($errors->first('images')); ?></div> <br>
					                            </div>

			                                    <div class="form-group">
			                                        <label>Blog Category</label>
			                                        <input type="text" class="form-control" readonly value="<?php echo e($brand_profile->category->name); ?>">
			                                    </div>
												
												<div class="form-group">
													<label>Select Recomended Blog</label>
													<select name="blog_id[]" class="select2-multiple_ form-control" multiple="multiple" id="select2MultipleEe">
														<?php if(count($blogs) > 0): ?>
														<?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recomended_blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<option value="<?php echo e($recomended_blog->id); ?>" <?php if(count($recomended_blogs) > 0 ): ?> <?php $__currentLoopData = $recomended_blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r_blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($r_blog->recomended_blog_id == $recomended_blog->id ? 'selected' : ''); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>><?php echo e($recomended_blog->title); ?></option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
														<?php endif; ?>
													</select>
													<div style="color:red;"><?php echo e($errors->first('sub_category_id')); ?></div> <br>
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
															<option value="<?php echo e($city->city_id); ?>" <?php $__currentLoopData = $blog_cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b_city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($b_city->city_id == $city->city_id ? 'selected' : ''); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e($city->city->name); ?></option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
														<?php endif; ?>
													</select>
													<input type="checkbox" class="multi_city_checkbox"> Select All
													<div style="color:red;"><?php echo e($errors->first('city_id')); ?></div> <br>
												</div>
									            
												<div class="form-group">
													<label>Blog Description</label>
													<textarea cols="30" rows="6" class="form-control summernote" name="description"  value="" id="description" ><?php echo e($blog->description); ?></textarea>
													<div style="color:red;"><?php echo e($errors->first('description')); ?></div> <br>
												</div>

												<div class="col-md-12"><br>
													<label> תגים </label>
													<input readonly class="form-control" data-role="tagsinput" type="text" name="tags" value="<?php echo e($blog->tags); ?>"
													placeholder="Tags" style="display: block; color:#111;">
												</div>
					                            
					                            <div class="m-t-20 text-center">
					                                <button class="btn btn-primary btn-lg">Update Blog</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>
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

	$('#select2MultipleEe').select2({
		placeholder: "בחר תת-קטגוריה",
		allowClear: true
	});

	let data=<?php echo ($blog->images);?>;
    console.log(data.length);
    var nietos = [];
    var obj = {};
    for(var i=0;i<data.length;i++){
    	  nietos.push({
	        id: data[i],
	        src: 'http://127.0.0.1:8000/blog/'+data[i]+'',
	    });
    	 
    }
	// console.log(nietos);
	$('.input-images-2').imageUploader({
	    preloaded:nietos,
	    
	});

  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\dosize_new\resources\views/brand/blog/edit.blade.php ENDPATH**/ ?>