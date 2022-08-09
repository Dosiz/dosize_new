@extends('layout.admin')
@section('title')
Edit Blog
@endsection
@push('styles')
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
@endpush
@section('content')			
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Edit Blog</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
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
											<form action="{{ route('blog.update',$blog->id) }}" enctype="multipart/form-data" method="post">
												@method('PUT')
                								@csrf
												<input type="hidden" name="category_id" value="{{ $blog->category_id }}" >
												<input type="hidden" name="profile_id" value="{{ $blog->brand_profile_id }}">
					                            <div class="form-group">
					                                <label>Blog Title</label>
					                                <input class="form-control" type="text" name="title" id="title" value="{{ $blog->title }}" placeholder="Enter Title">
					                                <div style="color:red;">{{$errors->first('title')}}</div> <br>
					                            </div>
					                            <div class="form-group">
					                                <label>Blog Sub Title</label>
					                                <input class="form-control" type="text" name="sub_title" id="sub_title" value="{{ $blog->sub_title }}" placeholder="Enter Sub Title">
					                                <div style="color:red;">{{$errors->first('sub_title')}}</div> <br>
					                            </div>
					                            <div class="form-group">
					                                <label>Blog Image</label>
					                                <div>
					                                    <input class="form-control" type="file" name="image" id="image" value="{{ $blog->image }}"><br>
					                                    <img src="{{asset('blog/'.$blog->image)}}" width="100px" height="100px">
														<div style="color:red;">{{$errors->first('image')}}</div> <br>
					                                </div>
					                            </div>

												<div class="uploadDiv" style="padding-left: 10px;">
					                            	<label class="active">Blog Images</label>
					                                <div class="input-images-2"></div>
					                                <div style="color:red;">{{$errors->first('images')}}</div> <br>
					                            </div>

			                                    <div class="form-group">
			                                        <label>Blog Category</label>
			                                        <input type="text" class="form-control" readonly value="{{$brand_profile->category->name}}">
			                                    </div>
												
												<div class="form-group">
													<label>Select Recomended Blog</label>
													<select name="blog_id[]" class="select2-multiple_ form-control" multiple="multiple" id="select2MultipleEe">
														@if(count($blogs) > 0)
														@foreach($blogs as $recomended_blog)
															<option value="{{$recomended_blog->id}}" @if(count($recomended_blogs) > 0 ) @foreach($recomended_blogs as $r_blog) {{ $r_blog->recomended_blog_id == $recomended_blog->id ? 'selected' : '' }} @endforeach @endif>{{$recomended_blog->title}}</option>
														@endforeach
														@endif
													</select>
													<div style="color:red;">{{$errors->first('sub_category_id')}}</div> <br>
												</div>

			                                    <div class="form-group">
									                <label>Select Sub-Category</label>
													<select name="sub_category_id" class="form-control" >
														@if(count($sub_categories) > 0)
														@foreach($sub_categories as $sub_category)
															<option value="{{$sub_category->sub_category_id}}" >{{$sub_category->subcategory->name}}</option>
														@endforeach
														@endif
													</select>
													<div style="color:red;">{{$errors->first('sub_category_id')}}</div> <br>
									            </div>

												<div class="form-group">
													<label for="product_category">Select Multiple Cities</label>
													<select name="city_id[]" class="select2-multiple_ form-control" multiple="multiple" id="select2MultipleE">
														@if(count($brand_cities) > 0)
														@foreach($brand_cities as $city)
															<option value="{{$city->city_id}}" @foreach($blog_cities as $b_city) {{ $b_city->city_id == $city->city_id ? 'selected' : '' }} @endforeach>{{$city->city->name}}</option>
														@endforeach
														@endif
													</select>
													<input type="checkbox" class="multi_city_checkbox"> Select All
													<div style="color:red;">{{$errors->first('city_id')}}</div> <br>
												</div>
									            
												<div class="form-group">
													<label>Blog Description</label>
													<textarea cols="30" rows="6" class="form-control summernote" name="description"  value="" id="description" >{!! $blog->description !!}</textarea>
													<div style="color:red;">{{$errors->first('description')}}</div> <br>
												</div>

												<div class="col-md-12"><br>
													<label> תגים </label>
													<input readonly class="form-control" data-role="tagsinput" type="text" name="tags" value="{{$blog->tags}}"
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
@endsection
@section('js')
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
	        src: 'https://phplaravel-505339-2789556.cloudwaysapps.com/blog/'+data[i]+'',
	    });
    	 
    }
	// console.log(nietos);
	$('.input-images-2').imageUploader({
	    preloaded:nietos,
	    
	});

  });
</script>
@endsection