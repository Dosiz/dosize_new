@extends('layout.admin')
@section('title')
Edit Category 
@endsection
@section('content')		
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">ערוך קטגוריה</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">ערוך קטגוריה</li>
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
											<form action="{{ route('category.update',$category->id) }}" enctype="multipart/form-data" method="post">
												@method('PUT')
                								@csrf
                								<input id="id" name="id" value="{{$category->id}}" type="hidden">
					                            
					                            <div class="form-group">
					                                <label>Name</label>
					                                <input class="form-control" id="name" name="name" value="{{$category->name}}" placeholder="Enter Category Name" type="text">
			                                        <div style="color:red;">{{$errors->first('name')}}</div> <br>
					                            </div>
					                            <div class="form-group">
					                                <label>Category Slug</label>
					                                <input class="form-control" id="category_slug" name="category_slug" value="{{$category->category_slug}}" placeholder="Enter Category Slug" type="text">
			                                        <div style="color:red;">{{$errors->first('category_slug')}}</div> <br>
					                            </div>
					                            <div class="m-t-20 text-center">
					                                <button class="btn btn-primary btn-lg">ערוך קטגוריה</button>
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