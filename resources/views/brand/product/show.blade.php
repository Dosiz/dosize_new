@extends('layout.admin')
@section('title')
Product Detail
@endsection
@push('styles')
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
							<div class="col-md-6">
								<strong>שם המוצר</strong> <br>
								{{$product->name}}
							</div>
							<div class="col-md-6">
								<strong>תמונת ראשית</strong><br>
									<img src="{{asset('product/'.$product->image)}}" width="100px" height="100px">
							</div>
							
							@if($product->images != null)
							<div class="col-md-12"><br>
								<strong>Images</strong><br>
							@foreach(json_decode($product->images) as $all)
							
								
									<img src="{{asset('product/'.$all)}}" width="100px" height="100px">
							
							@endforeach
							</div>
							@endif

							<div class="col-md-6"><br>
								<strong>מחיר רגיל</strong>
								<div>
									{{$product->price ?? ''}}
									
								</div>
							</div>
							
							<div class="col-md-6"><br>
								<strong>(אופציונלי) מחיר מבצע</strong>
								<div>
									{{$product->discount_price}}
									
								</div>
							</div>

							<div class="col-md-6"><br>
								<strong>Select Sub-Category</strong>
								<select name="sub_category_id" class="form-control" >
										<option value="{{$product->sub_category_id}}" disabled selected>{{$product->subcategory->name}}</option>
								</select>
							</div>

							<div class="col-md-6"><br>
								<strong for="product_category">Select Multiple Cities</strong>
								<select name="city_id[]" class="select2-multiple_ form-control" multiple="multiple" id="select2MultipleE">
									@if(count($product_cities) > 0)
									@foreach($product_cities as $city)
										<option value="{{$city->city_id}}" disabled selected>{{$city->city->name}}</option>
									@endforeach
									@endif
								</select>
							</div><br>

							<div class="col-md-6"><br>
								<strong>תיאור המוצר</strong><br>
								{!! $product->description !!}
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
<script>
$(document).ready(function() {
	$('#select2MultipleE').select2({
		placeholder: "בחר תת-קטגוריה",
		allowClear: true
	});
  });
</script>
@endsection