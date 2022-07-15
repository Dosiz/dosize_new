@extends('layout.mainlayout_admin')
@section('title')
Blog Detail 
@endsection
@section('content')	
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Blog</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index_admin">Dashboard</a></li>
									<li class="breadcrumb-item active">Blog</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="profile-header">
								<div class="card">
									<div class="card-body">
										
										<div class="table-responsive">
											<table class="table table-hover table-center mb-0">
												<thead>
													<tr>
														<th>Blog Name</th>
														<th>Blog Title</th>
														<th>Blog Sub Title</th>
														<th>Blog Category</th>
														<th>Blog Product Category</th>
														<th>Blog Description</th>
														<th>Blog Status</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>{{$blog->name}}</td>
														<td>{{$blog->title}}</td>
														<td>{{$blog->sub_title}}</td>
														<td>{{$blog->category->name}}</td>
														<td>{{$blog->product_category->category_name}}</td>
														<td>{!! $blog->description !!}</td>
														<td>{{$blog->status}}</td>
													</tr>
							                    <tbody>
											</table>
										</div>
									</div>
								</div>
							</div>	
							<div class="tab-content profile-tab-cont">
								
								<!-- Personal Details Tab -->
								<div class="tab-pane fade show active" id="per_details_tab">
								
									<!-- Personal Details -->
									<div class="row">
										<div class="col-lg-12">
											<div class="card">
												<div class="card-body">
													<h5 class="card-title d-flex justify-content-between">
														<span>Feature Image</span> 
													</h5>
													<div class="row">
														<img src="{{asset($blog->image)}}" width="100px" height="100px"><br>
													</div>
													<div class="table-responsive">
														<table class="table table-hover table-center">
															<thead>
																<tr>
																	<th>Blog Images</th>
																</tr>
															</thead>
															<tbody>
																
																<tr>
																	@foreach($blog->images as $all)
																	
																	<td><img src="{{asset($all)}}" width="200px" height="200px"></td>
																</tr>
																@endforeach
										                    <tbody>
										                </table>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- /Personal Details -->

								</div>
								<!-- /Personal Details Tab -->
								
								
								
							</div>
						</div>
					</div>
				
				</div>			
			</div>
			<!-- /Page Wrapper -->
            <!-- Edit Details Modal -->
		</div>
		<!-- /Edit Details Modal -->	
@endsection