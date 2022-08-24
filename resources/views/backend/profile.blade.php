@extends('layout.admin')
@section('title')
Profile
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
								<h3 class="page-title">Profile</h3>
								{{-- <ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Add City</li>
								</ul> --}}
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
											<form action="{{ route('profile.store') }}" enctype="multipart/form-data" method="post">
                								@csrf
					                            
					                            <div class="form-group">
					                                <label>Brand Name</label>
					                                <input class="form-control" id="brand_name" name="brand_name" placeholder="Enter Brand Name" value="{{$brand_profile->brand_name}}" type="text">
			                                        <div style="color:red;">{{$errors->first('brand_name')}}</div> <br>
					                            </div>
												<div class="form-group">
					                                <label>Email</label>
					                                <input class="form-control" readonly value="{{ $user->email }}" type="text"><br>
					                            </div>
												@if($brand_profile->allow_city == '1')
												<div class="form-group">
					                                <label>You have following cities:</label>
					                                <select class="form-control">
														@if(count($brand_cities) > 0)
														@foreach($brand_cities as $brand_city)
														<option disabled value="{{$brand_city->id}}"> {{$brand_city->city->name}} </option>
														@endforeach
														@endif
													</select>
													<div style="color:red;">{{$errors->first('city_id')}}</div> <br>
														
					                            </div>
												@endif
					                            <div class="form-group">
					                                <label>Brand Image</label>
					                                <div>
					                                    <input class="form-control" type="file" name="brand_image" id="brand_image" value="{{$brand_profile->brand_image}}"><br>
														<img src="{{asset('brand_image/'.$brand_profile->brand_image)}}" width="100px" height="100px">
					                                    <div style="color:red;">{{$errors->first('image')}}</div> <br>
					                                    
					                                </div>
					                            </div>
												<div class="form-group">
					                                <label>Brand Logo</label>
					                                <div>
					                                    <input class="form-control" type="file" name="brand_logo" id="brand_logo"><br>
														<img src="{{asset('brand_logo/'.$brand_profile->brand_logo)}}" width="100px" height="100px">
					                                    <div style="color:red;">{{$errors->first('image')}}</div> <br>
					                                    
					                                </div>
					                            </div>
												<div class="form-group">
					                                <label>Whatsapp Number</label>
					                                <input class="form-control" type="text" name="whatsapp_no" value="{{ $brand_profile->whatsapp_no ?? '' }}" id="whatsapp_no">
			                                        <div style="color:red;">{{$errors->first('whatsapp_no')}}</div> <br>
					                            </div>
												<div class="form-group">
					                                <label>Website Url</label>
					                                <input class="form-control" type="url" name="website_url" value="{{$brand_profile->website_url ?? ''}}" id="website_url">
			                                        <div style="color:red;">{{$errors->first('website_url')}}</div> <br>
					                            </div>
												<div class="form-group">
					                                <label>Description</label>
					                                <textarea class="form-control @error('description') is-invalid @enderror" placeholder=" הזן תיאור " id="description" name="description" rows="4" cols="50" >{{ $brand_profile->description ?? ''}}</textarea>
			                                        <div style="color:red;">{{$errors->first('description')}}</div> <br>
					                            </div>

												<table class="table table-bordered" id="dynamicTable">  
													<tr>
														<th>כתובת</th>
														<th>Select City</th>
													</tr>
													@if($addresses)
													@foreach($addresses as $key =>$address)  
													<tr>
														
														<td>
															<div class="inputIcon">
																
																<textarea class="form-control @error('address') is-invalid @enderror" placeholder="הכנס כתובת" id="address" name="addmore[{{$key}}][address]" rows="4" cols="50" >{{$address->address ?? ''}} </textarea>

																
																<div style="color:red;">{{$errors->first('addmore[0][address]')}}</div> <br>
															</div>
														</td> 
														<td>
															@if($brand_profile->allow_city == '1')
															<div class="form-group">
																<select name="addmore[{{$key}}][city_id]" class="form-control">
																	@if(count($brand_cities) > 0)
																	@foreach($brand_cities as $b_city)
																	
																		<option value="{{$b_city->city_id}}" {{ $address->city_id == $b_city->city_id ? 'selected' : '' }}> {{$b_city->city->name}} </option>
																	
																	@endforeach
																	@else
																	<option value="{{$user->city_id}}" {{ $address->city_id == $user->city_id ? 'selected' : '' }}> {{$user->city->name}} </option>
																	@endif
																</select>
																<div style="color:red;">{{$errors->first('addmore[0][city_id]')}}</div> <br>
																	
															</div>
															@else
															<div class="form-group">
																<select name="addmore[{{$key}}][city_id]" class="form-control">
																	<option value="{{$user->city_id}}" {{ $address->city_id == $user->city_id ? 'selected' : '' }}> {{$user->city->name}} </option>
																	
																</select>
																<div style="color:red;">{{$errors->first('addmore[0][city_id]')}}</div> <br>
																	
															</div>
															@endif
														</td>
														@if(($loop->first))
														<td><button type="button" name="add" id="add" class="btn btn-success add_remove">Add More</button></td> 
														@else
														<td>
															<button type="button" class="btn btn-danger remove-tr add_remove">Remove</button>
														</td>
														@endif 
													</tr>
													@endforeach
													@else
													<tr>
														
														<td>
															<div class="inputIcon">
																
																<textarea class="form-control @error('address') is-invalid @enderror" placeholder="הכנס כתובת" id="address" name="addmore[0][address]" rows="4" cols="50" >{{$address->address ?? ''}} </textarea>
																
																<div style="color:red;">{{$errors->first('addmore[0][address]')}}</div> <br>
															</div>
														</td> 
														<td>
															<div class="form-group">
																<select name="addmore[0][city_id]" class="form-control">
																	@foreach($cities as $city)
																	
																		<option value="{{$city->id}}"> {{$city->name}} </option>
																	
																	@endforeach
																</select>
																<div style="color:red;">{{$errors->first('addmore[0][city_id]')}}</div> <br>
																	
															</div>
														</td>
														<td><button type="button" name="add" id="add" class="btn btn-success add_remove">Add More</button></td> 
													</tr>
													@endif   
												</table> 
 

					                            <div class="m-t-20 text-center">
					                                <button class="btn btn-primary btn-lg">Edit Profile</button>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        var i = '{{count($addresses) - 1 ??  '0'}}';
       
       $("#add").click(function(){
       
           ++i;
       
           $("#dynamicTable").append(`<tr><td><textarea type="text" name="addmore['+i+'][address]" placeholder="הכנס כתובת" rows="4" cols="50" class="form-control" ></textarea></td><td><div class="form-group"> <select name="addmore['+i+'][city_id]" class="form-control"> @foreach($brand_cities as $b_city) <option value="{{$b_city->city_id ?? $b_city->city_id}}" {{ $address->city_id == $b_city->city_id ? 'selected' : '' }}> {{$b_city->city->name}} </option> @endforeach </select></div></td><td><button type="button" class="btn btn-danger remove-tr add_remove">Remove</button></td></tr>`);
       });
       
       $(document).on('click', '.remove-tr', function(){  
           $(this).parents('tr').remove();
       }); 

	   $(document).ready(function() {
            // Select2 Multiple
            $('#select2MultipleE').select2({
                placeholder: "Select Cities",
                allowClear: true
            });

        });
    </script>
@endsection