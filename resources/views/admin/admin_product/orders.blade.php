@extends('layout.admin')
@section('title')
Product Orders
@endsection
@section('content')		
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Product Orders</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
									<li class="breadcrumb-item active">Product Orders</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									@if(session()->has('message'))
					                	<div class="alert alert-success">
					                  		{{session('message')}}
					                  	</div><br><br>
					              	@endif
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Product Name</th>
													<th>User Name</th>
													<th>User Email</th>
													<th>Order Date</th>
													<th>Coins</th>
												</tr>
											</thead>
											<tbody>
												@if(count($admin_product_orders) > 0)
												<tr>
													@foreach($admin_product_orders as $admin_product_order)
													<td>
														{{ $admin_product_order->product->name}}
													</td>
													<td> 
														{{ $admin_product_order->user->name}}
													</td>
													<td>
														{{ $admin_product_order->user->email}}
													</td>
													<td>
														{{ date('Y/m/d', strtotime($admin_product_order->created_at))}}
													</td>
													<td>
														{{ $admin_product_order->coins}}
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