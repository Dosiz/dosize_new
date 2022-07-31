@extends('layout.admin')
@section('title')
Subscribers
@endsection
@push('styles')

@endpush
@section('content')		
<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">Subscriber</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
						<li class="breadcrumb-item active">Subscriber</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">
						{{-- <a href="{{route('blog.create')}}" class="btn btn-primary">Add New <i class="fa fa-plus"></i></a><br><br> --}}
						<div class="table-responsive">
							<table class="datatable table table-hover table-center mb-0">
								<thead>
									<tr>
										<th>#</th>
										<th>Emails</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@if(count($subscribers) > 0)
									<tr>
										@foreach($subscribers as $key=>$subscriber)
										<td>
											{{ $key+1}}
										</td>
                                        <td>
											{{ $subscriber->email}}
										</td>
										
										<td class="d-flex">  
											
										</td>
									</tr>
									 @endforeach
									@else
									<tr>
									<td colspan="3" style="text-align: center;"><strong> No Subscriber Added Yet </strong></td>
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
@endsection