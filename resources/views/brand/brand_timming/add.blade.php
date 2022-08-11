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
								<h3 class="page-title">ניהול שעות פעילות  </h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{route('dashboard')}}">שעות פעילות  </a></li>
									<li class="breadcrumb-item active">ניהול שעות פעילות  </li>
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
											<form action="{{ route('brand_timming.store') }}" enctype="multipart/form-data" method="post">
                								@csrf

						                        <h2>ראשון</h2>
						                        <div class="row">
						                            <div class="col-6">
						                                <label>שעת פתיחה בוקר </label>
						                                <input class="form-control " type="time" name="sun_mor_open" id="sun_mor_open" value="{{old('sun_mor_open')}}" placeholder="הכנס שעת פתיחה">
						                                <div style="color:red;">{{$errors->first('sat_mor_open')}}</div> <br>
						                            </div>
						                            <div class="col-6">
						                                <label>שעת סגירה בוקר (אופציונלי)</label>
						                                <input class="form-control " type="time" name="sun_mor_close" id="sun_mor_close" value="{{old('sun_mor_close')}}" placeholder="הכנס שעת סגירה">
						                            </div>
							                        <div class="col-6">
						                                <label>שעת פתיחה אחה''צ (אופציונלי) </label>
						                                <input class="form-control" type="time" name="sun_noon_open" id="sun_noon_open" value="{{old('sun_noon_open')}}" placeholder="שעת פתיחה אחה''צ">
						                            </div>
						                            <div class="col-6">
						                                <label>שעת סגירה ערב  </label>
						                                <input class="form-control" type="time" name="sun_noon_close" id="sun_noon_close" value="{{old('sun_noon_close')}}" placeholder="שעת סגירה אחה''צ">
						                                <div style="color:red;">{{$errors->first('sat_noon_close')}}</div> <br>
						                            </div>
						                        </div>
                								<h2>שני</h2>
                								<div class="row">
                									
						                            <div class="col-6">
						                                <label> שעת פתיחה בוקר </label>
						                                <input class="form-control " type="time" name="mon_mor_open" id="mon_mor_open" value="{{old('mon_mor_open')}}" placeholder="שעת פתיחה">
						                                <input type="hidden" name="id" id="id" value="{{$brand_profile->id}}">
						                                <div style="color:red;">{{$errors->first('mon_mor_open')}}</div> <br>
						                            </div>
						                            <div class="col-6">
						                                <label> שעת סגירה בוקר (אופציונלי) </label>
						                                <input class="form-control " type="time" name="mon_mor_close" id="mon_mor_close" value="{{old('mon_mor_close')}}" placeholder="שעת סגירה">
						                            </div>
						                        </div>
						                        <div class="row">
							                        <div class="col-6">
						                                <label>שעת פתיחה אחה''צ (אופציונלי)</label>
						                                <input class="form-control" type="time" name="mon_noon_open" id="mon_noon_open" value="{{old('mon_noon_open')}}" placeholder="שעת פתיחה אחה''צ">
						                            </div>
						                            <div class="col-6">
						                                <label>שעת סגירה ערב</label>
						                                <input class="form-control" type="time" name="mon_noon_close" id="mon_noon_close" value="{{old('mon_noon_close')}}" placeholder="שעת סגירה אחה''צ">
						                                <div style="color:red;">{{$errors->first('mon_noon_close')}}</div> <br>
						                            </div>
						                        </div>
						                        <h2>שלישי</h2>
						                        <div class="row">
						                            <div class="col-6">
						                                <label>שעת פתיחה בוקר </label>
						                                <input class="form-control " type="time" name="tue_mor_open" id="tue_mor_open" value="{{old('tue_mor_open')}}" placeholder="שעת פתיחה">
						                                <div style="color:red;">{{$errors->first('tue_mor_open')}}</div> <br>
						                            </div>
						                            <div class="col-6">
						                                <label>שעת סגירה בוקר (אופציונלי) </label>
						                                <input class="form-control " type="time" name="tue_mor_close" id="tue_mor_close" value="{{old('tue_mor_close')}}" placeholder="שעת סגירה">
						                            </div>
							                        <div class="col-6">
						                                <label> שעת פתיחה אחה''צ (אופציונלי) </label>
						                                <input class="form-control" type="time" name="tue_noon_open" id="tue_noon_open" value="{{old('tue_noon_open')}}" placeholder="שעת פתיחה אחה''צ">
						                            </div>
						                            <div class="col-6">
						                                <label> שעת סגירה ערב </label>
						                                <input class="form-control" type="time" name="tue_noon_close" id="tue_noon_close" value="{{old('tue_noon_close')}}" placeholder="שעת סגירה אחה''צ">
						                                <div style="color:red;">{{$errors->first('tue_noon_close')}}</div> <br>
						                            </div>
						                        </div>
						                        <h2>רביעי</h2>
						                        <div class="row">
						                            <div class="col-6">
						                                <label>שעת פתיחה בוקר  </label>
						                                <input class="form-control " type="time" name="wed_mor_open" id="wed_mor_open" value="{{old('wed_mor_open')}}" placeholder="שעת פתיחה">
						                                <div style="color:red;">{{$errors->first('wed_mor_open')}}</div> <br>
						                            </div>
						                            <div class="col-6">
						                                <label>שעת סגירה בוקר (אופציונלי) </label>
						                                <input class="form-control " type="time" name="wed_mor_close" id="wed_mor_close" value="{{old('wed_mor_close')}}" placeholder="שעת סגירה">
						                            </div>
							                        <div class="col-6">
						                                <label> שעת פתיחה אחה''צ (אופציונלי) </label>
						                                <input class="form-control" type="time" name="wed_noon_open" id="wed_noon_open" value="{{old('wed_noon_open')}}" placeholder="שעת פתיחה אחה''צ">
						                            </div>
						                            <div class="col-6">
						                                <label> שעת סגירה ערב </label>
						                                <input class="form-control" type="time" name="wed_noon_close" id="wed_noon_close" value="{{old('wed_noon_close')}}" placeholder="שעת סגירה אחה''צ">
						                                <div style="color:red;">{{$errors->first('wed_noon_close')}}</div> <br>
						                            </div>
						                        </div>
						                        <h2>חמישי</h2>
						                        <div class="row">
						                            <div class="col-6">
						                                <label>שעת פתיחה בוקר </label>
						                                <input class="form-control " type="time" name="thu_mor_open" id="thu_mor_open" value="{{old('thu_mor_open')}}" placeholder="שעת פתיחה">
						                                <div style="color:red;">{{$errors->first('thu_mor_open')}}</div> <br>
						                            </div>
						                            <div class="col-6">
						                                <label>שעת סגירה בוקר (אופציונלי) </label>
						                                <input class="form-control " type="time" name="thu_mor_close" id="thu_mor_close" value="{{old('thu_mor_close')}}" placeholder="שעת סגירה">
						                            </div>
							                        <div class="col-6">
						                                <label> שעת פתיחה אחה''צ (אופציונלי) </label>
						                                <input class="form-control" type="time" name="thu_noon_open" id="thu_noon_open" value="{{old('thu_noon_open')}}" placeholder="שעת פתיחה אחה''צ">
						                            </div>
						                            <div class="col-6">
						                                <label> שעת סגירה ערב </label>
						                                <input class="form-control" type="time" name="thu_noon_close" id="thu_noon_close" value="{{old('thu_noon_close')}}" placeholder="שעת סגירה אחה''צ">
						                                <div style="color:red;">{{$errors->first('thu_noon_close')}}</div> <br>
						                            </div>
						                        </div>
						                        <h2>שישי</h2>
						                        <div class="row">
						                            <div class="col-6">
						                                <label>שעת פתיחה בוקר </label>
						                                <input class="form-control" type="time" name="friday_open" id="friday_open" value="{{old('friday_open')}}" placeholder="שעת פתיחה שישי">
						                                <div style="color:red;">{{$errors->first('friday_open')}}</div> <br>
						                            </div>
						                            <div class="col-6">
						                                <label>שעת סגירה בוקר </label>
						                                <input class="form-control" type="time" name="friday_close" id="friday_close" value="{{old('friday_close')}}" placeholder="שעת סגירה ערב שבת">
						                                <div style="color:red;">{{$errors->first('friday_close')}}</div> <br>
						                            </div>
						                        </div>
					                            <div class="m-t-20 text-center">
					                                <button class="btn btn-primary btn-lg">הוסף שעות פעילות</button>
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