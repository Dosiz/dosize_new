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
                                    <label>כתובת אתר (אופציונלי)</label>
                                    <input class="form-control" type="url" name="website_url" value="{{$brand_profile->website_url ?? ''}}" id="website_url">
                                    <div style="color:red;">{{$errors->first('website_url')}}</div> <br>
                                </div>

                                <div class="form-group">
                                    <label>מספר הווצאפ של העסק שלך (אופציונלי)</label>
                                    <input class="form-control" type="number" name="whatsapp_no" value="{{ $brand_profile->whatsapp_no ?? '' }}" id="whatsapp_no">
                                    <div style="color:red;">{{$errors->first('whatsapp_no')}}</div> <br>
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
