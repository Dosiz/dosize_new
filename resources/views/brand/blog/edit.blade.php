@extends('layout.admin')
@section('title')
Edit Blog
@endsection
@push('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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

			                                    <div class="form-group">
			                                        <label>Blog Category</label>
			                                        <input type="text" class="form-control" readonly value="{{$brand_profile->category->name}}">
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
															<option value="{{$city->id}}" @foreach($blog_cities as $b_city) {{ $b_city->city_id == $city->id ? 'selected' : '' }} @endforeach>{{$city->city->name}}</option>
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
@endsection