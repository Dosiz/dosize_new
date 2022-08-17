@extends('layout.admin')
@section('title')
Opening and Closing Timming
@endsection
@push('styles')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  
@endpush
@section('content')		
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Add Brand Timming</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Add Brand Timming</li>
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
											<form action="{{ route('brand_timming.update',$brand_timming) }}" enctype="multipart/form-data" method="post">
												@method('PUT')
                								@csrf
                								<h2>Sunday</h2>
						                        <div class="row">
						                            <div class="col-6">
						                                <label>Sunday Morning Opening Time</label>
						                                <input class="form-control " type="time" name="sun_mor_open" id="sun_mor_open" value="{{$brand_timming->sat_thu_mor_open['sun_mor_open']}}" placeholder="Enter Opening Time">
						                                <div style="color:red;">{{$errors->first('sat_mor_open')}}</div> <br>
						                            </div>
						                            <div class="col-6">
						                                <label>Sunday Morning Closing Time</label>
						                                <input class="form-control " type="time" name="sun_mor_close" id="sun_mor_close" value="{{$brand_timming->sat_thu_mor_close['sun_mor_close']}}" placeholder="Enter Closing Time">
						                            </div>
							                        <div class="col-6">
						                                <label>Sunday After Noon Opening Time</label>
						                                <input class="form-control" type="time" name="sun_noon_open" id="sun_noon_open" value="{{$brand_timming->sat_thu_noon_open['sun_noon_open']}}" placeholder="Enter After Noon Opening Time">
						                            </div>
						                            <div class="col-6">
						                                <label>Sunday After Noon Closing Time</label>
						                                <input class="form-control" type="time" name="sun_noon_close" id="sun_noon_close" value="{{$brand_timming->sat_thu_noon_close['sun_noon_close']}}" placeholder="Enter After Noon Closing Time">
						                                <div style="color:red;">{{$errors->first('sat_noon_close')}}</div> <br>
						                            </div>
						                        </div>
                								<h2>Monday</h2>
                								<div class="row">
                									
						                            <div class="col-6">
						                                <label>Monday Morning Opening Time</label>
						                                <input class="form-control " type="time" name="mon_mor_open" id="mon_mor_open" value="{{$brand_timming->sat_thu_mor_open['mon_mor_open']}}" placeholder="Enter Opening Time">
						                                <input type="hidden" name="id" id="id" value="{{$brand_profile->id}}">
						                                <div style="color:red;">{{$errors->first('mon_mor_open')}}</div> <br>
						                            </div>
						                            <div class="col-6">
						                                <label>Monday Morning Closing Time</label>
						                                <input class="form-control " type="time" name="mon_mor_close" id="mon_mor_close" value="{{$brand_timming->sat_thu_mor_close['mon_mor_close']}}" placeholder="Enter Closing Time">
						                            </div>
						                        </div>
						                        <div class="row">
							                        <div class="col-6">
						                                <label>Monday After Noon Opening Time</label>
						                                <input class="form-control" type="time" name="mon_noon_open" id="mon_noon_open" value="{{$brand_timming->sat_thu_noon_open['mon_noon_open']}}" placeholder="Enter After Noon Opening Time">
						                            </div>
						                            <div class="col-6">
						                                <label>Monday After Noon Closing Time</label>
						                                <input class="form-control" type="time" name="mon_noon_close" id="mon_noon_close" value="{{$brand_timming->sat_thu_noon_close['mon_noon_close']}}" placeholder="Enter After Noon Closing Time">
						                                <div style="color:red;">{{$errors->first('mon_noon_close')}}</div> <br>
						                            </div>
						                        </div>
						                        <h2>Tuesday</h2>
						                        <div class="row">
						                            <div class="col-6">
						                                <label>Tuesday Morning Opening Time</label>
						                                <input class="form-control " type="time" name="tue_mor_open" id="tue_mor_open" value="{{$brand_timming->sat_thu_mor_open['tue_mor_open']}}" placeholder="Enter Opening Time">
						                                <div style="color:red;">{{$errors->first('tue_mor_open')}}</div> <br>
						                            </div>
						                            <div class="col-6">
						                                <label>Tuesday Morning Closing Time</label>
						                                <input class="form-control " type="time" name="tue_mor_close" id="tue_mor_close" value="{{$brand_timming->sat_thu_mor_close['tue_mor_close']}}" placeholder="Enter Closing Time">
						                            </div>
							                        <div class="col-6">
						                                <label>Tuesday After Noon Opening Time</label>
						                                <input class="form-control" type="time" name="tue_noon_open" id="tue_noon_open" value="{{$brand_timming->sat_thu_noon_open['tue_noon_open']}}" placeholder="Enter After Noon Opening Time">
						                            </div>
						                            <div class="col-6">
						                                <label>Tuesday After Noon Closing Time</label>
						                                <input class="form-control" type="time" name="tue_noon_close" id="tue_noon_close" value="{{$brand_timming->sat_thu_noon_close['tue_noon_close']}}" placeholder="Enter After Noon Closing Time">
						                                <div style="color:red;">{{$errors->first('tue_noon_close')}}</div> <br>
						                            </div>
						                        </div>
						                        <h2>Wednesday</h2>
						                        <div class="row">
						                            <div class="col-6">
						                                <label>Wednesday Morning Opening Time</label>
						                                <input class="form-control " type="time" name="wed_mor_open" id="wed_mor_open" value="{{$brand_timming->sat_thu_mor_open['wed_mor_open']}}" placeholder="Enter Opening Time">
						                                <div style="color:red;">{{$errors->first('wed_mor_open')}}</div> <br>
						                            </div>
						                            <div class="col-6">
						                                <label>Wednesday Morning Closing Time</label>
						                                <input class="form-control " type="time" name="wed_mor_close" id="wed_mor_close" value="{{$brand_timming->sat_thu_mor_close['wed_mor_close']}}" placeholder="Enter Closing Time">
						                            </div>
							                        <div class="col-6">
						                                <label>Wednesday After Noon Opening Time</label>
						                                <input class="form-control" type="time" name="wed_noon_open" id="wed_noon_open" value="{{$brand_timming->sat_thu_noon_open['wed_noon_open']}}" placeholder="Enter After Noon Opening Time">
						                            </div>
						                            <div class="col-6">
						                                <label>Wednesday After Noon Closing Time</label>
						                                <input class="form-control" type="time" name="wed_noon_close" id="wed_noon_close" value="{{$brand_timming->sat_thu_noon_close['wed_noon_close']}}" placeholder="Enter After Noon Closing Time">
						                                <div style="color:red;">{{$errors->first('wed_noon_close')}}</div> <br>
						                            </div>
						                        </div>
						                        <h2>Thursday</h2>
						                        <div class="row">
						                            <div class="col-6">
						                                <label>Thursday Morning Opening Time</label>
						                                <input class="form-control " type="time" name="thu_mor_open" id="thu_mor_open" value="{{$brand_timming->sat_thu_mor_open['thu_mor_open']}}" placeholder="Enter Opening Time">
						                                <div style="color:red;">{{$errors->first('thu_mor_open')}}</div> <br>
						                            </div>
						                            <div class="col-6">
						                                <label>Thursday Morning Closing Time</label>
						                                <input class="form-control " type="time" name="thu_mor_close" id="thu_mor_close" value="{{$brand_timming->sat_thu_mor_close['thu_mor_close']}}" placeholder="Enter Closing Time">
						                            </div>
							                        <div class="col-6">
						                                <label>Thursday After Noon Opening Time</label>
						                                <input class="form-control" type="time" name="thu_noon_open" id="thu_noon_open" value="{{$brand_timming->sat_thu_noon_open['thu_noon_open']}}" placeholder="Enter After Noon Opening Time">
						                            </div>
						                            <div class="col-6">
						                                <label>Thursday After Noon Closing Time</label>
						                                <input class="form-control" type="time" name="thu_noon_close" id="thu_noon_close" value="{{$brand_timming->sat_thu_noon_close['thu_noon_close']}}" placeholder="Enter After Noon Closing Time">
						                                <div style="color:red;">{{$errors->first('thu_noon_close')}}</div> <br>
						                            </div>
						                        </div>
                								<h2>Friday</h2>
            									<div class="row">
						                            <div class="col-6">
						                                <label>Friday Morning Opening Time</label>
						                                <input class="form-control" type="time" name="friday_open" id="friday_open" value="{{$brand_timming->friday_open}}" placeholder="Enter Friday Morning Opening Time">
						                                <div style="color:red;">{{$errors->first('friday_open')}}</div> <br>
						                            </div>
						                            <div class="col-6">
						                                <label>Friday Morning Closing Time</label>
						                                <input class="form-control" type="time" name="friday_close" id="friday_close" value="{{$brand_timming->friday_close}}" placeholder="Enter Friday Morning Closing Time">
						                                <div style="color:red;">{{$errors->first('friday_close')}}</div> <br>
						                            </div>
						                        </div>
					                            <div class="m-t-20 text-center">
					                                <button class="btn btn-primary btn-lg">Publish Brand Timming</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@endsection