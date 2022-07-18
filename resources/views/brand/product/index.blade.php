@extends('layout.admin')
@section('title')
Products
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
					<h3 class="page-title">Products</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
						<li class="breadcrumb-item active">Products</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">
						<a href="{{route('product.create')}}" class="btn btn-primary">Add New <i class="fa fa-plus"></i></a><br><br>
						<div class="table-responsive">
							<table class="datatable table table-hover table-center mb-0">
								<thead>
									<tr>
										<th>Product Name</th>
										<th>Price</th>
										<th>Discount Price</th>
										<th>Image</th>
										<th>Category</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@if(count($products) > 0)
									<tr>
										@foreach($products as $product)
										<td>
											{{ $product->name}}
										</td>
										<td>
											{{ $product->price}}
										</td>
										<td>
											{{ $product->discount_price ?? ''}}
										</td>
										<td>
											<img src="{{asset('product/'.$product->image)}}" width="100px" height="100px">
										</td>
										<td>
											{{ $product->category->name}}
										</td>
										<td>
											@if($product->status == 1)
												active
											@else
												InActive
											@endif
										</td>
										
										<td class="d-flex">  
											<a href="{{route('product.show',$product->id)}}" target="_blank" style="height: 33px; margin-left: 10px" class="btn btn-sm bg-primary-light edit-product"><i class="fe fe-eye"></i> צפייה בפרטי המוצר</a>
											<a href="{{route('product.edit',$product->id)}}" style="height: 33px; margin-left: 10px" class="btn btn-sm bg-success-light edit-sub-category"><i class="fe fe-pencil"></i> Edit</a>
											<form method="POST" action="{{ route('product.destroy', $product->id) }}"  id="form_{{$product->id}}" >
												@method('Delete')
												@csrf()

												<button type="submit" id="{{$product->id}}" class="confirm btn btn-sm bg-danger-light btn-active-color-primary btn-sm">
													<!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
												 <i class="fe fe-trash"></i> Delete
													<!--end::Svg Icon-->
												</button>
											</form>
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