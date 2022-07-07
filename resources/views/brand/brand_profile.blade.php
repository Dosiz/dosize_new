@extends('layout.brand_signup')
@section('title')
פרופיל המותג
@endsection
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
                                        <select required class="select" name="category_id">
                                            <option selected disabled>Select Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        <div style="color:red;">{{$errors->first('category_id')}}</div> <br>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">כתובת</label>
                                    <div class="inputIcon">
                                        <textarea class="form-control @error('address') is-invalid @enderror" placeholder="הכנס כתובת" id="address" name="address" rows="4" cols="50" >{{$brand_profile->address ?? ''}}</textarea>
                                        <div style="color:red;">{{$errors->first('address')}}</div> <br>
                                    </div>
                                </div>

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
