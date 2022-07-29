@extends('layout.admin')
@section('title')
Blogs
@endsection
@push('styles')

@endpush
@section('content')		
<!-- Page Wrapper -->
<div class="page-wrapper">
	@livewire('test',['receiver'=>$id])		
</div>
<!-- /Page Wrapper -->
		
@endsection

@section('js')
@endsection