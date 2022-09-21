@extends('layout.admin')
@section('title')
ערוך קטגוריית משנה 
@endsection
@section('content')		
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">ערוך קטגוריית משנה </h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">ערוך קטגוריית משנה </li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">

									<!-- Add details -->
									<div class="row">
										<div class="col-12 blog-details">
											<form action="{{ route('sub-category.update',$sub_category->id) }}" enctype="multipart/form-data" method="post">
												@method('PUT')
                								@csrf
                								<input id="id" name="id" value="{{$sub_category->id}}" type="hidden">
					                            
					                            <div class="form-group">
					                                <label>Name</label>
					                                <input class="form-control" id="name" name="name" value="{{$sub_category->name}}" placeholder="Enter Sub-Category Name" type="text">
			                                        <div style="color:red;">{{$errors->first('name')}}</div> <br>
					                            </div>

												<div class="form-group">
					                                <label>Sub Category Slug</label>
					                                <input class="form-control" id="sub_category_slug" name="sub_category_slug" placeholder="Enter Sub Category Slug" value="{{$sub_category->sub_category_slug }}" type="text">
			                                        <div style="color:red;">{{$errors->first('sub_category_slug')}}</div> <br>
					                            </div>

												<div class="form-group">
					                                <label>Category</label>
					                                <select class="form-control" name="category_id" id="category_id">
														<option disable selected value="">Select Category</option>
														@if($categories)
														@foreach($categories as $category)
														<option value="{{$category->id}}" {{ $sub_category->category_id == $category->id ? 'selected' : '' }} > {{$category->name}}</option>
														@endforeach
														@endif
													</select>
			                                        <div style="color:red;">{{$errors->first('category_id')}}</div> <br>
					                            </div>

					                            <div class="m-t-20 text-center">
					                                <button class="btn btn-primary btn-lg">עדכון קטגוריית משנה</button>
					                            </div>
					                        </form>
										</div>
									</div>
									<!-- /Add details -->

								</div>
							</div>
						</div>			
					</div>
					
				</div>			
			</div>
			<!-- /Page Wrapper -->
@endsection