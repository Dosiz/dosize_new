@extends('layout.admin')
@section('title')
Blog Detail
@endsection
@push('styles')
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
					<h3 class="page-title">העלאת כתבה/מאמר חדש לאתר</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{route('dashboard')}}">דשבורד</a></li>
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
								{{$blog->title}}
							</div>

							<div class="col-md-6"><br>
								<strong>כותרת משנה</strong>
								<div>
									{{$blog->sub_title ?? ''}}
									
								</div>
							</div>

							<div class="col-md-6">
								<strong>תמונת ראשית</strong><br>
									<img src="{{asset('blog/'.$blog->image)}}" width="100px" height="100px">
							</div>

							<div class="col-md-6"><br>
								<strong>Select Sub-Category</strong>
								<select name="sub_category_id" class="form-control" >
										<option value="{{$blog->sub_category_id}}" disabled selected>{{$blog->subcategory->name}}</option>
								</select>
							</div>

							<div class="col-md-12"><br>
								<strong for="blog_category">Select Multiple Cities</strong>
								<select name="city_id[]" class="select2-multiple_ form-control" multiple="multiple" id="select2MultipleE">
									@if(count($blog_cities) > 0)
									@foreach($blog_cities as $city)
										<option value="{{$city->city_id}}" disabled selected>{{$city->city->name}}</option>
									@endforeach
									@endif
								</select>
							</div><br>

							<div class="col-md-12"><br>
								<strong>תיאור המוצר</strong><br>
								{!! $blog->description !!}
							</div>
							<div class="col-md-12"><br>
								<label> תגים </label>
								<input readonly class="form-control" data-role="tagsinput" type="text" name="tags" value="{{$blog->tags}}"
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
@endsection

@section('js')
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
@endsection