@extends('layout.admin')
@section('title')
Product Comments
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
					<h3 class="page-title">Product Comments</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
						<li class="breadcrumb-item active">Product Comments</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table class="datatable table table-hover table-center mb-0">
								<thead>
									<tr>
										<th> Name</th>
										<th>Comment</th>
										<th>Product Name</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									@if(count($product_comments) > 0)
									<tr>
										@foreach($product_comments as $comment)
										<td>
											{{ $comment->name ?? $comment->user->name}}
										</td>
										<td>
											{{ $comment->comment}}
										</td>
										<td>
											{{ $comment->product->title ?? ''}}
										</td>
										<td>
											@if($comment->status == 1)
												active
											@else
												InActive
											@endif
										</td>
										
									</tr>
									 @endforeach
									@else
									<tr>
									<td colspan="3" style="text-align: center;"><strong> No Product Added Yet </strong></td>
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