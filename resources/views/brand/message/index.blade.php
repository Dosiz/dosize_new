@extends('layout.admin')
@section('title')
Chat
@endsection
@push('styles')

@endpush
@section('content')		
<!-- Page Wrapper -->
<div class="page-wrapper">
	@livewire('chat.chat',['receiver'=>$id])		
</div>
<!-- /Page Wrapper -->
		
@endsection

@section('js')
@endsection