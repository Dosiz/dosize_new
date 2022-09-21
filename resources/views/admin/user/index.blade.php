@extends('layout.admin')
@section('title')
Users 
@endsection
@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
<style>
	.w-5{
		width: 30px !important;
		transform: rotate(180deg);
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
								<h3 class="page-title">User</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
									<li class="breadcrumb-item active">User</li>
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
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											@if(count($users) > 0)
												<tr>
													@foreach($users as $user)
													<td>
														{{ $user->name}}
													</td>
													<td>
														{{ $user->email}}
													</td>
													<td> 
														<form action="{{ route('update-user-status', $user->id) }}" method="POST">
															@csrf()                         
															<button type="submit" class="confirm btn btn-sm bg-success-light btn-active-color-primary btn-sm" name="status" value="1">Update to Brand</button>
														</form> 
													</td>
												</tr>
												 @endforeach
												@else
												<tr>
						                        <td colspan="3" style="text-align: center;"><strong> No User Added Yet </strong></td>
						                      </tr>
						                      @endif
										</tbody>
									</table>
										 
									{{-- {!! $brands->links() !!} --}}
									{!! $users->appends(Request::all())->links() !!}
									{{-- <div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Name</th>
													<th>Email</th>
													<th>Actions</th>
												</tr>
											</thead>
											<tbody>
												@if(count($users) > 0)
												<tr>
													@foreach($users as $user)
													<td>
														{{ $user->name}}
													</td>
													<td>
														{{ $user->email}}
													</td>
													<td> 
														<form action="{{ route('update-user-status', $user->id) }}" method="POST">
															@csrf()                         
															<button type="submit" class="confirm btn btn-sm bg-success-light btn-active-color-primary btn-sm" name="status" value="1">Update to Brand</button>
														</form> 
													</td>
												</tr>
												 @endforeach
												@else
												<tr>
						                        <td colspan="3" style="text-align: center;"><strong> No User Added Yet </strong></td>
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