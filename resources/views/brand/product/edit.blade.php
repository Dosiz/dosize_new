@extends('layout.admin')
@section('title')
Edit Product
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
					<h3 class="page-title">עדכן מוצר</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">עדכן מוצר</li>
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
								<form action="{{ route('product.update',$product->id) }}" enctype="multipart/form-data" method="post">
									@method('PUT')
    								@csrf
									<input type="hidden" name="category_id" value="{{ $product->category_id }}" >
									<input type="hidden" name="profile_id" value="{{ $product->brand_profile_id }}">
		                            <div class="form-group">
		                                <label>שם המוצר</label>
		                                <input class="form-control" type="text" name="name" id="name" value="{{ $product->name }}" placeholder="Enter Name">
		                                <div style="color:red;">{{$errors->first('name')}}</div> <br>
		                            </div>
		                            <div class="form-group">
		                                <label>גלריית תמונות המוצר</label>
		                                <div>
		                                    <input class="form-control" type="file" name="image" id="image" value="{{ $product->image }}"> <br>
											<img src="{{asset('product/'.$product->image)}}" width="100px" height="100px">
		                                    <div style="color:red;">{{$errors->first('image')}}</div> <br>
		                                    
		                                </div>
		                            </div>

		                            <div class="form-group">
		                                <label>מחיר מקורי</label>
		                                <div>
		                                    <input class="form-control" type="number" name="price" value="{{$product->price}}" id="price" placeholder="Enter Orignal Price">
		                                    <div style="color:red;">{{$errors->first('price')}}</div> <br>
		                                    
		                                </div>
			                        </div>
			                        
			                        <div class="form-group">
		                                <label>הכנס מחיר מבצע (אופציונלי)</label>
		                                <div>
		                                    <input class="form-control" type="number" name="discount_price" value="{{$product->discount_price ?? ''}}" id="discount_price" placeholder="Enter Discount Price">
		                                    <div style="color:red;">{{$errors->first('discount_price')}}</div> <br>
		                                    
		                                </div>
		                            </div>

                                    <div class="form-group">
										<label>Product Category</label>
										<input type="text" class="form-control" readonly value="{{$brand_profile->category->name}}">
									</div>
									<div class="form-group">
										<label>Select Sub-Category</label>
										<select name="sub_category_id" class="form-control" >
											@if(count($sub_categories) > 0)
											@foreach($sub_categories as $sub_category)
												<option value="{{$sub_category->sub_category_id}}"  {{ $product->sub_category_id == $sub_category->sub_category_id ? 'selected' : '' }} >{{$sub_category->subcategory->name}}</option>
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
												<option value="{{$city->id}}" @foreach($product_cities as $b_city) {{ $b_city->city_id == $city->id ? 'selected' : '' }} @endforeach>{{$city->city->name}}</option>
											@endforeach
											@endif
										</select>
										<div style="color:red;">{{$errors->first('city_id')}}</div> <br>
									</div>
                                    
		                            <div class="form-group">
		                                <label>תיאור המוצר</label>
		                                <textarea cols="30" rows="6" class="form-control summernote" name="description"  value="" id="description" >{!! $product->description !!}</textarea>
		                                <div style="color:red;">{{$errors->first('description')}}</div> <br>
		                            </div>
		                            <!-- <div class="form-group">
		                                <label class="display-block w-100">Product Status</label>
										<div>
											<div class="custom-control custom-radio custom-control-inline">
												<input class="custom-control-input" name="status" id="status" value="1" type="radio" {{ $product->status == '1' ? 'checked' : ''}}>
												<label class="custom-control-label" for="active">Active</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input class="custom-control-input" name="status" id="status" value="0" type="radio" {{ $product->status == '0' ? 'checked' : ''}}>
												<label class="custom-control-label" for="inactive">Inactive</label>
											</div>
											<div style="color:red;">{{$errors->first('status')}}</div> <br>
										</div>
		                            </div> -->
		                            <div class="m-t-20 text-center">
		                                <button class="btn btn-primary btn-lg">עדכן מוצר</button>
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

	$('#select2MultipleE').select2({
		placeholder: "בחר תת-קטגוריה",
		allowClear: true
	});
  });
</script>
@endsection