@extends('layout.admin')
@section('title')
Edit City 
@endsection
@section('content')		
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Edit City</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Edit City</li>
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
											<form action="{{ route('city.update',$city->id) }}" enctype="multipart/form-data" method="post">
												@method('PUT')
                								@csrf
                								<input id="id" name="id" value="{{$city->id}}" type="hidden">
					                            
					                            <div class="form-group">
					                                <label>City Name</label>
					                                <input class="form-control" id="name" name="name" value="{{$city->name}}" placeholder="Enter City Name" type="text">
			                                        <div style="color:red;">{{$errors->first('name')}}</div> <br>
					                            </div>
					                            <div class="form-group">
					                                <label>City Image</label>
					                                <div>
					                                    <input class="form-control" type="file" name="image" id="image">
					                                    <div style="color:red;">{{$errors->first('image')}}</div> <br>
					                                    
					                                </div>
					                            </div>
					                            <div class="m-t-20 text-center">
					                                <button class="btn btn-primary btn-lg">Update City</button>
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