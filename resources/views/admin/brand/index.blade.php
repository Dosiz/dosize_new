@extends('layout.admin')
@section('title')
Brands 
@endsection
@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
<style>
	svg .w-5{
		width: 30px !important;
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
								<h3 class="page-title">Brand</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
									<li class="breadcrumb-item active">Brand</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>Name</th>
												<th>Email</th>
												<th>Description</th>
												<th>Category</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											@if(count($brands) > 0)
												<tr>
													@foreach($brands as $brand)
													<td>
														{{ $brand->name}}
													</td>
													<td>
														{{ $brand->email}}
													</td>
													<td> 
														@php
														  $brand_profile = App\Models\BrandProfile::with('category')->where('user_id', $brand->id)->first();	
														@endphp
														@if($brand_profile)
														{{ \Illuminate\Support\Str::limit($brand_profile->description ?? '',60,'...')}}
														@else
														<p> Brand Not Created yet </p>
														@endif
													</td>
													<td> 
														@if($brand_profile)
															{{ $brand_profile->category->name}}
														@else
														<p> Brand Not Created yet </p>
														@endif
													</td>
													<td>
														@php
														  $brand_profile = App\Models\BrandProfile::where('user_id', $brand->id)->first();	
														@endphp
														@if($brand_profile)
														@if($brand_profile->status == 1) 
														<form action="{{ route('update-brand', $brand_profile->id) }}" method="POST">
															@csrf()                         
															<button type="submit" class="btn btn-success" name="status" value="0">Active</button>
														</form>                    
														@else
															<form action="{{ route('update-brand', $brand_profile->id) }}" method="POST">
																@csrf()                             
																<button type="submit" class="btn btn-danger" name="status" value="1">Inactive</button>
															</form>
														@endif
														@else
														<p> Brand Not Created yet </p>
														@endif
					
					
													</td>
													<td class="d-flex">  
														<form class="ml-1" action="{{ route('update-brand-status', $brand->id) }}" method="POST">
															@csrf()                         
															<button type="submit" class="confirm btn btn-sm bg-danger-light btn-active-color-primary btn-sm" name="status" value="0">Down To User</button>
														</form> 
														@php
														  $brand_profile = App\Models\BrandProfile::where('user_id', $brand->id)->first();	
														@endphp
														@if($brand_profile)
														<a href="{{route('admin.view-brand',$brand_profile->id)}}" style="height: 33px; margin-left: 10px" class="btn btn-sm bg-success-light edit-sub-category"><i class="fe fe-pencil"></i> Edit</a>
														@else
														<p> Brand Created yet </p>
														@endif
													</td>
												</tr>
												 @endforeach
												@else
												<tr>
						                        <td colspan="3" style="text-align: center;"><strong> No Brand Added Yet </strong></td>
						                      </tr>
						                      @endif
										</tbody>
									</table>
										 
									{{-- {!! $brands->links() !!} --}}
									{!! $brands->appends(['sort' => 'votes'])->links() !!}
									{{-- <div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Name</th>
													<th>Email</th>
													<th>Description</th>
													<th>Category</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												@if(count($brands) > 0)
												<tr>
													@foreach($brands as $brand)
													<td>
														{{ $brand->name}}
													</td>
													<td>
														{{ $brand->email}}
													</td>
													<td> 
														@php
														  $brand_profile = App\Models\BrandProfile::with('category')->where('user_id', $brand->id)->first();	
														@endphp
														@if($brand_profile)
														{{ \Illuminate\Support\Str::limit($brand_profile->description ?? '',60,'...')}}
														@else
														<p> Brand Not Created yet </p>
														@endif
													</td>
													<td> 
														@if($brand_profile)
															{{ $brand_profile->category->name}}
														@else
														<p> Brand Not Created yet </p>
														@endif
													</td>
													<td>
														@php
														  $brand_profile = App\Models\BrandProfile::where('user_id', $brand->id)->first();	
														@endphp
														@if($brand_profile)
														@if($brand_profile->status == 1) 
														<form action="{{ route('update-brand', $brand_profile->id) }}" method="POST">
															@csrf()                         
															<button type="submit" class="btn btn-success" name="status" value="0">Active</button>
														</form>                    
														@else
															<form action="{{ route('update-brand', $brand_profile->id) }}" method="POST">
																@csrf()                             
																<button type="submit" class="btn btn-danger" name="status" value="1">Inactive</button>
															</form>
														@endif
														@else
														<p> Brand Not Created yet </p>
														@endif
					
					
													</td>
													<td class="d-flex">  
														<form class="ml-1" action="{{ route('update-brand-status', $brand->id) }}" method="POST">
															@csrf()                         
															<button type="submit" class="confirm btn btn-sm bg-danger-light btn-active-color-primary btn-sm" name="status" value="0">Down To User</button>
														</form> 
														@php
														  $brand_profile = App\Models\BrandProfile::where('user_id', $brand->id)->first();	
														@endphp
														@if($brand_profile)
														<a href="{{route('admin.view-brand',$brand_profile->id)}}" style="height: 33px; margin-left: 10px" class="btn btn-sm bg-success-light edit-sub-category"><i class="fe fe-pencil"></i> Edit</a>
														@else
														<p> Brand Created yet </p>
														@endif
													</td>
												</tr>
												 @endforeach
												@else
												<tr>
						                        <td colspan="3" style="text-align: center;"><strong> No Brand Added Yet </strong></td>
						                      </tr>
						                      @endif
						                    <tbody>
						                      
						                     
										</table>
									</div> --}}
								</div>
							</div>
						</div>			
					</div>
					
				</div>			
			</div>
			<!-- /Page Wrapper -->
@endsection
@section('js')
@endsection