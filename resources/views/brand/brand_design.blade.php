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
											<form action="{{ route('store-design') }}" enctype="multipart/form-data" method="post">
                								@csrf
					                            
					                            
                                                @if($brand_profile->font != null)
                                                <div class="row">
                                                    <div class="col-md-6"> 
                                                        <label>בחר פונט לראש האתר</label>
                                                        <select class="select select2-hidden-accessible form-control" tabindex="-1" aria-hidden="true" name="header_font" id="header_font">
                                                            <option selected disabled>Select Font Family</option>
                                                            <option value="Calibri Light (Headings)" {{ json_decode($brand_profile->font)->header_font == 'Calibri Light (Headings)' ? 'selected' : '' }}>Calibri Light (Headings)</option>
                                                            <option value="Calibri (Body)" {{ json_decode($brand_profile->font)->header_font == 'Calibri (Body)' ? 'selected' : '' }}>Calibri (Body)</option>
                                                            <option value="Algerian" {{ json_decode($brand_profile->font)->header_font == 'Algerian' ? 'selected' : '' }}>Algerian</option>
                                                            <option value="Gill Sans Ultra Bold" {{ json_decode($brand_profile->font)->header_font == 'Gill Sans Ultra Bold' ? 'selected' : '' }}>Gill Sans Ultra Bold</option>
                                                            <option value="Times New Roman" {{ json_decode($brand_profile->font)->header_font == 'Times New Roman' ? 'selected' : '' }}>Times New Roman</option>
                                                            <option value="Gill Sans MT Condensed" {{ json_decode($brand_profile->font)->header_font == 'Gill Sans MT Condensed' ? 'selected' : '' }}>Gill Sans MT Condensed</option>
                                                            <option value="Arial" {{ json_decode($brand_profile->font)->header_font == 'Arial' ? 'selected' : '' }}>Arial</option>
                                                            <option value="Bahnschrift" {{ json_decode($brand_profile->font)->header_font == 'Bahnschrift' ? 'selected' : '' }}>Bahnschrift</option>
                                                            <option value="Blackadder ITC" {{ json_decode($brand_profile->font)->header_font == 'Blackadder ITC' ? 'selected' : '' }}>Blackadder ITC</option>
                                                            <option value="Bernard MT Condensed" {{ json_decode($brand_profile->font)->header_font == 'Bernard MT Condensed' ? 'selected' : '' }}>Bernard MT Condensed</option>
                                                            <option value="Castellar" {{ json_decode($brand_profile->font)->header_font == 'Castellar' ? 'selected' : '' }}>Castellar</option>
                                                            <option value="Bradley Hand ITC" {{ json_decode($brand_profile->font)->header_font == 'Bradley Hand ITC' ? 'selected' : '' }}>Bradley Hand ITC</option>
                                                            <option value="Curlz MT" {{ json_decode($brand_profile->font)->header_font == 'Curlz MT' ? 'selected' : '' }}>Curlz MT</option>
                                                            <option value="Forte" {{ json_decode($brand_profile->font)->header_font == 'Forte' ? 'selected' : '' }}>Forte</option>
                                                            <option value="Bradley Hand ITC" {{ json_decode($brand_profile->font)->header_font == 'Bradley Hand ITC' ? 'selected' : '' }}>Bradley Hand ITC</option>
                                                            <option value="Bahnschrift SemiLight Condensed" {{ json_decode($brand_profile->font)->header_font == 'Bahnschrift SemiLight Condensed' ? 'selected' : '' }}>Bahnschrift SemiLight Condensed</option>
                                                            <option value="Bodoni MT Black" {{ json_decode($brand_profile->font)->header_font == 'Bodoni MT Black' ? 'selected' : '' }}>Bodoni MT Black</option>
                                                            <option value="Copperplate Gothic Light" {{ json_decode($brand_profile->font)->header_font == 'Copperplate Gothic Light' ? 'selected' : '' }}>Copperplate Gothic Light</option>
                                                        </select>
                                                        <div style="color:red;">{{$errors->first('header_font')}}</div> <br>
                                                    </div>
                                                <div class="col-md-6">
                                                    <label>צבע תחתית האתר</label>
                                                    <input class="form-control" type="color" name="header_color" value="{{ json_decode($brand_profile->color)->header_color }}" id="header_color">
                                                    <div style="color:red;">{{$errors->first('footer_color')}}</div> <br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6"> 
                                                    <label>בחר פונט לתחתית האתר</label>
                                                    <select class="select select2-hidden-accessible form-control" tabindex="-1" aria-hidden="true" name="footer_font" id="footer_font">
                                                        <option selected disabled>Select Font Family</option>
                                                        <option value="Calibri Light (Headings)" {{ json_decode($brand_profile->font)->footer_font == 'Calibri Light (Headings)' ? 'selected' : '' }}>Calibri Light (Headings)</option>
                                                        <option value="Calibri (Body)" {{ json_decode($brand_profile->font)->footer_font == 'Calibri (Body)' ? 'selected' : '' }}>Calibri (Body)</option>
                                                        <option value="Algerian" {{ json_decode($brand_profile->font)->footer_font == 'Algerian' ? 'selected' : '' }}>Algerian</option>
                                                        <option value="Gill Sans Ultra Bold" {{ json_decode($brand_profile->font)->footer_font == 'Gill Sans Ultra Bold' ? 'selected' : '' }}>Gill Sans Ultra Bold</option>
                                                        <option value="Times New Roman" {{ json_decode($brand_profile->font)->footer_font == 'Times New Roman' ? 'selected' : '' }}>Times New Roman</option>
                                                        <option value="Gill Sans MT Condensed" {{ json_decode($brand_profile->font)->footer_font == 'Gill Sans MT Condensed' ? 'selected' : '' }}>Gill Sans MT Condensed</option>
                                                        <option value="Arial" {{ json_decode($brand_profile->font)->footer_font == 'Arial' ? 'selected' : '' }}>Arial</option>
                                                        <option value="Bahnschrift" {{ json_decode($brand_profile->font)->footer_font == 'Bahnschrift' ? 'selected' : '' }}>Bahnschrift</option>
                                                        <option value="Blackadder ITC" {{ json_decode($brand_profile->font)->footer_font == 'Blackadder ITC' ? 'selected' : '' }}>Blackadder ITC</option>
                                                        <option value="Bernard MT Condensed" {{ json_decode($brand_profile->font)->footer_font == 'Bernard MT Condensed' ? 'selected' : '' }}>Bernard MT Condensed</option>
                                                        <option value="Castellar" {{ json_decode($brand_profile->font)->footer_font == 'Castellar' ? 'selected' : '' }}>Castellar</option>
                                                        <option value="Bradley Hand ITC" {{ json_decode($brand_profile->font)->footer_font == 'Bradley Hand ITC' ? 'selected' : '' }}>Bradley Hand ITC</option>
                                                        <option value="Curlz MT" {{ json_decode($brand_profile->font)->footer_font == 'Curlz MT' ? 'selected' : '' }}>Curlz MT</option>
                                                        <option value="Forte" {{ json_decode($brand_profile->font)->footer_font == 'Forte' ? 'selected' : '' }}>Forte</option>
                                                        <option value="Bradley Hand ITC" {{ json_decode($brand_profile->font)->footer_font == 'Bradley Hand ITC' ? 'selected' : '' }}>Bradley Hand ITC</option>
                                                        <option value="Bahnschrift SemiLight Condensed" {{ json_decode($brand_profile->font)->footer_font == 'Bahnschrift SemiLight Condensed' ? 'selected' : '' }}>Bahnschrift SemiLight Condensed</option>
                                                        <option value="Bodoni MT Black" {{ json_decode($brand_profile->font)->footer_font == 'Bodoni MT Black' ? 'selected' : '' }}>Bodoni MT Black</option>
                                                        <option value="Copperplate Gothic Light" {{ json_decode($brand_profile->font)->footer_font == 'Copperplate Gothic Light' ? 'selected' : '' }}>Copperplate Gothic Light</option>
                                                    </select>
                                                    <div style="color:red;">{{$errors->first('footer_font')}}</div> <br>
                                                                 
                                                </div>
                                                <div class="col-md-6">
                                                    <label>בחר פונט לתחתית האתר</label>
                                                    <input class="form-control" type="color" name="footer_color" value="{{ json_decode($brand_profile->color)->footer_color }}" id="footer_color">
                                                    <div style="color:red;">{{$errors->first('footer_color')}}</div> <br>
                                                        
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6"> 
                                                    <label>בחר פונט לכפתורים באתר</label>
                                                    <select class="select select2-hidden-accessible form-control" tabindex="-1" aria-hidden="true" name="button_font" id="button_font">
                                                        <option selected disabled>Select Font Family</option>
                                                        <option value="Calibri Light (Headings)" {{ json_decode($brand_profile->font)->button_font == 'Calibri Light (Headings)' ? 'selected' : '' }}>Calibri Light (Headings)</option>
                                                        <option value="Calibri (Body)" {{ json_decode($brand_profile->font)->button_font == 'Calibri (Body)' ? 'selected' : '' }}>Calibri (Body)</option>
                                                        <option value="Algerian" {{ json_decode($brand_profile->font)->button_font == 'Algerian' ? 'selected' : '' }}>Algerian</option>
                                                        <option value="Gill Sans Ultra Bold" {{ json_decode($brand_profile->font)->button_font == 'Gill Sans Ultra Bold' ? 'selected' : '' }}>Gill Sans Ultra Bold</option>
                                                        <option value="Times New Roman" {{ json_decode($brand_profile->font)->button_font == 'Times New Roman' ? 'selected' : '' }}>Times New Roman</option>
                                                        <option value="Gill Sans MT Condensed" {{ json_decode($brand_profile->font)->button_font == 'Gill Sans MT Condensed' ? 'selected' : '' }}>Gill Sans MT Condensed</option>
                                                        <option value="Arial" {{ json_decode($brand_profile->font)->button_font == 'Arial' ? 'selected' : '' }}>Arial</option>
                                                        <option value="Bahnschrift" {{ json_decode($brand_profile->font)->button_font == 'Bahnschrift' ? 'selected' : '' }}>Bahnschrift</option>
                                                        <option value="Blackadder ITC" {{ json_decode($brand_profile->font)->button_font == 'Blackadder ITC' ? 'selected' : '' }}>Blackadder ITC</option>
                                                        <option value="Bernard MT Condensed" {{ json_decode($brand_profile->font)->button_font == 'Bernard MT Condensed' ? 'selected' : '' }}>Bernard MT Condensed</option>
                                                        <option value="Castellar" {{ json_decode($brand_profile->font)->button_font == 'Castellar' ? 'selected' : '' }}>Castellar</option>
                                                        <option value="Bradley Hand ITC" {{ json_decode($brand_profile->font)->button_font == 'Bradley Hand ITC' ? 'selected' : '' }}>Bradley Hand ITC</option>
                                                        <option value="Curlz MT" {{ json_decode($brand_profile->font)->button_font == 'Curlz MT' ? 'selected' : '' }}>Curlz MT</option>
                                                        <option value="Forte" {{ json_decode($brand_profile->font)->button_font == 'Forte' ? 'selected' : '' }}>Forte</option>
                                                        <option value="Bradley Hand ITC" {{ json_decode($brand_profile->font)->button_font == 'Bradley Hand ITC' ? 'selected' : '' }}>Bradley Hand ITC</option>
                                                        <option value="Bahnschrift SemiLight Condensed" {{ json_decode($brand_profile->font)->button_font == 'Bahnschrift SemiLight Condensed' ? 'selected' : '' }}>Bahnschrift SemiLight Condensed</option>
                                                        <option value="Bodoni MT Black" {{ json_decode($brand_profile->font)->button_font == 'Bodoni MT Black' ? 'selected' : '' }}>Bodoni MT Black</option>
                                                        <option value="Copperplate Gothic Light" {{ json_decode($brand_profile->font)->button_font == 'Copperplate Gothic Light' ? 'selected' : '' }}>Copperplate Gothic Light</option>
                                                    </select>
                                                    <div style="color:red;">{{$errors->first('button_font')}}</div> <br>
                                                                 
                                                </div>
                                                <div class="col-md-6">
                                                    <label>צבע הכפתורים באתר</label>
                                                    <input class="form-control" type="color" name="button_color" value="{{ json_decode($brand_profile->color)->button_color }}" id="button_color">
                                                    <div style="color:red;">{{$errors->first('button_color')}}</div> <br>
                                                    
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6"> 
                                                    <label>בחר פונט לכותרות באתר</label>
                                                    <select class="select select2-hidden-accessible form-control" tabindex="-1" aria-hidden="true" name="title_font" id="title_font">
                                                        <option selected disabled>Select Font Family</option>
                                                        <option value="Calibri Light (Headings)" {{ json_decode($brand_profile->font)->title_font == 'Calibri Light (Headings)' ? 'selected' : '' }}>Calibri Light (Headings)</option>
                                                        <option value="Calibri (Body)" {{ json_decode($brand_profile->font)->title_font == 'Calibri (Body)' ? 'selected' : '' }}>Calibri (Body)</option>
                                                        <option value="Algerian" {{ json_decode($brand_profile->font)->title_font == 'Algerian' ? 'selected' : '' }}>Algerian</option>
                                                        <option value="Gill Sans Ultra Bold" {{ json_decode($brand_profile->font)->title_font == 'Gill Sans Ultra Bold' ? 'selected' : '' }}>Gill Sans Ultra Bold</option>
                                                        <option value="Times New Roman" {{ json_decode($brand_profile->font)->title_font == 'Times New Roman' ? 'selected' : '' }}>Times New Roman</option>
                                                        <option value="Gill Sans MT Condensed" {{ json_decode($brand_profile->font)->title_font == 'Gill Sans MT Condensed' ? 'selected' : '' }}>Gill Sans MT Condensed</option>
                                                        <option value="Arial" {{ json_decode($brand_profile->font)->title_font == 'Arial' ? 'selected' : '' }}>Arial</option>
                                                        <option value="Bahnschrift" {{ json_decode($brand_profile->font)->title_font == 'Bahnschrift' ? 'selected' : '' }}>Bahnschrift</option>
                                                        <option value="Blackadder ITC" {{ json_decode($brand_profile->font)->title_font == 'Blackadder ITC' ? 'selected' : '' }}>Blackadder ITC</option>
                                                        <option value="Bernard MT Condensed" {{ json_decode($brand_profile->font)->title_font == 'Bernard MT Condensed' ? 'selected' : '' }}>Bernard MT Condensed</option>
                                                        <option value="Castellar" {{ json_decode($brand_profile->font)->title_font == 'Castellar' ? 'selected' : '' }}>Castellar</option>
                                                        <option value="Bradley Hand ITC" {{ json_decode($brand_profile->font)->title_font == 'Bradley Hand ITC' ? 'selected' : '' }}>Bradley Hand ITC</option>
                                                        <option value="Curlz MT" {{ json_decode($brand_profile->font)->title_font == 'Curlz MT' ? 'selected' : '' }}>Curlz MT</option>
                                                        <option value="Forte" {{ json_decode($brand_profile->font)->title_font == 'Forte' ? 'selected' : '' }}>Forte</option>
                                                        <option value="Bradley Hand ITC" {{ json_decode($brand_profile->font)->title_font == 'Bradley Hand ITC' ? 'selected' : '' }}>Bradley Hand ITC</option>
                                                        <option value="Bahnschrift SemiLight Condensed" {{ json_decode($brand_profile->font)->title_font == 'Bahnschrift SemiLight Condensed' ? 'selected' : '' }}>Bahnschrift SemiLight Condensed</option>
                                                        <option value="Bodoni MT Black" {{ json_decode($brand_profile->font)->title_font == 'Bodoni MT Black' ? 'selected' : '' }}>Bodoni MT Black</option>
                                                        <option value="Copperplate Gothic Light" {{ json_decode($brand_profile->font)->title_font == 'Copperplate Gothic Light' ? 'selected' : '' }}>Copperplate Gothic Light</option>
                                                    </select>
                                                    <div style="color:red;">{{$errors->first('title_font')}}</div> <br>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>צבע הכותרות באתר</label>
                                                    <input class="form-control" type="color" name="title_color" value="{{ json_decode($brand_profile->color)->title_color }}" id="title_color">
                                                    <div style="color:red;">{{$errors->first('title_color')}}</div> <br>
                                                    
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6"> 
                                                    <label>בחר פונט לטקסטים הרגילים באתר</label>
                                                    <select class="select select2-hidden-accessible form-control" tabindex="-1" aria-hidden="true" name="text_font" id="text_font">
                                                        <option selected disabled>Select Font Family</option>
                                                        <option value="Calibri Light (Headings)" {{ json_decode($brand_profile->font)->text_font == 'Calibri Light (Headings)' ? 'selected' : '' }}>Calibri Light (Headings)</option>
                                                        <option value="Calibri (Body)" {{ json_decode($brand_profile->font)->text_font == 'Calibri (Body)' ? 'selected' : '' }}>Calibri (Body)</option>
                                                        <option value="Algerian" {{ json_decode($brand_profile->font)->text_font == 'Algerian' ? 'selected' : '' }}>Algerian</option>
                                                        <option value="Gill Sans Ultra Bold" {{ json_decode($brand_profile->font)->text_font == 'Gill Sans Ultra Bold' ? 'selected' : '' }}>Gill Sans Ultra Bold</option>
                                                        <option value="Times New Roman" {{ json_decode($brand_profile->font)->text_font == 'Times New Roman' ? 'selected' : '' }}>Times New Roman</option>
                                                        <option value="Gill Sans MT Condensed" {{ json_decode($brand_profile->font)->text_font == 'Gill Sans MT Condensed' ? 'selected' : '' }}>Gill Sans MT Condensed</option>
                                                        <option value="Arial" {{ json_decode($brand_profile->font)->text_font == 'Arial' ? 'selected' : '' }}>Arial</option>
                                                        <option value="Bahnschrift" {{ json_decode($brand_profile->font)->text_font == 'Bahnschrift' ? 'selected' : '' }}>Bahnschrift</option>
                                                        <option value="Blackadder ITC" {{ json_decode($brand_profile->font)->text_font == 'Blackadder ITC' ? 'selected' : '' }}>Blackadder ITC</option>
                                                        <option value="Bernard MT Condensed" {{ json_decode($brand_profile->font)->text_font == 'Bernard MT Condensed' ? 'selected' : '' }}>Bernard MT Condensed</option>
                                                        <option value="Castellar" {{ json_decode($brand_profile->font)->text_font == 'Castellar' ? 'selected' : '' }}>Castellar</option>
                                                        <option value="Bradley Hand ITC" {{ json_decode($brand_profile->font)->text_font == 'Bradley Hand ITC' ? 'selected' : '' }}>Bradley Hand ITC</option>
                                                        <option value="Curlz MT" {{ json_decode($brand_profile->font)->text_font == 'Curlz MT' ? 'selected' : '' }}>Curlz MT</option>
                                                        <option value="Forte" {{ json_decode($brand_profile->font)->text_font == 'Forte' ? 'selected' : '' }}>Forte</option>
                                                        <option value="Bradley Hand ITC" {{ json_decode($brand_profile->font)->text_font == 'Bradley Hand ITC' ? 'selected' : '' }}>Bradley Hand ITC</option>
                                                        <option value="Bahnschrift SemiLight Condensed" {{ json_decode($brand_profile->font)->text_font == 'Bahnschrift SemiLight Condensed' ? 'selected' : '' }}>Bahnschrift SemiLight Condensed</option>
                                                        <option value="Bodoni MT Black" {{ json_decode($brand_profile->font)->text_font == 'Bodoni MT Black' ? 'selected' : '' }}>Bodoni MT Black</option>
                                                        <option value="Copperplate Gothic Light" {{ json_decode($brand_profile->font)->text_font == 'Copperplate Gothic Light' ? 'selected' : '' }}>Copperplate Gothic Light</option>
                                                    </select>
                                                    <div style="color:red;">{{$errors->first('text_font')}}</div> <br>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>צבע הטקסטים הרגילים באתר</label>
                                                    <input class="form-control" type="color" name="text_color" value="{{ json_decode($brand_profile->color)->text_color }}" id="text_color">
                                                    <div style="color:red;">{{$errors->first('text_color')}}</div> <br>
                                                    
                                                </div>
                                            </div>
                                            @else
                                            <div class="row">
                                                <div class="col-md-6"> 
                                                    <label>בחר פונט לראש האתר</label>
                                                    <select class="select select2-hidden-accessible form-control" tabindex="-1" aria-hidden="true" name="header_font" id="header_font">
                                                        <option selected disabled>Select Font Family</option>
                                                        <option value="Calibri Light (Headings)">Calibri Light (Headings)</option>
                                                        <option value="Calibri (Body)" >Calibri (Body)</option>
                                                        <option value="Algerian" >Algerian</option>
                                                        <option value="Gill Sans Ultra Bold" >Gill Sans Ultra Bold</option>
                                                        <option value="Times New Roman" >Times New Roman</option>
                                                        <option value="Gill Sans MT Condensed" >Gill Sans MT Condensed</option>
                                                        <option value="Arial" >Arial</option>
                                                        <option value="Bahnschrift" >Bahnschrift</option>
                                                        <option value="Blackadder ITC" >Blackadder ITC</option>
                                                        <option value="Bernard MT Condensed" >Bernard MT Condensed</option>
                                                        <option value="Castellar" >Castellar</option>
                                                        <option value="Bradley Hand ITC" >Bradley Hand ITC</option>
                                                        <option value="Curlz MT" >Curlz MT</option>
                                                        <option value="Forte" >Forte</option>
                                                        <option value="Bradley Hand ITC" >Bradley Hand ITC</option>
                                                        <option value="Bahnschrift SemiLight Condensed" >Bahnschrift SemiLight Condensed</option>
                                                        <option value="Bodoni MT Black" >Bodoni MT Black</option>
                                                        <option value="Copperplate Gothic Light">Copperplate Gothic Light</option>
                                                    </select>
                                                    <div style="color:red;">{{$errors->first('header_font')}}</div> <br>
                                                </div>
                                            <div class="col-md-6">
                                                <label>צבע תחתית האתר</label>
                                                <input class="form-control" type="color" name="header_color" value="{{ old('header_color') }}" id="header_color">
                                                <div style="color:red;">{{$errors->first('footer_color')}}</div> <br>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6"> 
                                                <label>בחר פונט לתחתית האתר</label>
                                                <select class="select select2-hidden-accessible form-control" tabindex="-1" aria-hidden="true" name="footer_font" id="footer_font">
                                                    <option selected disabled>Select Font Family</option>
                                                    <option value="Calibri Light (Headings)">Calibri Light (Headings)</option>
                                                    <option value="Calibri (Body)" >Calibri (Body)</option>
                                                    <option value="Algerian" >Algerian</option>
                                                    <option value="Gill Sans Ultra Bold" >Gill Sans Ultra Bold</option>
                                                    <option value="Times New Roman" >Times New Roman</option>
                                                    <option value="Gill Sans MT Condensed" >Gill Sans MT Condensed</option>
                                                    <option value="Arial" >Arial</option>
                                                    <option value="Bahnschrift" >Bahnschrift</option>
                                                    <option value="Blackadder ITC" >Blackadder ITC</option>
                                                    <option value="Bernard MT Condensed">Bernard MT Condensed</option>
                                                    <option value="Castellar" >Castellar</option>
                                                    <option value="Bradley Hand ITC" >Bradley Hand ITC</option>
                                                    <option value="Curlz MT" >Curlz MT</option>
                                                    <option value="Forte" >Forte</option>
                                                    <option value="Bradley Hand ITC" >Bradley Hand ITC</option>
                                                    <option value="Bahnschrift SemiLight Condensed" >Bahnschrift SemiLight Condensed</option>
                                                    <option value="Bodoni MT Black" >Bodoni MT Black</option>
                                                    <option value="Copperplate Gothic Light" >Copperplate Gothic Light</option>
                                                </select>
                                                <div style="color:red;">{{$errors->first('footer_font')}}</div> <br>
                                                             
                                            </div>
                                            <div class="col-md-6">
                                                <label>בחר פונט לתחתית האתר</label>
                                                <input class="form-control" type="color" name="footer_color" value="{{ old('footer_color') }}" id="footer_color">
                                                <div style="color:red;">{{$errors->first('footer_color')}}</div> <br>
                                                    
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6"> 
                                                <label>בחר פונט לכפתורים באתר</label>
                                                <select class="select select2-hidden-accessible form-control" tabindex="-1" aria-hidden="true" name="button_font" id="button_font">
                                                    <option selected disabled>Select Font Family</option>
                                                    <option value="Calibri Light (Headings)" >Calibri Light (Headings)</option>
                                                    <option value="Calibri (Body)" >Calibri (Body)</option>
                                                    <option value="Algerian" >Algerian</option>
                                                    <option value="Gill Sans Ultra Bold" >Gill Sans Ultra Bold</option>
                                                    <option value="Times New Roman" >Times New Roman</option>
                                                    <option value="Gill Sans MT Condensed" >Gill Sans MT Condensed</option>
                                                    <option value="Arial" >Arial</option>
                                                    <option value="Bahnschrift" >Bahnschrift</option>
                                                    <option value="Blackadder ITC" >Blackadder ITC</option>
                                                    <option value="Bernard MT Condensed" >Bernard MT Condensed</option>
                                                    <option value="Castellar" >Castellar</option>
                                                    <option value="Bradley Hand ITC" >Bradley Hand ITC</option>
                                                    <option value="Curlz MT" >Curlz MT</option>
                                                    <option value="Forte" >Forte</option>
                                                    <option value="Bradley Hand ITC" >Bradley Hand ITC</option>
                                                    <option value="Bahnschrift SemiLight Condensed" >Bahnschrift SemiLight Condensed</option>
                                                    <option value="Bodoni MT Black" >Bodoni MT Black</option>
                                                    <option value="Copperplate Gothic Light" >Copperplate Gothic Light</option>
                                                </select>
                                                <div style="color:red;">{{$errors->first('button_font')}}</div> <br>
                                                             
                                            </div>
                                            <div class="col-md-6">
                                                <label>צבע הכפתורים באתר</label>
                                                <input class="form-control" type="color" name="button_color" value="{{ old('button_color') }}" id="button_color">
                                                <div style="color:red;">{{$errors->first('button_color')}}</div> <br>
                                                
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6"> 
                                                <label>בחר פונט לכותרות באתר</label>
                                                <select class="select select2-hidden-accessible form-control" tabindex="-1" aria-hidden="true" name="title_font" id="title_font">
                                                    <option selected disabled>Select Font Family</option>
                                                    <option value="Calibri Light (Headings)" >Calibri Light (Headings)</option>
                                                    <option value="Calibri (Body)" >Calibri (Body)</option>
                                                    <option value="Algerian" >Algerian</option>
                                                    <option value="Gill Sans Ultra Bold" >Gill Sans Ultra Bold</option>
                                                    <option value="Times New Roman" >Times New Roman</option>
                                                    <option value="Gill Sans MT Condensed" >Gill Sans MT Condensed</option>
                                                    <option value="Arial" >Arial</option>
                                                    <option value="Bahnschrift" >Bahnschrift</option>
                                                    <option value="Blackadder ITC" >Blackadder ITC</option>
                                                    <option value="Bernard MT Condensed" >Bernard MT Condensed</option>
                                                    <option value="Castellar" >Castellar</option>
                                                    <option value="Bradley Hand ITC" >Bradley Hand ITC</option>
                                                    <option value="Curlz MT" >Curlz MT</option>
                                                    <option value="Forte" >Forte</option>
                                                    <option value="Bradley Hand ITC" >Bradley Hand ITC</option>
                                                    <option value="Bahnschrift SemiLight Condensed" >Bahnschrift SemiLight Condensed</option>
                                                    <option value="Bodoni MT Black" Bodoni MT Black</option>
                                                    <option value="Copperplate Gothic Light" >Copperplate Gothic Light</option>
                                                </select>
                                                <div style="color:red;">{{$errors->first('title_font')}}</div> <br>
                                            </div>
                                            <div class="col-md-6">
                                                <label>צבע הכותרות באתר</label>
                                                <input class="form-control" type="color" name="title_color" value="{{ old('title_color') }}" id="title_color">
                                                <div style="color:red;">{{$errors->first('title_color')}}</div> <br>
                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6"> 
                                                <label>בחר פונט לטקסטים הרגילים באתר</label>
                                                <select class="select select2-hidden-accessible form-control" tabindex="-1" aria-hidden="true" name="text_font" id="text_font">
                                                    <option selected disabled>Select Font Family</option>
                                                    <option value="Calibri Light (Headings)" >Calibri Light (Headings)</option>
                                                    <option value="Calibri (Body)" >Calibri (Body)</option>
                                                    <option value="Algerian" >Algerian</option>
                                                    <option value="Gill Sans Ultra Bold" >Gill Sans Ultra Bold</option>
                                                    <option value="Times New Roman" >Times New Roman</option>
                                                    <option value="Gill Sans MT Condensed" >Gill Sans MT Condensed</option>
                                                    <option value="Arial" >Arial</option>
                                                    <option value="Bahnschrift" >Bahnschrift</option>
                                                    <option value="Blackadder ITC" >Blackadder ITC</option>
                                                    <option value="Bernard MT Condensed" >Bernard MT Condensed</option>
                                                    <option value="Castellar" >Castellar</option>
                                                    <option value="Bradley Hand ITC" >Bradley Hand ITC</option>
                                                    <option value="Curlz MT" >Curlz MT</option>
                                                    <option value="Forte" >Forte</option>
                                                    <option value="Bradley Hand ITC">Bradley Hand ITC</option>
                                                    <option value="Bahnschrift SemiLight Condensed">Bahnschrift SemiLight Condensed</option>
                                                    <option value="Bodoni MT Black" >Bodoni MT Black</option>
                                                    <option value="Copperplate Gothic Light" >Copperplate Gothic Light</option>
                                                </select>
                                                <div style="color:red;">{{$errors->first('text_font')}}</div> <br>
                                            </div>
                                            <div class="col-md-6">
                                                <label>צבע הטקסטים הרגילים באתר</label>
                                                <input class="form-control" type="color" name="text_color" value="{{ old('text_color') }}" id="text_color">
                                                <div style="color:red;">{{$errors->first('text_color')}}</div> <br>
                                                
                                            </div>
                                        </div>
                                            @endif

 

					                            <div class="m-t-20 text-center">
					                                <button class="btn btn-primary btn-lg">Edit Profile Design</button>
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