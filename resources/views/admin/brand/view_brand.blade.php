@extends('layout.admin')
@section('title')
Brand Profile 
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
								<h3 class="page-title"> Brand Profile</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
									<li class="breadcrumb-item active"> Brand Profile </li>
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
											<strong>Brand Name</strong>
											<p>
												{{$brand_profile->brand_name}}
											</p>
										</div>
										<div class="col-md-6">
											<strong>Brand Category</strong>
											<p>
												{{$brand_profile->category->name}}
											</p>
										</div>
										<div class="col-md-6">
											<strong>Brand Sub Category</strong>
											@foreach($sub_categories as $sub_category)
											<p>
												{{$sub_category->subcategory->name}}
											</p>
											@endforeach
										</div>
										<div class="col-md-6">
											<strong>Brand Category</strong>
											<p>
												{{$brand_profile->description}}
											</p>
										</div><br>
										<div class="col-md-6">
											<strong>Brand Image</strong><br>
											<img src="{{asset('brand_image/'.$brand_profile->brand_image)}}" width="100px" height="100px">
										</div>
										<div class="col-md-6">
											<strong>Brand Logo</strong><br>
											<img src="{{asset('brand_logo/'.$brand_profile->brand_logo)}}" width="100px" height="100px">
										</div>
										<div class="col-md-12">
											<br><strong>Brand Status</strong>
											<p>
												@if($brand_profile->status == '1')
												Active
												@else
												Inactive
												@endif
											</p>
										</div>
										@foreach($addresses as $address)
										<div class="col-md-6">
											<strong>Brand Address</strong>
											<p>
												<strong>City:</strong>{{$address->city->name}}
											</p>
											<p>
												<strong>Address : </strong>{{$address->address}}
											</p>
											
										</div>
										@endforeach
										
										{{-- <div class="col-md-8 text-center">
											<strong>Allow Multiple City</strong>
											@if($brand_profile->allow_city == 1) 
											<form action="{{ route('update-brand-city', $brand_profile->id) }}" method="POST">
												@csrf()                         
												<button type="submit" class="btn btn-success" name="allow_city" value="0">Active</button>
											</form>                    
											@else
												<form action="{{ route('update-brand-city', $brand_profile->id) }}" method="POST">
													@csrf()                             
													<button type="submit" class="btn btn-danger" name="status" value="1">Inactive</button>
												</form>
											@endif
										</div> --}}
										<div class="col-md-12">
											<strong>Add Cities</strong>
											<form action="{{ route('add-city-brand', $brand_profile->id) }}" method="POST">
												@csrf()   
												<div class="inputIcon">
													<select name="city_id[]" class="select2-multiple_ form-control" multiple="multiple" id="select2MultipleE">
														@if(count($cities) > 0)
														@foreach($cities as $city)
															<option value="{{$city->id}}" @foreach($brand_cities as $brand_city) {{ $brand_city->city_id == $city->id ? 'selected' : '' }} @endforeach>{{$city->name}}</option>
														@endforeach
														@endif
													</select>
													<div style="color:red;">{{$errors->first('category_id')}}</div> <br>
												</div>                      
												<button type="submit" class="btn btn-success">Add Cities</button>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
         
        $(document).ready(function() {
            // Select2 Multiple
            $('#select2MultipleE').select2({
                placeholder: "בחר תת-קטגוריה",
                allowClear: true
            });


        });
    </script>
@endsection