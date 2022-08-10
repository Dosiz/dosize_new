@extends('layout.brand_signup')
@section('title')
פרופיל המותג
@endsection
@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
    <!-- Main Wrapper -->
    <div class="main-wrapper login-body register">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <strong>לא מאומת. אנא המתן {{ $brand_profile->brand_name ?? '' }}</strong>
                            <h1>הרשמה</h1>
                            <form method="POST" action="{{ route('brand-register') }}" enctype="multipart/form-data">
                                @csrf
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for=""> שם מותג <span>*</span></label>
                                    <div class="inputIcon">
                                        <img src="{{asset('assets_admin/img/user.svg')}}" alt="">
                                        <input class="form-control" type="text" value="{{ $brand_profile->brand_name ?? '' }}" name="brand_name" id="brand_name" placeholder="הזן שם מותג" required>
                                    </div>
                                    <div style="color:red;">{{$errors->first('name')}}</div> <br>
                                </div>
                                <div class="form-group">
                                    <label for="">אימייל <span>*</span></label>
                                    <div class="inputIcon">
                                        <img src="{{asset('assets_admin/img/email.svg')}}" alt="">
                                        <input readonly class="form-control" type="email" id="email" value="{{ Auth::user()->email }}">
                                    </div>
                                    <div style="color:red;">{{$errors->first('email')}}</div> <br>
                                </div>

                                <div class="form-group">
                                    <label for="" >  תמונת מותג  <span>*</span></label>
                                    <div class="inputIcon">
                                        <input class="form-control" type="file" name="brand_image" id="brand_image" value="{{ $brand_profile->brand_image ?? '' }}">
                                    </div>
                                    <div style="color:red;">{{$errors->first('brand_image')}}</div> <br>
                                </div>

                                <div class="form-group">
                                    <label for="" > לוגו מותג <span>*</span></label>
                                    <div class="inputIcon">
                                        <input class="form-control" type="file" name="brand_logo" id="brand_logo" value="{{ $brand_profile->brand_logo ?? '' }}">
                                    </div>
                                    <div style="color:red;">{{$errors->first('brand_logo')}}</div> <br>
                                </div>
                                
                                <div class="form-group"> 
                                    <label for=""> קטגוריה <span>* </span></label>
                                    <div class="inputIcon">
                                        <select required class="select" name="category_id" id="category-dropdown">
                                            <option selected disabled>Select Category</option>
                                            @if($brand_profile)
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" {{ $brand_profile->category_id == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                                            @endforeach
                                            @else
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                        <div style="color:red;">{{$errors->first('category_id')}}</div> <br>
                                    </div>
                                </div>

                                <div class="form-group"> 
                                    <label for=""> קטגוריה <span>* </span></label>
                                    <div class="inputIcon">
                                        <select name="sub_category_id[]" class="select2-multiple_ form-control" multiple="multiple" id="select2MultipleE">
                                            @if($sub_categories)
                                            @foreach($sub_categories as $sub_category)
                                                <option value="{{$sub_category->id}}" selected>{{$sub_category->subcategory->name}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                        <div style="color:red;">{{$errors->first('category_id')}}</div> <br>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>מספר הווצאפ של העסק שלך (אופציונלי)</label>
                                    <input class="form-control" type="number" name="whatsapp_no" value="{{ old('whatsapp_no') }}" id="whatsapp_no">
                                    <div style="color:red;">{{$errors->first('address')}}</div> <br>
                                </div>

                                <h2>Brand Style</h2><br>
                                <div class="form-group"> 
                                    <label>בחר פונט לראש האתר</label>
                                    <select class="form-control" tabindex="-1" aria-hidden="true" name="header_font" id="header_font">
                                        <option selected disabled>Select Font Family</option>
                                        <option value="Calibri Light (Headings)">Calibri Light (Headings)</option>
                                        <option value="Calibri (Body)">Calibri (Body)</option>
                                        <option value="Algerian" >Algerian</option>
                                        <option value="Gill Sans Ultra Bold">Gill Sans Ultra Bold</option>
                                        <option value="Times New Roman">Times New Roman</option>
                                        <option value="Gill Sans MT Condensed">Gill Sans MT Condensed</option>
                                        <option value="Arial">Arial</option>
                                        <option value="Bahnschrift">Bahnschrift</option>
                                        <option value="Blackadder ITC">Blackadder ITC</option>
                                        <option value="Bernard MT Condensed">Bernard MT Condensed</option>
                                        <option value="Castellar">Castellar</option>
                                        <option value="Bradley Hand ITC">Bradley Hand ITC</option>
                                        <option value="Curlz MT">Curlz MT</option>
                                        <option value="Forte">Forte</option>
                                        <option value="Bradley Hand ITC">Bradley Hand ITC</option>
                                        <option value="Bahnschrift SemiLight Condensed">Bahnschrift SemiLight Condensed</option>
                                        <option value="Bodoni MT Black">Bodoni MT Black</option>
                                        <option value="Copperplate Gothic Light" >Copperplate Gothic Light</option>
                                    </select>
                                    <div style="color:red;">{{$errors->first('header_font')}}</div> <br>
                                </div>
                                <div class="form-group">
                                    <label>צבע תחתית האתר</label>
                                    <input class="form-control" type="color" name="header_color" value="{{ old('header_color') }}" id="header_color">
                                    <div style="color:red;">{{$errors->first('footer_color')}}</div> <br>
                                    
                                </div>

                                <div class="form-group"> 
                                    <label>בחר פונט לתחתית האתר</label>
                                    <select class="select select2-hidden-accessible form-control" tabindex="-1" aria-hidden="true" name="footer_font" id="footer_font">
                                        <option selected disabled>Select Font Family</option>
                                        <option value="Calibri Light (Headings)">Calibri Light (Headings)</option>
                                        <option value="Calibri (Body)">Calibri (Body)</option>
                                        <option value="Algerian" >Algerian</option>
                                        <option value="Gill Sans Ultra Bold">Gill Sans Ultra Bold</option>
                                        <option value="Times New Roman">Times New Roman</option>
                                        <option value="Gill Sans MT Condensed">Gill Sans MT Condensed</option>
                                        <option value="Arial">Arial</option>
                                        <option value="Bahnschrift">Bahnschrift</option>
                                        <option value="Blackadder ITC">Blackadder ITC</option>
                                        <option value="Bernard MT Condensed">Bernard MT Condensed</option>
                                        <option value="Castellar">Castellar</option>
                                        <option value="Bradley Hand ITC">Bradley Hand ITC</option>
                                        <option value="Curlz MT">Curlz MT</option>
                                        <option value="Forte">Forte</option>
                                        <option value="Bradley Hand ITC">Bradley Hand ITC</option>
                                        <option value="Bahnschrift SemiLight Condensed">Bahnschrift SemiLight Condensed</option>
                                        <option value="Bodoni MT Black">Bodoni MT Black</option>
                                        <option value="Copperplate Gothic Light" >Copperplate Gothic Light</option>
                                    </select>
                                    <div style="color:red;">{{$errors->first('footer_font')}}</div> <br>
                                
                                </div>
                                <div class="form-group">
                                    <label>בחר פונט לתחתית האתר</label>
                                    <input class="form-control" type="color" name="footer_color" value="{{ old('footer_color') }}" id="footer_color">
                                    <div style="color:red;">{{$errors->first('footer_color')}}</div> <br>
                                        
                                </div>

                                <div class="form-group"> 
                                    <label>בחר פונט לכפתורים באתר</label>
                                    <select class="select select2-hidden-accessible form-control" tabindex="-1" aria-hidden="true" name="button_font" id="button_font">
                                        <option selected disabled>Select Font Family</option>
                                        <option value="Calibri Light (Headings)">Calibri Light (Headings)</option>
                                        <option value="Calibri (Body)">Calibri (Body)</option>
                                        <option value="Algerian" >Algerian</option>
                                        <option value="Gill Sans Ultra Bold">Gill Sans Ultra Bold</option>
                                        <option value="Times New Roman">Times New Roman</option>
                                        <option value="Gill Sans MT Condensed">Gill Sans MT Condensed</option>
                                        <option value="Arial">Arial</option>
                                        <option value="Bahnschrift">Bahnschrift</option>
                                        <option value="Blackadder ITC">Blackadder ITC</option>
                                        <option value="Bernard MT Condensed">Bernard MT Condensed</option>
                                        <option value="Castellar">Castellar</option>
                                        <option value="Bradley Hand ITC">Bradley Hand ITC</option>
                                        <option value="Curlz MT">Curlz MT</option>
                                        <option value="Forte">Forte</option>
                                        <option value="Bradley Hand ITC">Bradley Hand ITC</option>
                                        <option value="Bahnschrift SemiLight Condensed">Bahnschrift SemiLight Condensed</option>
                                        <option value="Bodoni MT Black">Bodoni MT Black</option>
                                        <option value="Copperplate Gothic Light" >Copperplate Gothic Light</option>
                                              
                                    </select>
                                    <div style="color:red;">{{$errors->first('button_font')}}</div><br>
                                </div>
                                <div class="form-group">
                                    <label>צבע הכפתורים באתר</label>
                                    <input class="form-control" type="color" name="button_color" value="{{ old('button_color') }}" id="button_color">
                                    <div style="color:red;">{{$errors->first('button_color')}}</div> <br>
                                </div>
                                <div class="form-group"> 
                                    <label>בחר פונט לכותרות באתר</label>
                                    <select class="select select2-hidden-accessible form-control" tabindex="-1" aria-hidden="true" name="title_font" id="title_font">
                                        <option selected disabled>Select Font Family</option>
                                        <option value="Calibri Light (Headings)">Calibri Light (Headings)</option>
                                        <option value="Calibri (Body)">Calibri (Body)</option>
                                        <option value="Algerian" >Algerian</option>
                                        <option value="Gill Sans Ultra Bold">Gill Sans Ultra Bold</option>
                                        <option value="Times New Roman">Times New Roman</option>
                                        <option value="Gill Sans MT Condensed">Gill Sans MT Condensed</option>
                                        <option value="Arial">Arial</option>
                                        <option value="Bahnschrift">Bahnschrift</option>
                                        <option value="Blackadder ITC">Blackadder ITC</option>
                                        <option value="Bernard MT Condensed">Bernard MT Condensed</option>
                                        <option value="Castellar">Castellar</option>
                                        <option value="Bradley Hand ITC">Bradley Hand ITC</option>
                                        <option value="Curlz MT">Curlz MT</option>
                                        <option value="Forte">Forte</option>
                                        <option value="Bradley Hand ITC">Bradley Hand ITC</option>
                                        <option value="Bahnschrift SemiLight Condensed">Bahnschrift SemiLight Condensed</option>
                                        <option value="Bodoni MT Black">Bodoni MT Black</option>
                                        <option value="Copperplate Gothic Light" >Copperplate Gothic Light</option>
                                    </select>
                                    <div style="color:red;">{{$errors->first('title_font')}}</div> <br>
                                </div>
                                <div class="form-group">
                                    <label>צבע הכותרות באתר</label>
                                    <input class="form-control" type="color" name="title_color" value="{{ old('title_color') }}" id="title_color">
                                    <div style="color:red;">{{$errors->first('title_color')}}</div> <br>
                                    
                                </div>
                                <div class="form-group"> 
                                    <label>בחר פונט לטקסטים הרגילים באתר</label>
                                        <select class="select select2-hidden-accessible form-control" tabindex="-1" aria-hidden="true" name="text_font" id="text_font">
                                            <option selected disabled>Select Font Family</option>
                                            <option value="Calibri Light (Headings)">Calibri Light (Headings)</option>
                                            <option value="Calibri (Body)">Calibri (Body)</option>
                                            <option value="Algerian" >Algerian</option>
                                            <option value="Gill Sans Ultra Bold">Gill Sans Ultra Bold</option>
                                            <option value="Times New Roman">Times New Roman</option>
                                            <option value="Gill Sans MT Condensed">Gill Sans MT Condensed</option>
                                            <option value="Arial">Arial</option>
                                            <option value="Bahnschrift">Bahnschrift</option>
                                            <option value="Blackadder ITC">Blackadder ITC</option>
                                            <option value="Bernard MT Condensed">Bernard MT Condensed</option>
                                            <option value="Castellar">Castellar</option>
                                            <option value="Bradley Hand ITC">Bradley Hand ITC</option>
                                            <option value="Curlz MT">Curlz MT</option>
                                            <option value="Forte">Forte</option>
                                            <option value="Bradley Hand ITC">Bradley Hand ITC</option>
                                            <option value="Bahnschrift SemiLight Condensed">Bahnschrift SemiLight Condensed</option>
                                            <option value="Bodoni MT Black">Bodoni MT Black</option>
                                            <option value="Copperplate Gothic Light" >Copperplate Gothic Light</option>
                                        </select>
                                        <div style="color:red;">{{$errors->first('text_font')}}</div> <br>
                                    </div>
                                    <div class="form-group">
                                        <label>צבע הטקסטים הרגילים באתר</label>
                                        <input class="form-control" type="color" name="text_color" value="{{ old('text_color') }}" id="text_color">
                                        <div style="color:red;">{{$errors->first('text_color')}}</div> <br>
                                        
                                    </div>






                                <table class="table table-bordered" id="dynamicTable">  
                                    <tr>
                                        <th>כתובת</th>
                                    </tr>
                                    @if($addresses)
                                    @foreach($addresses as $address)  
                                    <tr>
                                        
                                        <td>
                                            <div class="inputIcon">
                                                
                                                <textarea class="form-control @error('address') is-invalid @enderror" placeholder="הכנס כתובת" id="address" name="addmore[0]" rows="4" cols="50" >{{$address->address ?? ''}} </textarea>
                                                
                                                <div style="color:red;">{{$errors->first('addmore[0][address]')}}</div> <br>
                                            </div>
                                        </td> 
                                        @if(($loop->first))
                                        <td><button type="button" name="add" id="add" class="btn btn-success add_remove">Add More</button></td> 
                                        @else
                                        <td>
                                            <button type="button" class="btn btn-danger remove-tr add_remove">Remove</button>
                                        </td>
                                        @endif 
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        
                                        <td>
                                            <div class="inputIcon">
                                                
                                                <textarea class="form-control @error('address') is-invalid @enderror" placeholder="הכנס כתובת" id="address" name="addmore[0]" rows="4" cols="50" >{{$address->address ?? ''}} </textarea>
                                                
                                                <div style="color:red;">{{$errors->first('addmore[0][address]')}}</div> <br>
                                            </div>
                                        </td> 
                                        <td><button type="button" name="add" id="add" class="btn btn-success add_remove">Add More</button></td> 
                                    </tr>
                                    @endif   
                                </table> 

                                <div class="form-group">
                                    <label for=""> תיאור </label>
                                    <div class="inputIcon">
                                        <textarea class="form-control @error('description') is-invalid @enderror" placeholder=" הזן תיאור " id="description" name="description" rows="4" cols="50" >{{ $brand_profile->description ?? ''}}</textarea>
                                        <div style="color:red;">{{$errors->first('description')}}</div> <br>
                                    </div>
                                </div>

                                <div class="form-group mb-0">
                                    <button class="btn btn-primary btn-block" type="submit"> ליצור מותג </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Wrapper -->
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        var i = 0;
       
       $("#add").click(function(){
       
           ++i;
       
           $("#dynamicTable").append('<tr><td><textarea type="text" name="addmore['+i+']" placeholder="הכנס כתובת" rows="4" cols="50" class="form-control" ></textarea></td><td><button type="button" class="btn btn-danger remove-tr add_remove">Remove</button></td></tr>');
       });
       
       $(document).on('click', '.remove-tr', function(){  
           $(this).parents('tr').remove();
       }); 
        $(document).ready(function() {
            // Select2 Multiple
            $('#select2MultipleE').select2({
                placeholder: "בחר תת-קטגוריה",
                allowClear: true
            });

            //change category adn show sub-category

            $('#category-dropdown').on('change', function () {
                var idCategory = this.value;
                // alert(idCategory);
                $("#select2MultipleE").html('');
                $.ajax({
                    url: "{{url('/fetch-subcategory')}}",
                    type: "POST",
                    data: {
                        category_id: idCategory,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#select2MultipleE').html('<option value="">-- בחר תת-קטגוריה --</option>');
                        $.each(result.sub_categories, function (key, value) {
                            $("#select2MultipleE").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });

        });
    </script>
@endsection
