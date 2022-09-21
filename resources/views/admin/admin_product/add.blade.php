@extends('layout.admin')
@section('title')
Add Product 
@endsection
@push('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endpush
@section('content')		
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Add Producy</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Add Producy</li>
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
											<form action="{{ route('admin_product.store') }}" enctype="multipart/form-data" method="post">
                								@csrf
					                            
					                            <div class="form-group">
					                                <label>Name</label>
					                                <input class="form-control" id="name" name="name" placeholder="Enter Product Name" value="{{old('name')}}" type="text">
			                                        <div style="color:red;">{{$errors->first('name')}}</div> <br>
					                            </div>
					                            <div class="form-group">
					                                <label>Image</label>
					                                <div>
					                                    <input class="form-control" type="file" name="image" id="image">
					                                    <div style="color:red;">{{$errors->first('image')}}</div> <br>
					                                    
					                                </div>
					                            </div>
												<div class="form-group">
					                                <label>Price</label>
					                                <input class="form-control" id="price" name="price" placeholder="Enter Product Price" value="{{old('price')}}" type="number">
			                                        <div style="color:red;">{{$errors->first('price')}}</div> <br>
					                            </div>
												<div class="form-group">
					                                <label>Description</label>
					                                <textarea cols="30" rows="6" class="form-control summernote" name="description" placeholder="Enter Description" id="description" value="{{old('description')}}"></textarea>
			                                        <div style="color:red;">{{$errors->first('description')}}</div> <br>
					                            </div>
					                            <div class="m-t-20 text-center">
					                                <button class="btn btn-primary btn-lg">Add Product</button>
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
@section('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
$(document).ready(function() {

    $('.summernote').summernote({
     });

  });
</script>
@endsection