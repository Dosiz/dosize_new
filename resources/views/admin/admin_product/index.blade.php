@extends('layout.admin')
@section('title')
Products 
@endsection
@section('content')		
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Product</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
									<li class="breadcrumb-item active">Product</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									@if(Auth::user()->hasRole('Admin'))
									<a href="{{route('admin_product.create')}}" class="btn btn-primary">Add New <i class="fa fa-plus"></i></a><br><br>
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
													<th>Name</th>
													<th>Image</th>
													<th>Price</th>
													<th>Description</th>
													<th class="text-right">Action</th>
												</tr>
											</thead>
											<tbody>
												@if(count($admin_products) > 0)
												<tr>
													@foreach($admin_products as $admin_product)
													<td>
														{{ $admin_product->name}}
													</td>
													<td> 
														<img src="{{asset('admin_product/'.$admin_product->image)}}" width="100px" height="100px">
													</td>
													<td>
														{{ $admin_product->price}}
													</td>
													<td>
														{!! $admin_product->description !!}
													</td>

													<td class="text-right">
														<div class="actions" style="display:flex;">
															<a href="{{route('admin_product.edit',$admin_product->id)}}" style="height: 33px; margin-left: 10px" class="btn btn-sm bg-success-light edit-product"><i class="fe fe-pencil"></i> Edit</a>
															<form method="POST" action="{{ route('admin_product.destroy', $admin_product->id) }}"  id="form_{{$admin_product->id}}" >
							                                    @method('Delete')
							                                    @csrf()

							                                    <button type="submit" id="{{$admin_product->id}}" class="confirm btn btn-sm bg-danger-light btn-active-color-primary btn-sm">
							                                        <!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
							                                     <i class="fe fe-trash"></i> Delete
							                                        <!--end::Svg Icon-->
							                                    </button>
							                                </form>
															
														</div>
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