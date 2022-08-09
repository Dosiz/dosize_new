@extends('layout.admin')
@section('title')
Product Comments
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
											{{ $comment->product->name ?? ''}}
										</td>
										<td>
											@if($comment->status == 1) 
											<form action="{{ route('update-product-comment', $comment->id) }}" method="POST">
												@csrf()                         
												<button type="submit" class="btn btn-success" name="status" value="0">Inactive</button>
											</form>                    
											@else
												<form action="{{ route('update-product-comment', $comment->id) }}" method="POST">
													@csrf()                             
													<button type="submit" class="btn btn-danger" name="status" value="1">Active</button>
												</form>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@endsection