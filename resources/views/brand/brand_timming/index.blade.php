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
									<li class="breadcrumb-item"><a href="index">שעות פעילות </a></li>
									<li class="breadcrumb-item active">ניהול שעות פעילות</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									@if(count($brand_timming) <= 0)
									<a href="{{route('brand_timming.create')}}" class="btn btn-primary">עידכון שעות פעילות <i class="fa fa-plus"></i></a><br><br>
									@endif
									@if(session()->has('message'))
					                	<div class="alert alert-success">
					                  		{{session('message')}}
					                  	</div><br><br>
					              	@endif
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
												    <th>ראשון</th>
													<th>שני</th>
													<th>שלישי</th>
													<th>רביעי</th>
													<th>חמישי</th>
													<th>שישי</th>
													<th class="text-right">פעולה</th>
												</tr>
											</thead>
											<tbody>
												@if(count($brand_timming) > 0)
												<tr>

													@foreach($brand_timming as $time)
													<td>
														<p>Open : {{ $time->sat_thu_mor_open['mon_mor_open']}}</p>
														@if(isset($time->sat_thu_mor_close['mon_mor_close']))
															<p>Close :{{ $time->sat_thu_mor_close['mon_mor_close']  ?? ''}}</p>
														@endif
														@if(isset($time->sat_thu_noon_open['mon_noon_open']))
															<p>Open :{{ $time->sat_thu_noon_open['mon_noon_open']  ?? ''}}</p>
														@endif
														<p>Close : {{ $time->sat_thu_noon_close['mon_noon_close']}}</p>
													</td>
													<td>
														<p>Open : {{ $time->sat_thu_mor_open['tue_mor_open']}}</p>
														@if(isset($time->sat_thu_mor_close['tue_mor_close']))
															<p>Close :{{ $time->sat_thu_mor_close['tue_mor_close']  ?? ''}}</p>
														@endif
														@if(isset($time->sat_thu_noon_open['tue_noon_open']))
															<p>Open :{{ $time->sat_thu_noon_open['tue_noon_open']  ?? ''}}</p>
														@endif
														<p>Close : {{ $time->sat_thu_noon_close['tue_noon_close']}}</p>
													</td>
													<td>
														<p>Open : {{ $time->sat_thu_mor_open['wed_mor_open']}}</p>
														@if(isset($time->sat_thu_mor_close['wed_mor_close']))
															<p>Close :{{ $time->sat_thu_mor_close['wed_mor_close'] ?? ''}}</p>
														@endif
														@if(isset($time->sat_thu_noon_open['wed_noon_open']))
															<p>Open :{{ $time->sat_thu_noon_open['wed_noon_open'] ?? ''}}</p>
														@endif
														<p>Close : {{ $time->sat_thu_noon_close['wed_noon_close']}}</p>
													</td>
													<td>
														<p>Open : {{ $time->sat_thu_mor_open['thu_mor_open']}}</p>
														@if(isset($time->sat_thu_mor_close['thu_mor_close']))
															<p>Close :{{ $time->sat_thu_mor_close['thu_mor_close'] ?? ''}}</p>
														@endif
														@if(isset($time->sat_thu_noon_open['thu_noon_open']))
															<p>Open :{{ $time->sat_thu_noon_open['thu_noon_open'] ?? ''}}</p>
														@endif
														<p>Close : {{ $time->sat_thu_noon_close['thu_noon_close']}}</p>
													</td>
													<td>
														<p>Open : {{ $time->sat_thu_mor_open['sun_mor_open']}}</p>
														@if(isset($time->sat_thu_mor_close['sun_mor_close']))
															<p>Close :{{ $time->sat_thu_mor_close['sun_mor_close'] ?? ''}}</p>
														@endif
														@if(isset($time->sat_thu_noon_open['sun_noon_open']))
															<p>Open :{{ $time->sat_thu_noon_open['sun_noon_open'] ?? ''}}</p>
														@endif
														<p>Close : {{ $time->sat_thu_noon_close['sun_noon_close']}}</p>
													</td>
													<td>
														<p>Open : {{ $time->friday_open}}</p>
														<p>Close : {{ $time->friday_close}}</p>
													</td>

													<td class="text-right">
														<div class="actions" style="display:flex;">
															
															
															<a href="{{route('brand_timming.edit',$time->id)}}" style="height: 33px; margin-left: 10px" class="btn btn-sm bg-success-light edit-product"><i class="fe fe-pencil"></i> ערוך</a>
															
														</div>
													</td>
												</tr>
												 @endforeach
												@else
												<tr>
						                        <td colspan="6" style="text-align: center;"><strong> No Timming Created Yet </strong></td>
						                      </tr>
						                      @endif
						                    <tbody>
						                </table>
									</div>
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
	<script type="text/javascript">
		
	</script>
@endsection