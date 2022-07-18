@extends('layout.admin')
@section('title')
Add Product
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
					<h3 class="page-title">העלאת מוצר לאתר</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
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
								<form id="product_form" action="{{ route('product.store') }}" enctype="multipart/form-data" method="post">
									@csrf
									<input type="hidden" name="category_id" value="{{ $brand_profile->category_id }}" />
									<input type="hidden" name="profile_id" value="{{ $brand_profile->id }}" />
									<div class="form-group">
										<label>שם המוצר</label>
										<input class="form-control" type="text" name="name" id="name" value="{{old('name')}}" placeholder="הכנס שם מוצר">
										<div style="color:red;">{{$errors->first('name')}}</div> <br>
									</div>
									<div class="form-group">
										<label>תמונת ראשית</label>
										<div>
											<input class="form-control" type="file" name="image" id="image">
											<div style="color:red;">{{$errors->first('image')}}</div> <br>
											
										</div>
									</div>

									<div class="form-group">
										<label>מחיר רגיל</label>
										<div>
											<input class="form-control" type="number" name="price" id="price" value="{{old('price')}}" placeholder="הכנס מחיר רגיל">
											<div style="color:red;">{{$errors->first('price')}}</div> <br>
											
										</div>
									</div>
									
									<div class="form-group">
										<label>(אופציונלי) מחיר מבצע</label>
										<div>
											<input class="form-control" type="number" name="discount_price" id="discount_price" value="{{old('discount_price')}}" placeholder="הכנס מחיר מבצע">
											<div style="color:red;">{{$errors->first('discount_price')}}</div> 
											<span class="text-danger discount_price_valid"></span><br>
											
											
											
										</div>
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
												<option value="{{$city->id}}" >{{$city->city->name}}</option>
											@endforeach
											@endif
										</select>
										<input type="checkbox" class="multi_city_checkbox"> Select All
										<div style="color:red;">{{$errors->first('city_id')}}</div> <br>
									</div>

									<div class="form-group">
										<label>תיאור המוצר</label>
										<textarea cols="30" rows="6" class="form-control summernote" name="description" id="description" ></textarea>
										<div style="color:red;">{{$errors->first('description')}}</div> <br>
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
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {

	$('.check_price').click(function() {
		if($('#price').val() < $('#discount_price').val()){
			$('.discount_price_valid').text('Kindly Enter Discount price less then actual price');
			return false;
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
  });
</script>
@endsection