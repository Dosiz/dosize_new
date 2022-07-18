@extends('layout.brand_signup')
@section('title')
Profile Message
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
                            <h1> Hello {{ $brand_profile->brand_name ?? '' }} </h1>
                            
                            <p> We receive Your Brand information. We will contact/update in next 24 hours.</p>
                            <strong> Thanks </strong>

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
