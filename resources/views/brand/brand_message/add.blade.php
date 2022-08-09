@extends('layout.admin')
@section('title')
הוסף הודעת מותג
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
								<h3 class="page-title"> הוסף הודעת מותג</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{route('dashboard')}}">דשבורד</a></li>
									<li class="breadcrumb-item active"> הוסף הודעת מותג</li>
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
											<form action="{{ route('brand-message.store') }}" enctype="multipart/form-data" method="post">
                								@csrf
												<input type="hidden" name="profile_id" value="{{ $brand_profile->id }}" />
					                            <div class="form-group">
					                                <label> Message</label>
					                                <textarea cols="30" rows="6" class="form-control" name="message" placeholder="Enter Message" id="message" value="{{old('message')}}"></textarea>
					                                <div style="color:red;">{{$errors->first('message')}}</div> <br>
					                            </div>

												<div class="form-group">
					                                <label> End Date</label>
					                                <input type="date" class="form-control" id="end_date" name="end_date" value="{{old('end_date')}}">
			                                        <div style="color:red;">{{$errors->first('end_date')}}</div> <br>
					                            </div>
					                            
												<div class="form-group">
													<label for="product_category">Select Multiple Cities</label>
													<select name="city_id[]" class="select2-multiple_ form-control" multiple="multiple" id="select2MultipleE">
														@if(count($brand_cities) > 0)
														@foreach($brand_cities as $city)
															<option value="{{$city->city_id}}" >{{$city->city->name}}</option>
														@endforeach
														@endif
													</select>
													<input type="checkbox" class="multi_city_checkbox"> Select All
													<div style="color:red;">{{$errors->first('city_id')}}</div> <br>
												</div>

					                                <button class="btn btn-primary btn-lg">Save</button>
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