@extends('layout.admin')
@section('title')
Blogs
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
					<h3 class="page-title">Blogs</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
						<li class="breadcrumb-item active">Blogs</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">
						<a href="{{route('blog.create')}}" class="btn btn-primary">Add New <i class="fa fa-plus"></i></a><br><br>
						<div class="table-responsive">
							<table class="datatable table table-hover table-center mb-0">
								<thead>
									<tr>
										<th>Title</th>
										<th>Sub Title</th>
										<th>Image</th>
										<th>Description</th>
										<th>Category</th>
										<th>Sub-Category</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@if(count($blogs) > 0)
									<tr>
										@foreach($blogs as $blog)
										<td>
											{{ $blog->title}}
										</td>
										<td>
											{{ $blog->sub_title}}
										</td>
										<td>
											{{ $blog->image}}
										</td>
										<td>
											{{ $blog->description}}
										</td>
										<td>
											{{ $blog->category_id}}
										</td>
										<td>
											{{ $blog->sub_category_id}}
										</td>
										<td>
											{{ $blog->status}}
										</td>
										
										<td class="d-flex">  
											
											<a href="{{route('blog.show',$blog->id)}}" style="height: 33px; margin-left: 10px" class="btn btn-sm bg-success-light edit-sub-category"><i class="fe fe-pencil"></i> Edit</a>
											
										</td>
									</tr>
									 @endforeach
									@else
									<tr>
									<td colspan="3" style="text-align: center;"><strong> No Blog Added Yet </strong></td>
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