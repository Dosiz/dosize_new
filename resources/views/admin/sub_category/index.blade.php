@extends('layout.admin')
@section('title')
קטגוריות משנה 
@endsection
@section('content')		
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Ciקטגוריית משנהty</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
									<li class="breadcrumb-item active">קטגוריית משנה</li>
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
									<a href="{{route('sub-category.create')}}" class="btn btn-primary">Add New <i class="fa fa-plus"></i></a><br><br>
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
													<th>Sub Category Slug</th>
													<th>Category</th>
													<th class="text-right">Action</th>
												</tr>
											</thead>
											<tbody>
												@if(count($sub_categories) > 0)
												<tr>
													@foreach($sub_categories as $sub_category)
													<td>
														{{ $sub_category->name}}
													</td>
													<td>
														{{ $sub_category->sub_category_slug}}
													</td>
													<td>
														{{ $sub_category->category->name}}
													</td>

													<td class="text-right">
														<div class="actions" style="display:flex;">
															<a href="{{route('sub-category.edit',$sub_category->id)}}" style="height: 33px; margin-left: 10px" class="btn btn-sm bg-success-light edit-sub-category"><i class="fe fe-pencil"></i> Edit</a>
															<form method="POST" action="{{ route('sub-category.destroy', $sub_category->id) }}"  id="form_{{$sub_category->id}}" >
							                                    @method('Delete')
							                                    @csrf()

							                                    <button type="submit" id="{{$sub_category->id}}" class="confirm btn btn-sm bg-danger-light btn-active-color-primary btn-sm">
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
						                        <td colspan="3" style="text-align: center;"><strong> No Sub Category Added Yet </strong></td>
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