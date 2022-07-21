@extends('layout.admin')
@section('title')
הודעת מותג
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
					<h3 class="page-title">הודעת מותג</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
						<li class="breadcrumb-item active">הודעת מותג</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">
						@if(! $brand_message)
						<a href="{{route('brand-message.create')}}" class="btn btn-primary">Add New <i class="fa fa-plus"></i></a><br><br>
						@endif
						<div class="table-responsive">
							<table class="datatable table table-hover table-center mb-0">
								<thead>
									<tr>
										<th>Message</th>
										<th>End Date</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@if($brand_message)
									<tr>
										<td>
											{{\Illuminate\Support\Str::limit($brand_message->message,40,'...')}} 
										</td>
										<td>
											{{ \Carbon\Carbon::parse($brand_message->end_date)->format('m/d/Y')}}
										</td>
										
										<td class="d-flex">  
											<a href="{{route('brand-message.edit',$brand_message->id)}}" style="height: 33px; margin-left: 10px" class="btn btn-sm bg-success-light edit-sub-category"><i class="fe fe-pencil"></i> Edit</a>
											
										</td>
									</tr>
									@else
									<tr>
									<td colspan="3" style="text-align: center;"><strong> No Brand Message Added Yet </strong></td>
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