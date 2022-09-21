@extends('layout.admin')
@section('title')
Subscribers
@endsection
@push('styles')
	<style>
		body{
			direction:ltr !important;
		}
	</style>
@endpush
@section('content')		
<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">Subscriber</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
						<li class="breadcrumb-item active">Subscriber</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">
						{{-- @if(count($subscribers) > 0)
							<a href="" data-toggle="modal" data-target="#sendMessageModal" style="padding: 5px !important;" class="btn btn-warning"> שלח הודעת שידור <i class="fa fa-send"></i></a><br><br>
							
						@endif --}}
						<div class="table-responsive">
							<table class="datatable table table-hover table-center mb-0">
								<thead>
									<tr>
										<th>#</th>
										<th>Emails</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@if(count($subscribers) > 0)
									<tr>
										@foreach($subscribers as $key=>$subscriber)
										<td>
											{{ $key+1}}
										</td>
                                        <td>
											{{ $subscriber->email}}
										</td>
										
										<td class="d-flex">  
											
										</td>
									</tr>
									 @endforeach
									@else
									<tr>
									<td colspan="3" style="text-align: center;"><strong> No Subscriber Added Yet </strong></td>
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

<!-- Select Type user Modal -->
<div class="modal fade" id="sendMessageModal" aria-hidden="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered mx-auto" role="document" >
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-content p-2">
					<div class="modal-header border-0">
						<h4 class="modal-title"> שלח הודעות </h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="card">
						<div class="card-body">
							<form id="update_category" method="post" autocomplete="off" action="{{route('send-message-to-subscriber')}}" novalidate="novalidate" class="bv-form"><button type="submit" class="bv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>
							@method('POST')
							@csrf
								<div class="form-group">
									<label>טקסט</label>
									<textarea cols="30" rows="6" class="form-control summernote" name="message" id="message" ></textarea>
									<div style="color:red;">{{$errors->first('text')}}</div> <br>
								</div>
								<div class="mt-4">
									<button class="btn btn-primary" name="form_submit" value="submit" type="submit">שלח הודעה</button>
									<button type="button" class="btn btn-danger" data-dismiss="modal"> לְבַטֵל </button>
								</div>
							</form>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Select Type user Modal -->
		
@endsection

@section('js')
@endsection