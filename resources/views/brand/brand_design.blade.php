@extends('layout.admin')
@section('title')
Profile Designing
@endsection
@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<style>
    .select2-container .select2-selection--single .select2-selection__rendered
    {
        padding-left:24px !important;
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
								<h3 class="page-title">Profile Designing</h3>
								{{-- <ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Add City</li>
								</ul> --}}
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
											<form action="{{ route('store-design') }}" enctype="multipart/form-data" method="post" id="main-form">
                								@csrf

                                                @php
                                                    $availFonts = [
                                                        "Calibri Light (Headings)",
                                                        "Calibri (Body)",
                                                        "Algerian",
                                                        "Gill Sans Ultra Bold",
                                                        "Times New Roman",
                                                        "Gill Sans MT Condensed",
                                                        "Arial",
                                                        "Bahnschrift",
                                                        "Blackadder ITC",
                                                        "Bernard MT Condensed",
                                                        "Castellar",
                                                        "Bradley Hand ITC",
                                                        "Curlz MT",
                                                        "Forte",
                                                        "Bradley Hand ITC",
                                                        "Bahnschrift SemiLight Condensed",
                                                        "Bodoni MT Black",
                                                        "Copperplate Gothic Light",
                                                    ];
                                                    $items = [
                                                        (object) [
                                                            'label' => "ראש האתר",
                                                            'font_key' => "header_font",
                                                            'color_key' => "header_color",
                                                        ],
                                                        (object) [
                                                            'label' => "תחתית האתר",
                                                            'font_key' => "footer_font",
                                                            'color_key' => "footer_color",
                                                        ],
                                                        (object) [
                                                            'label' => "כפתורים באתר",
                                                            'font_key' => "button_font",
                                                            'color_key' => "button_color",
                                                        ],
                                                        (object) [
                                                            'label' => "כותרות באתר",
                                                            'font_key' => "title_font",
                                                            'color_key' => "title_color",
                                                        ],
                                                        (object) [
                                                            'label' => "טקסטים רגילים",
                                                            'font_key' => "text_font",
                                                            'color_key' => "text_color",
                                                        ],
                                                    ];
                                                @endphp
                                                {{ json_encode($brand_profile->font)}}
                                                @foreach ($items as $item)
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>פונט {{$item->label}}</label>
                                                            <select class="select select2-hidden-accessible form-control" tabindex="-1" aria-hidden="true" name="{{$item->font_key}}" id="{{$item->font_key}}">
                                                                <option selected disabled>Select Font Family</option>
                                                                @foreach ($availFonts as $font)
                                                                    <option value="{{$font}}" {{ ($brand_profile->font != null && json_decode($brand_profile->font)->{$item->font_key} == $font) ? 'selected' : '' }}>{{$font}}</option>
                                                                @endforeach
                                                            </select>
                                                            <div style="color:red;">{{$errors->first($item -> font_key)}}</div> <br>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>צבע {{$item -> label}}</label>
                                                            <input class="form-control" type="color" name="{{ $item->color_key }}" value="{{ $brand_profile->color != null ? json_decode($brand_profile->color)->{$item->color_key} : old($item->color_key) }}" id="{{$item->color_key}}">
                                                            <div style="color:red;">{{$errors->first($item->color_key)}}</div> <br>
                                                        </div>
                                                    </div>
                                                @endforeach

					                            <div class="m-t-20 text-center">
					                                <button type="submit" class="btn btn-primary btn-lg">Edit Profile Design</button>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
    </script>
@endsection
